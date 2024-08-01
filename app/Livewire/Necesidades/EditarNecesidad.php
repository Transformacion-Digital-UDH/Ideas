<?php

namespace App\Livewire\Necesidades;

use App\Models\Necesidades;
use Livewire\Component;
use App\Traits\GestionarModal;

class EditarNecesidad extends Component
{

    use GestionarModal;

    public $necesidad;

    protected $listeners = ['ver'];

    protected $rules = [
        'proy_nombres' => 'required|string|max:255',
    ];

    public function mount()
    {
        $this->necesidad = new Necesidades();
    }

    public function ver($id)
    {
        $this->openModal();
        $this->necesidad = Necesidades::find($id);
    }

    public function actualizar()
    {
        $this->validate();

        $this->necesidad->update([
            'proy_nombres' => $this->proy_nombres,
            'proy_email' => $this->proy_email,
            'proy_telefono' => $this->proy_telefono,
        ]);

        $this->dispatch('actualizado');
        $this->reset();
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.necesidades.editar-necesidad');
    }
}
