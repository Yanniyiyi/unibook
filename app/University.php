<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Book;

class University extends Model
{
    protected $fillable = [
        'name', 'state'
    ];

    public function book()
    {
        return $this->hasMany(Book::class,'university_id','id');
    }
}
