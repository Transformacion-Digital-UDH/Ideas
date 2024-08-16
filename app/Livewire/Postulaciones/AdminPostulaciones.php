<?php

namespace App\Livewire\Postulaciones;

use App\Models\Propuestas;
use Livewire\Component;

class AdminPostulaciones extends Component
{
    public $propuestas;

    public $listeners = ['finalizado' => 'cargarPropuestas'];

    public function getPropuestas()
    {
        return Propuestas::where('pro_proceso', 'Postulado')
            ->withCount(['postulantes' => function ($query) {
                $query->where('pos_estado', 1);
            }])->orderBy('pro_id', 'desc')
            ->get();
    }

    public function verPropuesta($id)
    {
        $this->dispatch('ver', $id);
    }

    public function cargarPropuestas()
    {
        $this->propuestas = $this->getPropuestas();
    }

    public function verPostulantes($id)
    {
        $this->dispatch('asignar', $id);
    }

    public function render()
    {
        $this->cargarPropuestas();
        return view('livewire.postulaciones.admin-postulaciones');
    }
}
