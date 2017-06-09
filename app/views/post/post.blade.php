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
        <h1>Create New Post</h1>
        <hr>
        {{Form::open(array("route"=>"post.store"))}}
        {{Form::label("title","Title:")}}
        {{Form::text("title",null,array("class"=>"form-control"))}}
        {{Form::label("category","Category:")}}

        <select class="form-control" name="category">
            @foreach(Session::get("category") as $cat)
        <option  value="{{$cat->category}}">{{strtoupper($cat->category)}}</option>
            @endforeach
        </select>

        {{Form::label("slug","Slug:")}}
        {{Form::text("slug",null,array("class"=>"form-control"))}}
        {{Form::label("author","Author:")}}
        {{Form::text("author",null,array("class"=>"form-control"))}}
        {{Form::label("description","Description:")}}
        {{Form::textarea("description",null,array("class"=>"form-control"))}}
        @if($errors->any())
            <h4 style="font-style: italic;font-size: medium">{{$errors->first()}}</h4>
        @endif
        {{Form::submit("Create Post",array("class"=>"btn btn-success btn-lg btn-block","style"=>"margin-top:20px"))}}
        {{Form::close()}}
    </div>
</div>

{{ HTML::script('packages/jquery/jquery.min.js') }}
{{ HTML::script('packages/bootstrap/js/bootstrap.min.js') }}
@stop
