<?php

namespace App\Http\Livewire\Backend\Forms;

use App\Models\Appointment;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class ModalAppointment extends ModalComponent
{
    use Actions, WithFileUploads;
    // Set Data
    public $appointment_id;
    // Model Values
    public $doctor_id, $patient_id, $date, $time, $description, $prescription_image = [];
    // Custom Values
    public $isUploaded = false;

    public function mount()
    {
        if (empty($this->appointment_id)) {
            return;
        }
        $data = Appointment::findOrFail($this->appointment_id);
        $this->doctor_id = $data->doctor_id;
        $this->patient_id = $data->patient_id;
        $this->date = $data->date;
        $this->time = $data->time;
        $this->description = $data->description;
        $this->prescription_image = $data->prescription_image;
    }

    protected $rules = [
        'doctor_id' => 'required',
        'patient_id' => 'required',
        'date' => 'required',
        'time' => 'required',
        'description' => 'nullable',
        'prescription_image' => 'nullable',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        if (gettype($this->prescription_image) != 'array') {
            $this->isUploaded = true;
        }
    }

    public function add()
    {
        $validatedData = $this->validate();

        if (!empty($this->appointment_id)) {
            if (!empty($this->prescription_image) && gettype($this->prescription_image) != 'string') {
                $prescription_image = $validatedData['prescription_image'];
                unset($validatedData['prescription_image']);
                $multiImage = [];
                foreach ($prescription_image as $key => $image) {
                    $multiImage[$key] = $image->store('appointment', 'public');
                }
                $validatedData['prescription_image'] = $multiImage;
            }

            Appointment::where('id', $this->appointment_id)->update($validatedData);

            $this->notification()->success($title = 'User Updated Successfully!');
        } else {
            if (!empty($this->prescription_image) && gettype($this->prescription_image) != 'string') {
                $prescription_image = $validatedData['prescription_image'];
                unset($validatedData['prescription_image']);
                $multiImage = [];
                foreach ($prescription_image as $key => $image) {
                    $multiImage[$key] = $image->store('appointment', 'public');
                }
                $validatedData['prescription_image'] = $multiImage;
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
        $currentImages = Appointment::where('id', $params['appointment_id'])->pluck('prescription_image')->first();
        $toRemoveImages = [$currentImages[$params['key']]];

        $updatedImages = collect($currentImages)->reject(function ($value) use ($toRemoveImages) {
            return in_array($value, $toRemoveImages);
        });
        Appointment::where('id', $params['appointment_id'])->update(['prescription_image' => $updatedImages]);

        $this->notification()->success($title = 'Supplier Product Image Deleted Successfully!');
    }

    public function render()
    {
        return view('livewire.backend.forms.modal-appointment');
    }
}
