<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UniversityRepository;

class UniversityController extends Controller
{
    protected $uniRepository;

    /**
     * UniversityController constructor.
     * @param $uniRepository
     */
    public function __construct(UniversityRepository $uniRepository)
    {
        $this->uniRepository = $uniRepository;
    }


    public function search(Request $request){
        $state = $request->get('state');
        $result = $this->uniRepository->searchByState($state);
        return response()->json($result);
    }
}
