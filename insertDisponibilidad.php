<?php
header('Content-Type: application/json');

require 'vendor/autoload.php';
include_once './controlador/conexion.php';

// Importar la clase necesaria para la lectura de archivos Excel
use PhpOffice\PhpSpreadsheet\IOFactory;

$respuesta = ['estado' => 'error', 'mensaje' => ''];

try {
    // Verificar si el archivo ha sido subido correctamente
    if (!isset($_FILES['plantilla']) || $_FILES['plantilla']['error'] !== UPLOAD_ERR_OK) {
        throw new Exception('Error al subir el archivo');
    }

    $archivoTemporal = $_FILES['plantilla']['tmp_name'];
    $extArchivo = pathinfo($_FILES['plantilla']['name'], PATHINFO_EXTENSION);

    if ($extArchivo !== 'xlsx' && $extArchivo !== 'xls') {
        throw new Exception('Error: solo puedes subir archivos .xlsx o .xls');
    }

    // Cargar el archivo Excel
    $documento = IOFactory::load($archivoTemporal);
    $hoja = $documento->getActiveSheet();

    // Leer los datos del archivo Excel
    $contenido = [];
    foreach ($hoja->getRowIterator() as $fila) {
        $iteradorCeldas = $fila->getCellIterator();
        $iteradorCeldas->setIterateOnlyExistingCells(FALSE);

        $datosFila = [];
        foreach ($iteradorCeldas as $celda) {
            $valor = trim($celda->getValue());
            if ($valor !== '') {
                $datosFila[] = $valor;
            }
        }

        // Solo añadir filas no vacías
        if (!empty($datosFila)) {
            $contenido[] = $datosFila;
        }
    }

    // Eliminar el encabezado (si existe)
    if (!empty($contenido)) {
        array_shift($contenido);
    }

    // Crear la instancia de la clase PDODB y ejecutar el método conectar
    $pdo = new PDODB();
    $pdo->conectar();

    // Limpiar las tablas (opcional, para pruebas)
    // $tablasParaEliminar = ['calendario', 'franjas_horarias', 'municipios'];
    // foreach ($tablasParaEliminar as $tabla) {
    //     $sqlEliminar = "DELETE FROM " . $tabla;
    //     $pdo->ejecutar($sqlEliminar);
    // }

    // Insertar datos en la tabla municipios
    foreach ($contenido as $fila) {
        if (count($fila) === 6) { // Cambia el conteo a 6 para incluir el departamento
            list($nombreMunicipio, $departamento, $dia, $mes, $horaInicio, $horaFin) = $fila;

            if ($nombreMunicipio && $departamento && $dia && $mes && $horaInicio && $horaFin) {
                // Verificar si el departamento ya existe
                $sqlObtenerIdDepartamento = "SELECT id FROM departamentos WHERE nombre = :nombre";
                $stmt = $pdo->prepare($sqlObtenerIdDepartamento);
                $stmt->bindParam(':nombre', $departamento, PDO::PARAM_STR);
                $stmt->execute();
                $resultadoDepartamento = $stmt->fetch(PDO::FETCH_ASSOC);
                $idDepartamento = $resultadoDepartamento ? $resultadoDepartamento['id'] : null;

                // Si el departamento no existe, insertarlo
                if (!$idDepartamento) {
                    $sqlInsertarDepartamento = "INSERT INTO departamentos (nombre) VALUES (:nombre)";
                    $stmt = $pdo->prepare($sqlInsertarDepartamento);
                    $stmt->bindParam(':nombre', $departamento, PDO::PARAM_STR);
                    $stmt->execute();
                    $idDepartamento = $pdo->lastInsertId();
                }

                // Verificar si el municipio ya existe
                $sqlObtenerIdMunicipio = "SELECT id FROM municipios WHERE nombre = :nombre AND departamento_id = :departamento_id";
                $stmt = $pdo->prepare($sqlObtenerIdMunicipio);
                $stmt->bindParam(':nombre', $nombreMunicipio, PDO::PARAM_STR);
                $stmt->bindParam(':departamento_id', $idDepartamento, PDO::PARAM_INT);
                $stmt->execute();
                $resultadoMunicipio = $stmt->fetch(PDO::FETCH_ASSOC);
                $idMunicipio = $resultadoMunicipio ? $resultadoMunicipio['id'] : null;

                // Si el municipio no existe, insertarlo
                if (!$idMunicipio) {
                    $sqlInsertarMunicipio = "INSERT INTO municipios (nombre, departamento_id) VALUES (:nombre, :departamento_id)";
                    $stmt = $pdo->prepare($sqlInsertarMunicipio);
                    $stmt->bindParam(':nombre', $nombreMunicipio, PDO::PARAM_STR);
                    $stmt->bindParam(':departamento_id', $idDepartamento, PDO::PARAM_INT);
                    $stmt->execute();
                    $idMunicipio = $pdo->lastInsertId();
                }

                // Insertar en la tabla franjas_horarias
                $sqlInsertarFranjas = "INSERT INTO franjas_horarias (dia, mes, hora_inicio, hora_fin, municipio_id) VALUES (:dia, :mes, :hora_inicio, :hora_fin, :municipio_id)";
                $parametrosFranjas = [
                    'dia' => $dia,
                    'mes' => $mes,
                    'hora_inicio' => $horaInicio,
                    'hora_fin' => $horaFin,
                    'municipio_id' => $idMunicipio
                ];
                $stmt = $pdo->prepare($sqlInsertarFranjas);
                $stmt->execute($parametrosFranjas);

                // Insertar en la tabla calendario
                $sqlInsertarCalendario = "INSERT INTO calendario (municipio_id, dia, mes) VALUES (:municipio_id, :dia, :mes)";
                $parametrosCalendario = [
                    'municipio_id' => $idMunicipio,
                    'dia' => $dia,
                    'mes' => $mes
                ];
                $stmt = $pdo->prepare($sqlInsertarCalendario);
                $stmt->execute($parametrosCalendario);
            } else {
                error_log("Fila ignorada debido a datos incompletos o vacíos: " . implode(', ', $fila));
            }
        } else {
            error_log("Fila ignorada debido a cantidad incorrecta de columnas: " . implode(', ', $fila));
        }
    }

    // Cerrar la conexión
    $pdo->close();

    // Enviar respuesta exitosa a JavaScript
    $respuesta['estado'] = 'success';
    $respuesta['mensaje'] = 'Datos procesados con éxito';

} catch (Exception $e) {
    // En caso de error, mostrar mensaje de error
    $respuesta['mensaje'] = 'Error en el procesamiento: ' . $e->getMessage();
}

// Enviar la respuesta como JSON a JavaScript
echo json_encode($respuesta);
?>
