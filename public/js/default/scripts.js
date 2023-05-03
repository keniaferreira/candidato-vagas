$(document).ready(function() {

    setInterval(function(){ window.location.href = window.location.href; },50*50000);

	$(document).on('click', '.rotaModal', function() {
		//prevent the anchor tag from actually sending a request

		//fetch url from anchor tag's href attribute and make a GET request
		fetch($(this).attr('rota'))
		.then(response => response.text())
		.then(html => {
			$('span[tipo=rota_modal]').html('');
			$('span[tipo=rota_modal]').append(html);
			$('#'+$(this).attr('idModal')).modal('show');
			$('.modal-backdrop').remove();
		})	
	});

	$(document).on('click', '.btn-modal', function() {
		var idmod = $(this).attr('idmodal');
		$(idmod).modal('show');
	});

	$(document).on('click', '.fechar-modal', function() {
		$('.rota_modal_page').html('');
        $('.rota_modal').html('');
        $('.mod-fade').hide();
        location.reload(true);
	});

    var dados = null;
    $(document).on('click', '.carregar', function() {       
        var dataPost = new FormData();
        var id = $(this).data('id');
        
        dataPost.append('id', $(this).data('id'));

        if($(this).data('s') != 'undefined') {
            dataPost.append('s', $(this).data('s'));
        }

        if($(this).data('u') != 'undefined') {
            dataPost.append('u', $(this).data('u'));
        }

        if($(this).data('l') != 'undefined') {
            dataPost.append('l', $(this).data('l'));
        }

        dados = null;
        $.ajax({
            url  : $(this).attr('rota-carregar-dados'),
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: dataPost,
            processData: false,
            contentType: false,
            success:function(data){                           
            }
        }).done(function(data){
            setTimeout(() => {
                carregarDadosPost(data, id);
            }, 500);   

            //Chamo novamente pra garantir que os dados vão carregar
            setTimeout(() => {
                carregarDadosPost(data, id);
            }, 500);             
        }); 
    });

    function carregarDadosPost(data, id) {
        $.each( data, function( key, value ) {

            if($.isNumeric(key)) {

                $('[carregar-dado='+key+']').val(value);
                $.each( data[key], function( ky, val ) {
                    $('[carregar-dado-'+key+'='+ky+']').val(val);
                });

            } else {
                $('[carregar-dado='+key+']').val(value);
            }

        }); 
        $('.modal-content, [rota-carregar-dados]').attr('data-id', id);

    }

    $(document).on('click', '.excluir', function() {       
        var dataPost = new FormData();
        var id = $(this).data('id');
        
        var model = $(this).data('model');
        var nome =  $(this).data('nome');
        var s = $(this).data('s');
        var u = $(this).data('u');
        var l = $(this).data('l');

        var urlExcluir = $(this).data('urlexcluir');

        if($(this).data('model') != 'undefined') {
            dataPost.append('model', $(this).data('model'));
        }

        if($(this).data('id') != 'undefined') {
            dataPost.append('id', $(this).data('id'));
        }

        if($(this).data('s') != 'undefined') {
            dataPost.append('s', $(this).data('s'));
        }

        if($(this).data('u') != 'undefined') {
            dataPost.append('u', $(this).data('u'));
        }

        $.ajax({
            url  : $(this).attr('rota-apagar'),
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: dataPost,
            processData: false,
            contentType: false,
            success:function(data){   
                var dados = jQuery.parseJSON( data );
                if(dados.funcaoJsPostData == 'confirmarExlusao') {
                    dados.s          = s;
                    dados.u          = u;
                    dados.l          = l;
                    dados.id         = id;
                    dados.model      = model;
                    dados.nome       = nome;
                    dados.urlExcluir = urlExcluir;
                    retornarMensagemConfirmarExclusao(dados);
                }
                else if(dados.funcaoJsPostData =='atualizarPagina') {
                    atualizarPagina(dados); 
                }          
            }
        }); 
    });

    function enviarDados(formPost) {
        const url = $('[form-post="'+formPost+'"]').attr(formPost+'-action');
        data = $('.' + formPost);        

        var dataPost = new FormData();
        for (var i = 0; i < data.length; i++) {
            dataPost.append(data[i].getAttribute("name"), data[i].value);
        }
        fetch(url, {
            method : "POST",
            body: dataPost,
            //Laravel
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }).then(response => 
            response.json().then(data => ({
                data: data,
                status: response.status
            })
        ).then(res => {
            //post-data-functions.js
            switch (res.data.funcaoJsPostData) {
                case 'recarregarPagina':
                recarregarPagina(res.data);
                break;

                case 'atualizarPagina':          
                atualizarPagina(res.data);
                break;

                default:
                break;
            }
            })
        );     
    }

    $(document).on('click', '.button-post', function() {
    	var formPost = $(this).attr('form-post');
    	enviarDados(formPost);
    });

    $(document).on('click', '.btn-modal-close-alert', function(){
        $('.mod-fade-alert').remove();
    });

});

