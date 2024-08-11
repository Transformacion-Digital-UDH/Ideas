<?php

namespace App\Livewire\Propuestas;

use App\Http\Controllers\PropuestasController;
use Livewire\Component;

class AdminPropuestas extends Component
{
    public $propuestas;

    protected $listeners = ['actualizado' => 'getPropuestas'];
    public function mount()
    {
        $this->propuestas = $this->getPropuestas();
    }

    public function abrirModalVer($id)
    {
        $this->dispatch('ver', $id);
    }

    public function abrirModalEditar($id)
    {
        $this->dispatch('editar', $id);
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
