<?php

class PostController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
       $category=Category::all();
        Session::put("category",$category);

       $post=Post::paginate(4);

//       print($post);

        //exit();
//        Session::put("posts",$post);

        return View::make("post.allPost",array("posts"=>$post));
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

        $category=Category::all();
        Session::put("category",$category);
        return View::make("post.post");
    }


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
    {
//        {
//            $username = Input::get("username");
//            $password = Input::get("password");.

//            $role = Input::get("role");

//            $rules = array(
//                'title' => 'required|max:255',
//                'description' => 'required|min:8|max:255',
//                'category' => 'max:255',
//                'author' => 'required|max:255',
//                'slug' => 'required|alpha_dash|min:5|max:255'
//            );
//            $validator = Validator::make(Input::all(), $rules);
//
//            if ($validator->fails()) {
////                return Redirect::to("post")->withErrors($validator);
//            } else {

                $post = new Post();
                $post->category = Input::get("category");
                $post->description = Input::get("description");
                $post->slug = Input::get("slug");
                $post->author = Input::get("author");
                $post->title = Input::get("title");
                $post->save();
                return Redirect::to("post");
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

        $posts=Post::where("id","=",$id)->get();
        $category=Category::all();
        Session::put("category",$category);
        return View::make("post.post",array("posts"=>$posts));
//            $username = Input::get("username");
//            $password = Input::get("password");
//            $role = Input::get("role");
//            print(Input::get("category"));
//            $rules = array(
//                'title' => 'required|max:255',
//                'description' => 'required|min:8|max:255',
//                'category' => 'max:255',
//                'author' => 'required|max:255',
//                'slug' => 'required|alpha_dash|min:5|max:255'
//            );
//            $validator = Validator::make($posts, $rules);
//
//            if ($validator->fails()) {
//                return Redirect::to("post")->withErrors($validator);
//            } else {
//
//                foreach ($posts as $post)
//                $posts=Post::where(strtolower("slug"),"=",strtolower(Input::get("slug")))->get();
//                if($posts!="[]"){
//                    return Redirect::to("post")->withErrors("Slug Already Exists!!");
//
//                }
//                print("i am here");
//                $post = new Post();
//                $post->category = Input::get("category");
//                $post->description = Input::get("description");
//                $post->slug = Input::get("slug");
//                $post->author = Input::get("author");
//                $post->title = Input::get("title");
//                $post->save();
//                return Redirect::to("post");
//            }

        }




	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
    {

        //echo $id;


        $d1=strtotime(Input::get("gmdate"));
        //echo $d1;
         $new_date = gmdate('Y-m-d H:i:s', $d1);
//        echo $new_date;
//        $posts=Post::where("id","=",$id)->get();
//          print(Input::get("newUpdatedDate"));

        $rules = array(
            'title' => 'required|max:255',
            'description' => 'required|min:8|max:255',
            'category' => 'max:255',
            'author' => 'required|max:255',
            'slug' => 'required|min:5|max:255'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            print("i am in validation");
            return Redirect::to("post/$id/edit")->withErrors($validator);
        } else {
            $postFromId = Post::where("id", "=", $id)->get();
            $posts = Post::where(strtolower("slug"), "=", strtolower(Input::get("slug")))->get();
//                $json = json_encode("$postFromId");
//                $json = json_decode("$json");
//                echo $json;
            if ($posts != "[]") {

                if ($posts[0]->slug == $postFromId[0]->slug) {
                    if (Input::get("description") == $postFromId[0]->description&&Input::get("author") == $postFromId[0]->author&&Input::get("title") == $postFromId[0]->title&&Input::get("category") == $postFromId[0]->category) {
                        return Redirect::to("post")->withErrors("No any changes are updated");

                    }else{
                        $all=Input::all();  //input is in #json_array format like  {   } but when taken from db it will be in main_array format which contain json array format inside it like [ { },{ },{ }, ........ ]
//                        dd ($all["title"]);
                        $this->saveUpdated($postFromId,$all,$new_date);
                    }

                } else {
                    return Redirect::to("post/$id/edit")->withErrors("Slug Already Exists");
                }

            } else {
                $this->saveUpdated($postFromId,Input::all(),$new_date);
            }


        }

    }


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
	    Post::where("id","=",$id)->delete();
        return Redirect::to("post")->withErrors("Post Successfully Deleted");
	}
	public function check(){
        $slug=Input::get("slug");
        if (strlen($slug) < 5) {
            $messge["mess"] = "Slug should be at least 5 characters";
            $messge["status"] = 0;
        }else{
            $posts=Post::where(strtolower("slug"),"=",strtolower(Input::get("slug")))->get();
            if($posts!="[]"){
                $messge["mess"] = "Slug already exists, Please try next";
                $messge["status"] = 2;

            }else{
//                      $post = new Post();
//                      $post->category = Input::get("category");
//                      $post->description = Input::get("description");
//                      $post->slug = Input::get("slug");
//                      $post->author = Input::get("author");
//                      $post->title = Input::get("title");
                // $post->save();
                //return Redirect::to("post");
                $messge["mess"] = "Slug is valid";
                $messge["status"] = 1;
            }
        }
        echo json_encode($messge);

        //return Response::json($messge);


    }

    function saveUpdated($postFromId,$all,$new_date){
        $post=new Post();
	    foreach ($postFromId as $post){
            $f = 'Y-m-d H:i:s';
            $d1 = \DateTime::createFromFormat($new_date, $f);
            $d2 = \DateTime::createFromFormat($post, $f);
//            print($a->diff($b));
            $diff = $d2->diff($d1);
            $hours = $diff->h + ($diff->days * 24);
	        $post->title=$all["title"];
            $post->description=$all["description"];
            $post->slug=$all["slug"];
            $post->author=$all["author"];
            $post->category=$all["category"];
        }
        $post->save();
//	    print("$postFromId,$all->slug");


    }
}
