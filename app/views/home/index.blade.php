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
                <ul style="list-style-type: none;">
                <li>
                <div class="dropdown">
                    <button class="btn btn-default dropdown-menu-right" type="button" data-toggle="dropdown">Categories</button>
                    <ul class="dropdown-menu">
                        <li><a href="#">HTML</a></li>
                        <li><a href="#">CSS</a></li>
                        <li><a href="#">JavaScript</a></li>
                    </ul>
                </div>
                </li><hr>
                <li>
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" style="width: 29%">Slug</button>
                        <ul class="dropdown-menu">
                            <li><a href="#">HTML</a></li>
                            <li><a href="#">CSS</a></li>
                            <li><a href="#">JavaScript</a></li>
                        </ul>
                    </div>
                </li>
                </ul>
            </div>

            <div class="col-lg-8">
                {{--<div class="form-inline">--}}
                    {{--<input type="text" title="Description">--}}
                {{--</div>--}}
                <div class="blog-post">
                    <h3>Title 1</h3>
                    <p>A disorder of structure or function in a human, animal, or plant, especially one that produces specific symptoms or that affects a specific location and is not simply a direct result of physical injury."bacterial meningitis is quite a rare disease"synonyms:	illness, sickness, ill health; Morea particular quality or disposition regarded as adversely affecting a person or group of people.</p>
                    <a href="#" class="btn btn-primary">Read More</a>
                    <h6 style="font-style: italic">Category: Physics</h6>
                    <h6 style="font-style: italic">Slug: Gravitation</h6>
                    <h6 style="font-style: italic">Author: A</h6>
                </div>
                <hr>
                <div class="blog-post">
                    <h3>Title 2</h3>
                    <p>A disorder of structure or function in a human, animal, or plant, especially one that produces specific symptoms or that affects a specific location and is not simply a direct result of physical injury."bacterial meningitis is quite a rare disease"synonyms:	illness, sickness, ill health; Morea particular quality or disposition regarded as adversely affecting a person or group of people.</p>
                    <a href="#" class="btn btn-primary">Read More</a>
                    <h6 style="font-style: italic">Category: Physics</h6>
                    <h6 style="font-style: italic">Slug: Gravitation</h6>
                    <h6 style="font-style: italic">Author: A</h6>
                </div>
                <hr>
                <div class="blog-post">
                    <h3>Title 3</h3>
                    <p>A disorder of structure or function in a human, animal, or plant, especially one that produces specific symptoms or that affects a specific location and is not simply a direct result of physical injury."bacterial meningitis is quite a rare disease"synonyms:	illness, sickness, ill health; Morea particular quality or disposition regarded as adversely affecting a person or group of people.</p>
                    <a href="#" class="btn btn-primary">Read More</a>
                    <h6 style="font-style: italic">Category: Physics</h6>
                    <h6 style="font-style: italic">Slug: Gravitation</h6>
                    <h6 style="font-style: italic">Author: A</h6>
                </div>
                <hr>
                <div class="blog-post">
                    <h3>Title 4</h3>
                    <p>A disorder of structure or function in a human, animal, or plant, especially one that produces specific symptoms or that affects a specific location and is not simply a direct result of physical injury."bacterial meningitis is quite a rare disease"synonyms:	illness, sickness, ill health; Morea particular quality or disposition regarded as adversely affecting a person or group of people.</p>
                    <a href="#" class="btn btn-primary">Read More</a>
                    <h6 style="font-style: italic">Category: Physics</h6>
                    <h6 style="font-style: italic">Slug: Gravitation</h6>
                    <h6 style="font-style: italic">Author: A</h6>
                </div>
                <hr>
            </div>
        </div>
    </div>
    {{ HTML::script('packages/jquery/jquery.min.js') }}
    {{ HTML::script('packages/bootstrap/js/bootstrap.min.js') }}
    {{--<script>--}}
        {{--$(document).ready(function(){--}}
            {{--$('[data-toggle="popover"]').popover();--}}
        {{--});--}}
    {{--</script>--}}
@stop