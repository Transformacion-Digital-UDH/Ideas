<?php

namespace App\Livewire\Proyectistas;

use App\Models\Proyectistas;
use App\Models\User;
use Livewire\Component;

class ListaProyectistas extends Component
{
    public $proyectistas;

    protected $listeners = [
        'actualizado' => 'getProyectistas',
        'guardado' => 'getProyectistas'
    ];

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
        $proyectistas = User::role('PROYECTISTA')->where('estado', 1)->get();
        return $proyectistas ?? [];
    }
}
