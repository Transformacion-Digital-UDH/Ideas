<?php

namespace App\Livewire\Propuestas;

use App\Http\Controllers\PropuestasController;
use Livewire\Component;

class AdminPropuestas extends Component
{
    public $propuestas;

    public function mount()
    {
        $this->propuestas = $this->getPropuestas();
    }

    public function render()
    {
        return view('livewire.propuestas.admin-propuestas');
    }

    public function getPropuestas()
    {
        $controller = new ListaPropuestas();
        return $controller->getPropuestas();
    }
}
