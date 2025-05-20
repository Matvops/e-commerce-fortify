<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'order_id';

    public $fillable = 
        [
            'order_id',
            'order_price',
            'created_at',
            'updated_at',
        ];

    public function user(){
        return $this->belongsTo(User::class, 'order_user_id');
    }
}
