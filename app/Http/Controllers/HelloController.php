<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Log;
use App\Http\Requests\HelloRequest;
use LDAP\Result;
use Illuminate\Support\Facades\Validator; //バリデータを作成する時に使用
use function PHPUnit\Framework\isNull;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    //
    public function index(Request $request)
    {
        // $items = DB::select('select * from people'); or
        if (isset($request->id)) {
            $param = ['id' => $request->id];
            $items = DB::select(
                'select * from people where id = :id',
                $param
            );
        } else {
            $items = DB::select('select * from people');
        }

        return view('hello.index', ['items' => $items]);
    }

    public function post(Request $request)
    {
        //下記のバリデータを作有効にしたい時　HelloRequest->Requestに変更
        //下記はコメントアウトしても動きます

        // $rules = [
        //     'name' => 'required',
        //     'mail' => 'email',
        //     'age' => 'numeric',
        // ];

        // $messages = [
        //     'name.required' => '名前を入力して',
        //     'mail.email' => 'メールアドレスを入力して',
        //     'age.numeric' => '整数で入力してね',
        //     'age.min' => '0以上でよろしく',
        //     'age.max' => '200以下でよろしく',
        // ];

        // $validator = validator::make($request->all(), $rules, $messages);
        // $validator->sometimes('age', 'min:0', function ($input) {
        //     return !is_int($input->age);
        // });
        // $validator->sometimes('age', 'max:200', function ($input) {
        //     return !is_int($input->age);
        // });

        // if ($validator->fails()) {
        //     return redirect('/hello')
        //         ->withErrors($validator)
        //         ->withInput();
        // }
        //ここまで
        $items = DB::select('select * from people');
        $msg = $request->msg;
        return view('hello.index', ['msg' => $msg, 'items' => $items]);
    }

    public function add(Request $request)
    {
        $createMsg = 'データを入力してください';
        return view('hello.add', ['createMsg' => $createMsg]);
    }

    public function create(HelloRequest $request)
    {
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::insert('insert into people (name,mail,age) values (:name,:mail,:age)', $param);

        $createMsg = '登録できました！';
        return view('hello.add', ['createMsg' => $createMsg]);
    }

    public function edit(Request $request)
    {
        $items = DB::select('select * from people');

        return view('hello.edit', ['items' => $items]);
    }

    public function update(Request $request)
    {
        $param = [
            'id' => $request->id,
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::update('update people set name = :name, mail = :mail, age = :age where id = :id', $param);
        return redirect('/hello');
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
