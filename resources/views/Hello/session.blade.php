@extends('layout.flame')

@section('title','Session')

@section('menubar')
@parent
セッションページ
@endsection

@section('content')
<p>保存されたsession : 「{{ $session_data }}」</p>
<form action="/hello/session" method="post">
    @csrf
    <input type="text" name="input">
    <button class="btn btn-primary" type="submit">send</button>
</form>
@endsection