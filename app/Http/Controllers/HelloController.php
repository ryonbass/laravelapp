<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use LDAP\Result;

class HelloController extends Controller
{
    //
    public function index(Request $request)
    {
        $status = '';
        return view('hello.index', ['data' => $request->data, 'status' => $status]);
    }

    public function post(Request $request)
    {
        $status = 'post';
        return view('hello.index', ['data' => $request->data, 'status' => $status]);
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
