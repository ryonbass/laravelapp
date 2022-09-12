@extends('layout.flame')

@section('title','Laravel!')

@section('content')
<form action="/add" method="post">
    @csrf
    <p>データを追加</p>
    @if(count($errors) > 0 )
    <p>入力に誤りがあります。再入力してください。</p>
    @else
    <p>{{ $createMsg }}</p>
    @endif
    <table>
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
        @error('mail')
        <tr>
            <th>ERROR</th>
            <td>{{$message}}</td>
        </tr>
        @enderror
        <tr>
            <th>email:</th>
            <td><input type="text" name="mail" value="{{old('mail')}}"></td>
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
</form>
@endsection