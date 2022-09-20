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
        // $items = Person::all();
        return view('person.index', ['input' => '']);
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

    public function update(Person $person, Request $request)
    {
        // $this->validate($request, Person::$rules, Person::$messages);
        // $person = Person::find($request->id);
        // $form = $request->all();
        // unset($form['_token']);
        // $person->fill($form)->save();
        // return redirect('/hello');

        $stop = $request->id;

        // dump($person->name);
        for ($id = 1; $id <= $stop; $id++) {
            // $person = Person::find($id);
            // $person = \App\Models\Person::find($id);
            // $person = DB::table('people')->where('id', $id)->first();
            Person::where('id', '=', $id)->update([
                'name' => $request->name . $id,
                'mail' => $request->mail . $id,
                'age' => $request->age . $id,
            ]);
            // $person->save();
            $id++;
        }
        return redirect('/hello');
    }
}
