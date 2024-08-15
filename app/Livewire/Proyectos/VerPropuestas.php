<?php

namespace App\Livewire\Proyectos;

use App\Models\Necesidades;
use App\Traits\GestionarModal;
use Livewire\Component;

class VerPropuestas extends Component
{

    use GestionarModal;
    protected $listeners = ['verPropuestas'];
    public $necesidad;

    public function mount()
    {
        $this->necesidad = new Necesidades();
    }

    public function verPropuestas($nec_id)
    {
        $this->necesidad = Necesidades::with(['propuestas' => function ($query) {
            $query->where('pro_estado', 1)
                  ->with(['postulantes' => function ($query) {
                      $query->wherePivot('pos_asignado', 1);
                  }]);
        }])->where('nec_estado', 1)->find($nec_id);
        
        $this->openModal();
    }

    public function render()
    {
        return view('livewire.proyectos.ver-propuestas');
    }
}
