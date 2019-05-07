<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Lang;
use App\Post;
use App\Event;
use App\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{

    protected $folder_name = 'posts';
    protected $validImageExp = ['jpg','png','jpeg','pjpeg','bmp', 'gif', 'svg'];
    /*  Admin-connection: mysql_admin */


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
        $posts = Post::where('lang_id', $lang_id)->with('getCategory', 'lang')->orderBy('id', 'desc')->paginate(10);
        // dd($posts);
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
        $post = Post::with('getCategory')->find($id);
        // dd($post->getCategory()->first()->item_id);
        $lang_id = Lang::getLangId(app()->getLocale());

        $categories = Category::where('lang_id',$lang_id)->get();
        $allTags = Post::getTagsByLangId($lang_id);

        $images = Storage::files('public/'.$this->folder_name.'/'.$post->unique_id); // this are images //
        $imageurls = [];
        for ($i=0; $i < count($images) ; $i++) {
            $imageurls[$i]['url'] = Storage::url($images[$i]);
            $imageurls[$i]['size'] = $size = Storage::size($images[$i]);
        }



        // return 'Here we will creating new Post as translation for Post N-'.$id;
        return view('admin.post.translate',[
            'page_name' => 'posts',
            'langs' => Lang::all(),
            'lang_id' => $lang_id,

            'next_unique_id' => $post->unique_id,
            'folder_name' => $this->folder_name,
            'imageurls' => $imageurls,

            'currentPost' => $post,
            'post' => [],
            'categories' => $categories,
            'tags' => $allTags,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $locale)
    {

        $validator = Validator::make($request->all(),[
            'category_id' => 'required|integer',
            'title' => 'required|string',
            'short_text' => 'required|string',
            'html_code' => 'required|string',
            'img' => 'required|string',
            'meta_k' => 'required|string',
            'meta_d' => 'required|string',
            'view' => 'required|integer',
            'lang_id' => 'required|integer',
            'unique_id' => 'required|integer',
            'date' => 'required|date',
            'status' => 'required|string',
            'tags' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $post_exists = Post::where('unique_id',$request->unique_id)->where('lang_id',$request->lang_id)->first();
        if ($post_exists) {
            $language = $post_exists->lang()->get()->toArray();
            $lng_name = $language[0]['lng_name'];
            return redirect()->back()->with('oneerror', 'Post with Unique ID = '.$request->unique_id. ' in '.$lng_name . ' already exists.');
        }

        $post = Post::on('mysql_admin')->create($request->all()); // work fine +
        $post_id = $post->id;
        $unique_id = $post->unique_id;
        $language = $post->lang()->get()->toArray();
        $lng_name = $language[0]['lng_name'];


        // return redirect()->back()->with('success', 'New Post pi-'.$post_id.' ui-'.$unique_id.' was created successfuly');

        // store tags into taggable_tags
        if ($request->input('tags')) {

            $tagsString = $request->tags;
            $tagsArray = explode(",",$tagsString);

            $post->tag($tagsArray);

            for ($i=0; $i < count($tagsArray); $i++) {
                DB::connection('mysql_admin')->table('taggable_tags')
                ->where('name', $tagsArray[$i])
                ->update(['lang_id' => $request->input('lang_id') ]);
            }
        }



        // save as event to show into Calendar
        Event::checkAndSaveIfNotExists($request->input('date'), $request->input('lang_id'));

        // update lang_id into taggable_taggables
        DB::connection('mysql_admin')->table('taggable_taggables')
        ->where('taggable_type', 'App\\Post')
        ->where('taggable_id', $post_id)
        ->update(['lang_id' => $request->input('lang_id') ]);



        // check and replace other posts with status = "main"
        if($post->status == 'main') {
            $mainPosts = Post::where('status','=', 'main')->where('lang_id','=',$post->lang_id)->get();
            // return $mainPosts;
            if(count($mainPosts) > 1) {
                foreach ($mainPosts as $key => $mainPost) {
                   if($mainPost->id != $post->id) {
                       Post::on('mysql_admin')->find($mainPost->id)->update(['status' => 'published']);
                   }
                }
            }
        }

        return redirect()->back()->with('success', 'Post with Unique-ID = '.$unique_id.' in '.$lng_name.' was successfuly created!');


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
