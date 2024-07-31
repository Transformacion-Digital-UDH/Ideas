<?php

namespace App\Livewire\Propuestas;

use App\Models\Propuestas;
use App\Traits\GestionarModal;
use Livewire\Component;

class VerDetalles extends Component
{
    use GestionarModal;

    public $propuesta;

    protected $listeners = ['ver'];

    public function mount()
    {
        $this->propuesta = new Propuestas();
    }

    public function ver($id)
    {
        $this->openModal(); // Abre el modal
        $this->propuesta = Propuestas::find($id);
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.propuestas.ver-detalles');
    }
}
