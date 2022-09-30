<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restdata extends Model
{
    use HasFactory;
    protected $table = 'restdata';
    protected $fillable = ['message', 'url'];

    public static $rules = array(
        'message' => 'required',
        'url' => 'required',
    );

    public function getData()
    {
        return $this->id . ':' . $this->message . '(' . $this->url . ')';
    }
}
