<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Post;
use App\Poster;
use App\Lang;
use App\Event;
use Illuminate\Support\Facades\Route;

class IndexController extends Controller
{
    public function index($locale){


        $lng=Lang::all();
        $lang_id=Lang::getLangId($locale);
        $calendar= Event::event($locale);
        $cat=[];
        $cat_name=[];
        $posts_by_menu=array();
        $category=Category::get_category($lang_id);
        foreach($category as $item){
            array_push($cat,$item->id);
        }
        foreach($category as $item){
            array_push($cat_name,$item->name);
        }

        foreach($category as $item){
            $id=$item->id;
            $post=Post::with('getCategory')->where('category_id',$item->id)->where('lang_id',$lang_id)->orderBy('date', 'desc')->limit(4)->get();
            array_push($posts_by_menu,array($id=>$post,"name"=>$item->name, "layout"=>$item->layout));
        }

        $main_poster_layout=Poster::get_poster_layout();
        $main_post_big = Post::with('getCategory')->where('status','main')->where('lang_id',$lang_id)->get();
        $main_post_small = Post::with('getCategory')->where('status','published')->where('lang_id',$lang_id)->orderBy('date', 'desc')->limit(4)->get();
 //return $locale;
        $data = array(
            'menu' => $category,
            'posts_by_menu'=>$posts_by_menu,
            'layout'=>$main_poster_layout[0]->layout,
            'id'=>$cat,
            'big_post'=>$main_post_big[0],
            'small_post'=>$main_post_small,
            'lng'=>$lng,
            "event"=> $calendar,
            'item_id'=>null

            );
           // return $data['small_post'][0]->title;
            return view('index',compact('data'));

    }
    public function error($locale){



            $data = array('call' => '404', );

                return response()->view('errors.' . 'error', compact('data'), 404);




    }


}
