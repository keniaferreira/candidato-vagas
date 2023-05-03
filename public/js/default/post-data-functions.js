function atualizarPagina(data) {
    sessionStorage.setItem("reloading", "true");

    if(data.retorno != 'undefined') {
        sessionStorage.setItem("tipoRetorno", data.retorno);
    }
    if(data.mensagem != 'undefined') {
        sessionStorage.setItem("mensagemRetorno", data.mensagem);
    }   
    
    window.location.href = window.location.href;   
}

function retornarMensagem() {
    if(sessionStorage.getItem("tipoRetorno") == 'error') {
        $('.mensagem-retorno').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong></strong>'+sessionStorage.getItem("mensagemRetorno")+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }
    else if(sessionStorage.getItem("tipoRetorno") == 'success') {
        $('.mensagem-retorno').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong></strong>'+sessionStorage.getItem("mensagemRetorno")+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }
    sessionStorage.removeItem("tipoRetorno");
    sessionStorage.removeItem("mensagemRetorno");
    
}

window.onload = function() {
    var reloading = sessionStorage.getItem("reloading");
    if (reloading) {
        sessionStorage.removeItem("reloading");
        retornarMensagem();
    }
}

function retornarMensagemConfirmarExclusao(data) {
    if(data.retorno == 'alert') {
        $('.mensagem-retorno').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong></strong>Tem certeza que deseja excluir o dado ' + data.nome + ' ? <button rota-apagar="' + data.urlExcluir + '" data-model="' + data.model + '" data-id="' + data.id + '" data-s="' + data.s + '" data-u="' + data.u + '" data-l="' + data.l + '" class="btn excluir">Sim</button> <button data-dismiss="alert" class="btn">Não</button><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }
    
}