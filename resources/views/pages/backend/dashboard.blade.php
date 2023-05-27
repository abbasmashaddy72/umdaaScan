<x-app-layout>
    <x-slot name="breadcrumb">{{ Breadcrumbs::render('#') }}</x-slot>

    <x-backend.grid>
        <div class="col-span-12">
            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="col-span-12 sm:col-span-6 xl:col-span-2 intro-y">
                    <div class="report-box zoom-in">
                        <div class="p-5 box">
                            <div class="flex">
                                <i data-feather="settings" class="report-box__icon text-primary"></i>
                            </div>
                            <div class="mt-6 text-3xl font-medium leading-8">{{ $roles_count }}</div>
                            <div class="mt-1 text-base text-slate-500">Roles Count</div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-2 intro-y">
                    <div class="report-box zoom-in">
                        <div class="p-5 box">
                            <div class="flex">
                                <i data-feather="users" class="report-box__icon text-pending"></i>
                            </div>
                            <div class="mt-6 text-3xl font-medium leading-8">{{ $users_count }}</div>
                            <div class="mt-1 text-base text-slate-500">Users Count</div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-2 intro-y">
                    <div class="report-box zoom-in">
                        <div class="p-5 box">
                            <div class="flex">
                                <i data-feather="user-plus" class="report-box__icon text-warning"></i>
                            </div>
                            <div class="mt-6 text-3xl font-medium leading-8">{{ $doctors_count }}</div>
                            <div class="mt-1 text-base text-slate-500">Doctors Count</div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-2 intro-y">
                    <div class="report-box zoom-in">
                        <div class="p-5 box">
                            <div class="flex">
                                <i data-feather="users" class="report-box__icon text-success"></i>
                            </div>
                            <div class="mt-6 text-3xl font-medium leading-8">{{ $patients_count }}</div>
                            <div class="mt-1 text-base text-slate-500">Patients Count</div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-2 intro-y">
                    <div class="report-box zoom-in">
                        <div class="p-5 box">
                            <div class="flex">
                                <i data-feather="clock" class="report-box__icon text-success"></i>
                            </div>
                            <div class="mt-6 text-3xl font-medium leading-8">{{ $appointments_count }}</div>
                            <div class="mt-1 text-base text-slate-500">Appointments Count</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-backend.grid>
</x-app-layout>
