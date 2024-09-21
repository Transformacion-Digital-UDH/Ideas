<?php

namespace App\Livewire\Necesidades;

use App\Models\Documentos;
use Livewire\Component;
use App\Models\Necesidades;
use App\Traits\GestionarModal;
use Illuminate\Support\Facades\File;

class VerNecesidad extends Component
{
    use GestionarModal;

    public $necesidad;
    public $documentos = [];

    protected $listeners = ['ver'];

    public function mount()
    {
        $this->necesidad = new Necesidades();
    }

    public function ver($id)
    {
        $this->openModal();
        $this->necesidad = Necesidades::with('propuestas')->find($id);
        $this->getDocumentos();
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

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.necesidades.ver-necesidad');
    }

    public function getDocumentos()
    {
        $this->documentos = Documentos::where('doc_estado', 1)
            ->where('nec_id', $this->necesidad->nec_id)
            ->get();
    }
}
