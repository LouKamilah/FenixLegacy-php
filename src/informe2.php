<?php
session_start();
if (empty($_SESSION["id_login"])) {
    header("location:index.php");
}
include "conexion.php";

//se implementa libreria
//AddPage(orientacion[PORTRAIT, LANDSCAPE], tamaño[A3, A5, Letter, Legal], rotacion)
//SetFont(tipo[Courier, helvetica, ariel, times, symbol, zapdingbats], estilo[normal, B, I, U], tamaño)
//Cell(ancho, alto, texto, bordes, posicion de la celda, alineacion, rellenar, link)
//Write(alto, texto, link)
//OutPut(destino[I{lo muestra en el nav}, D{lo descarga}, F{lo guarda dentro de los archivos directos}, S{lo guarda en una cadena}], nombre_archivo, utf8)
//Image(ruta, posicion, posicionx, posiciony, ancho, alto, tipo, link)
//$fpdf->PageNo();
//$fpdf->AliasNbPages();
require('fpdf/fpdf.php');
$fpdf = new FPDF();
$fpdf->AddPage('portrait', 'A4');
class pdf extends FPDF{
    public function header()
    {
        $inicio=$_GET["FIn"];
        $fin=$_GET["FFn"];
        $this->SetFont('Courier', 'B', 12);
        $this->Image('..\img/agrosuper-logo.png', 10, 7, 40, 15,'png');
        $this->SetX(-50);
        $this->Write(5, 'Harinas de Ave');
        $this->SetFont('Courier', 'B', 20);
        $this->SetY(30);
        $this->SetTextColor(205,205,205);
        $this->Cell(0, 5, 'INFORME DE SACOS POR FECHAS', 0, 0, 'C');
        $this->SetFont('Courier', 'B', 15);
        $this->SetY(35);
        $this->SetTextColor(0,0,0);
        $this->Ln(15);
        $this->Cell(0, 5, "PERIODO DESDE ".$inicio." HASTA ".$fin, 0, 0);
        $this->Ln(20);
        $this->SetAutoPageBreak(true,30);
    }
    public function footer()
    {
        $this->SetFont('Courier', 'B', 10);
        $this->SetY(-15);
        $this->Write(5, 'Lo Miranda, Chile');
        $this->AliasNbPages(); 
        $this->SetX(-25);
        $this->Write(5, $this->PageNo().'/{nb}'); 
    }
}
include "conexion.php";
$inicio=$_GET["FIn"];
$fin=$_GET["FFn"];
$fpdf = new pdf();
$fpdf->AddPage('portrait', 'A4');

$i = 0;
$fpdf->SetFont('Arial', '', 10);
$fpdf->SetFillColor(205,205,205);
$fpdf->SetDrawColor(88);
$fpdf->Cell(20, 5, 'ID de Saco', 1, 0, 'C', true);
$fpdf->Cell(32, 5, 'Fecha Elaboracion', 1, 0, 'C', true);
$fpdf->Cell(23, 5, 'Lote', 1, 0, 'C', true);
$fpdf->Cell(23, 5, 'Lote Nuevo', 1, 0, 'C', true);
$fpdf->Cell(23, 5, 'Humedad', 1, 0, 'C', true);
$fpdf->Cell(23, 5, 'Temperatura', 1, 0, 'C', true);
$fpdf->Cell(23, 5, 'Proteina', 1, 0, 'C', true);
$fpdf->Cell(23, 5, 'Kilos', 1, 0, 'C', true);

$consulta_tabla = $conexion->query("SELECT saco.id_saco AS idsaco, saco.fecha_elaboracion AS elab, saco.lote, saco.lote_nuevo As loten, saco.humedad, saco.temperatura_de_envasado AS temp, saco.proteina, saco.kilos FROM saco WHERE saco.fecha_elaboracion between '$inicio' and '$fin'");

while ($datos = $consulta_tabla->fetch_object()) {
    $i = $i + 1;
    $fpdf->Ln();
    $fpdf->Cell(20, 10, $datos->idsaco, 1, 0, 'C', false);
    $fpdf->Cell(32, 10, $datos->elab, 1, 0, 'C', false);
    $fpdf->Cell(23, 10, $datos->lote, 1, 0, 'C', false);
    $fpdf->Cell(23, 10, $datos->loten, 1, 0, 'C', false);
    $fpdf->Cell(23, 10, $datos->humedad, 1, 0, 'C', false);
    $fpdf->Cell(23, 10, $datos->temp, 1, 0, 'C', false);
    $fpdf->Cell(23, 10, $datos->proteina, 1, 0, 'C', false);
    $fpdf->Cell(23, 10, $datos->kilos, 1, 0, 'C', false);
}


$fpdf->OutPut('D','InformeSacosPorFecha.pdf');


?>
