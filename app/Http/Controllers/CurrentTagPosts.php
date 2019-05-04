<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Lang;
use App\Tag;
use App\Event;

class CurrentTagPosts extends Controller
{
    public function index($locale,$tag_name){
        $lang_id=Lang::getLangId($locale);
        $category=Category::get_category($lang_id);
        $calendar= Event::event($locale);
        $load_all_tags=Tag::load_all_tags($lang_id);
        $most_viewed=Post::where('lang_id',$lang_id)->orderBy('view','desc')->limit(5)->get();
        $all_Posts = Post::where('status','<>','not_published')->whereHas('tags', function($query) use ($tag_name) {
            $query->whereName($tag_name);
        })->paginate(6);

 //return $all_Posts;
        $data = array(
            'menu' => $category,
            'load_all_tags'=> $load_all_tags,
            'post_test'=> $all_Posts,
            'most_viewed'=>$most_viewed,
            "event"=> $calendar,
            'call'=>'tags',
            'tag_name'=>$tag_name



            );
            return view('tags_posts',compact('data'));

    }
}
