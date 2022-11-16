<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = ['title','body','cover','publish_at','unpublish_at','published'];
    //顯示所有上架文章
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
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
    public function getPostTags(){
        $tagArray = [];
        foreach($this->tags as $tag){
            $tagArray[] = $tag->title;
        }
        return $tagArray;
    }
    public function getPostTagString(){
        $tagArray = [];
        foreach($this->tags as $tag){
            $tagArray[] = $tag->title;
        }
        $tagString = implode(',',$tagArray);
        return $tagString;
    }
}
