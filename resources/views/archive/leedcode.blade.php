@extends('layout.flame')
<style>
    textarea {
        width: auto;
        height: 340px;
        resize: horizontal;
    }

    #sortItems {
        float: right;
        margin-top: 4px;
    }

    #sectionTitle {
        font-size: 20px;
    }

    .content-list {
        /* border: 1px blue solid; */
        height: 700px;
    }

    .content-left {
        /* border: 1px red solid; */
    }

    .overview {
        height: 35%;
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

    .db-table {
        table-layout: fixed;
        width: 100%;
    }

    .problemColumn {
        text-decoration: none;
    }

    .problemColumn:hover {
        color: aquamarine;
    }

    #problemId {
        width: 14%;
    }

    #problemTitle {
        width: 50%;
    }

    #problemDiff {
        width: 20%;
    }

    #problemURL {
        width: 16%;
    }

    .problemTd {
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

    .problemURL {
        text-decoration: none;
        border-radius: 10%;
        padding: 1px;

        position: relative;
        display: inline-block;
        transition: .3s;
    }

    .problemURL::after {
        position: absolute;
        bottom: 0;
        left: 50%;
        content: '';
        width: 0;
        height: 1px;
        background-color: #2ecc71;
        transition: .3s;
        -webkit-transform: translateX(-50%);
        transform: translateX(-50%);
    }

    .problemURL:hover::after {
        width: 100%;
    }

    .problemData {
        /* display: inline-block; */
        transition: .3s;
        -webkit-transform: scale(1);
        transform: scale(1);
    }

    .problemData:hover {
        cursor: pointer;
        background-color: #ccc;
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
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
            <span id="sectionTitle"> problems </span>

            <!-- selectboxの保持 -->
            <select name="sortItems" id="sortItems" onchange="selectSort(this);">
                <option value="">---sort---</option>
                @foreach($selectSort as $ss)
                @if(!empty($ss))
                @if($ss == $sort)
                <option value="{{ $ss }}" selected>{{ $ss }}</option>
                @else
                <option value="{{ $ss }}">{{ $ss }}</option>
                @endif
                @else
                <option value="{{ $ss }}">{{ $ss }}</option>
                @endif
                @endforeach
            </select>

            <table class="db-table">
                <tr>
                    <th id="problemId"><a class="problemColumn" href="/archive?sort=problem_id">Id</a></th>
                    <th id="problemTitle"><a class="problemColumn" href="/archive?sort=title">Title</a></th>
                    <th id="problemDiff"><a class="problemColumn" href="/archive?sort=difficulty">Diff</a></th>
                    <th id="problemURL">URL</th>
                </tr>
                @foreach($data as $problem)
                <tr class="problemData">
                    <td class="problemTd" onclick="selectData('{{ $problem->my_code}}','{{$problem->ex_code}}','{{$problem->overview }}');">{{ $problem->problem_id }}</td>
                    <td class="problemTd" onclick="selectData('{{ $problem->my_code}}','{{$problem->ex_code}}','{{$problem->overview }}');">{{ $problem->title }}</td>
                    <td class="problemTd" onclick="selectData('{{ $problem->my_code}}','{{$problem->ex_code}}','{{$problem->overview }}');">{{ $problem->difficulty }}</td>
                    <td class="problemTd"><a class="problemURL" href="{{ $problem->url }}" target="_blank">Jump</a></td>
                </tr>
                @endforeach
            </table>
            <div class="pre_next mt-2">{{ $data->appends(['sort' => $sort])->links('pagination::bootstrap-5') }}</div>
            <div class="overview border border-3 rounded" id="overview"></div>
        </div>
        <div class="content-right col-7 offset-col-1 row">
            <div class="content-right-over rounded col-12">
                <div class="input-group">
                    <span class="input-group-text" style="background-color: orange;">My code</span>
                    <textarea class=" form-control" id="my_code" style="resize: none;" aria-label="With textarea" readonly></textarea>
                </div>
            </div>
            <div class="content-right-under rounded col-12">
                <div class="input-group">
                    <span class="input-group-text" style="background-color: orange;">Ex code</span>
                    <textarea class="form-control" id="ex_code" style="resize: none;" aria-label="With textarea" readonly></textarea>
                </div>
            </div>
        </div>
    </div>
</div>
@include('components.message',['msg_title'=>'OverView','msg_content'=> $data[1] ])
@endsection

<script>
    //クリックしたデータを取得して表示
    function selectData(my, ex, ov) {
        document.getElementById('my_code').value = my;
        document.getElementById('ex_code').value = ex;
        document.getElementById('overview').textContent = ov;
    }

    //sort
    function selectSort(obj) {
        var idx = obj.selectedIndex;
        var value = obj.options[idx].value;
        location.href = '/archive?sort=' + value;
    }
</script>