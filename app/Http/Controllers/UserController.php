<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function showProfile()
    {

    }

    public function startSelling()
    {
        return view('start-selling');
    }
}
