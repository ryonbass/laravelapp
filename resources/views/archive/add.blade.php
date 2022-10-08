@extends('layout.flame')
<style>
    .errmsg {
        color: red;
    }
</style>


@section('title','Archive/add')

@section('menubar')
@parent
LeedCodeの記録追加
@endsection

@section('content')
@if(count($errors) > 0 )
<p>入力に誤りがあります。再入力してください。</p>
@else
<p>{{ $successMsg }}</p>
@endif
<form class="row g-3" action="/archive/add" method="post">
    @csrf
    <div class="col-md-6">
        <label for="title" class="form-label">Title
            @error('title')
            <span class="errmsg">※{{$message}}</span>
            @enderror
        </label>
        <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
    </div>
    <div class="col-md-2">
        <label for="difficulty" class="form-label">Difficulty</label>
        <select id="difficulty" class="form-select" name="difficulty" value="{{old('difficulty')}}">
            <option selected>Easy</option>
            <option>Medium</option>
            <option>Hard</option>
        </select>
    </div>
    <div class="col-12">
        <label for="my_code" class="form-label">My code
            @error('my_code')
            <span class="errmsg">※{{$message}}</span>
            @enderror
        </label>
        <textarea class="form-control" id="my_code" name="my_code">{{old('my_code')}}</textarea>
    </div>
    <div class="col-12">
        <label for="ex_code" class="form-label">Ex code
            @error('ex_code')
            <span class="errmsg">※{{$message}}</span>
            @enderror
        </label>
        <textarea class="form-control" id="ex_code" name="ex_code">{{old('ex_code')}}</textarea>
    </div>
    <div class="col-12">
        <label for="overview" class="form-label">Overview
            @error('overview')
            <span class="errmsg">※{{$message}}</span>
            @enderror
        </label>
        <textarea class="form-control" id="overview" name="overview">{{old('overview')}}</textarea>
    </div>
    <div class="col-md-6">
        <label for="url" class="form-label">URL
            @error('url')
            <span class="errmsg">※{{$message}}</span>
            @enderror
        </label>
        <input type="text" class="form-control" id="url" name="url" value="{{old('url')}}">
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Add</button>
    </div>
</form>
@endsection