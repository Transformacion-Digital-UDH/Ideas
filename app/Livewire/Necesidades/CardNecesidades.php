<?php

namespace App\Livewire\Necesidades;

use App\Models\Necesidades;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CardNecesidades extends Component
{
    public $necesidades;

    protected $listeners = ['guardado' => 'getNecesidades',  'necesidadActualizada' => 'getNecesidades'];

    public function mount()
    {
        $this->getNecesidades();
    }

    //visualizar la necesidad-modal
    public function verNecesidad($id)
    {
        $this->dispatch('ver', $id);
    }

    public function eliminarNecesidad($id)
    {
        // Encuentra la necesidad por ID
        $necesidad = Necesidades::find($id);

        if ($necesidad) {
            // Si se encuentra la necesidad, elimínala
            $necesidad->nec_estado = 0;
            $necesidad->save();
            // Actualiza la lista de necesidades después de la eliminación
            $this->getNecesidades();
        }
    }

    public function editarNecesidad($id)
    {
        $this->dispatch('editar', $id);
    }

    public function getNecesidades()
    {
        $this->necesidades = Necesidades::where('nec_estado', 1)->where('user_id', Auth::id())
            ->orderBY('nec_created', 'desc')
            ->get();
    }

    public function es_editable($proceso)
    {
        return $proceso == 'Pendiente' ? true : false;
    }

    public function render()
    {
        return view('livewire.necesidades.card-necesidades');
    }
}
