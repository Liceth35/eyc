<?php
// Importar las clases necesarias
require_once './conexion.php';
require_once '../vendor/autoload.php'; // Incluye PhpSpreadsheet

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExportController {
    public function exportToExcel() {
        // Conectar a la base de datos
        $db = new PDODB();
        $db->conectar();

        // Obtener fechas desde el formulario
        $start_date = isset($_POST['start_date']) ? $_POST['start_date'] : '';
        $end_date = isset($_POST['end_date']) ? $_POST['end_date'] : '';

        // Consulta con filtro de fechas
        $sql = "SELECT * FROM contactos WHERE created_ate BETWEEN :start_date AND :end_date";
        $params = [
            ':start_date' => $start_date,
            ':end_date' => $end_date
        ];

        // Obtener datos filtrados
        $result = $db->consulta($sql, $params);

        // Crear un nuevo objeto Spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Encabezados de columna
        $sheet->setCellValue('A1', '#');
        $sheet->setCellValue('B1', 'Nombre');
        $sheet->setCellValue('C1', 'Teléfono');
        $sheet->setCellValue('D1', 'Correo');
        $sheet->setCellValue('E1', 'Mensaje');
        $sheet->setCellValue('F1', 'created_ate'); // Agregado para la fecha de creación

        // Iterar sobre los resultados de la consulta y escribir en el archivo Excel
        $row = 2;
        foreach ($result as $row_data) {
            $sheet->setCellValue('A' . $row, $row_data['id']);
            $sheet->setCellValue('B' . $row, $row_data['nombre']);
            $sheet->setCellValue('C' . $row, $row_data['telefono']);
            $sheet->setCellValue('D' . $row, $row_data['correo']);
            $sheet->setCellValue('E' . $row, $row_data['mensaje']);
            $sheet->setCellValue('F' . $row, $row_data['created_ate']); // Agregado para la fecha de creación
            $row++;
        }

        // Configurar el nombre del archivo Excel que se descargará
        $filename = 'exportacion_pqrs.xlsx';

        // Configurar encabezados HTTP para descargar el archivo
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Crear un Writer para Excel y guardar el archivo en la salida
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');

        // Cerrar la conexión a la base de datos
        $db->close();
    }
}

// Instanciar el controlador y llamar al método para exportar a Excel
$exportController = new ExportController();
$exportController->exportToExcel();
?>
