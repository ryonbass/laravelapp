<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Log;
use App\Http\Requests\HelloRequest;
use LDAP\Result;
use Illuminate\Support\Facades\Validator; //バリデータを作成する時に使用
use function PHPUnit\Framework\isNull;
use Illuminate\Support\Facades\DB;
use App\Models\Person;

class HelloController extends Controller
{
    //
    public function index(Request $request)
    {

        // if (isset($request->id)) {
        //     $id = $request->id;
        //     $items = DB::table('people')->where('id', '<=', $id)->get();
        // } else {
        //     $items = DB::table('people')->orderBy('id')->get();
        // }

        //sort
        $sort = $request->sort;
        $items = DB::table('people')->orderBy($sort, 'asc')->paginate(5);
        // $items = Person::orderBy($sort, 'asc')->simplePaginate(5);
        $param =  ['items' => $items, 'sort' => $sort];
        return view('hello.index', $param);
    }

    public function post(Request $request)
    {
        //下記のバリデータを有効にしたい時　HelloRequest->Requestに変更
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
        DB::table('people')->insert($param);

        $createMsg = '登録できました！';
        return view('hello.add', ['createMsg' => $createMsg]);
    }

    public function edit(Request $request)
    {
        $items = DB::table('people')->get();

        return view('hello.edit', ['items' => $items]);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::table('people')->where('id', $id)->update($param);
        $items = DB::table('people')->get();
        return view('hello.edit', ['items' => $items]);
    }

    public function delete(Request $request)
    {
        $items = DB::select('select * from people');
        $msg = '削除するデータを選んでください';
        return view('hello.delete', ['items' => $items, 'msg' => $msg]);
    }

    public function remove(Request $request)
    {
        $id = $request->id;
        $msg = '削除しました！';
        DB::table('people')->where('id', $id)->delete();
        $items = DB::select('select * from people');
        return view('hello.delete', ['items' => $items, 'msg' => $msg]);
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

    public function rest(Request $request)
    {
        return view('hello.rest');
    }

    public function ses_get(Request $request)
    {
        $sesdata = $request->session()->get('msg');
        return view('hello.session', ['session_data' => $sesdata]);
    }

    public function ses_put(Request $request)
    {
        //ファイルでsession管理：storage->framework->sessionsに保存されていく
        //DBでsession管理：セッションテーブルに保存されていく
        $msg = $request->input;
        $request->session()->put('msg', $msg);
        return redirect('hello/session');
    }
}
