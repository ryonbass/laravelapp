<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello/Rest</title>
</head>
<style>
    body {
        font-size: 16pt;
        color: #999;
        margin: 5px;
    }

    h1 {
        font-size: 50pt;
        text-align: right;
        color: #f6f6f6;
        margin: -20px 0px -30px 0px;
        letter-spacing: -4pt;
    }

    th {
        background-color: #999;
        color: fff;
        padding: 5px 10px;
    }

    td {
        border: solid 1px #aaa;
        color: #999;
        padding: 5px 10px;
    }

    .content {
        margin: 10px;
    }
</style>

<body>
    <h1>Rest</h1>
    @include('rest.create')
</body>

</html>