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

/*
| Links for Social-login API's
| As you can see, we have 2 methods added into LoginController of Auth.
*/
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback','Auth\LoginController@handleProviderCallback');


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



    Auth::routes();
    Auth::routes(['verify'=>true]);

    // Prevent reseting mail-pass and registration
    Route::match(['get', 'post'], 'password/reset', function(){
        return redirect()->route('login', app()->getLocale());
    });
    Route::match(['get', 'post'], 'password/email', function(){
        return redirect()->route('login', app()->getLocale());
    });

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/admin_home', 'HomeController@admin_home')->name('admin_home')->middleware(['role:i_admin']);
Route::get('home/add_question', 'HomeController@add_question')->name('add_question')->middleware(['role:i_user','verified']);
Route::get('home/add_comment', 'HomeController@add_comment')->name('add_comment')->middleware(['role:i_user','verified']);
});

Route::get('/', function () {
    return redirect(app()->getLocale());
});

Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');

// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Route::get('{password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::group([
    'prefix'=>'{locale}/admin',
    'where' => ['locale' => '[a-zA-Z]{2}'],
    'namespace'=>'Admin',
    'middleware' => ['role:i_admin','localize'],
    ], function () {

        Route::get('/', 'DashboardController@index')->name('admin.index');
        Route::post('poster/update', 'DashboardController@updatePosterType')->name('admin.poster.update');

        Route::resource('category', 'CategoryController', ['as'=>'admin']);
        Route::post('category/position/update','CategoryController@positionUpdate')->name('admin.category.position.update');

        Route::resource('question', 'QuestionController', ['as' => 'admin']);
        Route::get('question/post/{q_id}', 'QuestionController@post')->name('admin.question.post');

        Route::resource('post', 'PostController', ['as'=>'admin']);
        Route::get('post/create/{q_id?}', 'PostController@create')->name('admin.post.create');
        Route::get('post/translate/{id}', 'PostController@translate')->name('admin.post.translate');

        Route::post('/document/uploadimage', 'DocumentController@uploadimage')->name('admin.document.uploadimage');
        Route::post('/document/uploadfile', 'DocumentController@uploadfile')->name('admin.document.uploadfile');
        Route::post('/document/savedocstatus', 'DocumentController@savedocstatus')->name('admin.document.savedocstatus');

});
