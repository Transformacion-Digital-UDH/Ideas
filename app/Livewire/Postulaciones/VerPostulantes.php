<?php

namespace App\Livewire\Postulaciones;

use App\Models\Postulaciones;
use App\Traits\GestionarModal;
use Livewire\Component;

class VerPostulantes extends Component
{
    use GestionarModal;

    public $postulantes;
    public $mostrarBtnPostulacion;

    protected $listeners = ['ver'];

    public function mount($mostrarBtnPostulacion = true)
    {
        $this->postulantes = new Postulaciones();
        $this->mostrarBtnPostulacion = $mostrarBtnPostulacion;
    }

    public function ver($id)
    {
        $this->openModal();
        $this->postulantes = Postulaciones::where('pro_id', $id)
            ->with('propuesta', 'postulante')
            ->get();

        if ($this->postulantes->isEmpty()) {
            $this->postulantes = collect();
        }
    }

    public function asignarPostulacion($postulacionId)
    {
        $postulacion = Postulaciones::find($postulacionId);

        if ($postulacion) {
            $postulacion->pos_asignado = 1;
            $postulacion->save();
        }
    }


    public function closeModal()
    {
        $this->showModal = false;
    }

    public function abrirModalPostulacion($id)
    {
        $this->showModal = false;
        $this->dispatch('postulantes', $id);
    }

    public function render()
    {
        return view('livewire.postulaciones.ver-postulantes');
    }
}
