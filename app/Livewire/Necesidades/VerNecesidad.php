<?php

namespace App\Livewire\Necesidades;

use Livewire\Component;
use App\Models\Necesidades;
use App\Traits\GestionarModal;

class VerNecesidad extends Component
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
        $this->necesidad = Necesidades::with('propuestas', 'documentos')->find($id);
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.necesidades.ver-necesidad');
    }
}
