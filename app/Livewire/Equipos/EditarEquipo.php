<?php

namespace App\Livewire\Equipos;

use App\Models\Equipos;
use App\Traits\GestionarModal;
use Livewire\Component;

class EditarEquipo extends Component
{

    use GestionarModal;

    public $equipo;
    
    public $equ_id;
    public $equ_codigo;
    public $equ_nombre; // Curso - Semillero
    public $equ_descripcion;
    public $equ_tipo; 
    public $equ_ciclo;
    public $equ_estado;
    public $equ_created;
    public $equ_updated;

    protected $listeners = ['editar'];

    public function mount()
    {
        $this->equipo = new Equipos();
    }

    public function editar($id)
    {
        $this->openModal(); // Abre el modal
        $this->equ_id = $id;
        $this->equipo = Equipos::find($id);
        $this->equ_codigo = $this->equipo->equ_codigo;
    }

    public function actualizar()
    {
        $this->equipo->update([
            'nec_entidad' => $this->nec_entidad,
        ]);

        $this->dispatch('actualizado');
        $this->reset();
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.equipos.editar-equipo');
    }
}
