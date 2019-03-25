<?php

namespace App\Model\Article;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $table = 'posts';

    public function tags()
    {
        return $this->belongsToMany('App\Model\Article\tag', 'post_tags')->withTimestamps();
    }
    public function categories()
    {
        return $this->belongsToMany('App\Model\Article\category', 'category_posts')->withTimestamps();
    }
}
