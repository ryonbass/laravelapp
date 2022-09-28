@extends('layout.flame')

@section('title','Board/Index')

@section('menubar')
@parent
Boardトップメニュー
@endsection

@section('content')
<table>
    <tr>
        <th>Data</th>
    </tr>
    @foreach($items as $item)
    <tr>
        <td>{{ $item->getData() }}</td>
    </tr>
    @endforeach
</table>
@endsection