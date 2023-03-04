<?php

namespace App\Http\Controllers\Admin\DashBoard;

use App\Http\Controllers\Controller;


class DashBoardController extends Controller
{
    public function index(): string
    {
        return view("admin.dashboard.dashboard");
    }
}
