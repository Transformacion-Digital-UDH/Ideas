<?php

namespace App\Livewire\Postulaciones;

use App\Models\EstadoProceso;
use App\Models\Propuestas;
use App\Traits\GestionarModal;
use Livewire\Component;

class ReportarPropuesta extends Component
{
    use GestionarModal;
    protected $listeners = ['reportar'];

    public $procesos;


    public function mount()
    {

        $this->procesos = $this->getEstados();
    }

    public function reportar($id)
    {
        $this->openModal(); // Abre el modal
    }

    public function render()
    {
        return view('livewire.postulaciones.reportar-propuesta');
    }

    public function getEstados()
    {
        $estados = EstadoProceso::where('est_estado', 1)
            ->whereIn('est_codigo', ['ASIG', 'PLAN', 'EJEC', 'FINA', 'COMP'])
            ->get();
        return $estados;
    }
}
