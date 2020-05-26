var Videogame = (function() {
    var urlControlador = "http://localhost/ci3-shopping/index.php/";

    function inicializar() {
        var formulario = $('div[id="menuBar"]');

        formulario.find('button[id="btnCerrarSesion"]').unbind('click').bind('click', function() {
            Videogame.signout().then(function() {
                window.location = arguments[0];
            });
        });

        inicializarTabla();
    }

    function inicializarTabla() {
        var contenedor = $('div[id="videogameModal"]');

        contenedor.find('button[id="btnAgregar"]').unbind('click').bind('click', function() {
            Videogame.save({
                nombre: contenedor.find('input[id="nombre"]').val(),
                precio: contenedor.find('input[id="precio"]').val()
            }).then(function() {
                Modal.alert.success();
                window.location = arguments[0];
            });
        });
    }

    return {
        cargarModulo: function() {
            inicializar();
        },
        signout: function() {
            return SimpleAjax.consumir({
                url: urlControlador + "HomeController/signout"
            });
        },
        save: function(datos) {
            return SimpleAjax.consumir({
                url: urlControlador + "VideogameController/save",
                data: datos
            });
        }
    }
})();