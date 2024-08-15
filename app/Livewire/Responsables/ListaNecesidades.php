<?php

namespace App\Livewire\Responsables;

use App\Models\Necesidades;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class ListaNecesidades extends Component
{
    public $necesidades;

    public function render()
    {
        return view('livewire.responsables.lista-necesidades');
    }

    public function mount()
    {
        $this->necesidades = $this->getNecesidades();
    }

    public function getNecesidades()
    {
        $user = Auth::user();
        // dd($user); // Imprimir los datos del usuario y detener la ejecución

        return Necesidades::where('responsable_id', $user->id)
            ->where('nec_estado', 1)
            ->orderByDesc('nec_id')
            ->get();
    }


    public function verNecesidad($id)
    {
        $this->dispatch('ver', $id);
    }

    public function abriModalCorreo($id_necesidad)
    {
        $this->dispatch('verCorreo', $id_necesidad);
    }



}
