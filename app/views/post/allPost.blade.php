@extends('layouts.main')
@include("layouts.partial._nav")
@section('content')

    <div class="container">
        <div class="row" >
            <div class="col-md-2 col-md-offset-10">
            <a href="{{ route('download') }}" class="btn btn-primary btn-block">Download PDF</a>
            </div>
        </div>
        <div class="row">
            @if($errors->any())
            <div class="alert alert-success" role="alert">
                    {{$errors->first()}}
            </div>
            @endif
                @if(Session::has("message"))
                    <div class="alert alert-success" role="alert">
                        {{Session::get("message")}}
                    </div>
                @endif

            <div class="panel panel-primary filterable">
                <div class="panel-heading">
                    <h3 class="panel-title">All Posts</h3>
                    <div class="pull-right">
                        <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                    </div>
                </div>
                <table class="table">
                    <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="SN" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Title" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Description" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Category" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Author" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Slug" disabled></th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                     $i=0;
                        ?>

                    @foreach($posts as $post)

                    <tr>
                        <td>{{HTML::link("post/$post->id/edit",$i=$i+1,array("class"=>"btn btn-primary"))}}

                        </td>

                        <td>{{$post->title}}</td>
                        <td>{{substr($post->description,0,100)}}{{strlen($post->description)>100?"...":""}}</td>
                        <td>{{$post->category}}</td>
                        <td>{{$post->author}}</td>
                        <td><a href="{{url("blog/".$post->slug)}}")>{{url($post->slug)}}</a></td>
                        <td>{{$post->created_at}}</td>
                        <td>{{$post->updated_at}}</td>

                        <td>{{HTML::link("delete/$post->id","",array("class"=>"glyphicon glyphicon-remove","style"=>"font-size:20px;color:red;cursor:pointer;text-decoration: none;"))}}</td>
                        {{--<span class="glyphicon glyphicon-remove" aria-hidden="true"  style="font-size:20px;color:red;"></span>--}}
                            {{--<span class="glyphicon glyphicon-remove" aria-hidden="true"  style="font-size:20px;color:red;"></span></td>--}}
                    </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
                @if($posts!="[]"  )
                <div style="float: right">
                    {{$posts->links()}}
                </div>
               @endif
                {{Form::submit("Create New Post",array("class"=>"btn btn-success","onclick"=>"div_show()"))}}


              </div>
    </div>
    {{--<a href="#">Download PDF</a>--}}
    {{--<div id="abc">--}}

        {{--<div id="popupContact">--}}


            {{--{{Form::open(array("route"=>"post.store","id"=>"form","name"=>"form","onclick"=>"check_empty()","style"=>", max-width:600px;min-width:400px;padding:10px 50px;border:2px solid gray;border-radius:10px;font-family:raleway;background-color:white"))}}--}}


            {{--{{Form::label("title","Title:")}}--}}
            {{--{{Form::text("title",null,array("class"=>"form-control","id"=>"name"))}}--}}
            {{--{{Form::label("category","Category:")}}--}}

            {{--<select class="form-control" name="category">--}}
                {{--@foreach(Session::get("category") as $category)--}}
                    {{--<option  value="{{$category->category}}">{{strtoupper($category->category)}}</option>--}}
                {{--@endforeach--}}
            {{--</select>--}}

            {{--{{Form::label("slug","Slug:")}}--}}
            {{--{{Form::text("slug",null,array("class"=>"form-control"))}}--}}
            {{--{{Form::label("author","Author:")}}--}}
            {{--{{Form::text("author",null,array("class"=>"form-control"))}}--}}
            {{--{{Form::label("description","Description:")}}--}}
            {{--{{Form::textarea("description",null,array("class"=>"form-control"))}}<br>--}}
            {{--{{HTML::link("post","Create Post",array("class"=>"btn btn-success btn-lg btn-block","style"=>"margin-top:20px","href"=>"javascript:check_empty()"))}}--}}
            {{--<a href="javascript:check_empty()" class="btn btn-success btn-lg btn-block" style="margin-top:20px" id="submit">Send</a>--}}
            {{--{{Form::close()}}--}}
        {{--</div>--}}

    {{--</div>--}}


    <div id="abc">
        <!-- Popup Div Starts Here -->
        <div id="popupContact">
            <!-- Contact Us Form -->
            {{Form::open(array("route"=>"post.store","id"=>"forms","style"=>"max-width:600px;min-width:400px;padding:10px 50px;border:2px solid gray;border-radius:10px;font-family:raleway;background-color:white"))}}


            {{--<form  id="form" post=""   style="max-width:600px;min-width:400px;padding:10px 50px;border:2px solid gray;border-radius:10px;font-family:raleway;background-color:white">--}}
                <h2>{{Form::label("create","Create New Post")}}</h2>
                <span  id="close" class="glyphicon glyphicon-remove-circle" aria-hidden="true" onclick ="div_hide()" style="font-size:20px;color:red;"></span>
                {{Form::label("title","Title:")}}
                {{Form::text("title",null,array("class"=>"form-control title_check","id"=>"title"))}}
                {{Form::label("category","Category:")}}

                <select class="form-control" name="category">
                    @foreach(Session::get("category") as $category)
                        <option  value="{{$category->category}}">{{strtoupper($category->category)}}</option>
                    @endforeach
                </select>
            <div id="log"></div>
                {{Form::label("slug","Slug:")}}
                {{Form::text("slug",null,array("class"=>"form-control slug_check","id"=>"slug"))}}
                {{--{{Form::label("author","Author:")}}--}}
                {{--{{Form::text("author",null,array("class"=>"form-control author_check","id"=>"author"))}}--}}
                {{Form::label("description","Description:")}}
                {{Form::textarea("description",null,array("class"=>"form-control description_check","id"=>"description"))}}<br>
                {{--<button onclick="check_empty()">Create</button>--}}
                <a href="javascript:check_empty()" class="btn btn-success btn-lg btn-block post_create" >Create</a>
            {{Form::close()}}
        </div>

        <!-- Popup Div Ends Here -->
    </div>
    <!-- Display Popup Button -->
    <!-- function to check slug -->

    <!-- function to check slug -->
    <!-- Display Popup Button -->
    {{ HTML::script('packages/jquery/jquery.min.js') }}
    {{ HTML::script('packages/bootstrap/js/bootstrap.min.js') }}
    {{ HTML::script('packages/bootstrap/js/new.js') }}
    {{ HTML::script('packages/bootstrap/js/ga.js') }}
    {{ HTML::script('packages/bootstrap/js/gas.js') }}
    {{ HTML::style('packages/bootstrap/css/bootstrap-table.css') }}


@stop

@section("scripts")
    <script >

        $(document).ready(function(){
            //alert("hello");
            posts.checkslug();
        });
    </script>
@stop
