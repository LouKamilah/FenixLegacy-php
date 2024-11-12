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
        $id=$_GET["id"];
        include "conexion.php";
        $consulta_info = $conexion->query("SELECT cliente.nombre_cliente AS cliente FROM cliente WHERE cliente.id_cliente = '$id'");
        $datos = $consulta_info->fetch_object();
        $this->SetFont('Courier', 'B', 12);
        $this->Image('..\img/agrosuper-logo.png', 10, 7, 40, 15,'png');
        $this->SetX(-50);
        $this->Write(5, 'Harinas de Ave');
        $this->SetFont('Courier', 'B', 20);
        $this->SetY(30);
        $this->SetTextColor(205,205,205);
        $this->Cell(0, 5, 'INFORME DE CARGAS POR CLIENTE', 0, 0, 'C');
        $this->SetFont('Courier', 'B', 15);
        $this->SetY(35);
        $this->SetTextColor(0,0,0);
        $this->Ln(15);
        $this->Cell(0, 5, "KILOS TOTALES DE ".$datos->cliente, 0, 0);
        $consulta_info = $conexion->query("SELECT SUM(saco.kilos) AS total FROM saco,carga WHERE saco.id_carga = carga.id_carga AND carga.id_cliente = '$id'");
        $datos = $consulta_info->fetch_object();
        $this->Cell(0, 5, $datos->total." KG.", 0, 0,'R');
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
$id=$_GET["id"];
$fpdf = new pdf();
$fpdf->AddPage('portrait', 'A4');

$i = 0;
$fpdf->SetFont('Arial', '', 10);
$fpdf->SetFillColor(205,205,205);
$fpdf->SetDrawColor(88);
$fpdf->Cell(47, 5, 'ID de Carga', 1, 0, 'C', true);
$fpdf->Cell(47, 5, 'Numero de Carga', 1, 0, 'C', true);
$fpdf->Cell(47, 5, 'Cantidad de Sacos', 1, 0, 'C', true);
$fpdf->Cell(48, 5, 'Fecha de Creacion', 1, 0, 'C', true);

$consulta_tabla = $conexion->query("SELECT carga.id_carga AS idcarga,carga.numero_carga As ncarga, carga.cantidad_sacos_asignados AS nsacos, carga.fecha_elab AS elab FROM carga, cliente where carga.id_cliente = '$id' AND carga.id_cliente = cliente.id_cliente");

while ($datos = $consulta_tabla->fetch_object()) {
    $i = $i + 1;
    $fpdf->Ln();
    $fpdf->Cell(47, 10, $datos->idcarga, 1, 0, 'C', false);
    $fpdf->Cell(47, 10, $datos->ncarga, 1, 0, 'C', false);
    $fpdf->Cell(47, 10, $datos->nsacos, 1, 0, 'C', false);
    $fpdf->Cell(48, 10, $datos->elab, 1, 0, 'C', false);
}


$fpdf->OutPut('D','InformeCargaPorCliente.pdf');


?>
