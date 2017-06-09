@extends('layouts/loginMain')
@section('content')

    <div class="container">
        <div class="row">
            <div class="form_bg" style="height: 290px">
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
                    <h4 style="font-style: italic;font-size: medium">{{$errors->first()}}</h4>
                    @endif
                    @if(Session::has("message"))
                    <h4 style="font-style: italic;font-size: medium">{{Session::get("message")}}</h4>
                    @endif
                    <div class="align-center" >
                        {{ Form::submit('Login',array('class'=>'btn btn-default')) }}
                    </div>
                {{Form::close()}}
                <br><br><br>
                <div class="align-center" >
                    <h5 style="margin-top: 0px ; text-decoration: none;">Don't have an account {{ HTML::link('signup', 'signup', true)}}</h5><br>
                </div>
            </div>
        </div>
    </div>
    {{ HTML::script('packages/jquery/jquery.min.js') }}
    {{ HTML::script('packages/bootstrap/js/bootstrap.min.js') }}
@stop