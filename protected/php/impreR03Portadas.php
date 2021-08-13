<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Reporte NOM-035 III</title>
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

	</style>
</head>
<body>
<!-- <body onload="window.print();"> -->


<?php 

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");
date_default_timezone_set('America/Mexico_City');

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

$conCero = new SQLite3("../data/nom035_portadas.db") or die("Problemas para conectar!");

$csE = $conCero -> query("SELECT COUNT(codeMd5_R3a) AS cuantoRegistros FROM nom035R3a ");
while ($dato = $csE->fetchArray()) {
	$cRegistros = $dato['cuantoRegistros'];
}

$conCero -> close();

if ($cRegistros >= 1) {




	$con = new SQLite3("../data/nom035_portadas.db") or die("Problemas para conectar!");

	$busCorreo = $con -> query("SELECT * FROM nom035R3a ORDER BY usrNombre_R3a");

	while ($dato = $busCorreo->fetchArray()) {
		$p1_R3a = $dato['p1_R3a'];
		$p2_R3a = $dato['p2_R3a'];
		$p3_R3a = $dato['p3_R3a'];
		$p4_R3a = $dato['p4_R3a'];
		$p5_R3a = $dato['p5_R3a'];
		$p6_R3a = $dato['p6_R3a'];
		$p7_R3a = $dato['p7_R3a'];
		$p8_R3a = $dato['p8_R3a'];
		$p9_R3a = $dato['p9_R3a'];
		$p10_R3a = $dato['p10_R3a'];
		$p11_R3a = $dato['p11_R3a'];
		$p12_R3a = $dato['p12_R3a'];
		$p13_R3a = $dato['p13_R3a'];
		$p14_R3a = $dato['p14_R3a'];
		$p15_R3a = $dato['p15_R3a'];
		$p16_R3a = $dato['p16_R3a'];
		$p17_R3a = $dato['p17_R3a'];
		$p18_R3a = $dato['p18_R3a'];
		$p19_R3a = $dato['p19_R3a'];
		$p20_R3a = $dato['p20_R3a'];
		$p21_R3a = $dato['p21_R3a'];
		$p22_R3a = $dato['p22_R3a'];
		$p23_R3a = $dato['p23_R3a'];
		$p24_R3a = $dato['p24_R3a'];
		$p25_R3a = $dato['p25_R3a'];
		$p26_R3a = $dato['p26_R3a'];
		$p27_R3a = $dato['p27_R3a'];
		$p28_R3a = $dato['p28_R3a'];
		$p29_R3a = $dato['p29_R3a'];
		$p30_R3a = $dato['p30_R3a'];
		$p31_R3a = $dato['p31_R3a'];
		$p32_R3a = $dato['p32_R3a'];
		$p33_R3a = $dato['p33_R3a'];
		$p34_R3a = $dato['p34_R3a'];
		$p35_R3a = $dato['p35_R3a'];
		$p36_R3a = $dato['p36_R3a'];
		$p37_R3a = $dato['p37_R3a'];
		$p38_R3a = $dato['p38_R3a'];
		$p39_R3a = $dato['p39_R3a'];
		$p40_R3a = $dato['p40_R3a'];
		$p41_R3a = $dato['p41_R3a'];
		$p42_R3a = $dato['p42_R3a'];
		$p43_R3a = $dato['p43_R3a'];
		$p44_R3a = $dato['p44_R3a'];
		$p45_R3a = $dato['p45_R3a'];
		$p46_R3a = $dato['p46_R3a'];
		$p47_R3a = $dato['p47_R3a'];
		$p48_R3a = $dato['p48_R3a'];
		$p49_R3a = $dato['p49_R3a'];
		$p50_R3a = $dato['p50_R3a'];
		$p51_R3a = $dato['p51_R3a'];
		$p52_R3a = $dato['p52_R3a'];
		$p53_R3a = $dato['p53_R3a'];
		$p54_R3a = $dato['p54_R3a'];
		$p55_R3a = $dato['p55_R3a'];
		$p56_R3a = $dato['p56_R3a'];
		$p57_R3a = $dato['p57_R3a'];
		$p58_R3a = $dato['p58_R3a'];
		$p59_R3a = $dato['p59_R3a'];
		$p60_R3a = $dato['p60_R3a'];
		$p61_R3a = $dato['p61_R3a'];
		$p62_R3a = $dato['p62_R3a'];
		$p63_R3a = $dato['p63_R3a'];
		$p64_R3a = $dato['p64_R3a'];
		$p65_R3a = $dato['p65_R3a'];
		$p66_R3a = $dato['p66_R3a'];
		$p67_R3a = $dato['p67_R3a'];
		$p68_R3a = $dato['p68_R3a'];
		$p69_R3a = $dato['p69_R3a'];
		$p70_R3a = $dato['p70_R3a'];
		$p71_R3a = $dato['p71_R3a'];
		$p72_R3a = $dato['p72_R3a'];
		$empresa_R3a = $dato['empresa_R3a'];
		$dirEmpresa_R3a = $dato['dirEmpresa_R3a'];
		$correo_R3a = $dato['correo_R3a'];
		$codeMd5_R3a = $dato['codeMd5_R3a'];
		$usrSexo_R3a = $dato['usrSexo_R3a'];
		$usrNumEmp_R3a = $dato['usrNumEmp_R3a'];
		$fecha_R1a = $dato['fechaHoraInicio_R3a'];
		$fechaHoraFinal_R3a = $dato['fechaHoraFinal_R3a'];
		$usrNombre_R3a = $dato['usrNombre_R3a'];
		
	

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

	
}


$con -> close();



}else{
	$ocultar = 'style="display: none;"'; // --> recuerda agregar esto en "container"
	echo "<script> window.location='../error/alerta.aspx?error=404';</script>";
}

 ?>

	
</body>
</html>