<?php
require('fpdf182/fpdf.php');

  



class PDF extends FPDF
{
// Cabecera de página



function Header()
{
   //$this->Image('imges/uv.png','0','80','210','100','png');
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,utf8_decode('Reporte de ventas Canceladas'),0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->SetFont('Arial','',7);

    $this->cell(10, 10, 'Id', 1, 0, 'C', 0);
    $this->cell(15, 10, 'Producto', 1, 0, 'C', 0);
    $this->cell(15, 10, 'Cantidad', 1, 0, 'C', 0);
    $this->cell(15, 10, 'Costo', 1, 0, 'C', 0);
    $this->cell(30, 10, 'Cliente', 1, 0, 'C', 0);
    $this->cell(15, 10, 'Estado', 1, 0, 'C', 0);
    $this->cell(30, 10, 'Fecha', 1, 0, 'C', 0);
    $this->cell(35, 10, 'Token', 1, 1, 'C', 0);



}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

require 'BD.php';
/*$sql = "SELECT a.id_actividad, a.id_alumno, e.nombre_estudiante, a.descripcion_actividad, a.fecha_actividad, a.prioridad, u.nombre_ubicacion
FROM actividades a INNER JOIN ubicaciones u 
    ON a.id_ubicacion = u.id_ubicacion
        INNER JOIN estudiante e
            ON a.id_alumno = e.id_alumno";*/

$sql ="SELECT * FROM Pedido WHERE Estado_Pedido ='Cancelada'";            
$res = $conexion_BD->query($sql);



$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',6);


while ($row =  mysqli_fetch_array($res))
{
    $pdf->cell(10, 10, $row['Id_Pedido'], 1, 0, 'C', 0);
    $pdf->cell(15, 10, $row['Id_Producto'], 1, 0, 'C', 0);
    $pdf->cell(15, 10, $row['Cantidad_Producto'], 1, 0, 'C', 0);
    $pdf->cell(15, 10, $row['Precio_Pedido'], 1, 0, 'C', 0);
    $pdf->cell(30, 10, $row['Cliente_Pedido'], 1, 0, 'C', 0);
    $pdf->cell(15, 10, $row['Estado_Pedido'], 1, 0, 'C', 0);
    $pdf->cell(30, 10, $row['Fecha_Pedido'], 1, 0, 'C', 0);
    $pdf->cell(35, 10, $row['Token_Pedido'], 1, 1, 'C', 0);


}

$pdf->Output();



