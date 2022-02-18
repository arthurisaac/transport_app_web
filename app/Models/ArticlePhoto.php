<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticlePhoto extends Model
{
    use HasFactory;
    protected $fillable = [
        'articleId',
        'thumbnailUrl',
    ];

    public function article() {
        return $this->belongsTo('App\Models\Article', 'articleId', 'id');
    }
}
