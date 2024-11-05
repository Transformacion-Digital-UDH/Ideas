<?php

namespace App\Livewire\Proyectos;

use App\Models\EstadoProceso;
use App\Models\Propuestas;
use App\Models\ReportesPropuestas;
use App\Traits\GestionarModal;
use Livewire\Component;

class ReportarAvance extends Component
{
    use GestionarModal;
    protected $listeners = ['reportar'];

    public $confimar = false;
    public $procesos;
    public $propuesta;
    public $reportes;
    public $propuesta_id;


    public function mount()
    {
        $this->reportes = [];
        $this->procesos = [];
    }

    public function reportar($id)
    {
        $this->propuesta_id = $id;
        $this->procesos = $this->getEstados();
        $this->getReportes();
        $this->propuesta = Propuestas::find($id);
        $this->openModal(); // Abre el modal
    }

    public function getEstados()
    {
        $estados = EstadoProceso::where('est_estado', 1)
            ->whereIn('est_codigo', ['ASIG', 'PLAN', 'EJEC', 'FINA', 'COMP'])
            ->get();
        return $estados;
    }

    public function completar()
    {
        $this->confimar = true;
    }

    public function cancelar()
    {
        $this->confimar = false;
    }

    public function confirmar($nexEstado)
    {
        $nexProceso = EstadoProceso::where('est_codigo', $nexEstado)->pluck('est_nombre')->first();
        $this->propuesta->pro_proceso = $nexProceso;
        $this->propuesta->save();
        $this->getReportes();
        $this->dispatch('reportado');
        $this->cancelar();
    }

    public function getReportes()
    {
        $this->reportes = ReportesPropuestas::with('propuesta:pro_id,pro_proceso')
            ->where('pro_id', $this->propuesta_id)->where('rep_estado', 1)->get();
    }

    public function render()
    {
        return view('livewire.proyectos.reportar-avance');
    }

    public function cerrarReporte()
    {
        $this->closeModal();
    }
}
