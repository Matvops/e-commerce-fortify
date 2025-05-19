<?php

namespace App\Models;

use App\Traits\HasCompositePrimaryKey;
use Illuminate\Database\Eloquent\Model;

class ProductCart extends Model
{
    
    use HasCompositePrimaryKey;
    protected $table = "product_cart";
    protected $primaryKey = ["pc_cart_id", "pc_product_id"];
    public $incrementing = false;

    public $fillable = 
    [
        'pc_cart_id',
        'pc_product_id',
        'created_at',
        'updated_at',
        'pc_quantity'
    ];
}
