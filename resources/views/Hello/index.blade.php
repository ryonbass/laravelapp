@extends('layout.flame')

@section('title','Laravel!')

@section('menubar')
@parent
トップページ
@endsection
<style>
    .mainTable {
        border-radius: 10;
    }

    .pagination {
        font-size: 10pt;
    }

    .pagination li {
        display: inline-block;
    }

    .pre_next {
        text-align: center;
    }

    tr th a {
        text-decoration: none;
    }

    tr th a:link {
        color: white;
    }

    tr th a:visited {
        color: white;
    }

    tr th a:hover {
        color: aqua;
    }

    tr th a:active {
        color: white;
    }
</style>

@section('content')
@if(Auth::check())
<!-- <span style="float:right;">{{ $message }} User: {{ $user->name }}</span> -->

@else
<p>※ログインしていません。(<a href="/login">ログイン</a>|<a href="/register">登録</a>)</p>
@endif
<form method="POST" action="/hello">
    @csrf
    <p>Laravel 9 TEST PAGE.</p>
    <!-- <p>ViewComposer value<br>'view_message' = ' $view_message '</p> -->
    <div class="col mainTable">
        <table style="margin: 0 auto;">
            <tr>
                <th><a href="/hello?sort=name">Name</a></th>
                <th><a href="/hello?sort=mail">Mail</a></th>
                <th><a href="/hello?sort=age">Age</a></th>
            </tr>
            @foreach($items as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->mail }}</td>
                <td>{{ $item->age }}</td>
            </tr>
            @endforeach
        </table>
        <div class="pre_next mt-2">{{ $items->appends(['sort' => $sort])->links('pagination::bootstrap-5') }}</div>
    </div>


    <p>これは<middleware>google.com</middleware>へのリンクです</p>
    <p>これは<middleware>yahoo.com</middleware>へのリンクです</p>

    <!-- @if(!isset($msg))
    @include('components.message',['msg_title'=>'Hello!','msg_content'=>'サブビューです'])
    @else
    @include('components.message',['msg_title'=>'POST!','msg_content'=>$msg.' が入力されました!'])
    @endif -->

    <!-- @if(!isset($msg))
    @include('components.message',['msg_title'=>'Hello!','msg_content'=>'サブビューです'])
    @else
    @include('components.message',['msg_title'=>'POST!','msg_content'=>$msg.' が入力されました!'])
    @endif -->

    <!-- <input type="text" name="msg"> -->
    <!-- <button type="submit" class="btn btn-outline-warning">POST</button> -->


    @if(!isset($message))
    @include('components.message',['msg_title'=>$message,'msg_content'=>'サブビューです'])
    @else
    @include('components.message',['msg_title'=>$message,'msg_content'=>$user->name])
    @endif


    <!-- @component ('components.message')
@slot('msg_title')
CAUTION!
@endslot

@slot ('msg_content')
これはメッセージの表示です。
@endslot

@endcomponent -->
</form>
@endsection