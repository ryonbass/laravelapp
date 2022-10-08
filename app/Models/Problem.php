<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'difficulty', 'my_code', 'ex_code', 'overview', 'url'];

    public static $rules = array(
        'title' => 'required',
        'my_code' => 'required',
        'ex_code' => 'required',
        'overview' => 'required',
        'url' => 'url'
    );

    public static $messages = array(
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
