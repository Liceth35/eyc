function cerrarSesion() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
            if (this.status == 200) {
                console.log("Sesión cerrada"); // Para depurar
                window.location.replace("index.php");
            } else {
                console.log("Error al cerrar sesión"); // Para depurar
            }
        }
    };
    xhttp.open("GET", "./controlador/logaout.php", true);
    xhttp.send();
}

window.onload = function() {
    if (window.history.length > 1) {
        window.history.forward();
    }
}

// enviar archivo a insertDisponibilidad.php para lectura e insersión de la disponibilidad
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('subirArchivo').addEventListener('click', function() {
        let form = document.getElementById('cargarDisponibilidadform');
        let formData = new FormData(form);

        fetch('./insertDisponibilidad.php', {
            method: 'POST',
            body: formData
        })
        .then(respuesta => {
            if (!respuesta.ok) {
                throw new Error('ALgo salió mal' + respuesta.statusText);
            }
            return respuesta.json();
        })
        .then(data => {
            if (data.estado === 'success') {
                Swal.fire({
                    title: 'Agenda Cargada correctamente',
                    text: ' '+ data.mensaje,
                    icon: 'success',
                    confirmButtonText: 'De acuerdo'
                  })
            } else {
                Swal.fire({
                    title: 'Algo salió mal',
                    text: 'Algo salió mal ' + data.mensaje,
                    icon: 'error',
                    confirmButtonText: 'Volver a intentarlo'
                  })
            }
        })
        .catch(error => {
            Swal.fire({
                title: 'Algo salió mal',
                text: 'Algo salió mal' + error,
                icon: 'error',
                confirmButtonText: 'Volver a intentarlo'
              })
        });
    });
});
