<?php

namespace App\Livewire\Necesidades;

use Livewire\Component;
use App\Models\Necesidades;
use App\Traits\GestionarModal;

class EditarNecesidad extends Component
{
    use GestionarModal;

    public $necesidad;
    public $es_institucion = true;
    
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
    protected $rules = [
        'nec_tipo' => ['required', 'string'],
        'nec_entidad' => ['nullable', 'string'],
        'nec_documento' => ['nullable', 'string', 'min:8', 'max:11'],
        'nec_email' => ['required', 'email'],
        'nec_telefono' => ['required', 'string', 'min:9', 'max:9'],
        'nec_direccion' => ['required', 'string', 'max:255'],
        'nec_titulo' => ['required', 'string', 'min:10', 'max:100'],
        'nec_descripcion' => ['required', 'string', 'min:20'],
        'doc_nombre' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],
       /* 'file_2' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],
        'file_3' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],
        'file_4' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],*/
    ];

    public function mount()
    {
        $this->necesidad = new Necesidades();
    }

    public function editar($id)
    {
        $this->openModal(); // Abre el modal
        
        $this->necesidad = Necesidades::find($id);
        $this->nec_tipo = $this->necesidad->nec_tipo;
        $this->nec_entidad = $this->necesidad->nec_entidad;
        $this->nec_documento = $this->necesidad->nec_documento;
        $this->nec_email = $this->necesidad->nec_email;
        $this->nec_telefono = $this->necesidad->nec_telefono;
        $this->nec_direccion = $this->necesidad->nec_direccion;
        $this->nec_titulo = $this->necesidad->nec_titulo;
        $this->nec_descripcion = $this->necesidad->nec_descripcion;
        $this->es_financiado = $this->necesidad->es_financiado;
        $this->doc_nombre = $this->necesidad->doc_nombre;
        //resetear la validación
        $this->resetValidation();

    }

    public function actualizar()
    {
        $this->validate();

        $this->necesidad->update([
            'nec_tipo' => $this->nec_tipo,
            'nec_entidad' => $this->nec_entidad,
            'nec_documento' => $this->nec_documento,
            'nec_email' => $this->nec_email,
            'nec_telefono' => $this->nec_telefono,
            'nec_direccion' => $this->nec_direccion,
            'nec_titulo' => $this->nec_titulo,
            'nec_descripcion' => $this->nec_descripcion,
            'es_financiado' => $this->es_financiado,
            
        ]);
        $this->dispatch('necesidadActualizada');
        $this->dispatch('actualizado');
        $this->reset();
    }

    public function ruc_dni()
    {
        $this->es_institucion = $this->nec_tipo!== 'Ciudadano';
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
