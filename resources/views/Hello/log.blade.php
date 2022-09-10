@extends('layout.flame')

@section('title','Laravel!')

@section('content')
<form method="get" action="hello">
    <button type="submit" class="btn btn-outline-warning">home</button>
</form>
@endsection
<script>
    (() => {
        console.log('アロー関数の即時関数');
        alert('Success!');
    })();
</script>