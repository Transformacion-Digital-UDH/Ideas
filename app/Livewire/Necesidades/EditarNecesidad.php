<?php

namespace App\Livewire\Necesidades;

use App\Models\Necesidades;
use Livewire\Component;
use App\Traits\GestionarModal;

class EditarNecesidad extends Component
{
    use GestionarModal; 

    public $necesidad;
    public $nec_id;
    public $nec_tipo;
    public $nec_entidad;
    public $nec_documento;
    public $nec_titulo;
    public $nec_descripcion;
    public $nec_email;
    public $nec_telefono;
    public $nec_direccion;
    public $es_financiado;
    public $nec_proceso;

    protected $listeners = ['editar'];

    protected $rules = [
        'nec_tipo' => 'required|string|max:255',
        'nec_entidad' => 'required|string|max:255',
        'nec_documento' => 'required|string|max:11',
        'nec_titulo' => 'required|string|max:255',
        'nec_descripcion' => 'required|string|max:255',
        'nec_email' => 'required|email',
        'nec_telefono' => 'required|string|max:11',
        'nec_direccion' => 'required|string|max:255',
        'es_financiado' => 'required|boolean',
        'nec_proceso' => 'required|string|max:255',
    ];

    public function mount()
    {
        $this->necesidad = new Necesidades();
    }

    public function editar($id)
    {
        $this->openModal(); // Abre el modal
        $this->necesidad = Necesidades::find($id);
        if ($this->necesidad) {
            $this->nec_id = $this->necesidad->id;
            $this->nec_tipo = $this->necesidad->nec_tipo;
            $this->nec_entidad = $this->necesidad->nec_entidad;
            $this->nec_documento = $this->necesidad->nec_documento;
            $this->nec_titulo = $this->necesidad->nec_titulo;
            $this->nec_descripcion = $this->necesidad->nec_descripcion;
            $this->nec_email = $this->necesidad->nec_email;
            $this->nec_telefono = $this->necesidad->nec_telefono;
            $this->nec_direccion = $this->necesidad->nec_direccion;
            $this->es_financiado = $this->necesidad->es_financiado;
            $this->nec_proceso = $this->necesidad->nec_proceso;
        }
    }

    public function actualizar()
    {
        $this->validate();

        $this->necesidad->update([
            'nec_tipo' => $this->nec_tipo,
            'nec_entidad' => $this->nec_entidad,
            'nec_documento' => $this->nec_documento,
            'nec_titulo' => $this->nec_titulo,
            'nec_descripcion' => $this->nec_descripcion,
            'nec_email' => $this->nec_email,
            'nec_telefono' => $this->nec_telefono,
            'nec_direccion' => $this->nec_direccion,
            'es_financiado' => $this->es_financiado,
            'nec_proceso' => $this->nec_proceso,
        ]);

        $this->dispatch('actualizado');
        $this->reset();
        $this->closeModal();
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
