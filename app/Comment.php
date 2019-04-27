<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Comment extends Model
{
    protected $fillable = [ 'body', 'approved', 'post_id', 'user_id'];

    public function getPosts() {
        return $this->belongsTo('App\Post');
    }

    static function getComments($post_id){

        return $comments = DB::table('comments as c')

        ->select('c.*','u.name')
        ->where('c.approved','=', 1)
        ->where('c.post_id','=', $post_id)
        ->join('users as u', 'c.user_id', '=', 'u.id')
        ->get();

    }


}
