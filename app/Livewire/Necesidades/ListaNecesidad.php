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

    public function render()
    {
        return view('livewire.necesidades.lista-necesidades');
    }


    public function abrirEditar($id)
    {
        $this->dispatch('editar', $id);
    }

    public function getNecesidades()
    {
        $necesidades = Necesidades::where('es_financiado', 1)->get();
        return $necesidades ?? [];
    }

}
