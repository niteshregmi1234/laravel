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



Route::group(array('before' => 'auth'), function(){
    Route::get('blog/{slug}', array("as"=>"get.single","uses"=>'BlogSlugController@getSingle'));
    Route::get('regis', array("as"=>"get.regis","uses"=>'RegistrationController@getRegistration'));
    Route::get('regis/{id}', array("as"=>"get.approve","uses"=>'RegistrationController@getApprove'));
    Route::post('post/search', array("as"=>"get.search","uses"=>'PostController@getSearch'));
    Route::get('home/{id}/{category}', array("as"=>"get.category","uses"=>'UserHomeController@getCategory'));
    Route::resource('home', 'UserHomeController');
    Route::resource('post', 'PostController');
    Route::get('download', array("as"=>"download","uses"=>'PostController@downloadPdf'));
    Route::resource('category', 'CategoryController');
    Route::post('check', array("as"=>"check","uses"=>'PostController@check'));
    Route::get('delete/{id}', array("as"=>"delete","uses"=>'PostController@destroy'));
//    Route::resource('logout', 'LogoutController');
});

Route::resource('login', 'LoginController');
Route::resource('signup', 'signupController');
Route::post('logins', array("as"=>"logins","uses"=>'LoginsController@authenticate'));
Route::resource('logout', 'LogoutController');




//Route::post('login', function() {
//    $credentials = array('username' => Input::get("username"), 'password' => Input::get("password"));
////    dd($credentials);
////    dd(Auth::attempt($credentials, true));
//
//    if(Auth::attempt($credentials)){
//
////        Auth::login(Auth::user(), true);
//
//        // print user information
////        print_r(Auth::user());
//
//        //redirect back to homepage
//        return "i am here";
//    } else {
//        return "i ma not  here";
//    }
//
//});






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