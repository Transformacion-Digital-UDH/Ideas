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
    public $nec_empresa;
    public $nec_persona;
    public $nec_ruc;
    public $nec_dni;
    public $nec_email;
    public $nec_telefono;
    public $nec_direccion;
    public $nec_titulo;
    public $nec_descripcion;
    public $es_financiado;
    public $user_id;
    public $files = [''];

    protected $rules = [
        'nec_tipo' => ['required', 'string'],
        'nec_empresa' => ['nullable', 'string', 'max:80', 'required_if:nec_tipo,Empresa privada,Institución pública,ONG,Universidad,Instituto'],
        'nec_persona' => ['nullable', 'string', 'max:80', 'required_if:nec_tipo,Ciudadano'],
        'nec_ruc' => ['nullable', 'string', 'min:11', 'max:11', 'required_if:nec_tipo,Empresa privada,Institución pública,ONG,Universidad,Instituto'],
        'nec_dni' => ['nullable', 'string', 'min:8', 'max:8', 'required_if:nec_tipo,Ciudadano'],
        'nec_email' => ['required', 'email'],
        'nec_telefono' => ['required', 'string', 'min:9', 'max:9'],
        'nec_direccion' => ['required', 'string', 'max:255'],
        'nec_titulo' => ['required', 'string', 'min:10', 'max:100'],
        'nec_descripcion' => ['required', 'string', 'min:20'],
        'es_financiado' => ['required'],
        'files.*' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf.docx', 'max:5048'],
    ];

    public function mount()
    {
        $this->user_id = Auth::user()->id;
    }

    public function abrirModal()
    {
        $this->reset();
        $this->resetValidation();
        $this->showModal = true;
    }

    public function guardarNecesidad()
    {
        $this->validate();
        $necesidad = new Necesidades();
        $necesidad->nec_tipo = $this->nec_tipo;
        $necesidad->nec_titulo = $this->nec_titulo;
        $necesidad->nec_descripcion = $this->nec_descripcion;
        $necesidad->nec_email = $this->nec_email;
        $necesidad->nec_telefono = $this->nec_telefono;
        $necesidad->nec_direccion = $this->nec_direccion;
        $necesidad->es_financiado = $this->es_financiado;
        $necesidad->user_id = Auth::id();

        if ($this->nec_tipo == 'Ciudadano') {
            $necesidad->nec_documento = $this->nec_dni;
            $necesidad->nec_entidad = $this->nec_persona;
        } else {
            $necesidad->nec_documento = $this->nec_ruc;
            $necesidad->nec_entidad = $this->nec_empresa;
        }
        $necesidad->save();

        foreach ($this->files as $file) {
            if ($file) {
                $nombreoriginal = $file->getClientOriginalName();
                $filename = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('problemas', $filename);
                $necesidad->documentos()->create([
                    'doc_nombre' => $nombreoriginal,
                    'doc_file' => $filename,
                    'nec_id' => $necesidad->nec_id,
                ]);
            }
        }

        $this->dispatch('guardado');
        $this->resetValidation();
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

    // Carga de Archivos
    public function agregarFile()
    {
        if (count($this->files) < 4) {
            $this->files[] = '';
        }
    }

    public function quitarFile($index)
    {
        unset($this->files[$index]);
        $this->files = array_values($this->files);
        $this->resetValidation("files.$index");
    }
}
