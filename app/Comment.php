<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Comment extends Model
{
    protected $fillable = [ 'body', 'approved', 'post_id', 'user_id', 'lang_id'];

    public function post() {
        return $this->belongsTo('App\Post');
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function lang() {
        return $this->belongsTo('App\Lang');
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
