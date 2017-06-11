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
    <div class="container">

        <div class="row">
            @if($errors->any())
            <div class="alert alert-success" role="alert">
                    {{$errors->first()}}
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
                     $i=0
                    ?>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{HTML::link("post/$post->id/edit",$i=$i+1,array("class"=>"btn btn-primary","id"=>$post->id))}}

                        </td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->description}}</td>
                        <td>{{$post->category}}</td>
                        <td>{{$post->author}}</td>
                        <td><a href="{{url($post->slug)}}")>{{url($post->slug)}}</a></td>
                        <td>{{$post->created_at}}</td>
                        <td>{{$post->updated_at}}</td>
                        <td><span class="glyphicon glyphicon-remove" aria-hidden="true"  style="font-size:20px;color:red;"></span></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
                {{Form::submit("Create New Post",array("class"=>"btn btn-success","onclick"=>"div_show()"))}}

                <div style="float: right">
                    {{$posts->links()}}
                </div>
              </div>
    </div>

    <div id="abc">
    <!-- Popup Div Starts Here -->
        <div id="popupContact">
            <!-- Contact Us Form -->


            {{Form::open(array("route"=>"post.store","style"=>" max-width:600px;min-width:400px;padding:10px 50px;border:2px solid gray;border-radius:10px;font-family:raleway;background-color:white"))}}
            {{--<img id="close"  onclick ="div_hide()">--}}
            <h2>{{Form::label("create","Create New Post")}}</h2>
            <span  id="close" class="glyphicon glyphicon-remove-circle" aria-hidden="true" onclick ="div_hide()" style="font-size:20px;color:red;"></span>

            {{Form::label("title","Title:")}}
            {{Form::text("title",null,array("class"=>"form-control","id"=>"name"))}}
            {{Form::label("category","Category:")}}

            <select class="form-control" name="category">
                @foreach(Session::get("category") as $category)
                    <option  value="{{$category->category}}">{{strtoupper($category->category)}}</option>
                @endforeach
            </select>

            {{Form::label("slug","Slug:")}}
            {{Form::text("slug",null,array("class"=>"form-control"))}}
            {{Form::label("author","Author:")}}
            {{Form::text("author",null,array("class"=>"form-control"))}}
            {{Form::label("description","Description:")}}
            {{Form::textarea("description",null,array("class"=>"form-control"))}}<br>
            {{--@if($errors->any())--}}
                {{--<div class="alert alert-danger" role="alert">{{$errors->first()}}</div>--}}
            {{--@endif--}}
            {{Form::submit("Create Post",array("class"=>"btn btn-success btn-lg btn-block","style"=>"margin-top:20px","onclick"=>"check_empty()"))}}
            {{Form::close()}}
            {{--<form action="#"  method="post" name="form">--}}
                {{--<img id="close" src="images/3.png" onclick ="div_hide()">--}}
                {{--<h2>Contact Us</h2>--}}
                {{--<hr>--}}
                {{--<input id="name" name="name" placeholder="Name" type="text">--}}
                {{--<input id="email" name="email" placeholder="Email" type="text">--}}
                {{--<textarea id="msg" name="message" placeholder="Message"></textarea>--}}
                {{--<a href="javascript:check_empty()" id="submit">Send</a>--}}
            {{--</form>--}}
        </div>
        <!-- Popup Div Ends Here -->
    </div>
    <!-- Display Popup Button -->
    {{ HTML::script('packages/jquery/jquery.min.js') }}
    {{ HTML::script('packages/bootstrap/js/bootstrap.min.js') }}
    {{ HTML::script('packages/bootstrap/js/new.js') }}
    {{ HTML::script('packages/bootstrap/js/ga.js') }}
    {{ HTML::style('packages/bootstrap/css/bootstrap-table.css') }}
@stop
