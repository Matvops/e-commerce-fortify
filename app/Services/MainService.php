<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductCart;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;
use Symfony\Component\Translation\Exception\NotFoundResourceException;


class MainService {
    

    public function getCart(){
        return User::find(Auth::id())->cart;
    }

    public function getProductsCart(){
        $cart = $this->getCart();
        return Cart::find($cart->cart_id)->products;
    }

    public function removeCartById($productId){

        try{
            $productId = Crypt::decrypt($productId);
            $cart = $this->getCart();

            DB::beginTransaction();


            $product = Cart::find($cart->cart_id)->products()->first();


            $cart->cart_total_price = $cart->cart_total_price - $product->product_price;

            ProductCart::where('pc_cart_id', $cart->cart_id)
                                ->where('pc_product_id', $productId)
                                ->delete();
            
            $cart->save();

            DB::commit();
            return 
                [
                    'status' => true,
                    'message' => 'Produto removido do carrinho.'
                ];
        } catch(Exception $e) { 
            DB::rollBack();
            return 
                [
                    'status' => false,
                    'message' => 'Erro ao remover produto.'
                ];
        }
    }

    public function getTopsSeller(){
        return Product::orderBy("product_quantity_sold", "DESC")
                            ->limit(3)
                            ->get();
    }

    public function getProducts($dados){

        $products = null;

        try {
            if (empty($dados['search']) && empty($dados['filter'])) {
                $products = $this->getAllProducts();
            } else {
                $productsSearched = empty($dados['search']) ?  null : $this->search($dados['search']);
                $productsFiltered = empty($dados['filter']) ?  null : $this->filter($dados['filter']);
                $products = $this->getProductsFiltered($productsSearched, $productsFiltered);
            }
    
            return [
                'status' => true,
                'message' => '',
                'dados' => $products
            ];
        } catch (InvalidArgumentException $e){
            return [
                'status' => false,
                'message' => $e->getMessage(),
                'dados' => null
            ];
        } catch (Exception $e) {
            return [
                'status' => false,
                'message' => "Favor entrar em contato com o administrador do sistema!",
                'dados' => null
            ];
        }
    }

    private function getAllProducts(){
        return Product::all();
    }

    private function search($productName): Collection
    {
        return Product::whereLike('product_name', "$productName%")->get();
    }

    private function filter($filter): Collection
    {
        $filters = [
            "MOST" => ["product_price", "DESC"],
            "LEAST" => ["product_price", "ASC"],
            "RECENT" => ["created_at", "DESC"],
            "OLD" => ["created_at", "ASC"],
        ];
    
        if (!isset($filters[$filter])) {
            throw new InvalidArgumentException("Tipo de filtro inválido: $filter");
        }
    
        [$field, $direction] = $filters[$filter];


        return Product::orderBy($field, $direction)->get();
    }

    private function getProductsFiltered($productsSearched, $productsFiltered){
        if($productsSearched && $productsFiltered) {
            return $productsSearched->intersect($productsFiltered);
        }

        return $productsSearched ?? $productsFiltered;
    }

    public function addProductOnCartAndUpdateInvetory($productId){
        try {
            DB::beginTransaction();

            $productId = Crypt::decrypt($productId);

            $product = Product::where('product_id', $productId)->first();

            $this->updateTotalPriceCart($product->product_price);

            $this->addProductOnCart($productId);


            DB::commit();
            return 
            [
                'status' => true,
                'message' => 'Produto adicionado ao carrinho.'
            ];
        } catch (Exception $e) {
            DB::rollback();
            return 
            [
                'status' => false,
                'message' => 'Erro ao adicionar produto.'
            ];
        }
    }

    private function updateTotalPriceCart($price){
        $cart = $this->getCart();
        $cart->cart_total_price += $price;
        $cart->save(); 
    }

    private function addProductOnCart($productId){
        $cartId = $this->getCart()->cart_id;
        
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

    public function makeOrder(){
        try {
            DB::beginTransaction();

            $cart = $this->getCart();
            $products = Cart::find($cart->cart_id)->products;

            if(!$products)
                throw new NotFoundResourceException("Carrinho vazio.");

            $this->createOrder($cart);

            foreach ($products as $product) {
                $this->updateProduct($product);
            }

            $this->clearCart($cart);

            DB::commit();
            return 
                [
                    'status' => true,
                    'message' => 'Pedido criado!',
                    'dados' => null
                ];
        } catch (NotFoundResourceException $e) {
            DB::rollBack();
            return 
                [
                    'status' => false,
                    'message' => $e->getMessage(),
                    'dados' => null
                ];
        } catch (Exception $e) {
            DB::rollBack();
            return 
                [
                    'status' => false,
                    'message' => 'Falha ao criar pedido. Contate o administrador!',
                    'dados' => null
                ];
        }
        
    }

    private function createOrder($cart){
        $order = new Order();
        $order->order_price = $cart->cart_total_price;
        $order->order_user_id = $cart->cart_user_id;
        $order->save();
    }

    private function updateProduct($product){
        $productCart = ProductCart::where('pc_product_id', $product->product_id)->first();
        $product->product_quantity = $product->product_quantity - $productCart->pc_quantity;
        $product->product_quantity_sold = $product->product_quantity_sold + $productCart->pc_quantity;
        $product->save();
    }

    private function clearCart($cart) {
        ProductCart::where('pc_cart_id', $cart->cart_id)->delete();
        $cart->cart_total_price = 0.0;
        $cart->save();
    }

    public function getOrders(){
        try {

            $orders = User::where('id', Auth::id())->first()->orders()->get()->toArray();

            if(!$orders)
                throw new NotFoundResourceException('Você ainda não possui pedidos!');

            foreach ($orders as $key => $order) {
                $orders[$key]['created_at'] = $this->formatDate($order);
            }

            return [
                'status' => true,
                'message' => '',
                'dados' => $orders
            ];
        } catch (NotFoundResourceException $e) {
            return [
                'status' => false,
                'message' => $e->getMessage(),
                'dados' => null
            ];
        } 
    }

    private function formatDate($order){
        return Carbon::parse($order['created_at'])->format('d/m/Y h:i:s');
    }
}