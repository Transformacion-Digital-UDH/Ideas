<?php
use Livewire\Component;
use App\Models\Necesidades;

class EditarNecesidad extends Component
{
    public $nec_id, $nec_tipo, $nec_entidad, $nec_documento, $nec_titulo, $nec_descripcion, $nec_email, $nec_telefono, $nec_dirección, $es_financiado, $nec_proceso, $doc_nombre;
    public $showModal = false;

    public function editarNecesidad($id)
    {
        $necesidad = Necesidades::findOrFail($id);
        $this->nec_id = $necesidad->id;
        $this->nec_tipo = $necesidad->tipo;
        $this->nec_entidad = $necesidad->entidad;
        $this->nec_documento = $necesidad->documento;
        $this->nec_titulo = $necesidad->titulo;
        $this->nec_descripcion = $necesidad->descripcion;
        $this->nec_email = $necesidad->email;
        $this->nec_telefono = $necesidad->telefono;
        $this->nec_dirección = $necesidad->dirección;
        $this->es_financiado = $necesidad->es_financiado;
        $this->nec_proceso = $necesidad->proceso;
        $this->doc_nombre = $necesidad->doc_nombre;
        $this->showModal = true;
    }

    public function render()
    {
        return view('livewire.editar-necesidad');
    }
}