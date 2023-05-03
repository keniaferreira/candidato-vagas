<?php

namespace App\Http\Controllers;

use DB;
use Session;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ExclusaoController extends Controller
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

    public function confirmarExclusao (Request $request)
    {  
        $retorno = array(
            'funcaoJsPostData' => 'confirmarExlusao',            
            'retorno' => 'alert'
        );

        echo json_encode($retorno);

    }

    public function excluirDado (Request $request)
    {
    	$retorno = array(
    		'funcaoJsPostData' => 'atualizarPagina',    		
    		'retorno' => 'error',
    		'mensagem' => 'Erro Ao Excluir. Tente Novamente.'
    	);

        $primary = \App::make($request->model)->getKeyName();
        $dado    = $request->model::where($primary, $request->id)->first();

        try{
        	DB::beginTransaction();

        	if(!empty($dado->$primary)) {
                $dado->deleted_at = date('Y-m-d H:i:s');
                $dado->save();
                $retorno['retorno'] = 'success';
                $retorno['mensagem'] = 'Exclusão realizada com sucesso!';

                DB::commit();
            }
        	
        	
        }catch(\PDOException $e ){
        	DB::rollBack();
        	$retorno['retorno'] = 'error';
        	$retorno['mensagem'] = $e->getMessage();
        }

        echo json_encode($retorno);

    }

}