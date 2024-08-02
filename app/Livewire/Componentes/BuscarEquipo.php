<?php

namespace App\Livewire\Componentes;

use App\Models\Equipos;
use Livewire\Component;

class BuscarEquipo extends Component
{
    public $query = '';

    public function updatedQuery()
    {
        $this->emit('searchUpdated', $this->query);
    }
    
    public function render()
    {
        return view('livewire.componentes.buscar-equipo');
    }
}
