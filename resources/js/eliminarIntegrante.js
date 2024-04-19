// Manejo del clic en el botón de abrir modal
$(document).on('click', '#openElimInt', function() {
    var idIntegrante = $(this).data('id-integrante');
    var idRepresentante = $(this).data('id-representante');
    // Asignar los IDs y nombres a los campos correspondientes en la modal
    $('#idIntegrante').val(idIntegrante);
    // Actualizar la acción del formulario con los IDs del integrante y del representante
    var formEliminarIntegrante = document.getElementById('formEliminarIntegrante');
    var action = formEliminarIntegrante.action.replace('__ID_INTEGRANTE__', idIntegrante);
    action = action.replace('__ID_REPRESENTANTE__', idRepresentante);
    formEliminarIntegrante.action = action;
    // Mostrar la modal
    var myModal = new bootstrap.Modal(document.getElementById('validElimInt'));
    myModal.show();
});
