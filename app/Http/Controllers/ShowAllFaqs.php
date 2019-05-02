<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Lang;
use App\Tag;
use App\Question;
use App\Answer;



class ShowAllFaqs extends Controller
{
    public function index($locale){
        $lng=Lang::all();
        $lang_id=Lang::getLangId($locale);
        $category=Category::get_category($lang_id);
        $load_all_tags=Tag::load_all_tags($lang_id);
        $most_viewed=Post::where('lang_id',$lang_id)->orderBy('view','desc')->limit(5)->get();
        $questions=Question::with('question')->with('user')->where('visible',1)->get();




 //return $questions[0];
        $data = array(
            'menu' => $category,
            'load_all_tags'=> $load_all_tags,
            'question'=>$questions,
            'most_viewed'=>$most_viewed,
            'lng'=>$lng
            );

            return view('faqs',compact('data'));

    }
}
