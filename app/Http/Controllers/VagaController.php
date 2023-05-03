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
            'mensagem' => 'Erro Ao Alterar Vaga. Tente Novamente.'
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

            $produto = '';
            $prdCod = '';
            if(empty($request->prd_cod)) {
                $produto = new \App\Models\Produto;

                $ultimoProdutoCriado = \App\Models\Produto::orderBy('prd_cod','DESC')->first();
                $prdCod = (!isset($ultimoProdutoCriado->prd_cod)) ? 1 : $ultimoProdutoCriado->prd_cod + 1;
                $produto->prd_cod =  $prdCod;
                $produto->prd_slug =  preg_match('/^[A-Za-z0-9-]+$/', $request->prd_nome) . date('dMYHis');
                $produto->prd_data_insert = date('Y-m-d H:i:s');
                $produto->prd_vndl_cod = $lojaVendedor->vndl_cod;
                $produto->prd_tep_cod = 3; //Tipo Envio Produto = Melhor Envio.

            } else {
                $produto = \App\Produto::where('prd_cod', $request->prd_cod)->first();
                $prdCod = $produto->prd_cod;
            }

            if(!empty($produto)) {
                $produto->prd_nome        =  $request->prd_nome;
                $produto->prd_desc        =  $request->prd_desc;
                $produto->prd_peso        =  $request->prd_peso;
                $produto->prd_altura      =  $request->prd_altura;
                $produto->prd_largura     =  $request->prd_largura;
                $produto->prd_comprimento =  $request->prd_comprimento;
                $produto->prd_fabricante  =  $request->prd_fabricante;
                $produto->prd_modelo      =  $request->prd_modelo;
                $produto->prd_img         =  $request->prd_img;
                $produto->prd_video       =  $request->prd_video;
                $produto->prd_tcp_cod     =  $request->prd_tcp_cod;
                $produto->save();

            }

            if(isset($request->prde_id)) {
                foreach ($request->prde_id as $key => $estoque) {
                    $estoqueProduto = null;
                    if(!empty($estoque)) {
                        $estoqueProduto = \App\Models\ProdutoEstoque::where('prde_id', $estoque)->first();
                    }
                    else {
                        $estoqueProduto = new \App\Models\ProdutoEstoque;
                        $estoqueProduto->prde_prd_cod = $prdCod;
                        $estoqueProduto->prde_data_insert = date('Y-m-d H:i:s');
                    }

                    if(!empty($request->prde_quant[$key])) {
                        $estoqueProduto->prde_prd_cor = $request->prde_prd_cor[$key];
                        $estoqueProduto->prde_prd_tamanho = $request->prde_prd_tamanho[$key];
                        $estoqueProduto->prde_quant = $request->prde_quant[$key];
                        $estoqueProduto->save();
                    }                 
                }

            } 

            $produtoPreco = '';
            if(isset($request->prdp_preco) && isset($request->prd_cod)) {
                $produtoPreco = \App\Models\ProdutoPreco::where('prdp_prd_cod', $request->prd_cod)->first();
            } 

            if(empty($produtoPreco) && !empty($request->prdp_preco)) {            
                $produtoPreco = new \App\Models\ProdutoPreco;
                $produtoPreco->prdp_prd_cod = $prdCod;
                $produtoPreco->prdp_data_insert = date('Y-m-d H:i:s');
                $produtoPreco->prdp_tpp_cod = 1; //Tipo Preço Produto = 1 Padrão
            }

            if(!empty($produtoPreco)) {            
                $produtoPreco->prdp_preco =  $request->prdp_preco;
                $produtoPreco->save();
            }

            if(isset($request->prdi_id)) {

                foreach ($request->prdi_id as $key => $imagem) {
                    $imagemProduto = null;
                    if(!empty($imagem)) {
                        $imagemProduto = \App\Models\ProdutoImagem::where('prdi_id', $imagem)->first();
                    }
                    else {
                        $imagemProduto = new \App\Models\ProdutoImagem;
                        $imagemProduto->prdi_prd_cod = $prdCod;                    
                        $imagemProduto->prdi_data_insert = date('Y-m-d H:i:s');
                    }

                    if(!empty($request->prdi_link[$key])) {
                        $imagemProduto->prdi_link = $request->prdi_link[$key];
                        $imagemProduto->prdi_nome = 'Imagem Produto ' . $request->prd_nome;
                        $imagemProduto->prdi_pasta = ' ';
                        $imagemProduto->save();
                    }
                                        
                }

            }

            $retorno['retorno'] = 'success';
            $retorno['mensagem'] = 'Produto alterado com sucesso!';

            DB::commit();
            
        }catch(\PDOException $e ){
            DB::rollBack();
            $retorno['retorno'] = 'error';
            $retorno['mensagem'] = $e->getMessage();
        }

        echo json_encode($retorno);

    }

}
