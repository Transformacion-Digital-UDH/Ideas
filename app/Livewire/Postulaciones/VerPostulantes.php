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
        $this->openModal(); // Abre el modal
        $this->postulantes = Postulaciones::with('propuesta')->find($id);
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
