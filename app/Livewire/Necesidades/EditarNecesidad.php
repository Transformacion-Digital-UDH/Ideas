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
    public $nec_persona;
    public $nec_ruc;
    public $nec_dni;
    public $nec_email;
    public $nec_telefono;
    public $nec_direccion;
    public $nec_titulo;
    public $nec_descripcion;
    public $es_financiado;
    public $nec_proceso;

    protected $listeners = ['editar'];

    protected $rules = [
        'nec_tipo' => ['required', 'string'],
        'nec_entidad' => ['nullable', 'string', 'max:80', 'required_if:nec_tipo,Empresa privada,Institución pública,ONG,Universidad,Instituto'],
        'nec_persona' => ['nullable', 'string', 'max:80', 'required_if:nec_tipo,Ciudadano'],
        'nec_ruc' => ['nullable', 'string', 'min:11', 'max:11', 'required_if:nec_tipo,Empresa privada,Institución pública,ONG,Universidad,Instituto'],
        'nec_dni' => ['nullable', 'string', 'min:8', 'max:8', 'required_if:nec_tipo,Ciudadano'],
        'nec_email' => ['required', 'email'],
        'nec_telefono' => ['required', 'string', 'min:9', 'max:9'],
        'nec_direccion' => ['required', 'string', 'max:255'],
        'nec_titulo' => ['required', 'string', 'min:10', 'max:100'],
        'nec_descripcion' => ['required', 'string', 'min:20'],
        'es_financiado' => ['required'],
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
        $this->nec_email = $this->necesidad->nec_email;
        $this->nec_telefono = $this->necesidad->nec_telefono;
        $this->nec_direccion = $this->necesidad->nec_direccion;
        $this->nec_titulo = $this->necesidad->nec_titulo;
        $this->nec_descripcion = $this->necesidad->nec_descripcion;
        $this->es_financiado = $this->necesidad->es_financiado;
        $this->nec_proceso = $this->necesidad->nec_proceso;

        if ($this->nec_tipo == 'Ciudadano') {
            $this->nec_dni = $this->$this->necesidad->nec_documento;
            $this->nec_entidad = $this->$this->necesidad->nec_entidad;
        } else {
            $this->nec_ruc = $this->$this->necesidad->nec_documento;
            $this->nec_persona = $this->$this->necesidad->nec_entidad;
        }

        $this->resetValidation();
    }

    public function actualizar()
    {
        $this->validate();

        $necesidad = Necesidades::find($this->necesidad->nec_id);
        $necesidad->nec_tipo = $this->nec_tipo;
        $necesidad->nec_entidad = $this->nec_entidad;
        $necesidad->nec_titulo = $this->nec_titulo;
        $necesidad->nec_descripcion = $this->nec_descripcion;
        $necesidad->nec_email = $this->nec_email;
        $necesidad->nec_telefono = $this->nec_telefono;
        $necesidad->nec_direccion = $this->nec_direccion;
        $necesidad->es_financiado = $this->es_financiado;
        if ($this->nec_tipo == 'Ciudadano') {
            $necesidad->nec_documento = $this->nec_dni;
            $necesidad->nec_entidad = $this->nec_persona;
        } else {
            $necesidad->nec_documento = $this->nec_ruc;
            $necesidad->nec_entidad = $this->nec_entidad;
        }
        $necesidad->save();

        $this->dispatch('actualizado');
        $this->resetValidation();
        $this->reset();
    }

    public function ruc_dni()
    {
        $this->es_institucion = $this->nec_tipo !== 'Ciudadano';
    }

    public function isEditable()
    {
        return $this->nec_proceso === 'Pendiente';
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.necesidades.editar-necesidad', [
            'isEditable' => $this->isEditable(),
        ]);
    }
}
