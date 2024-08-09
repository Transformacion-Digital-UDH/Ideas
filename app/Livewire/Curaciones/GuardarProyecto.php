<?php

namespace App\Livewire\Curaciones;

use App\Models\Necesidades;
use App\Models\Propuestas;
use App\Models\Proyectistas;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class GuardarProyecto extends Component
{
    public $propuestas;
    public $nec_id;
    public $pro_titulo;
    public $pro_descripcion;
    public $proy_id;
    public $pro_justificacion;

    protected $listeners = ['enviarId' => 'recibirId'];

    public function mount()
    {
        $this->propuestas = new Propuestas();
    }

    public function curarProyecto()
    {
        $this->validate([
            'pro_titulo' => ['required', 'string', 'max:255'],
            'pro_descripcion' => ['required', 'string', 'max:800'],
            'proy_id' => ['required', 'exists:proyectistas,proy_id'],
            'pro_justificacion' => ['required', 'string', 'max:800'],
        ]);
        $propuestas = new Propuestas();
        $propuestas->pro_titulo = $this->pro_titulo;
        $propuestas->pro_descripcion = $this->pro_descripcion;
        $propuestas->pro_justificacion = $this->pro_justificacion;
        $propuestas->proyectista_id = $this->proy_id;
        $propuestas->pro_tipo = 'Proyecto';
        $propuestas->nec_id = $this->nec_id;
        $propuestas->curador_id = Auth::user()->id;
        $propuestas->save();
        Necesidades::find($this->nec_id)
            ->update(['nec_proceso' => 'En Revisión']);

        DB::commit();
        redirect(route('propuestas'));
        $this->reset();
        DB::beginTransaction();
        try {
 
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }

    public function recibirId($nec_id)
    {
        $this->nec_id = $nec_id;
    }

    public function render()
    {
        $proyectistas = User::role('PROYECTISTA')->where('estado', 1)->get();
        return view('livewire.curaciones.guardar-proyecto', compact('proyectistas'));
    }
}
