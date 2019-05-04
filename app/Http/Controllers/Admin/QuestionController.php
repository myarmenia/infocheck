<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question;
use App\Lang;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lang_id = Lang::getLangId(app()->getLocale());
        // $questions = Question::where('lang_id', $lang_id)->with('questionable','user','lang')->get();
        $questions = Question::where('lang_id', $lang_id)->with('user', 'getDocuments')->paginate(10);
        // dd($questions);

        return view('admin.question.index', [
            'page_name' => 'questions',
            'langs' => Lang::all(),
            'questions' => $questions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function post($locale, $id) {
        return 'For Repliing Select from exists Post-List or create new one by clicking here "create-new-post"';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     * @link to download from blade $flink
     * @here $flink = asset('/storage/questions/2/example.docx');
     *
     * @add /storage/ before link
     * @here $furl = Storage::url('questions/2/example.docx');
     */
    public function edit($locale, $id)
    {
        // reject from question here
        $question = Question::with('user', 'getDocuments')->find($id);
        $language = $question->lang()->get()->toArray();
        return view('admin.question.edit', [
            'page_name' => 'questions',
            'question' => $question,
            'langs' => Lang::all(),
            'lng_name' => $language[0]['lng_name'],
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$locale, $id)
    {
        // return $request->all();
        $validator = Validator::make($request->all(),[
            'body' => 'required|string',
            'lang_id' => 'required|integer',
            'visible' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withInput()->withErrors($validator);
        }
        $question = Question::find($id);
        $question->lang_id = $request->lang_id;
        $question->body = $request->body;
        $question->visible = $request->visible;
        $question->save();

        return redirect()->back()->with('success', 'Question № -'.$id.' was successfuly updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
