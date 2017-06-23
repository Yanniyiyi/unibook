<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\User;
use Auth;

class UserController extends Controller
{

	private $userRepo;

	public function __construct(UserRepository $userRepo)
	{
		$this->userRepo = $userRepo;
	}


    public function showProfile()
    {

    }

    public function startSelling()
    {
        return view('start-selling');
    }

    public function showBooks()
    {
    	return view('user.books');
    }

    public function getBooks($type)
    {
        $user = Auth::guard('api')->user();

        if($type == 'all')
        {
            return $this->userRepo->getAllBooks($user)->paginate(8);
        }

        if($type == 'actived')
        {
            return $this->userRepo->getActivedBooks($user)->paginate(8);
        }

        if($type == 'deleted')
        {
            return $this->userRepo->getDeletedBooks($user)->paginate(8);
        }	
    }


    // this method need to be optimized
    public function deleteBook($id){
        $user = Auth::guard('api')->user();
        return $this->userRepo->deleteBook($user,$id);
    }
}
