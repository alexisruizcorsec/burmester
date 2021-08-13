<?php
error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");
date_default_timezone_set('America/Mexico_City');


$centro = (isset($_GET['centro'])) ? $_GET['centro'] : '';
$razonSoc = (isset($_GET['razonSoc'])) ? $_GET['razonSoc'] : '';
$aconted = (isset($_GET['aconted'])) ? $_GET['aconted'] : '';

switch ($aconted) {
	case 2:
		$valAconte = 'Si';
		break;
	case 1:
		$valAconte = 'NoXSi';
		break;
	
	default:
		$valAconte = '';
		break;
}


?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title><?php echo $centro.'_'.$razonSoc ;?> G1, G3 y G3 Matriz FULL <?php echo $valAconte;?></title>
	<style>
		@media print {
			.hoja{
				page-break-before: always;
			}
		}
		.marcoP{
			display: flex;
        align-items: center;
		}
		.hoja{
			margin: 0 auto;
			width: 730px;
			height: 980px;
			text-align:  justify;
		}
		body {
		    font-family: Arial, sans-serif;
		    }
		table{
			border-collapse: collapse;
		}
		th{
			padding: 3px 10px;
			border: 1px solid black;
		}
		td{
			padding: 3px 10px;
			border: 1px solid black;
		}
		.azul{
			background-color: #8eaadb;
			color: #FFF;
		}
		.verde{
			background-color: #79e593;
			color: #FFF;
		}
		.amarillo{
			background-color: #ffff00;
		}
		.naranja{
			background-color: #ffc000;
			color: #FFF;
		}
		.rojo{
			background-color: #ff0000 ;
			color: #FFF;
		}

	</style>
</head>
<!-- <body> -->
<body onload="window.print();">


