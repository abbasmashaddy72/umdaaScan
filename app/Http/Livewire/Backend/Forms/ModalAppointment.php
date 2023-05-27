<?php

namespace App\Http\Livewire\Backend\Forms;

use WireUi\Traits\Actions;
use App\Models\Appointment;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Gate;
use LivewireUI\Modal\ModalComponent;

class ModalAppointment extends ModalComponent
{
    use Actions, WithFileUploads;
    // Set Data
    public $appointment_id;
    // Model Values
    public $doctor_id, $patient_id, $date, $time, $description, $prescription_images = [];
    // Custom Values
    public $isUploaded = false;

    public function mount()
    {
        if (empty($this->appointment_id)) {
            abort_if(Gate::denies('appointment_add'), 403);
            return;
        }
        abort_if(Gate::denies('appointment_edit'), 403);
        $data = Appointment::findOrFail($this->appointment_id);
        $this->doctor_id = $data->doctor_id;
        $this->patient_id = $data->patient_id;
        $this->date = $data->date;
        $this->time = $data->time;
        $this->description = $data->description;
        $this->prescription_images = $data->prescription_images;
    }

    protected $rules = [
        'doctor_id' => 'required',
        'patient_id' => 'required',
        'date' => 'required',
        'time' => 'required',
        'description' => 'nullable',
        'prescription_images' => 'nullable',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        if (gettype($this->prescription_images) != 'array') {
            $this->isUploaded = true;
        }
    }

    public function add()
    {
        $validatedData = $this->validate();

        if (!empty($this->appointment_id)) {
            if (!empty($this->prescription_images) && gettype($this->prescription_images) != 'string') {
                $prescription_images = $validatedData['prescription_images'];
                unset($validatedData['prescription_images']);
                $multiImage = [];
                foreach ($prescription_images as $key => $image) {
                    $multiImage[$key] = $image->store('appointment', 'public');
                }
                $validatedData['prescription_images'] = $multiImage;
            }

            Appointment::where('id', $this->appointment_id)->update($validatedData);

            $this->notification()->success($title = 'User Updated Successfully!');
        } else {
            if (!empty($this->prescription_images) && gettype($this->prescription_images) != 'string') {
                $prescription_images = $validatedData['prescription_images'];
                unset($validatedData['prescription_images']);
                $multiImage = [];
                foreach ($prescription_images as $key => $image) {
                    $multiImage[$key] = $image->store('appointment', 'public');
                }
                $validatedData['prescription_images'] = $multiImage;
            }

            Appointment::create($validatedData);

            $this->notification()->success($title = 'Appointment Saved Successfully!');
        }

        $this->emit('refreshLivewireDatatable');

        $this->closeModal();
    }

    public function deleteImage($appointment_id, $key)
    {
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'To delete the Image?',
            'icon'        => 'error',
            'accept'      => [
                'label'  => 'Yes, delete it',
                'method' => 'delete',
                'params' => ['appointment_id' => $appointment_id, 'key' => $key],
            ],
            'reject' => [
                'label'  => 'No, cancel',
                'method' => 'cancel',
            ],
        ]);
    }

    public function delete($params)
    {
        $currentImages = Appointment::where('id', $params['appointment_id'])->pluck('prescription_images')->first();
        $toRemoveImages = [$currentImages[$params['key']]];

        $updatedImages = collect($currentImages)->reject(function ($value) use ($toRemoveImages) {
            return in_array($value, $toRemoveImages);
        });
        Appointment::where('id', $params['appointment_id'])->update(['prescription_images' => $updatedImages]);

        $this->notification()->success($title = 'Supplier Product Image Deleted Successfully!');
    }

    public function render()
    {
        return view('livewire.backend.forms.modal-appointment');
    }
}
