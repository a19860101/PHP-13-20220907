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
        'published',
        'is_feature'
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function carts(){
        return $this->hasMany(Cart::class);
    }
    public function orderDetails(){
        return $this->hasMany(OrderDetail::class);
    }
    //顯示所有可上架的商品
    public function scopeShowAll($query){
        return $query->where('published',1)
            ->where(function($query){
            $query->orWhere('publish_at','<=',today())
            ->orWhere('unpublish_at','>',today());
        });
    }
}
