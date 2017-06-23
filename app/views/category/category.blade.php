@extends('layouts.main')
@include("layouts.partial._nav")
@section('content')



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
                <div class="alert alert-danger" role="alert">{{$errors->first()}}</div>
            @endif
            @if(Session::has("message"))
                <div class="alert alert-danger" role="alert"> {{Session::get("message")}}</div>
            @endif
            {{Form::submit("Create Category",array("class"=>"btn btn-success btn-lg btn-block"))}}
            {{Form::close()}}
        </div>
    </div>
    {{ HTML::script('packages/jquery/jquery.min.js') }}
    {{ HTML::script('packages/bootstrap/js/bootstrap.min.js') }}
@stop
