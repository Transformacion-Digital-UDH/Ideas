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
            $propuestas = Propuestas::where('pro_estado', 1)
                ->where('pro_tipo', 'Tesis')
                ->orderBy('pro_id', 'desc')
                ->get();
        } else if (User::esRol('DOCENTE')) {
            $propuestas = Propuestas::where('pro_estado', 1)
                ->where('pro_tipo', 'Curso')
                ->orderBy('pro_id', 'desc')
                ->get();
        } else if (User::esRol('PROYECTISTA')) {
            $propuestas = Propuestas::where('pro_estado', 1)
                ->where('pro_tipo', 'Proyecto')
                ->orderBy('pro_id', 'desc')
                ->get();
        } else {
            $propuestas = Propuestas::with('necesidad')
                ->where('pro_estado', 1)
                ->orderBy('pro_id', 'desc')
                ->get();
        }

        return $propuestas ?? [];
    }
}
