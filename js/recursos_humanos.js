document.addEventListener("DOMContentLoaded", function() {
    fetch('controlador/get_files.php')
        .then(response => response.json())
        .then(data => {
            const tableBody = document.getElementById('fileTableBody');
            data.forEach((item, index) => {
                const row = document.createElement('tr');

                row.innerHTML = `
                    <td>${index + 1}</td>
                    <td>${item.nombre}</td>
                    <td>${item.correo}</td>
                    <td>${item.celular}</td>
                    <td>${item.tipo_documento}</td>
                    <td>${item.numero_documento}</td>
                    <td>${item.departamento}</td>
                    <td>${item.ciudad}</td>
                    <td>${item.profesion}</td>
                    <td>${item.mensaje}</td>
                    <td><a href="${item.archivo_adjunto}" target="_blank">Ver Archivo</a></td>
                    <td class="actions">
                        <button class="btn-action">Ver Archivo Modal</button>
                        <button class="btn-action">Ver Archivo Página</button>
                    </td>
                `;
                tableBody.appendChild(row);
            });
        });
});
