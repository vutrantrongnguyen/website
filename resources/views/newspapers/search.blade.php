@extends('layouts.app')
@section('content')
    <div id="colorlib-main">
        <div class="colorlib-blog">
            <div class="container-wrap">
    @foreach($searchNewspaper as $newspaper)

        <h1>{!! $newspaper->title !!}</h1>
        <p>{!!  $newspaper->content !!}</p>
        @auth
            @if(Auth::user()->admin == 1)
                <div>
                    <form action="/newspapers/{{$newspaper->id}}" method="post" style="float: right">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="remove-item btn btn-dark">Xóa</button>
                    </form>
                </div>
            @endif
        @endauth
        <div class="comments">
            @foreach ($newspaper->comments as $comment)
                <hr>
                <strong>
                    {{$comment->user->name}}
                </strong>
                {{$comment->comment}}
                <article>
                    {{$comment->created_at->diffForHumans()}}

                </article>
            @endforeach
        </div>
    @endforeach
            </div>
        </div>
    </div>

@endsection