<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class PersonController extends Controller
{
    //
    public function index(Request $request)
    {
        $items = Person::all();
        return view('person.index', ['items' => $items]);
    }

    public function post(Request $request)
    {
        $rules = [
            'input' => 'numeric',
        ];

        $messages = [
            'input.numeric' => '入力した数字~＋10歳までを検索します。',
        ];

        $validator = validator::make($request->all(), $rules, $messages);
        // $validator->sometimes('age', 'min:0', function ($input) {
        //     return !is_int($input->age);
        // });
        // $validator->sometimes('age', 'max:200', function ($input) {
        //     return !is_int($input->age);
        // });

        if ($validator->fails()) {
            return redirect('/person')
                ->withErrors($validator)
                ->withInput();
        }


        $min = $request->input * 1;
        $max = $min + 10;
        // $find = Person::where('name', $request->input)->first();
        // $find = Person::find($request->input);
        $find = Person::ageBig($min)->ageSmall($max)->orderBy('age', 'asc')->first();
        $param = ['find' => $find, 'input' => $request->input];
        return view('person.index', $param);
    }

    public function add(Request $request)
    {
        return view('person.add');
    }

    public function create(Request $request)
    {
        $this->validate($request, Person::$rules, Person::$messages);
        $person = new Person;
        $form = $request->all();
        unset($form['_token']);
        $person->fill($form)->save();
        return redirect('/hello');
    }

    public function edit(Request $request)
    {
        // $person = Person::find($request->id);
        $person = DB::table('people')->get();

        return view('person.edit', ['forms' => $person]);
    }

    public function update(Request $request)
    {
        $ids = $request->id; //idリストを配列で取得
        foreach ($ids as $id) { //idの数だけループ
            $name = 'name' . $id;
            $mail = 'mail' . $id;
            $age = 'age' . $id;
            $rules = [
                $name => 'required',
                $mail => 'email',
                $age => 'integer',
            ];
            $messages = [
                $name . '.required' => '名前を空白にはできません',
                $mail . '.email' => 'メールアドレスを入力してください',
                $age . '.integer' => '半角数字を入力してください',
            ];
            $validator = validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return redirect('/person/edit')
                    ->withErrors($validator)
                    ->withInput();
            }
            DB::table('people')->where('id', $id)->update([
                'name' => $request->$name,
                'mail' => $request->$mail,
                'age' => $request->$age,
            ]);
        }
        return redirect('/hello');
    }

    public function delete()
    {

        // $forms = Person::all(); //なぜか最新追加データが欠損する
        $forms = DB::table('people')->get();
        return view('person.del', ["forms" => $forms]);
    }

    public function remove(Request $request)
    {
        $deleteItems = explode(",", $request->sendData);
        foreach ($deleteItems as $item) {
            // Person::find($item)->delete();
            DB::table('people')->where('id', $item)->delete();
        }
        return redirect('person/del')->with('result', '削除しました！');;
    }
}
