<?php

namespace App\Livewire\Propuestas;

use Livewire\Component;
use App\Models\Propuestas;

class TablaPropuestas extends Component
{
    public function render()
    {
        $propuestas = Propuestas::all();
        return view('livewire.propuestas.tabla-propuestas', compact('propuestas'));
    }
}
