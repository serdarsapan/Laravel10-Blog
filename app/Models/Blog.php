<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'status'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'blog_categories', 'blog_id', 'category_id');
    }
}
