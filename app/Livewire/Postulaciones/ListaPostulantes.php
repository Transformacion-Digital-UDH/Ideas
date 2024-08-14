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

        //$idpropuesta = $postulantes->pro_id;
        // Si quieres conservar las claves originales del arreglo, usa:
        $postulantes = $postulantes->unique('pro_id')->values();


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
