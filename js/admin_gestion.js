// traduccion a español del datatables
$(document).ready(function() {
    $('#citas-table').DataTable({
        "language": {
            "sEmptyTable": "No hay datos disponibles en la tabla",
            "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
            "sInfoEmpty": "Mostrando 0 a 0 de 0 Citas",
            "sInfoFiltered": "(filtrado de _MAX_ entradas en total)",
            "sLengthMenu": "Mostrar _MENU_ Citas",
            "sLoadingRecords": "Cargando...",
            "sProcessing": "Procesando...",
            "sSearch": "Buscar:",
            "sZeroRecords": "No se encontraron Citas",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": activar para ordenar la columna de manera descendente"
            }
        }
    });
});

// funcion de cerrar sesion
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

// cancelar cita
function confirmarCancelacion(citaId) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: `¿Realmente deseas cancelar la cita con ID ${citaId}?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, cancelar',
        cancelButtonText: 'No, cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            // Realiza la cancelación por AJAX si se confirma
            cancelarCita(citaId);
        }
    });
    console.log(citaId);
}
// confirmar laa cancelación de la cita
function cancelarCita(citaId) {
  Swal.fire({
      title: '¿Estás seguro?',
      text: "No podrás recuperar esta cita después de eliminarla.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sí, cancelar',
      cancelButtonText: 'No, cancelar'
  }).then((result) => {
      if (result.isConfirmed) {
          // Si el usuario confirma, procede con la eliminación
          $.ajax({
              url: 'cancelarCita.php', // Asegúrate de que la ruta es correcta
              type: 'POST',
              data: { id: citaId }, // Envía el ID de la cita
              success: function(response) {
                  console.log("Respuesta del servidor:", response); // Agrega esta línea para depurar
                  if (response.status === 'success') {
                      Swal.fire(
                          'Cancelado!',
                          'La cita ha sido cancelada.',
                          'success'
                      ).then(() => {
                          // Recarga la página o actualiza la tabla
                          location.reload();
                      });
                  } else {
                      Swal.fire(
                          'Error!',
                          response.message,
                          'error'
                      );
                  }
              },
              error: function(xhr, status, error) {
                  console.error("Error en la solicitud:", status, error); // Agrega esta línea para depurar
                  Swal.fire(
                      'Error!',
                      'Hubo un problema con la solicitud.',
                      'error'
                  );
              }
          });
      }
  });
}

