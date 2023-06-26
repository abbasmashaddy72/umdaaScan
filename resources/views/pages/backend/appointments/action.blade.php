<div class="flex justify-around space-x-1">
    @can('appointment_edit')
        <button wire:click='$emit("openModal", "backend.forms.modal-appointment", @json(['appointment_id' => $id]))'
            class="p-1 rounded text-primary hover:bg-primary hover:text-white">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                </path>
            </svg>
        </button>
    @endcan

    <a href="{{ route('admin.appointments.appointment_profile', ['appointment_profile' => $id]) }}"
        class="p-1 rounded text-danger hover:bg-danger hover:text-white">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
            <polyline points="6 9 6 2 18 2 18 9"></polyline>
            <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
            <rect x="6" y="14" width="12" height="8"></rect>
        </svg>
    </a>
</div>
