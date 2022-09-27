@extends('layout.flame')

@section('title','Dlelte')

@section('menuvar')
@parent
マイグレーション＠削除
@endsection

@section('content')
{{ session('result') }}
<form action="del" method="post" name="myform">

    <table>
        @csrf
        <tr>
            <th>check</th>
            <th>name</th>
            <th>mail</th>
            <th>age</th>
        </tr>
        <div id="deleteCheck">
            @foreach($forms as $form)
            <tr>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="data" value="{{ $form->id }}">
                    </div>
                    {{ $form->id }}
                </td>
                <td>{{ $form->name }}</td>
                <td>{{ $form->mail }}</td>
                <td>{{ $form->age }}</td>
            </tr>
            @endforeach
        </div>
    </table>
    <button class="btn btn-primary" type=" submit" onclick="dataSend()">send</button>
    <input type="hidden" id="sendData" name="sendData" value="">
</form>
@endsection

<script>
    function dataSend() {
        const arr = [];
        const data = document.myform.data;

        for (let i = 0; i < data.length; i++) {
            if (data[i].checked) { //(chk1[i].checked === true)と同じ
                arr.push(data[i].value);
            }
        }
        document.getElementById("sendData").value = arr;
    }
</script>