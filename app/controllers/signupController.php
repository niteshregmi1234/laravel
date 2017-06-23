<?php

class signupController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make("signup.index");
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
    {

        $username = Input::get("username");
        $password = Input::get("password");
        $role = Input::get("role");
        $rules = array(
            'username' => 'required|max:255',
            'password' => 'required|min:8|max:255',
            'role' => 'max:255'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to("signup")->withErrors($validator);
        } else {
            if ($role == "author" || $role == "" || $role == "admin") {

                $user = new  User();
                $users=User::Where(strtolower("username"),"=",strtolower(Input::get("username")) )->get();
                if($users!="[]"){
                    return Redirect::to("signup")->withErrors("Username Already Exists");
                }
                $user->username = $username;
                $user->password = Hash::make($password);
                $user->flag = "n";
//                $user->password = Crypt::encrypt("$password");
                if ($role == "author" || $role == "") {
                    $user->role = "author";
                } else {
                    $user->role = "admin";
                }
//                dd($user);

                $user->save();
                return Redirect::to("login")->withErrors("Your account has been created ! Please login");
            } else {
                return Redirect::to("signup")->withErrors("Role should be author or admin");
            }
        }

    }


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
