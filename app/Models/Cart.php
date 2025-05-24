<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cart extends Model
{
    protected $primaryKey = "cart_id";

    protected $fillable =
    [
        'cart_total_price'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'cart_user_id');
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, "product_cart", "pc_cart_id", "pc_product_id")
                        ->withPivot('pc_quantity');
    }
}
