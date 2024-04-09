$(document).ready(function() {
    function validarCedula(cedula) {
        $.ajax({
            url: baseUrl + "/integrante/buscarIntegrantes",
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                cedula: cedula
            },
            success: function(response) {
                if (response.existe) {
                    $('#cedulaStatus').html('<span style="color:red;">¡La cédula ya está registrada!</span>');
                    $('#submitButton').prop('disabled', true); // Deshabilitar el botón de enviar
                    // Deshabilitar los otros campos del formulario
                    $('#integranteForm input[type=text]').prop('disabled', true);
                } else {
                    $('#cedulaStatus').html('<span style="color:green;">Cédula disponible.</span>');
                    $('#submitButton').prop('disabled', false); // Habilitar el botón de enviar
                    // Habilitar los otros campos del formulario
                    $('#integranteForm input[type=text]').prop('disabled', false);
                }
            }
        });
    }
});

