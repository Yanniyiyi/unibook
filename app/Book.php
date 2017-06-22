<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'name','university_id','price','description','images',
        'phone','email'
    ];
}
