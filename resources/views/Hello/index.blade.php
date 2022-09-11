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
    <p>入力に誤りがあります。再入力してください。</p>
    @endif
    <table>
        @csrf
        @error('name')
        <tr>
            <th>ERROR</th>
            <td>{{$message}}</td>
        </tr>
        @enderror
        <tr>
            <th>name:</th>
            <td><input type="text" name="name" value="{{old('name')}}"></td>
        </tr>
        @error('email')
        <tr>
            <th>ERROR</th>
            <td>{{$message}}</td>
        </tr>
        @enderror
        <tr>
            <th>email:</th>
            <td><input type="text" name="email" value="{{old('email')}}"></td>
        </tr>
        @error('age')
        <tr>
            <th>ERROR</th>
            <td>{{$message}}</td>
        </tr>
        @enderror
        <tr>
            <th>age:</th>
            <td><input type=" text" name="age" value="{{old('age')}}"></td>
        </tr>
    </table>
    <button type="submit" class="btn btn-success">Send</button>
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
    @include('components.message',['msg_title'=>'POST!','msg_content'=>$msg.' が入力されました!'])
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