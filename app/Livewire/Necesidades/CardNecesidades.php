<?php

namespace App\Livewire\Necesidades;

use App\Models\Necesidades;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class CardNecesidades extends Component
{
    public $necesidades;

    protected $listeners = ['guardado' => 'getNecesidades'];

    public function mount()
    {
        $this->necesidades = $this->getNecesidades();
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
            $necesidad->delete();

            // Actualiza la lista de necesidades después de la eliminación
            $this->getNecesidades();

            // mensaje de éxito
            Session::flash('message', 'Necesidad eliminada correctamente.');
        } 
    }

    public function getNecesidades()
    {
        $necesidades = Necesidades::where('user_id', Auth::id())
            ->orderBY('nec_created', 'desc')
            ->get();
        return $necesidades ?? [];
    }

    public function render()
    {
        return view('livewire.necesidades.card-necesidades');
    }
}
