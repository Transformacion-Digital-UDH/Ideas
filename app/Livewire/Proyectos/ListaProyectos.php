<?php

namespace App\Livewire\Proyectos;

use App\Models\Necesidades;
use App\Models\Postulaciones;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListaProyectos extends Component
{
    public $listeners = ['reportado' => 'getMisProyectos'];
    public $responsables;
    public $proyectos;

    public $es_responsable = false;
    public $es_proyecto = false;
    public $los_dos = false;

    public function mount()
    {
        $this->getMisResponsabilidades();
        $this->getMisProyectos();
        $this->los_dos = $this->es_responsable && $this->es_proyecto;
    }

    public function render()
    {
        return view('livewire.proyectos.lista-proyectos');
    }

    public function getMisResponsabilidades()
    {
        $this->responsables = Necesidades::where('responsable_id', Auth::user()->id)
            ->get();
        $this->es_responsable = count($this->responsables) > 0;
    }

    public function getMisProyectos()
    {
        $this->proyectos = Postulaciones::with(
            'propuesta:pro_id,nec_id,pro_titulo,pro_proceso,es_oficial,pro_tipo',
            'propuesta.necesidad:nec_id,nec_titulo,responsable_id',
            'propuesta.necesidad.responsable:id,name',
            'equipo:equ_id,equ_codigo,equ_nombre,equ_tipo',
        )
            ->where('user_id', Auth::user()->id)
            ->where('pos_asignado', 1)
            ->where('pos_estado', 1)
            ->get();

        $this->es_proyecto = count($this->proyectos) > 0;
    }

    // Disparadores
    public function verResponsable($nec_id)
    {
        $this->dispatch('comoResponsable', $nec_id);
    }

    public function verPropuestas($nec_id)
    {
        $this->dispatch('verPropuestas', $nec_id);
    }

    public function verProyecto($pos_id)
    {
        $this->dispatch('verProyecto', $pos_id);
    }

    public function reportarEstado($id)
    {
        $this->dispatch('reportar', $id);
    }

    public function abriModalCorreo($id_necesidad)
    {
        $this->dispatch('verCorreo', $id_necesidad);
    }
}
