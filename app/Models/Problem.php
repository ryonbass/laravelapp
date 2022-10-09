<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    use HasFactory;
    protected $fillable = ['problem_id', 'title', 'difficulty', 'my_code', 'ex_code', 'overview', 'exam1', 'exam2', 'exam3', 'url'];

    public static $rules = array(
        'problem_id' => 'required | numeric',
        'title' => 'required',
        'my_code' => 'required',
        'ex_code' => 'required',
        'overview' => 'required',
        'url' => 'url'
    );

    public static $messages = array(
        'problem_id.required' => '問題番号は必須項目です',
        'problem_id.numeric' => '整数で入力してください',
        'title.required' => 'タイトルは必須項目です',
        'my_code.required' => '解答したコードを入力してください',
        'ex_code.required' => '解答例のコードを入力してください',
        'overview.required' => 'メソッドの説明を記載してください',
        'url.url' => 'URLを入力してください',
    );


    //メソッド
    public function getData()
    {
        return $this->id . ':' . $this->title . '(' . $this->url . ')';
    }
}
