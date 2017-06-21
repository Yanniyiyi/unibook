<?php
/**
 * Created by PhpStorm.
 * User: Yanni
 * Date: 21/6/17
 * Time: 11:23 PM
 */

namespace App\Repositories;
use App\Book;


class BookRepository
{
    public function searchByUniAndName($uni, $name)
    {
        return Book::where('university_id',$uni)->where('name','like',$name)->get();
    }
}