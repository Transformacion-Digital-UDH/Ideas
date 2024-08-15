<?php

namespace App\Livewire\Proyectos;

use App\Models\Necesidades;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListaProyectos extends Component
{
    public $responsables;
    public $es_responsable = false;
    public $es_proyecto = false;
    public $los_dos = false;

    public function mount()
    {
        $this->responsables = Necesidades::where('responsable_id', Auth::user()->id)->get();
        $this->es_responsable = count($this->responsables) > 0;
        $this->los_dos = $this->es_responsable && $this->es_proyecto;
    }

    public function render()
    {
        return view('livewire.proyectos.lista-proyectos');
    }
}
