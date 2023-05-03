-ik<link rel="stylesheet" href="{{url('/css/navTabsSuccess.css')}}">
<div class="mod-fade" id="cadastrarEditarProduto">
  <div class="modal-content">
    <div class="modal-header">      
      <h4 class="modal-title pb-3" id="exampleModalLabel">Candidato</h4>
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
                                    <div class="col-md-3 xs-12 control-label" for="nome">Nome:</div>  
                                    <div class="col-md-6 xs-12">
                                        <input type="text" name="nome" id="nome" class="form-control form-post" carregar-dado="nome">
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-group">
                                    <div class="col-md-3 xs-12 control-label" for="sobrenome">Sobrenome:</div>  
                                    <div class="col-md-6 xs-12">
                                        <input type="text" name="sobrenome" id="sobrenome" class="form-control form-post" carregar-dado="sobrenome">
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-group">
                                    <div class="col-md-3 xs-12 control-label" for="cpf_cnpj">CPF/CNPJ:</div>  
                                    <div class="col-md-6 xs-12">
                                        <input type="text" name="cpf_cnpj" id="cpf_cnpj" class="form-control form-post" carregar-dado="cpf_cnpj">
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-group">
                                    <div class="col-md-3 xs-12 control-label" for="data_nascimento">Data De Nascimento:</div>  
                                    <div class="col-md-6 xs-12">
                                        <input type="date" name="data_nascimento" id="data_nascimento" class="form-control form-post" carregar-dado="data_nascimento">
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-group">
                                    <div class="col-md-3 xs-12 control-label" for="ddd">DDD:</div>  
                                    <div class="col-md-6 xs-12">
                                        <input type="text" name="ddd" id="ddd" class="form-control form-post" carregar-dado="ddd">
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-group">
                                    <div class="col-md-3 xs-12 control-label" for="telefone">Telefone:</div>  
                                    <div class="col-md-6 xs-12">
                                        <input type="text" name="telefone" id="telefone" class="form-control form-post" carregar-dado="telefone">
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-group">
                                    <div class="col-md-3 xs-12 control-label" for="email">Email:</div>  
                                    <div class="col-md-6 xs-12">
                                        <input type="text" name="email" id="email" class="form-control form-post" carregar-dado="email">
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-group">
                                    <div class="col-md-3 xs-12 control-label" for="cep">Cep:</div>  
                                    <div class="col-md-6 xs-12">
                                        <input type="text" name="cep" id="cep" class="form-control form-post" carregar-dado="cep">
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-group">
                                    <div class="col-md-3 xs-12 control-label" for="rua">Rua:</div>  
                                    <div class="col-md-6 xs-12">
                                        <input type="text" name="rua" id="rua" class="form-control form-post" carregar-dado="rua">
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-group">
                                    <div class="col-md-3 xs-12 control-label" for="numero">Número:</div>  
                                    <div class="col-md-6 xs-12">
                                        <input type="text" name="numero" id="numero" class="form-control form-post" carregar-dado="numero">
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-group">
                                    <div class="col-md-3 xs-12 control-label" for="complemento">Complemento:</div>  
                                    <div class="col-md-6 xs-12">
                                        <input type="text" name="complemento" id="complemento" class="form-control form-post" carregar-dado="complemento">
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-group">
                                    <div class="col-md-3 xs-12 control-label" for="bairro">Bairro:</div>  
                                    <div class="col-md-6 xs-12">
                                        <input type="text" name="bairro" id="bairro" class="form-control form-post" carregar-dado="bairro">
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-group">
                                    <div class="col-md-3 xs-12 control-label" for="cidade">Cidade:</div>  
                                    <div class="col-md-6 xs-12">
                                        <input type="text" name="cidade" id="cidade" class="form-control form-post" carregar-dado="cidade">
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-group">
                                    <div class="col-md-3 xs-12 control-label" for="uf">UF:</div>  
                                    <div class="col-md-6 xs-12">
                                        <input type="text" name="uf" id="uf" class="form-control form-post" carregar-dado="uf">
                                    </div>
                                </div>
                                <!-- Text area-->
                                <div class="form-group">
                                    <div class="col-md-3 xs-12 control-label" for="formacao_academica">Formação Acadêmica:</div>  
                                    <div class="col-md-6 xs-12">
                                        <textarea carregar-dado="formacao_academica" name="formacao_academica" id="formacao_academica" class="form-control form-post" rows="10" cols="40"></textarea>
                                    </div>
                                </div>
                                <!-- Text area-->
                                <div class="form-group">
                                    <div class="col-md-3 xs-12 control-label" for="experiencia">Experiência:</div>  
                                    <div class="col-md-6 xs-12">
                                        <textarea carregar-dado="experiencia" name="experiencia" id="experiencia" class="form-control form-post" rows="10" cols="40"></textarea>
                                    </div>
                                </div>
                                <!-- Text area-->
                                <div class="form-group">
                                    <div class="col-md-3 xs-12 control-label" for="idiomas">Idiomas:</div>  
                                    <div class="col-md-6 xs-12">
                                        <textarea carregar-dado="idiomas" name="idiomas" id="idiomas" class="form-control form-post" rows="10" cols="40"></textarea>
                                    </div>
                                </div>
                                <!-- Text area-->
                                <div class="form-group">
                                    <div class="col-md-3 xs-12 control-label" for="competencias">Competências:</div>  
                                    <div class="col-md-6 xs-12">
                                        <textarea carregar-dado="competencias" name="competencias" id="competencias" class="form-control form-post" rows="10" cols="40"></textarea>
                                    </div>
                                </div>
                                <!-- Text area-->
                                <div class="form-group">
                                    <div class="col-md-3 xs-12 control-label" for="certificados">Certificados:</div>  
                                    <div class="col-md-6 xs-12">
                                        <textarea carregar-dado="certificados" name="certificados" id="certificados" class="form-control form-post" rows="10" cols="40"></textarea>
                                    </div>
                                </div>
                                <!-- Text area-->
                                <div class="form-group">
                                    <div class="col-md-3 xs-12 control-label" for="links">Links:</div>  
                                    <div class="col-md-6 xs-12">
                                        <textarea carregar-dado="links" name="links" id="links" class="form-control form-post" rows="10" cols="40"></textarea>
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
