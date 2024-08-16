<?php

namespace App\Livewire\Postulaciones;

use App\Models\Propuestas;
use Livewire\Component;
use Livewire\WithPagination;

class AdminPostulaciones extends Component
{
    use WithPagination;

    public $listeners = ['finalizado' => 'cargarPropuestas'];

    public function getPropuestas()
    {
        return Propuestas::where('pro_proceso', 'Postulado')
            ->withCount(['postulantes' => function ($query) {
                $query->where('pos_estado', 1);
            }])->orderBy('pro_id', 'desc')
            ->paginate(10);
    }

    public function verPropuesta($id)
    {
        $this->dispatch('ver', $id);
    }

    public function cargarPropuestas()
    {
        return $this->getPropuestas();
    }

    public function verPostulantes($id)
    {
        $this->dispatch('asignar', $id);
    }

    public function render()
    {
        $this->cargarPropuestas();
        return view('livewire.postulaciones.admin-postulaciones', [
            'propuestas' => $this->getPropuestas(),
        ]);
    }
}
