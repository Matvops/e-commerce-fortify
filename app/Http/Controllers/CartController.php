<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductOnCartRequest;
use App\Http\Requests\RemoveProductCartRequest;
use App\Services\CartService;

class CartController extends Controller
{
    private CartService $service;

    public function __construct(CartService $service)
    {
        $this->service = $service;
    }

    public function getCart() {

        $cart = CartService::getCart();
        $products = CartService::getProductsCart();

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

        $response = $this->service->addProductOnCart($productId);

        return redirect()
                ->back()
                ->with('addProductStatus', $response['status'])
                ->with('addProductMessage', $response['message']);
    }
}
