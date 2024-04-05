$(document).ready(function() {
    var usuarioIniciado = false; // Aquí debes obtener el valor de usuarioIniciado

    $.ajax({
        url: 'ruta/a/tu_archivo.php',
        type: 'post',
        data: {usuarioIniciado: usuarioIniciado}
    });
});

var usuarioIniciado = false;