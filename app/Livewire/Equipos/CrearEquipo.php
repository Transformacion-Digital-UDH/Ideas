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
        'equ_codigo' => ['required','string'],
        'equ_nombre' => ['required','string'],
        //'equ_descripcion' => ['required','string', 'min: 20','max:150'],
        'equ_tipo' => ['required','string'],
        //'equ_ciclo' => ['required','string'],

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

        Equipos::create([
            'equ_codigo' => $this->equ_codigo,
            'equ_nombre' => $this->equ_nombre,
            // 'equ_descripcion' => $this->equ_descripcion,
            'equ_tipo' => $this->equ_tipo,
            'equ_ciclo' => $this->equ_ciclo,
        ]);
        $this->dispatch('guardado');
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
        return view('livewire.equipos.crear-equipo');
    }
}
