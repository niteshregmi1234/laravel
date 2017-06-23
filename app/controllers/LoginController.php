<?php
use Illuminate\Http\Request;

class LoginController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make("login.index");
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
////        $username=Input::get("username");
//	    $rules= array(
//                'username' => 'required|max:255',
//                'password' => 'required|min:8|max:255',
//                'role' => 'max:255'
//            );
//            $validator= Validator::make(Input::all(),$rules);
////
//           if ($validator->fails()){
//           return Redirect::route("login.index")->withErrors($validator);
//	      }else{
//               $users=Userin::where("username","=",Input::get("username"))
//                   ->where("password","=",Input::get("password"))->get();
//               if($users=="[]"){
//                   print("here man");
//                   Session::flash("message","Authentication Error Please Re-login ");
//                   return Redirect::route("login.index");
////                 return redirect()->route(resource.show,Input::get("id"));
//               }else{
////                  $username=Input::get("username");
////                    return Redirect::to("home")->with("users",$users);
//                   foreach($users as $user)
//                   return Redirect::to("home/$user->id");
//               }
//
//        }

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
    {

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
