<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductOnCartRequest;
use App\Http\Requests\RemoveProductCartRequest;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private CartService $service;

    public function __construct(CartService $service)
    {
        $this->service = $service;
    }

    public function getCart() {

        $cart = $this->service->getCart();
        $products = $this->service->getProductsCart();

        return view('cart', [
            'cart' => $cart,
            'products' => $products
        ]);
    }

    public function removeProductCart(RemoveProductCartRequest $request){

        $response = $this->service->removeCartById($request->input('product_id'));

        return redirect()
                ->back()
                ->with('productRemoveStatus', $response['status'])
                ->with('productRemoveMessage', $response['message']);
    }


    public function addProductOnCart(AddProductOnCartRequest $request) {

        $productId = $request->input('product_id');

        $response = $this->service->addProductOnCartAndUpdateInvetory($productId);

        return redirect()
                ->back()
                ->with('addProductStatus', $response['status'])
                ->with('addProductMessage', $response['message']);
    }

    public function makeOrder() {

        $response = $this->service->makeOrder();

        return redirect()
                ->back()
                ->with('makeOrderStatus', $response['status'])
                ->with('makeOrderMessage', $response['message']);
    }

    public function getOrders() {
        $response = $this->service->getOrders();

        return view('account', [
            'dados' => $response['dados'],
            'message' => $response['message'],
            'status' => $response['status']
        ]);  
    }
}
