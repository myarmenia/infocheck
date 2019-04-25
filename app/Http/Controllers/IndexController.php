<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;


class IndexController extends Controller
{
    public function index(){
        $cat=[];
        $cat_name=[];
        $posts_by_menu=array();
        $category=Category::get_category();
        foreach($category as $item){
            array_push($cat,$item->id);
        }
        foreach($category as $item){
            array_push($cat_name,$item->name);
        }

        for($i=0; $i<count($cat); $i++){
            $id=$cat[$i];
            $name=$cat_name[$i];

            $post=Post::with('getCategory')->where('category_id',$id)->where('lang_id',1)->orderBy('date', 'desc')->limit(4)->get();
            array_push($posts_by_menu,array($id=>$post,"name"=>$name));

        }

    //return $posts_by_menu;
        $data = array(
            'menu' => $category,
            'posts_by_menu'=>$posts_by_menu,
            'section_name'=>$cat_name,
            'id'=>$cat,
            );

            return view('index',compact('data'));

    }
}
