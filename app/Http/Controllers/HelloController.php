<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    //
    public function index()
    {
        $data = [
            ['name' => '山田太郎', 'mail' => 'taro@exmpre.com'],
            ['name' => 'ジョン万次郎', 'mail' => 'manjiro@exmpre.com'],
            ['name' => '佐々木小次郎', 'mail' => 'sasaki@exmpre.com']
        ];
        return view('hello.index', ['data' => $data]);
    }
}
