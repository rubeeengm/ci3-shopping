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
            var form = $('form[id="videogameForm"]');

            if (!form.valid()) {
                return;
            }

            Videogame.save({
                nombre: contenedor.find('input[id="nombre"]').val(),
                precio: contenedor.find('input[id="precio"]').val()
            }).then(function() {
                Modal.alert.success();
                window.location = arguments[0];
            });
        });

        validarFormulario();
    }

    function validarFormulario() {
        let formulario = $('form[id="videogameForm"]');

        $.validator.addMethod("espaciosEnBlanco", function(value, element) {
            return this.optional(element) || /^\S+$/i.test(value);
        }, "Requerido");

        formulario.validate({
            rules: {
                nombre: {
                    required: true,
                    espaciosEnBlanco: true,
                    maxlength: 50
                },
                precio: {
                    required: true,
                    espaciosEnBlanco: true,
                    maxlength: 9,
                    number: true
                }
            },
            messages: {
                nombre: {
                    required: "Requerido",
                    maxlength: "El nombre del videojuego debe tener máximo 50 caracteres"
                },
                precio: {
                    required: "Requerido",
                    maxlength: "No puede exceder los 9 dígitos",
                    number: "Formato de número inválido"
                }
            },
            errorPlacement: function(error, element) {
                formulario
                    .find("span[for='" + element.attr('id') + "']")
                    .append(error);
            }
        });

        return formulario;
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
        },
        actualizar: function(datos) {
            return SimpleAjax.consumir({
                url: urlControlador + "VideogameController/update",
                data: datos
            });
        }
    }
})();