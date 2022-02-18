<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'label',
        'description',
        'price',
        'stock',
        'location',
        'coordinates',
        'views',
        'shares',
        'measure',
        'thumbnailUrl',
        'categoryId',
    ];
}
