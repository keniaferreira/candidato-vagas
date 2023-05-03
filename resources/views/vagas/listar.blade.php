@extends('painel')
@section('conteudo')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<div class="container">
    <button rota="{{url('/')}}/{{$rotasPadrao['formCadastro']}}" title="Cadastrar" class="btn btn-green rotaModal" idModal="cadastrarEditarVaga" data-toggle="modal">+</button>
    <button id="apagar-tudo" type="button" class="btn btn-danger d-none">Apagar Tudo</button>
	<div class="row">    
	<table id="listar-vagas" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Deletar</th>
                <th>Título</th>
                <th>Tipo</th>
                <th>Situação</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vagas as $vaga)
            <tr>
                <td class="text-center">
                    <button rota-apagar="{{url('/api')}}/confirmarExclusao" class="btn btn-primary btn-xs excluir" data-urlexcluir="{{url('/api')}}/excluirDado" data-nome="{{$vaga->titulo}}" data-model="\App\Models\Candidato" data-id="{!! $vaga->id !!}" data-title="Edit" data-toggle="modal" data-s="{{Session::get('s')}}" data-u="{{Session::get('u')}}" >🗑</button>
                </td>
                <td>{{$vaga->titulo}}</td>
                <td>{{$vaga->tipo}}</td>
                <td>{{$vaga->situacao}}</td>
                <td class="text-center">
                    <button rota="{{url('/')}}/{{$rotasPadrao['formCadastro']}}" rota-carregar-dados="{{url('/')}}/{{$rotasPadrao['carregar']}}" data-id="{!! $vaga->id !!}" class="btn btn-primary btn-xs rotaModal carregar" data-s="{{Session::get('s')}}" data-u="{{Session::get('u')}}" data-title="Edit" data-toggle="modal" data-target="#edit">✎</button>
                </td>
            </tr>
            @endforeach
            
        </tbody>
        <tfoot>
            <tr>
                <th>Deletar</th>
                <th>Título</th>
                <th>Tipo</th>
                <th>Situação</th>
                <th>Editar</th>
            </tr>
        </tfoot>
    </table>
	</div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#listar-vagas').DataTable(
            
             {     

          "aLengthMenu": [[20, 50, 100, -1], [20, 50, 100, "Tudo"]],
          "iDisplayLength": 20
           } 
        );

        $('.form-control .form-control-sm').prop('placeholder', 'Pesquisar...');
    } );
</script>
@stop