<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    public function getData()
    {
        return $this->id . ':' . $this->name . '(' . $this->age . ')';
    }

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
}
