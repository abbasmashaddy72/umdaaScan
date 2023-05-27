<x-app-layout>
    <x-slot name="breadcrumb">{{ Breadcrumbs::render('user.index') }}</x-slot>

    <x-backend.grid>
        @can('user_add')
            <x-slot name="rt_button">
                <button onclick="Livewire.emit('openModal', 'backend.forms.modal-user')"
                    class="mr-2 shadow-md btn btn-primary">{{ 'Add' }}</button>
            </x-slot>
        @endcan

        <div class="col-span-12">
            <livewire:backend.tables.user-table />
        </div>
    </x-backend.grid>
</x-app-layout>
