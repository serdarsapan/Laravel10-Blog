<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    protected $fillable = [
      'category_id',
        'blog_id'
    ];

    public function blogs()
    {
        return $this->belongsToMany('App\Models\Blog', 'blog_categories', 'category_id', 'id');
    }
}
