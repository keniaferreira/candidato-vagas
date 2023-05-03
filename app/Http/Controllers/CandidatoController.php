<?php

namespace App\Http\Controllers;

use DB;
use Session;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CandidatoController extends Controller
{

    public function __construct(request $request)
    {
        if(isset($request->s) && isset($request->u)) {

            Session::put(Crypt::decryptString($request->s), [
                'usuario'  => $request->u 
            ]);
        }

        $this->middleware('auth.usuario');
    }

    protected $rotasPadrao = array(
        'listar'          => 'candidato/listar',
        'formCadastro'    => 'candidato/editar-cadastrar',
        'formApagar'      => 'candidato/apagar',
        'carregar'        => 'api/candidato/carregar',
        'carregarPreco'   => 'api/candidato/carregarPreco',
        'carregarEstoque' => 'api/candidato/carregarEstoque',
        'carregarImagens' => 'api/candidato/carregarImagens',
        'carregarVideo'   => 'api/candidato/carregarVideo',
        'cadastrarEditar' => 'api/candidato/cadastrarEditar',            
        'atualizar'       => 'api/candidato/atualizar',
        'apagar'          => 'api/candidato/apagar', 
    );


    public function listar()
    {        

        $candidatos = \App\Models\Candidato::get();
        $rotasPadrao = $this->rotasPadrao;

        return view('candidatos.listar', compact('candidatos', 'rotasPadrao'));
    }

    public function exibirFormCadastrarEditar()
    {
    	$rotasPadrao = $this->rotasPadrao;
    	return view('candidatos.cadastrarEditar',compact('rotasPadrao'));
    }

    public function exibirFormConfirmarDeletar()
    {
    	$rotasPadrao = $this->rotasPadrao;
    	return view('candidatos.apagar',compact('rotasPadrao'));
    }

    public function carregarDados (Request $request) 
    {
    	$candidato = \App\Models\Candidato::where('id', $request->id)->first();

        return Response::json($candidato);
    }

    public function cadastrarEditar (Request $request)
    {

    	$retorno = array(
    		'funcaoJsPostData' => 'atualizarPagina',    		
    		'retorno' => 'error',
    		'mensagem' => 'Erro Ao Salvar Candidato. Tente Novamente.'
    	);

        $validator = new \App\Http\Requests\CandidatoFormRequest();

        if(!$validator->validar($request)) {
            $errors = $validator->messages();     
            foreach ($errors as $error => $err) {
                $retorno['mensagem'] .= ' | ' . $err[0];
            }
            echo json_encode($retorno);
            exit();
        }

        try{
        	DB::beginTransaction();

        	$candidato = '';
	        if(empty($request->id)) {
	        	$candidato = new \App\Models\Candidato;

	        } else {
	        	$candidato = \App\Models\Candidato::where('id', $request->id)->first();
	        }

	        if(!empty($candidato)) {
	            $candidato->nome               =  $request->nome;
	            $candidato->sobrenome          =  $request->sobrenome;
	            $candidato->cpf_cnpj           =  $request->cpf_cnpj;
	            $candidato->data_nascimento    =  $request->data_nascimento;
	            $candidato->ddd                =  $request->ddd;
	            $candidato->telefone           =  $request->telefone;
                $candidato->email              =  $request->email;
	            $candidato->cep                =  $request->cep;
	            $candidato->rua                =  $request->rua;
	            $candidato->numero             =  $request->numero;
	            $candidato->complemento        =  $request->complemento;
	            $candidato->bairro             =  $request->bairro;
                $candidato->cidade             =  $request->cidade;
                $candidato->uf                 =  $request->uf;
                $candidato->formacao_academica =  $request->bairro;
                $candidato->experiencia        =  $request->experiencia;
                $candidato->idiomas            =  $request->idiomas;
                $candidato->competencias       =  $request->competencias;
                $candidato->certificados       =  $request->certificados;
                $candidato->links              =  $request->links;
	            $candidato->save();

	        }

        	$retorno['retorno'] = 'success';
        	$retorno['mensagem'] = 'Candidato Salvo Com Sucesso!';

        	DB::commit();
        	
        }catch(\PDOException $e ){
        	DB::rollBack();
        	$retorno['retorno'] = 'error';
        	$retorno['mensagem'] = $e->getMessage();
        }

        echo json_encode($retorno);

    }

}
