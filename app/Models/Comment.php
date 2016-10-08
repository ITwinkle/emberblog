<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Comment extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text', 'post_id'
    ];

    /**
     * Get the comments for the blog post.
     */
    public function post()
    {
        return $this->belongTo('App\Models\Post');
    }
}
