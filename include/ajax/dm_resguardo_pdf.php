<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);		
date_default_timezone_get('America/Cancun');
ini_set('memory_limit', '256M');
//error_reporting(1);
include('../../tools/tcpdf/tcpdf.php');
include('letras.php');
include('ajax.php');


if(isset($_GET["idasignacion"]) && $_GET["idasignacion"]!=""){
$folio=$_GET["idasignacion"];
$imprime= new Ajax(array("action"=>"imprimir_pdf"));
$carcamos=$imprime->imprimir_pdf($folio);

	if($carcamos[0]->datopdf ==null){
		echo "<br><br> |||****No hay dato****|||";
		//var_dump($carcamos);
exit();
	}

class Deposito extends TCPDF{
	public function Header(){
		$imgDHC = '../../assets/img/logo.png';
		$this->Image($imgDHC, 50, 5, 35, 20, 'png','', 'T',  false, 300, 'L', false, false, 0, false, false, false);
		$this->SetFont('Times', 'B', 14);
		$this->SetXY(55, 8);
		$this->ln();
		//$this->Cell(20, 0, 'CONTROL DE RESGUARDOS', 0, 0,'C', 0, 'C', 0, false, 'C', 'C' );
		$this->Write(0, 'CONTROL DE RESGUARDOS', '', 0, 'C', true, 0, false, false, 0);
		$this->ln();
		$this->SetFont('Times', 'B', 11);
		//$this->Cell(40, 8, ' Fecha: | '.date("d/m/Y"), 1,2, '', 0, '', 0, '', '', 'M');
	}
	public function Footer(){
		$this->SetY(-15);
		$this->SetFont('Helvetica','I', 8);
		$this->Cell();

	}
}


$estilo = array(
    'position' => '',
    'align' => 'C',
    'stretch' => false,
    'fitwidth' => true,
    'cellfitalign' => '',
    'border' => false,
    'hpadding' => 'auto',
    'vpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255),
    'text' => true,
    'font' => 'helvetica',
    'fontsize' => 8,
    'stretchtext' => 4
);
$dep = new Deposito(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8',  false);
foreach($carcamos[0]->datopdf as $depo){
		

$dep->SetTitle('CONTROL DE RESGUARDOS');
$dep->SetMargins(5, 10, 5);
$dep->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
$dep->SetPrintHeader(true);
$dep->SetFont('Times', '', 12);
$dep->SetFooterMargin(PDF_MARGIN_FOOTER);
//$format=array( 'MediaBox' => array ('llx' => 0, 'lly' => 0, 'urx' => 210, 'ury' => 148));
$dep->AddPage('P', 'Letter', false,false);
$dep->SetXY(5, 25);
//$dep->Cell(40, 8, ' Fecha: | '.$depo->FECHA, 1,2, '', 0, '', 0, '', '', 'M');
//$dep->ln(10);
$x = 170;
$y = 20;
$dep->setXY($x,$y);
//$dep->Cell(40, 8, '       Referencia'/*.$depo->fecha*/, 0,2, '', 0, '', 0, '', '', 'M');/*Cell(0, 0, 'EAN 13', 0, 1);*/
//$dep->write1DBarcode($depo->referencia, 'C128', '', '', '', 18, 0.4, $estilo, 'N');
$dep->setXY(5, 35);
//$dep->SetFillColor(153,204, 255);
//$dep->Cell(60, 8, 'EQUIPO: '.$depo->IDTDMP , 0,0, '', 1, '', 0, '', '', 'M');
//$dep->ln(10);

	$empleados='';
	$empleados2='';
	$numempleados='';

foreach($depo->relacion as $key=>  $val){
	 	 	$empleados.=$val->NOMBRE.', ';
	 	 	$empleados2.=$val->NOMBRE.'<br>';
	 	 	$numempleados.=$val->IDTEMPLEADO.', ';
	}
$empleados=substr($empleados,0, -2);
$numempleados=substr($numempleados,0, -2);

$tablaheader='<table  cellpadding="2" cellspacing="0">
			<tr>
				<td><strong>EQUIPO: </strong>'.$depo->IDTDMP.'</td> 
				<td align="right" ><strong>FOLIO: </strong>'.$folio.'</td> 
			</tr>
			<tr>
				<td><strong>NOMBRE DEL EMPLEADO: </strong>'.$empleados.'</td> 
				<td align="right"><strong>N# DE EMPLEADO: </strong>'.$numempleados.'</td> 
			</tr>
			<tr>
				<td><strong>DEPARTAMENTO: </strong>'.urldecode($depo->USERDEPA).'</td> 
				<td align="right"><strong>FECHA: </strong>'.$depo->FECHA.'</td>
			</tr>
		
		</table>';


$tabla='<br><br><table border="1" cellpadding="2" cellspacing="0">
			<tr>
				<td width="100" ><strong>CANTIDAD</strong></td> 
				<td width="450"><strong>DESCRIPCION</strong></td> 	 
			</tr>

			<tr>
				<td >1</td>
				<td><strong>Telefonía movil compañía: </strong>'.$depo->COMPANIA.'</td> 
			</tr>
							<tr>
				<td></td>
				<td><strong>Modelo: </strong>'.$depo->MODELO.'</td> 
			</tr>
			<tr>
				<td></td>
				<td><strong>Serie: </strong>'.$depo->SERIE.'</td> 
			</tr>
				<tr>
				<td></td>
				<td><strong>Num Tel: </strong>'.$depo->TELEFONO.'</td> 
			</tr>
				<tr>
				<td></td>
				<td><strong>SIM: </strong>'.$depo->SIM.'</td> 
			</tr>
				<tr>
				<td></td>
				<td><strong>Marc. Rapida: </strong>'.$depo->IDTEMPLEADO.'</td> 
			</tr>
				<tr>
				<td></td>
				<td><strong>Cargador: </strong>'.$depo->CARGADOR.'</td> 
			</tr>
				<tr>
				<td></td>
				<td><strong>Funda: </strong>'.$depo->FUNDA.'</td> 
			</tr>
			<tr>
				<td></td>
				<td><strong>Mica: </strong>'.$depo->MICA.'</td> 
			</tr>
			<tr>
				<td></td>
				<td><strong>Color: </strong>'.$depo->COLOR.'</td> 
			</tr>
			<tr>
				 <td></td>
				<td><strong>OBSERVACIONES: </strong>'.$depo->OBSERVACIONES.'</td>
			</tr>
			<tr>
			<td></td> 
				<td></td> 
				
			</tr>
			<tr>
				<td></td>
				<td></td> 
			</tr>
			<tr>
				<td align="justify" colspan="2"><strong>Con el fin de garantizar el buen uso de tu equipo, te recomendamos leer la politica de uso de comunicaciones personales móviles (AGKCOM-001.05) publicada en la intranet en el apartado de Normatividad/Tecnologías de la información. (no lo veo en La intranet -_- )</strong></td> 
			</tr>
		

		</table>';

$tablaFooter='<table  cellpadding="2" cellspacing="0">
		<tr>
				<td align="left" colspan="2"><strong>HAGO CONSTAR QUE CON ESTA FECHA HE RECIBIDO LOS ARTICULOS QUE ARRIBA DESCRIBEN, LOS CUALES ENCUENTRAN BAJO CUSTODIA Y MANEJO, HACIENDOME RESPONSABLE, ME COMPROMETO Y ACEPTO PAGAR, O QUE SE ME DESCUENTE EL IMPORTE CORRESPONDIENTE A AQUELLOS ARTICULOS QUE NO DEVOLVIERE CUANDO LA EMPRESA ME LO SOLICITE, O AQUELLOS QUE POR NEGLIGENCIA DESTRUYA O PIERDA.</strong></td> 
			</tr>
	</table>';
	$tablaFirma='<table  cellpadding="2" cellspacing="0">
			<tr>
				<td align="center" ><strong>NOMBRE Y FIRMA DE QUIEN ENTREGA</strong></td> 
				<td align="center"  ><strong>NOMBRE Y FIRMA DEL EMPLEADO</strong></td> 
			</tr>
			<tr>
				<td><strong></strong></td> 
				<td><strong></strong></td> 
			</tr>
			<tr>
				<td><strong></strong></td> 
				<td><strong></strong></td> 
			</tr>
			<tr>
				<td align="center" ><strong>------------------------------------------------------</strong></td> 
				<td align="center" ><strong>------------------------------------------------------</strong></td>
			</tr>
			<tr>
				<td align="center" ><strong>'. urldecode($depo->USERLOGIN).'</strong></td> 
				<td align="center" ><strong>'. $empleados2.'</strong></td> 
			</tr>
		
		</table>';

		$dep->SetFont('Times', '', 10);
$dep->WriteHTML($tablaheader, true, true, true, true, '');
$dep->ln();
$dep->SetFont('Times', '', 10);
$dep->WriteHTML($tabla, true, true, true, true, '');
$dep->ln(8);
$dep->SetFont('Times', '', 8);
$dep->WriteHTML($tablaFooter, true, true, true, true, '');
$dep->ln(25);
$dep->SetFont('Times', '', 10);
$dep->WriteHTML($tablaFirma, true, true, true, true, '');
$dep->ln();
$dep->SetFont('Times', '', 6);
//$dep->Cell(60, 7, '32659_fdepo_1.0' , 0,0, '', 0, '', 0, '', '', 'M');
$x = 170;
$y = $dep->GetY()+20;
$dep->setXY($x,$y);
//$dep->Image('../img/descarga.jpg', $x, $y, 35, 20);
$dep->SetFont('Times', '', 7);


$x = 56;
$y = $dep->GetY()+5;
$dep->setXY($x,$y);
$dep->SetFont('Times', 'B', 14);
//$dep->Cell(20, 8, 'Ficha de Depósito al Banco Santander', 0, 0,'', 0, '', 0, false, '', '' );

$dep->SetFont('Times', '', 12);
$x = 5;
$y = $dep->GetY()+10;
$dep->setXY($x,$y);
//$dep->Cell(40, 8, ' Fecha: | '.$depo->fecha, 1,2, '', 0, '', 0, '', '', 'M');
$y = $dep->GetY()+2;
$dep->setXY($x,$y);
$dep->SetFillColor(153,204, 255);
//$dep->Cell(60, 8, 'Servicio Caja General Santander' , 0,0, '', 1, '', 0, '', '', 'M');
$x = 170;
$y = $dep->GetY()-9;
$dep->setXY($x,$y);
//$dep->Cell(40, 8, '       Referencia'/*.$depo->fecha*/, 0,2, '', 0, '', 0, '', '', 'M');/*Cell(0, 0, 'EAN 13', 0, 1);*/
//$dep->write1DBarcode($depo->referencia, 'C128', '', '', '', 18, 0.4, $estilo, 'N');

//$dep->ln(10);
//$dep->WriteHTML($tabla, true, true, true, true, '');
$dep->SetFont('Times', '', 6);
//$dep->Cell(60, 7, '32659_fdepo_1.0' , 0,0, '', 0, '', 0, '', '', 'M');
//$dep->Cell(60, 7, 'Copia' , 0,0, '', 0, '', 0, '', '', 'M');

}//fin del foreach
$dep->Output('control_de_resguardo_folio_'.$folio.'.pdf');
}//Fin del if que evalúa que exista la variable referencia
else{
	echo "Invocación incorrecta del servicio";
}
?>