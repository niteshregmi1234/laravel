<?php

class BlogSlugController extends \BaseController {

	public function getSingle($slug)
	{
		$posts=Post::where("slug","=",$slug)->first();
		return View::make("blog.single",["posts"=>$posts]);
	}

}
