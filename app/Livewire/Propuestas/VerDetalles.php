<?php

namespace App\Livewire\Propuestas;

use App\Models\Postulaciones;
use App\Models\Propuestas;
use App\Models\TipoProyectos;
use App\Models\User;
use App\Traits\GestionarModal;
use Livewire\Component;

class VerDetalles extends Component
{
    use GestionarModal;

    public $propuesta;
    public $responsable = [];
    public $asignado = [];
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
        $this->extraerResponsable();
        $this->extraerAsignado();
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

    public function extraerResponsable()
    {
        $this->responsable = User::select('id', 'name', 'email', 'telefono')
            ->whereKey($this->propuesta->necesidad->responsable_id)
            ->first();
    }

    public function extraerAsignado()
    {
        $this->asignado = Postulaciones::with('postulante:id,name,email,telefono', 'equipo:equ_id,equ_nombre')
            ->where('pro_id', $this->propuesta->pro_id)
            ->where('pos_asignado', 1)
            ->where('pos_estado', 1)
            ->first();
    }
}
