<?php

namespace App\Livewire\Equipos;

use App\Models\Equipos;
use Livewire\Component;

class ListarEquipo extends Component
{
    
    public $equipos = [];
    public $searchQuery = '';

    protected $listeners = ['searchUpdated'];

    public function mount()
    {
        $this->equipos = Equipos::all();
    }

    public function searchUpdated($query)
    {
        $this->searchQuery = $query;
        $this->filterEquipos();
    }

    public function filterEquipos()
    {
        $this->equipos = EquipoS::where('equ_nombre', 'like', '%' . $this->searchQuery . '%')
                                ->orWhere('equ_descripcion', 'like', '%' . $this->searchQuery . '%')
                                ->orWhere('equ_codigo', 'like', '%' . $this->searchQuery . '%')
                                ->get();
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
