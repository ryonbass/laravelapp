@extends('layout.flame')

@section('title','Person/edit')

@section('menubar')
@parent
マイグレーション機能＠編集
@endsection

@section('content')

@if(count($errors) > 0 )
<div>
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="/person/edit" method="post">
    <table class="col" style="margin: 0 auto;">
        @csrf
        <tr>
            <th>name: </th>
            <th>mail: </th>
            <th>age: </th>
        </tr>
        @foreach($forms as $form)
        <input type="hidden" name="id" value="{{$form->id}}">
        <input type="hidden" name="id{{$form->id}}" value="{{$form->id}}">
        <tr>
            <td><input type="text" name="name{{$form->id}}" value="{{$form->name}}"></td>
            <td><input type="text" name="mail{{$form->id}}" value="{{$form->mail}}"></td>
            <td><input type="text" name="age{{$form->id}}" value="{{$form->age}}"></td>
        </tr>
        @endforeach
    </table>
    <div class="d-grid gap-2 col-3 mt-3" style="margin: 0 auto;">
        <button type="submit" class="btn btn-primary">Edit</button>
    </div>
</form>
@endsection