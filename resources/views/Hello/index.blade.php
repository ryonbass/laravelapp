@extends('layout.flame')

@section('title','Laravel!')

@section('menubar')
@parent
コンテンツメニュー
@endsection

@section('content')
<p>ここが本文のコンテンツです</p>
<ul>
    @each('components.item',$data,'item')
</ul>
@include('components.message',['msg_title'=>'Hello!','msg_content'=>'サブビューです'])

<!-- @component ('components.message')
@slot('msg_title')
CAUTION!
@endslot

@slot ('msg_content')
これはメッセージの表示です。
@endslot


@endcomponent -->

@endsection

@section('footer')
copyright 2022 ryonbass.
@endsection