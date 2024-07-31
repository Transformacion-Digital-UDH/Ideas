<?php

namespace App\Livewire\Proyectistas;

use App\Models\Proyectistas;
use Livewire\Component;

class ListaProyectistas extends Component
{
    public $proyectistas;

    protected $listeners = ['actualizado' => 'getProyectistas'];

    public function mount()
    {
        $this->proyectistas = $this->getProyectistas();
    }

    public function render()
    {
        return view('livewire.proyectistas.lista-proyectistas');
    }

    public function abrirModal($id)
    {
        $this->dispatch('editar', $id);
    }

    public function getProyectistas()
    {
        $proyectistas = Proyectistas::where('proy_estado', '!=', 0)->get();
        return $proyectistas ?? [];
    }
}
