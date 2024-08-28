document.getElementById("view-more-btn").addEventListener("click", function() {
    const workerList = document.getElementById("worker-list");

    const moreWorkers = [
        { name: "Trabajador 7", score: 65 },
        { name: "Trabajador 8", score: 60 },
        { name: "Trabajador 9", score: 55 },
        // Puedes agregar más trabajadores aquí
    ];

    moreWorkers.forEach(worker => {
        const li = document.createElement("li");
        li.textContent = `${worker.name} - ${worker.score} puntos`;
        workerList.appendChild(li);
    });

    this.style.display = "none"; // Oculta el botón después de mostrar más trabajadores
});
