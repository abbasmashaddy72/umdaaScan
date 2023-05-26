<?php

namespace App\Http\Livewire\Backend\Forms;

use App\Models\Patient;
use Carbon\Carbon;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class ModalPatient extends ModalComponent
{
    use Actions;
    // Set Data
    public $patient_id;
    // Model Values
    public $uuid, $locality_id, $name, $gender, $dob, $designation, $blood_group, $contact_no, $about;
    // Custom Values
    public $age, $age_select;

    public function mount()
    {
        if (empty($this->patient_id)) {
            return;
        }
        $data = Patient::findOrFail($this->patient_id);
        $this->uuid = $data->uuid;
        $this->locality_id = $data->locality_id;
        $this->name = $data->name;
        $this->gender = $data->gender;
        $this->dob = $data->dob;
        $this->designation = $data->designation;
        $this->blood_group = $data->blood_group;
        $this->contact_no = $data->contact_no;
        $this->about = $data->about;

        $date = Carbon::parse($this->dob)->diffForHumans();
        $date = str_replace(' ago', '', $date);
        $date = explode(' ', $date);
        $this->age = $date[0];
        if (substr($date[1], strlen($date[1]) - 1) == 's') {
            $this->age_select = ucwords($date[1]);
        } else {
            $this->age_select = ucwords($date[1]) . 's';
        }
    }

    protected $rules = [
        'locality_id' => 'required',
        'name' => 'required',
        'gender' => 'required',
        'dob' => 'nullable',
        'designation' => 'nullable',
        'blood_group' => 'nullable',
        'contact_no' => 'required',
        'about' => 'nullable',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function uuid()
    {
        $uuid = strtoupper(substr(config('app.name'), 0, 3)) . random_int(1000, 9999);

        return Patient::where('uuid', $uuid)->exists() ? $this->set_uuid() : $uuid;
    }

    public function add()
    {
        $validatedData = $this->validate();

        if (!empty($this->patient_id)) {

            Patient::where('id', $this->patient_id)->update($validatedData);

            $this->notification()->success($title = 'Patient Updated Successfully!');
        } else {
            $validatedData['uuid'] = $this->uuid();

            Patient::create($validatedData);

            $this->notification()->success($title = 'Patient Saved Successfully!');
        }

        $this->emit('refreshLivewireDatatable');

        $this->closeModal();
    }

    public function updatedAgeSelect($data)
    {
        if ($data == 'Years') {
            $this->dob = Carbon::now()->subYears($this->age)->format('Y-m-d');
        } elseif ($data == 'Months') {
            $this->dob = Carbon::now()->subMonths($this->age)->format('Y-m-d');
        } elseif ($data == 'Weeks') {
            $this->dob = Carbon::now()->subWeeks($this->age)->format('Y-m-d');
        } else {
            $this->dob = Carbon::now()->subDays($this->age)->format('Y-m-d');
        }
    }

    public function updatedAge($data)
    {
        if ($this->age_select == 'Years') {
            $this->dob = Carbon::now()->subYears($data)->format('Y-m-d');
        } elseif ($this->age_select == 'Months') {
            $this->dob = Carbon::now()->subMonths($data)->format('Y-m-d');
        } elseif ($data == 'Weeks') {
            $this->dob = Carbon::now()->subWeeks($this->age)->format('Y-m-d');
        } else {
            $this->dob = Carbon::now()->subDays($data)->format('Y-m-d');
        }
    }

    public function updatedDob($date)
    {
        $data = Carbon::parse($this->dob)->diffForHumans();
        $data = str_replace(' ago', '', $data);
        $data = explode(' ', $data);
        $this->age = $data[0];
        if (substr($data[1], strlen($data[1]) - 1) == 's') {
            $this->age_select = ucwords($data[1]);
        } else {
            $this->age_select = ucwords($data[1]) . 's';
        }
    }

    public function render()
    {
        return view('livewire.backend.forms.modal-patient');
    }
}
