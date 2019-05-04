<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Category;
use App\Post;
use App\Lang;
use App\Tag;

class ArchievesController extends Controller
{

    public function openArchieve($locale,$date)
    {
            $lang_id=Lang::getLangId($locale);
            $calendar= Event::event($locale);
            $posts_archieve= Post::get_archieve($date,$lang_id);
            $category=Category::get_category($lang_id);
            $load_all_tags=Tag::load_all_tags($lang_id);
            $most_viewed=Post::where('lang_id',$lang_id)->orderBy('view','desc')->limit(5)->get();


      //return $posts_archieve;
            $data = array(
                'menu' => $category,
                'load_all_tags'=> $load_all_tags,
                'event'=> $calendar,
                'posts_archieve'=>$posts_archieve,
                'most_viewed'=>$most_viewed,
                'date'=>$date,
                'call'=>'archieve',

                );
                return view('archieve',compact('data'));

        }

}
