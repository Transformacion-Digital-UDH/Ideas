<?php

namespace App\Livewire\Curaciones;

use App\Models\Proyectistas;
use Livewire\Component;

class GuardarProyecto extends Component
{
    public function render()
    {
        $proyectistas = Proyectistas::where('proy_estado', 1)->get();
        return view('livewire.curaciones.guardar-proyecto', compact('proyectistas'));
    }
}
