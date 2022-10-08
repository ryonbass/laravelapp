@extends('layout.flame')
<style>
    .content-list {
        /* border: 1px blue solid; */
        height: 700px;
    }

    .content-left {
        /* border: 1px red solid; */
    }

    .content-right {
        /* border: 1px green solid;  */
    }

    .content-right-over {
        height: 50%;
    }

    .content-right-under {
        padding-top: 10px;
        height: 50%;
    }

    textarea {
        width: auto;
        height: 340px;
        resize: horizontal;
    }
</style>


@section('title','LeedCode')

@section('menubar')
@parent
leedcode's archive.
@endsection

@section('content')
<br>
<br>
<br>
<br>
<div class="row">
    <div class="content-list col-12 row justify-content-evenly">
        <div class="content-left border border-4 rounded col-4">
            <p> problem title set </p>
            <table>
                <tr>
                    <th><a href="/archive?sort=id">Id</a></th>
                    <th><a href="/archive?sort=title">Title</a></th>
                    <th><a href="/archive?sort=difficulty">Difficulty</a></th>
                    <th>URL</th>
                </tr>
                @foreach($data as $problem)
                <tr>
                    <td>{{ $problem->id }}</td>
                    <td>{{ $problem->title }}</td>
                    <td>{{ $problem->difficulty }}</td>
                    <td><a href="{{ $problem->url }}" target="_blank">Click Here</a></td>
                </tr>
                @endforeach
            </table>
            <div class="pre_next mt-2">{{ $data->appends(['sort' => $sort])->links('pagination::bootstrap-5') }}</div>
        </div>
        <div class="content-right col-7 offset-col-1 row">
            <div class="content-right-over rounded col-12">
                <div class="input-group">
                    <span class="input-group-text" style="background-color: orange;">My code</span>
                    <textarea class=" form-control" id="my-code" style="resize: none;" aria-label="With textarea" readonly></textarea>
                </div>
            </div>
            <div class="content-right-under rounded col-12">
                <div class="input-group">
                    <span class="input-group-text" style="background-color: orange;">Ex code</span>
                    <textarea class="form-control" id="ex-code" style="resize: none;" aria-label="With textarea" readonly></textarea>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection