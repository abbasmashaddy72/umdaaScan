<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        view()->share('title', 'Doctors');

        return view('pages.backend.doctors.index');
    }
}
