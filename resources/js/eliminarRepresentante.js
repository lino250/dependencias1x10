document.addEventListener("DOMContentLoaded", function() {
    var deleteButton = document.querySelector(".delete-button");
    var createButton = document.getElementById("createButton");

    deleteButton.addEventListener("click", function(event) {
        event.preventDefault();
        var modal = new bootstrap.Modal(document.getElementById('validElim'));
        modal.show();

        // Modificar el enlace "Crear" para que cambie su comportamiento
        createButton.setAttribute("href", deleteButton.getAttribute("href"));
        createButton.textContent = "Eliminar"; // Cambiar el texto del botón "Crear" a "Eliminar"
    });
});

