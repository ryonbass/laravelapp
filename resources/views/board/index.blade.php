@extends('layout.flame')

@section('title','Board/Index')

@section('menubar')
@parent
Boardトップメニュー
@endsection

@section('content')
<table>
    <tr>
        <th>Title</th>
        <th>Message</th>
        <TH>Name</TH>
    </tr>
    @foreach($items as $item)
    <tr>
        <td>{{ $item->title }}</td>
        <td>
            {{ $item->message }}
        </td>
        <td>@if ($item->person != null)
            {{$item->person->name }}
            @endif
        </td>
    </tr>
    @endforeach
</table>
@endsection