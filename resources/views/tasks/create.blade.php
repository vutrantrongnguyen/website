@extends('layouts.app')
@section('content')
    <form action="/tasks" method="post">
        {{ csrf_field() }}
        <input name="gigido">
        <button type="submit">Them</button>
    </form>
@endsection