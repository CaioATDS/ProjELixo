<?php

namespace App\Http\Controllers\Services;

use App\Providers\ConstantesProvider;
use Illuminate\Support\Facades\Mail;

class EmailController
{
    private $name,
            $lastname,
            $email;
    public
            $mensagem,
            $assunto;

    function enviar( $name, $lastname, $email, $assunto, $mensagem )
    {

        $this->name     = $name;
        $this->lastname = $lastname;
        $this->email    = $email;
        $this->mensagem = $mensagem;
        $this->assunto  = $assunto;

        $data = [
            'name'      => $this->name,
            'lastname'  => $this->lastname,
            'email'     => $this->email,
            'mensagem'  => $this->mensagem,
            'assunto'   => $this->assunto,
        ];

        Mail::send('email.email', $data, function($message) use ($data)
        {
            $message->subject($this->assunto); // assunto
            $message->from(ConstantesProvider::SiteEmail, ConstantesProvider::SiteName); // remetente
            $message->to($this->email, $this->name . ' ' . $this->lastname); // destinatario
        });

    }

}
