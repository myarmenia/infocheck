<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;

class OpenCategoryPosts extends Controller
{
    public function index($category_name){
        $category=Category::get_category();
        $post_test=Post::get_cur_posts($category_name);
        //return $post_test;
        $posts=Category::with('get_category_posts')->where('name',$category_name)->get();
        $name=$posts[0]->name;
 //return $posts[0]->name;
        $data = array(
            'menu' => $category,
             'posts_category'=>$name,
            'post_test'=> $post_test
            );


            return view('category_posts',compact('data'));

    }
}
