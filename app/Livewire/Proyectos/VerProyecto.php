<?php

namespace App\Livewire\Proyectos;

use App\Models\Postulaciones;
use App\Traits\GestionarModal;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class VerProyecto extends Component
{
    use GestionarModal;

    public $listeners = ['verProyecto'];
    public $postulacion;

    public function mount(){

        $this->postulacion = new Postulaciones();
    }

    public function render()
    {
        return view('livewire.proyectos.ver-proyecto');
    }

    public function verProyecto($pos_id)
    {
        $this->postulacion = Postulaciones::with(
            'propuesta',
            'propuesta.necesidad',
            'propuesta.necesidad.responsable:id,name,email,telefono',
            'equipo:equ_id,equ_codigo,equ_nombre,equ_tipo',
        )
            ->where('user_id', Auth::user()->id)
            ->where('pos_asignado', 1)
            ->where('pos_estado', 1)
            ->find($pos_id);

        $this->openModal();
    }
}
