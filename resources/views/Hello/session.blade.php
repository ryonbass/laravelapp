@extends('layout.flame')

@section('title',Session)

@section('menubar')
@parent
セッションページ
@endsection

@section('content')
<p>{{ $session_data }}</p>
<form action="/hello/session" method="post">
    @csrf
    <input type="text" name="input">
    <button type="submit" value="send"></button>
</form>
@endsection