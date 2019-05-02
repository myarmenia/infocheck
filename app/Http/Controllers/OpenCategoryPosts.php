<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Lang;

class OpenCategoryPosts extends Controller
{
    public function index($locale,$category_name){
        $lng=Lang::all();
        $lang_id=Lang::getLangId($locale);
        $category=Category::get_category($lang_id);
        //return $category;
        $post_test=Post::get_cur_posts($category_name, $lang_id);
        $most_viewed=Post::where('lang_id',$lang_id)->orderBy('view','desc')->limit(5)->get();
        //return $post_test;
        $posts=Category::with('get_category_posts')->where('name',$category_name)->get();
        $name=$posts[0]->name;
// return $most_viewed;
        $data = array(
            'menu' => $category,
            'posts_category'=>$name,
            'post_test'=> $post_test,
            'most_viewed'=>$most_viewed,
            'lng'=>$lng
            );
            return view('category_posts',compact('data'));

    }
}
