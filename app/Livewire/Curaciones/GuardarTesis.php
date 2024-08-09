<?php

namespace App\Livewire\Curaciones;

use App\Models\Necesidades;
use App\Models\Propuestas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;


class GuardarTesis extends Component
{

    public $propuestas;
    public $nec_id;
    public $pro_lugar;
    public $pro_beneficiarios;
    public $problematicas;
    public $pro_causas;
    public $pro_consecuencias;
    public $pro_aportes;
    public $variable_1;
    public $variable_2;

    public $pro_titulo;
    public $pro_descripcion;

    protected $listeners = ['enviarId' => 'recibirId'];

    public function mount()
    {
        $this->propuestas = new Propuestas();
    }

    public function curarTesis()
    {
        $this->validate([
            'pro_lugar' => ['required', 'string', 'max:255'],
            'pro_beneficiarios' => ['required', 'string', 'max:255'],
            'problematicas' => ['required', 'string', 'max:800'],
            'pro_causas' => ['required', 'string', 'max:200'],
            'pro_consecuencias' => ['required', 'string', 'max:200'],
            'pro_aportes' => ['required', 'string', 'max:200'],
            'variable_1' => ['required', 'string', 'max:50'],
            'variable_2' => ['required', 'string', 'max:50'],

            'pro_titulo' => ['required', 'string', 'max:255'],
            'pro_descripcion' => ['required', 'string', 'max:800'],
        ]);

        DB::beginTransaction();
        try {
            $propuestas = new Propuestas();
            $propuestas->pro_lugar = $this->pro_lugar;
            $propuestas->pro_beneficiarios = $this->pro_beneficiarios;
            $propuestas->problematicas = $this->problematicas;
            $propuestas->pro_causas = $this->pro_causas;
            $propuestas->pro_consecuencias = $this->pro_consecuencias;
            $propuestas->pro_aportes = $this->pro_aportes;
            $propuestas->variable_1 = $this->variable_1;
            $propuestas->variable_2 = $this->variable_2;

            $propuestas->pro_titulo = $this->pro_titulo;
            $propuestas->pro_descripcion = $this->pro_descripcion;
            $propuestas->pro_tipo = 'Tesis';
            $propuestas->nec_id = $this->nec_id;
            $propuestas->curador_id = Auth::user()->id;
            $propuestas->save();
            Necesidades::find($this->nec_id)
                ->update(['nec_proceso' => 'En Revisión']);

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
        return view('livewire.curaciones.guardar-tesis');
    }
}
