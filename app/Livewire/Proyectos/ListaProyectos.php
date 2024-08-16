<?php

namespace App\Livewire\Proyectos;

use App\Models\Necesidades;
use App\Models\Postulaciones;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListaProyectos extends Component
{
    public $listeners = ['reportado' => 'reportarEstado'];
    public $responsables;
    public $proyectos;

    public $es_responsable = false;
    public $es_proyecto = false;
    public $los_dos = false;

    public function mount()
    {
        $this->responsables = Necesidades::where('responsable_id', Auth::user()->id)->get();
        $this->es_responsable = count($this->responsables) > 0;
        $this->proyectos = $this->getMisProyectos();
        $this->es_proyecto = count($this->proyectos) > 0;
        $this->los_dos = $this->es_responsable && $this->es_proyecto;
    }

    public function render()
    {
        return view('livewire.proyectos.lista-proyectos');
    }

    public function verResponsable($nec_id)
    {
        $this->dispatch('comoResponsable', $nec_id);
    }

    public function verPropuestas($nec_id)
    {
        $this->dispatch('verPropuestas', $nec_id);
    }

    public function getMisProyectos()
    {
        $misproyectos = Postulaciones::with('propuesta')
            ->where('user_id', Auth::user()->id)
            ->where('pos_asignado', 1)
            ->get();

        return $misproyectos;
    }

    public function reportarEstado($id)
    {
        $this->dispatch('reportar', $id);
    }
}
