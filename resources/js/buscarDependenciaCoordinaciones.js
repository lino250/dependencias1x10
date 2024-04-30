
$(document).ready(function () {
//alert('SI ENTRA AQUIIIII');   
    /* Buscará las coordinaciones asociadas a la dependencia y cargar los datos en el select*/
    $('#dependencia_id').change(function () {    
        
        var  dependenciaId = $(this).val();
        $.ajax({
            url: baseUrl + "/representante/" + dependenciaId + "/coordinaciones",
            type: 'GET',
            success: function (response) { 

                $('#coordinacion_id').empty();

                if(response.ok==1){
                    $('#coordinacion_id').css("display", "block");

                    var coordinaciones = response.coordinaciones;                    
                    Object.keys(coordinaciones).forEach(function(key) {
                        var value = coordinaciones[key];
                        $('#coordinacion_id').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
                else{
                    $('#coordinacion_id').css("display", "none");
                }  
            }
        });
    });
});