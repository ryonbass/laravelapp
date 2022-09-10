@extends('layout.flame')

@section('title','Laravel!')

@section('menubar')
@parent
コンテンツメニュー
@endsection

@section('content')
<form method="POST" action="/hello">
    @csrf
    <p>ここが本文のコンテンツです</p>
    <!-- <p>ViewComposer value<br>'view_message' = ' $view_message '</p> -->
    <p>データを追加</p>
    @if(count($errors) > 0 )
    <div>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <tr>
        <th>name:<input type="text" name="name"></th>
    </tr>
    <tr>
        <th>name:<input type="text" name="email"></th>
    </tr>
    <button type="submit">追加</button>
    <table>
        @foreach($data as $item)
        <tr>
            <th>{{$item['name']}}</th>
            <td>{{$item['email']}}</td>
        </tr>

        @endforeach
    </table>

    <p>これは<middleware>google.com</middleware>へのリンクです</p>
    <p>これは<middleware>yahoo.com</middleware>へのリンクです</p>

    @if(!isset($msg))
    @include('components.message',['msg_title'=>'Hello!','msg_content'=>'サブビューです'])
    @else
    @include('components.message',['msg_title'=>'POST!','msg_content'=>$msg.'が入力されました!'])
    @endif

    <input type="text" name="msg">
    <button type="submit" class="btn btn-outline-warning">POST</button>

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

@section('footer')
copyright 2022 ryonbass.
@endsection