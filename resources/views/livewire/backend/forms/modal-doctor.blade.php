<x-backend.modal-form form-action="add" title="{{ $name }}">
    <div class="grid gap-y-2">
        <x-input name="name" label="Name" type="text" wire:model.defer='name' />

        <x-select label="Select Locality" wire:model.defer="locality_id" placeholder="Select Locality" :async-data="route('api.admin.localities')"
            option-label="localityCity" option-value="id" />

        <x-native-select name="gender" label="Gender" :options="['Select', 'Male', 'FeMale', 'Trans']" wire:model.defer='gender' />

        <x-input name="contact_no" label="Contact No" type="number" wire:model.defer='contact_no' />

        <x-input name="qualification" label="Qualification" type="text" wire:model.defer='qualification' />

        <x-input name="registration_no" label="Registration No" type="text" wire:model.defer='registration_no' />

        <x-input name="department" label="Department Name" type="text" wire:model.defer='department' />

        <x-input name="registration_fee" label="Registration Fee" type="number" wire:model.defer='registration_fee' />

        <x-input name="consultation_fee" label="Consultation Fee" type="number" wire:model.defer='consultation_fee' />

        <x-input name="review_link" label="Review Link" type="text" wire:model.defer='review_link' />

        <x-textarea label="About" placeholder="About" wire:model.defer="about" />

        <x-input name="career_start_date" label="Career Start Date" type="date"
            wire:model.defer='career_start_date' />
    </div>
</x-backend.modal-form>
