<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $find = Person::ageBig($min)->ageSmall($max)->first();
        $param = ['find' => $find, 'input' => $request->input];
        return view('person.index', $param);
    }
}
