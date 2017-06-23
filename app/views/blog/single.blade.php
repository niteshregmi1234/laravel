@extends("layouts.main")
@include("layouts.partial._nav")
{{--@section("title","|  $posts->title ")--}}

@section("content")
<div class="row">
    <div class="col-md-8 col-md-offset-2">
     <h1>{{$posts->title}}</h1>
        <p>{{$posts->description}}</p>
    </div>
</div>


 @stop