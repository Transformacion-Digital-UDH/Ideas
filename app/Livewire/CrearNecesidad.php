<?php

namespace App\Livewire;

use App\Models\Necesidades;
use App\Models\Documentos;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearNecesidad extends Component
{
    use WithFileUploads;
    public $showModal = false;
    public $nec_tipo;
    public $nec_entidad;
    public $nec_documento;
    public $nec_titulo;
    public $nec_descripcion;
    public $nec_email;
    public $nec_telefono;
    public $nec_dirección;
    public $es_financiado;
    public $nec_proceso;
    public $doc_nombre;

    protected $rules = [
        'nec_tipo' => 'required|string|max:255',
        'nec_entidad' => 'required|string|max:255',
        'nec_documento' => 'required|string|max:11',
        'nec_titulo' => 'required|string|max:255',
        'nec_descripcion' => 'required|string|max:255',
        'nec_email' => 'required|email',
        'nec_telefono' => 'required|string|max:11',
        'nec_dirección' => 'required|string|max:255',
        'es_financiado' => 'required|boolean',
        'nec_proceso' => 'required|string|max:255',
        'doc_nombre' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],
    ];

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
            'nec_dirección' => $this->nec_dirección,
            'es_financiado' => $this->es_financiado ?? 'NO',
            'nec_proceso' => $this->nec_proceso,
        ]);

        if ($this->doc_nombre) {
            $rutaArchivo = $this->doc_nombre->store('documentos');
            Documentos::create([
                'nec_id' => $this->nec_documento,
                'doc_nombre' => $rutaArchivo,
            ]);
        }

        $this->reset(['showModal', 'necesidad_nombre', 'necesidad_descripcion']);
    }

    

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.crear-necesidad');
    }
}
