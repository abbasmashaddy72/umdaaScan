<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Gate;

class AppointmentController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('appointment_list'), 403);

        view()->share('title', 'Appointments');

        return view('pages.backend.appointments.index');
    }

    public function appointment_profile(Appointment $appointment_profile)
    {
        $pdf = Pdf::loadView('pdf.appointment', $appointment_profile->toArray());
        return $pdf->stream('appointment.pdf');
    }
}
