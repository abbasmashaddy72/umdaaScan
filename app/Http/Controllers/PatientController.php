<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        view()->share('title', 'Patients');

        return view('pages.backend.patients.index');
    }
}
