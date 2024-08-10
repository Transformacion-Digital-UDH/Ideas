<?php

namespace App\Livewire\Necesidades;

use App\Models\Necesidades;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class CrearNecesidad extends Component
{
    use WithFileUploads;

    public $es_institucion = true;
    public $showModal = false;

    public $nec_tipo;
    public $nec_entidad;
    public $nec_ruc;
    public $nec_dni;
    public $nec_email;
    public $nec_telefono;
    public $nec_direccion;
    public $nec_titulo;
    public $nec_descripcion;
    public $es_financiado;
    public $doc_nombre;
    public $user_id;


    protected $rules = [
        'nec_tipo' => ['required', 'string'],
        'nec_entidad' => ['nullable', 'string'],
        'nec_ruc' => ['nullable', 'string', 'min:11', 'max:11', 'required_if:nec_tipo,Empresa privada,Institución pública,ONG,Universidad,Instituto'],
        'nec_dni' => ['nullable', 'string', 'min:8', 'max:8', 'required_if:nec_tipo,Ciudadano'],
        'nec_email' => ['required', 'email'],
        'nec_telefono' => ['required', 'string', 'min:9', 'max:9'],
        'nec_direccion' => ['required', 'string', 'max:255'],
        'nec_titulo' => ['required', 'string', 'min:10', 'max:100'],
        'nec_descripcion' => ['required', 'string', 'min:20'],
        'es_financiado' => ['required'],
        'doc_nombre' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],
        /* 'file_2' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],
        'file_3' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],
        'file_4' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],*/
    ];

    public function mount()
    {
        $this->user_id = Auth::user()->id;
    }


    public function abrirModal()
    {
        $this->showModal = true;
    }

    public function guardarNecesidad()
    {
        $this->validate();
        $necesidad = new Necesidades();
        $necesidad->nec_tipo = $this->nec_tipo;
        $necesidad->nec_entidad = $this->nec_entidad;
        $necesidad->nec_titulo = $this->nec_titulo;
        $necesidad->nec_descripcion = $this->nec_descripcion;
        $necesidad->nec_email = $this->nec_email;
        $necesidad->nec_telefono = $this->nec_telefono;
        $necesidad->nec_direccion = $this->nec_direccion;
        $necesidad->es_financiado = $this->es_financiado;
        $necesidad->user_id = Auth::id();

        if ($this->nec_tipo == 'Ciudadano') {
            $necesidad->nec_documento = $this->nec_dni;
        } else {
            $necesidad->nec_documento = $this->nec_ruc;
        }
        $necesidad->save();
        $this->dispatch('necesidadGuardada');
        $this->reset();
    }

    public function ruc_dni()
    {
        $this->es_institucion = $this->nec_tipo !== 'Ciudadano';
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.necesidades.crear-necesidad');
    }
}
