<?php

namespace App\Livewire\Curaciones;

use Livewire\Component;
use App\Models\Necesidades;
use App\Models\Propuestas;
use App\Traits\GestionarModal;
use Illuminate\Support\Facades\DB;

class EditarCurso extends Component
{
    use GestionarModal;
    public $propuesta;
    public $nec_id;
    public $pro_titulo;
    public $problematicas;
    public $pro_beneficiarios;
    public $pro_lugar;
    public $pro_descripcion;
    public $pro_id;

    protected $listeners = ['enviarId'=>'cargarPropuesta'];

    
    public function cargarPropuesta($id)
    {   
        
        $this->propuesta = Propuestas::find($id);
        $this->pro_id = $this->propuesta->id;
        $this->pro_titulo = $this->propuesta->pro_titulo;
        $this->problematicas = $this->propuesta->problematicas;
        $this->pro_beneficiarios = $this->propuesta->pro_beneficiarios;
        $this->pro_lugar = $this->propuesta->pro_lugar;
        $this->pro_descripcion = $this->propuesta->pro_descripcion;
        
        
    }
    public function actualizarCurso()
    {
        $this->validate([
            'pro_titulo' => ['required', 'string', 'max:50'],
            'pro_descripcion' => ['required', 'string', 'max:800'],
            'pro_lugar' => ['required', 'string', 'max:255'],
            'pro_beneficiarios' => ['required', 'string', 'max:255'],
            'problematicas' => ['required', 'string', 'max:800'],
        ]);

        DB::beginTransaction();
        try {
            $this->propuesta->update([
                'pro_titulo' => $this->pro_titulo,
                'problematicas' => $this->problematicas,
                'pro_beneficiarios' => $this->pro_beneficiarios,
                'pro_lugar' => $this->pro_lugar,
                'pro_descripcion' => $this->pro_descripcion,
            ]);

            DB::commit();
            $this->dispatch('cursoActualizado',$this->pro_id);
            
            $this->reset();
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Hubo un error al actualizar el curso.');
        }
    }

    public function render()
    {
        return view('livewire.curaciones.editar-curso');
    }
}
