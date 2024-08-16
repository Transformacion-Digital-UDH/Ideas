<?php

namespace App\Livewire\Propuestas;

use Livewire\Component;
use App\Models\Propuestas;
use App\Models\Postulaciones;
use App\Models\User;

class ListaPropuestas extends Component
{
    public $propuestas;
    public $postulaciones_ids;

    protected $listeners = ['guardado' => 'getPropuestas'];

    public function mount()
    {
        $this->propuestas = $this->getPropuestas();
    }

    public function render()
    {
        return view('livewire.propuestas.lista-propuestas');
    }

    public function abrirModalVer($id)
    {
        $this->dispatch('ver', $id);
    }

    public function abrirModalPostular($id)
    {
        $this->dispatch('postular', $id);
    }

    public function getPropuestas()
    {
        $this->postulaciones_ids = Postulaciones::postulaciones_ids();

        if (User::esRol('ESTUDIANTE')) {
            $tipo = 'Tesis';
        } else if (User::esRol('DOCENTE')) {
            $tipo = 'Curso';
        } else if (User::esRol('PROYECTISTA')) {
            $tipo = 'Proyecto';
        } else {
            $tipo = 'Todo';
        }

        if ($tipo == 'Todo') {
            $propuestas = Propuestas::where('pro_estado', 1)
                ->orderBy('pro_id', 'desc')
                ->get();
        } else {
            $propuestas = Propuestas::where('pro_estado', 1)
                ->where('pro_tipo', $tipo)
                ->whereIn('pro_proceso', ['En Postulación', 'Postulado'])
                ->orderBy('pro_id', 'desc')
                ->get();
        }

        return $propuestas ?? [];
    }
}
