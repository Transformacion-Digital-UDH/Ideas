<?php

namespace App\Livewire\Proyectistas;

use App\Traits\GestionarModal;
use Livewire\Component;

class CrearProyectista extends Component
{
    use GestionarModal;

    public function abrirModal()
    {
        $this->showModal = true;
    }

    public function render()
    {
        return view('livewire.proyectistas.crear-proyectista');
    }
}
