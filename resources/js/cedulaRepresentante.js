$(document).ready(function() {
    $('#formSearch').submit(function(event) {
        // Evita que el formulario se envíe de forma predeterminada
        event.preventDefault();

        // Obtiene la cédula del input deshabilitado
        var cedula = $('#cedulaRepresentante').val();
        
        // Actualiza el contenido del párrafo con la cédula mostrada
        $('#cedulaMostrada').text('Cédula: ' + cedula);

        // Construye la URL con la cédula y la ruta base
        var nuevaURL = baseRoute + '?cedula=' + cedula;
        $('#crearLink').attr('href', nuevaURL);

        // Aquí puedes realizar cualquier otra lógica necesaria con la respuesta JSON
        // Por ejemplo, abrir el modal solo si showModal es true
        if (response.showModal == 1) {
            var modal = new bootstrap.Modal(document.getElementById('validReprent'));
            modal.show();
        }

        // También puedes realizar otras acciones, como actualizar la tabla de representantes
        // o mostrar mensajes en la interfaz de usuario según sea necesario
    });
});

  /*document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('formSearch');
    const cedulaInput = document.getElementById('cedulaRepresentante');
    const cedulaMostrada = document.getElementById('cedulaMostrada'); // Obtén el párrafo

    form.addEventListener('submit', function (event) {
        event.preventDefault();
        const cedula = cedulaInput.value;
           // Sustituye el contenido del párrafo con la cédula entrante
           cedulaMostrada.textContent = `Cédula: ${cedula}`;
        // Construye la URL con la cédula y actualiza el enlace "Crear"
        const crearLink = document.getElementById('crearLink');
        const baseRoute = '{{ route('representante.create') }}';
        const nuevaURL = `${baseRoute}?cedula=${cedula}`;
        crearLink.setAttribute('href', nuevaURL);

        // Abre el modal u otra lógica que necesites
        const modal = new bootstrap.Modal(document.getElementById('validReprent'));
        modal.show();
    });
});*/