@extends('layouts.app')
@section('content')
    <h1>{!! $newspaper->title !!}</h1>
    <p>{!!  $newspaper->content !!}</p>

    {{--@if (Route::has('login'))--}}
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
    @auth
        {{--@if(Auth::user()->name == $newspaper->user->name)--}}
        <div>
            <a href="/newspapers/{{$newspaper->id}}/edit">
                <button class="btn btn-dark">Sửa</button>
            </a>
        </div>
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
        @if (Route::has('login'))
            <div class="entity_comments">
                @auth
                    <div>
                        <form method="post" action="/comments">
                            {{csrf_field() }}
                            <input type="hidden" required value="{{$newspaper->id}}" name="newspaper_id">
                            <div class="form-group">
                                <textarea name="comment" placeholder=":))" required class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-dark" type="submit">nhập comment</button>
                            </div>
                        </form>
                    </div>

                @else
                    <p>Đăng nhập để viết ý kiến của bạn</p>
                @endauth
            </div>
        @endif

    </div>
@endsection
{{--@section('script')--}}
    {{--<script type="text/javascript">--}}
        {{--document.getElementById('submit').onclick = function (e) {--}}
             {{--var id = document.getElementById('id').value;--}}
             {{--var comment = document.getElementById('comment').value;--}}
            {{--console.log('ok');--}}
            {{--axios.post('/comments', {--}}
                {{--newspaper_id:  id,--}}
                {{--comment: comment,--}}
                {{--// firstName: 'First name',--}}
                {{--// lastName: 'Last name'--}}
            {{--})--}}
                {{--.then(function (response) {--}}
                    {{--e.preventDefault();--}}
                    {{--console.log(response);--}}
                {{--})--}}
                {{--.catch(function (error) {--}}
                    {{--console.log(error);--}}
                {{--});--}}
        {{--}--}}


    {{--</script>--}}
{{--@endsection--}}