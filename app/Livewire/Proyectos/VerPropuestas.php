<?php

namespace App\Livewire\Proyectos;

use App\Models\Necesidades;
use App\Models\Propuestas;
use App\Traits\GestionarModal;
use Livewire\Component;

class VerPropuestas extends Component
{

    use GestionarModal;
    protected $listeners = ['verPropuestas'];
    public $necesidad;
    public $propuestas;

    public function mount()
    {
        $this->necesidad = new Necesidades();
        $this->propuestas = collect();
    }

    public function verPropuestas($nec_id)
    {
        $this->necesidad = Necesidades::where('nec_estado', 1)->find($nec_id);
        $this->propuestas = Propuestas::where('nec_id', $nec_id)
            ->where('pro_estado', 1)
            ->with('postulaciones.postulante', 'postulaciones.equipo')
            ->get()
            ->each(function ($propuesta) {
                $propuesta->postulante = $propuesta->postulaciones->where('pos_estado', 1)->where('pos_asignado', 1)->first()->postulante ?? null;
                $propuesta->equipo = $propuesta->postulaciones->where('pos_estado', 1)->where('pos_asignado', 1)->first()->equipo ?? null;
                $propuesta->seccion = $propuesta->postulaciones->where('pos_estado', 1)->where('pos_asignado', 1)->first()->pos_seccion ?? null;
            });
        $this->openModal();
    }

    public function render()
    {
        return view('livewire.proyectos.ver-propuestas');
    }
}
