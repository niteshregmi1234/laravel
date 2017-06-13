<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::resource('login', 'LoginController');
Route::resource('home', 'UserHomeController');
Route::resource('signup', 'signupController');
Route::resource('post', 'PostController');
Route::resource('category', 'CategoryController');
Route::post('check', array("as"=>"check","uses"=>'PostController@check'));
Route::get('delete/{id}', array("as"=>"delete","uses"=>'PostController@destroy'));
//Route::get('check', 'PostController@check');
//Route::get('login', 'LoginController@index');
//Route::post('home','LoginController@store');
// Route::get('{username}/home','UserHomeController@index');
// Route::get('signup','signupController@index');
// Route::post('signupuser','signupController@store');
// Route::get('show','LoginController@show');
// Route::get('user', function()
// {
//    return Redirect::route('hello');
// });

// Route::controller('users', 'UserController');
// Route::resource('user', 'UserController');
// Route::resource('user', 'UserController',
//                 array('only' => array('index')));

// Route::get('login', function () {
//     return View::make('login/index');
// });

// Route::get('signup/index', 'CategoriesController@index');
// Route::post('signup/destroy', 'CategoriesController@destroy');


//Route::get('user', function()
//{
//    return 'Hello World';
//});