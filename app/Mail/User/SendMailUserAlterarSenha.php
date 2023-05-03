<?php

namespace App\Mail\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailUserAlterarSenha extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($vendedor,$vendedorEmail)
    {
        $this->vendedor = $vendedor;
        $this->vendedorEmail = $vendedorEmail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('email@superclickshop.com', 'SuperClickShop')
                    ->subject("Alterar Senha")
                    ->view('email.vendedor.alterar_senha')
                    ->with([
                    'vendedor' => $this->vendedor,
                    'vendedorEmail' => $this->vendedorEmail,
                    ]);
    }
}
