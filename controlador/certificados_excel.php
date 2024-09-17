<?php
require_once '../controlador/conexion.php'; // Asegúrate de que la ruta es correcta
require_once '../vendor/autoload.php'; // Incluye PhpSpreadsheet

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class CertificadosExcel {
    public function exportToExcel() {
        // Conectar a la base de datos
        $db = new PDODB();
        $db->conectar();

        // Consultar la base de datos
        $sql = "SELECT id, numero_cedula, correo, codigo_verificacion, ubicacion_certificado, created_ate 
                FROM certificados";
        $result = $db->getData($sql);

        // Crear un nuevo objeto Spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Encabezados de columna
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Número de Cédula');
        $sheet->setCellValue('C1', 'Correo');
        $sheet->setCellValue('D1', 'Código de Verificación');
        $sheet->setCellValue('E1', 'Ubicación del Certificado');
        $sheet->setCellValue('F1', 'Fecha de Creación');

        // Iterar sobre los resultados de la consulta y escribir en el archivo Excel
        $row = 2;
        foreach ($result as $row_data) {
            $sheet->setCellValue('A' . $row, $row_data['id']);
            $sheet->setCellValue('B' . $row, $row_data['numero_cedula']);
            $sheet->setCellValue('C' . $row, $row_data['correo']);
            $sheet->setCellValue('D' . $row, $row_data['codigo_verificacion']);
            $sheet->setCellValue('E' . $row, $row_data['ubicacion_certificado']);
            $sheet->setCellValue('F' . $row, $row_data['created_ate']);
            $row++;
        }

        // Configurar el nombre del archivo Excel que se descargará
        $filename = 'certificados.xlsx';

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
$certificadosExcel = new CertificadosExcel();
$certificadosExcel->exportToExcel();
?>
