<?php

namespace App\Model\Article;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    protected $table = 'tags';
    public function posts()
    {
        return $this->belongsToMany('App\Model\Article\post', 'post_tags')->orderBy('created_at', 'DESC')->paginate(5);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
