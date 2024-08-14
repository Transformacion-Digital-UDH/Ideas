<?php

namespace App\Livewire\Postulaciones;

use Livewire\Component;
use App\Models\Postulaciones;

use Illuminate\Support\Facades\Auth;

class ListaPostulaciones extends Component
{
    public $postulaciones;

    public function mount()
    {
        //    $this->postulaciones = $this->getPostulaciones();
    }

    public function render()
    {
        $this->postulaciones = $this->getPostulaciones();
        return view('livewire.postulaciones.lista-postulaciones');
    }

    public function cargarVer($id)
    {
        $this->dispatch('ver', $id);
    }

    public function getPostulaciones()
    {
        $postulaciones = Postulaciones::with('propuesta')
            ->where('user_id', Auth::user()->id)
            ->get();

        $postulaciones = $postulaciones->map(function ($postulacion) {
            $validar = Postulaciones::where('pos_asignado', '1')
                ->where('pos_estado', 1)
                ->where('pro_id', $postulacion->pro_id)
                ->exists();
            $postulacion->estado = $this->validarEstado($validar, $postulacion->pos_asignado);
            return $postulacion;
        });

        return $postulaciones;
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

    public function reportarEstado($id)
    {
        $this->dispatch('reportar', $id);
    }
}
