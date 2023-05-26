<?php

namespace App\Http\Livewire\Backend\Forms;

use App\Models\Permission;
use App\Models\Role;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class ModalRole extends ModalComponent
{
    use Actions;
    // Set Data
    public $role_id;
    // Model Values
    public $name, $slug;
    // Custom
    public $permissions_array = [];

    public function mount()
    {
        if (empty($this->role_id)) {
            return;
        }
        $data = Role::findOrFail($this->role_id);
        $this->name = $data->name;
        $this->slug = $data->slug;
        $this->permissions_array = Permission::whereHas('roles', function ($query) {
            $query->where('id', $this->role_id);
        })->get('id')->toArray();
    }

    protected $rules = [
        'name' => '',
        'slug' => '',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function add()
    {
        $validatedData = $this->validate();

        if (!empty($this->role_id)) {
            $role = Role::where('id', $this->role_id)->first();

            Role::where('id', $this->role_id)->update($validatedData);

            foreach (array_filter($this->permissions_array) as $key => $item) {
                $role->permissions()->syncWithoutDetaching($key);
            }

            $this->notification()->success($title = 'Role Updated Successfully!');
        } else {
            $validatedData['slug'] = str_replace(' ', '-', strtolower($validatedData['name']));
            $role = Role::create($validatedData);

            foreach (array_filter($this->permissions_array) as $key => $item) {
                $role->permissions()->attach($key);
            }

            $this->notification()->success($title = 'Role Saved Successfully!');
        }

        $this->emit('refreshLivewireDatatable');

        $this->closeModal();
    }

    public static function modalMaxWidth(): string
    {
        return '7xl';
    }

    public function render()
    {
        $permissions = Permission::get();

        return view('livewire.backend.forms.modal-role', compact('permissions'));
    }
}
