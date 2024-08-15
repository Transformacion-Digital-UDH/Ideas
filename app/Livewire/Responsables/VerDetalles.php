<?php

namespace App\Livewire\Responsables;

use Livewire\Component;
use App\Models\Necesidades;
use App\Traits\GestionarModal;

class VerDetalles extends Component
{
    use GestionarModal;

    public $necesidad;

    protected $listeners = ['ver'];

    public function mount()
    {
        $this->necesidad = new Necesidades();
    }

    public function ver($id)
    {
        $this->openModal();
        $this->necesidad = Necesidades::with('propuestas')->find($id);
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.responsables.ver-detalles');
    }

    
}
