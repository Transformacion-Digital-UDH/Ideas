<?php

namespace App\Livewire\Necesidades;

use App\Models\Necesidades;
use Livewire\Component;
use Livewire\WithPagination;

class ListaNecesidades extends Component
{
    use WithPagination;

    protected $listeners = [
        'guardado' => 'getNecesidades',
        'actualizado' => 'getNecesidades',
    ];

    public function mount()
    {
        return $this->getNecesidades();
    }

    public function abrirModal($id)
    {
        $this->dispatch('curar', $id);
    }

    public function getNecesidades()
    {
        $necesidades = Necesidades::where('nec_estado', 1)->orderBy('nec_id', 'desc')->paginate(10);
        return $necesidades ?? [];
    }
    public function verNecesidad($id)
    {
        $this->dispatch('ver', $id);
    }

    public function render()
    {
        return view('livewire.necesidades.lista-necesidades', [
            'necesidades' => $this->getNecesidades()
        ]);
    }
}
