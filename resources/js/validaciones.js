// En el archivo validaciones.js

// Función para limitar la longitud del número de teléfono a 11 dígitos máximo
document.getElementById('cedula').addEventListener('keydown', function(event) {
    let key = event.key;
    if (!(key >= '0' && key <= '9') && key !== 'Backspace') {
        event.preventDefault();
    } else if (key === 'Backspace' || this.value.length < 11) {
        return true;
    } else {
        event.preventDefault();
    }
});

document.getElementById('telefonoInt').addEventListener('keydown', function(event) {
    let key = event.key;
    if (!(key >= '0' && key <= '9') && key !== 'Backspace') {
        event.preventDefault();
    } else if (key === 'Backspace' || this.value.length < 11) {
        return true;
    } else {
        event.preventDefault();
    }
});

document.getElementById('telefonoAlternativo').addEventListener('keydown', function(event) {
    let key = event.key;
    if (!(key >= '0' && key <= '9') && key !== 'Backspace') {
        event.preventDefault();
    } else if (key === 'Backspace' || this.value.length < 11) {
        return true;
    } else {
        event.preventDefault();
    }
});

document.getElementById('nombresInt').addEventListener('keydown', function(event) {
    let key = event.key;
    if (/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]$/.test(key)) {
        return true;
    } else if (key === 'Backspace' || key === 'Delete' || key === 'ArrowLeft' || key === 'ArrowRight' || key === 'Tab') {
        return true;
    } else {
        event.preventDefault();
        return false;
    }
});

document.getElementById('apellidosInt').addEventListener('keydown', function(event) {
    let key = event.key;
    if (/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]$/.test(key)) {
        return true;
    } else if (key === 'Backspace' || key === 'Delete' || key === 'ArrowLeft' || key === 'ArrowRight' || key === 'Tab') {
        return true;
    } else {
        event.preventDefault();
        return false;
    }
});

document.getElementById('telefValic').addEventListener('keydown', function(event) {
    let key = event.key;
    if (!(key >= '0' && key <= '9') && key !== 'Backspace') {
        event.preventDefault();
    } else if (key === 'Backspace' || this.value.length < 11) {
        return true;
    } else {
        event.preventDefault();
    }
});

document.getElementById('telefValic2').addEventListener('keydown', function(event) {
    let key = event.key;
    if (!(key >= '0' && key <= '9') && key !== 'Backspace') {
        event.preventDefault();
    } else if (key === 'Backspace' || this.value.length < 11) {
        return true;
    } else {
        event.preventDefault();
    }
});

document.getElementById('nombresField').addEventListener('keydown', function(event) {
    let key = event.key;
    if (/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]$/.test(key)) {
        return true;
    } else if (key === 'Backspace' || key === 'Delete' || key === 'ArrowLeft' || key === 'ArrowRight' || key === 'Tab') {
        return true;
    } else {
        event.preventDefault();
        return false;
    }
});
