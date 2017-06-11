@extends('layouts/loginMain')
@section('content')

    <div class="container">
        <div class="row">
            <div class="form_bg" style="height: 320px">
                {{ Form::open(array('route'=>'login.store')) }}
                    <h2 class="text-center">Login Page</h2>
                    <br/>
                    <div class="form-group">
                        {{ Form::text('username',null,array("class"=>"form-control","placeholder"=>"username")) }}
                    </div>
                    <div class="form-group">
                        {{ Form::password('password',array("class"=>"form-control","placeholder"=>"password")) }}
                    </div>
                @if($errors->any())
                    <div class="alert alert-danger" role="alert">{{$errors->first()}}</div>
                @endif
                    @if(Session::has("message"))
                    <div class="alert alert-danger" role="alert">{{Session::get("message")}}</div>
                    @endif
                    <div class="align-center" >
                        {{ Form::submit('Login',array('class'=>'btn btn-default')) }}
                    </div>
                {{Form::close()}}
                <br><br><br>
                <div class="align-center" style="margin-top: 35px;">
                    <h5 >Don't have an account {{ HTML::link('signup', 'signup', array("style"=>"text-decoration: none;"))}}</h5><br>
                </div>
            </div>
        </div>
    </div>
    {{ HTML::script('packages/jquery/jquery.min.js') }}
    {{ HTML::script('packages/bootstrap/js/bootstrap.min.js') }}
@stop