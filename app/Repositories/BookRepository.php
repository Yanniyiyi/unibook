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
        return Book::where('university_id',$uni)->where('name','like','%' . $name . '%')->get();
    }

    public function create($attributes)
    {
        return Book::create($attributes);
    }

    public function getBooksByQty($qty)
    {
        return Book::orderBy('created_at','desc')->take($qty)->get();
    }

    public function getAllBooks()
    {
        return Book::all();
    }
}