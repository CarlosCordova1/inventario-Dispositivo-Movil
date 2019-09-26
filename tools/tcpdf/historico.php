<?php
/******
*******
Histórico de consumo. JIMCH Agosto 2017
*******
******/

echo 'Entro al historico.php';
exit();
require('tcpdf/tcpdf.php');
$contrato = $_GET['contrato'];
if(isset($contrato)){

$urlws = 'https://www.aguakan.com/git/api/apiw.php?urlget=fmt/1.0/hisconsumo';
$postdata = array("contrato"=>$contrato);
$curl = curl_init($urlws);
curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($curl);
curl_close($curl);
$array = json_decode($response);
/*var_dump($array);
exit();*/

class MYPDF extends TCPDF {

   public function Header() {

      $cabecera = '
<table border="0">
   <tr>
      <td style="text-align:center;">Fecha</td>
      <td width="90" style="text-align:center;">Medidor</td>
      <td style="text-align:center;">Lec. inicial</td>
      <td style="text-align:center;">Lec. final</td>
      <td style="text-align:center;">Consumo(m3)</td>
      <td width="53" style="text-align:center;">Tipo</td>
      <td style="text-align:center;">Anomalía</td>
      <td width="53" style="text-align:center;">Facturado</td>
      <td style="text-align:center;">Monto</td>
   </tr>
</table>';

   if($this->PageNo()!=1){

        $this->SetXY(2, 11);
        $this->SetFont('helvetica', 'B', 9);
        $this->writeHTML($cabecera,true, false, true, false, '');}
    }

    public function Footer() {
        $this->SetY(-15);
        $this->SetFont('helvetica', 'I', 6);
        $this->Cell(0, 5, '                     27948_Htco_1.0', 0, false, 'L', 0, '', 0, false, 'T', 'M');
        $this->SetFont('helvetica', 'I', 9);
        $this->Cell(0, 10, 'Página '.$this->getAliasNumPage().' De '.$this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
    }
}

$htco = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$htco->SetMargins(0, 20, 5,0);
//$htco->setPrintHeader(false);
$htco->setFooterMargin(PDF_MARGIN_FOOTER);
$htco->AddPage();
$htco->SetTitle('Histórico de consumos');
$htco->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$htco->Image('img/dhc.png', 145, 5, 65, 19);
$htco->setFont('helvetica', 'B', 14);

$x=5;
$y=8;
$htco->SetXY($x, $y);
$htco->Cell(30, 8, 'HISTÓRICO DE CONSUMO');

/**
Datos generales
**/
$x=0;
$y=30;
$htco->SetXY($x, $y);
$htco->setFont('helvetica', 'B', 9);
//$htco->SetXY($x, $y);
$htco->Cell(20, 8, 'Contrato:','R', 0, 'R');
$htco->setFont('helvetica', '', 9);
$htco->Cell(20, 8, $array->contrato);

$y=$htco->GetY()+5;
$htco->SetXY($x, $y);
$htco->setFont('helvetica', 'B', 9);
$htco->Cell(20, 8, 'Cliente:','R', 0, 'R');
$htco->setFont('helvetica','',9);
$htco->Cell(20, 8, $array->cliente);

$y=$htco->GetY()+5;
$htco->SetXY($x,$y);
$htco->setFont('helvetica', 'B',9);
$htco->Cell(20,8,'Uso: ','R', 0, 'R');
$htco->setFont('helvetica','',9);
$htco->Cell(20, 7, $array->uso);

$y=$htco->GetY()+6;
$htco->SetXY($x, $y);
$htco->setFont('helvetica','B', 9);
$htco->Cell(20, 8, 'Dirección:','R', 0, 'R');
$htco->setFont('helvetica','',9);
$htco->MultiCell(80,7,$array->direccion,0, 'L' );

$x=100;
$y=30;
$htco->SetXY($x, $y);
$htco->setFont('helvetica','B', 9);
$htco->Cell(32, 8, 'Agua:','R', 0, 'R');
$htco->setFont('helvetica','',9);
$htco->Cell(20,8, $array->agua);

$y=$htco->GetY()+5;
$htco->SetXY($x, $y);
$htco->setFont('helvetica','B', 9);
$htco->Cell(32, 8, 'Alcantarillado:','R', 0, 'R');
$htco->setFont('helvetica','',9);
$htco->Cell(20,8, $array->alcantarillado);

$y=$htco->GetY()+6;
$htco->SetXY($x, $y);
$htco->setFont('helvetica','B', 9);
$htco->Cell(32, 8, 'Nombre:','R', 0, 'R');
$htco->setFont('helvetica','',9);
$htco->Cell(75,8, $array->nombre, 0, 'L');
$htco->ln();
/**
Fin de datos generales
**/


$htco->setFont('helvetica','B', 9);
$x = 2;

/*$y=$htco->GetY()+17;
$htco->SetXY($x, $y);
$htco->setFont('helvetica','B', 9);
$htco->Cell(32, 8, 'Medidor:','R', 0, 'R');
$htco->setFont('helvetica','',9);
$htco->Cell(75,8, '', 0, 'L');*/

$y=$htco->GetY()+17;
$htco->setXY($x, $y);

$cabecera = <<<EOF
<style>
</style>
<table border="0">
   <tr>
      <td style="text-align:center;">Fecha</td>
      <td width="90" style="text-align:center;">Medidor</td>
      <td style="text-align:center;">Lec. inicial</td>
      <td style="text-align:center;">Lec. final</td>
      <td style="text-align:center;">Consumo(m3)</td>
      <td width="50"style="text-align:center;">Tipo</td>
      <td style="text-align:center;">Anomalía</td>
      <td width="53" style="text-align:center;">Facturado</td>
      <td style="text-align:center;">Monto</td>
   </tr>
</table>
EOF;

$htco->writeHTML($cabecera, true, false, true, false, '');
$x=2;
$y=$htco->GetY();
$htco->setXY($x, $y);

$lon = sizeof($array->consumos);
for($i = 0; $i<$lon; $i++){
   $fecha = $array->consumos[$i]->fecha;
   $medidor = $array->consumos[$i]->medidor;
   $tipo = $array->consumos[$i]->tipo;
   $anomalia = $array->consumos[$i]->anomalia;
   $consumo = $array->consumos[$i]->m3;
   $facturado = $array->consumos[$i]->facturado;
   $lec_ini = $array->consumos[$i]->lecturainicial;
   $lec_fin = $array->consumos[$i]->lecturafinal;
   $monto = $array->consumos[$i]->monto;

$cuerpo = '
<table border="0">
   <tr>
      <td style="text-align:center;">'.$fecha.'</td>
      <td width="90" style="text-align:center;">'.$medidor.'</td>
      <td>'.$lec_ini.'</td>
      <td>'.$lec_fin.'</td>
      <td style="text-align:center;">'.$consumo.'</td>
      <td width="53" style="text-align:center;">'.$tipo.'</td>
      <td>'.$anomalia.'</td>
      <td width="53" style="text-align:center;">'.$facturado.'</td>
      <td style="text-align:right;">'.'$ '.number_format($monto, 2, '.',',').'</td>
   </tr>
</table>';

$htco->setFont('Helvetica', '', 9);
$x=2;
$y=$htco->GetY();
$htco->setXY($x, $y);
$htco->writeHTML($cuerpo, true, false, true, false, '');
}//Fin del for

$htco->Output();
}

?>
