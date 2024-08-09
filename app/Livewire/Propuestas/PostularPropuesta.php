<?php

namespace App\Livewire\Propuestas;

use App\Models\Equipos;
use App\Models\Postulaciones;
use App\Rules\UnicaPostulacion;
use App\Traits\GestionarModal;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class PostularPropuesta extends Component
{
    use GestionarModal;

    public $postulacion;

    public $pos_semestre;
    public $pos_seccion;
    public $user_id;
    public $pro_id;
    public $equ_id;
    public $pos_justificar;

    protected $listeners = ['postular'];

    public function mount()
    {
        $this->postulacion = new Postulaciones();
    }

    public function postular($id)
    {
        $this->openModal(); // Abre el modal
        $this->pro_id = $id;
        $this->user_id = Auth::user()->id;
        $this->pos_semestre = $this->getSemestre();
    }

    public function guardar()
    {
        $this->validate([
            'pos_semestre' => ['required', 'string', 'max:25'],
            'pro_id' => ['required', new UnicaPostulacion],
            // Agregar mas reglas de validacion
        ]);

        $this->postulacion->create([
            'pos_semestre' => $this->pos_semestre,
            'pos_seccion' => $this->pos_seccion,
            'user_id' => $this->user_id,
            'pro_id' => $this->pro_id,
            'equ_id' => $this->equ_id,
            'pos_justificar' => $this->pos_justificar
        ]);

        $this->dispatch('guardado');
        $this->reset();
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        $equipos = Equipos::where('equ_estado', 1)->get();
        return view('livewire.propuestas.postular-propuesta', compact('equipos'));
    }

    public function getSemestre()
    {
        return '2024-2';
        // validar a que semestre pertenece
    }
}
