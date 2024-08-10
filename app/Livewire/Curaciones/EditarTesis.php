<?php

namespace App\Livewire\Curaciones;

use Livewire\Component;
use App\Models\Propuestas;
use App\Traits\GestionarModal;
use Illuminate\Support\Facades\DB;

class EditarTesis extends Component
{
    use GestionarModal;
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

    protected $listeners =['enviarId'=>'cargarPropuesta'];

    public function mount()
    {
        $this->propuestas = new Propuestas();
    }
    public function cargarPropuesta($id)
    {
        $this->propuestas = Propuestas::find($id);
        $this->nec_id = $this->propuestas->nec_id;
        $this->pro_lugar = $this->propuestas->pro_lugar;
        $this->pro_beneficiarios = $this->propuestas->pro_beneficiarios;
        $this->problematicas = $this->propuestas->problematicas;
        $this->pro_causas = $this->propuestas->pro_causas;
        $this->pro_consecuencias = $this->propuestas->pro_consecuencias;
        $this->pro_aportes = $this->propuestas->pro_aportes;
        $this->variable_1 = $this->propuestas->variable_1;
        $this->variable_2 = $this->propuestas->variable_2;
        $this->pro_titulo = $this->propuestas->pro_titulo;
        $this->pro_descripcion = $this->propuestas->pro_descripcion;

    }
    public function actualizarProyecto()
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
            $this->propuestas->update([
                'pro_lugar' => $this->pro_lugar,
                'pro_beneficiarios' => $this->pro_beneficiarios,
                'problematicas' => $this->problematicas,
                'pro_causas' => $this->pro_causas,
                'pro_consecuencias' => $this->pro_consecuencias,
                'pro_aportes' => $this->pro_aportes,
                'variable_1' => $this->variable_1,
                'variable_2' => $this->variable_2,
                'pro_titulo' => $this->pro_titulo,
                'pro_descripcion' => $this->pro_descripcion,
            ]);
            DB::commit();
            $this->dispatch('tesisActualizado',$this->pro_id);
                
            $this->reset();
        } catch (\Exception $e) {
                DB::rollBack();
                session()->flash('error', 'Hubo un error al actualizar el curso.');
        }

    }
    public function render()
    {
        return view('livewire.curaciones.editar-tesis');
    }
}
