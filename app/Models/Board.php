<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Person;

class Board extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'message', 'person_id'];

    public static $rules = array(
        'person_id' => 'required',
        'title' => 'required',
        'message' => 'required',
    );

    public function person()
    {
        return $this->BelongsTo(Person::class);
    }

    public function getData()
    {
        return $this->id . ':' . $this->title;
        // return $this->id . ':' . $this->title . "(" . $this->person->name . ")";
    }
}
