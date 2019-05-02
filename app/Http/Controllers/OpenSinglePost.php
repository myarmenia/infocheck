<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Lang;
use App\Tag;
use App\Document;
use App\Comment;
use App\User;


class OpenSinglePost extends Controller
{

    public function index($locale,$unique_id,$title){
        $lng=Lang::all();
        $lang_id=Lang::getLangId($locale);
        $category=Category::get_category($lang_id);
        $most_viewed=Post::where('lang_id',$lang_id)->orderBy('view','desc')->limit(5)->get();
        $post=Post::where('lang_id',$lang_id)->where('unique_id',$unique_id)->get();
        $load_all_tags=Tag::load_all_tags($lang_id);
        $document=Document::with('documentable')->where('documentable_id',$unique_id)->where('isused',1)->get();
        $id=$post[0]->id;
        $post_tags = Post::find($id)->tagArray;
        $comments=Comment::getComments($id);


 //return $id;

  //return $load_all_tags;
        $data = array(
            'menu' => $category,
            'post'=>$post,
            'most_viewed'=>$most_viewed,
            'load_all_tags'=> $load_all_tags,
            'docs'=>$document,
            'post_tags'=>$post_tags,
            'comments'=>$comments,
            'id'=>$id,
            'lng'=> $lng

            );
            return view('single_post',compact('data'));

    }

    public function add_new_comment(Request $request,$locale,$idd){




        return $idd;

    }
}
