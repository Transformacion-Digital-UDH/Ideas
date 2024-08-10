<?php

namespace App\Livewire\Postulaciones;

use App\Models\Postulaciones;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListaPostulantes extends Component
{
    
    public $postulantes;

    public function mount()
    {
       $this->postulantes = $this->getPostulantes();
    }

    public function render()
    {
        return view('livewire.postulaciones.lista-postulantes');
    }

    public function abrirModalVer($id)
    {
        $this->dispatch('ver', $id);
    }

    public function getPostulantes()
    {
        $postulantes = Postulaciones::all();

        $postulantes = $postulantes->map(function ($postulacion) {
            $validar = Postulaciones::where('pos_asignado', '1')
                ->where('pos_estado', 1)
                ->where('pro_id', $postulacion->pro_id)
                ->exists();
            $postulacion->estado = $this->validarEstado($validar, $postulacion->pos_asignado);
            return $postulacion;
        });

        return $postulantes;
    }

    public function validarEstado($validar, $pos_estado)
    {
        $estado = 'Pendiente';
        if ($validar) {
            if ($validar && $pos_estado) {
                $estado = 'Aprobado';
            } else {
                $estado = 'Rechazado';
            }
        }
        return $estado;
    }
}
