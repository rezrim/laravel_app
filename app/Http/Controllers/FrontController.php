<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function login()
    {
        return view('front.auth.login');
    }
}
