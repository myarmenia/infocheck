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





// Auth::routes();
// Auth::routes(['verify'=>true]);



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

    Route::get('/', 'IndexController@index')->name('index_page');
    Route::get('/post/{category_name}', 'OpenCategoryPosts@index')->name('category_posts');
    Route::get('/posts/{unique_id}/{title}', 'OpenSinglePost@index')->name('single_post');
    Route::get('/tags/{tag_name}', 'CurrentTagPosts@index');
    Route::get('/faqs', 'ShowAllFaqs@index')->name('faqs');
    Route::get('/posts/comment/{id}', 'OpenSinglePost@add_new_comment')->name('single_post.add_new_comment');

    // Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    // Route::post('login', 'Auth\LoginController@login');
    // Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    // Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    // Route::post('register', 'Auth\RegisterController@register');


    // Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
    // Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
    Auth::routes();
    Auth::routes(['verify'=>true]);



Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/admin_home', 'HomeController@admin_home')->name('admin_home')->middleware(['role:i_admin']);
Route::get('home/add_question', 'HomeController@add_question')->name('add_question')->middleware(['role:i_user','verified']);
Route::get('home/add_comment', 'HomeController@add_comment')->name('add_comment')->middleware(['role:i_user','verified']);
});



Route::get('/', function () {
    return redirect(app()->getLocale());
});

Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');

//Route::get('{locale}/password/resetform/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.resetform');
//Route::get('{locale}/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//Route::post('password/email', 'Auth/ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');



