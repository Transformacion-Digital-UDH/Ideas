<?php

namespace App\Livewire\Equipos;

use Livewire\Component;
use App\Models\Equipos;

class CrearEquipo extends Component
{
    public $es_curso = true;
    public $showModal = false;

    public $equ_codigo;
    public $equ_nombre;
    public $equ_descripcion;
    public $equ_tipo;
    public $equ_ciclo;

    protected $rules = [
        'equ_codigo' => ['required', 'string', 'unique:equipos,equ_codigo'],
        'equ_nombre' => ['required', 'string', 'unique:equipos,equ_nombre'],
        'equ_tipo' => ['required', 'string'],
        'equ_ciclo' => ['required_if:equ_tipo,Curso'],
    ];

    public function mount()
    {
        $this->equ_tipo = '';
    }

    public function abrirModal()
    {
        $this->showModal = true;
    }

    public function guardarEquipo()
    {
        $this->validate();
        $equipo = new Equipos();
        $equipo->equ_codigo = $this->equ_codigo;
        $equipo->equ_nombre = $this->equ_nombre;
        $equipo->equ_descripcion = $this->equ_descripcion;
        $equipo->equ_tipo = $this->equ_tipo;
        if ($this->equ_tipo == 'Curso') {
            $equipo->equ_ciclo = $this->equ_ciclo;
        }
        $equipo->save();
        $this->dispatch('guardado');
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
        return view('livewire.equipos.crear-equipo');
    }
}
