<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    /**
     * SITE HOME
     */
    public function index()
    {
        return view('web.home');
    }
}
