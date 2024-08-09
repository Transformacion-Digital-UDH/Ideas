<?php

namespace App\Livewire\Curaciones;

use Livewire\Component;
use App\Models\Propuestas;
use App\Traits\GestionarModal;
use Illuminate\Support\Facades\DB;

class EditarProyecto extends Component
{
    use GestionarModal;

    public $propuesta;
    public $nec_id;
    public $pro_titulo;
    public $pro_descripcion;
   // public $proy_id;
    public $pro_justificacion;
    public $pro_id;
    
    protected $listeners = ['enviarId'=>'cargarPropuesta'];

    public function cargarPropuesta($id)
    {
        $this->propuesta = Propuestas::find($id);
       // $this->proy_id = $this->propuesta->id;
        $this->pro_titulo = $this->propuesta->pro_titulo;
        $this->pro_descripcion = $this->propuesta->pro_descripcion;
        //$this->proy_id= $this->propuesta->proy_id;
        $this->pro_justificacion = $this->propuesta->pro_justificacion;

    }
    public function actualizarProyecto()
    {
        $this->validate([
            'pro_titulo' => ['required', 'string', 'max:255'],
            'pro_justificacion' => ['required', 'string', 'max:800'],
            'pro_descripcion' => ['required', 'string', 'max:800'],
        ]);

        DB::beginTransaction();
        try {
            $this->propuesta->update([
                'pro_titulo' => $this->pro_titulo,
                'pro_descripcion' => $this->pro_descripcion,
                'pro_justificacion' => $this->pro_justificacion,
            ]);

            DB::commit();
            $this->dispatch('proyActualizado',$this->pro_id);
            $this->reset();
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }

    public function render()
    {
        return view('livewire.curaciones.editar-proyecto');
    }
}
