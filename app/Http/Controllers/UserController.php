<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_list'), 403);

        view()->share('title', 'Users');

        return view('pages.backend.users.index');
    }
}
