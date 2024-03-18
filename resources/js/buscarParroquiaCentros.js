$(document).ready(function () {
    $('#parroquia_id').change(function () {
        alert('aqui andoooooooooooooo');
        var parroquiaId = $(this).val();
        $.ajax({
            url: baseUrl + "/representante/create" + parroquiaId,
            type: 'GET',
            success: function (response) {
                $('#centroSelect').empty();
                $.each(response, function (index, centro) {
                    $('#centroSelect').append('<option value="' + centro.id + '">' + centro.nombre + '</option>');
                });
            }
        });
    });
});