<?php 



	$conCero = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

	$csCero = $conCero -> query("SELECT p1_R1a, p2_R1a, p3_R1a, p4_R1a, p5_R1a, p6_R1a, p7_R1a, p8_R1a, p9_R1a, p10_R1a, p11_R1a, p12_R1a, p13_R1a, p14_R1a, p15_R1a, p16_R1a, p17_R1a, p18_R1a, p19_R1a, p20_R1a, p21_R1a, empresa_R1a, dirEmpresa_R1a, correo_R1a, codeMd5_R1a, usrSexo_R1a, usrNumEmp_R1a, fechaHoraInicio_R1a, fechaHoraFinal_R1a, usrNombre_R1a,gpsd FROM dataEmpleadosDos INNER JOIN nom035R1a ON Nombred = usrNombre_R1a WHERE Corporativod = '$centro' AND RazonSociald = '$razonSoc' AND aconted = '$aconted' ORDER BY usrNombre_R1a");

	while ($datoX = $csCero->fetchArray()) {

		$codeMd5 = $datoX['codeMd5_R1a']; 
		$gpsd = $datoX['gpsd']; 

$correoCrypt = '';
$sumaCasos ='';
$resulSelector ='';
$idUsr = $codeMd5;


$nombre_R1a = '';
$fecha_R1a = '';
$dia = '';
$mes = '';
$ano = '';
$comp_R1a = '';
$p1_R1a = '';
$p2_R1a = '';
$p3_R1a = '';
$p4_R1a = '';
$p5_R1a = '';
$p6_R1a = '';
$p7_R1a = '';
$p8_R1a = '';
$p9_R1a = '';
$p10_R1a = '';
$p11_R1a = '';
$p12_R1a = '';
$p13_R1a = '';
$p14_R1a = '';
$p15_R1a = '';
$p16_R1a = '';
$p17_R1a = '';
$p18_R1a = '';
$p19_R1a = '';
$p20_R1a = '';
$p21_R1a = '';
$rComp_R1a = '';
$usrNumEmp_R1a = '';

$ocultarUno = '';




	$con = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

	// $busCorreo = $con -> query("SELECT p1_R1a, p2_R1a, p3_R1a, p4_R1a, p5_R1a, p6_R1a, p7_R1a, p8_R1a, p9_R1a, p10_R1a, p11_R1a, p12_R1a, p13_R1a, p14_R1a, p15_R1a, p16_R1a, p17_R1a, p18_R1a, p19_R1a, p20_R1a, p21_R1a, empresa_R1a, dirEmpresa_R1a, correo_R1a, codeMd5_R1a, usrSexo_R1a, usrNumEmp_R1a, fechaHoraInicio_R1a, fechaHoraFinal_R1a, usrNombre_R1a FROM dataEmpleadosDos INNER JOIN nom035R1a ON Nombred = usrNombre_R1a WHERE Corporativod = 'Av. 602 sn AF 24, Zona Federal, Aeropuerto Internacional de la Ciudad de México, Venustiano Carranza, CP 15620, Ciudad de México - G' AND RazonSociald = 'E/M SERVICIOS PROFESIONALES S.A. DE C.V'  ORDER BY usrNombre_R1a;");

	$busCorreo = $con -> query("SELECT * FROM nom035R1a WHERE codeMd5_R1a = '$idUsr'");

	while ($datoUno = $busCorreo->fetchArray()) {
		$p1_R1a = $datoUno['p1_R1a'];
		$p2_R1a = $datoUno['p2_R1a'];
		$p3_R1a = $datoUno['p3_R1a'];
		$p4_R1a = $datoUno['p4_R1a'];
		$p5_R1a = $datoUno['p5_R1a'];
		$p6_R1a = $datoUno['p6_R1a'];
		$p7_R1a = $datoUno['p7_R1a'];
		$p8_R1a = $datoUno['p8_R1a'];
		$p9_R1a = $datoUno['p9_R1a'];
		$p10_R1a = $datoUno['p10_R1a'];
		$p11_R1a = $datoUno['p11_R1a'];
		$p12_R1a = $datoUno['p12_R1a'];
		$p13_R1a = $datoUno['p13_R1a'];
		$p14_R1a = $datoUno['p14_R1a'];
		$p15_R1a = $datoUno['p15_R1a'];
		$p16_R1a = $datoUno['p16_R1a'];
		$p17_R1a = $datoUno['p17_R1a'];
		$p18_R1a = $datoUno['p18_R1a'];
		$p19_R1a = $datoUno['p19_R1a'];
		$p20_R1a = $datoUno['p20_R1a'];
		$p21_R1a = $datoUno['p21_R1a'];
		$empresa_R1a = $datoUno['empresa_R1a'];
		$dirEmpresa_R1a = $datoUno['dirEmpresa_R1a'];
		$codeMd5_R1a = $datoUno['codeMd5_R1a'];
		$usrNumEmp_R1a = $datoUno['usrNumEmp_R1a'];
		$fecha_R1a = $datoUno['fechaHoraFinal_R1a'];
		$nombre_R1a = $datoUno['usrNombre_R1a'];

			include 'fecha.php';


	// COMPROBACIONES

	// MODULO I
	$comp_R1a = $p2_R1a+$p3_R1a+$p4_R1a+$p5_R1a+$p6_R1a+$p7_R1a;

	if ($comp_R1a > 0) {

		if ($p2_R1a == 1) {
			$resP2ModI = '<li style="margin-left: 50px; margin-right: 50px; font-weight: bold;">Accidente que tenga como consecuencia la muerte, la pérdida de un miembro o una lesión grave</li>';
		}else{
			$resP2ModI = '';
		}
		if ($p3_R1a == 1) {
			$resP3ModI = '<li style="margin-left: 50px; margin-right: 50px; font-weight: bold;">Asaltos</li>';
		}else{
			$resP3ModI = '';
		}
		if ($p4_R1a == 1) {
			$resP4ModI = '<li style="margin-left: 50px; margin-right: 50px; font-weight: bold;">Actos violentos que derivaron en lesiones graves.</li>';
		}else{
			$resP4ModI = '';
		}
		if ($p5_R1a == 1) {
			$resP5ModI = '<li style="margin-left: 50px; margin-right: 50px; font-weight: bold;">Secuestro.</li>';
		}else{
			$resP5ModI = '';
		}
		if ($p6_R1a == 1) {
			$resP6ModI = '<li style="margin-left: 50px; margin-right: 50px; font-weight: bold;">Amenazas.</li>';
		}else{
			$resP6ModI = '';
		}
		if ($p7_R1a == 1) {
			$resP7ModI = '<li style="margin-left: 50px; margin-right: 50px; font-weight: bold;">Cualquier otro que ponga en riesgo su vida o salud, y/o la de otras personas.</li>';
		}else{
			$resP7ModI = '';
		}

		$rComp_R1a = 'Ha presenciado o sufrido alguna vez, durante o con motivo del trabajo, el o los siguiente(s) acontecimiento(s) traumático(s):'.$resP2ModI.$resP3ModI.$resP4ModI.$resP5ModI.$resP6ModI.$resP7ModI;

	}else{
		$ocultarUno = 'style="display: none;"';
		$rComp_R1a = 'No ha presenciado o sufrido alguna vez, durante o con motivo del trabajo, algún acontecimiento traumático, por lo cual no requiere valoración clínica.
		';
	}


	$casoII = $p8_R1a+$p9_R1a;
	$casoIII = $p10_R1a+$p11_R1a+$p12_R1a+$p13_R1a+$p14_R1a+$p15_R1a+$p16_R1a;
	$casoIV = $p17_R1a+$p18_R1a+$p19_R1a+$p20_R1a+$p21_R1a;




	if ($casoII > 0) { $cII = 'A'; }else{ $cII = ''; }
	if ($casoIII > 2) { $cIII = 'B'; }else{ $cIII = ''; }
	if ($casoIV > 1) { $cIV = 'C'; }else{ $cIV = ''; }

	$sumaCasos = $cII.$cIII.$cIV;

	switch ($sumaCasos) {
		case 'A':
			$sFinal = 1;
			break;

		case 'AB' :
			$sFinal = 2;
			break;

		case 'ABC' :
			$sFinal = 3;
			break;

		case 'B':
			$sFinal = 4;
			break;

		case 'C' :
			$sFinal = 5;
			break;

		case 'AC' :
			$sFinal = 6;
			break;

		case 'BC' :
			$sFinal = 7;
			break;
		default:
			$sFinal = 8;
			break;
		
	}
	

	$sumaCasosDos = $casoIII+$casoIV;

	switch ($sFinal) {
		case 1:
			include 'casoA.php';

			break;

		case 2:
			include 'casoAB.php';

			break;

		case 3:
			include 'casoABC.php';

			break;

		case 4:
			include 'casoB.php';

			break;

		case 5:
			include 'casoC.php';

			break;

		case 6:
			include 'casoAC.php';

		case 7:
			include 'casoBC.php';

			break;
		
		default:

			if ($sumaCasosDos > 0) {

					include 'casoX.php';
					break;

			}else{

					$resulSelector = '<span '.$ocultarUno.'>Sin embargo, después de haber considerado estos síntomas y con base en  la Guía de Referencia I, inciso b), se identifica que el trabajador no requiere valoración clínica.</span>';
					break;

			}
			
	}



$correoCrypt = '';
$sumaCasos ='';
$resulSelector ='';
$idUsr = '';




$dia = '';
$mes = '';
$ano = '';
$comp_R3a = '';
		$p1_R3a = '';
		$p2_R3a = '';
		$p3_R3a = '';
		$p4_R3a = '';
		$p5_R3a = '';
		$p6_R3a = '';
		$p7_R3a = '';
		$p8_R3a = '';
		$p9_R3a = '';
		$p10_R3a = '';
		$p11_R3a = '';
		$p12_R3a = '';
		$p13_R3a = '';
		$p14_R3a = '';
		$p15_R3a = '';
		$p16_R3a = '';
		$p17_R3a = '';
		$p18_R3a = '';
		$p19_R3a = '';
		$p20_R3a = '';
		$p21_R3a = '';
		$p22_R3a = '';
		$p23_R3a = '';
		$p24_R3a = '';
		$p25_R3a = '';
		$p26_R3a = '';
		$p27_R3a = '';
		$p28_R3a = '';
		$p29_R3a = '';
		$p30_R3a = '';
		$p31_R3a = '';
		$p32_R3a = '';
		$p33_R3a = '';
		$p34_R3a = '';
		$p35_R3a = '';
		$p36_R3a = '';
		$p37_R3a = '';
		$p38_R3a = '';
		$p39_R3a = '';
		$p40_R3a = '';
		$p41_R3a = '';
		$p42_R3a = '';
		$p43_R3a = '';
		$p44_R3a = '';
		$p45_R3a = '';
		$p46_R3a = '';
		$p47_R3a = '';
		$p48_R3a = '';
		$p49_R3a = '';
		$p50_R3a = '';
		$p51_R3a = '';
		$p52_R3a = '';
		$p53_R3a = '';
		$p54_R3a = '';
		$p55_R3a = '';
		$p56_R3a = '';
		$p57_R3a = '';
		$p58_R3a = '';
		$p59_R3a = '';
		$p60_R3a = '';
		$p61_R3a = '';
		$p62_R3a = '';
		$p63_R3a = '';
		$p64_R3a = '';
		$p65_R3a = '';
		$p66_R3a = '';
		$p67_R3a = '';
		$p68_R3a = '';
		$p69_R3a = '';
		$p70_R3a = '';
		$p71_R3a = '';
		$p72_R3a = '';
		$empresa_R3a ='';
		$dirEmpresa_R3a = '';
		$correo_R3a = '';
		$codeMd5_R3a = '';
		$usrSexo_R3a = '';
		$usrNumEmp_R3a = '';
		$fechaHoraInicio_R3a = '';
		$fechaHoraFinal_R3a = '';
		$usrNombre_R3a = '';

$ocultarUno = '';

$conDos = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

$busCorreoDos = $conDos -> query("SELECT p1_R3a, p2_R3a, p3_R3a, p4_R3a, p5_R3a, p6_R3a, p7_R3a, p8_R3a, p9_R3a, p10_R3a, p11_R3a, p12_R3a, p13_R3a, p14_R3a, p15_R3a, p16_R3a, p17_R3a, p18_R3a, p19_R3a, p20_R3a, p21_R3a, p22_R3a, p23_R3a, p24_R3a, p25_R3a, p26_R3a, p27_R3a, p28_R3a, p29_R3a, p30_R3a, p31_R3a, p32_R3a, p33_R3a, p34_R3a, p35_R3a, p36_R3a, p37_R3a, p38_R3a, p39_R3a, p40_R3a, p41_R3a, p42_R3a, p43_R3a, p44_R3a, p45_R3a, p46_R3a, p47_R3a, p48_R3a, p49_R3a, p50_R3a, p51_R3a, p52_R3a, p53_R3a, p54_R3a, p55_R3a, p56_R3a, p57_R3a, p58_R3a, p59_R3a, p60_R3a, p61_R3a, p62_R3a, p63_R3a, p64_R3a, p65_R3a, p66_R3a, p67_R3a, p68_R3a, p69_R3a, p70_R3a, p71_R3a, p72_R3a, empresa_R3a, dirEmpresa_R3a, correo_R3a, codeMd5_R3a, usrSexo_R3a, usrNumEmp_R3a, fechaHoraInicio_R3a, fechaHoraFinal_R3a, usrNombre_R3a FROM dataEmpleadosDos INNER JOIN nom035R3a ON Nombred = usrNombre_R3a WHERE usrNombre_R3a = '$nombre_R1a'");

while ($datoDos = $busCorreoDos->fetchArray()) {
	$p1_R3a = $datoDos['p1_R3a'];
	$p2_R3a = $datoDos['p2_R3a'];
	$p3_R3a = $datoDos['p3_R3a'];
	$p4_R3a = $datoDos['p4_R3a'];
	$p5_R3a = $datoDos['p5_R3a'];
	$p6_R3a = $datoDos['p6_R3a'];
	$p7_R3a = $datoDos['p7_R3a'];
	$p8_R3a = $datoDos['p8_R3a'];
	$p9_R3a = $datoDos['p9_R3a'];
	$p10_R3a = $datoDos['p10_R3a'];
	$p11_R3a = $datoDos['p11_R3a'];
	$p12_R3a = $datoDos['p12_R3a'];
	$p13_R3a = $datoDos['p13_R3a'];
	$p14_R3a = $datoDos['p14_R3a'];
	$p15_R3a = $datoDos['p15_R3a'];
	$p16_R3a = $datoDos['p16_R3a'];
	$p17_R3a = $datoDos['p17_R3a'];
	$p18_R3a = $datoDos['p18_R3a'];
	$p19_R3a = $datoDos['p19_R3a'];
	$p20_R3a = $datoDos['p20_R3a'];
	$p21_R3a = $datoDos['p21_R3a'];
	$p22_R3a = $datoDos['p22_R3a'];
	$p23_R3a = $datoDos['p23_R3a'];
	$p24_R3a = $datoDos['p24_R3a'];
	$p25_R3a = $datoDos['p25_R3a'];
	$p26_R3a = $datoDos['p26_R3a'];
	$p27_R3a = $datoDos['p27_R3a'];
	$p28_R3a = $datoDos['p28_R3a'];
	$p29_R3a = $datoDos['p29_R3a'];
	$p30_R3a = $datoDos['p30_R3a'];
	$p31_R3a = $datoDos['p31_R3a'];
	$p32_R3a = $datoDos['p32_R3a'];
	$p33_R3a = $datoDos['p33_R3a'];
	$p34_R3a = $datoDos['p34_R3a'];
	$p35_R3a = $datoDos['p35_R3a'];
	$p36_R3a = $datoDos['p36_R3a'];
	$p37_R3a = $datoDos['p37_R3a'];
	$p38_R3a = $datoDos['p38_R3a'];
	$p39_R3a = $datoDos['p39_R3a'];
	$p40_R3a = $datoDos['p40_R3a'];
	$p41_R3a = $datoDos['p41_R3a'];
	$p42_R3a = $datoDos['p42_R3a'];
	$p43_R3a = $datoDos['p43_R3a'];
	$p44_R3a = $datoDos['p44_R3a'];
	$p45_R3a = $datoDos['p45_R3a'];
	$p46_R3a = $datoDos['p46_R3a'];
	$p47_R3a = $datoDos['p47_R3a'];
	$p48_R3a = $datoDos['p48_R3a'];
	$p49_R3a = $datoDos['p49_R3a'];
	$p50_R3a = $datoDos['p50_R3a'];
	$p51_R3a = $datoDos['p51_R3a'];
	$p52_R3a = $datoDos['p52_R3a'];
	$p53_R3a = $datoDos['p53_R3a'];
	$p54_R3a = $datoDos['p54_R3a'];
	$p55_R3a = $datoDos['p55_R3a'];
	$p56_R3a = $datoDos['p56_R3a'];
	$p57_R3a = $datoDos['p57_R3a'];
	$p58_R3a = $datoDos['p58_R3a'];
	$p59_R3a = $datoDos['p59_R3a'];
	$p60_R3a = $datoDos['p60_R3a'];
	$p61_R3a = $datoDos['p61_R3a'];
	$p62_R3a = $datoDos['p62_R3a'];
	$p63_R3a = $datoDos['p63_R3a'];
	$p64_R3a = $datoDos['p64_R3a'];
	$p65_R3a = $datoDos['p65_R3a'];
	$p66_R3a = $datoDos['p66_R3a'];
	$p67_R3a = $datoDos['p67_R3a'];
	$p68_R3a = $datoDos['p68_R3a'];
	$p69_R3a = $datoDos['p69_R3a'];
	$p70_R3a = $datoDos['p70_R3a'];
	$p71_R3a = $datoDos['p71_R3a'];
	$p72_R3a = $datoDos['p72_R3a'];
	$empresa_R3a = $datoDos['empresa_R3a'];
	$dirEmpresa_R3a = $datoDos['dirEmpresa_R3a'];
	$correo_R3a = $datoDos['correo_R3a'];
	$codeMd5_R3a = $datoDos['codeMd5_R3a'];
	$usrSexo_R3a = $datoDos['usrSexo_R3a'];
	$usrNumEmp_R3a = $datoDos['usrNumEmp_R3a'];
	$fecha_R1a = $datoDos['fechaHoraInicio_R3a'];
	$fechaHoraFinal_R3a = $datoDos['fechaHoraFinal_R3a'];
	$usrNombre_R3a = $datoDos['usrNombre_R3a'];
	


include 'fecha.php';


// COMPROBACIONES
echo '

	<div class="marcoP">
		<div class="hoja">
			<div style="position: absolute; z-index: -1;">
				<img src="../img/hFondo_.svg" style="height: 950px;">
			</div>
			<div>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<div style="padding: 10px; width: 630px; height: 950px; margin: auto;">
					<div style="position: absolute; margin-left: 560px; margin-top: -34px; font-size: .8em;">
						<i>Hoja 1</i>
					</div>
					<div style="position: absolute; margin-left: 490px; margin-top: 0px; font-size: .5em; color: grey; text-align: left;">
						<i>'.$usrNombre_R3a.'</i>
					</div>
					<h4>CUESTIONARIO PARA IDENTIFICAR LOS FACTORES DE RIESGO PSICOSOCIAL Y EVALUAR EL ENTORNO ORGANIZACIONAL EN LOS CENTROS DE TRABAJO</h4>

					<div style="font-size: .93em;">
						<p>Con base en los requisitos de la <b>Norma Oficial Mexicana NOM-035-STPS-2018</b>, Factores de riesgo psicosocial en el trabajo-Identificación, análisis y prevención, se realizó el <i>“Cuestionario para identificar los factores de riesgo psicosocial y evaluar el entorno organizacional en los centros de trabajo”</i> especificado en la <b>Guía de Referencia III</b> de dicha norma.
							<br>
							<br>
							El cuestionario fue aplicado el día: <b>'.$dia.' de '.$mes.' del '.$ano.'.</b>
							<br>
							<br>
							Las respuestas que se presentan a continuación corresponden al trabajador: <b>'.$usrNombre_R3a.'.</b>
						</p>
						<!-- // CUESTIONARIO PARTE I	 -->
						<p>
						Para responder las preguntas siguientes considere las condiciones ambientales de su centro de trabajo.
						</p>
						<table>
							<tr>
								<th></th>
								<th></th>
								<th>Siempre</th>
								<th>Casi siempre</th>
								<th>Algunas veces</th>
								<th>Casi nunca</th>
								<th>Nunca</th>
							</tr>
							<tr>
								<td>1</td>
								<td style="font-size: .95em;">El espacio donde trabajo me permite realizar mis actividades de manera segura e higiénica.</td>
								<td>'; if ($p1_R3a == 0) { echo 'X'; } echo '</td>
								<td>'; if ($p1_R3a == 1) { echo 'X'; } echo '</td>
								<td>'; if ($p1_R3a == 2) { echo 'X'; } echo '</td>
								<td>'; if ($p1_R3a == 3) { echo 'X'; } echo '</td>
								<td>'; if ($p1_R3a == 4) { echo 'X'; } echo '</td>
							</tr>
							<tr>
								<td>2</td>
								<td style="font-size: .95em;">Mi trabajo me exige hacer mucho esfuerzo físico.</td>
								<td>'; if ($p2_R3a == 4) { echo 'X'; } echo '</td>
								<td>'; if ($p2_R3a == 3) { echo 'X'; } echo '</td>
								<td>'; if ($p2_R3a == 2) { echo 'X'; } echo '</td>
								<td>'; if ($p2_R3a == 1) { echo 'X'; } echo '</td>
								<td>'; if ($p2_R3a == 0) { echo 'X'; } echo '</td>
							</tr>
							<tr>
								<td>3</td>
								<td style="font-size: .95em;">Me preocupa sufrir un accidente en mi trabajo.</td>
								<td>'; if ($p3_R3a == 4) { echo 'X'; } echo '</td>
								<td>'; if ($p3_R3a == 3) { echo 'X'; } echo '</td>
								<td>'; if ($p3_R3a == 2) { echo 'X'; } echo '</td>
								<td>'; if ($p3_R3a == 1) { echo 'X'; } echo '</td>
								<td>'; if ($p3_R3a == 0) { echo 'X'; } echo '</td>
							</tr>
							<tr>
								<td>4</td>
								<td style="font-size: .95em;">Considero que en mi trabajo se aplican las normas de seguridad y salud en el trabajo.</td>
								<td>'; if ($p4_R3a == 0) { echo 'X'; } echo '</td>
								<td>'; if ($p4_R3a == 1) { echo 'X'; } echo '</td>
								<td>'; if ($p4_R3a == 2) { echo 'X'; } echo '</td>
								<td>'; if ($p4_R3a == 3) { echo 'X'; } echo '</td>
								<td>'; if ($p4_R3a == 4) { echo 'X'; } echo '</td>
							</tr>
							<tr>
								<td>5</td>
								<td style="font-size: .95em;">Considero que las actividades que realizo son peligrosas.</td>
								<td>'; if ($p5_R3a == 4) { echo 'X'; } echo '</td>
								<td>'; if ($p5_R3a == 3) { echo 'X'; } echo '</td>
								<td>'; if ($p5_R3a == 2) { echo 'X'; } echo '</td>
								<td>'; if ($p5_R3a == 1) { echo 'X'; } echo '</td>
								<td>'; if ($p5_R3a == 0) { echo 'X'; } echo '</td>
							</tr>
						</table>

						<!-- // CUESTIONARIO PARTE II	 -->
						<p>
						Para responder a las preguntas siguientes piense en la cantidad y ritmo de trabajo que tiene.
						</p>
						<table>
							<tr>
								<th></th>
								<th></th>
								<th>Siempre</th>
								<th>Casi siempre</th>
								<th>Algunas veces</th>
								<th>Casi nunca</th>
								<th>Nunca</th>
							</tr>
							<tr>
								<td>6</td>
								<td style="font-size: .95em;">Por la cantidad de trabajo que tengo debo quedarme tiempo adicional a mi turno.</td>
								<td>'; if ($p6_R3a == 4) { echo 'X'; } echo '</td>
								<td>'; if ($p6_R3a == 3) { echo 'X'; } echo '</td>
								<td>'; if ($p6_R3a == 2) { echo 'X'; } echo '</td>
								<td>'; if ($p6_R3a == 1) { echo 'X'; } echo '</td>
								<td>'; if ($p6_R3a == 0) { echo 'X'; } echo '</td>
							</tr>
							<tr>
								<td>7</td>
								<td style="font-size: .95em;">Por la cantidad de trabajo que tengo debo trabajar sin parar.</td>
								<td>'; if ($p7_R3a == 4) { echo 'X'; } echo '</td>
								<td>'; if ($p7_R3a == 3) { echo 'X'; } echo '</td>
								<td>'; if ($p7_R3a == 2) { echo 'X'; } echo '</td>
								<td>'; if ($p7_R3a == 1) { echo 'X'; } echo '</td>
								<td>'; if ($p7_R3a == 0) { echo 'X'; } echo '</td>
							</tr>
							<tr>
								<td>8</td>
								<td style="font-size: .95em;">Considero que es necesario mantener un ritmo de trabajo acelerado.</td>
								<td>'; if ($p8_R3a == 4) { echo 'X'; } echo '</td>
								<td>'; if ($p8_R3a == 3) { echo 'X'; } echo '</td>
								<td>'; if ($p8_R3a == 2) { echo 'X'; } echo '</td>
								<td>'; if ($p8_R3a == 1) { echo 'X'; } echo '</td>
								<td>'; if ($p8_R3a == 0) { echo 'X'; } echo '</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>


';

include 'cResul01t.php';
include 'cResul02t.php';
include 'cResul03t.php';

$conPorCentro = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

$csCentro = $conPorCentro -> query("SELECT dirEmpresa_R3a, usrNombre_R3a FROM nom035R3a WHERE usrNombre_R3a = '$nombre_R1a'");
// $csCentro = $conPorCentro -> query("SELECT dirEmpresa_R3a,usrNombre_R3a FROM nom035R3a WHERE dirEmpresa_R3a = '$centro' GROUP BY dirEmpresa_R3a,usrNombre_R3a ORDER BY dirEmpresa_R3a,usrNombre_R3a");



while ($CCentros = $csCentro->fetchArray()) {

	$dirEmpresa=$CCentros['dirEmpresa_R3a'];
	$usrNombre=$CCentros['usrNombre_R3a'];

	include 'cResul01tMasIndi.php';
	include 'cResul02tMasIndi.php';
	include 'cResul03tMasIndi.php';



}


}
$conDos -> close();



	}

}

$con -> close();






 ?>


</body>
</html>