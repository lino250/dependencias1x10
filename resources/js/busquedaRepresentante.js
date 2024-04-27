// Funcion para salidar busqueda y mostrar modal
$(document).ready(function() {
    $('#formSearch').submit(function(event) {
        // Evita que el formulario se envíe de forma predeterminada
        event.preventDefault();
        // Obtiene los datos del formulario
        var formData = $(this).serialize();
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
                    $('#table-representante tbody').empty();                   
                    var representantes = response.representantes;
                    var i=0;
                    representantes.forEach(function(representante) {
                        i+=1;
                        var fila = '<tr>';
                        fila += '<td>' + i + '</td>';
                        fila += '<td>' + representante.cedula + '</td>';
                        fila += '<td>' + representante.nombres + '</td>';
                        fila += '<td>' + representante.telefono + '</td>';
                        fila += '<td>' + representante.nombre_parroquia + '</td>';
                        fila += '<td>' + representante.nombre_centro + '</td>';                        
                        if(response.dependenciaId==null){
                            fila += '<td>' + representante.nombre_dependencia + '</td>';
                        } 
                        if(representante.nombre_coordinacion){   
                            fila += '<td>' + representante.nombre_coordinacion + '</td>'; 
                        }
                        else{
                            fila += '<td></td>';
                        }
                        
                        // Botones
                        fila += '<td class="btn-accion-space">';
                        //ESTO ES MEDIANTE AJAX
                        if (response.rutas) {
                            fila += '<a class="btn btn-sm btn-primary view-btn" href="' + response.rutas.show + '"><i class="fa fa-light fa-list-ol"></i></a>';
                            fila += '<a class="btn btn-sm btn-success edit-btn" href="' + response.rutas.edit + '"><i class="fa fa-light fa-pen-to-square"></i></a>';
                            fila += '<button class="btn btn-danger btn-sm delete-btn" data-url="' + response.rutas.destroy + '"><i class="fa fa-fw fa-trash" ></i></button>';
                            fila += '</td>';
                        }
                        fila += '</tr>';                                            
                        // Agrega la fila a la tabla
                        $('#table-representante tbody').append(fila);
                    });    
                }
            },
            error: function(xhr, status, error) {
                // Maneja errores de la solicitud AJAX aquí
                console.error(error);
            }
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
//=============================Funcion para el boton de eliminacion==========================
// Manejo del clic en el botón de eliminación
    $(document).on('click', '.delete-btn', function() {
        var url = $(this).data('url');
        // Confirmar la eliminación
        if (confirm("¿Estás seguro de que quieres eliminar este representante?")) {
            // Enviar la solicitud de eliminación a través de AJAX
            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(response) {
                    // Manejar la respuesta si es necesario
                    console.log(response);
                    // Por ejemplo, puedes recargar la página o actualizar la tabla
                    location.reload();
                },
                error: function(xhr) {
                    // Manejar el error si es necesario
                    console.log(xhr.responseText);
                }
            });
        }
    });
//======================================fin funcion eliminacion del representante ===============
});