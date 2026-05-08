function showSuccessAlert(message) {

    Swal.fire({
        icon: 'success',
        title: 'Correcto',
        text: message
    });
}

function showErrorAlert(message) {

    Swal.fire({
        icon: 'error',
        title: 'Error',
        text: message
    });
}