<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PatientController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('patient_list'), 403);

        view()->share('title', 'Patients');

        return view('pages.backend.patients.index');
    }
}
