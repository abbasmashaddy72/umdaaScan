<x-backend.modal-form form-action="add" title="{{ $name }}">
    <div class="grid-cols-1 gap-2 row-gap-0 sm:grid">
        <x-native-select label="Select Role" placeholder="Select one Role" :options="$roles" option-label="name"
            option-value="id" wire:model.defer="role" />

        <x-input name="name" label="Name" type="text" wire:model.defer='name' />

        <x-input name="email" label="Email" type="email" wire:model.defer='email' />

        <x-inputs.password label="{{ __('Password') }}" name="password" wire:model.defer='password' />
    </div>
</x-backend.modal-form>
