<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Category;
use App\Post;
use App\Lang;
use App\Tag;
use App\AboutCompany;

class About_us extends Controller
{
    public function index($locale)
    {
            $lang_id=Lang::getLangId($locale);
            $calendar= Event::event($locale);
            $category=Category::get_category($lang_id);
            $load_all_tags=Tag::load_all_tags($lang_id);
            $most_viewed=Post::where('lang_id',$lang_id)->orderBy('view','desc')->limit(5)->get();
            $body=AboutCompany::where('lang_id',$lang_id)->get();


   // return $body[0];
            $data = array(
                'menu' => $category,
                'load_all_tags'=> $load_all_tags,
                'event'=> $calendar,
                'most_viewed'=>$most_viewed,
                'body'=>$body,
                'call'=>'archieve',

                );
                return view('about',compact('data'));

        }
}
