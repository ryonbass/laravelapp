<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Log;
use App\Http\Requests\HelloRequest;
use LDAP\Result;
use Illuminate\Support\Facades\Validator; //バリデータを作成する時に使用
use function PHPUnit\Framework\isNull;

class HelloController extends Controller
{
    //
    public function index(Request $request)
    {
        return view('hello.index', ['data' => $request->data]);
    }

    public function post(HelloRequest $request)
    {
        //下記のバリデータを作有効にしたい時　HelloRequest->Requestに変更
        $rules = [
            'name' => 'required',
            'email' => 'email',
            'age' => 'numeric',
        ];

        $messages = [
            'name.required' => '名前を入力して',
            'email.email' => 'メールアドレスを入力して',
            'age.numeric' => '整数で入力してね',
            'age.min' => '0以上でよろしく',
            'age.max' => '200以下でよろしく',
        ];

        $validator = validator::make($request->all(), $rules, $messages);
        $validator->sometimes('age', 'min:0', function ($input) {
            return !is_int($input->age);
        });
        $validator->sometimes('age', 'max:200', function ($input) {
            return !is_int($input->age);
        });

        if ($validator->fails()) {
            return redirect('/hello')
                ->withErrors($validator)
                ->withInput();
        }
        //ここまで

        $msg = $request->msg;
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
