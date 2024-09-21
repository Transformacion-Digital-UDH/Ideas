<?php

namespace App\Livewire\Necesidades;

use App\Models\Documentos;
use Livewire\Component;
use App\Models\Necesidades;
use App\Traits\GestionarModal;
use Livewire\WithFileUploads;

class EditarNecesidad extends Component
{
    use GestionarModal, WithFileUploads;

    public $necesidad;
    public $documentos = [];
    public $es_institucion = true;

    public $nec_id;
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
    public $nec_proceso;

    public $files = [];
    public $n_docs = 0;

    protected $listeners = ['editar'];

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
        'files.*' => ['file', 'mimes:pdf,jpg,jpeg,png,docx', 'max:5048'],
    ];

    public function mount()
    {
        $this->necesidad = new Necesidades();
    }

    public function editar($id)
    {
        $this->openModal(); // Abre el modal

        $this->necesidad = Necesidades::find($id);
        $this->nec_id = $this->necesidad->nec_id;
        $this->nec_tipo = $this->necesidad->nec_tipo;
        $this->nec_email = $this->necesidad->nec_email;
        $this->nec_telefono = $this->necesidad->nec_telefono;
        $this->nec_direccion = $this->necesidad->nec_direccion;
        $this->nec_titulo = $this->necesidad->nec_titulo;
        $this->nec_descripcion = $this->necesidad->nec_descripcion;
        $this->es_financiado = $this->necesidad->es_financiado;
        $this->nec_proceso = $this->necesidad->nec_proceso;
        $this->getDocumentos();
        if ($this->nec_tipo == 'Ciudadano') {
            $this->es_institucion = false;
            $this->nec_dni = $this->necesidad->nec_documento;
            $this->nec_persona = $this->necesidad->nec_entidad;
        } else {
            $this->es_institucion = true;
            $this->nec_ruc = $this->necesidad->nec_documento;
            $this->nec_empresa = $this->necesidad->nec_entidad;
        }

        $this->resetValidation();
    }

    public function actualizar()
    {
        $this->validate();

        $necesidad = Necesidades::find($this->necesidad->nec_id);
        $necesidad->nec_tipo = $this->nec_tipo;
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
        return $this->nec_proceso === 'En Espera';
    }

    public function closeModal()
    {
        $this->reset();
        $this->resetValidation();
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.necesidades.editar-necesidad', [
            'isEditable' => $this->isEditable(),
        ]);
    }

    public function getDocumentos()
    {
        $this->documentos = Documentos::where('nec_id', $this->nec_id)
            ->where('doc_estado', 1)->get();
        $this->n_docs = $this->documentos ? count($this->documentos) : 0;
    }

    public function eliminar($file)
    {
        $doc = Documentos::where('doc_file', $file)->first();
        if ($doc) {
            $doc->doc_estado = 0;
            $doc->save();
            $this->getDocumentos();
        }
    }

    // Carga de Archivos
    public function agregarFile()
    {
        if (($this->n_docs + count($this->files)) < 4) {
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
