<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookSearchRequest;
use Illuminate\Http\Request;
use App\Repositories\BookRepository;
use App\Book;
use Auth;

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

    public function index(Request $request, $qty = null)
    {
        if ($request->is('api/*')) {
            if ($qty) {
                return  $this->bookRepo->getBooksByQty($qty);
            }

            return $this->bookRepo->getLatestBooks()->paginate(8);
        }

        return view('books.index');
    }

    public function search(BookSearchRequest $request)
    {
        $uni = $request->get('university');
        $name = $request->get('name');
        return $this->bookRepo->searchByUniAndName($uni, $name);
    }

    public function create()
    {
        return view('books.create');
    }

    public function showSuccessInfo($bookId)
    {
        return view('books.success', ['bookId' => $bookId]);
    }

    public function show(Book $book)
    {
        return view('books.view', ['book' => $book]);
    }

    public function store(Request $request)
    {
        $user = Auth::guard('api')->user();
        $attributes = $request->except('images');
        $image = $request->file('images');
        $fileName = md5(time() + $user->id). '.' .
            $image->getClientOriginalExtension();
        $image->move(public_path('books'), $fileName);
        $url = '/books/'. $fileName;
        $attributes['images'] = json_encode(['url' => $url]);
        $book = $this->bookRepo->create($user, $attributes);
        $url = route('book.created', ['bookId' => $book->id]);
        return response()->json(['url' => $url]);
    }
}
