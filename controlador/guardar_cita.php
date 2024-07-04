<?php
require_once './conexion.php';

class AgendarCita {
    private $db;

    public function __construct() {
        $this->db = new PDODB();
        $this->db->conectar();
    }

    public function guardarCita($data) {
        $sql = "INSERT INTO citas (departamento, municipio, fecha, horario, tipo_documento, numero_documento, nombre, correo, movil, acepto_politica)
                VALUES (:departamento, :municipio, :fecha, :horario, :tipo_documento, :numero_documento, :nombre, :correo, :movil, :acepto_politica)";
        $params = [
            ':departamento' => $data['departamento'],
            ':municipio' => $data['municipio'],
            ':fecha' => $data['fecha'],
            ':horario' => $data['horario'],
            ':tipo_documento' => $data['tipo-documento'],
            ':numero_documento' => $data['numero-documento'],
            ':nombre' => $data['nombre'],
            ':correo' => $data['correo'],
            ':movil' => $data['movil'],
            ':acepto_politica' => isset($data['acepto_politica']) ? 1 : 0
        ];
        return $this->db->consulta($sql, $params);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar la existencia de cada campo antes de acceder a ellos
    $departamento = isset($_POST['departamento']) ? $_POST['departamento'] : null;
    $municipio = isset($_POST['municipio']) ? $_POST['municipio'] : null;
    $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : null;
    $horario = isset($_POST['horario']) ? $_POST['horario'] : null;
    $tipo_documento = isset($_POST['tipo-documento']) ? $_POST['tipo-documento'] : null;
    $numero_documento = isset($_POST['numero-documento']) ? $_POST['numero-documento'] : null;
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
    $correo = isset($_POST['correo']) ? $_POST['correo'] : null;
    $movil = isset($_POST['movil']) ? $_POST['movil'] : null;
    $acepto_politica = isset($_POST['politica']) ? true : false; // Para campos checkbox, verificar si está marcado

    // Validar que los campos obligatorios no estén vacíos
    $errors = array();
    if (empty($departamento)) {
        $errors[] = "El campo departamento es obligatorio.";
    }
    if (empty($municipio)) {
        $errors[] = "El campo municipio es obligatorio.";
    }
    if (empty($fecha)) {
        $errors[] = "El campo fecha es obligatorio.";
    }
    if (empty($horario)) {
        $errors[] = "El campo horario es obligatorio.";
    }
    if (empty($numero_documento)) {
        $errors[] = "El campo numero_documento es obligatorio.";
    }
    if (empty($tipo_documento)) {
        $errors[] = "El campo tipo_documento es obligatorio.";
    }
    if (!$acepto_politica) {
        $errors[] = "Debe aceptar la Política de Tratamiento de Datos.";
    }

    // Si hay errores, imprimirlos y detener el script
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "$error <br>";
        }
        exit; // Detener la ejecución si hay errores
    }

    // Procesar los datos (insertar en la base de datos u otro procesamiento)
    // Ejemplo de inserción en la base de datos usando PDO
    require_once('conexion.php'); // Asegúrate de que la conexión esté incluida correctamente
    $db = new PDODB();
    $db->conectar();

    // Preparar la consulta SQL para insertar los datos en la tabla 'citas'
    $sql = "INSERT INTO citas (departamento, municipio, fecha, horario, numero_documento, tipo_documento, nombre, correo, movil, acepto_politica)
            VALUES (:departamento, :municipio, :fecha, :horario, :numero_documento, :tipo_documento, :nombre, :correo, :movil, :acepto_politica)";
    $stmt = $db->prepare($sql);

    // Bind de parámetros
    $stmt->bindParam(':departamento', $departamento, PDO::PARAM_STR);
    $stmt->bindParam(':municipio', $municipio, PDO::PARAM_STR);
    $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
    $stmt->bindParam(':horario', $horario, PDO::PARAM_STR);
    $stmt->bindParam(':numero_documento', $numero_documento, PDO::PARAM_STR);
    $stmt->bindParam(':tipo_documento', $tipo_documento, PDO::PARAM_STR);
    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
    $stmt->bindParam(':movil', $movil, PDO::PARAM_STR);
    $stmt->bindParam(':acepto_politica', $acepto_politica, PDO::PARAM_BOOL);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Cita agendada correctamente.";
    } else {
        echo "Error al agendar la cita. Por favor, inténtelo nuevamente.";
    }

    // Cerrar la conexión
    $db->close();
}
