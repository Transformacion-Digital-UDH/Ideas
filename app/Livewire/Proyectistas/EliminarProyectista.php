<?php

namespace App\Livewire\Proyectistas;

use App\Models\User;
use App\Traits\GestionarModal;
use Livewire\Component;

class EliminarProyectista extends Component
{
    use GestionarModal;
    public $proyectista;

    public $listeners = ['eliminarProyectista'];

    public function mount()
    {
        $this->proyectista = new User();
    }

    public function eliminarProyectista($id)
    {
        $this->proyectista = User::find($id);
        $this->openModal();
    }

    public function render()
    {
        return view('livewire.proyectistas.eliminar-proyectista');
    }

    public function confirmarDelete()
    {
        $this->proyectista->estado = 0;
        $this->proyectista->save();
        $this->dispatch('eliminado');
        $this->closeModal();
    }
}
