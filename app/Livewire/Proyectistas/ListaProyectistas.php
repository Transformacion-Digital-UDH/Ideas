<?php

namespace App\Livewire\Proyectistas;

use App\Models\User;
use App\Traits\GestionarModal;
use Livewire\Component;

class ListaProyectistas extends Component
{
    use GestionarModal;
    public $proyectistas;

    protected $listeners = [
        'eliminado' => 'getProyectistas',
        'actualizado' => 'getProyectistas',
        'guardado' => 'getProyectistas'
    ];

    public function mount()
    {
        $this->getProyectistas();
    }

    public function render()
    {
        return view('livewire.proyectistas.lista-proyectistas');
    }

    public function abrirModal($id)
    {
        $this->dispatch('editar', $id);
    }

    public function abrirModalVer($id)
    {
        $this->dispatch('ver', $id);
    }

    public function eliminarProyectista($id)
    {
        $this->dispatch('eliminarProyectista', $id);
    }

    public function getProyectistas()
    {
        $this->proyectistas = User::role('PROYECTISTA')->where('estado', 1)->get();
    }
}
