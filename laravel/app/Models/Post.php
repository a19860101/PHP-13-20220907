<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title','body','cover','publish_at','unpublish_at','published'];
    //顯示所有可上架的商品
    public function scopeShowAll($query){
        return $query->where('published',1)
            ->where(function($query){
            $query->orWhere('publish_at','<=',today())
            ->orWhere('unpublish_at','>',today());
        });
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
