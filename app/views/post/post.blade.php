@extends('layouts.main')
@section('content')

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            {{ HTML::link('home', 'Nitesh Blog',array("class"=>"navbar-brand"))}}
        </div>
        <ul class="nav navbar-nav">
            <<li class="{{Request::is("home") ? "active" : ""}}">{{ HTML::link('home', 'Home')}}</li>
            <li class="{{Request::is("post") ? "active" : ""}}">{{ HTML::link('post', 'Post')}}</li>
            <li class="{{Request::is("category") ? "active" : ""}}">{{ HTML::link('category', 'Category')}}</li>
        </ul>
        <form class="navbar-form navbar-left">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<div class="row">

    <div class="col-md-8 col-md-offset-2">
        <h1>Edit Post</h1>
        <hr>

        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                {{$errors->first()}}
            </div>
        @endif

        @foreach($posts as $post)
        {{Form::open(array("method"=>"PUT",'route' => [ 'post.update', $post->id],"class"=>"post_edit_form"))}}
        {{Form::hidden("id",$post->id,array("class"=>"form-control"))}}
        {{Form::label("title","Title:")}}
        {{Form::text("title",$post->title,array("class"=>"form-control"))}}
        {{Form::label("category","Category:")}}

        <select class="form-control" name="category">
            @foreach(Session::get("category") as $category)
        <option  value="{{$category->category}}">{{strtoupper($category->category)}}</option>
            @endforeach
        </select>
            <div id="log"></div>
        {{Form::label("slug","Slug:")}}
        {{Form::text("slug",$post->slug,array("class"=>"form-control "))}}
        {{Form::hidden("id",$post->id,array("class"=>"form-control post_id"))}}
        {{Form::label("author","Author:")}}
        {{Form::text("author",$post->author,array("class"=>"form-control"))}}
        {{Form::label("description","Description:")}}
        {{Form::textarea("description",$post->description,array("class"=>"form-control"))}}<br>
            {{Form::hidden("created_at",$post->created_at,array("class"=>"form-control"))}}
            {{Form::hidden("updated_at",$post->updated_at,array("class"=>"form-control"))}}
        @endforeach
        {{Form::submit("Update Post",array("class"=>"btn btn-success btn-lg btn-block post_update","style"=>"margin-top:20px","name"=>"newUpdatedDate","value"=>Carbon\Carbon::now()))}}
        {{Form::close()}}
    </div>
</div>

@section('scripts')
    <script>

        $(document).ready(function(){
            //alert("hello");

            post.checkslug();
            post.checkupdate();
        });
    </script>
@stop
{{ HTML::script('packages/jquery/jquery.min.js') }}
{{ HTML::script('packages/bootstrap/js/bootstrap.min.js') }}
{{ HTML::script('packages/bootstrap/js/gas.js') }}
@stop   `
