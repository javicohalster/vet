<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Avisos extends Mailable
{
    use Queueable, SerializesModels;

     /**
     * The envio object instance.
     *
     * @var Envio
     */
    public $envio;

    public function __construct($envio)
    {
        $this->envio = $envio;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@cvsanjosecondado.com', 'Clínica Veterinaria San Jóse del Condado')
        ->subject($this->envio->subject)
        ->view('mails.avisos');
    }
}
