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

    .sectionTitle {
        font-size: 20px;
    }

    .content-list {
        /* border: 1px blue solid; */
        height: 700px;
    }

    .content-left {
        /* border: 1px red solid; */
        height: 100%;
    }

    .overview {
        height: 53%;
        overflow: scroll;
        font-size: 0.7em;
    }

    .content-right {
        height: 100%;
    }

    .content-right-over {
        height: 90%;
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

    .input-group {
        height: 100%;
    }

    /* .form-control-original {
        display: block;
        width: 100%;
        height: 100%;
        padding: 0.375rem 0.75rem;
    font-size: 0.5em;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    /* background-clip: padding-box; */
    /* border: 1px solid #ced4da;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.25rem;
    transition: border-color .15s ease-in-out,
    box-shadow .15s ease-in-out;
    } */

    .exam-area {
        height: 10%;
    }

    .modal-btn {
        margin: 15px 0;
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


@section('title','LeetCode')

@section('menubar')
@parent
leetcode's archive.
@endsection

@section('content')
<br>
<br>
<br>
<br>
<div class="row">
    <div class="content-list col-12 row justify-content-evenly">
        <div class="content-left border border-4 rounded col-4">
            <span class="sectionTitle"> problems </span>

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
                    <td class="problemTd" onclick="selectData(['{{ $problem->my_code}}','{{$problem->ex_code}}','{{$problem->overview }}','{{$problem->exam1}}','{{$problem->exam2}}','{{$problem->exam3}}']);">{{ $problem->problem_id }}</td>
                    <td class="problemTd" onclick="selectData(['{{ $problem->my_code}}','{{$problem->ex_code}}','{{$problem->overview }}','{{$problem->exam1}}','{{$problem->exam2}}','{{$problem->exam3}}']);">{{ $problem->title }}</td>
                    <td class="problemTd" onclick="selectData(['{{ $problem->my_code}}','{{$problem->ex_code}}','{{$problem->overview }}','{{$problem->exam1}}','{{$problem->exam2}}','{{$problem->exam3}}']);">{{ $problem->difficulty }}</td>
                    <td class="problemTd"><a class="problemURL" href="{{ $problem->url }}" target="_blank">Jump</a></td>
                </tr>
                @endforeach
            </table>
            <div class="pre_next mt-2">{{ $data->appends(['sort' => $sort])->links('pagination::bootstrap-5') }}</div>
            <span class="sectionTitle"> OverView </span>
            <div class="overview border border-3 rounded" id="overview"></div>
        </div>
        <div class="content-right col-7 offset-col-1 row">
            <div class="content-right-over rounded col-12">
                <div class="input-group">
                    <span class="input-group-text" style="background-color: orange; height:100%;">My code</span>
                    <div class="form-control code-area" style="font-size:0.5em; height:100%; overflow:scroll;" id="my_code"></div>
                </div>
            </div>
            <!-- <div class="content-right-under rounded col-12">
                <div class="input-group">
                    <span class="input-group-text" style="background-color: orange;">Ex code</span>
                    <div class="form-control-original code-area" id="ex_code"></div>
                </div> -->
            <div class="exam-area row">
                <div class="col-12 btn-area">
                    <button type="button" class="btn btn-primary col-2 modal-btn" data-bs-toggle="modal" data-bs-target="#exam1">
                        Exam1
                    </button>
                    <button type="button" class="btn btn-primary col-2 offset-1 modal-btn" data-bs-toggle="modal" data-bs-target="#exam2">
                        Exam2
                    </button>
                    <button type="button" class="btn btn-primary col-2 offset-1 modal-btn" data-bs-toggle="modal" data-bs-target="#exam3">
                        Exam3
                    </button>
                    <button type="button" class="btn btn-primary col-2 offset-1 modal-btn" data-bs-toggle="modal" data-bs-target="#ex_code">
                        Ex Code
                    </button>

                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Modal exam1 -->
<div class="modal fade" id="exam1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Exam1</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="exam1-content"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal exam2 -->
<div class="modal fade" id="exam2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Exam2</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="exam2-content"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal exam3 -->
<div class="modal fade" id="exam3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Exam3</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="exam3-content"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal ex_code -->
<div class="modal fade" id="ex_code" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ex Code</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="ex_code_content"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@include('components.message',['msg_title'=>'OverView','msg_content'=> $data[1] ])
@endsection

<script>
    //dataset on click
    function selectData(arr) {
        document.getElementById('my_code').innerHTML = arr[0];
        document.getElementById('ex_code_content').innerHTML = arr[1];
        document.getElementById('overview').innerHTML = arr[2];
        document.getElementById('exam1-content').innerHTML = arr[3];
        document.getElementById('exam2-content').innerHTML = arr[4];
        document.getElementById('exam3-content').innerHTML = arr[5];
    }

    //sort
    function selectSort(obj) {
        var idx = obj.selectedIndex;
        var value = obj.options[idx].value;
        location.href = '/archive?sort=' + value;
    }
</script>