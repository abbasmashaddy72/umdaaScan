<x-backend.modal-form form-action="add" title="{{ $date . ', ' . $time }}">
    <x-dialog z-index="z-50" blur="md" align="center" />
    <div class="grid gap-y-2">
        <x-select label="Select Patient" wire:model.defer="patient_id" placeholder="Select Patient" :async-data="route('api.admin.patients')"
            option-label="patientNameUuid" option-value="id" />

        <x-select label="Select Doctor" wire:model.defer="doctor_id" placeholder="Select Doctor" :async-data="route('api.admin.doctors')"
            option-label="name" option-value="id" />

        <x-input label="Date" placeholder="Appointment Date" type="date" wire:model.defer="date" />

        <x-input label="Time" placeholder="Appointment Time" type="time" wire:model.defer="time" />

        <x-textarea label="Message" placeholder="Apointment Message" wire:model.defer="description" />

        <div class="card">
            <div class="card-body">
                @if (!empty($prescription_image))
                    Photo Preview:
                    <div class="grid grid-cols-5 gap-1">
                        @foreach ($prescription_image as $key => $image)
                            <div class="relative">
                                <img class="object-cover w-10 h-10 rounded-md"
                                    src="{{ $this->isUploaded ? $image->temporaryUrl() : asset('storage/' . $image) }}">
                                <button type="button"
                                    wire:click='deleteImage({{ $appointment_id }}, {{ $key }})'>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="absolute text-red-500 bg-white rounded-xl hover:text-red-600 -top-2 right-2"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-x-circle">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="15" y1="9" x2="9" y2="15">
                                        </line>
                                        <line x1="9" y1="9" x2="15" y2="15">
                                        </line>
                                    </svg>
                                </button>
                            </div>
                        @endforeach
                    </div>
                @endif
                <div class="mb-3">
                    <x-input name="prescription_image" label="Upload Prescription Images" type="file"
                        wire:model.defer='prescription_image' multiple />
                    <div wire:loading wire:target="prescription_image">Uploading...</div>
                </div>
            </div>
        </div>
    </div>
</x-backend.modal-form>
