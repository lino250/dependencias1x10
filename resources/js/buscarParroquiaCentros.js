$(document).ready(function () {
    $('#parroquia_id').change(function () {
        var parroquiaId = $(this).val();
        $.ajax({
            url: baseUrl + "/representante/" + parroquiaId + "/centros",
            type: 'GET',
            success: function (response) {
                var centros = response.centros;
                $('#centro_id').empty();
                centros.forEach(function(centro) {
                    $('#centro_id').append('<option value="' + centro.id + '">' + centro.nombre + '</option>');
                });
            }
        });
    });
});