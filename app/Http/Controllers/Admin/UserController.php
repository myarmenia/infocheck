<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Lang;

class UserController extends Controller
{
    public function index($locale)
    {
        $users = User::with('roles', 'identities')->get();

        // dd($users);

        return view('admin.user.index', [
            'page_name'=> 'users',
            'users' => $users,
            'langs' => Lang::all(),
        ]);
    }

    public function changeStatus(Request $request,$locale, $id)
    {
        if (!User::find($id)) {
            return redirect()->back()->with('oneerror', 'Can not find User with ID='.$id);
        }
        User::where('id', $id)->update(['status'=>$request->status]);
        return redirect()->back()->with('success', 'Status of User №-'.$id.' was successfully changed');
    }
}
