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
            margin-top: 10px;
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

        th {
            background-color: #999;
            color: #fff;
            padding: 5px 10px;
        }

        td {
            border: solid 1px #aaa;
            color: #999;
            padding: 5px 10px;
        }

        .footer {
            text-align: right;
            font-weight: bold;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="text">
            <h1><span>@yield('title')</span></h1>
        </div>

        @section('menubar')
        <p>@show</p>
        <nav class="navbar navbar-expand-lg navbar-light " style=" background-color: #e3f2fd;">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{url ('/hello') }}">Top</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/hello/session') }}">Session</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Person
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ url('/person') }}">Find</a></li>
                                <li><a class="dropdown-item" href="{{url('/person/add')}}">Add</a></li>
                                <li><a class="dropdown-item" href="{{url('/person/edit')}}">Edit</a></li>
                                <li><a class="dropdown-item" href="{{url('/person/del')}}">Delete</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Database
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ url('/edit') }}">edit</a></li>
                                <li><a class="dropdown-item" href="{{url('/add')}}">Add</a></li>
                                <li><a class="dropdown-item" href="{{url('/delete')}}">delete</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{url ('/log') }}">Log</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Board
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ url('/board') }}">index</a></li>
                                <li><a class="dropdown-item" href="{{url('/board/add')}}">Add</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                RESTful
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ url('/rest/create') }}">rest/create</a></li>
                                <li><a class="dropdown-item" href="{{ url('/rest') }}">restdata(json)</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Contact</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>

        <hr size="1">
        <div class="content">
            @yield('content')
        </div>
        <div class="footer">
            copyright 2022 ryonbass.
        </div>
    </div>
</body>

</html>