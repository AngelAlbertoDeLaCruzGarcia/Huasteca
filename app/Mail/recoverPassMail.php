<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class recoverPassMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject="Indumentarias de la Huasteca";
    public $correo, $Pass;
    //public $pathToImage = '../assets/img/Logo.jpeg';
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($correo,$Pass)
    {
        $this->correo = $correo;
        $this->Pass   = $Pass;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.recoveryPass');
        //->attachFromStorageDisk('subirArchivos', '/assets/img/Logo.jpeg');
    }
}
