<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookSearchRequest;
use Illuminate\Http\Request;
use App\Repositories\BookRepository;
use App\Book;


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

    public function index($qty = null)
    {
        if($qty)
        {
            $result =  $this->bookRepo->getBooksByQty($qty);
            return response()->json($result);
        }

        $books = $this->bookRepo->getAllBooks();
        return view('books.index')->with(['books'=> $books]);

    }

    public function search(BookSearchRequest $request)
    {
        $uni = $request->get('university');
        $name = $request->get('name');
        return $this->bookRepo->searchByUniAndName($uni,$name);
    }

    public function create()
    {
        return view('books.create');
    }

    public function showSuccessInfo($bookId)
    {
        return view('books.success')->with(['bookId' => $bookId]);
    }

    public function show(Book $book)
    {
        return view('books.view')->with(['book' => $book]);
    }

    public function store(Request $request)
    {
        $attributes = $request->except('images');
        $attributes['images'] = json_encode($request->get('images'));
        $book = $this->bookRepo->create($attributes);
        $url = route('book.created',['bookId' => $book->id]);
        return response()->json(['url' => $url]);
    }


}
