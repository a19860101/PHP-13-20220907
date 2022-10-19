<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'cover',
        'description',
        'price',
        'special_price',
        'publish_at',
        'unpublish_at',
        'published'
    ];
}
