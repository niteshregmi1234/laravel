<?php

class PostController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
//        $category=Category::all();
//        Session::put("category",$category);
        return View::make("post.allPost");

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        //        $category=Category::all();
//        Session::put("category",$category);


    }


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        {

//            $username = Input::get("username");
//            $password = Input::get("password");
//            $role = Input::get("role");
//            print(Input::get("category"));
            $rules = array(
                'title' => 'required|max:255',
                'description' => 'required|min:8|max:255',
                'category' => 'max:255',
                'author' => 'required|max:255',
                'slug' => 'required|alpha_dash|min:5|max:255'


            );
            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails()) {
                return Redirect::to("post")->withErrors($validator);
            } else {

                $post = new Post();
                $post->category = Input::get("category");
                $post->description = Input::get("description");
                $post->slug = Input::get("slug");
                $post->author = Input::get("author");
                $post->title = Input::get("title");
                $post->save();
                return Redirect::to("post")->withErrors("Post is Successfully Created !! ");
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
        $category=Category::all();
        Session::put("category",$category);
        return View::make("post.post");
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
