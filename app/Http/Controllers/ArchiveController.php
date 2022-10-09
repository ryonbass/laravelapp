<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    public function leedcode(Request $request)
    {
        $selectSort = ['problem_id', 'title', 'difficulty', 'create_at'];
        $sort = $request->sort;
        $data = Problem::orderBy($sort, 'asc')->paginate(10);

        return view('archive.leedcode', ['data' => $data, 'sort' => $sort, 'selectSort' => $selectSort]);
    }

    public function add(Request $request)
    {
        $successMsg = 'データを入力してください';
        return view('archive.add', ['successMsg' => $successMsg]);
    }

    public function create(Request $request)
    {
        // dd($request->all());
        $this->validate($request, Problem::$rules, Problem::$messages);
        $problem = new Problem();
        $form = $request->all();
        unset($form['_token']);
        $problem->fill($form)->save();
        $successMsg = '追加しました！';
        // return redirect('archive/add', ['successMsg' => $successMsg]);
        return view('archive.add', ['successMsg' => $successMsg]);
    }
}
