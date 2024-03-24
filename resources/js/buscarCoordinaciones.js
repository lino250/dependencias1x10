$(document).ready(function () {
    $('#dependencia_id').change(function () {

       
       
        var  dependenciaId = $(this).val();
        
        $.ajax({
            url: baseUrl + "/reporte/" + dependenciaId + "/coordinaciones",
            type: 'GET',
            success: function (response) {                
                var coordinaciones = response.coordinaciones;
                $('#coordinacion_id').empty();
                /*coordinaciones.forEach(function(coordinacion) {
                    $('#coordinacion_id').append('<option value="' + coordinacion.id + '">' + coordinacion.nombre + '</option>');
                });*/
                Object.keys(coordinaciones).forEach(function(key) {
                    var value = coordinaciones[key];
                    $('#coordinacion_id').append('<option value="' + key + '">' + value + '</option>');
                    //console.log("Key: " + key + ", Value: " + value);
                });
                
            }
        });
    });
});