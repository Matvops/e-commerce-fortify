<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    protected $database = "products";
    protected $primaryKey = "product_id";

    public function carts(): BelongsToMany
    {
        return $this->belongsToMany(Cart::class, "product_cart", "pc_product_id", "pc_product_id");
    }
}
