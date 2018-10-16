@extends('layouts.app')
@section('css')
    <style>
        body {
            background-color: #EEEEEE;
        }

        .todolist {
            background-color: #FFF;
            padding: 20px 20px 10px 20px;
            margin-top: 30px;
        }

        .todolist h1 {
            margin: 0;
            padding-bottom: 20px;
            text-align: center;
        }

        .form-control {
            border-radius: 0;
        }

        li.ui-state-default {
            background: #fff;
            border: none;
            border-bottom: 1px solid #ddd;
        }

        li.ui-state-default:last-child {
            border-bottom: none;
        }

        .todo-footer {
            background-color: #F4FCE8;
            margin: 0 -20px -10px -20px;
            padding: 10px 20px;
        }

        #done-items li {
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
            text-decoration: line-through;
        }

        #done-items li:last-child {
            border-bottom: none;
        }

        #checkAll {
            margin-top: 10px;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="todolist not-done">
                <h1>Todos</h1>
                <form action="/tasks" method="post">
                    {{ csrf_field() }}
                    <input type="text" name="gigido" class="form-control add-todo" placeholder="Add todo">
                    <button id="checkAll" class="btn btn-success">Thêm</button>
                </form>
                <hr>
                <ul id="sortable" class="list-unstyled">
                    @foreach($newTasks as $task)
                        <li> {{ $task->name }}
                            <form action="/tasks/{{$task->id}}" method="post" style="float: right">
                                {{ csrf_field() }}
                                {{ method_field('put') }}
                                <input name="completed" value="1" type="hidden">
                                <button type="submit" class="remove-item"><span
                                            class="glyphicon glyphicon-remove">Done</span></button>
                            </form>
                            <hr>
                        </li>
                    @endforeach
                </ul>
                <div class="todo-footer">
                    <strong><span class="count-todos">{{ count($newTasks) }}</span></strong> Items Left
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="todolist">
                <h1>Already Done</h1>
                <ul id="done-items" class="list-unstyled">
                    @foreach($completedTasks as $task)
                        <li> {{ $task->name }}
                            <form action="/tasks/{{$task->id}}" method="post" style="float: right">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="remove-item"><span
                                            class="glyphicon glyphicon-remove">X</span></button>
                            </form>
                            <form action="/tasks/{{$task->id}}" method="post" style="...">
                                {{ csrf_field() }}
                                {{ method_field('put') }}
                                <input name="completed" value="0" type="hidden">
                                <button type="submit" class="remove-item"><span
                                            class="glyphicon glyphicon-remove">Not yet</span></button>
                            </form>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
    {{--<h2>Task mới</h2>--}}
    {{--<ul>--}}
    {{--@foreach($newTasks as $task)--}}
    {{--<li>--}}
    {{--<a href="/tasks/{{ $task->id }}">--}}
    {{--//{{$task->name}}--}}
    {{--</a>--}}
    {{--<form action="/tasks/{{$task->id}}" method="post">--}}
    {{--{{ csrf_field() }}--}}
    {{--{{ method_field('put') }}--}}
    {{--<input name="completed" value="1" type="hidden">--}}
    {{--<button type="submit">Đã xong</button>--}}
    {{--</form>--}}
    {{--<form action="/tasks/{{$task->id}}" method="post">--}}
    {{--{{ csrf_field() }}--}}
    {{--<input name="_method" value="DELETE" type="hidden">--}}
    {{--<button type="submit">Xoa</button>--}}
    {{--</form>--}}

    {{--</li>--}}

    {{--@endforeach--}}
    {{--</ul>--}}
    {{--<a class="btn-warning" href="/tasks/create">--}}
    {{--Tao task moi--}}
    {{--</a>--}}

    {{--<h2>Đã hoàn thành</h2>--}}
    {{--<ul>--}}
    {{--@foreach($completedTasks as $task)--}}
    {{--<li>--}}
    {{--<a href="/tasks/{{ $task->id }}">--}}
    {{--//{{$task->name}}--}}
    {{--</a>--}}
    {{--<form action="/tasks/{{$task->id}}" method="post">--}}
    {{--{{ csrf_field() }}--}}
    {{--{{ method_field('put') }}--}}
    {{--<input name="completed" value="0" type="hidden">--}}
    {{--<button type="submit">Chưa xong</button>--}}
    {{--</form>--}}
    {{--<form action="/tasks/{{$task->id}}" method="post">--}}
    {{--{{ csrf_field() }}--}}
    {{--<input name="_method" value="DELETE" type="hidden">--}}
    {{--<button type="submit">Xoa</button>--}}
    {{--</form>--}}

    {{--</li>--}}

    {{--@endforeach--}}
    {{--</ul>--}}
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>

        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="http://www.bateswharf.co.uk/wp-content/uploads/1200-350-DE-ANTONIO-D23-CRUISER-3.jpg" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <div class="todolist not-done">
                        <h1>Todos</h1>
                        <form action="/tasks" method="post">
                            {{ csrf_field() }}
                            <input type="text" name="gigido" class="form-control add-todo" placeholder="Add todo">
                            <button id="checkAll" class="btn btn-success">Thêm</button>
                        </form>


                        <hr>
                        <ul id="sortable" class="list-unstyled">
                            @foreach($newTasks as $task)
                                <li> {{ $task->name }}
                                    <form action="/tasks/{{$task->id}}" method="post" style="float: right">
                                        {{ csrf_field() }}
                                        {{ method_field('put') }}
                                        <input name="completed" value="1" type="hidden">
                                        <button type="submit" class="remove-item"><span
                                                    class="glyphicon glyphicon-remove">Done</span></button>
                                    </form>
                                    <hr>

                                </li>
                            @endforeach
                        </ul>
                        <div class="todo-footer">
                            <strong><span class="count-todos">{{ count($newTasks) }}</span></strong> Items Left
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://samtech-me.com/wp-content/uploads/2016/05/1200-350.jpg" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <div class="todolist">
                    <h1>Already Done</h1>
                    <ul id="done-items" class="list-unstyled">
                        @foreach($completedTasks as $task)
                            <li> {{ $task->name }}
                                <form action="/tasks/{{$task->id}}" method="post" style="float: right">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="remove-item"><span
                                                class="glyphicon glyphicon-remove">X</span></button>
                                </form>
                                <form action="/tasks/{{$task->id}}" method="post" style="...">
                                    {{ csrf_field() }}
                                    {{ method_field('put') }}
                                    <input name="completed" value="0" type="hidden">
                                    <button type="submit" class="remove-item"><span
                                                class="glyphicon glyphicon-remove">Not yet</span></button>
                                </form>
                            </li>
                        @endforeach

                    </ul>
                </div>
                </div>
            </div>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


@endsection