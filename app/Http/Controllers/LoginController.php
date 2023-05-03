<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Cliente;
use Hash;
use DB;
use Session;
use Exception;
use Illuminate\Support\Facades\Crypt;

class LoginController extends Controller
{
	private $tabela;
	private $prefixo;
	private $chave;
	private $nomeSessao;
	private $tabelaContaConfirmPrefixColuna;


	public function __construct()
	{
		$this->tabela                         = \App::make('\App\Models\User')->getTable();
		$this->prefixo                        = \App\Config::PREFIXO;
		$this->chave                          = \App::make('\App\Models\User')->getKeyName();		
		$this->nomeSessao                     = \App\Config::NOME_SESSAO;
	}

	//
	public function logar(Request $request)
	{
		$user = \App\Models\User::where($this->prefixo . 'username',$request->username)->first();		
		$campoTabelaPassword = $this->prefixo . 'pass';
		$usuario = $this->prefixo.'id';
		$campoUsuarioAtivo = $this->prefixo . 'ativo';

		if(($user->$campoUsuarioAtivo) && (Hash::check($request->password, $user->$campoTabelaPassword))) {
			Session::put('s', Crypt::encryptString(\App\Config::NOME_SESSAO) );
			Session::put('u', Crypt::encryptString($user->$usuario) );
			Session::put($this->nomeSessao, true);
			
			return redirect('login');
		} else {
			return redirect('/')->with('error', [                
				'message' => ['Verifique login, senha ou se você já possui um cadastro.']
			]);
		}
			

	}

	public function sair()
	{
		Session::flush();
		return redirect('/');
	}
}
