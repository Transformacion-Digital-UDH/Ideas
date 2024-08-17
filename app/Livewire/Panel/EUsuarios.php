<?php

namespace App\Livewire\Panel;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class EUsuarios extends Component
{
    public $num_users = [];

    public function mount()
    {
        $this->numUsuariosRoles();
    }

    public function render()
    {
        return view('livewire.panel.e-usuarios');
    }

    public function numUsuariosRoles()
    {
        $roles = Role::all();
        foreach ($roles as $role) {
            $userCount = $role->users()->where('estado', 1)->count();
            $this->num_users[$role->name] = $userCount;
        }
    }
}
