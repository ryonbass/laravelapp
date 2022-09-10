@extends('layout.flame')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title','Laravel!')

@section('menubar')
@parent
コンテンツメニュー
@endsection

@section('content')

<p>ここが本文のコンテンツです</p>
<!-- <p>ViewComposer value<br>'view_message' = ' $view_message '</p> -->
<p>データを追加</p>
@if(count($errors) > 0 )
<div>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<form method="POST" action="/hello" name="myForm">
    @csrf
    <tr>
        <th>name:<input type="text" name="name" value="{{ old('name') }}"></th>
    </tr>
    <tr>
        <th>name:<input type="text" name="email" value="{{ old('email') }}"></th>
    </tr>
    <button type="submit" class="btn btn-outline-primary">追加</button>
    <table>
        @foreach($data as $item)
        <tr>
            <th>{{$item['name']}}</th>
            <td>{{$item['email']}}</td>
        </tr>

        @endforeach
    </table>

    <p>これは<middleware>google.com</middleware>へのリンクです</p>
    <p>これは<middleware>yahoo.com</middleware>へのリンクです</p>

    @if(!isset($msg))
    @include('components.message',['msg_title'=>'Hello!','msg_content'=>'サブビューです'])
    @else
    @include('components.message',['msg_title'=>'Ajax!','msg_content'=>$msg.'が入力されました!'])
    @endif

    <input type="text" name="msg" id="msg" value=''>
    <button type="button" class="btn btn-outline-warning" id='ajax'>Ajax</button>

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

@section('footer')
copyright 2022 ryonbass.
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
    $(function() {
        $('#ajax').click(function() {
            var val = $('#msg').val();
            // Ajax通信を開始する
            $.ajax({
                headers: {
                    // POSTのときはトークンの記述がないと"419 (unknown status)"になるので注意
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: '/ajax',
                dataType: 'json', //②
                json: { //③
                    val: val,
                },
                success: function(res) {
                    console.log(res[data]);
                    console.log('成功');
                },
                error: function() {
                    console.log('失敗');
                }
            })
        });
    });
</script>