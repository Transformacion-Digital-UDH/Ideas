<?php

namespace App\Livewire\Postulaciones;

use App\Models\Postulaciones;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListaPostulantes extends Component
{

    public $postulantes;

    public function mount()
    {
        $this->postulantes = $this->getPostulantes();
    }

    public function render()
    {
        return view('livewire.postulaciones.lista-postulantes');
    }

    public function abrirModalVer($id)
    {
        $this->dispatch('ver', $id);
    }


}
