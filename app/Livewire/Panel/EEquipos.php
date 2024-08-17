<?php

namespace App\Livewire\Panel;

use App\Models\Equipos;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class EEquipos extends Component
{
    public $num_equipos = [];

    public function mount()
    {
        $this->getEquipos();
    }

    public function render()
    {
        return view('livewire.panel.e-equipos');
    }

    public function getEquipos()
    {
        $equipos = Equipos::select('equ_tipo', DB::raw('count(*) as total'))
            ->where('equ_estado', 1)
            ->whereIn('equ_tipo', ['Curso', 'Semillero'])
            ->groupBy('equ_tipo')
            ->get();

        foreach ($equipos as $equipo) {
            $this->num_equipos[$equipo->equ_tipo] = $equipo->total;
        }
    }
}
