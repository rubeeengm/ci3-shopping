var SimpleAjax = (function() {
    function obtenerConfiguracionInicial() {
        return {
            url : null
            , dataType : "html" // text, html, xml, json, jsonp, and script
            , method : "POST" // POST, GET, PUT, DELETE
            , statusCode : {
                400: function() {
                	console.log("hola");
                    var respuesta = arguments[0].responseText;
                    Modal.alert.error(
                        "petición incorrecta"
                        , respuesta
                        , function() {
                            // expira el token enviado
                            if (respuesta == 'token inválido') {
                                Sesion.abrirModalLogin();
                                return;
                            }
                        }
                    );
                }
                , 401: function() {
                    var respuesta = arguments[0].responseText;
                    Modal.alert.error(
                        "recurso no autorizado"
                        , respuesta
                        , function() {
                            // expira el token enviado
                            if (respuesta == 'token inválido') {
                                Sesion.abrirModalLogin();
                                return;
                            }
                            
                            // expira la sesion del front
                            if (respuesta == 'sesion expirada') {
                                Sesion.cerrarSesion().fail(function() {
                                    Sesion.abrirModalLogin();
                                }).then(function() {
                                    Sesion.abrirModalLogin();
                                });
                            }
                        }
                    );
                }
                , 404: function() {
                    Modal.alert.error(
                        "página no encontrada"
                        , arguments[0].responseText
                    );
                }
                , 415: function() {
                    Modal.alert.error(
                        "el tipo de contenido enviado no es soportado"
                        , arguments[0].responseText
                    );
                }
                , 500: function() {
                    Modal.alert.error(
                        "Atención"
                        , arguments[0].responseText
                    );
                }
            }
            , beforeSend: function (xhr, opciones) {
                Modal.loading.open();
            }
        };
    };
        
    return {
        consumir: function(pconfiguracion) {
            configuracion = obtenerConfiguracionInicial();
            $.extend(configuracion, (pconfiguracion || {}));
            
            return $.ajax(configuracion).always(function(datos, estado, error) {
                Modal.loading.close();
            });
        }
    };
})();
