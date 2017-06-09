@extends('layouts.main')
@section('content')

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                {{ HTML::link('home', 'Nitesh Blog',array("class"=>"navbar-brand"))}}
            </div>
            <ul class="nav navbar-nav">
                <li class="{{Request::is("home") ? "active" : ""}}">{{ HTML::link('home', 'Home')}}</li>
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

    {{--<div class="jumbotron">--}}
    {{--<div class="row">--}}
    {{--<h2>What's on your mind !!</h2><hr>--}}
    {{--<div class="col-lg-6">--}}
    {{--<form>--}}
    {{--<h5 style="font-size: large">Category</h5>--}}
    {{--<select class="form-control" style="width: 61%">--}}
    {{--<option value="one">One</option>--}}
    {{--<option value="two">Two</option>--}}
    {{--<option value="three">Three</option>--}}
    {{--<option value="four">Four</option>--}}
    {{--<option value="five">Five</option>--}}
    {{--</select>--}}
    {{--<h5 style="font-size: large">Title</h5>--}}
    {{--<textarea></textarea>--}}
    {{--<h5 style="font-size: large">Description</h5>--}}
    {{--<textarea></textarea>--}}
    {{--</form>--}}
    {{--</div>--}}
    {{--<div class="col-lg-6">--}}
    {{--<form>--}}
    {{--<h5 style="font-size: large">Slug</h5>--}}
    {{--<input type="text">--}}
    {{--<h5 style="font-size: large">Author</h5>--}}
    {{--<input type="text">--}}
    {{--</form>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Category</h1>
            <hr>
            {{Form::open(array("route"=>"category.store"))}}
            {{Form::label("category","Category:")}}
            {{Form::text("category",null,array("class"=>"form-control"))}}<hr>
            @if($errors->any())
                <h4 style="font-style: italic;font-size: medium">{{$errors->first()}}</h4>
            @endif
            @if(Session::has("message"))
                <h4 style="font-style: italic;font-size: medium">{{Session::get("message")}}</h4>
            @endif
            {{Form::submit("Create Post",array("class"=>"btn btn-success btn-lg btn-block"))}}
            {{Form::close()}}
        </div>
    </div>
    {{ HTML::script('packages/jquery/jquery.min.js') }}
    {{ HTML::script('packages/bootstrap/js/bootstrap.min.js') }}
@stop
