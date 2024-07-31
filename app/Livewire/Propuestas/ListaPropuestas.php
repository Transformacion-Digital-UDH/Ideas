<?php

namespace App\Livewire\Propuestas;

use Livewire\Component;
use App\Models\Propuestas;

class ListaPropuestas extends Component
{
    public function abrirModal($id)
    {
        $this->emit('abrirModal', $id);
    }

    public function render()
    {
        $propuestas = Propuestas::all();
        return view('livewire.propuestas.lista-propuestas', compact('propuestas'));
    }
}
