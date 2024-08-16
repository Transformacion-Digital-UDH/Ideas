<?php

namespace App\Livewire\Equipos;

use App\Models\Equipos;
use App\Traits\GestionarModal;
use Livewire\Component;

class EliminarEquipo extends Component
{
    use GestionarModal;
    public $equipo;

    public $listeners = ['eliminarEquipo'];

    public function mount()
    {
        $this->equipo = new Equipos();
    }

    public function eliminarEquipo($id)
    {
        $this->equipo = Equipos::find($id);
        $this->openModal();
    }

    public function render()
    {
        return view('livewire.equipos.eliminar-equipo');
    }

    public function confirmarDelete()
    {
        $this->equipo->equ_estado = 0;
        $this->equipo->save();
        $this->dispatch('eliminado');
        $this->closeModal();
    }
}
