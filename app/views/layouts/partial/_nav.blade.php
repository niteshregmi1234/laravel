<nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                {{ HTML::link("home/".Session::get("users")[0]->id, Session::get("users")[0]->username." "."blog",array("class"=>"navbar-brand"))}}
            </div>
            <ul class="nav navbar-nav">
                <li class="{{Request::is("home") ? "active" : ""}}">{{ HTML::link("home/".Session::get("users")[0]->id,'Home')}}</li>
                <li class="{{Request::is("post") ? "active" : ""}}">{{ HTML::link('post', 'Post')}}</li>
                @if(Session::get("users")[0]->role=="admin")
                <li class="{{Request::is("category") ? "active" : ""}}">{{ HTML::link('category', 'Category')}}</li>
                <li class="{{Request::is("regis") ? "active" : ""}}">{{ HTML::link('regis', 'Registration')}}</li>
                    @endif
            </ul>
            {{--<form class="navbar-form navbar-left" >--}}
            {{Form::open(array("route"=>"get.search","class"=>"navbar-form navbar-left"))}}
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search By Title" name="title" value="">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            {{Form::close()}}
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li>{{ HTML::link('logout', 'Logout',array("style"=>"text-decoration: none;"))}}</li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

