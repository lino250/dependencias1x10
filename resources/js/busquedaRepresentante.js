// Funcion para salidar busqueda y mostrar modal
$(document).ready(function() {
    $('#formSearch').submit(function(event) {
        // Evita que el formulario se envíe de forma predeterminada
        event.preventDefault();

        // Obtiene los datos del formulario
        var formData = $(this).serialize();
       // alert($(this).attr('action'));

        // Realiza la solicitud AJAX
        $.ajax({
            url: $(this).attr('action'), // Obtiene la URL del atributo 'action' del formulario
            method: $(this).attr('method'), // Obtiene el método del atributo 'method' del formulario
            data: formData, // Los datos del formulario serializados
            success: function(response) {
            
                if (response.showModal==1) {
                    // Mostrar el modal si showModal es true
                    $('#validReprent').modal('show');
                }else{
                    window.location.href = baseUrl + "/representante";
                }
            },
            error: function(xhr, status, error) {

                // Maneja errores de la solicitud AJAX aquí
                //console.error(error);
            }
        });
    });
});

// Funcion para validar datos ingresados en el input
document.getElementById('cedulaRepresentante').addEventListener('keydown', function(event) {
    // Obtener la tecla presionada
    let key = event.key;

    // Verificar si la tecla presionada es un número o la tecla Backspace (para permitir borrar)
    if (!(key >= '0' && key <= '9') && key !== 'Backspace') {
        // Prevenir la acción por defecto si la tecla no es un número ni Backspace
        event.preventDefault();
    }
});


/*
var baseUrl = "{{ url('/') }}";
window.location.href = baseUrl + "/representante";
*/