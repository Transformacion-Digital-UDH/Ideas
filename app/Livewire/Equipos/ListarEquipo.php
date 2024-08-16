<?php

namespace App\Livewire\Equipos;

use App\Models\Equipos;
use App\Traits\GestionarModal;
use Livewire\Component;
use Livewire\WithPagination;

class ListarEquipo extends Component
{
    use GestionarModal, WithPagination;

    protected $listeners = [
        'eliminado' => 'getEquipos',
        'guardado' => 'getEquipos',
        'EquipoActualizado' => 'getEquipos'
    ];

    public function mount()
    {
        $this->getEquipos();
    }

    public function getEquipos()
    {
        return Equipos::where('equ_estado', 1)->orderBy('equ_id', 'desc')->paginate(10);
    }

    public function verEquipo($id)
    {
        $this->dispatch('ver', $id);
    }

    public function eliminarEquipo($id)
    {
        $this->dispatch('eliminarEquipo', $id);
    }

    public function editarEquipo($id)
    {
        $this->dispatch('editar', $id);
    }

    public function render()
    {
        return view('livewire.equipos.listar-equipo', [
            'equipos' => $this->getEquipos(),
        ]);
    }
}
