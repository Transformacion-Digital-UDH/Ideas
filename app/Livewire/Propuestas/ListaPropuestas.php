<?php

namespace App\Livewire\Propuestas;

use Livewire\Component;
use App\Models\Propuestas;
use App\Models\User;

class ListaPropuestas extends Component
{
    public $propuestas;

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
        if (User::esRol('ESTUDIANTE')) {
            $propuestas = Propuestas::where('pro_estado', 1)->orderBy('pro_id', 'desc')->where('pro_tipo', 'Tesis')->get();
        } else if (User::esRol('DOCENTE')) {
            $propuestas = Propuestas::where('pro_estado', 1)->orderBy('pro_id', 'desc')->where('pro_tipo', 'Curso')->get();
        } else {
            $propuestas = Propuestas::where('pro_estado', 1)->orderBy('pro_id', 'desc')->get();
        }
        return $propuestas ?? [];
    }
}
