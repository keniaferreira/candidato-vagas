-ik<link rel="stylesheet" href="{{url('/css/navTabsSuccess.css')}}">
<div class="mod-fade" id="cadastrarEditarProduto">
  <div class="modal-content">
    <div class="modal-header">      
      <h4 class="modal-title pb-3" id="exampleModalLabel">Vaga</h4>
      <button type="button" class="btn-modal-close fechar-modal" data-dismiss="modal" aria-label="Close">
        <span>x</span>
      </button>
    </div>
    <!-- <input type="hidden" class="rota-carregar-dados-id"> -->
    <div class="modal-body">        
        <div class="form-horizontal">
        @csrf
        <button type="submit" class="btn btn-green button-post" form-post="form-post" form-post-action="{{url('/')}}/{{$rotasPadrao['cadastrarEditar']}}">Salvar</button>
        <input type="hidden" class="form-post" name="s" value="{{Session::get('s')}}">
        <input type="hidden" name="u" class="form-post" value="{{Session::get('u')}}">
        <input type="hidden" name="id" carregar-dado="id" id="id" class="form-post"> 
        <hr>      
        <div class="row">
            <div class="col">
                <div class="panel panel-success">
                    <hr>                    
                    <div class="panel-body">
                        <div class="tab-content">

                            <!-- DADOS PRINCIPAIS - INÍCIO -->
                            <div class="tab-pane fade in active show" id="dadosPrincipais">
                                <!-- Text input-->
                                <div class="form-group">
                                    <div class="col-md-3 xs-12 control-label" for="titulo">Título:</div>  
                                    <div class="col-md-6 xs-12">
                                        <input type="text" name="titulo" id="titulo" class="form-control form-post" carregar-dado="titulo">
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-group">
                                    <div class="col-md-3 xs-12 control-label" for="situacao">Situação:</div>  
                                    <div class="col-md-6 xs-12">
                                        <input type="text" name="situacao" id="situacao" class="form-control form-post" carregar-dado="situacao">
                                    </div>
                                </div>                
                                <!-- Text input-->
                                <div class="form-group">
                                    <div class="col-md-3 xs-12 control-label" for="tipo">Tipo:</div>  
                                    <div class="col-md-6 xs-12">
                                        <input type="text" name="tipo" id="tipo" class="form-control form-post" carregar-dado="tipo">
                                    </div>
                                </div>                                     
                                <!-- Text area-->
                                <div class="form-group">
                                    <div class="col-md-3 xs-12 control-label" for="descricao">Descrição:</div>  
                                    <div class="col-md-6 xs-12">
                                        <textarea carregar-dado="descricao" name="descricao" id="descricao" class="form-control form-post" rows="10" cols="40"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- DADOS PRINCIPAIS - FIM -->
                           
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        </div>
    </div> 
    </div>    
  </div>
</div>
