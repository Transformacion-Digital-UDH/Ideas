<?php

namespace App\Livewire\Proyectistas;

use Livewire\Component;
use App\Traits\GestionarModal;
use App\Models\User;

class VerProyectista extends Component
{
    use GestionarModal;
    public $proyectista;

    protected $listeners = ['ver'=>'ver'];

    public function mount()
    {
        $this->proyectista = new User();
    }

    public function ver($id)
    {
        $this->openModal();
        $this->proyectista = User::find($id);
    }
    public function closeModal()
    {
        $this->showModal=false;
    }
    public function render()
    {
        return view('livewire.proyectistas.ver-proyectista');
    }
}
