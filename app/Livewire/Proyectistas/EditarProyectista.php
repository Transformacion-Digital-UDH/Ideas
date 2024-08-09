<?php

namespace App\Livewire\Proyectistas;

use App\Models\User;
use App\Traits\GestionarModal;
use Livewire\Component;
use Illuminate\Validation\Rule;

class EditarProyectista extends Component
{
    use GestionarModal;

    public $proyectista;
    public $id;

    public $name;
    public $telefono;
    public $email;
    public $profesion;
    public $descripcion;

    protected $listeners = ['editar'];

    public function mount()
    {
        $this->proyectista = new User();
    }

    public function editar($id)
    {
        $this->openModal(); // Abre el modal
        $this->id = $id;
        $this->proyectista = User::find($id);
        $this->name = $this->proyectista->name;
        $this->email = $this->proyectista->email;
        $this->telefono = $this->proyectista->telefono;
        $this->profesion = $this->proyectista->profesion;
        $this->descripcion = $this->proyectista->descripcion;
    }

    public function actualizar()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->proyectista->id)],
            'telefono' => ['required', 'string', 'max:255'],
            'profesion' => ['required', 'string', 'max:255'],
            'descripcion' => ['required', 'string', 'max:255'],
        ]);

        $this->proyectista->update([
            'name' => $this->name,
            'email' => $this->email,
            'telefono' => $this->telefono,
            'profesion' => $this->profesion,
            'descripcion' => $this->descripcion,
        ]);

        $this->dispatch('actualizado');
        $this->reset();
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.proyectistas.editar-proyectista');
    }
}
