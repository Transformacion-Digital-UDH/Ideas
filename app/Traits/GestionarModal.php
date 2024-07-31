<?php

namespace App\Traits;

trait GestionarModal
{
    // Controllar visivilidad del modal
    public $showModal = false;

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }
}
