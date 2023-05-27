<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('role_list'), 403);

        view()->share('title', 'Roles');

        return view('pages.backend.roles.index');
    }
}
