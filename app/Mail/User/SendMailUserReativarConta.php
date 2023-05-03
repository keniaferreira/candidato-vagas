<?php

namespace App\Mail\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailUserReativarConta extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($vendedor,$emailReativar)
    {
        $this->vendedor = $vendedor;
        $this->emailReativar = $emailReativar;
    }
    
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('email@superclickshop.com', 'SuperClickShop')
                    ->subject("Reativar Conta")
                    ->view('email.vendedor.reativar_conta')
                    ->with([
                    'vendedor' => $this->vendedor,
                    'emailReativar' => $this->emailReativar,
                    ]);
    }
}
