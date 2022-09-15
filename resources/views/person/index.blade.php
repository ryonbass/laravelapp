@extends('layout.flame')

@section('title','Person')

@section('menubar')
@parent
マイグレーション
@endsection

@section('content')
<table>
    <tr>
        <th>Data
        </th>
    </tr>
    @foreach($items as $item)
    <tr>
        <td>{{ $item->getData() }}</td>
    </tr>
    @endforeach
</table>
@endsection