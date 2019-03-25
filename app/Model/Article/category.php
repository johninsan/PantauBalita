<?php

namespace App\Model\Article;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = 'categories';
    public function categories()
    {
        return $this->belongsToMany('App\Model\User\post', 'category_posts')->orderBy('created_at', 'DESC')->paginate(5);
    }
}
