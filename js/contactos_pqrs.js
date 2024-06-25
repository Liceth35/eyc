document.addEventListener('DOMContentLoaded', function() {
    fetch('controlador/get_contacts.php')
        .then(response => response.json())
        .then(data => {
            const tableBody = document.getElementById('contactTableBody');
            data.forEach((contact, index) => {
                const row = document.createElement('tr');

                const cellIndex = document.createElement('td');
                cellIndex.textContent = index + 1;
                row.appendChild(cellIndex);

                const cellNombre = document.createElement('td');
                cellNombre.textContent = contact.nombre;
                row.appendChild(cellNombre);

                const cellTelefono = document.createElement('td');
                cellTelefono.textContent = contact.telefono;
                row.appendChild(cellTelefono);

                const cellCorreo = document.createElement('td');
                cellCorreo.textContent = contact.correo;
                row.appendChild(cellCorreo);

                const cellMensaje = document.createElement('td');
                cellMensaje.textContent = contact.mensaje;
                row.appendChild(cellMensaje);

                tableBody.appendChild(row);
            });
        })
        .catch(error => console.error('Error fetching contacts:', error));
});
