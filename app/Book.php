<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\University;
use App\User;

class Book extends Model
{
    use SoftDeletes;
    
    protected $dates = ['delete_at'];

    protected $fillable = [
        'name','university_id','price','description','images',
        'phone','email'
    ];

    public function university()
    {
    	return $this->belongsTo(University::class,'university_id','id');
    }

    public function user()
    {
    	return $this->belongsTo(User::class,'user_id','id');
    }


}
