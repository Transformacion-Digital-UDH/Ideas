<?php

namespace App\Livewire\Curaciones;

use App\Http\Controllers\PropuestasController;
use App\Models\Necesidades;
use App\Models\Propuestas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class GuardarCurso extends Component
{
    public $propuestas;
    public $nec_id;
    public $pro_titulo;
    public $pro_lugar;
    public $pro_descripcion;

    protected $listeners = ['enviarId' => 'recibirId'];

    public function mount()
    {
        $this->propuestas = new Propuestas();
    }

    public function curarNecesidad()
    {
        $this->validate([
            'pro_titulo' => ['required', 'string', 'max:255'],
            'pro_descripcion' => ['required', 'string', 'max:800'],
            'pro_lugar' => ['required', 'string', 'max:255'],
        ]);

        DB::beginTransaction();
        $propuestas = new Propuestas();
        $propuestas->pro_titulo = $this->pro_titulo;
        $propuestas->pro_lugar = $this->pro_lugar;
        $propuestas->pro_descripcion = $this->pro_descripcion;
        $propuestas->pro_proceso = 'En Postulación';
        $propuestas->pro_tipo = 'Curso';
        $propuestas->nec_id = $this->nec_id;
        $propuestas->curador_id = Auth::user()->id;
        $propuestas->save();
        $codigo = PropuestasController::codigoUnico($propuestas->pro_id . 'CUR');
        $propuestas->pro_codigo = $codigo;
        $propuestas->save();
        Necesidades::where('nec_proceso', 'En Espera')
            ->where('nec_id', $this->nec_id)
            ->update(['nec_proceso' => 'Curado']);

        DB::commit();
        redirect(route('propuestas'));
        $this->reset();
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
        return view('livewire.curaciones.guardar-curso');
    }
}
