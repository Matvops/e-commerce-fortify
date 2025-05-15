<?php

namespace App\Http\Controllers;

use App\Http\Requests\RemoveProductCartRequest;
use App\Services\MainService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new MainService;
    }
    
    public function home(Request $request){

        $dados = [
            'search' => $request->input('search') ?? null,
            'filter' => $request->input('filter') ?? null,
        ];

        $response = $this->service->getProducts($dados);

        if(!$response['status']) {
            return redirect()
                ->back()
                ->with('productsError', $response['message']);
        }

        $products = $response['dados'];
        $topSeller = $this->service->getTopsSeller();
        return view('home', ['products' => $products, 'highlights' => $topSeller]);
    }

    public function getCart() {

        $cart = $this->service->getCart();
        $products = $this->service->getProductsCart($cart->cart_id);

        return view('cart', [
            'cart' => $cart,
            'products' => $products
        ]);
    }

    public function removeProductCart(RemoveProductCartRequest $request){
        $cart = $this->service->getCart();
        $response = $this->service->removeCartById($cart->cart_id, $request->input('product_id'));

        return redirect()
                ->back()
                ->with('productRemoveStatus', $response['status'])
                ->with('productRemoveMessage', $response['message']);
    }
}
