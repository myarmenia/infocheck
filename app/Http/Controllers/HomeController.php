<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth' ]); //'verified'
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // $request->user()->authorizeRoles(['employee', 'manager', 'i_user', 'i_admin']); // boolean
        return view('home');
    }

    public function admin_home(Request $request) {
        // $request->user()->authorizeRoles(['i_admin']);
        return 'hey';
    }

    public function add_question(Request $request) {
        return 'add your question';
    }

    public function add_comment(Request $request) {
        return 'add your add_comment';
    }
}
