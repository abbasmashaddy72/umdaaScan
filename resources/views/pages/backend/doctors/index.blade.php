<x-app-layout>
    <x-slot name="breadcrumb">{{ Breadcrumbs::render('doctor.index') }}</x-slot>

    <x-backend.grid>
        <x-slot name="rt_button">
            <button onclick="Livewire.emit('openModal', 'backend.forms.modal-doctor')"
                class="mr-2 shadow-md btn btn-primary">{{ 'Add' }}</button>
        </x-slot>

        <div class="col-span-12">
            <livewire:backend.tables.doctor-table />
        </div>
    </x-backend.grid>
</x-app-layout>
