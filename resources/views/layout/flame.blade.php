<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>@yield('title')</title>
    <style>
        .text {
            padding: 30px 0;
            font-size: 80px;
            font-weight: bold;
            color: #4169e1;
            line-height: 0;
        }

        .text span {
            display: inline-block;
        }


        .text span:hover {
            animation: rotation_anim 1s linear infinite;
            color: gold;
            cursor: pointer;
        }

        @keyframes rotation_anim {
            100% {
                transform: rotatey(360deg);
            }
        }

        h1 {
            font-size: 100pt;
            margin: -40px 0px;
            text-align: right;
            color: #eee;
        }

        p {
            font-size: 20pt;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="text">
            <h1><span>@yield('title')</span></h1>
        </div>

        @section('menubar')
        <h2 class="menutitle">※メニュー</h2>
        <ul>
            <li>@show</li>
        </ul>
        <hr size="1">
        <div class="content">
            @yield('content')
        </div>
        <div class="footer">
            @yield('footer')
        </div>
    </div>
</body>

</html>