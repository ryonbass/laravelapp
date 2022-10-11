<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //user

class ArchiveController extends Controller
{
    public function leedcode(Request $request)
    {
        $selectSort = ['problem_id', 'title', 'difficulty', 'create_at'];
        $sort = $request->sort;
        $data = Problem::orderBy($sort, 'asc')->paginate(5);

        return view('archive.leedcode', ['data' => $data, 'sort' => $sort, 'selectSort' => $selectSort]);
    }

    public function add(Request $request)
    {
        $successMsg = 'データを入力してください';
        return view('archive.add', ['successMsg' => $successMsg]);
    }

    public function create(Request $request)
    {
        $myCode = preg_replace('/\n|\r\n/', '<br>', $request->my_code);
        $exCode = preg_replace('/\n|\r\n/', '<br>', $request->ex_code);
        $overview = preg_replace('/\n|\r\n/', '<br>', $request->overview);
        $exam1 = preg_replace('/\n|\r\n/', '<br>', $request->exam1);
        $exam2 = preg_replace('/\n|\r\n/', '<br>', $request->exam2);
        $exam3 = preg_replace('/\n|\r\n/', '<br>', $request->exam3);
        $this->validate($request, Problem::$rules, Problem::$messages);
        $problem = new Problem;
        $problem->problem_id = $request->problem_id;
        $problem->title = $request->title;
        $problem->difficulty = $request->difficulty;
        $problem->url = $request->url;
        $problem->my_code = $myCode;
        $problem->ex_code = $exCode;
        $problem->overview = $overview;
        $problem->exam1 = $exam1;
        $problem->exam2 = $exam2;
        $problem->exam3 = $exam3;
        $problem->created_at = $request->created_at;
        $problem->updated_at = $request->updated_at;
        $problem->save();
        // $form = $request->all();
        // unset($form['_token']);
        // $problem->fill($form)->save();
        $successMsg = '追加しました！';
        // return redirect('archive/add', ['successMsg' => $successMsg]);
        return view('archive.add', ['successMsg' => $successMsg]);
    }
}
