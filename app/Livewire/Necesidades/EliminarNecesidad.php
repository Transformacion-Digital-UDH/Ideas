<?php

namespace App\Livewire\Necesidades;

use App\Models\Necesidades;
use App\Traits\GestionarModal;
use Livewire\Component;

class EliminarNecesidad extends Component
{
    use GestionarModal;
    public $necesidad;

    public $listeners = ['eliminarNecesidad'];

    public function mount()
    {
        $this->necesidad = new Necesidades();
    }

    public function eliminarNecesidad($id)
    {
        $this->necesidad = Necesidades::find($id);
        $this->openModal();
    }

    public function render()
    {
        return view('livewire.necesidades.eliminar-necesidad');
    }

    public function confirmarDelete()
    {
        $this->necesidad->nec_estado = 0;
        $this->necesidad->save();
        $this->dispatch('eliminado');
        $this->closeModal();
    }
}
