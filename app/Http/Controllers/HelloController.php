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
        return view('hello.index', ['data' => $request->data]);
    }

    public function post(Request $request)
    {
        $msg = $request->msg;
        $validate_rule = [
            'name' => 'required',
            'email' => 'email',
        ];
        $this->validate($request, $validate_rule);
        return view('hello.index', ['data' => $request->data, 'msg' => $msg]);
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
        // Log::debug("debug ログ!");
        return view('hello.log');
    }
}
