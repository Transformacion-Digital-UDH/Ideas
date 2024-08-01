<?php

namespace App\Livewire\Necesidades;

use Livewire\Component;
use App\Models\Necesidades;
use Illuminate\Support\Facades\Auth;


class ListaNecesidad extends Component
{

    public $necesidades;
    public $showModal = false;

    public function mount()
    {
        $this->actualizarNecesidades();
    }

    public function abrirModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function actualizarNecesidades()
    {
        $this->necesidades = Necesidades::where('user_id', Auth::id())
        ->orderBY('nec_created','desc')
        ->get();
    }

    public function render()
    {
        return view('livewire.necesidades.lista-necesidad',[
            'necesidades' => $this->necesidades,
        ]);
    }
}
