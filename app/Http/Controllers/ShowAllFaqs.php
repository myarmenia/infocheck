<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Category;
use App\Post;
use App\Lang;
use App\Tag;
use App\Question;
use App\Answer;
use App\Event;




class ShowAllFaqs extends Controller
{
    public function index($locale){
        $lng=Lang::all();
        $lang_id=Lang::getLangId($locale);
        $calendar= Event::event($locale);
        $category=Category::get_category($lang_id);
        $load_all_tags=Tag::load_all_tags($lang_id);
        $most_viewed=Post::where('lang_id',$lang_id)->orderBy('view','desc')->limit(5)->get();
        $questions=Question::with('question')->with('user')->with('post')->where('visible',1)->get();




//return $questions[0];
        $data = array(
            'menu' => $category,
            'load_all_tags'=> $load_all_tags,
            'question'=>$questions,
            'most_viewed'=>$most_viewed,
            'lng'=>$lng,
            "event"=> $calendar,
            'item_id'=>null
            );

            return view('faqs',compact('data'));

    }
    public function leave_question(Request $request,$locale){

return $request;
        $folder_name = $request->input('folder_name');
        $files = $_FILES['files'];

        $post_id = $request->input('post_id');
        $total = count($_FILES['files']['name']);
        $validFile = ["application/x-javascript", "application/sql", "application/x-php"];
        $flDebug = [];
        $errors = [];

        for($i = 0; $i < $total; $i++) {
            if($_FILES['files']['tmp_name'][$i] != "") {
                if(!in_array($_FILES['files']['type'][$i], $validFile)  ) {

                    $flDebug['success'][$i]['url'] =  $_FILES['files']['tmp_name'][$i];
                    $flDebug['success'][$i]['name'] = $_FILES['files']['name'][$i];
                    $path = Storage::disk('public')->putFileAs($folder_name.'/'.$post_id, new File($_FILES['files']['tmp_name'][$i]), $_FILES['files']['name'][$i]);
                    $path2 = Storage::disk('upload')->putFileAs($folder_name.'/'.$post_id, new File($_FILES['files']['tmp_name'][$i]), $_FILES['files']['name'][$i]);
                    $flDebug['success'][$i]['path'] = Storage::url($path);
                    $flDebug['success'][$i]['size'] = $_FILES['files']['size'][$i];;
                }
                else{
                    $flDebug['errors'][$i]['message'] =  $_FILES['files']['name'][$i] . ' has not proper type! -> '.$_FILES['files']['type'][$i];
                }
            }
        }









    }
}
