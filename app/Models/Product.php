<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    protected $database = "products";
    protected $primaryKey = "product_id";

    public $fillable = 
    [
        'product_id',
        'product_name',
        'product_quantity',
        'product_price',
        'product_quantity_sold',
        'created_at',
        'update_at',
    ];

    public function carts(): BelongsToMany
    {
        return $this->belongsToMany(Cart::class, "product_cart", "pc_product_id", "pc_product_id");
    }
}
