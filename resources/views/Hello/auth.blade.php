@extends('layout.flame')

@section('title','hello/login')

@section('menubar')
@parent
ログインページ
@endsection

@section('content')
<p>{{ $message }}</p>
<form action="/hello/auth" method="post">
    @csrf
    <table>
        <tr>
            <th>mail: </th>
            <td><input type="text" name="email"></td>
        </tr>
        <tr>
            <th>pass: </th>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <th>mail: </th>
            <td><button class="btn btn-primary">send</button></td>
        </tr>
    </table>
</form>
@endsection