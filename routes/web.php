<?php

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
use App\User;
use App\Http\Resources\UserResource;
Route::get('/', function () {
    return view('auth.login');
})->middleware('verified');


Route::get('/register', 'RegisterController@register');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

/* Posts routes start */
Route::get('/post/add', 'PostController@create');
Route::post('/post/add', 'PostController@store');
Route::get('/post/{id}', 'PostController@show');
Route::get('/posts/myPosts/{id}', 'PostController@index');
Route::get('/post/edit/{id}', 'PostController@edit');
Route::post('/post/edit/{id}', 'PostController@update');
Route::get('/post/delete/{id}', 'PostController@destroy');
/* Posts routes end */

/* Comments routes start */
Route::post('/post/comment/{id}', 'CommentController@store');
Route::get('/post/comment/edit/{id}', 'CommentController@edit');
Route::post('/post/comment/edit/{id}', 'CommentController@update');
Route::get('/post/comment/delete/{id}', 'CommentController@destroy');
/* Comments routes end */

/* Admin routes start */
//Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function(){
Route::get('/admin/dashboard', 'AdminController@index')->name('admin');
Route::get('/admin/users', 'AdminController@users');
Route::get('/admin/users/{id}/delete', 'AdminController@deleteUser');
Route::get('/admin/posts', 'AdminController@posts');
Route::get('/admin/posts/{id}/approve', 'AdminController@approvePost');
Route::get('/admin/posts/{id}/hide', 'AdminController@hidePost');
Route::get('/admin/posts/{id}/delete', 'AdminController@deletePost');
//});

/* Admin routes end */

Route::get('/user', function () {
    return new UserResource(User::find(1));
});