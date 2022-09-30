@extends('layout.flame')

@section('title','Person')

@section('menubar')
@parent
マイグレーション機能＠hasOne
@endsection

@section('content')

<table>
    <tr>
        <th>Person</th>
        <th>Board</th>
    </tr>
    @foreach($hasItems as $item)
    <tr>
        <td>{{ $item->getData() }}</td>
        <td>
            <table width="100%">
                @foreach($item->boards as $obj)
                <tr>
                    <td>{{ $obj->getData() }}</td>
                </tr>
                @endforeach
            </table>
        </td>
    </tr>
    @endforeach
</table>
<div class="my-2"></div>
<table>
    <tr>
        <th>No board Person</th>
    </tr>
    @foreach($noItems as $item)
    <tr>
        <td>{{ $item->getData() }}</td>
    </tr>
    @endforeach
</table>
@endsection