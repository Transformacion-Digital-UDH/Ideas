<?php

namespace App\Livewire\Necesidades;

use App\Models\Necesidades;
use App\Models\User;
use App\Traits\GestionarModal;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CardNecesidades extends Component
{
    use GestionarModal;
    public $necesidades;
    public $necesidadIdDelete = null;

    public $showRps = false;
    public $responsable;

    protected $listeners = ['eliminado' => 'getNecesidades', 'guardado' => 'getNecesidades',  'actualizado' => 'getNecesidades'];

    public function mount()
    {
        $this->getNecesidades();
        $this->responsable = new User();
    }

    //visualizar la necesidad-modal
    public function verNecesidad($id)
    {
        $this->dispatch('ver', $id);
    }

    public function confirmDelete($id)
    {
        $this->necesidadIdDelete = $id;
        $this->openModal();
    }

    public function rps($id)
    {
        $this->responsable = User::find($id);
        $this->showRps = true;
    }

    public function eliminarNecesidad($id)
    {
        $this->dispatch('eliminarNecesidad', $id);
    }

    public function editarNecesidad($id)
    {
        $this->dispatch('editar', $id);
    }

    public function getNecesidades()
    {
        $this->necesidades = Necesidades::where('nec_estado', 1)
            ->where('user_id', Auth::id())
            ->orderBY('nec_created', 'desc')
            ->get();
    }

    public function es_editable($proceso)
    {
        return $proceso == 'En Espera' ? true : false;
    }

    public function render()
    {
        return view('livewire.necesidades.card-necesidades');
    }
}
