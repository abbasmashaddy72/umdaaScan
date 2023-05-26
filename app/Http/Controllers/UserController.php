<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function index()
    {
        view()->share('title', 'Users');

        return view('pages.backend.users.index');
    }
}
