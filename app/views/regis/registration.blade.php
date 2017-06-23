@extends('layouts.main')
@include("layouts.partial._nav")
@section("content")

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Username</th>
                    <th>Approval</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                <tr>

                    <td>{{$user->username}}</td>
                    @if($user->flag=="n" )
                    <td><a href="{{url("regis/$user->id")}}"><span class="glyphicon glyphicon-ok"></span></a></td>

                    @else
                        <td style="font-size: medium" >Approved</td>
                    @endif
                </tr>
                @endforeach
                </tbody>
            </table>
                <div style="float: right">
                    {{$users->links()}}
                </div>
        </div>
    </div>
    {{ HTML::script('packages/jquery/jquery.min.js') }}
    {{ HTML::script('packages/bootstrap/js/bootstrap.min.js') }}
@stop