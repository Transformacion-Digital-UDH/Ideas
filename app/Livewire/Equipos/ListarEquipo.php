<?php

namespace App\Livewire\Equipos;

use App\Models\Equipos;
use Livewire\Component;

class ListarEquipo extends Component
{
    
    public $equipos;
    public $equipoIdToDelete = null;

    protected $listeners = ['guardado'=> 'getEquipos','EquipoActualizado'=>'getEquipos'];

    public function mount()
    {
        $this->getEquipos();
    }

    public function getEquipos()
    {
        $this->equipos = Equipos::where('equ_estado', 1)->get();
    }

    public function verEquipo($id)
    {
        $this->dispatch('ver', $id);
    }

    public function confirmDelete($id)
    {
        $this->equipoIdToDelete = $id;
        $this->dispatch('show-delete-modal');
    }
    public function eliminarEquipo()
    {
        if ($this->equipoIdToDelete) {
            $equipo = Equipos::find($this->equipoIdToDelete);

            if ($equipo) {
                $equipo->equ_estado = 0;
                $equipo->save();
                $this->getEquipos();
            }

            $this->equipoIdToDelete = null;
            $this->dispatch('hide-delete-modal');
        }
    }

    public function editarEquipo($id)
    {
        $this->dispatch('editar', $id);
    }


    public function render()
    {
        return view('livewire.equipos.listar-equipo');
    }
}
