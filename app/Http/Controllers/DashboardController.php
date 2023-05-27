<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dashboard'), 403);

        view()->share('title', 'Dashboard');
        $roles_count = Role::count();
        $users_count = User::count();
        $doctors_count = Doctor::count();
        $patients_count = Patient::count();
        $appointments_count = Appointment::count();

        return view('pages.backend.dashboard', compact([
            'roles_count',
            'users_count',
            'doctors_count',
            'patients_count',
            'appointments_count',
        ]));
    }
}
