<?php

namespace App\Livewire\Propuestas;

use Livewire\Component;
use App\ModelS\Propuestas;
use App\Traits\GestionarModal;
use App\Models\Necesidades;

class EditarPropuesta extends Component
{
    use GestionarModal;
    public $propuesta;
    public $necesidad;
   

    protected $listeners = ['editar'=>'editar', 'cursoActualizado' => 'closeModal',
    'proyActualizado'=>'closeModal','tesisActualizado'=>'closeModal'];

    public function mount()
    {
        $this->propuesta = new Propuestas();
        $this->necesidad = new Necesidades();
    }
    public function editar($id)
    {
        $this->openModal();
        $this->propuesta = Propuestas::find($id);
        $this->necesidad = Necesidades::find($this->propuesta->nec_id);
        $this->dispatch('enviarId',$this->propuesta->pro_id);
    }

    public function closeModal()
    {
        $this->showModal = false;
    }
    public function render()
    {
        return view('livewire.propuestas.editar-propuesta');
    }
}
