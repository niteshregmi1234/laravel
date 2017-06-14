<?php

class CategoryController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
//	    print(Carbon\Carbon::now());
        return View::make("category.category");
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
        $rules= array(
            'category' => 'required|max:255',
        );
        $validator= Validator::make(Input::all(),$rules);
//
        if ($validator->fails()){
            return Redirect::route("category.index")->withErrors($validator);
        }else{
            $categoryDb=Category::where("category","=",strtolower(Input::get("category")))->get();
            if($categoryDb=="[]"){
                $category = new  Category();
                $category->category=strtolower(Input::get("category"));
                $category->save();
                Session::flash("message","Category Created");
                return Redirect::route("category.index");
//                 return redirect()->route(resource.show,Input::get("id"));
            }else{
                Session::flash("message","Category Already Exists");
                return Redirect::route("category.index");
//                  $username=Input::get("username");
//                    return Redirect::to("home")->with("users",$users);
//                foreach($category as $category)
//                    return Redirect::route("home.show",$user->id);
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
