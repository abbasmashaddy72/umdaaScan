<x-backend.modal-form form-action="add" title="{{ $name }}">
    <div class="grid gap-y-2">
        <x-input name="uuid" label="Patient ID" Placeholder="Auto Generated" type="text" wire:model.defer='uuid'
            disabled />

        <x-input name="name" label="Name" type="text" wire:model.defer='name' />

        <x-select label="Select Locality" wire:model.defer="locality_id" placeholder="Select Locality" :async-data="route('api.admin.localities')"
            option-label="localityCity" option-value="id" />

        <x-native-select name="gender" label="Gender" :options="['Select','Male', 'FeMale', 'Trans']" wire:model.defer='gender' />

        <x-input name="dob" label="Date of Birth" type="date" wire:model='dob' />

        <x-input label="Age" placeholder="Enter Age" type="number" wire:model='age'>
            <x-slot name="append">
                <div class="absolute inset-y-0 right-0 flex items-center p-0.5">
                    <x-native-select placeholder="Select" :options="['Select','Years', 'Months', 'Weeks', 'Days']" wire:model="age_select" />
                </div>
            </x-slot>
        </x-input>

        <x-input name="contact_no" label="Contact No" type="number" wire:model.defer='contact_no' />

        <x-input name="designation" label="Designation" type="text" wire:model.defer='designation' />

        <x-native-select name="blood_group" label="Blood Group" :options="['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']" wire:model.defer='blood_group' />

        <x-textarea label="About" placeholder="About" wire:model.defer="about" />
    </div>
</x-backend.modal-form>
