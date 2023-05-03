document.addEventListener("DOMContentLoaded", function(event) {

	var linkModalImagem = document.getElementsByClassName('link-modal-image');

	var abrirImagemModal = function(){	
		var modal = document.querySelector('.modal-image-fundo');
		modal.style.display = "flex";

		var imagemCarregar = this.getAttribute("src");
		var modalImagem = document.querySelector('.modal-image');

		modalImagem.src = imagemCarregar;

		var linkFecharModal = document.querySelector('.btn-modal-image-fechar');
		linkFecharModal.addEventListener('click', function() {
			modal.style.display = "none";
			document.querySelector('.modal-image').src = "";
		});

	};

	for (var i = 0; i < linkModalImagem.length; i++) {
		linkModalImagem[i].addEventListener('click', abrirImagemModal, false);
	}

});