<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;
use App\User;
use App\Lang;

class EmailController extends Controller
{


/* CUSTOM-EMAIL------ */
    public function compose($locale, $id)
    {
        $user = User::find($id);
        $langs = Lang::all();
        return view('admin.emails.compose',[
            'page_name' => 'users',
            'langs'=>$langs,
            'user'=>$user,
        ]);
    }



    /*
    |
    | sending Email from Users-menu-item
    | return back to compose with sending status
    */
    public function send(Request $request, $locale)
    {

        $params = $request->all(); // is_array
        // return new MailNotify($params); // for see view quiqly

        Mail::to($params['email'])->send(new MailNotify($params));
        if (Mail::failures()) {
            return redirect()->back()->with('oneerror', 'Mail was not sent');
        }else{
            return redirect()->back()->with('success', 'Mail was successfully sent');
        }

    }
}
