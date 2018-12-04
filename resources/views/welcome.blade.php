@extends('layouts.app')
@section('content')
    <div id="colorlib-main">
        <div class="colorlib-blog">
            <div class="container-wrap">
                <div class="row row-pb-lg">
                    <div class="col-md-12 blog-slider">
                        <div class="owl-carousel1">
                            <div class="item">
                                <div class="blog-entry">
                                    <div class="blog-img" style="background-image: url(/images/blog-1.jpg);">
                                        <div class="desc desc2 text-center">
                                            <p class="tag"><span>Nature</span></p>
                                            <div class="desc-bottom">
                                                <h2 class="head-article"><a href="#">Road eye catching</a></h2>
                                                <p>Even the all-powerful Pointing has no control about the blind texts
                                                    it is an almost unorthographic life</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="blog-entry">
                                    <div class="blog-img" style="background-image: url(/images/blog-2.jpg);">
                                        <div class="desc desc2 text-center">
                                            <p class="tag"><span>Style</span></p>
                                            <div class="desc-bottom">
                                                <h2 class="head-article"><a href="#">Girl in fashion</a></h2>
                                                <p>Even the all-powerful Pointing has no control about the blind texts
                                                    it is an almost unorthographic life</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="blog-entry">
                                    <div class="blog-img" style="background-image: url(/images/blog-3.jpg);">
                                        <div class="desc desc2 text-center">
                                            <p class="tag"><span>Technology</span></p>
                                            <div class="desc-bottom">
                                                <h2 class="head-article"><a href="#">Computer technology</a></h2>
                                                <p>Even the all-powerful Pointing has no control about the blind texts
                                                    it is an almost unorthographic life</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="blog-entry">
                                    <div class="blog-img" style="background-image: url(/images/blog-4.jpg);">
                                        <div class="desc desc2 text-center">
                                            <p class="tag"><span>Fashion</span></p>
                                            <div class="desc-bottom">
                                                <h2 class="head-article"><a href="#">Man in fashion</a></h2>
                                                <p>Even the all-powerful Pointing has no control about the blind texts
                                                    it is an almost unorthographic life</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="blog-entry">
                                    <div class="blog-img" style="background-image: url(/images/blog-5.jpg);">
                                        <div class="desc desc2 text-center">
                                            <p class="tag"><span>Animals</span></p>
                                            <div class="desc-bottom">
                                                <h2 class="head-article"><a href="#">Red fish</a></h2>
                                                <p>Even the all-powerful Pointing has no control about the blind texts
                                                    it is an almost unorthographic life</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <div class="content-wrap">

                            @foreach($newspapers as $newspaper)
                                <article class="blog-entry-travel animate-box">
                                    <div class="blog-img" style="background-image: url(/images/blog-1.jpg);"></div>
                                    <div class="desc">
                                        <p class="meta">
                                            <span class="cat"><a href="#">Style</a></span>
                                            <span class="date">{{$newspaper->created_at->format('d-m-y')}}</span>
                                            <span class="pos">By <a href="#">{{$newspaper->user->name}}</a></span>
                                        </p>
                                        <h2><a href="/newspapers/{{$newspaper->id}}">{{$newspaper->title}}</a></h2>
                                        <p>{!! str_limit(strip_tags($newspaper->content),150) !!}</p>
                                        <p><a href="/newspapers/{{$newspaper->id}}" class="btn btn-primary with-arrow">Read
                                                More <i
                                                        class="icon-arrow-right22"></i></a></p>
                                    </div>
                                </article>
                            @endforeach
                            <div class="flex-center">{{$newspapers->links()}}</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="sidebar">
                            <div class="side animate-box">
                                <form class="form-inline" action="/newspapers/search" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <input class="form-control" type="text" id="search"
                                               placeholder="Enter to search...">
                                        <button class="btn submit btn-primary" type="submit"><i
                                                    class="icon-search3"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="side animate-box">
                                <h2 class="sidebar-heading">Categories</h2>
                                <p>
                                <ul class="category">
                                    <li><a href="#"> Home</a></li>
                                    <li><a href="#">About Me</a></li>
                                    <li><a href="#"> Blog</a></li>
                                    <li><a href="#"> Travel</a></li>
                                    <li><a href="#"> Lifestyle</a></li>
                                    <li><a href="#">Fashion</a></li>
                                    <li><a href="#">Health</a></li>
                                </ul>
                                </p>
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
