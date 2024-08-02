<?php

namespace App\Livewire\Propuestas;

use Livewire\Component;
use App\Models\Propuestas;
use App\Models\Postulaciones;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ListaPropuestas extends Component
{
    public $propuestas;

    protected $listeners = ['guardado' => 'getPropuestas'];

    public function mount()
    {
        $this->propuestas = $this->getPropuestas();
    }

    public function render()
    {
        return view('livewire.propuestas.lista-propuestas', ['propuestas' => $this->propuestas]);
    }

    public function abrirModalVer($id)
    {
        $this->dispatch('ver', $id);
    }

    public function abrirModalPostular($id)
    {
        $this->dispatch('postular', $id);
    }

    public function getPropuestas()
    {
        $user_id = Auth::user()->id;
        
        // Obtener IDs de propuestas en las que el usuario ha postulado
        $postulaciones_ids = Postulaciones::where('user_id', $user_id)
            ->pluck('pro_id')
            ->toArray();
        
        // Filtrar propuestas según el rol del usuario y excluir aquellas a las que el usuario ya ha postulado
        if (User::esRol('ESTUDIANTE')) {
            $propuestas = Propuestas::where('pro_estado', 1)
                ->where('pro_tipo', 'Tesis')
                ->whereNotIn('pro_id', $postulaciones_ids)
                ->orderBy('pro_id', 'desc')
                ->get();
        } else if (User::esRol('DOCENTE')) {
            $propuestas = Propuestas::where('pro_estado', 1)
                ->where('pro_tipo', 'Curso')
                ->whereNotIn('pro_id', $postulaciones_ids)
                ->orderBy('pro_id', 'desc')
                ->get();
        } else {
            $propuestas = Propuestas::with('necesidad')
                ->where('pro_estado', 1)
                ->whereNotIn('pro_id', $postulaciones_ids)
                ->orderBy('pro_id', 'desc')
                ->get();
        }
        
        return $propuestas ?? [];
    }
}
