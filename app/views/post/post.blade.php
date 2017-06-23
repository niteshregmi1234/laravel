@extends('layouts.main')
@include("layouts.partial._nav")
@section('content')


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
        {{Form::open(array("method"=>"PUT",'route' => [ 'post.update', $post->id]))}}
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
        {{--{{Form::hidden("id",$post->id,array("class"=>"form-control post_id"))}}--}}
        {{--{{Form::label("author","Author:")}}--}}
        {{Form::text("author",$post->author,array("class"=>"form-control"))}}
        {{Form::label("description","Description:")}}
        {{Form::textarea("description",$post->description,array("class"=>"form-control"))}}<br>
            {{--{{Form::hidden("userId",Session::get("users),array("class"=>"form-control "))}}--}}
            {{Form::hidden("flag",$flag,array("class"=>"form-control "))}}
            {{Form::hidden("postId","$post->id",array("class"=>"form-control"))}}

        {{Form::submit("Update Post",array("class"=>"btn btn-success btn-lg btn-block ","style"=>"margin-top:20px","name"=>"newUpdatedDate"))}}
        {{Form::close()}}
        @endforeach
    </div>
</div>

{{ HTML::script('packages/jquery/jquery.min.js') }}
{{ HTML::script('packages/bootstrap/js/bootstrap.min.js') }}
{{ HTML::script('packages/bootstrap/js/gas.js') }}
{{--<script type="javascript">--}}
    {{--$(document).ready(function(){--}}
{{--//            alert("hello");--}}
        {{--posts.checkupdate();--}}
    {{--});--}}
{{--</script>--}}
@stop
