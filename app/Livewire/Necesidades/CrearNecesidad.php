<?php

namespace App\Livewire\Necesidades;

use App\Models\Necesidades;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearNecesidad extends Component
{
    use WithFileUploads;

    public $es_institucion = true;
    public $showModal = false;

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


    protected $rules = [
        'tipo_institucion' => ['required', 'string'],
        'nombre_entidad' => ['nullable', 'string'],
        'ruc' => ['nullable', 'string', 'min:11', 'max:11'],
        'nombre_persona' => ['nullable', 'string'],
        'dni' => ['nullable', 'string', 'min:8', 'max:8'],
        'email' => ['required', 'email'],
        'telefono' => ['required', 'string', 'min:9', 'max:9'],
        'direccion' => ['required', 'string', 'max:255'],
        'problema' => ['required', 'string', 'min:10', 'max:100'],
        'descripcion' => ['required', 'string', 'min:20'],
        // 'es_financiado' => ['string', 'in:SI,NO'],
        'file_1' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],
        'file_2' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],
        'file_3' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],
        'file_4' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],
    ];

    public function mount()
    {
        $this->user_id = auth()->id();
    }


    public function abrirModal()
    {
        $this->showModal = true;
    }

    public function guardarNecesidad()
    {
        $this->validate();

        Necesidades::create([
            'nec_tipo' => $this->nec_tipo,
            'nec_entidad' => $this->nec_entidad,
            'nec_documento' => $this->nec_documento,
            'nec_titulo' => $this->nec_titulo,
            'nec_descripcion' => $this->nec_descripcion,
            'nec_email' => $this->nec_email,
            'nec_telefono' => $this->nec_telefono,
            'nec_direccion' => $this->nec_direccion,
            'es_financiado' => $this->es_financiado == '1' ? 'SI' : 'NO',
            'user_id' => $this->user_id,
        ]);
        $this->dispatch('guardado');
        $this->reset();
    }

    public function ruc_dni()
    {
        $this->es_institucion = $this->tipo_institucion !== 'Ciudadano';
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
