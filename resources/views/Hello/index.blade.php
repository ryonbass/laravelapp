@extends('layout.flame')

<style>
    .mainTable {
        border-radius: 10;
    }

    .pagination {
        font-size: 10pt;
    }

    .pagination li {
        display: inline-block;
    }

    .pre_next {
        text-align: center;
    }

    tr th a {
        text-decoration: none;
    }

    tr th a:link {
        color: white;
    }

    tr th a:visited {
        color: white;
    }

    tr th a:hover {
        color: aqua;
    }

    tr th a:active {
        color: white;
    }

    img {
        object-fit: contain;
    }

    /* テレビ外側 */
    #carouselExampleIndicators {
        position: relative;
        height: 500px;
        width: 50%;
        margin: 0 auto;
    }

    #tvImage {
        object-fit: fill;
    }

    .tv-inner {
        position: absolute;
        top: 8.8%;
        left: 5.5%;
        width: 89%;
        height: 64.3%;

    }

    #carousel-inner {
        position: absolute;
        top: 15%;
        left: 0;
        height: 70%;
        width: 100%;

    }
</style>

@section('title','Laravel!')

@section('menubar')
@parent
My personal programming learning site.
@endsection

@section('content')
<form method="POST" action="/hello">
    @csrf
    <!-- カルーセル -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <img src="/img/PG_language/k0771_7.svg" id="tvImage" class="d-block h-100 w-100 img-fluid" alt="TV image">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>
        <div class="tv-inner">
            <div class="carousel-inner" id="carousel-inner">
                <div class="carousel-item active">
                    <img src="/img/PG_language/php.png" class="d-block h-100 w-100 img-fluid" alt="php logo image">
                </div>
                <div class="carousel-item">
                    <img src="/img/PG_language/Java.png" class="d-block h-100 w-100 img-fluid" alt="Java logo image">
                </div>
                <div class="carousel-item">
                    <img src="/img/PG_language/Python.svg.png" class="d-block h-100 w-100 img-fluid" alt="python logo image">
                </div>
                <div class="carousel-item">
                    <img src="/img/PG_language/C_hash_tag.png" class="d-block h-100 w-100 img-fluid" alt="C# logo image">
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="py-4">
        <span>This site is a test site that I created to learn programming. <br>
            We will update the version of the site from time to time so that we can improve the learning efficiency.<br>
        </span>
    </div>
    <!-- <p>ViewComposer value<br>'view_message' = ' $view_message '</p> -->
    <div class="col mainTable">
        <table style="margin: 0 auto;">
            <tr>
                <th><a href="/hello?sort=name">Name</a></th>
                <th><a href="/hello?sort=mail">Mail</a></th>
                <th><a href="/hello?sort=age">Age</a></th>
            </tr>
            @foreach($items as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->mail }}</td>
                <td>{{ $item->age }}</td>
            </tr>
            @endforeach
        </table>
        <div class="pre_next mt-2">{{ $items->appends(['sort' => $sort])->links('pagination::bootstrap-5') }}</div>
    </div>


    <p>これは<middleware>google.com</middleware>へのリンクです</p>
    <p>これは<middleware>yahoo.com</middleware>へのリンクです</p>

    @if(!isset($msg))
    @include('components.message',['msg_title'=>'Hello!','msg_content'=>'サブビューです'])
    @else
    @include('components.message',['msg_title'=>'POST!','msg_content'=>$msg.' が入力されました!'])
    @endif

    <input type="text" name="msg">
    <button type="submit" class="btn btn-outline-warning">POST</button>

    <!-- @component ('components.message')
@slot('msg_title')
CAUTION!
@endslot

@slot ('msg_content')
これはメッセージの表示です。
@endslot

@endcomponent -->
</form>
@endsection