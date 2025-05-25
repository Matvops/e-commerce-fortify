<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductCart;
use App\Models\User;
use App\Utils\Response;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

class CartService {


    public static function getCart(){
        $cart = User::find(Auth::id())->cart;

        if(empty($cart)) {
            $cart = self::createCart();
        }

        return $cart;
    }

    private function createCart(){
        $cart = new Cart();
        $cart->cart_user_id = Auth::id();
        $cart->cart_total_price = 0.00;
        $cart->save();
        return $cart;
    }

    public static function getProductsCart(){
        $cart = self::getCart();

        $products = Cart::find($cart->cart_id)->products;

        return $products;
    }

    public static function getProductsCartWithPivotColumnPcQuantity(){
        $products = self::getProductsCart();

        foreach($products as $product) {
            $product->pc_quantity = $product->pivot->pc_quantity;
        }

        return $products;
    }

    public function removeProductCartById($productId){

        try{
            $productId = Crypt::decrypt($productId);

            DB::beginTransaction();

            $cart = self::getCart();
            $product = Cart::find($cart->cart_id)
                ->products()
                ->where('product_id', $productId)
                ->first();

            $this->subtractPriceFromCart($cart, $product);

            $productCart = ProductCart::where('pc_cart_id', $cart->cart_id)
                                ->where('pc_product_id', $productId)
                                ->first();
            
            $this->removeProductCart($productCart);

            DB::commit();
            return Response::getResponse(true, 'Produto removido do carrinho');
        } catch(Exception $e) { 
            DB::rollBack();
            return Response::getResponse(false, 'Erro ao remover produto.');
        }
    }

    private function subtractPriceFromCart($cart, $product){
        $cart->cart_total_price = $cart->cart_total_price - $product->product_price;
        $cart->save();
    }

    private function removeProductCart($productCart) {
        if($productCart->pc_quantity > 1) {
            $productCart->pc_quantity--;
            $productCart->save();
        } else {
            $productCart->delete();
        }
    }

    public function addProductOnCart($productId){
        try {
            DB::beginTransaction();

            $productId = Crypt::decrypt($productId);
            $product = Product::where('product_id', $productId)->first();

            if(empty($product)) {
                throw new NotFoundResourceException('Produto não encontrado');
            }

            $this->updateTotalPriceCart($product->product_price);
            $this->addProduct($productId);


            DB::commit();

            return Response::getResponse(true, 'Produto adicionado ao carrinho.');
        } catch (NotFoundResourceException $e) {
            DB::rollback();
            return Response::getResponse(false, $e->getMessage());
        } catch (Exception $e) {
            DB::rollback();
            return Response::getResponse(false, 'Erro ao adicionar produto.');
        }
    }

    private function updateTotalPriceCart($price){
        $cart = self::getCart();
        $cart->cart_total_price += $price;
        $cart->save(); 
    }

    private function addProduct($productId){
        $cartId = self::getCart()->cart_id;
        
        $productCart = ProductCart::where('pc_cart_id', $cartId)
                                ->where('pc_product_id', $productId)
                                ->first();

        if($productCart) {
           $productCart->pc_quantity++;
        } else {
            $productCart = $this->createProductCart($cartId, $productId);
        }

        $productCart->save();
    }

    private function createProductCart($cartId, $productId){
        $productCart = new ProductCart();
        $productCart->pc_product_id = $productId;
        $productCart->pc_cart_id = $cartId;
        $productCart->pc_quantity = 1;

        return $productCart;
    }
}