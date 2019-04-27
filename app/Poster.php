<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Poster extends Model
{
    public $timestamps = false;
    protected $fillable = ['layout', 'status'];

    static function get_poster_layout(){
        return $posts = DB::table('posters')
        ->select('posters.layout')
        ->where('status',1)
        ->get();
        }
}
