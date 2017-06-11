@extends('layouts/loginMain')
@section('content')

    <div class="container">
        <div class="row">
            <div class="form_bg">
                {{ Form::open(array('route'=>'signup.store')) }}
                <h2 class="text-center">Signup Page</h2>
                <br/>
                <div class="form-group">
                    {{ Form::text('username',null,array("class"=>"form-control","placeholder"=>"username")) }}
                </div>
                <div class="form-group">
                    {{ Form::password('password',array("class"=>"form-control","placeholder"=>"password")) }}
                </div>
                <div class="form-group">
                    {{ Form::text('role',null,array("class"=>"form-control","placeholder"=>"role")) }}
                </div>
                @if($errors->any())
                    <div class="alert alert-danger" role="alert">{{$errors->first()}}</div>
                @endif
                {{--@if($message->any())--}}
                    {{--{{Form::label($message->first())}}--}}
                {{--@endif--}}
                <div class="align-center" >
                    {{ Form::submit('Signup',array('class'=>'btn btn-default')) }}
                </div><br><br><br><br>
                {{Form::close()}}
                <div class="align-center" style="margin-top: 35px">
                    <h5 >Already have an account {{ HTML::link('login', 'login',array("style"=>"text-decoration: none;"))}} </h5><br>
                </div>
            </div>
        </div>
    </div>
    {{ HTML::script('packages/jquery/jquery.min.js') }}
    {{ HTML::script('packages/bootstrap/js/bootstrap.min.js') }}
@stop