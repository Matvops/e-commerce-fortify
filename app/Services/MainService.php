<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class MainService {
    

    public function getAllProducts(){
        return Product::all();
    }

    public function getTopsSeller(){
        return Product::orderBy("product_quantity_sold", "DESC")
                            ->limit(3)
                            ->get();
    }
}