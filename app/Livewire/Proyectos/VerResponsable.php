<?php

namespace App\Livewire\Proyectos;

use App\Models\Necesidades;
use App\Traits\GestionarModal;
use Livewire\Component;

class VerResponsable extends Component
{
    use GestionarModal;
    protected $listeners = ['comoResponsable'];
    public $necesidad;

    public function mount()
    {
        $this->necesidad = new Necesidades();
    }

    public function render()
    {
        return view('livewire.proyectos.ver-responsable');
    }

    public function comoResponsable($nec_id)
    {
        $this->necesidad = Necesidades::with(['propuestas' => function ($query) {
            $query->where('pro_estado', 1);
        }])->where('nec_estado', 1)->find($nec_id);
        $this->openModal();
    }
}
