document.getElementById('contactForm').addEventListener('submit', function (event) {
    const consent = document.getElementById('consent');
    if (!consent.checked) {
        alert('Debes autorizar el contacto para continuar.');
        event.preventDefault();
    }
});
