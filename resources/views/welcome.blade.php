<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Vũ Trần Trọng Nguyên</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="/css/custom.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            /*font-family: 'Nunito', sans-serif;*/
            font-family: Calibri;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        #shadow {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.51), 0 6px 6px rgba(0, 0, 0, 0.51);
        }

        .full-height {
            height: 100vh;
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
            top: 10px;
        }

        .contents {
            text-align: left;
            font-size: 22px;
        }

        .links > a {
            color: black;
            {{--color: #636b6f;--}}
                            padding: 0 25px;
            font-size: 20px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .a {
            font-weight: bold;
            color: black;
        }

        .content {
            background: linear-gradient(35deg, #ccffff, #ffcccc);
            border-radius: 5%;
        }

        hr {
            margin: 1px;
        }

        .nav {
            padding: 1px;
        }

        .footer_bottom_Section {
            border-top: 2px solid #000;
            padding: 30px 0;
            text-transform: uppercase;
            text-align: center;
            margin-top: 30px;
        }
        .bo{
            border-radius: 50%;
        }

        ul, ul *
        {
            max-width: 100%;
            flex-wrap: wrap;

        }
    </style>
</head>
<body>
<div class="container" id="shadow">
    <div>
        <div class="row">
            <div class="col-md-4 flex-center text-uppercase">

                <h6>{{date(" l. ")}} {{date("d.F.Y")}}  </h6>

            </div>
            <div class="col-md-4 flex-center">
                <div class="logo">
                    <a href="#"><img
                                src="https://imageog.flaticon.com/icons/png/512/21/21601.png?size=1200x630f&pad=10,10,10,10&ext=png&bg=FFFFFFFF"
                                width="240" height="126" alt="Tech NewsLogo"></a>
                </div>
            </div>
            <!-- Logo Section -->
            <div class="col-md-4 flex-center">
                <form class="form-inline" action="/newspapers/search" method="post">
                    {{ csrf_field() }}
                    <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search">
                    <button class="btn btn-dark" type="submit">Q</button>

                </form>
            </div>
        </div>
    </div>
    <div>
        <hr>
        <nav class="navbar navbar-expand-sm nav">
            <!-- Brand -->
            <a class="navbar-brand a" href="/">LỊCH SỬ VIỆT NAM</a>

            <!-- Links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" style="color:black;" href="#">Link 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:black;" href="#">Link 2</a>
                </li>

                <!-- Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"
                       style="color:black;">
                        Dropdown link
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Link 1</a>
                        <a class="dropdown-item" href="#">Link 2</a>
                        <a class="dropdown-item" href="#">Link 3</a>
                    </div>
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
            </ul>
        </nav>
        <hr>
        <img src="http://media.vov2.vn//UploadImages/vov2/Vanhoa/Thuyen%20DSon.jpg" height="300" width="1000">
    </div>

    <div class="flex-center position-ref contents">
        <ul>
            @foreach($newspapers as $newspaper)
                <li>
                    {{--<a href="/newspapers/{{$newspaper->id}}" class="content">{{$newspaper->title}}</li>--}}
                    <a href="/newspapers/{{$newspaper->id}}" class="a">
                        {{$newspaper->title}}</a>
                    <p style="font-size: 15px">{{$newspaper->created_at->diffForHumans()}} ,by:
                        {{$newspaper->user->name}}</p>
                    <h4 style="font-size: 18px">{!! str_limit(strip_tags($newspaper->content),150) !!}</h4>
                    <hr>
                    {{--@if (strlen(strip_tags($newspaper->content)) > 50)--}}
                    {{--<a href="{{ action('NewspaperController@show', $newspaper) }}" class="btn btn-dark">Read--}}
                    {{--More</a>--}}
                    {{--@endif--}}

                </li>
            @endforeach
        </ul>
    </div>
    <div class="flex-center">{{$newspapers->links()}}</div>
</div>

<div class="flex-center btn btn-dark footer_bottom_Section">Design by me</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>



