<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Application
Breadcrumbs::for('#', function (BreadcrumbTrail $trail) {
    $trail->push('Application', '/');
});

// Application > User
Breadcrumbs::for('user.index', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('User', route('admin.users.index'));
});

// Application > Role
Breadcrumbs::for('role.index', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('Role', route('admin.roles.index'));
});

// Application > Doctor
Breadcrumbs::for('doctor.index', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('Doctor', route('admin.doctors.index'));
});

// Application > Patient
Breadcrumbs::for('patient.index', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('Patient', route('admin.patients.index'));
});

// Application > Appointment
Breadcrumbs::for('appointment.index', function (BreadcrumbTrail $trail) {
    $trail->parent('#');
    $trail->push('Appointment', route('admin.appointments.index'));
});
