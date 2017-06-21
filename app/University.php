<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $fillable = [
        'name', 'state'
    ];

    public function answers()
    {
        return $this->hasMany(Book::class,'university_id','id');
    }
}
