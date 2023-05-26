<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        view()->share('title', 'Appointments');

        return view('pages.backend.appointments.index');
    }
}
