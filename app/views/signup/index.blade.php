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
                    <h4 style="font-style: italic;font-size: medium">{{$errors->first()}}</h4>
                @endif
                {{--@if($message->any())--}}
                    {{--{{Form::label($message->first())}}--}}
                {{--@endif--}}
                <div class="align-center" >
                    {{ Form::submit('Signup',array('class'=>'btn btn-default')) }}
                </div><br><br><br><br>
                {{Form::close()}}
                <div class="align-center" >
                    <h5 style="margin-top: 0px ; text-decoration: none;">Already have an account {{ HTML::link('login', 'login', true)}} </h5><br>
                </div>
            </div>
        </div>
    </div>
    {{ HTML::script('packages/jquery/jquery.min.js') }}
    {{ HTML::script('packages/bootstrap/js/bootstrap.min.js') }}
@stop