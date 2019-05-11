<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;

class CommentController extends Controller
{
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
}
