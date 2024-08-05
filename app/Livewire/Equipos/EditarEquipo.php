<?php

namespace App\Livewire\Equipos;

use App\Models\Equipos;
use App\Traits\GestionarModal;
use Livewire\Component;

class EditarEquipo extends Component
{

    use GestionarModal;

    public $equipo;
    public $es_curso = true;

    public $equ_id;
    public $equ_codigo;
    public $equ_nombre; // Curso - Semillero
   // public $equ_descripcion;
    public $equ_tipo; 
    public $equ_ciclo;


    protected $listeners = ['editar'];
    protected $rules = [
        'equ_codigo' => ['required', 'string'],
        'equ_nombre' => ['required', 'string'],
        'equ_tipo' => ['required', 'string'],
        //'equ_ciclo' => ['required', 'string'],
    ];

    public function mount()
    {
        $this->equipo = new Equipos();
    }

    public function editar($id)
    {
        $this->openModal(); // Abre el modal
        $this->equipo = Equipos::find($id);
        $this->equ_codigo = $this->equipo->equ_codigo;
        $this->equ_nombre = $this->equipo->equ_nombre;
        $this->equ_tipo = $this->equipo->equ_tipo;
        $this->equ_ciclo = $this->equipo->equ_ciclo;
        
        $this->curso_sem();
        $this->resetValidation();
    }

    public function actualizar()
    {
        $this->validate();
        $this->equipo->update([
            'equ_codigo' => $this->equ_codigo,
            'equ_nombre' => $this->equ_nombre,
            'equ_tipo' => $this->equ_tipo,
            'equ_ciclo' => $this->equ_ciclo,
        ]);
        $this->dispatch('EquipoActualizado');
        $this->dispatch('actualizado');
        $this->reset();
    }
    public function curso_sem()
    {
        $this->es_curso = $this->equ_tipo =='Curso';
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
