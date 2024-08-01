<?php

namespace App\Livewire\Necesidades;

use App\Models\Necesidades;
use Livewire\Component;
use App\Traits\GestionarModal;

class EditarNecesidad extends Component
{

    public function render()
    {
        return view('livewire.necesidades.editar-necesidad');
    }
}
