<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





Auth::routes();

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/admin_home', 'HomeController@admin_home')->name('admin_home')->middleware(['role:i_admin']);

Route::get('home/add_question', 'HomeController@add_question')->name('add_question')->middleware(['role:i_user']);

Route::get('home/add_comment', 'HomeController@add_comment')->name('add_comment')->middleware(['role:i_user']);


/*
| Links for Social-login API's
| As you can see, we have 2 methods added into LoginController of Auth.
*/
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback','Auth\LoginController@handleProviderCallback');

// , 'locale' =>'(am|en|ru)'
Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => '[a-zA-Z]{2}'],
    'middleware' => ['localize']
    ], function () {
    Route::get('/', function () {
        return view('welcome');
    });

    // Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
});

Route::get('/', function () {
    return redirect(app()->getLocale());
});
