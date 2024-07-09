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

        // Consultar la base de datos
        $sql = "SELECT id, nombre, correo, celular, tipo_documento, numero_documento, departamento, ciudad, profesion, tipo_moto, modelo_moto, estado_propiedad, mensaje, archivo_adjunto FROM hoja_de_vida";
        $result = $db->getData($sql);

        // Crear un nuevo objeto Spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Encabezados de columna
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Nombre');
        $sheet->setCellValue('C1', 'Correo');
        $sheet->setCellValue('D1', 'Celular');
        $sheet->setCellValue('E1', 'Tipo Documento');
        $sheet->setCellValue('F1', 'Número Documento');
        $sheet->setCellValue('G1', 'Departamento');
        $sheet->setCellValue('H1', 'Ciudad');
        $sheet->setCellValue('I1', 'Profesión');
        $sheet->setCellValue('J1', 'Tipo Moto');
        $sheet->setCellValue('K1', 'Modelo Moto');
        $sheet->setCellValue('L1', 'Estado Propiedad');
        $sheet->setCellValue('M1', 'Mensaje');
        $sheet->setCellValue('N1', 'Archivo Adjunto');

        // Iterar sobre los resultados de la consulta y escribir en el archivo Excel
        $row = 2;
        foreach ($result as $row_data) {
            $sheet->setCellValue('A' . $row, $row_data['id']);
            $sheet->setCellValue('B' . $row, $row_data['nombre']);
            $sheet->setCellValue('C' . $row, $row_data['correo']);
            $sheet->setCellValue('D' . $row, $row_data['celular']);
            $sheet->setCellValue('E' . $row, $row_data['tipo_documento']);
            $sheet->setCellValue('F' . $row, $row_data['numero_documento']);
            $sheet->setCellValue('G' . $row, $row_data['departamento']);
            $sheet->setCellValue('H' . $row, $row_data['ciudad']);
            $sheet->setCellValue('I' . $row, $row_data['profesion']);
            $sheet->setCellValue('J' . $row, $row_data['tipo_moto']);
            $sheet->setCellValue('K' . $row, $row_data['modelo_moto']);
            $sheet->setCellValue('L' . $row, $row_data['estado_propiedad']);
            $sheet->setCellValue('M' . $row, $row_data['mensaje']);
            $sheet->setCellValue('N' . $row, $row_data['archivo_adjunto']);
            $row++;
        }

        // Configurar el nombre del archivo Excel que se descargará
        $filename = 'hoja_de_vida.xlsx';

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
