@extends('layout.flame')

@section('title','Laravel!')

@section('content')
<p>{{ $msg }}</p>
<form action="/delete" method="post" id="userData">
    @csrf
    <table>
        <tr>
            <th>edit</th>
            <th>Name</th>
            <th>Mail</th>
            <th>Age</th>
        </tr>
        @foreach($items as $i)
        <tr>
            <td>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="selectData" value="{{ $i->id }}">
                    <label class="form-check-label" for="flexRadioDefault2">
                    </label>
                </div>
            </td>
            <td><input type="hidden" id="name{{ $i->id }}" value="{{ $i->name }}">{{ $i->name }}</td>
            <td><input type="hidden" id="mail{{ $i->id }}" value="{{ $i->mail }}">{{ $i->mail }}</td>
            <td><input type="hidden" id="age{{ $i->id }}" value="{{ $i->age }}">{{ $i->age }}</td>
        </tr>
        @endforeach
    </table>

    <p>データを削除</p>
    <input type="hidden" name="id" id="id" value="">
    <button type="submit" class="btn btn-danger" onclick="selectUser()">DELETE</button>
</form>
@endsection

<script>
    function selectUser() {
        //選択されたユーザーのID取得
        let user = document.getElementById('userData');
        userId = user.elements['selectData'].value;

        //POST送信するIdにラジヲボタンの値を代入
        let element = document.getElementById('id');
        element.value = userId;
    }
</script>