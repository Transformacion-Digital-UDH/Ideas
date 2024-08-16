<?php

namespace App\Livewire\Propuestas;

use Livewire\Component;
use Livewire\WithPagination;

class AdminPropuestas extends Component
{
    use WithPagination;

    protected $listeners = ['actualizado' => 'getPropuestas'];

    public function mount()
    {
        $this->getPropuestas();
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
        return view('livewire.propuestas.admin-propuestas', [
            'propuestas' => $this->getPropuestas(),
        ]);
    }

    public function getPropuestas()
    {
        $controller = new ListaPropuestas();
        return $controller->getPropuestas();
    }
}
