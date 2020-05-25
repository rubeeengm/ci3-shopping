var Home = (function() {
	var urlControlador = "http://localhost/ci3-shopping/index.php/";

	function inicializar() {
		var formulario = $('div[id="loginModal"]');

		formulario.find('button[id="btnLogin"]').unbind('click').bind('click', function() {
			Home.login({
				email: formulario.find('input[id="email"]').val()
				, password: formulario.find('input[id="password"]').val()
			});
		});
	}

	return {
		cargarModulo: function() {
			inicializar();
		}
		, login: function (datos) {
			return SimpleAjax.consumir({
				url:urlControlador + "HomeController/login"
				, data: datos
			});
		}
	}
})();
