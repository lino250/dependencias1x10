// Funciones para el segundo formulario
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
