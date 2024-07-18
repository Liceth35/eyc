<?php
require_once './conexion.php';
require_once '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="disponibilidad.xlsx"');
header('Cache-Control: max-age=0');

$db = new PDODB();
$db->conectar();

$query = "SELECT municipio, fecha, hora_inicio, hora_fin FROM disponibilidad";
$stmt = $db->getConexion()->query($query);

if ($stmt) {
    $disponibilidades = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'Municipio');
    $sheet->setCellValue('B1', 'Fecha');
    $sheet->setCellValue('C1', 'Hora Inicio');
    $sheet->setCellValue('D1', 'Hora Fin');

    $rowNum = 2;
    foreach ($disponibilidades as $disponibilidad) {
        $sheet->setCellValue('A' . $rowNum, $disponibilidad['municipio']);
        $sheet->setCellValue('B' . $rowNum, $disponibilidad['fecha']);
        $sheet->setCellValue('C' . $rowNum, $disponibilidad['hora_inicio']);
        $sheet->setCellValue('D' . $rowNum, $disponibilidad['hora_fin']);
        $rowNum++;
    }

    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Error al cargar disponibilidad']);
}

$db->close();
?>
