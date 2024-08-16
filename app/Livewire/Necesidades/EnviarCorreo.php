<?php

namespace App\Livewire\Necesidades;

use Livewire\Component;
use App\Models\Necesidades;
use App\Traits\GestionarModal;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificacionCorreo;

class EnviarCorreo extends Component
{
    use GestionarModal;

    public $necesidad;
    public $subject;
    public $emailDestinatario;
    public $message;
    public $showModal = false;


    protected $listeners = ['verCorreo'];

    public function mount()
    {
        $this->necesidad = new Necesidades();
    }

    public function verCorreo($id_necesidad)
    {
        $this->openModal();
        $this->necesidad = Necesidades::find($id_necesidad);
        $this->emailDestinatario = $this->necesidad->nec_email;
    }


    public function enviarCorreo()
    {
        $this->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Enviar el correo con los datos capturados
        Mail::to($this->emailDestinatario)->send(new NotificacionCorreo($this->subject, $this->message));

        // Mostrar un mensaje de éxito
        session()->flash('message', 'Correo enviado exitosamente');

        // Cerrar el modal
        $this->closeModal();
    }


    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.necesidades.enviar-correo');
    }
}
