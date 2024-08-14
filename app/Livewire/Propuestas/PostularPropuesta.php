<?php

namespace App\Livewire\Propuestas;

use App\Models\Equipos;
use App\Models\Postulaciones;
use App\Models\User;
use App\Rules\UnicaPostulacion;
use App\Traits\GestionarModal;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


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
        $this->resetExcept('postulacion');
        $this->resetValidation();
        $this->openModal();
        $this->pro_id = $id;
        $this->user_id = Auth::user()->id;
        $this->pos_semestre = $this->obtenerSemestre();
    }

    public function guardar()
    {
        $rules = [
            'pos_semestre' => ['required', 'string', 'max:25'],
            'pro_id' => ['required', new UnicaPostulacion],
            'pos_justificar' => ['required', 'string', 'min:10', 'max:255'],
        ];

        if (User::esRol('DOCENTE')) {
            $rules['pos_seccion'] = ['required', 'string', 'max:25'];
            $rules['equ_id'] = ['required', 'integer', 'exists:equipos,equ_id'];
        }

        $this->validate($rules);

        $this->postulacion->pos_semestre = $this->pos_semestre;
        $this->postulacion->pos_seccion = $this->pos_seccion;
        $this->postulacion->user_id = $this->user_id;
        $this->postulacion->pro_id = $this->pro_id;
        if (User::esRol('DOCENTE')) {
            $this->postulacion->equ_id = $this->equ_id;
            $this->postulacion->pos_justificar = $this->pos_justificar;
        }

        $this->postulacion->save();

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

    public function obtenerSemestre()
    {
        $mesActual = date('n');
        $anioActual = date('Y');
        if ($mesActual <= 2) {
            $semestre = 0;
        } elseif ($mesActual <= 7) {
            $semestre = 1;
        } else {
            $semestre = 2;
        }
        return $anioActual . '-' . $semestre;
    }
}
