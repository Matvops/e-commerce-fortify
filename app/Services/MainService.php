<?php

namespace App\Services;

use App\Models\Product;
use App\Utils\Response;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use InvalidArgumentException;


class MainService {
    

    public function getTopsSeller(){
        return Product::orderBy("product_quantity_sold", "DESC")
                            ->limit(3)
                            ->get();
    }

    public function getProducts($dados): Response
    {

        $products = null;

        try {
            if (empty($dados['search']) && empty($dados['filter'])) {
                $products = $this->getAllProducts();
            } else {
                $productsSearched = empty($dados['search']) ?  null : $this->search($dados['search']);
                $productsFiltered = empty($dados['filter']) ?  null : $this->filter($dados['filter']);
                $products = $this->getProductsFiltered($productsSearched, $productsFiltered);
            }
    

            return Response::getResponse(true, '', $products);
        } catch (InvalidArgumentException $e){
            return Response::getResponse(false, $e->getMessage());
        } catch (Exception $e) {
            return Response::getResponse(false, "Favor entrar em contato com o administrador do sistema!");
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