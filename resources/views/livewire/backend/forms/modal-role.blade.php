<x-backend.modal-form form-action="add" title="{{ $name }}">
    <div class="grid gap-y-2">
        <x-input name="name" label="Name" type="text" wire:model.defer='name' />

        <div class="grid grid-cols-5 gap-2">
            @foreach ($permissions as $permission)
                <x-checkbox id="{{ $permission->slug }}" label="{{ $permission->name }}"
                    wire:model.defer='permissions_array' value="{{ $permission->id }}" />
            @endforeach
        </div>
    </div>
</x-backend.modal-form>
