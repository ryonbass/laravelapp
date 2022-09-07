<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        return view('hello.index', ['message' => 'Hello!', 'data' => $data]);
    }

    public function log()
    {
        // Log::emergency("emergency ログ!");
        // Log::alert("alert ログ!");
        // Log::critical("critical ログ!");
        // Log::error("error ログ!");
        // Log::warning("warning ログ!");
        // Log::notice("notice ログ!");
        // Log::info("info ログ!");
        Log::debug("debug ログ!");
    }
}
