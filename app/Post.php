<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentTaggable\Taggable;
use DB;

class Post extends Model
{
    use Taggable;

    protected $fillable = [
        'unique_id', 'title', 'short_text', 'html_code', 'img', 'date', 'status', 'meta_k', 'meta_d', 'category_id',  'lang_id'
    ];

    public function getCategory() {
        return $this->hasOne('App\Category', 'id', 'category_id');
    }

    public function getDocuments() {
        return $this->morphMany('App\Document', 'documentable');
    }

    public function getComments() {
        return $this->hasMany('App\Comment', 'post_id', 'id');
    }

    public function questions() {
        return $this->morphOne('App\Question', 'questionable');
    }

    static function get_cur_posts($category_name,$lang_id){
        return $posts = DB::table('categories')
        ->where('categories.name',$category_name)
        ->where('categories.lang_id',$lang_id)
        ->orderByRaw('date DESC')
        ->select('*')
        ->join('posts', 'categories.id', '=','posts.category_id' )
        ->paginate(6);
        }
        static function get_archieve($date,$lang_id){
            return $posts = DB::table('posts')
            ->where('lang_id',$lang_id)
            ->where('date',$date)
            ->where('status','=','published')
            ->orderByRaw('id DESC')
            ->paginate(6);
            }



}
