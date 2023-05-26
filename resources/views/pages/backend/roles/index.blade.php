<x-app-layout>
    <x-slot name="breadcrumb">{{ Breadcrumbs::render('role.index') }}</x-slot>

    <x-backend.grid>
        <x-slot name="rt_button">
            <button onclick="Livewire.emit('openModal', 'backend.forms.modal-role')"
                class="mr-2 shadow-md btn btn-primary">{{ 'Add' }}</button>
        </x-slot>

        <div class="col-span-12">
            <livewire:backend.tables.role-table />
        </div>
    </x-backend.grid>
</x-app-layout>
