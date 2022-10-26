<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'category_id',
        'cover',
        'description',
        'price',
        'special_price',
        'publish_at',
        'unpublish_at',
        'published'
    ];
    public function carts(){
        return $this->hasMany(Cart::class);
    }
    public function orderDetails(){
        return $this->hasMany(OrderDetail::class);
    }
}
