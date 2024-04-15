$(document).ready(function() {



    $('#cedula').blur(function() {

        //console.log($('#modoEdicion').val());
        //alert('adadasdas');
        if($('#modoEdicion').val() === 'true')
        {
            $('#cedula').prop('readonly', true); // Deshabilitar la edición del campo de cédula
        }
        else{  
            var cedula = ($('#cedula').val());
            var cedula_rep = $('#CedulaRepresentante').val();
            // alert(cedula);


            if (cedula === cedula_rep)  {
               // alert (cedula_rep);
            $('#cedulaStatus').html('<div class="text-danger">El integrante que intentas registrar no puede ser el mismo representante de este 1x10.</div>');
            $('#submitButton').prop('disabled', true); // Deshabilitar el botón de enviar
            // Deshabilitar los otros campos del formulario
           
            return false; // Devolver false para indicar que la validación falló
            }
            else{
               
                $.ajax({
                url: baseUrl + "/integrante/buscarIntegrante",
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    cedula: cedula
                },
                success: function(response) {                
                
                    if (response.encontrado=='1') {
                        alert(response.encontrado);
                        $('#cedulaStatus').html('<span style="color:red;">' + response.mensaje + '</span>');
                        $('#submitButton').prop('disabled', true); // Deshabilitar el botón de enviar
                        // Deshabilitar los otros campos del formulario
                    // $('#integranteForm input[type=text]').prop('disabled',true);
                    } 
                    if (response.encontrado=='0') {
                    // alert('NO ENCONTRADO');
                    
                        $('#cedulaStatus').html('<span style="color:green;">' + response.mensaje + '</span>');
                        $('#submitButton').prop('disabled', false); // Habilitar el botón de enviar
                        $('#integranteForm input[type=text]').prop('disabled',false);
                    }
                

                },
                error: function(xhr, status, error) {

                    // Maneja errores de la solicitud AJAX aquí
                    //console.error(error);
                }
                
                });
               
            }
        }   
       
    });


    
   // alert('Estoy aqui');

    /*function validarCedula(cedula) {

        if($('#modoEdicion').val() === 'true')
        {
         alert('asadasds');
    
        }
        else{    
            $.ajax({
            url: baseUrl + "/integrante/buscarIntegrante",
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                cedula: cedula
            },
            success: function(response) {
               
                if (response.encontrado=='1') {
                    $('#cedulaStatus').html('<span style="color:red;">' + response.mensaje + '</span>');
                    $('#submitButton').prop('disabled', true); // Deshabilitar el botón de enviar
                    // Deshabilitar los otros campos del formulario
                    $('#integranteForm input[type=text]').prop('disabled',true);
                } 
                if (response.encontrado=='0') {
                   // alert('NO ENCONTRADO');
                   
                    $('#cedulaStatus').html('<span style="color:green;">' + response.mensaje + '</span>');
                    $('#submitButton').prop('disabled', false); // Habilitar el botón de enviar
                    $('#integranteForm input[type=text]').prop('disabled',false);
                }
              
    
            },
            
            });
        } 
    }*/
    
});

