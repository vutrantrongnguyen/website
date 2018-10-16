@extends('layouts.app')
@section('css')

    <link rel="stylesheet" href="/css/custom.css">

@endsection


@section('content')

    <div class="row">
        <div id="a" class="col-md-4 col-sm-4"><p>anh</p></div>
        <div id="b" class="col-md-4 col-sm-7"><p>chi</p></div>
        <div id="c" class="col-md-4 col-sm-1"><p>em</p></div>
    </div>
    <button class="btn btn-info" id="show-btn">show btn</button>
    <button class="btn btn-info" id="hide-btn">hide btn</button>


@endsection
@section('script')
    <script>
        $(function () {
            $('#a').hide();
        })
        $("#show-btn").click(function () {
            $("#a").show();
        });
        $("#hide-btn").click(function () {
            $("#a").hide();
        });
        {{date("Y.m.d")}}
    </script>
@endsection