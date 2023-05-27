<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DoctorController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('doctor_list'), 403);

        view()->share('title', 'Doctors');

        return view('pages.backend.doctors.index');
    }
}
