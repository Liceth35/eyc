document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('loginForm');

    loginForm.addEventListener('submit', function(event) {
        const cedulaInput = document.getElementById('cedula');
        const passwordInput = document.getElementById('password');

        if (cedulaInput.value.trim() === '' || passwordInput.value.trim() === '') {
            event.preventDefault(); // Evitar que se envíe el formulario
            alert('Por favor, completa todos los campos.');
        }
        // Puedes agregar más validaciones aquí según tus requisitos
    });
});
