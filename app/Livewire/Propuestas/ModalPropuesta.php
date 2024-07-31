<?php

namespace App\Livewire\Propuestas;

use Livewire\Component;
use App\Models\Propuestas;

class ModalPropuesta extends Component
{
    public $propuestaSeleccionada;
    public $mostrarModal = false;

    protected $listeners = ['abrirModal', 'cerrarModal'];

    public function abrirModal($id)
    {
        $this->propuestaSeleccionada = Propuestas::find($id);
        $this->mostrarModal = true;
    }

    public function cerrarModal()
    {
        $this->mostrarModal = false;
    }

    public function render()
    {
        return view('livewire.propuestas.modal-propuesta');
    }
}
