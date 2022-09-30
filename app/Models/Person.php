<?php

namespace App\Models;

use App\Scopes\ScopePerson;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder; //グローバルスコープ

class Person extends Model
{
    use HasFactory;
    //AIで作られるので用意しなくても良いカラムを指定
    // protected $guarded = array('id');

    protected $fillable = ['name', 'mail', 'age'];

    public static $rules = array(
        'name' => 'required',
        'mail' => 'email',
        'age' => 'integer|min:0|max:150'
    );

    public static $messages = array(
        'name.required' => '必須項目です',
        'mail.email' => 'メールアドレスを入力してください',
        'age.integer' => '数字を入力してください',
        'age.min' => '0歳以上で入力してください',
        'age.max' => '150歳以下で入力してください',
    );


    //メソッド
    public function getData()
    {
        return $this->id . ':' . $this->name . '(' . $this->age . ')';
    }
    //ローカルスコープ
    //名前検索スコープ
    public function scopeNameEqual($query, $str)
    {
        return $query->where('name', $str);
    }
    //年齢以上スコープ
    public function scopeAgeBig($query, $n)
    {
        return $query->where('age', '>=', $n);
    }
    //年齢以下スコープ
    public function scopeAgeSmall($query, $n)
    {
        return $query->where('age', '<=', $n);
    }

    //グローバルスコープ
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ScopePerson);
    }

    // public function board() 1to 1
    // {
    //     return $this->hasOne(board::class, 'person_id', 'id'); // テーブル、外部キー、主キーかも
    // }

    public function boards() //1 to many
    {
        return $this->hasMany(Board::class, 'person_id', 'id'); // テーブル、外部キー、主キー
    }
}
