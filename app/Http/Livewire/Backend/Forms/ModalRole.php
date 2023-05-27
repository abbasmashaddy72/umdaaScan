<?php

namespace App\Http\Livewire\Backend\Forms;

use App\Models\Role;
use App\Models\Permission;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\Gate;
use LivewireUI\Modal\ModalComponent;

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
            abort_if(Gate::denies('role_add'), 403);
            return;
        }
        abort_if(Gate::denies('role_edit'), 403);
        $data = Role::findOrFail($this->role_id);
        $this->name = $data->name;
        $this->slug = $data->slug;
        $this->permissions_array = $data->permissions->pluck('id')->toArray();
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

            $role->permissions()->sync($this->permissions_array);

            $this->notification()->success($title = 'Role Updated Successfully!');
        } else {
            $validatedData['slug'] = str_replace(' ', '_', strtolower($validatedData['name']));
            $role = Role::create($validatedData);

            $role->permissions()->sync($this->permissions_array);

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
