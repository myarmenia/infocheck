<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Lang;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    protected $folder_name = 'posts';
    protected $validImageExp = ['jpg','png','jpeg','pjpeg','bmp', 'gif', 'svg'];


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $post = Post::find(4);
        // dd($post->questions()->exists());

        $lang_id = Lang::getLangId(app()->getLocale());
        $posts = Post::where('lang_id', $lang_id)->with('getCategory')->orderBy('id', 'desc')->paginate(10);
        return view('admin.post.index', [
            'page_name' => 'posts',
            'langs' => Lang::all(),
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($locale, $q_id=0)
    {
        //return $q_id; // if q_id > 0 ; user wants to create post as an aswer for 'q_id'-question

        $max_unique_id = Post::max('unique_id');
        $next_unique_id = $max_unique_id + 1;


        // $last_id_array = DB::select("SELECT  AUTO_INCREMENT
        //                         FROM    information_schema.TABLES
        //                         WHERE   (TABLE_NAME = 'posts')");

        // $last_id = $last_id_array[0]->AUTO_INCREMENT;

        // second cycle, when after uploading files redirect back //
        $images = Storage::files('public/'.$this->folder_name.'/'.$next_unique_id); // this are images //
        $imageurls = [];
        for ($i=0; $i < count($images) ; $i++) {
            $imageurls[$i]['url'] = Storage::url($images[$i]);
            $imageurls[$i]['size'] = $size = Storage::size($images[$i]);
        }


        $lang_id = Lang::getLangId(app()->getLocale());
        $categories = Category::where('lang_id', $lang_id)->get();
        $allTags = Post::getTagsByLangId($lang_id);
        // return $allTags;

        return view('admin.post.create', [

            'page_name' => 'posts',
            'langs' => Lang::all(),
            'lang_id' => $lang_id,
            'next_unique_id' => $next_unique_id,
            'folder_name' => $this->folder_name,
            'imageurls' => $imageurls,

            'post' => [],
            'categories' => $categories,
            'tags' => $allTags,
            'q_id' => $q_id,
        ]);


    }

    public function translate($locale ,$id) {
        return 'Here we will creating new Post as translation for Post N-'.$id;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $locale)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // edit-button here
        return 'This page will show Post-content and "EDIT"-button to update content';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($locale, $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($locale, $id)
    {
        //
    }
}
