<?php

namespace App\Livewire\Propuestas;

use App\Models\Documentos;
use Livewire\Component;
use App\ModelS\Propuestas;
use App\Traits\GestionarModal;
use App\Models\Necesidades;
use Illuminate\Support\Facades\File;

class EditarPropuesta extends Component
{
    use GestionarModal;
    public $propuesta;
    public $necesidad;
    public $documentos = [];

    public $pro_titulo;
    public $pro_descripcion;
    public $pro_lugar;
    public $pro_beneficiarios;
    public $pro_tratar;
    public $pro_causas;
    public $pro_consecuencias;
    public $pro_justificacion;
    public $pro_aportes;
    public $problematicas;
    public $variable_1;
    public $variable_2;
    public $pro_tipo;
    public $pro_estado;



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
        $this->pro_lugar = $this->propuesta->pro_lugar;
        $this->pro_beneficiarios = $this->propuesta->pro_beneficiarios;
        $this->pro_tratar = $this->propuesta->pro_tratar;
        $this->pro_causas = $this->propuesta->pro_causas;
        $this->pro_consecuencias = $this->propuesta->pro_consecuencias;
        $this->pro_justificacion = $this->propuesta->pro_justificacion;
        $this->pro_aportes = $this->propuesta->pro_aportes;
        $this->problematicas = $this->propuesta->problematicas;
        $this->variable_1 = $this->propuesta->variable_1;
        $this->variable_2 = $this->propuesta->variable_2;
        $this->pro_tipo = $this->propuesta->pro_tipo;
        $this->pro_estado = $this->propuesta->pro_estado;
        $this->necesidad = Necesidades::find($this->propuesta->nec_id);
        $this->getDocumentos();
    }

    public function actualizarPropuesta()
    {
        $this->validate([
            'pro_titulo' => ['required', 'string', 'max:255'],
            'pro_descripcion' => ['required', 'string', 'max:800'],
        ]);
        $this->propuesta->pro_titulo = $this->pro_titulo;
        $this->propuesta->pro_descripcion = $this->pro_descripcion;
        $this->propuesta->pro_lugar = $this->pro_lugar;
        $this->propuesta->pro_beneficiarios = $this->pro_beneficiarios;
        $this->propuesta->pro_tratar = $this->pro_tratar;
        $this->propuesta->pro_causas = $this->pro_causas;
        $this->propuesta->pro_consecuencias = $this->pro_consecuencias;
        $this->propuesta->pro_justificacion = $this->pro_justificacion;
        $this->propuesta->pro_aportes = $this->pro_aportes;
        $this->propuesta->problematicas = $this->problematicas;
        $this->propuesta->variable_1 = $this->variable_1;
        $this->propuesta->variable_2 = $this->variable_2;
        $this->propuesta->pro_tipo = $this->pro_tipo;
        $this->propuesta->pro_estado = $this->pro_estado;
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

    public function getDocumentos()
    {
        $this->documentos = Documentos::where('doc_estado', 1)
            ->where('nec_id', $this->necesidad->nec_id)->get();
    }

    public function descargar($file)
    {
        $doc = Documentos::where('doc_file', $file)->where('doc_estado', 1)->first();
        if ($doc) {
            $name = $doc->doc_nombre;
            $file = $doc->doc_file;
            $filePath = storage_path('app/problemas/' . $file);
            if (File::exists($filePath)) {
                return response()->download($filePath, $name);
            }
        }
    }
}
