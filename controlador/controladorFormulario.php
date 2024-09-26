<?php
include './conexion.php';

// CREAR CONEXIÓN
$db = new PDODB();
$db->conectar();
$conn = $db->getConexion();  // Obtener la conexión activa

// CREAR INSPECTOR
if (isset($_POST['crear_inspector'])) {
    $nombre = $_POST['nombre'];
    $cedula = $_POST['cedula'];  // Añadir el campo cédula
    $id_supervisor = $_POST['id_supervisor'];  // Añadir el campo id_supervisor

    // Inserta el nombre, la cédula y el id del supervisor en la tabla inspectores
    $sql = "INSERT INTO inspectores (nombre, cedula, id_supervisor) VALUES ('$nombre', '$cedula', '$id_supervisor')";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../formulario.php?success=Inspector creado exitosamente.");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// CREAR SUPERVISOR
if (isset($_POST['crear_supervisor'])) {
    $nombre = $_POST['nombre'];
    $cedula = $_POST['cedula'];  // Añadir campo de cédula

    // Inserta en la tabla supervisores
    $sql = "INSERT INTO supervisores (nombre, cedula) VALUES ('$nombre', '$cedula')";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../formulario.php?success=Supervisor creado exitosamente.");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// EDITAR INSPECTOR
if (isset($_POST['editar_inspector'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $cedula = $_POST['cedula'];  // Añadir campo cédula
    $id_supervisor = $_POST['id_supervisor'];  // Añadir campo id_supervisor

    $sql = "UPDATE inspectores SET nombre='$nombre', cedula='$cedula', id_supervisor='$id_supervisor' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../formulario.php?success=Inspector editado exitosamente.");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// ELIMINAR INSPECTOR
if (isset($_GET['eliminar_inspector'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM inspectores WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../formulario.php?success=Inspector eliminado exitosamente.");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// GUARDAR CALIFICACIÓN
if (isset($_POST['guardar_calificacion'])) {
    $id_inspector = $_POST['id_inspector'];
    $inspections = $_POST['inspections'];
    $suspensions = $_POST['suspensions'];
    $photoEvidence = $_POST['photoEvidence'];
    $supervisionResults = $_POST['supervisionResults'];
    $complaints = $_POST['complaints'];

    $sql = "INSERT INTO calificaciones (id_inspector, productividad, suspensiones, calidad_fotos, calidad_supervisiones, ausencia_quejas)
            VALUES ('$id_inspector', '$inspections', '$suspensions', '$photoEvidence', '$supervisionResults', '$complaints')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../formulario.php?success=Calificación guardada exitosamente.");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// EDITAR CALIFICACIÓN
if (isset($_POST['editar_calificacion'])) {
    $id = $_POST['id'];
    $inspections = $_POST['inspections'];
    $suspensions = $_POST['suspensions'];
    $photoEvidence = $_POST['photoEvidence'];
    $supervisionResults = $_POST['supervisionResults'];
    $complaints = $_POST['complaints'];

    $sql = "UPDATE calificaciones SET 
            productividad='$inspections', 
            suspensiones='$suspensions', 
            calidad_fotos='$photoEvidence', 
            calidad_supervisiones='$supervisionResults', 
            ausencia_quejas='$complaints'
            WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../formulario.php?success=Calificación editada exitosamente.");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// ELIMINAR CALIFICACIÓN
if (isset($_GET['eliminar_calificacion'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM calificaciones WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../formulario.php?success=Calificación eliminada exitosamente.");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn = null;  // Cerrar conexión
?>
