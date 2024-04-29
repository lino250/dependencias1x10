$(document).ready(function () {
    /* Buscará las coordinaciones asociadas a la dependencia y cargar los datos en el select*/
    $('#dependencia_idr').change(function () {    
       // alert('entra aqui en rerporte y en el registto y edicion de rep');   
       
        var  dependenciaId = $(this).val();
        $.ajax({
            url: baseUrl + "/reporte/" + dependenciaId + "/coordinaciones",
            type: 'GET',
            success: function (response) { 

                $('#coordinacion_idr').empty();

                if(response.ok==1){
                    $('#coordinacion_idr').css("display", "block");

                    var coordinaciones = response.coordinaciones;                    
                    Object.keys(coordinaciones).forEach(function(key) {
                        var value = coordinaciones[key];
                        $('#coordinacion_idr').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
                else{
                    $('#coordinacion_idr').css("display", "none");
                }

                
                
            }
        });
    });
    //buscara los representantes  de la dependencia y la coordinacion seleccionada
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
                    fila += '<td>' + representante.nombre_coordinacion + '</td>';
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
            },
            error: function(xhr, status, error) {
                // Maneja errores de la solicitud AJAX aquí
                //console.error(error);
            }
        });
    });
    
});

