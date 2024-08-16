<?php

namespace App\Livewire\Proyectistas;

use App\Models\User;
use App\Traits\GestionarModal;
use Livewire\Component;
use Livewire\WithPagination;

class ListaProyectistas extends Component
{
    use GestionarModal, WithPagination;

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
        return view('livewire.proyectistas.lista-proyectistas', [
            'proyectistas' => $this->getProyectistas(),
        ]);
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
        return User::role('PROYECTISTA')->where('estado', 1)->orderBy('id', 'desc')->paginate(10);
    }
}
