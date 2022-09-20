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
    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'mail' => 'email',
        'age' => 'integer|min:0|max:150'
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
}
