<?php

namespace App\Livewire\Necesidades;

use Livewire\Component;
use App\Models\Necesidades;
use App\Traits\GestionarModal;

class EditarNecesidad extends Component
{
    use GestionarModal;

    public $necesidad;
    
    public $nec_tipo;
    public $nec_entidad;
    public $nec_documento;
    public $nec_email;
    public $nec_telefono;
    public $nec_direccion;
    public $nec_titulo;
    public $nec_descripcion;
    public $es_financiado;
    public $doc_nombre;
    public $user_id;

    protected $listeners = ['editar'];

    public function mount()
    {
        $this->necesidad = new Necesidades();
    }

    public function editar($id)
    {
        $this->openModal(); // Abre el modal
        $this->nec_tipo = $id;
        $this->necesidad = Necesidades::find($id);
        $this->nec_entidad = $this->necesidad->nec_entidad;
        //$this->nec_documento = $this->necesidad->nec_documento;
        //$this->nec_direccion = $this->necesidad->nec_direccion;
        //$this->nec_titulo = $this->necesidad->nec_titulo;
    }

    public function actualizar()
    {
        //$this->validate();

        $this->necesidad->update([
            'nec_entidad' => $this->nec_entidad,
            //'nec_documento' => $this->nec_documento,
            //'nec_direccion' => $this->nec_direccion,
            //'nec_titulo'=> $this->nec_titulo,
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
