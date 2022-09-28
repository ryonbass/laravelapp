@extends('layout.flame')

@section('title','Board/Index')

@section('menubar')
@parent
Board追加メニュー
@endsection

@section('content')
<form action="add" method="post">
    <table>
        @csrf
        <tr>
            <th>Person_id:</th>
            <td><input type="number" name="person_id"></td>
        </tr>
        <tr>
            <th>title:</th>
            <td><input type="text" name="title"></td>
        </tr>
        <tr>
            <th>message:</th>
            <td><input type="text" name="message"></td>
        </tr>
        <tr>
            <th></th>
            <td><input class="btn btn-primary" type="submit" value="send"></td>
        </tr>
    </table>
</form>
@endsection