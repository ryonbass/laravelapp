@extends('layout.flame')

@section('title','Laravel!')

@section('content')
<form action="/edit" method="post">
    @csrf
    <input type="hidden" name="id" value="{{ $form->id }}">

    <table>
        <tr>
            <th>edit</th>
            <th>Name</th>
            <th>Mail</th>
            <th>Age</th>
        </tr>
        @foreach($items as $i)
        <tr>
            <td>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="selectData" id="flexRadioDefault2" value="{{ $i->id }}" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                    </label>
                </div>
            </td>
            <td>{{ $i->name }}</td>
            <td>{{ $i->mail }}</td>
            <td>{{ $i->age }}</td>
        </tr>
        @endforeach
    </table>

    <!-- <button type="submit" class="btn btn-success">Select</button> -->

    <p>データを編集</p>

    <table>

        <tr>
            <th>name:</th>
            <td><input type="text" name="name" value="{{ $form->name }}"></td>
        </tr>

        <tr>
            <th>email:</th>
            <td><input type="text" name="mail" value="{{ $form->mail }}"></td>
        </tr>

        <tr>
            <th>age:</th>
            <td><input type=" text" name="age" value="{{ $form->age }}"></td>
        </tr>
    </table>
    <button type="submit" class="btn btn-success">Edit</button>
</form>
@endsection