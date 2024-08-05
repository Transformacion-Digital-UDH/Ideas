<?php

namespace App\Livewire\Equipos;

use App\Models\Equipos;
use Livewire\Component;

class ListarEquipo extends Component
{
    
    public $equipos;

    protected $listeners = ['guardado'=> 'getEquipos'];

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

    public function editarEquipo($id)
    {
        $this->dispatch('editar', $id);
    }


    public function render()
    {
        return view('livewire.equipos.listar-equipo');
    }
}
