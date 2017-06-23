<?php


use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Auth;

class LoginsController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */

    public function authenticate()
    {


        if (Auth::attempt(array('username' => Input::get("username"), 'password' => Input::get("password")),false))
        {

//            print( Auth::user());

//            print(Session::get("users"));
//            dd(Auth::user());
//            Auth::login(Auth::user(),false);
            return Redirect::to('home/'.Auth::id());
        }else{
            Session::flash("message","Authentication Error Please Re-login ");
            return Redirect::route("login.index");
        }
    }
}