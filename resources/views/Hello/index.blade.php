@extends('layout.flame')

@section('title','Laravel!')

@section('menubar')
@parent
コンテンツメニュー
@endsection

@section('content')
<form method="POST" action="">
    @csrf
    <p>ここが本文のコンテンツです</p>
    <!-- <p>ViewComposer value<br>'view_message' = ' $view_message '</p> -->

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

    @if(!isset( $status ))
    @include('components.message',['msg_title'=>'Hello!','msg_content'=>'サブビューです'])
    @else
    @include('components.message',['msg_title'=>'POST!','msg_content'=>'POST送信されました!'])
    @endif

    <button type="submit" class="btn btn-outline-warning">redirect</button>

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