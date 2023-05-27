<?php

namespace App\Http\Livewire\Backend\Forms;

use App\Models\Doctor;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\Gate;
use LivewireUI\Modal\ModalComponent;

class ModalDoctor extends ModalComponent
{
    use Actions;
    // Set Data
    public $doctor_id;
    // Model Values
    public $name, $locality_id, $gender, $contact_no, $qualification, $registration_no, $department, $registration_fee, $consultation_fee, $review_link, $about, $career_start_date;

    public function mount()
    {
        if (empty($this->doctor_id)) {
            abort_if(Gate::denies('doctor_add'), 403);
            return;
        }
        abort_if(Gate::denies('doctor_edit'), 403);
        $data = Doctor::findOrFail($this->doctor_id);
        $this->name = $data->name;
        $this->locality_id = $data->locality_id;
        $this->gender = $data->gender;
        $this->contact_no = $data->contact_no;
        $this->qualification = $data->qualification;
        $this->registration_no = $data->registration_no;
        $this->department = $data->department;
        $this->registration_fee = $data->registration_fee;
        $this->consultation_fee = $data->consultation_fee;
        $this->review_link = $data->review_link;
        $this->about = $data->about;
        $this->career_start_date = $data->career_start_date;
    }

    protected $rules = [
        'name' => 'required',
        'locality_id' => 'required',
        'gender' => 'required',
        'dob' => 'required',
        'contact_no' => 'nullable',
        'qualification' => 'required',
        'registration_no' => 'nullable',
        'department' => 'nullable',
        'registration_fee' => 'nullable',
        'consultation_fee' => 'nullable',
        'review_link' => 'nullable',
        'about' => 'nullable',
        'career_start_date' => 'nullable',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function add()
    {
        $validatedData = $this->validate();

        if (!empty($this->doctor_id)) {

            Doctor::where('id', $this->doctor_id)->update($validatedData);

            $this->notification()->success($title = 'Doctor Updated Successfully!');
        } else {

            Doctor::create($validatedData);

            $this->notification()->success($title = 'Doctor Saved Successfully!');
        }

        $this->emit('refreshLivewireDatatable');

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.backend.forms.modal-doctor');
    }
}
