<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserHomeController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make("home.index");
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

    }


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $users=User::where("id","=",$id)->get();
        if($users[0]->flag=="y") {
//        print($users);
            Session::put("users", $users);
//        Session::put("userssss", "[".json_decode(Auth::user())."]");
//        print (Session::get("userssss"));
//        exit();
            $category = Category::all();
            $post = Post::orderBy("id", "desc")->paginate(4);
            return View::make("home.index", array("category" => $category, "posts" => $post));
        }else{
            return View::make("login.index")->WithErrors("Pended For Admin Approval");
        }
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

    public function getCategory($id,$category)
    {

        $post=Post::where("category","=",$category)->orderBy("id","desc")->paginate(4);
        $category=Category::all();
        return View::make("home.index",array("category"=>$category,"posts"=>$post));
    }
}
