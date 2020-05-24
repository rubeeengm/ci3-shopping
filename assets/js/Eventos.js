var Eventos = (function() {
	var urlControlador = "http://localhost/ci3/index.php/";

	function inicializar() {
		$('button[id="agregar-videojuego"]').unbind('click').bind('click', function() {
			Eventos.obtenerFormulario().then(function() {
				Modal.open({
					id: 'divFormularioVideojuegos'
					, title: 'Videojuego'
					, content: arguments[0]
					, okButtonText: 'Crear'
					, cancelButtonText: 'Cancelar'
					, cssDialogClass: 'modal-lg-60'
				}).on('shown.bs.modal', function() {

				});
			});
		});
	}

	return {
		cargarModulo: function() {
			inicializar();
		}
		, obtenerFormulario: function () {
			return SimpleAjax.consumir({
				url:urlControlador + "videojuegos/obtenerformulario"
			});
		}
	}
})();
