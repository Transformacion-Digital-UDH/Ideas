<?php

namespace App\Livewire\Panel;

use App\Models\Necesidades;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ENecesidades extends Component
{
    public $num_necesidades = [];
    public $en_ejecucion = 0;

    public function mount()
    {
        $this->numNecesidades();
        $this->numEjecucion();
    }

    public function numNecesidades()
    {
        $necesidades = Necesidades::select('nec_proceso', DB::raw('count(*) as total'))
            ->where('nec_estado', 1)
            ->whereIn('nec_proceso', ['En Espera', 'Postulado', 'No Aplica', 'Completado'])
            ->groupBy('nec_proceso')
            ->get();

        foreach ($necesidades as $necesidad) {
            $this->num_necesidades[$necesidad->nec_proceso] = $necesidad->total;
        }
    }

    public function numEjecucion()
    {
        $this->en_ejecucion = Necesidades::where('nec_estado', 1)
            ->whereIn(
                'nec_proceso',
                [
                    'Asignado',
                    'En Planificación',
                    'En Ejecución',
                    'En Finalización'
                ]
            )->count();
    }

    public function render()
    {
        return view('livewire.panel.e-necesidades');
    }
}
