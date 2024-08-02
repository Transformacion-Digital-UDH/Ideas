<?php

namespace App\Livewire\Necesidades;

use App\Models\Necesidades;
use App\Traits\GestionarModal;
use Livewire\Component;

class CurarNecesidad extends Component
{
    use GestionarModal;

    public $necesidad;

    protected $listeners = ['curar'];

    protected $rules = [
        'proy_nombres' => 'required|string|max:255',
    ];

    public function mount()
    {
        $this->necesidad = new Necesidades();
    }

    public function curar($id)
    {
        $this->openModal();
        $this->necesidad = Necesidades::find($id);
        $this->dispatch('enviarId', $this->necesidad->nec_id);
    }

    public function guardar()
    {
        $this->validate();

        $this->necesidad->update([
            'proy_nombres' => $this->proy_nombres,
            'proy_email' => $this->proy_email,
            'proy_telefono' => $this->proy_telefono,
        ]);

        $this->dispatch('guardado');
        $this->reset();
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.necesidades.curar-necesidad');
    }
}
