<?php
/**
 * Created by PhpStorm.
 * User: Yanni
 * Date: 21/6/17
 * Time: 11:03 PM
 */

namespace App\Repositories;
use App\University;

class UniversityRepository
{
    public function searchByState($state)
    {
        return University::where('state',$state)->get();
    }
}