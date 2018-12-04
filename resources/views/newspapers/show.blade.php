@extends('layouts.app')
@section('content')
    <div id="colorlib-main">
        <div class="colorlib-blog">
            <div class="container-wrap">
                <div class="row">
                    <div class="col-md-9">
                        <div class="content-wrap">
                            <article class="animate-box">
                                <div class="blog-img" style="background-image: url(/images/blog-1.jpg);"></div>
                                <div class="desc">
                                    <div class="meta">
                                        <p>
                                            <span>{{$newspaper->created_at->diffForHumans()}}</span>
                                            <span><a href="#">{{$newspaper->comments->count()}} Comments</a></span>
                                        </p>
                                    </div>
                                    <h2><a href="/">{!! $newspaper->title !!}</a></h2>
                                    <p>{!!  $newspaper->content !!}</p></div>
                            </article>
                            <div class="row row-bottom-padded-md">
                                <div class="col-md-12 animate-box">
                                    <h2 class="heading-2">{{$newspaper->comments->count()}} Comments</h2>
                                    @foreach ($newspaper->comments as $comment)
                                        <div class="review">
                                            <div class="user-img"
                                                 style="background-image: url(/images/person1.jpg)"></div>
                                            <div class="desc">
                                                <h4>
                                                    <span class="text-left">{{$comment->user->name}}</span>
                                                    <span class="text-right">{{$comment->created_at->diffForHumans()}}</span>
                                                </h4>
                                                <p>{{$comment->comment}}</p>
                                                <p class="star">
                                                    <span class="text-left"><a href="#" class="reply"><i
                                                                    class="icon-reply2"></i></a></span>
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 animate-box">
                                    <h2 class="heading-2">Say something</h2>
                                    @if (Route::has('login'))
                                        @auth
                                            <form method="post" action="/comments">
                                                {{csrf_field() }}
                                                <input type="hidden" required value="{{$newspaper->id}}"
                                                       name="newspaper_id">
                                                <div class="row form-group">
                                                    <div class="col-md-12">
                                                        <!-- <label for="message">Message</label> -->
                                                        <textarea name="comment" id="message" cols="30" rows="10"
                                                                  class="form-control" required
                                                                  placeholder="Say something about us"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    {{--<button class="btn btn-dark" type="submit">nhập comment</button>--}}
                                                    <input type="submit" value="Post Comment" class="btn btn-primary">
                                                </div>
                                            </form>
                                        @else
                                            <p>Đăng nhập để viết ý kiến của bạn</p>
                                        @endauth
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 sticky-parent">
                        <div class="sidebar" id="sticky_item">
                            <div class="side animate-box">
                                <form class="form-inline" action="/newspapers/search" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <input class="form-control" type="text" id="search"
                                               placeholder="Enter to search...">
                                        <button class="btn submit btn-primary" type="submit"><i
                                                    class="icon-search4"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="side animate-box">
                                <h2 class="sidebar-heading">Categories</h2>
                                <p>
                                <ul class="category">
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">About Me</a></li>
                                    <li><a href="#">Blog</a></li>
                                    <li><a href="#">Travel</a></li>
                                    <li><a href="#">Lifestyle</a></li>
                                    <li><a href="#"> Fashion</a></li>
                                    <li><a href="#">Health</a></li>
                                </ul>
                                </p>
                            </div>
                            <div class="side animate-box">
                                @auth
                                    @if(Auth::user()->admin == 1)
                                        <div>
                                            <form action="/newspapers/{{$newspaper->id}}" method="post"
                                                  style="float: right">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button class="remove-item btn btn-primary">Xóa</button>
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
                            </div>
                            <div class="side animate-box">

                                <div class="form-group">
                                    <input type="text" class="form-control form-email text-center" id="email"
                                           placeholder="Enter your email">
                                    <button type="submit" class="btn btn-primary btn-subscribe">Subscribe</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
