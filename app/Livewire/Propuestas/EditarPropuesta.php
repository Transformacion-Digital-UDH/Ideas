<?php

namespace App\Livewire\Propuestas;

use Livewire\Component;
use App\ModelS\Propuestas;
use App\Traits\GestionarModal;
use App\Models\Necesidades;

class EditarPropuesta extends Component
{
    use GestionarModal;
    public $propuesta;
    public $necesidad;

    public $pro_titulo;
    public $pro_descripcion;


    protected $listeners = ['editar' => 'editar'];

    public function mount()
    {
        $this->propuesta = new Propuestas();
        $this->necesidad = new Necesidades();
    }
    public function editar($id)
    {
        $this->reset();
        $this->resetValidation();
        $this->openModal();
        $this->propuesta = Propuestas::find($id);
        $this->pro_titulo = $this->propuesta->pro_titulo;
        $this->pro_descripcion = $this->propuesta->pro_descripcion;
        $this->necesidad = Necesidades::find($this->propuesta->nec_id);
    }

    public function actualizarPropuesta()
    {
        $this->validate([
            'pro_titulo' => ['required', 'string', 'max:255'],
            'pro_descripcion' => ['required', 'string', 'max:800'],
        ]);
        $this->propuesta->pro_titulo = $this->pro_titulo;
        $this->propuesta->pro_descripcion = $this->pro_descripcion;
        $this->propuesta->save();
        $this->dispatch('actualizado');
        $this->closeModal();
    }

    public function closeModal()
    {
        $this->showModal = false;
    }
    public function render()
    {
        return view('livewire.propuestas.editar-propuesta');
    }
}
