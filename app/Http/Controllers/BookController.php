<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookSearchRequest;
use Illuminate\Http\Request;
use App\Repositories\BookRepository;

class BookController extends Controller
{
    protected $bookRepo;

    /**
     * BookController constructor.
     * @param $bookRepo
     */
    public function __construct(BookRepository $bookRepo)
    {
        $this->bookRepo = $bookRepo;
    }

    public function search(BookSearchRequest $request)
    {
        $uni = $request->get('university');
        $name = $request->get('name');
        return $this->bookRepo->searchByUniAndName($uni,$name);
    }


}
