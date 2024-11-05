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
    public $equ_nombre;
    public $equ_tipo;
    public $equ_ciclo;


    protected $listeners = ['editar'];

    public function mount()
    {
        $this->equipo = new Equipos();
    }

    public function editar($id)
    {
        $this->equ_id = $id;
        $this->equipo = Equipos::find($id);
        $this->equ_codigo = $this->equipo->equ_codigo;
        $this->equ_nombre = $this->equipo->equ_nombre;
        $this->equ_tipo = $this->equipo->equ_tipo;
        $this->equ_ciclo = $this->equipo->equ_ciclo;

        $this->openModal(); // Abre el modal
        $this->curso_sem();
        $this->resetValidation();
    }

    public function actualizar()
    {
        $this->validate([
            'equ_codigo' => ['required', 'string', 'unique:equipos,equ_codigo,' . $this->equ_id . ',equ_id'],
            'equ_nombre' => ['required', 'string', 'unique:equipos,equ_nombre,' . $this->equ_id . ',equ_id'],
            'equ_tipo' => ['required', 'string'],
            'equ_ciclo' => ['required_if:equ_tipo,Curso'],
        ]);

        $this->equipo->equ_codigo = $this->equ_codigo;
        $this->equipo->equ_nombre = $this->equ_nombre;
        $this->equipo->equ_tipo = $this->equipo->equ_tipo;
        if ($this->equipo->equ_tipo == 'Curso') {
            $this->equipo->equ_ciclo = $this->equ_ciclo;
        }
        $this->equipo->save();
        $this->dispatch('EquipoActualizado');
        $this->dispatch('actualizado');
        $this->reset();
    }

    public function curso_sem()
    {
        $this->es_curso = $this->equ_tipo == 'Curso';
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
