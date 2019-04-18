<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [ 'body', 'approved', 'post_id', 'user_id'];

    public function getPosts() {
        return $this->belongsTo('App\Post');
    }


}
