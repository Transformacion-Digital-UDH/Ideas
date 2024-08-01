<?php

namespace App\Livewire\Necesidades;

use App\Models\Necesidades;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CardNecesidades extends Component
{
    public $necesidades;

    protected $listeners = ['guardado' => 'getNecesidades'];

    public function mount()
    {
        $this->necesidades = $this->getNecesidades();
    }

    public function verNecesidad($id)
    {
        $this->dispatch('ver', $id);
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
