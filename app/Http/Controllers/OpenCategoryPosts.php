<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Lang;
use App\Event;


class OpenCategoryPosts extends Controller
{
    public function index($locale,$category_item_id){
        $lng=Lang::all();
        $lang_id=Lang::getLangId($locale);
        $category=Category::get_category($lang_id);
        $cat_name=Category::where('item_id',$category_item_id)->where('lang_id',$lang_id)->get();
        $category_name=$cat_name[0]->name;
        $calendar= Event::event($locale);
        $post_test=Post::get_cur_posts($category_name, $lang_id);
        $most_viewed=Post::where('lang_id',$lang_id)->orderBy('view','desc')->limit(5)->get();
        $posts=Category::with('get_category_posts')->where('name',$category_name)->get();
        $name=$posts[0]->name;
        if(count($post_test)>0){
            $not_found = 'found';
        }
        else{
            $not_found = trans('text.not_find');

        }
        $data = array(
            'menu' => $category,
            'posts_category'=>$name,
            'post_test'=> $post_test,
            'most_viewed'=>$most_viewed,
            'lng'=>$lng,
            "event"=> $calendar,
            'item_id'=>$category_item_id,
            'call'=>'category_item_id',
            'not_found'=>$not_found

            );

        return view('category_posts',compact('data'));

    }
}
