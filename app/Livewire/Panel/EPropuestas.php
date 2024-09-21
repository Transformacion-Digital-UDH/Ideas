<?php

namespace App\Livewire\Panel;

use App\Models\Propuestas;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class EPropuestas extends Component
{
    public $no_oficial = [];
    public $totalNooficial = 0;
    public $oficial = [];
    public $totalOficial = 0;

    public function mount()
    {
        $this->numNoOficial();
        $this->numOficial();
    }

    public function numNoOficial()
    {
        $propuestas = Propuestas::select('pro_tipo', DB::raw('count(*) as total'))
            ->where('pro_estado', 1)
            ->where('es_oficial', 0)
            ->whereIn('pro_tipo', ['Curso', 'Tesis', 'Gestor UDH'])
            ->groupBy('pro_tipo')
            ->get();

        foreach ($propuestas as $item) {
            $this->no_oficial[$item->pro_tipo] = $item->total ?? 0;
            $this->totalNooficial += $item->total ?? 0;
        }
    }

    public function numOficial()
    {
        $propuestas = Propuestas::select('pro_tipo', DB::raw('count(*) as total'))
            ->where('pro_estado', 1)
            ->where('es_oficial', 1)
            ->whereIn('pro_tipo', ['Curso', 'Tesis', 'Gestor UDH'])
            ->groupBy('pro_tipo')
            ->get();

        foreach ($propuestas as $item) {
            $this->oficial[$item->pro_tipo] = $item->total ?? 0;
            $this->totalOficial += $item->total ?? 0;
        }
    }

    public function render()
    {
        return view('livewire.panel.e-propuestas');
    }
}
