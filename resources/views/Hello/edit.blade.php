@extends('layout.flame')

@section('title','Laravel!')

@section('content')
<form action="/edit" method="post" id="userData">
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
                    <input class="form-check-input" type="radio" name="selectData" value="{{ $i->id }}" checked>
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

    <button type="button" class="btn btn-primary" onclick="selectUser()">Select</button>

    <p>データを編集</p>
    <input type="hidden" name="id" id="id" value="">
    <table>
        <tr>
            <th>name:</th>
            <td><input type="text" name="name" id="name" value=""></td>
        </tr>

        <tr>
            <th>email:</th>
            <td><input type="text" name="mail" id="mail" value=""></td>
        </tr>

        <tr>
            <th>age:</th>
            <td><input type=" text" name="age" id="age" value=""></td>
        </tr>
    </table>
    <button type="submit" class="btn btn-success">Edit</button>
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

        //選択したデータをフォームに反映
        let userData = ['name', 'mail', 'age'];
        userData.forEach(function(element) {
            let selectUserData = document.getElementById(element + userId).value;
            let editUser = document.getElementById(element);
            editUser.value = selectUserData;
        });

    }
</script>