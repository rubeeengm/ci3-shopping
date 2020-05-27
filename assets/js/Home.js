var Home = (function() {
    var urlControlador = "http://localhost/ci3-shopping/index.php/";

    function inicializar() {
        var formulario = $('div[id="loginModal"]');

        formulario.find('button[id="btnLogin"]').unbind('click').bind('click', function(e) {
            var form = $('form[id="loginForm"]');

            if (!form.valid()) {
                return;
            }

            Home.login({
                email: formulario.find('input[id="email"]').val(),
                password: formulario.find('input[id="password"]').val()
            }).then(function() {
                window.location = arguments[0];
            });
        });

        validarLogin();
    }

    function validarLogin() {
        let formulario = $('form[id="loginForm"]');

        $.validator.addMethod("espaciosEnBlanco", function(value, element) {
            return this.optional(element) || /^\S+$/i.test(value);
        }, "No ingrese espacios en blanco");

        formulario.validate({
            rules: {
                email: {
                    required: true,
                    espaciosEnBlanco: true,
                    maxlength: 30,
                    email: true
                },
                password: {
                    required: true,
                    espaciosEnBlanco: true,
                    maxlength: 15
                }
            },
            messages: {
                email: {
                    required: "El email es requerido",
                    maxlength: "El email debe tener máximo 30 caracteres",
                    email: "Formato de correo inválido"
                },
                password: {
                    required: "La contraseña es requerida",
                    maxlength: "La contraseña debe tener como máximo 15 caracteres"
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
        login: function(datos) {
            return SimpleAjax.consumir({
                url: urlControlador + "HomeController/login",
                data: datos
            });
        }
    }
})();