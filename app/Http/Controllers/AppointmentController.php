<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AppointmentController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('appointment_list'), 403);

        view()->share('title', 'Appointments');

        return view('pages.backend.appointments.index');
    }
}
