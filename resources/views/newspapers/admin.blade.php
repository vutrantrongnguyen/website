@extends('layouts.app')
@section('content')
    <div id="colorlib-main">
        <div class="colorlib-blog">
            <div class="container-wrap">
                @auth
                    @if(Auth::user()->admin == 1)
                        <div class="col-xxl-5 col-lg-6" style="">
                            <!-- Panel Projects -->
                            <div class="panel" id="projects">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Member</h3>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <td>Name</td>
                                            <td>Completed</td>
                                            <td>Join in</td>
                                            <td>Actions</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($admins as $admin)
                                            <tr>
                                                <td> {{ $admin->name }}</td>
                                                <td>
                                                    <span data-plugin="peityPie" data-skin="red" style="display: none;">7/10</span>
                                                    <svg class="peity" height="22" width="22">
                                                        <path d="M 11 0 A 11 11 0 1 1 0.5383783207533117 14.399186938124423 L 11 11"
                                                              fill="#d32f2f"></path>
                                                        <path d="M 0.5383783207533117 14.399186938124423 A 11 11 0 0 1 10.999999999999998 0 L 11 11"
                                                              fill="#ef5350"></path>
                                                    </svg>
                                                </td>
                                                <td>{{$admin->created_at->format('d-m-Y')}}</td>
                                                <td>
                                                    <form action="/admin/members/{{$admin->id}}" method="post"
                                                          style="float: right">
                                                        {{ csrf_field() }}
                                                        {{ method_field('put') }}
                                                        <input name="admin" value="0" type="hidden">
                                                        <button type="submit"
                                                                class="btn btn-sm btn-icon btn-pure btn-default waves-effect waves-classic"
                                                                data-toggle="tooltip"
                                                                data-original-title="Become member"><i
                                                                    class="icon md-wrench" aria-hidden="true"></i>
                                                        </button>
                                                    </form>
                                                    <form action="/admin/members/{{$admin->id}}" method="post"
                                                          style="float: right">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button class="btn btn-sm btn-icon btn-pure btn-default waves-effect waves-classic"
                                                                data-toggle="tooltip" data-original-title="Delete"><i
                                                                    class="icon md-close" aria-hidden="true"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @foreach($members as $member)
                                            <tr>
                                                <td>{{ $member->name }}</td>
                                                <td>
                                                    <span data-plugin="peityPie" data-skin="red" style="display: none;">7/10</span>
                                                    <svg class="peity" height="22" width="22">
                                                        <path d="M 11 0 A 11 11 0 1 1 0.5383783207533117 14.399186938124423 L 11 11"
                                                              fill="#d32f2f"></path>
                                                        <path d="M 0.5383783207533117 14.399186938124423 A 11 11 0 0 1 10.999999999999998 0 L 11 11"
                                                              fill="#ef5350"></path>
                                                    </svg>
                                                </td>
                                                <td>{{$member->created_at->format('d-m-Y')}}</td>
                                                <td class="text-nowrap">
                                                    <form action="/admin/members/{{$member->id}}" method="post"
                                                          style="float: right">
                                                        {{ csrf_field() }}
                                                        {{ method_field('put') }}
                                                        <input name="admin" value="1" type="hidden">
                                                        <button type="submit"
                                                                class="btn btn-sm btn-icon btn-pure btn-default waves-effect waves-classic"
                                                                data-toggle="tooltip"
                                                                data-original-title="Become admin"><i
                                                                    class="icon md-wrench" aria-hidden="true"></i>
                                                        </button>
                                                    </form>
                                                    <form action="/admin/members/{{$member->id}}" method="post"
                                                          style="float: right">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button class="btn btn-sm btn-icon btn-pure btn-default waves-effect waves-classic"
                                                                data-toggle="tooltip" data-original-title="Delete"><i
                                                                    class="icon md-close" aria-hidden="true"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- End Panel Projects -->
                        </div>
                    @else
                    @endif
                @endauth
            </div>
        </div>
    </div>
    {{--@auth--}}
    {{--@if(Auth::user()->admin == 1)--}}
    {{--<div class="flex-center position-ref">--}}

    {{--<div class="contents">--}}
    {{--<div>--}}
    {{--<ul>--}}
    {{--@foreach($admins as $admin)--}}
    {{--<div>--}}
    {{--<li> {{ $admin->name }}--}}
    {{--<form action="/admin/members/{{$admin->id}}" method="post" style="float: right">--}}
    {{--{{ csrf_field() }}--}}
    {{--{{ method_field('put') }}--}}
    {{--<input name="admin" value="0" type="hidden">--}}
    {{--<button type="submit" class="remove-item btn btn-dark">become member</button>--}}
    {{--</form>--}}
    {{--<hr>--}}
    {{----}}
    {{--</li>--}}
    {{--</div>--}}
    {{--@endforeach--}}

    {{--@foreach($members as $member)--}}
    {{--<div>--}}
    {{--<li> {{ $member->name }}--}}
    {{--<form action="/admin/members/{{$member->id}}" method="post" style="...">--}}
    {{--{{ csrf_field() }}--}}
    {{--{{ method_field('put') }}--}}
    {{--<input name="admin" value="1" type="hidden">--}}
    {{--<button type="submit" class="remove-item btn btn-dark">become admin</button>--}}
    {{--</form>--}}
    {{--<form action="/admin/members/{{$member->id}}" method="post" style="float: right">--}}
    {{--{{ csrf_field() }}--}}
    {{--{{ method_field('DELETE') }}--}}
    {{--<button class="remove-item btn btn-dark">X</button>--}}
    {{--</form>--}}
    {{--</li>--}}
    {{--</div>--}}
    {{--@endforeach--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--@else--}}
    {{--@endif--}}
    {{--@endauth--}}
@endsection


