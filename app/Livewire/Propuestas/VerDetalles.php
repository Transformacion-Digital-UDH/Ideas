<?php

namespace App\Livewire\Propuestas;

use App\Models\Postulaciones;
use App\Models\Propuestas;
use App\Models\TipoProyectos;
use App\Traits\GestionarModal;
use Livewire\Component;

class VerDetalles extends Component
{
    use GestionarModal;

    public $propuesta;
    public $mostrarBtnPostular;

    protected $listeners = ['ver'];

    public function mount($mostrarBtnPostular = true)
    {
        $this->propuesta = new Propuestas();
        $this->mostrarBtnPostular = $mostrarBtnPostular;
    }

    public function ver($id)
    {
        $this->openModal(); // Abre el modal
        $this->propuesta = Propuestas::with('tipo_proyecto:tpro_id,tpro_nombre')->find($id);
        $validar = in_array($id, Postulaciones::postulaciones_ids());
        if ($validar) {
            $this->mostrarBtnPostular = false;
        }
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function abrirModalPostular($id)
    {
        $this->showModal = false;
        $this->dispatch('postular', $id);
    }

    public function render()
    {
        return view('livewire.propuestas.ver-detalles');
    }
}
