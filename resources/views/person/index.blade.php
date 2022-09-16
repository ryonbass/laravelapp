@extends('layout.flame')

@section('title','Person')

@section('menubar')
@parent
マイグレーション
@endsection

@section('content')
@if(count($errors) > 0 )
<p>入力に誤りがあります。整数を入力してください。</p>
@endif
@error('input')
<tr>
    <th>ERROR</th>
    <td>{{$message}}</td>
</tr>
@enderror

<form action="/person" method="post">
    @csrf
    <input type="text" name="input" value="{{$input}}">
    <input type="submit" value="find">
</form>
@if(isset($find))
<table>
    <tr>
        <th>Data</th>
    </tr>
    <tr>
        <td>{{ $find->getData()}}</td>
    </tr>
</table>

@endif
@endsection