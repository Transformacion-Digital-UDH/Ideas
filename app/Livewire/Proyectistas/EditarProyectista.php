<?php

namespace App\Livewire\Proyectistas;

use App\Models\Proyectistas;
use App\Traits\GestionarModal;
use Livewire\Component;

class EditarProyectista extends Component
{
    use GestionarModal;
    
    public $proyectista;
    public $proy_id;
    public $proy_nombres;
    public $proy_telefono;
    public $proy_email;

    protected $listeners = ['editar'];

    protected $rules = [
        'proy_nombres' => 'required|string|max:255',
        'proy_email' => 'required|email',
        'proy_telefono' => 'required|string|max:20',
    ];

    public function mount()
    {
        $this->proyectista = new Proyectistas();
    }

    public function editar($id)
    {
        $this->openModal(); // Abre el modal
        $this->proy_id = $id;
        $this->proyectista = Proyectistas::find($id);
        $this->proy_nombres = $this->proyectista->proy_nombres;
        $this->proy_email = $this->proyectista->proy_email;
        $this->proy_telefono = $this->proyectista->proy_telefono;
    }

    public function actualizar()
    {
        $this->validate();

        $this->proyectista->update([
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
        return view('livewire.proyectistas.editar-proyectista');
    }
}
