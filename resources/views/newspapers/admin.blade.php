<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Vũ Trần Trọng Nguyên</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .contents {
            text-align: center;
            font-size: 30px;
        }

        .links > a {
            color: yellowgreen;
            {{--color: #636b6f;--}}
       padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

    </style>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand -->

    <a class="navbar-brand" href="/">LỊCH SỬ VIỆT NAM</a>

    <!-- Links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="#">Link 1</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link 2</a>
        </li>

        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/newspapers/create') }}">CREATE</a>
                @else
                    <a href="{{ route('login') }}">LOGIN</a>
                    <a href="{{ route('register') }}">REGISTER</a>
                @endauth
            </div>
    @endif
    <!-- Dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Dropdown link
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Link 1</a>
                <a class="dropdown-item" href="#">Link 2</a>
                <a class="dropdown-item" href="#">Link 3</a>
            </div>
        </li>
    </ul>
</nav>
@auth
    @if(Auth::user()->admin == 1)
        <div class="flex-center position-ref">

            <div class="contents">
                <div>
                    <ul>
                        @foreach($admins as $admin)
                            <div>
                                <li> {{ $admin->name }}
                                    <form action="/admin/members/{{$admin->id}}" method="post" style="float: right">
                                        {{ csrf_field() }}
                                        {{ method_field('put') }}
                                        <input name="admin" value="0" type="hidden">
                                        <button type="submit" class="remove-item btn btn-dark">become member</button>
                                    </form>
                                    <hr>
                                    <form action="/admin/members/{{$admin->id}}" method="post" style="float: right">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="remove-item btn btn-dark">X</button>
                                    </form>
                                </li>
                            </div>
                        @endforeach

                        @foreach($members as $member)
                            <div>
                                <li> {{ $member->name }}
                                    <form action="/admin/members/{{$member->id}}" method="post" style="...">
                                        {{ csrf_field() }}
                                        {{ method_field('put') }}
                                        <input name="admin" value="1" type="hidden">
                                        <button type="submit" class="remove-item btn btn-dark">become admin</button>
                                    </form>
                                    <form action="/admin/members/{{$member->id}}" method="post" style="float: right">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="remove-item btn btn-dark">X</button>
                                    </form>
                                </li>
                            </div>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        {{--@else--}}
    @endif
@endauth
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>



