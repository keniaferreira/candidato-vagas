<?php

namespace App\Http\Controllers;

use DB;
use Session;
use Response;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class VagaController extends Controller
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
        'listar'          => 'vaga/listar',
        'formCadastro'    => 'vaga/editar-cadastrar',
        'formApagar'      => 'vaga/apagar',
        'carregar'        => 'api/vaga/carregar',
        'carregarPreco'   => 'api/vaga/carregarPreco',
        'carregarEstoque' => 'api/vaga/carregarEstoque',
        'carregarImagens' => 'api/vaga/carregarImagens',
        'carregarVideo'   => 'api/vaga/carregarVideo',
        'cadastrarEditar' => 'api/vaga/cadastrarEditar',            
        'atualizar'       => 'api/vaga/atualizar',
        'apagar'          => 'api/vaga/apagar', 
    );


    public function listar()
    { 

        $vagas = \App\Models\Vagas::get();
        $rotasPadrao = $this->rotasPadrao;

        return view('vagas.listar', compact('vagas', 'rotasPadrao'));
    }

    public function exibirFormCadastrarEditar()
    {
        $rotasPadrao = $this->rotasPadrao;
        return view('vagas.cadastrarEditar',compact('rotasPadrao'));
    }

    public function exibirFormConfirmarDeletar()
    {
        $rotasPadrao = $this->rotasPadrao;
        return view('produto.apagar',compact('rotasPadrao'));
    }

    public function carregarDados (Request $request) 
    {
        $vaga = \App\Models\Vagas::where('id', $request->id)->first();

        return Response::json($vaga);
    }

    public function cadastrarEditar (Request $request)
    {
        $retorno = array(
            'funcaoJsPostData' => 'atualizarPagina',            
            'retorno' => 'error',
            'mensagem' => 'Erro Ao Salvar Vaga. Tente Novamente.'
        );

        $validator = new \App\Http\Requests\VagaFormRequest();

        if(!$validator->validar($request)) {
            $errors = $validator->messages();     
            foreach ($errors as $error => $err) {
                $retorno['mensagem'] .= ' | ' . $err[0];
            }
            echo json_encode($retorno);
            exit();
        }

        $vaga = \App\Models\Vagas::where('id', $request->id)->first();

        try{
            DB::beginTransaction();

            $vaga = '';
            if(empty($request->id)) {
                $vaga = new \App\Models\Vagas;

            } else {
                $vaga = \App\Models\Vagas::where('id', $request->id)->first();
            }

            if(!empty($vaga)) {
                $vaga->titulo    =  $request->titulo;
                $vaga->descricao =  $request->descricao;
                $vaga->tipo      =  $request->tipo;
                $vaga->situacao  =  $request->situacao;
                $vaga->save();

            }

            $retorno['retorno'] = 'success';
            $retorno['mensagem'] = 'Vaga salva Com Sucesso!';

            DB::commit();
            
        }catch(\PDOException $e ){
            DB::rollBack();
            $retorno['retorno'] = 'error';
            $retorno['mensagem'] = $e->getMessage();
        }

        echo json_encode($retorno);

    }

}
