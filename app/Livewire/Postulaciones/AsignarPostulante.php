<?php

namespace App\Livewire\Postulaciones;

use App\Models\Necesidades;
use App\Models\Postulaciones;
use App\Models\Propuestas;
use App\Models\User;
use App\Traits\GestionarModal;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AsignarPostulante extends Component
{
    use GestionarModal;

    protected $listeners = ['asignar'];
    public $pro_id;
    public $oficial = false;
    public $propuesta;
    public $existeAsigando;
    public $confirmar = false;

    public $search;
    public $responsables;
    public $responsable_id;

    public function mount()
    {
        $this->propuesta = new Propuestas();
    }

    public function asignar($pro_id)
    {
        $this->pro_id = $pro_id;
        $this->propuesta = Propuestas::where('pro_proceso', 'Postulado')
            ->with(['postulantes' => function ($query) {
                $query->where('pos_estado', 1);
            }])->find($pro_id);

        $this->existeAsigando = Postulaciones::where('pro_id', $this->pro_id)
            ->where('pos_asignado', 1)->exists();

        $this->openModal();
    }

    public function cerrarModal()
    {
        $this->closeModal();
    }

    public function asignarPostulante($id)
    {
        exit;
        DB::beginTransaction();
        try {
            $postulacion = Postulaciones::findOrFail($id);
            $postulacion->pos_asignado = 1;
            $postulacion->save();
            $this->propuesta->pro_proceso = 'Asignado';
            $this->propuesta->save();
            DB::commit();
            $this->dispatch('finalizado');
            $this->existeAsigando = true;
        } catch (\Throwable $th) {
        }
    }

    public function confirmacion()
    {
        $this->confirmar = true;
    }

    public function cancelar()
    {
        $this->confirmar = false;
    }

    public function changeOficial()
    {
        $this->render();
    }

    public function xOficial()
    {
        $this->oficial = false;
    }

    public function saveResponsable()
    {
        $this->validate([
            'responsable_id' => ['required', 'exists:users,id'],
        ]);
        $this->propuesta->necesidad->update(
            ['responsable_id' => $this->responsable_id]
        );
        $this->propuesta->es_oficial = true;
        $this->propuesta->save();
        $this->render();
    }

    public function render()
    {
        $this->buscar();
        return view('livewire.postulaciones.asignar-postulante');
    }

    public function buscar()
    {
        $this->responsables = User::whereHas('roles', function ($query) {
            $query->whereIn('name', ['DOCENTE', 'PROYECTISTA', 'VRI', 'ESCUELA']);
        })
            ->where('name', 'like', '%' . $this->search . '%')
            ->get();
    }
}
