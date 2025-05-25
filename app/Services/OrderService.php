<?php

namespace App\Services;

use App\Models\Order;
use App\Models\ProductCart;
use App\Utils\Response;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

class OrderService {

    public function getOrders(): Response
    {
        try {

            $orders = UserService::getUser()
                        ->orders()
                        ->get()
                        ->toArray();

            if(!$orders)
                throw new NotFoundResourceException('Você ainda não possui pedidos.');

            foreach ($orders as $key => $order) {
                $orders[$key]['created_at'] = $this->formatDate($order);
            }

            return Response::getResponse(true, '', $orders);
        } catch (NotFoundResourceException $e) {
            return Response::getResponse(false, $e->getMessage());
        } 
    }

    private function formatDate($order){
        return Carbon::parse($order['created_at'])
                    ->subHours(3)
                    ->format('d/m/Y H:i:s');
    }
    
    public function makeOrder(): Response
    {
        try {
            DB::beginTransaction();

            $cart = CartService::getCart();
            $products = CartService::getProductsCart();

            if(!$products)
                throw new NotFoundResourceException("Carrinho vazio.");

            $this->createOrder($cart);

            foreach ($products as $product) {
                $this->updateProduct($product);
            }

            $this->clearCart($cart);

            DB::commit();

            return Response::getResponse(true, 'Pedido criado!');
        } catch (NotFoundResourceException $e) {
            DB::rollBack();
            return Response::getResponse(false, $e->getMessage());
        } catch (Exception $e) {
            DB::rollBack();
            return Response::getResponse(false, 'Falha ao criar pedido. Contate o administrador!');
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
}