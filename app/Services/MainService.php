<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductCart;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class MainService {
    

    public function getCart(){
        return User::find(Auth::id())->cart;
    }

    public function getProductsCart($cartId){
        return Cart::find($cartId)->products;
    }

    public function removeCartById($cartId, $productId){

        try{
            $productId = Crypt::decrypt($productId);

            DB::beginTransaction();


            ProductCart::where('pc_cart_id', $cartId)
                                ->where('pc_product_id', $productId)
                                ->delete();

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
}