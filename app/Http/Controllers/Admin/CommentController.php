<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;
use App\Lang;

use App\Comment;
use Illuminate\Database\Eloquent\Builder;

class CommentController extends Controller
{

    public function index($locale) {

        $lang_id = Lang::getLangId($locale);
        $comments = Comment::on('mysql_admin')->where('lang_id', $lang_id)->with('user','post:id','lang')->paginate(10);

        // dd($comments);
        return view('admin.comment.index', [
            'page_name'=>'comments',
            'comments' => $comments,
            'langs' => Lang::all(),
        ]);


    }
    public function savecommentstatus(Request $request, $locale) {
        $reqAll = $request->all();
        // return $reqAll;
        $comment = $reqAll['comment'];
        // return $comment;
        $updateComm = [];
        foreach($comment as $key => $value) {
            $updateComm[] = ['id' => $key, 'approved' => $value, 'body' => $reqAll['body']];
            Comment::on('mysql_admin')->find($key)->update(['body' => $reqAll['body'],'approved' => $value]);
        }

        // return $updateComm;
        $commentID = $updateComm[0]['id'];
        return redirect()->back()->with(['success' => "Status of comment №$commentID was successfully changed."]);
    }

    public function changeStatus(Request $request, $locale) {
        $comment = Comment::on('mysql_admin')->find($request->id);
        if (!$comment) {
            return redirect()->back()->with('oneerror', 'Can not find Comment №-'.$request->id);
        }

        $comment->update([
            'approved' => $request->approved,
        ]);
        return redirect()->back()->with('success', 'Comment №-'. $comment->id .' was successfully updated');
    }
}
