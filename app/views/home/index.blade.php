@extends('layouts.main')
@include("layouts.partial._nav")
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="jumbotron">
                    @if(Session::has("users"))
                    @foreach(Session::get("users") as $user)
                <h2>Welcome {{strtoupper($user->role)}}  {{strtoupper($user->username)}} To Your Blog</h2>
                <p class="lead">Thank you for visiting my blog.Enjoy my blog and follow if you like it.</p>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4" >

                {{--<ul style="list-style-type: none;">--}}
                {{--<li>--}}
                    {{--{{Form::label("category","Category:")}}--}}
                    {{--<select class="form-control" name="category">--}}
                        {{--<option  value="">Display All Categories Post</option>--}}
                        {{--@foreach($category as $cat)--}}
                            {{--<option  value="{{$cat->category}}">{{strtoupper($cat->category)}}</option>--}}
                        {{--@endforeach--}}
                    {{--</select>--}}
                {{--</li><hr>--}}
                    {{--<li>--}}

                    {{--<li>--}}
                    <div class="col-md-6 dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="width: 70%">Categories</button>
                        <ul class="dropdown-menu">
                            @foreach($category as $cat)
                            <li><a href="{{url("home/".Session::get("users")[0]->id."/".strtoupper($cat->category))}}">{{strtoupper($cat->category)}}</a></li>
                                @endforeach
                        {{--</ul>--}}
                    </div>
                    {{--</li>--}}

{{--<li>--}}
                    {{--<div class="col-md-6 dropdown">--}}
                        {{--<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="width: 70%">Slug</button>--}}
                        {{--<ul class="dropdown-menu">--}}
                            {{--<li><a href="#">HTML</a></li>--}}
                            {{--<li><a href="#">CSS</a></li>--}}
                            {{--<li><a href="#">JavaScript</a></li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            </div>

            <div class="col-lg-8">
                {{--<div class="form-inline">--}}
                    {{--<input type="text" title="Description">--}}
                {{--</div>--}}
                @foreach($posts as $post)
                <div class="blog-post">

                    <h3>{{$post->title}}</h3>
                    <p>{{substr($post->description,0,300)}}{{strlen($post->description)>300?"...":""}}</p>
                    <a href="{{url("blog/".$post->slug)}}" class="btn btn-primary">Read More</a>
                    @if($post->author==Session::get("users")[0]->username)
                    {{HTML::link("post/$post->id/edit?flag=y" ,"Edit",array("class"=>"btn btn-primary edit"))}}
                    {{HTML::link("delete/$post->id?flag=y&postId=".$post->id,"Delete",array("class"=>"btn btn-primary delete"))}}
                    @endif
                    {{--<a href="javascript:checkDelete()" class="btn btn-primary" id="delete" >Delete</a>--}}
                    {{Form::hidden("id",$post->id,array("class"=>"postId"))}}
                    <h6 style="font-style: italic">Category: {{$post->category}}</h6>
                    <h6 style="font-style: italic">Slug: <a href="{{url("blog/".$post->slug)}}">{{url($post->slug)}}</a></h6>
                    <h6 style="font-style: italic">Author: {{$post->author}}</h6>
                    @if(Session::get("postid")==$post->id)
                    @if($errors->any())
                        <div class="alert alert-success" role="alert">
                            {{$errors->first()}}
                        </div>
                    @endif
                        @endif

                </div>
                    <hr>
                @endforeach
                <div style="float: right">
                    {{$posts->links()}}
                </div>
            </div>
        </div>
    </div>
    {{ HTML::script('packages/jquery/jquery.min.js') }}
    {{ HTML::script('packages/bootstrap/js/bootstrap.min.js') }}
    {{ HTML::script('packages/bootstrap/js/check.js') }}
    {{--<script>--}}
        {{--$(document).ready(function(){--}}
            {{--$('[data-toggle="popover"]').popover();--}}
        {{--});--}}
    {{--</script>--}}
@stop
