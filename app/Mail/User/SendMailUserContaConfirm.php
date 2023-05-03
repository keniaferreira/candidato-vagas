<?php

namespace App\Mail\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailUserContaConfirm extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($usuario,$emailConfirm)
    {
        $this->usuario = $usuario;
        $this->emailConfirm = $emailConfirm;
    }
    
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(\App\Config::MAIL_USERNAME, 'SuperClickShop')
                    ->subject("Confirme A Sua Conta")
                    ->view('email.user.confirmar_conta')
                    ->with([
                    'usuario' => $this->usuario,
                    'emailConfirm' => $this->emailConfirm,
                    'campoNomeUsuario' => \App\Config::PREFIXO . 'nome',
                    'code' => \App\Config::TABLE_EMAIL_CONFIRM_PREFIX_COLUNA . 'cod_email'
                    ]);
    }
}
