<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCart extends Model
{
    protected $table = "product_cart";
    protected $primaryKey = ["pc_cart_id", "pc_product_id"];
    public $incrementing = false;
}
