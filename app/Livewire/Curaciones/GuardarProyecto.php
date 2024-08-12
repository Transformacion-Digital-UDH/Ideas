<?php

namespace App\Livewire\Curaciones;

use App\Models\Necesidades;
use App\Models\Propuestas;
use App\Models\TipoProyectos;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class GuardarProyecto extends Component
{
    public $propuestas;
    public $tipoProyectos;
    public $nec_id;
    public $pro_titulo;
    public $pro_descripcion;
    public $proy_id;
    public $tpro_id;
    public $pro_justificacion;

    protected $listeners = ['enviarId' => 'recibirId'];

    public function mount()
    {
        $this->tipoProyectos = TipoProyectos::where('tpro_estado', 1)->get();
        $this->propuestas = new Propuestas();
    }

    public function curarProyecto()
    {
        $this->validate([
            'pro_titulo' => ['required', 'string', 'max:255'],
            'pro_descripcion' => ['required', 'string', 'max:800'],
            // 'proy_id' => ['required', 'exists:proyectistas,proy_id'],
            'tpro_id' => ['required', 'exists:tipo_proyectos,tpro_id'],
            'pro_justificacion' => ['required', 'string', 'max:800'],
        ]);

        DB::beginTransaction();
        try {
            $propuestas = new Propuestas();
            $propuestas->pro_titulo = $this->pro_titulo;
            $propuestas->pro_descripcion = $this->pro_descripcion;
            $propuestas->pro_justificacion = $this->pro_justificacion;
            //$propuestas->proyectista_id = $this->proy_id;
            $propuestas->tpro_id = $this->tpro_id;
            $propuestas->pro_tipo = 'Proyecto';
            $propuestas->nec_id = $this->nec_id;
            $propuestas->curador_id = Auth::user()->id;
            $propuestas->save();

            Necesidades::where('nec_proceso', 'En Espera')->find($this->nec_id)
            ->update(['nec_proceso' => 'Curado']);

            DB::commit();
            redirect(route('propuestas'));
            $this->reset();
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
