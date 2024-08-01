<?php

namespace App\Livewire\Necesidades;

use App\Models\Necesidades;
use Livewire\Component;

class ListaNecesidades extends Component
{
    public $necesidades;

    protected $listeners = ['guardado' => 'getNecesidades'];

    public function mount()
    {
        $this->necesidades = $this->getNecesidades();
    }

    public function abrirModal($id)
    {
        $this->dispatch('curar', $id);
    }

    public function getNecesidades()
    {
        $necesidades = Necesidades::where('nec_estado', '!=', 0)->get();
        return $necesidades ?? [];
    }

    public function render()
    {
        return view('livewire.necesidades.lista-necesidades');
    }
}