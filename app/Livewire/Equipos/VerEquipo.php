<?php

namespace App\Livewire\Equipos;

use App\Models\Equipos;
use App\Traits\GestionarModal;
use Livewire\Component;

class VerEquipo extends Component
{
    use GestionarModal;

    public $equipo;

    protected $listeners = ['ver'];

    public function mount()
    {
        $this->equipo = new Equipos();
    }

    public function ver($id)
    {
        $this->openModal();
        $this->equipo = Equipos::find($id);
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.equipos.ver-equipo');
    }
}
