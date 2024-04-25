// Manejo del clic en el botón de abrir modal
$(document).on('click', '#openEliminar', function() {
    var idRepresentante = $(this).data('id');
    // Obtener el campo oculto del ID del representante
    var inputIdRepresentante = document.getElementById('idRepresentante');
    // Asignar el ID del representante al campo oculto
    inputIdRepresentante.value = idRepresentante;
    // Actualizar la acción del formulario con el ID del representante
    var formEliminarRepresentante = document.getElementById('formEliminarRepresentante');
    var action = formEliminarRepresentante.action.replace('__ID__', idRepresentante);
    formEliminarRepresentante.action = action;
    // Mostrar la modal
    var myModal = new bootstrap.Modal(document.getElementById('validElim'));
    myModal.show();
});