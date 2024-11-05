<?php

namespace App\Livewire\Proyectistas;

use App\Models\User;
use App\Traits\GestionarModal;
use Livewire\Component;

class CrearProyectista extends Component
{
    use GestionarModal;

    public $name;
    public $telefono;
    public $email;
    public $profesion;
    public $descripcion;
    public $password;

    protected $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'telefono' => ['required', 'string', 'max:9'],
        'profesion' => ['string', 'max:255'],
        'descripcion' => ['nullable', 'string', 'max:255'],
        'password' => ['required', 'string', 'min:8'],
    ];

    public function abrirModal()
    {
        $this->reset();
        $this->resetValidation();
        $this->showModal = true;
    }

    public function guardar()
    {
        $this->validate();

        $proyectista = new User();
        $proyectista->name = $this->name;
        $proyectista->email = $this->email;
        $proyectista->telefono = $this->telefono;
        $proyectista->profesion = $this->profesion;
        $proyectista->descripcion = $this->descripcion;
        $proyectista->password = bcrypt($this->password);
        $proyectista->save();

        $proyectista->assignRole('PROYECTISTA');

        $this->dispatch('guardado');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.proyectistas.crear-proyectista');
    }
}
