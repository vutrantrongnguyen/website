@extends('layouts.app')
@section('content')
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
    {{--@if (Route::has('login'))--}}
    {{--<div class="entity_comments">--}}
    {{--@auth--}}
    {{--<div>--}}
    {{--<form method="post" action="/comments">--}}
    {{--{{csrf_field() }}--}}
    {{--<input type="hidden" required value="{{$newspaper->id}}" name="newspaper_id">--}}
    {{--<div class="form-group">--}}
    {{--<textarea name="comment" placeholder=":))" required class="form-control"></textarea>--}}
    {{--</div>--}}
    {{--<div class="form-group">--}}
    {{--<button class="btn btn-dark" type="submit">nhập comment</button>--}}
    {{--</div>--}}
    {{--</form>--}}
    {{--</div>--}}
    {{--@else--}}
    {{--<p>Đăng nhập để viết ý kiến của bạn</p>--}}
    {{--@endauth--}}
    {{--</div>--}}
    {{--@endif--}}
    {{--</div>--}}
    @endforeach
@endsection