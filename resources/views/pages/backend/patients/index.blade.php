<x-app-layout>
    <x-slot name="breadcrumb">{{ Breadcrumbs::render('patient.index') }}</x-slot>

    <x-backend.grid>
        @can('patient_add')
            <x-slot name="rt_button">
                <button onclick="Livewire.emit('openModal', 'backend.forms.modal-patient')"
                    class="mr-2 shadow-md btn btn-primary">{{ 'Add' }}</button>
            </x-slot>
        @endcan

        <div class="col-span-12">
            <livewire:backend.tables.patient-table />
        </div>
    </x-backend.grid>
</x-app-layout>
