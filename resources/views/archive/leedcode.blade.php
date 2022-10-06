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
                    <th>No</th>
                    <th>title</th>
                    <th>time</th>
                    <th>memory</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>sum roman</td>
                    <td>32</td>
                    <td>24</td>
                </tr>
            </table>
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