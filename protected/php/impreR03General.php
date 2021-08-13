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

$conCero = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

$csE = $conCero -> query("SELECT COUNT(codeMd5_R3a) AS cuantoRegistros FROM nom035R3a ");
while ($dato = $csE->fetchArray()) {
	$cRegistros = $dato['cuantoRegistros'];
}

$conCero -> close();

if ($cRegistros >= 1) {




	$con = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

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
							<i>Hoja 2</i>
						</div>
						<div style="position: absolute; margin-left: 490px; margin-top: 0px; font-size: .5em; color: grey; text-align: left;">
							<i>'.$usrNombre_R3a.'</i>
						</div>
							<!-- // CUESTIONARIO PARTE III	 -->
							<p>
							Las preguntas siguientes están relacionadas con el esfuerzo mental que le exige su trabajo.
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
									<td>9</td>
									<td style="font-size: .95em;">Mi trabajo exige que esté muy concentrado.</td>
									<td>'; if ($p9_R3a == 4) { echo 'X'; } echo '</td>
									<td>'; if ($p9_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p9_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p9_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p9_R3a == 0) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>10</td>
									<td style="font-size: .95em;">Mi trabajo requiere que memorice mucha información.</td>
									<td>'; if ($p10_R3a == 4) { echo 'X'; } echo '</td>
									<td>'; if ($p10_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p10_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p10_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p10_R3a == 0) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>11</td>
									<td style="font-size: .95em;">En mi trabajo tengo que tomar decisiones difíciles muy rápido.</td>
									<td>'; if ($p11_R3a == 4) { echo 'X'; } echo '</td>
									<td>'; if ($p11_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p11_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p11_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p11_R3a == 0) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>12</td>
									<td style="font-size: .95em;">Mi trabajo exige que atienda varios asuntos al mismo tiempo.</td>
									<td>'; if ($p12_R3a == 4) { echo 'X'; } echo '</td>
									<td>'; if ($p12_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p12_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p12_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p12_R3a == 0) { echo 'X'; } echo '</td>
								</tr>
							</table>

							<!-- // CUESTIONARIO PARTE IV	 -->
							<p>
							Las preguntas siguientes están relacionadas con las actividades que realiza en su trabajo y las responsabilidades que tiene.
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
									<td>13</td>
									<td style="font-size: .95em;">En mi trabajo soy responsable de cosas de mucho valor.</td>
									<td>'; if ($p13_R3a == 4) { echo 'X'; } echo '</td>
									<td>'; if ($p13_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p13_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p13_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p13_R3a == 0) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>14</td>
									<td style="font-size: .95em;">Respondo ante mi jefe por los resultados de toda mi área de trabajo.</td>
									<td>'; if ($p14_R3a == 4) { echo 'X'; } echo '</td>
									<td>'; if ($p14_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p14_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p14_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p14_R3a == 0) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>15</td>
									<td style="font-size: .95em;">En el trabajo me dan órdenes contradictorias.</td>
									<td>'; if ($p15_R3a == 4) { echo 'X'; } echo '</td>
									<td>'; if ($p15_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p15_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p15_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p15_R3a == 0) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>16</td>
									<td style="font-size: .95em;">Considero que en mi trabajo me piden hacer cosas innecesarias.</td>
									<td>'; if ($p16_R3a == 4) { echo 'X'; } echo '</td>
									<td>'; if ($p16_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p16_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p16_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p16_R3a == 0) { echo 'X'; } echo '</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>


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
							<i>Hoja 3</i>
						</div>
						<div style="position: absolute; margin-left: 490px; margin-top: 0px; font-size: .5em; color: grey; text-align: left;">
							<i>'.$usrNombre_R3a.'</i>
						</div>
							<!-- // CUESTIONARIO PARTE V	 -->
							<p>
							Las preguntas siguientes están relacionadas con su jornada de trabajo.
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
									<td>17</td>
									<td style="font-size: .95em;">Trabajo horas extras más de tres veces a la semana.</td>
									<td>'; if ($p17_R3a == 4) { echo 'X'; } echo '</td>
									<td>'; if ($p17_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p17_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p17_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p17_R3a == 0) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>18</td>
									<td style="font-size: .95em;">Mi trabajo me exige laborar en días de descanso, festivos o fines de semana.</td>
									<td>'; if ($p18_R3a == 4) { echo 'X'; } echo '</td>
									<td>'; if ($p18_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p18_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p18_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p18_R3a == 0) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>19</td>
									<td style="font-size: .95em;">Considero que el tiempo en el trabajo es mucho y perjudica mis actividades familiares o personales.</td>
									<td>'; if ($p19_R3a == 4) { echo 'X'; } echo '</td>
									<td>'; if ($p19_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p19_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p19_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p19_R3a == 0) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>20</td>
									<td style="font-size: .95em;">Debo atender asuntos de trabajo cuando estoy en casa.</td>
									<td>'; if ($p20_R3a == 4) { echo 'X'; } echo '</td>
									<td>'; if ($p20_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p20_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p20_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p20_R3a == 0) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>21</td>
									<td style="font-size: .95em;">Pienso en las actividades familiares o personales cuando estoy en mi trabajo.</td>
									<td>'; if ($p21_R3a == 4) { echo 'X'; } echo '</td>
									<td>'; if ($p21_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p21_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p21_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p21_R3a == 0) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>22</td>
									<td style="font-size: .95em;">Pienso que mis responsabilidades familiares afectan mi trabajo.</td>
									<td>'; if ($p22_R3a == 4) { echo 'X'; } echo '</td>
									<td>'; if ($p22_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p22_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p22_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p22_R3a == 0) { echo 'X'; } echo '</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>


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
							<i>Hoja 4</i>
						</div>
						<div style="position: absolute; margin-left: 490px; margin-top: 0px; font-size: .5em; color: grey; text-align: left;">
							<i>'.$usrNombre_R3a.'</i>
						</div>
							<!-- // CUESTIONARIO PARTE VI	 -->
							<p>
							Las preguntas siguientes están relacionadas con las decisiones que puede tomar en su trabajo.
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
									<td>23</td>
									<td style="font-size: .95em;">Mi trabajo permite que desarrolle nuevas habilidades.</td>
									<td>'; if ($p23_R3a == 0) { echo 'X'; } echo '</td>
									<td>'; if ($p23_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p23_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p23_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p23_R3a == 4) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>24</td>
									<td style="font-size: .95em;">En mi trabajo puedo aspirar a un mejor puesto.</td>
									<td>'; if ($p24_R3a == 0) { echo 'X'; } echo '</td>
									<td>'; if ($p24_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p24_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p24_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p24_R3a == 4) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>25</td>
									<td style="font-size: .95em;">Durante mi jornada de trabajo puedo tomar pausas cuando las necesito.</td>
									<td>'; if ($p25_R3a == 0) { echo 'X'; } echo '</td>
									<td>'; if ($p25_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p25_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p25_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p25_R3a == 4) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>26</td>
									<td style="font-size: .95em;">Puedo decidir cuánto trabajo realizo durante la jornada laboral.</td>
									<td>'; if ($p26_R3a == 0) { echo 'X'; } echo '</td>
									<td>'; if ($p26_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p26_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p26_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p26_R3a == 4) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>27</td>
									<td style="font-size: .95em;">Puedo decidir la velocidad a la que realizo mis actividades en mi trabajo.</td>
									<td>'; if ($p27_R3a == 0) { echo 'X'; } echo '</td>
									<td>'; if ($p27_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p27_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p27_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p27_R3a == 4) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>28</td>
									<td style="font-size: .95em;">Puedo cambiar el orden de las actividades que realizo en mi trabajo.</td>
									<td>'; if ($p28_R3a == 0) { echo 'X'; } echo '</td>
									<td>'; if ($p28_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p28_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p28_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p28_R3a == 4) { echo 'X'; } echo '</td>
								</tr>
							</table>
							<p>
							Las preguntas siguientes están relacionadas con cualquier tipo de cambio que ocurra en su trabajo (considere los últimos cambios realizados).
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
									<td>29</td>
									<td style="font-size: .95em;">Los cambios que se presentan en mi trabajo dificultan mi labor.</td>
									<td>'; if ($p29_R3a == 4) { echo 'X'; } echo '</td>
									<td>'; if ($p29_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p29_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p29_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p29_R3a == 0) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>30</td>
									<td style="font-size: .95em;">Cuando se presentan cambios en mi trabajo se tienen en cuenta mis ideas o aportaciones.</td>
									<td>'; if ($p30_R3a == 0) { echo 'X'; } echo '</td>
									<td>'; if ($p30_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p30_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p30_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p30_R3a == 4) { echo 'X'; } echo '</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>


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
							<i>Hoja 5</i>
						</div>
						<div style="position: absolute; margin-left: 490px; margin-top: 0px; font-size: .5em; color: grey; text-align: left;">
							<i>'.$usrNombre_R3a.'</i>
						</div>
							<!-- // CUESTIONARIO PARTE VII	 -->
							<p>
							Las preguntas siguientes están relacionadas con la capacitación e información que se le proporciona sobre su trabajo.
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
									<td>31</td>
									<td style="font-size: .95em;">Me informan con claridad cuáles son mis funciones.</td>
									<td>'; if ($p31_R3a == 0) { echo 'X'; } echo '</td>
									<td>'; if ($p31_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p31_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p31_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p31_R3a == 4) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>32</td>
									<td style="font-size: .95em;">Me explican claramente los resultados que debo obtener en mi trabajo.</td>
									<td>'; if ($p32_R3a == 0) { echo 'X'; } echo '</td>
									<td>'; if ($p32_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p32_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p32_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p32_R3a == 4) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>33</td>
									<td style="font-size: .95em;">Me explican claramente los objetivos de mi trabajo.</td>
									<td>'; if ($p33_R3a == 0) { echo 'X'; } echo '</td>
									<td>'; if ($p33_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p33_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p33_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p33_R3a == 4) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>34</td>
									<td style="font-size: .95em;">Me informan con quién puedo resolver problemas o asuntos de trabajo.</td>
									<td>'; if ($p34_R3a == 0) { echo 'X'; } echo '</td>
									<td>'; if ($p34_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p34_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p34_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p34_R3a == 4) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>35</td>
									<td style="font-size: .95em;">Me permiten asistir a capacitaciones relacionadas con mi trabajo.</td>
									<td>'; if ($p35_R3a == 0) { echo 'X'; } echo '</td>
									<td>'; if ($p35_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p35_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p35_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p35_R3a == 4) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>36</td>
									<td style="font-size: .95em;">Recibo capacitación útil para hacer mi trabajo.</td>
									<td>'; if ($p36_R3a == 0) { echo 'X'; } echo '</td>
									<td>'; if ($p36_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p36_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p36_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p36_R3a == 4) { echo 'X'; } echo '</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>


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
							<i>Hoja 6</i>
						</div>
						<div style="position: absolute; margin-left: 490px; margin-top: 0px; font-size: .5em; color: grey; text-align: left;">
							<i>'.$usrNombre_R3a.'</i>
						</div>
							<!-- // CUESTIONARIO PARTE VIII	 -->
							<p>
							Las preguntas siguientes están relacionadas con el o los jefes con quien tiene contacto.
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
									<td>37</td>
									<td style="font-size: .95em;">Mi jefe ayuda a organizar mejor el trabajo.</td>
									<td>'; if ($p37_R3a == 0) { echo 'X'; } echo '</td>
									<td>'; if ($p37_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p37_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p37_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p37_R3a == 4) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>38</td>
									<td style="font-size: .95em;">Mi jefe tiene en cuenta mis puntos de vista y opiniones.</td>
									<td>'; if ($p38_R3a == 0) { echo 'X'; } echo '</td>
									<td>'; if ($p38_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p38_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p38_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p38_R3a == 4) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>39</td>
									<td style="font-size: .95em;">Mi jefe me comunica a tiempo la información relacionada con el trabajo.</td>
									<td>'; if ($p39_R3a == 0) { echo 'X'; } echo '</td>
									<td>'; if ($p39_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p39_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p39_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p39_R3a == 4) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>40</td>
									<td style="font-size: .95em;">La orientación que me da mi jefe me ayuda a realizar mejor mi trabajo.</td>
									<td>'; if ($p40_R3a == 0) { echo 'X'; } echo '</td>
									<td>'; if ($p40_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p40_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p40_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p40_R3a == 4) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>41</td>
									<td style="font-size: .95em;">Mi jefe ayuda a solucionar los problemas que se presentan en el trabajo.</td>
									<td>'; if ($p41_R3a == 0) { echo 'X'; } echo '</td>
									<td>'; if ($p41_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p41_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p41_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p41_R3a == 4) { echo 'X'; } echo '</td>
								</tr>
							</table>
							<!-- // CUESTIONARIO PARTE IX	 -->
							<p>
							Las preguntas siguientes se refieren a las relaciones con sus compañeros.
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
									<td>42</td>
									<td style="font-size: .95em;">Puedo confiar en mis compañeros de trabajo.</td>
									<td>'; if ($p42_R3a == 0) { echo 'X'; } echo '</td>
									<td>'; if ($p42_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p42_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p42_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p42_R3a == 4) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>43</td>
									<td style="font-size: .95em;">Entre compañeros solucionamos los problemas de trabajo de forma respetuosa.</td>
									<td>'; if ($p43_R3a == 0) { echo 'X'; } echo '</td>
									<td>'; if ($p43_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p43_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p43_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p43_R3a == 4) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>44</td>
									<td style="font-size: .95em;">En mi trabajo me hacen sentir parte del grupo.</td>
									<td>'; if ($p44_R3a == 0) { echo 'X'; } echo '</td>
									<td>'; if ($p44_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p44_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p44_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p44_R3a == 4) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>45</td>
									<td style="font-size: .95em;">Cuando tenemos que realizar trabajo de equipo los compañeros colaboran.</td>
									<td>'; if ($p45_R3a == 0) { echo 'X'; } echo '</td>
									<td>'; if ($p45_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p45_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p45_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p45_R3a == 4) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>46</td>
									<td style="font-size: .95em;">Mis compañeros de trabajo me ayudan cuando tengo dificultades.</td>
									<td>'; if ($p46_R3a == 0) { echo 'X'; } echo '</td>
									<td>'; if ($p46_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p46_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p46_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p46_R3a == 4) { echo 'X'; } echo '</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

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
							<i>Hoja 7</i>
						</div>
						<div style="position: absolute; margin-left: 490px; margin-top: 0px; font-size: .5em; color: grey; text-align: left;">
							<i>'.$usrNombre_R3a.'</i>
						</div>
							<!-- // CUESTIONARIO PARTE X	 -->
							<p>
							Las preguntas siguientes están relacionadas con la información que recibe sobre su rendimiento en el trabajo, el reconocimiento, el sentido de pertenencia y la estabilidad que le ofrece su trabajo.
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
									<td>47</td>
									<td style="font-size: .95em;">Me informan sobre lo que hago bien en mi trabajo.</td>
									<td>'; if ($p47_R3a == 0) { echo 'X'; } echo '</td>
									<td>'; if ($p47_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p47_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p47_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p47_R3a == 4) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>48</td>
									<td style="font-size: .95em;">La forma como evalúan mi trabajo en mi centro de trabajo me ayuda a mejorar mi desempeño.</td>
									<td>'; if ($p48_R3a == 0) { echo 'X'; } echo '</td>
									<td>'; if ($p48_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p48_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p48_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p48_R3a == 4) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>49</td>
									<td style="font-size: .95em;">En mi centro de trabajo me pagan a tiempo mi salario.</td>
									<td>'; if ($p49_R3a == 0) { echo 'X'; } echo '</td>
									<td>'; if ($p49_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p49_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p49_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p49_R3a == 4) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>50</td>
									<td style="font-size: .95em;">El pago que recibo es el que merezco por el trabajo que realizo.</td>
									<td>'; if ($p50_R3a == 0) { echo 'X'; } echo '</td>
									<td>'; if ($p50_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p50_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p50_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p50_R3a == 4) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>51</td>
									<td style="font-size: .95em;">Si obtengo los resultados esperados en mi trabajo me recompensan o reconocen.</td>
									<td>'; if ($p51_R3a == 0) { echo 'X'; } echo '</td>
									<td>'; if ($p51_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p51_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p51_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p51_R3a == 4) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>52</td>
									<td style="font-size: .95em;">Las personas que hacen bien el trabajo pueden crecer laboralmente.</td>
									<td>'; if ($p52_R3a == 0) { echo 'X'; } echo '</td>
									<td>'; if ($p52_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p52_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p52_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p52_R3a == 4) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>53</td>
									<td style="font-size: .95em;">Considero que mi trabajo es estable.</td>
									<td>'; if ($p53_R3a == 0) { echo 'X'; } echo '</td>
									<td>'; if ($p53_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p53_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p53_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p53_R3a == 4) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>54</td>
									<td style="font-size: .95em;">En mi trabajo existe continua rotación de personal.</td>
									<td>'; if ($p54_R3a == 4) { echo 'X'; } echo '</td>
									<td>'; if ($p54_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p54_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p54_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p54_R3a == 0) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>55</td>
									<td style="font-size: .95em;">Siento orgullo de laborar en este centro de trabajo.</td>
									<td>'; if ($p55_R3a == 0) { echo 'X'; } echo '</td>
									<td>'; if ($p55_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p55_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p55_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p55_R3a == 4) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>56</td>
									<td style="font-size: .95em;">Me siento comprometido con mi trabajo.</td>
									<td>'; if ($p56_R3a == 0) { echo 'X'; } echo '</td>
									<td>'; if ($p56_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p56_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p56_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p56_R3a == 4) { echo 'X'; } echo '</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>


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
							<i>Hoja 8</i>
						</div>
						<div style="position: absolute; margin-left: 490px; margin-top: 0px; font-size: .5em; color: grey; text-align: left;">
							<i>'.$usrNombre_R3a.'</i>
						</div>
							<!-- // CUESTIONARIO PARTE XI	 -->
							<p>
							Las preguntas siguientes están relacionadas con actos de violencia laboral (malos tratos, acoso, hostigamiento, acoso psicológico).
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
									<td>57</td>
									<td style="font-size: .95em;">En mi trabajo puedo expresarme libremente sin interrupciones.</td>
									<td>'; if ($p57_R3a == 0) { echo 'X'; } echo '</td>
									<td>'; if ($p57_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p57_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p57_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p57_R3a == 4) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>58</td>
									<td style="font-size: .95em;">Recibo críticas constantes a mi persona y/o trabajo.</td>
									<td>'; if ($p58_R3a == 4) { echo 'X'; } echo '</td>
									<td>'; if ($p58_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p58_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p58_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p58_R3a == 0) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>59</td>
									<td style="font-size: .95em;">Recibo burlas, calumnias, difamaciones, humillaciones o ridiculizaciones.</td>
									<td>'; if ($p59_R3a == 4) { echo 'X'; } echo '</td>
									<td>'; if ($p59_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p59_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p59_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p59_R3a == 0) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>60</td>
									<td style="font-size: .95em;">Se ignora mi presencia o se me excluye de las reuniones de trabajo y en la toma de decisiones.</td>
									<td>'; if ($p60_R3a == 4) { echo 'X'; } echo '</td>
									<td>'; if ($p60_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p60_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p60_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p60_R3a == 0) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>61</td>
									<td style="font-size: .95em;">Se manipulan las situaciones de trabajo para hacerme parecer un mal trabajador.</td>
									<td>'; if ($p61_R3a == 4) { echo 'X'; } echo '</td>
									<td>'; if ($p61_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p61_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p61_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p61_R3a == 0) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>62</td>
									<td style="font-size: .95em;">Se ignoran mis éxitos laborales y se atribuyen a otros trabajadores.</td>
									<td>'; if ($p62_R3a == 4) { echo 'X'; } echo '</td>
									<td>'; if ($p62_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p62_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p62_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p62_R3a == 0) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>63</td>
									<td style="font-size: .95em;">Me bloquean o impiden las oportunidades que tengo para obtener ascenso o mejora en mi trabajo.</td>
									<td>'; if ($p63_R3a == 4) { echo 'X'; } echo '</td>
									<td>'; if ($p63_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p63_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p63_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p63_R3a == 0) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>64</td>
									<td style="font-size: .95em;">He presenciado actos de violencia en mi centro de trabajo.</td>
									<td>'; if ($p64_R3a == 4) { echo 'X'; } echo '</td>
									<td>'; if ($p64_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p64_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p64_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p64_R3a == 0) { echo 'X'; } echo '</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>


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
							<i>Hoja 9</i>
						</div>
						<div style="position: absolute; margin-left: 490px; margin-top: 0px; font-size: .5em; color: grey; text-align: left;">
							<i>'.$usrNombre_R3a.'</i>
						</div>
							<!-- // CUESTIONARIO PARTE XII	 -->
							<br>
							<p>Las preguntas siguientes están relacionadas con la atención a clientes y usuarios.</p>
							<table>
								<tr>
									<td>En mi trabajo debo brindar servicio a clientes o usuarios:</td>
									<td>Sí</td>
									<td>'; $sumaAtenPreUno = $p65_R3a+$p66_R3a+$p67_R3a+$p68_R3a; if ($sumaAtenPreUno >= 1) { echo 'X'; } echo '</td>
									<td>No</td>
									<td>'; if ($sumaAtenPreUno == NULL) { echo 'X'; } echo '</td>
								</tr>
							</table>
							<p>Si su respuesta fue "SÍ", responda las preguntas siguientes. Si su respuesta fue "NO" pase a las preguntas de la sección siguiente.</p>
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
									<td>65</td>
									<td style="font-size: .95em;">Atiendo clientes o usuarios muy enojados.</td>
									<td>'; if ($p65_R3a == 4) { echo 'X'; } echo '</td>
									<td>'; if ($p65_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p65_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p65_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p65_R3a == 0) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>66</td>
									<td style="font-size: .95em;">Mi trabajo me exige atender personas muy necesitadas de ayuda o enfermas.</td>
									<td>'; if ($p66_R3a == 4) { echo 'X'; } echo '</td>
									<td>'; if ($p66_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p66_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p66_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p66_R3a == 0) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>67</td>
									<td style="font-size: .95em;">Para hacer mi trabajo debo demostrar sentimientos distintos a los míos.</td>
									<td>'; if ($p67_R3a == 4) { echo 'X'; } echo '</td>
									<td>'; if ($p67_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p67_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p67_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p67_R3a == 0) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>68</td>
									<td style="font-size: .95em;">Mi trabajo me exige atender situaciones de violencia.</td>
									<td>'; if ($p68_R3a == 4) { echo 'X'; } echo '</td>
									<td>'; if ($p68_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p68_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p68_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p68_R3a == 0) { echo 'X'; } echo '</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>


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
							<i>Hoja 10</i>
						</div>
						<div style="position: absolute; margin-left: 490px; margin-top: 0px; font-size: .5em; color: grey; text-align: left;">
							<i>'.$usrNombre_R3a.'</i>
						</div>
							<!-- // CUESTIONARIO PARTE XIII	 -->
							<br>
							<table>
								<tr>
									<td>Soy jefe de otros trabajadores:</td>
									<td>Sí</td>
									<td>'; $sumaAtenPreUno = $p69_R3a+$p70_R3a+$p71_R3a+$p72_R3a; if ($sumaAtenPreUno >= 1) { echo 'X'; } echo '</td>
									<td>No</td>
									<td>'; if ($sumaAtenPreUno == NULL) { echo 'X'; } echo '</td>
								</tr>
							</table>
							<p>Si su respuesta fue "SÍ", responda las preguntas siguientes. Si su respuesta fue "NO", ha concluido el cuestionario.</p>
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
									<td>69</td>
									<td style="font-size: .95em;">Comunican tarde los asuntos de trabajo.</td>
									<td>'; if ($p69_R3a == 4) { echo 'X'; } echo '</td>
									<td>'; if ($p69_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p69_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p69_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p69_R3a == 0) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>70</td>
									<td style="font-size: .95em;">Dificultan el logro de los resultados del trabajo.</td>
									<td>'; if ($p70_R3a == 4) { echo 'X'; } echo '</td>
									<td>'; if ($p70_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p70_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p70_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p70_R3a == 0) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>71</td>
									<td style="font-size: .95em;">Cooperan poco cuando se necesita.</td>
									<td>'; if ($p71_R3a == 4) { echo 'X'; } echo '</td>
									<td>'; if ($p71_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p71_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p71_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p71_R3a == 0) { echo 'X'; } echo '</td>
								</tr>
								<tr>
									<td>72</td>
									<td style="font-size: .95em;">Ignoran las sugerencias para mejorar su trabajo.</td>
									<td>'; if ($p72_R3a == 4) { echo 'X'; } echo '</td>
									<td>'; if ($p72_R3a == 3) { echo 'X'; } echo '</td>
									<td>'; if ($p72_R3a == 2) { echo 'X'; } echo '</td>
									<td>'; if ($p72_R3a == 1) { echo 'X'; } echo '</td>
									<td>'; if ($p72_R3a == 0) { echo 'X'; } echo '</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>



		


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
							<i>Hoja 11</i>
						</div>
						<div style="position: absolute; margin-left: 490px; margin-top: 0px; font-size: .5em; color: grey; text-align: left;">
							<i>'.$usrNombre_R3a.'</i>
						</div>
							<!-- // RESULTADOS	 -->
							<h3>RESULTADOS</h3>
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
									<td style="font-size: .9em;">Condiciones ambientales de su centro de trabajo.<span style="font-size: .6em; color: grey;"><i> 1 - 5</i></span></td>
									<td style="text-align: center;">'; 
									if ($p1_R3a == 0) { $p1_R3aSiempre = 1; } else { $p1_R3aSiempre = 0; }
									if ($p2_R3a == 4) { $p2_R3aSiempre = 1; } else { $p2_R3aSiempre = 0; } 
									if ($p3_R3a == 4) { $p3_R3aSiempre = 1; } else { $p3_R3aSiempre = 0; } 
									if ($p4_R3a == 0) { $p4_R3aSiempre = 1; } else { $p4_R3aSiempre = 0; } 
									if ($p5_R3a == 4) { $p5_R3aSiempre = 1; } else { $p5_R3aSiempre = 0; }
									$resSiempre1 = $p1_R3aSiempre+$p2_R3aSiempre+$p3_R3aSiempre+$p4_R3aSiempre+$p5_R3aSiempre;
									echo $resSiempre1;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p1_R3a == 1) { $p1_R3aCasiSiempre = 1; } else { $p1_R3aCasiSiempre = 0; }
									if ($p2_R3a == 3) { $p2_R3aCasiSiempre = 1; } else { $p2_R3aCasiSiempre = 0; } 
									if ($p3_R3a == 3) { $p3_R3aCasiSiempre = 1; } else { $p3_R3aCasiSiempre = 0; } 
									if ($p4_R3a == 1) { $p4_R3aCasiSiempre = 1; } else { $p4_R3aCasiSiempre = 0; } 
									if ($p5_R3a == 3) { $p5_R3aCasiSiempre = 1; } else { $p5_R3aCasiSiempre = 0; }
									$resCasiSiempre1 = $p1_R3aCasiSiempre+$p2_R3aCasiSiempre+$p3_R3aCasiSiempre+$p4_R3aCasiSiempre+$p5_R3aCasiSiempre;
									echo $resCasiSiempre1;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p1_R3a == 2) { $p1_R3aAlgunasVeces = 1; } else { $p1_R3aAlgunasVeces = 0; }
									if ($p2_R3a == 2) { $p2_R3aAlgunasVeces = 1; } else { $p2_R3aAlgunasVeces = 0; } 
									if ($p3_R3a == 2) { $p3_R3aAlgunasVeces = 1; } else { $p3_R3aAlgunasVeces = 0; } 
									if ($p4_R3a == 2) { $p4_R3aAlgunasVeces = 1; } else { $p4_R3aAlgunasVeces = 0; } 
									if ($p5_R3a == 2) { $p5_R3aAlgunasVeces = 1; } else { $p5_R3aAlgunasVeces = 0; } 
									$resAlgunasVeces1 = $p1_R3aAlgunasVeces+$p2_R3aAlgunasVeces+$p3_R3aAlgunasVeces+$p4_R3aAlgunasVeces+$p5_R3aAlgunasVeces;
									echo $resAlgunasVeces1;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p1_R3a == 3) { $p1_R3aCasiNunca = 1; } else { $p1_R3aCasiNunca = 0; }
									if ($p2_R3a == 1) { $p2_R3aCasiNunca = 1; } else { $p2_R3aCasiNunca = 0; } 
									if ($p3_R3a == 1) { $p3_R3aCasiNunca = 1; } else { $p3_R3aCasiNunca = 0; } 
									if ($p4_R3a == 3) { $p4_R3aCasiNunca = 1; } else { $p4_R3aCasiNunca = 0; } 
									if ($p5_R3a == 1) { $p5_R3aCasiNunca = 1; } else { $p5_R3aCasiNunca = 0; } 
									$resCasiNunca1 = $p1_R3aCasiNunca+$p2_R3aCasiNunca+$p3_R3aCasiNunca+$p4_R3aCasiNunca+$p5_R3aCasiNunca;
									echo $resCasiNunca1;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p1_R3a == 4) { $p1_R3aNunca = 1; } else { $p1_R3aNunca = 0; }
									if ($p2_R3a == 0) { $p2_R3aNunca = 1; } else { $p2_R3aNunca = 0; } 
									if ($p3_R3a == 0) { $p3_R3aNunca = 1; } else { $p3_R3aNunca = 0; } 
									if ($p4_R3a == 4) { $p4_R3aNunca = 1; } else { $p4_R3aNunca = 0; } 
									if ($p5_R3a == 0) { $p5_R3aNunca = 1; } else { $p5_R3aNunca = 0; } 
									$resNunca1 = $p1_R3aNunca+$p2_R3aNunca+$p3_R3aNunca+$p4_R3aNunca+$p5_R3aNunca;
									echo $resNunca1;
									echo '</td>
								</tr>
								<tr>
									<td>2</td>
									<td style="font-size: .9em;">Cantidad y ritmo de trabajo que tiene.<span style="font-size: .6em; color: grey;"><i> 6 - 8</i></span></td>
									<td style="text-align: center;">'; 
									if ($p6_R3a == 4) { $p6_R3aSiempre = 1; } else { $p6_R3aSiempre = 0; }
									if ($p7_R3a == 4) { $p7_R3aSiempre = 1; } else { $p7_R3aSiempre = 0; } 
									if ($p8_R3a == 4) { $p8_R3aSiempre = 1; } else { $p8_R3aSiempre = 0; } 
									$resSiempre2 = $p6_R3aSiempre+$p7_R3aSiempre+$p8_R3aSiempre;
									echo $resSiempre2;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p6_R3a == 3) { $p6_R3aCasiSiempre = 1; } else { $p6_R3aCasiSiempre = 0; }
									if ($p7_R3a == 3) { $p7_R3aCasiSiempre = 1; } else { $p7_R3aCasiSiempre = 0; } 
									if ($p8_R3a == 3) { $p8_R3aCasiSiempre = 1; } else { $p8_R3aCasiSiempre = 0; } 
									$resCasiSiempre2 = $p6_R3aCasiSiempre+$p7_R3aCasiSiempre+$p8_R3aCasiSiempre;
									echo $resCasiSiempre2;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p6_R3a == 2) { $p6_R3aAlgunasVeces = 1; } else { $p6_R3aAlgunasVeces = 0; }
									if ($p7_R3a == 2) { $p7_R3aAlgunasVeces = 1; } else { $p7_R3aAlgunasVeces = 0; } 
									if ($p8_R3a == 2) { $p8_R3aAlgunasVeces = 1; } else { $p8_R3aAlgunasVeces = 0; } 
									$resAlgunasVeces2 = $p6_R3aAlgunasVeces+$p7_R3aAlgunasVeces+$p8_R3aAlgunasVeces;
									echo $resAlgunasVeces2;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p6_R3a == 1) { $p6_R3aCasiNunca = 1; } else { $p6_R3aCasiNunca = 0; }
									if ($p7_R3a == 1) { $p7_R3aCasiNunca = 1; } else { $p7_R3aCasiNunca = 0; } 
									if ($p8_R3a == 1) { $p8_R3aCasiNunca = 1; } else { $p8_R3aCasiNunca = 0; } 
									$resCasiNunca2 = $p6_R3aCasiNunca+$p7_R3aCasiNunca+$p8_R3aCasiNunca;
									echo $resCasiNunca2;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p6_R3a == 0) { $p6_R3aNunca = 1; } else { $p6_R3aNunca = 0; }
									if ($p7_R3a == 0) { $p7_R3aNunca = 1; } else { $p7_R3aNunca = 0; } 
									if ($p8_R3a == 0) { $p8_R3aNunca = 1; } else { $p8_R3aNunca = 0; } 
									$resNunca2 = $p6_R3aNunca+$p7_R3aNunca+$p8_R3aNunca;
									echo $resNunca2;
									echo '</td>
								</tr>
								<tr>
									<td>3</td>
									<td style="font-size: .9em;">Esfuerzo mental que le exige su trabajo.<span style="font-size: .6em; color: grey;"><i> 9 - 12</i></span></td>
									<td style="text-align: center;">'; 
									if ($p9_R3a == 4) { $p9_R3aSiempre = 1; } else { $p9_R3aSiempre = 0; }
									if ($p10_R3a == 4) { $p10_R3aSiempre = 1; } else { $p10_R3aSiempre = 0; } 
									if ($p11_R3a == 4) { $p11_R3aSiempre = 1; } else { $p11_R3aSiempre = 0; }
									if ($p12_R3a == 4) { $p12_R3aSiempre = 1; } else { $p12_R3aSiempre = 0; }
									$resSiempre3 = $p9_R3aSiempre+$p10_R3aSiempre+$p11_R3aSiempre+$p12_R3aSiempre;
									echo $resSiempre3;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p9_R3a == 3) { $p9_R3aCasiSiempre = 1; } else { $p9_R3aCasiSiempre = 0; }
									if ($p10_R3a == 3) { $p10_R3aCasiSiempre = 1; } else { $p10_R3aCasiSiempre = 0; } 
									if ($p11_R3a == 3) { $p11_R3aCasiSiempre = 1; } else { $p11_R3aCasiSiempre = 0; }  
									if ($p12_R3a == 3) { $p12_R3aCasiSiempre = 1; } else { $p12_R3aCasiSiempre = 0; }
									$resCasiSiempre3 = $p9_R3aCasiSiempre+$p10_R3aCasiSiempre+$p11_R3aCasiSiempre+$p12_R3aCasiSiempre;
									echo $resCasiSiempre3;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p9_R3a == 2) { $p9_R3aAlgunasVeces = 1; } else { $p9_R3aAlgunasVeces = 0; }
									if ($p10_R3a == 2) { $p10_R3aAlgunasVeces = 1; } else { $p10_R3aAlgunasVeces = 0; } 
									if ($p11_R3a == 2) { $p11_R3aAlgunasVeces = 1; } else { $p11_R3aAlgunasVeces = 0; } 
									if ($p12_R3a == 2) { $p12_R3aAlgunasVeces = 1; } else { $p12_R3aAlgunasVeces = 0; }
									$resAlgunasVeces3 = $p9_R3aAlgunasVeces+$p10_R3aAlgunasVeces+$p11_R3aAlgunasVeces+$p12_R3aAlgunasVeces;
									echo $resAlgunasVeces3;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p9_R3a == 1) { $p9_R3aCasiNunca = 1; } else { $p9_R3aCasiNunca = 0; }
									if ($p10_R3a == 1) { $p10_R3aCasiNunca = 1; } else { $p10_R3aCasiNunca = 0; } 
									if ($p11_R3a == 1) { $p11_R3aCasiNunca = 1; } else { $p11_R3aCasiNunca = 0; } 
									if ($p12_R3a == 1) { $p12_R3aCasiNunca = 1; } else { $p12_R3aCasiNunca = 0; } 
									$resCasiNunca3 = $p9_R3aCasiNunca+$p10_R3aCasiNunca+$p11_R3aCasiNunca+$p12_R3aCasiNunca;
									echo $resCasiNunca3;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p9_R3a == 0) { $p9_R3aNunca = 1; } else { $p9_R3aNunca = 0; }
									if ($p10_R3a == 0) { $p10_R3aNunca = 1; } else { $p10_R3aNunca = 0; } 
									if ($p11_R3a == 0) { $p11_R3aNunca = 1; } else { $p11_R3aNunca = 0; }
									if ($p12_R3a == 0) { $p12_R3aNunca = 1; } else { $p12_R3aNunca = 0; } 
									$resNunca3 = $p9_R3aNunca+$p10_R3aNunca+$p11_R3aNunca+$p12_R3aNunca;
									echo $resNunca3;
									echo '</td>
								</tr>
								<tr>
									<td>4</td>
									<td style="font-size: .9em;">Actividades que realiza en su trabajo y las responsabilidades que tiene.<span style="font-size: .6em; color: grey;"><i> 13 - 16</i></span></td>
									<td style="text-align: center;">'; 
									if ($p13_R3a == 4) { $p13_R3aSiempre = 1; } else { $p13_R3aSiempre = 0; }
									if ($p14_R3a == 4) { $p14_R3aSiempre = 1; } else { $p14_R3aSiempre = 0; } 
									if ($p15_R3a == 4) { $p15_R3aSiempre = 1; } else { $p15_R3aSiempre = 0; } 
									if ($p16_R3a == 4) { $p16_R3aSiempre = 1; } else { $p16_R3aSiempre = 0; }
									$resSiempre4 = $p13_R3aSiempre+$p14_R3aSiempre+$p15_R3aSiempre+$p16_R3aSiempre;
									echo $resSiempre4;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p13_R3a == 3) { $p13_R3aCasiSiempre = 1; } else { $p13_R3aCasiSiempre = 0; }
									if ($p14_R3a == 3) { $p14_R3aCasiSiempre = 1; } else { $p14_R3aCasiSiempre = 0; } 
									if ($p15_R3a == 3) { $p15_R3aCasiSiempre = 1; } else { $p15_R3aCasiSiempre = 0; } 
									if ($p16_R3a == 3) { $p16_R3aCasiSiempre = 1; } else { $p16_R3aCasiSiempre = 0; }
									$resCasiSiempre4 = $p13_R3aCasiSiempre+$p14_R3aCasiSiempre+$p15_R3aCasiSiempre+$p16_R3aCasiSiempre;
									echo $resCasiSiempre4;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p13_R3a == 2) { $p13_R3aAlgunasVeces = 1; } else { $p13_R3aAlgunasVeces = 0; }
									if ($p14_R3a == 2) { $p14_R3aAlgunasVeces = 1; } else { $p14_R3aAlgunasVeces = 0; } 
									if ($p15_R3a == 2) { $p15_R3aAlgunasVeces = 1; } else { $p15_R3aAlgunasVeces = 0; } 
									if ($p16_R3a == 2) { $p16_R3aAlgunasVeces = 1; } else { $p16_R3aAlgunasVeces = 0; }
									$resAlgunasVeces4 = $p13_R3aAlgunasVeces+$p14_R3aAlgunasVeces+$p15_R3aAlgunasVeces+$p16_R3aAlgunasVeces;
									echo $resAlgunasVeces4;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p13_R3a == 1) { $p13_R3aCasiNunca = 1; } else { $p13_R3aCasiNunca = 0; }
									if ($p14_R3a == 1) { $p14_R3aCasiNunca = 1; } else { $p14_R3aCasiNunca = 0; } 
									if ($p15_R3a == 1) { $p15_R3aCasiNunca = 1; } else { $p15_R3aCasiNunca = 0; } 
									if ($p16_R3a == 1) { $p16_R3aCasiNunca = 1; } else { $p16_R3aCasiNunca = 0; }
									$resCasiNunca4 = $p13_R3aCasiNunca+$p14_R3aCasiNunca+$p15_R3aCasiNunca+$p16_R3aCasiNunca;
									echo $resCasiNunca4;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p13_R3a == 0) { $p13_R3aNunca = 1; } else { $p13_R3aNunca = 0; }
									if ($p14_R3a == 0) { $p14_R3aNunca = 1; } else { $p14_R3aNunca = 0; } 
									if ($p15_R3a == 0) { $p15_R3aNunca = 1; } else { $p15_R3aNunca = 0; } 
									if ($p16_R3a == 0) { $p16_R3aNunca = 1; } else { $p16_R3aNunca = 0; }
									$resNunca4 = $p13_R3aNunca+$p14_R3aNunca+$p15_R3aNunca+$p16_R3aNunca;
									echo $resNunca4;
									echo '</td>
								</tr>
								<tr>
									<td>5</td>
									<td style="font-size: .9em;">Jornada de trabajo.<span style="font-size: .6em; color: grey;"><i> 17 - 22</i></span></td>
									<td style="text-align: center;">'; 
									if ($p17_R3a == 4) { $p17_R3aSiempre = 1; } else { $p17_R3aSiempre = 0; }
									if ($p18_R3a == 4) { $p18_R3aSiempre = 1; } else { $p18_R3aSiempre = 0; } 
									if ($p19_R3a == 4) { $p19_R3aSiempre = 1; } else { $p19_R3aSiempre = 0; } 
									if ($p20_R3a == 4) { $p20_R3aSiempre = 1; } else { $p20_R3aSiempre = 0; }
									if ($p21_R3a == 4) { $p21_R3aSiempre = 1; } else { $p21_R3aSiempre = 0; }
									if ($p22_R3a == 4) { $p22_R3aSiempre = 1; } else { $p22_R3aSiempre = 0; }
									$resSiempre5 = $p17_R3aSiempre+$p18_R3aSiempre+$p19_R3aSiempre+$p20_R3aSiempre+$p21_R3aSiempre+$p22_R3aSiempre;
									echo $resSiempre5;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p17_R3a == 3) { $p17_R3aCasiSiempre = 1; } else { $p17_R3aCasiSiempre = 0; }
									if ($p18_R3a == 3) { $p18_R3aCasiSiempre = 1; } else { $p18_R3aCasiSiempre = 0; } 
									if ($p19_R3a == 3) { $p19_R3aCasiS2empre = 1; } else { $p19_R3aCasiSiempre = 0; } 
									if ($p20_R3a == 3) { $p20_R3aCasiSiempre = 1; } else { $p20_R3aCasiSiempre = 0; }
									if ($p21_R3a == 3) { $p21_R3aCasiSiempre = 1; } else { $p21_R3aCasiSiempre = 0; }
									if ($p22_R3a == 3) { $p22_R3aCasiSiempre = 1; } else { $p22_R3aCasiSiempre = 0; }
									$resCasiSiempre5 = $p17_R3aCasiSiempre+$p18_R3aCasiSiempre+$p19_R3aCasiSiempre+$p20_R3aCasiSiempre+$p21_R3aCasiSiempre+$p22_R3aCasiSiempre;
									echo $resCasiSiempre5;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p17_R3a == 2) { $p17_R3aAlgunasVeces = 1; } else { $p17_R3aAlgunasVeces = 0; }
									if ($p18_R3a == 2) { $p18_R3aAlgunasVeces = 1; } else { $p18_R3aAlgunasVeces = 0; } 
									if ($p19_R3a == 2) { $p19_R3aAlgunasVeces = 1; } else { $p19_R3aAlgunasVeces = 0; } 
									if ($p20_R3a == 2) { $p20_R3aAlgunasVeces = 1; } else { $p20_R3aAlgunasVeces = 0; }
									if ($p21_R3a == 2) { $p21_R3aAlgunasVeces = 1; } else { $p21_R3aAlgunasVeces = 0; }
									if ($p22_R3a == 2) { $p22_R3aAlgunasVeces = 1; } else { $p22_R3aAlgunasVeces = 0; }
									$resAlgunasVeces5 = $p17_R3aAlgunasVeces+$p18_R3aAlgunasVeces+$p19_R3aAlgunasVeces+$p20_R3aAlgunasVeces+$p21_R3aAlgunasVeces+$p22_R3aAlgunasVeces;
									echo $resAlgunasVeces5;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p17_R3a == 1) { $p17_R3aCasiNunca = 1; } else { $p17_R3aCasiNunca = 0; }
									if ($p18_R3a == 1) { $p18_R3aCasiNunca = 1; } else { $p18_R3aCasiNunca = 0; } 
									if ($p19_R3a == 1) { $p19_R3aCasiNunca = 1; } else { $p19_R3aCasiNunca = 0; } 
									if ($p20_R3a == 1) { $p20_R3aCasiNunca = 1; } else { $p20_R3aCasiNunca = 0; }
									if ($p21_R3a == 1) { $p21_R3aCasiNunca = 1; } else { $p21_R3aCasiNunca = 0; }
									if ($p22_R3a == 1) { $p22_R3aCasiNunca = 1; } else { $p22_R3aCasiNunca = 0; }
									$resCasiNunca5 = $p17_R3aCasiNunca+$p18_R3aCasiNunca+$p19_R3aCasiNunca+$p20_R3aCasiNunca+$p21_R3aCasiNunca+$p22_R3aCasiNunca;
									echo $resCasiNunca5;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p17_R3a == 0) { $p17_R3aNunca = 1; } else { $p17_R3aNunca = 0; }
									if ($p18_R3a == 0) { $p18_R3aNunca = 1; } else { $p18_R3aNunca = 0; } 
									if ($p19_R3a == 0) { $p19_R3aNunca = 1; } else { $p19_R3aNunca = 0; } 
									if ($p20_R3a == 0) { $p20_R3aNunca = 1; } else { $p20_R3aNunca = 0; }
									if ($p21_R3a == 0) { $p21_R3aNunca = 1; } else { $p21_R3aNunca = 0; }
									if ($p22_R3a == 0) { $p22_R3aNunca = 1; } else { $p22_R3aNunca = 0; }
									$resNunca5 = $p17_R3aNunca+$p18_R3aNunca+$p19_R3aNunca+$p20_R3aNunca+$p21_R3aNunca+$p22_R3aNunca;
									echo $resNunca5;
									echo '</td>
								</tr>
								<tr>
									<td>6</td>
									<td style="font-size: .9em;">Decisiones que puede tomar en su trabajo.<span style="font-size: .6em; color: grey;"><i> 23 - 28</i></span></td>
									<td style="text-align: center;">'; 
									if ($p23_R3a == 0) { $p23_R3aSiempre = 1; } else { $p23_R3aSiempre = 0; }
									if ($p24_R3a == 0) { $p24_R3aSiempre = 1; } else { $p24_R3aSiempre = 0; } 
									if ($p25_R3a == 0) { $p25_R3aSiempre = 1; } else { $p25_R3aSiempre = 0; } 
									if ($p26_R3a == 0) { $p26_R3aSiempre = 1; } else { $p26_R3aSiempre = 0; }
									if ($p27_R3a == 0) { $p27_R3aSiempre = 1; } else { $p27_R3aSiempre = 0; }
									if ($p28_R3a == 0) { $p28_R3aSiempre = 1; } else { $p28_R3aSiempre = 0; }
									
									$resSiempre6 = $p23_R3aSiempre+$p24_R3aSiempre+$p25_R3aSiempre+$p26_R3aSiempre+$p27_R3aSiempre+$p28_R3aSiempre;
									echo $resSiempre6;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p23_R3a == 1) { $p23_R3aCasiSiempre = 1; } else { $p23_R3aCasiSiempre = 0; }
									if ($p24_R3a == 1) { $p24_R3aCasiSiempre = 1; } else { $p24_R3aCasiSiempre = 0; } 
									if ($p25_R3a == 1) { $p25_R3aCasiSiempre = 1; } else { $p25_R3aCasiSiempre = 0; } 
									if ($p26_R3a == 1) { $p26_R3aCasiSiempre = 1; } else { $p26_R3aCasiSiempre = 0; }
									if ($p27_R3a == 1) { $p27_R3aCasiSiempre = 1; } else { $p27_R3aCasiSiempre = 0; }
									if ($p28_R3a == 1) { $p28_R3aCasiSiempre = 1; } else { $p28_R3aCasiSiempre = 0; }
									
									$resCasiSiempre6 = $p23_R3aCasiSiempre+$p24_R3aCasiSiempre+$p25_R3aCasiSiempre+$p26_R3aCasiSiempre+$p27_R3aCasiSiempre+$p28_R3aCasiSiempre;
									echo $resCasiSiempre6;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p23_R3a == 2) { $p23_R3aAlgunasVeces = 1; } else { $p23_R3aAlgunasVeces = 0; }
									if ($p24_R3a == 2) { $p24_R3aAlgunasVeces = 1; } else { $p24_R3aAlgunasVeces = 0; } 
									if ($p25_R3a == 2) { $p25_R3aAlgunasVeces = 1; } else { $p25_R3aAlgunasVeces = 0; } 
									if ($p26_R3a == 2) { $p26_R3aAlgunasVeces = 1; } else { $p26_R3aAlgunasVeces = 0; }
									if ($p27_R3a == 2) { $p27_R3aAlgunasVeces = 1; } else { $p27_R3aAlgunasVeces = 0; }
									if ($p28_R3a == 2) { $p28_R3aAlgunasVeces = 1; } else { $p28_R3aAlgunasVeces = 0; }
									
									$resAlgunasVeces6 = $p23_R3aAlgunasVeces+$p24_R3aAlgunasVeces+$p25_R3aAlgunasVeces+$p26_R3aAlgunasVeces+$p27_R3aAlgunasVeces+$p28_R3aAlgunasVeces;
									echo $resAlgunasVeces6;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p23_R3a == 3) { $p23_R3aCasiNunca = 1; } else { $p23_R3aCasiNunca = 0; }
									if ($p24_R3a == 3) { $p24_R3aCasiNunca = 1; } else { $p24_R3aCasiNunca = 0; } 
									if ($p25_R3a == 3) { $p25_R3aCasiNunca = 1; } else { $p25_R3aCasiNunca = 0; } 
									if ($p26_R3a == 3) { $p26_R3aCasiNunca = 1; } else { $p26_R3aCasiNunca = 0; }
									if ($p27_R3a == 3) { $p27_R3aCasiNunca = 1; } else { $p27_R3aCasiNunca = 0; }
									if ($p28_R3a == 3) { $p28_R3aCasiNunca = 1; } else { $p28_R3aCasiNunca = 0; }
									
									$resCasiNunca6 = $p23_R3aCasiNunca+$p24_R3aCasiNunca+$p25_R3aCasiNunca+$p26_R3aCasiNunca+$p27_R3aCasiNunca+$p28_R3aCasiNunca;
									echo $resCasiNunca6;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p23_R3a == 4) { $p23_R3aNunca = 1; } else { $p23_R3aNunca = 0; }
									if ($p24_R3a == 4) { $p24_R3aNunca = 1; } else { $p24_R3aNunca = 0; } 
									if ($p25_R3a == 4) { $p25_R3aNunca = 1; } else { $p25_R3aNunca = 0; } 
									if ($p26_R3a == 4) { $p26_R3aNunca = 1; } else { $p26_R3aNunca = 0; }
									if ($p27_R3a == 4) { $p27_R3aNunca = 1; } else { $p27_R3aNunca = 0; }
									if ($p28_R3a == 4) { $p28_R3aNunca = 1; } else { $p28_R3aNunca = 0; }
									
									$resNunca6 = $p23_R3aNunca+$p24_R3aNunca+$p25_R3aNunca+$p26_R3aNunca+$p27_R3aNunca+$p28_R3aNunca;
									echo $resNunca6;
									echo '</td>
								</tr>
								<tr>
									<td>7</td>
									<td style="font-size: .9em;">Cualquier tipo de cambio que ocurra en su trabajo.<span style="font-size: .6em; color: grey;"><i> 29 - 30 </i></span></td>
									<td style="text-align: center;">';
									if ($p29_R3a == 4) { $p29_R3aSiempre = 1; } else { $p29_R3aSiempre = 0; }
									if ($p30_R3a == 0) { $p30_R3aSiempre = 1; } else { $p30_R3aSiempre = 0; }
									$resSiempre7 = $p29_R3aSiempre+$p30_R3aSiempre;
									echo $resSiempre7;
									echo '</td>
									<td style="text-align: center;">';
									if ($p29_R3a == 3) { $p29_R3aCasiSiempre = 1; } else { $p29_R3aCasiSiempre = 0; }
									if ($p30_R3a == 1) { $p30_R3aCasiSiempre = 1; } else { $p30_R3aCasiSiempre = 0; }
									$resCasiSiempre7 = $p29_R3aCasiSiempre+$p30_R3aCasiSiempre;
									echo $resCasiSiempre7;
									echo '</td>
									<td style="text-align: center;">';
									if ($p29_R3a == 2) { $p29_R3aAlgunasVeces = 1; } else { $p29_R3aAlgunasVeces = 0; }
									if ($p30_R3a == 2) { $p30_R3aAlgunasVeces = 1; } else { $p30_R3aAlgunasVeces = 0; }
									$resAlgunasVeces7 = $p29_R3aAlgunasVeces+$p30_R3aAlgunasVeces;
									echo $resAlgunasVeces7;
									echo '</td>
									<td style="text-align: center;">';
									if ($p29_R3a == 1) { $p29_R3aCasiNunca = 1; } else { $p29_R3aCasiNunca = 0; }
									if ($p30_R3a == 3) { $p30_R3aCasiNunca = 1; } else { $p30_R3aCasiNunca = 0; }
									$resCasiNunca7 = $p29_R3aCasiNunca+$p30_R3aCasiNunca;
									echo $resCasiNunca7;
									echo '</td>
									<td style="text-align: center;">';
									if ($p29_R3a == 0) { $p29_R3aNunca = 1; } else { $p29_R3aNunca = 0; }
									if ($p30_R3a == 4) { $p30_R3aNunca = 1; } else { $p30_R3aNunca = 0; } 
									$resNunca7 = $p29_R3aNunca+$p30_R3aNunca;
									echo $resNunca7;
									echo '</td>
								</tr>
								<tr>
									<td>8</td>
									<td style="font-size: .9em;">Capacitación e información que se le proporciona sobre su trabajo.<span style="font-size: .6em; color: grey;"><i> 31 - 36 </i></td>
									<td style="text-align: center;">'; 
									if ($p31_R3a == 0) { $p31_R3aSiempre = 1; } else { $p31_R3aSiempre = 0; }
									if ($p32_R3a == 0) { $p32_R3aSiempre = 1; } else { $p32_R3aSiempre = 0; } 
									if ($p33_R3a == 0) { $p33_R3aSiempre = 1; } else { $p33_R3aSiempre = 0; }
									if ($p34_R3a == 0) { $p34_R3aSiempre = 1; } else { $p34_R3aSiempre = 0; }
									if ($p35_R3a == 0) { $p35_R3aSiempre = 1; } else { $p35_R3aSiempre = 0; } 
									if ($p36_R3a == 0) { $p36_R3aSiempre = 1; } else { $p36_R3aSiempre = 0; }
									$resSiempre8 = $p31_R3aSiempre+$p32_R3aSiempre+$p33_R3aSiempre+$p34_R3aSiempre+$p35_R3aSiempre+$p36_R3aSiempre;
									echo $resSiempre8;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p31_R3a == 1) { $p31_R3aCasiSiempre = 1; } else { $p31_R3aCasiSiempre = 0; }
									if ($p32_R3a == 1) { $p32_R3aCasiSiempre = 1; } else { $p32_R3aCasiSiempre = 0; } 
									if ($p33_R3a == 1) { $p33_R3aCasiSiempre = 1; } else { $p33_R3aCasiSiempre = 0; }
									if ($p34_R3a == 1) { $p34_R3aCasiSiempre = 1; } else { $p34_R3aCasiSiempre = 0; }
									if ($p35_R3a == 1) { $p35_R3aCasiSiempre = 1; } else { $p35_R3aCasiSiempre = 0; } 
									if ($p36_R3a == 1) { $p36_R3aCasiSiempre = 1; } else { $p36_R3aCasiSiempre = 0; }
									$resCasiSiempre8 = $p31_R3aCasiSiempre+$p32_R3aCasiSiempre+$p33_R3aCasiSiempre+$p34_R3aCasiSiempre+$p35_R3aCasiSiempre+$p36_R3aCasiSiempre;
									echo $resCasiSiempre8;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p31_R3a == 2) { $p31_R3aAlgunasVeces = 1; } else { $p31_R3aAlgunasVeces = 0; }
									if ($p32_R3a == 2) { $p32_R3aAlgunasVeces = 1; } else { $p32_R3aAlgunasVeces = 0; } 
									if ($p33_R3a == 2) { $p33_R3aAlgunasVeces = 1; } else { $p33_R3aAlgunasVeces = 0; }
									if ($p34_R3a == 2) { $p34_R3aAlgunasVeces = 1; } else { $p34_R3aAlgunasVeces = 0; }
									if ($p35_R3a == 2) { $p35_R3aAlgunasVeces = 1; } else { $p35_R3aAlgunasVeces = 0; } 
									if ($p36_R3a == 2) { $p36_R3aAlgunasVeces = 1; } else { $p36_R3aAlgunasVeces = 0; }
									$resAlgunasVeces8 = $p31_R3aAlgunasVeces+$p32_R3aAlgunasVeces+$p33_R3aAlgunasVeces+$p34_R3aAlgunasVeces+$p35_R3aAlgunasVeces+$p36_R3aAlgunasVeces;
									echo $resAlgunasVeces8;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p31_R3a == 3) { $p31_R3aCasiNunca = 1; } else { $p31_R3aCasiNunca = 0; }
									if ($p32_R3a == 3) { $p32_R3aCasiNunca = 1; } else { $p32_R3aCasiNunca = 0; } 
									if ($p33_R3a == 3) { $p33_R3aCasiNunca = 1; } else { $p33_R3aCasiNunca = 0; }
									if ($p34_R3a == 3) { $p34_R3aCasiNunca = 1; } else { $p34_R3aCasiNunca = 0; }
									if ($p35_R3a == 3) { $p35_R3aCasiNunca = 1; } else { $p35_R3aCasiNunca = 0; } 
									if ($p36_R3a == 3) { $p36_R3aCasiNunca = 1; } else { $p36_R3aCasiNunca = 0; }
									$resCasiNunca8 = $p31_R3aCasiNunca+$p32_R3aCasiNunca+$p33_R3aCasiNunca+$p34_R3aCasiNunca+$p35_R3aCasiNunca+$p36_R3aCasiNunca;
									echo $resCasiNunca8;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p31_R3a == 4) { $p31_R3aNunca = 1; } else { $p31_R3aNunca = 0; }
									if ($p32_R3a == 4) { $p32_R3aNunca = 1; } else { $p32_R3aNunca = 0; } 
									if ($p33_R3a == 4) { $p33_R3aNunca = 1; } else { $p33_R3aNunca = 0; }
									if ($p34_R3a == 4) { $p34_R3aNunca = 1; } else { $p34_R3aNunca = 0; }
									if ($p35_R3a == 4) { $p35_R3aNunca = 1; } else { $p35_R3aNunca = 0; } 
									if ($p36_R3a == 4) { $p36_R3aNunca = 1; } else { $p36_R3aNunca = 0; }
									$resNunca8 = $p31_R3aNunca+$p32_R3aNunca+$p33_R3aNunca+$p34_R3aNunca+$p35_R3aNunca+$p36_R3aNunca;
									echo $resNunca8;
									echo '</td>
								</tr>
								<tr>
									<td>9</td>
									<td style="font-size: .9em;">Jefes con quien tiene contacto.<span style="font-size: .6em; color: grey;"><i> 37 - 41 </i></td>
									<td style="text-align: center;">'; 
									if ($p37_R3a == 0) { $p37_R3aSiempre = 1; } else { $p37_R3aSiempre = 0; }
									if ($p38_R3a == 0) { $p38_R3aSiempre = 1; } else { $p38_R3aSiempre = 0; } 
									if ($p39_R3a == 0) { $p39_R3aSiempre = 1; } else { $p39_R3aSiempre = 0; }
									if ($p40_R3a == 0) { $p40_R3aSiempre = 1; } else { $p40_R3aSiempre = 0; } 
									if ($p41_R3a == 0) { $p41_R3aSiempre = 1; } else { $p41_R3aSiempre = 0; }
									$resSiempre9 = $p37_R3aSiempre+$p38_R3aSiempre+$p39_R3aSiempre+$p40_R3aSiempre+$p41_R3aSiempre;
									echo $resSiempre9;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p37_R3a == 1) { $p37_R3aCasiSiempre = 1; } else { $p37_R3aCasiSiempre = 0; }
									if ($p38_R3a == 1) { $p38_R3aCasiSiempre = 1; } else { $p38_R3aCasiSiempre = 0; } 
									if ($p39_R3a == 1) { $p39_R3aCasiSiempre = 1; } else { $p39_R3aCasiSiempre = 0; }
									if ($p40_R3a == 1) { $p40_R3aCasiSiempre = 1; } else { $p40_R3aCasiSiempre = 0; } 
									if ($p41_R3a == 1) { $p41_R3aCasiSiempre = 1; } else { $p41_R3aCasiSiempre = 0; }
									$resCasiSiempre9 = $p37_R3aCasiSiempre+$p38_R3aCasiSiempre+$p39_R3aCasiSiempre+$p40_R3aCasiSiempre+$p41_R3aCasiSiempre;
									echo $resCasiSiempre9;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p37_R3a == 2) { $p37_R3aAlgunasVeces = 1; } else { $p37_R3aAlgunasVeces = 0; }
									if ($p38_R3a == 2) { $p38_R3aAlgunasVeces = 1; } else { $p38_R3aAlgunasVeces = 0; } 
									if ($p39_R3a == 2) { $p39_R3aAlgunasVeces = 1; } else { $p39_R3aAlgunasVeces = 0; }
									if ($p40_R3a == 2) { $p40_R3aAlgunasVeces = 1; } else { $p40_R3aAlgunasVeces = 0; } 
									if ($p41_R3a == 2) { $p41_R3aAlgunasVeces = 1; } else { $p41_R3aAlgunasVeces = 0; }
									$resAlgunasVeces9 = $p37_R3aAlgunasVeces+$p38_R3aAlgunasVeces+$p39_R3aAlgunasVeces+$p40_R3aAlgunasVeces+$p41_R3aAlgunasVeces;
									echo $resAlgunasVeces9;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p37_R3a == 3) { $p37_R3aCasiNunca = 1; } else { $p37_R3aCasiNunca = 0; }
									if ($p38_R3a == 3) { $p38_R3aCasiNunca = 1; } else { $p38_R3aCasiNunca = 0; } 
									if ($p39_R3a == 3) { $p39_R3aCasiNunca = 1; } else { $p39_R3aCasiNunca = 0; }
									if ($p40_R3a == 3) { $p40_R3aCasiNunca = 1; } else { $p40_R3aCasiNunca = 0; } 
									if ($p41_R3a == 3) { $p41_R3aCasiNunca = 1; } else { $p41_R3aCasiNunca = 0; }
									$resCasiNunca9 = $p37_R3aCasiNunca+$p38_R3aCasiNunca+$p39_R3aCasiNunca+$p40_R3aCasiNunca+$p41_R3aCasiNunca;
									echo $resCasiNunca9;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p37_R3a == 4) { $p37_R3aNunca = 1; } else { $p37_R3aNunca = 0; }
									if ($p38_R3a == 4) { $p38_R3aNunca = 1; } else { $p38_R3aNunca = 0; } 
									if ($p39_R3a == 4) { $p39_R3aNunca = 1; } else { $p39_R3aNunca = 0; }
									if ($p40_R3a == 4) { $p40_R3aNunca = 1; } else { $p40_R3aNunca = 0; } 
									if ($p41_R3a == 4) { $p41_R3aNunca = 1; } else { $p41_R3aNunca = 0; }
									$resNunca9 = $p37_R3aNunca+$p38_R3aNunca+$p39_R3aNunca+$p40_R3aNunca+$p41_R3aNunca;
									echo $resNunca9;
									echo '</td>
								</tr>
								<tr>
									<td>10</td>
									<td style="font-size: .9em;">Relaciones con sus compañeros.<span style="font-size: .6em; color: grey;"><i> 42 - 46 </i></td>
									<td style="text-align: center;">'; 
									if ($p42_R3a == 0) { $p42_R3aSiempre = 1; } else { $p42_R3aSiempre = 0; }
									if ($p43_R3a == 0) { $p43_R3aSiempre = 1; } else { $p43_R3aSiempre = 0; } 
									if ($p44_R3a == 0) { $p44_R3aSiempre = 1; } else { $p44_R3aSiempre = 0; }
									if ($p45_R3a == 0) { $p45_R3aSiempre = 1; } else { $p45_R3aSiempre = 0; } 
									if ($p46_R3a == 0) { $p46_R3aSiempre = 1; } else { $p46_R3aSiempre = 0; }
									$resSiempre9 = $p42_R3aSiempre+$p43_R3aSiempre+$p44_R3aSiempre+$p45_R3aSiempre+$p46_R3aSiempre;
									echo $resSiempre9;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p42_R3a == 1) { $p42_R3aCasiSiempre = 1; } else { $p42_R3aCasiSiempre = 0; }
									if ($p43_R3a == 1) { $p43_R3aCasiSiempre = 1; } else { $p43_R3aCasiSiempre = 0; } 
									if ($p44_R3a == 1) { $p44_R3aCasiSiempre = 1; } else { $p44_R3aCasiSiempre = 0; }
									if ($p45_R3a == 1) { $p45_R3aCasiSiempre = 1; } else { $p45_R3aCasiSiempre = 0; } 
									if ($p46_R3a == 1) { $p46_R3aCasiSiempre = 1; } else { $p46_R3aCasiSiempre = 0; }
									$resCasiSiempre9 = $p42_R3aCasiSiempre+$p43_R3aCasiSiempre+$p44_R3aCasiSiempre+$p45_R3aCasiSiempre+$p46_R3aCasiSiempre;
									echo $resCasiSiempre9;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p42_R3a == 2) { $p42_R3aAlgunasVeces = 1; } else { $p42_R3aAlgunasVeces = 0; }
									if ($p43_R3a == 2) { $p43_R3aAlgunasVeces = 1; } else { $p43_R3aAlgunasVeces = 0; } 
									if ($p44_R3a == 2) { $p44_R3aAlgunasVeces = 1; } else { $p44_R3aAlgunasVeces = 0; }
									if ($p45_R3a == 2) { $p45_R3aAlgunasVeces = 1; } else { $p45_R3aAlgunasVeces = 0; } 
									if ($p46_R3a == 2) { $p46_R3aAlgunasVeces = 1; } else { $p46_R3aAlgunasVeces = 0; }
									$resAlgunasVeces9 = $p42_R3aAlgunasVeces+$p43_R3aAlgunasVeces+$p44_R3aAlgunasVeces+$p45_R3aAlgunasVeces+$p46_R3aAlgunasVeces;
									echo $resAlgunasVeces9;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p42_R3a == 3) { $p42_R3aCasiNunca = 1; } else { $p42_R3aCasiNunca = 0; }
									if ($p43_R3a == 3) { $p43_R3aCasiNunca = 1; } else { $p43_R3aCasiNunca = 0; } 
									if ($p44_R3a == 3) { $p44_R3aCasiNunca = 1; } else { $p44_R3aCasiNunca = 0; }
									if ($p45_R3a == 3) { $p45_R3aCasiNunca = 1; } else { $p45_R3aCasiNunca = 0; } 
									if ($p46_R3a == 3) { $p46_R3aCasiNunca = 1; } else { $p46_R3aCasiNunca = 0; }
									$resCasiNunca9 = $p42_R3aCasiNunca+$p43_R3aCasiNunca+$p44_R3aCasiNunca+$p45_R3aCasiNunca+$p46_R3aCasiNunca;
									echo $resCasiNunca9;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p42_R3a == 4) { $p42_R3aNunca = 1; } else { $p42_R3aNunca = 0; }
									if ($p43_R3a == 4) { $p43_R3aNunca = 1; } else { $p43_R3aNunca = 0; } 
									if ($p44_R3a == 4) { $p44_R3aNunca = 1; } else { $p44_R3aNunca = 0; }
									if ($p45_R3a == 4) { $p45_R3aNunca = 1; } else { $p45_R3aNunca = 0; } 
									if ($p46_R3a == 4) { $p46_R3aNunca = 1; } else { $p46_R3aNunca = 0; }
									$resNunca10 = $p42_R3aNunca+$p43_R3aNunca+$p44_R3aNunca+$p45_R3aNunca+$p46_R3aNunca;
									echo $resNunca10;
									echo '</td>
								</tr>
								<tr>
									<td>11</td>
									<td style="font-size: .9em;">Información que recibe sobre su rendimiento en el trabajo, el reconocimiento, el sentido de pertenencia y la estabilidad que le ofrece su trabajo.<span style="font-size: .6em; color: grey;"><i> 47 - 56 </i></td>
									<td style="text-align: center;">'; 
									if ($p47_R3a == 0) { $p47_R3aSiempre = 1; } else { $p47_R3aSiempre = 0; }
									if ($p48_R3a == 0) { $p48_R3aSiempre = 1; } else { $p48_R3aSiempre = 0; } 
									if ($p49_R3a == 0) { $p49_R3aSiempre = 1; } else { $p49_R3aSiempre = 0; }
									if ($p50_R3a == 0) { $p50_R3aSiempre = 1; } else { $p50_R3aSiempre = 0; } 
									if ($p51_R3a == 0) { $p51_R3aSiempre = 1; } else { $p51_R3aSiempre = 0; }
									if ($p52_R3a == 0) { $p52_R3aSiempre = 1; } else { $p52_R3aSiempre = 0; }
									if ($p53_R3a == 0) { $p53_R3aSiempre = 1; } else { $p53_R3aSiempre = 0; } 
									if ($p54_R3a == 4) { $p54_R3aSiempre = 1; } else { $p54_R3aSiempre = 0; }
									if ($p55_R3a == 0) { $p55_R3aSiempre = 1; } else { $p55_R3aSiempre = 0; } 
									if ($p56_R3a == 0) { $p56_R3aSiempre = 1; } else { $p56_R3aSiempre = 0; }
									$resSiempre11 = $p47_R3aSiempre+$p48_R3aSiempre+$p49_R3aSiempre+$p50_R3aSiempre+$p51_R3aSiempre+$p52_R3aSiempre+$p53_R3aSiempre+$p54_R3aSiempre+$p55_R3aSiempre+$p56_R3aSiempre;
									echo $resSiempre11;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p47_R3a == 1) { $p47_R3aCasiSiempre = 1; } else { $p47_R3aCasiSiempre = 0; }
									if ($p48_R3a == 1) { $p48_R3aCasiSiempre = 1; } else { $p48_R3aCasiSiempre = 0; } 
									if ($p49_R3a == 1) { $p49_R3aCasiSiempre = 1; } else { $p49_R3aCasiSiempre = 0; }
									if ($p50_R3a == 1) { $p50_R3aCasiSiempre = 1; } else { $p50_R3aCasiSiempre = 0; } 
									if ($p51_R3a == 1) { $p51_R3aCasiSiempre = 1; } else { $p51_R3aCasiSiempre = 0; }
									if ($p52_R3a == 1) { $p52_R3aCasiSiempre = 1; } else { $p52_R3aCasiSiempre = 0; }
									if ($p53_R3a == 1) { $p53_R3aCasiSiempre = 1; } else { $p53_R3aCasiSiempre = 0; } 
									if ($p54_R3a == 3) { $p54_R3aCasiSiempre = 1; } else { $p54_R3aCasiSiempre = 0; }
									if ($p55_R3a == 1) { $p55_R3aCasiSiempre = 1; } else { $p55_R3aCasiSiempre = 0; } 
									if ($p56_R3a == 1) { $p56_R3aCasiSiempre = 1; } else { $p56_R3aCasiSiempre = 0; }
									$resCasiSiempre11 = $p47_R3aCasiSiempre+$p48_R3aCasiSiempre+$p49_R3aCasiSiempre+$p50_R3aCasiSiempre+$p51_R3aCasiSiempre+$p52_R3aCasiSiempre+$p53_R3aCasiSiempre+$p54_R3aCasiSiempre+$p55_R3aCasiSiempre+$p56_R3aCasiSiempre;
									echo $resCasiSiempre11;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p47_R3a == 2) { $p47_R3aAlgunasVeces = 1; } else { $p47_R3aAlgunasVeces = 0; }
									if ($p48_R3a == 2) { $p48_R3aAlgunasVeces = 1; } else { $p48_R3aAlgunasVeces = 0; } 
									if ($p49_R3a == 2) { $p49_R3aAlgunasVeces = 1; } else { $p49_R3aAlgunasVeces = 0; }
									if ($p50_R3a == 2) { $p50_R3aAlgunasVeces = 1; } else { $p50_R3aAlgunasVeces = 0; } 
									if ($p51_R3a == 2) { $p51_R3aAlgunasVeces = 1; } else { $p51_R3aAlgunasVeces = 0; }
									if ($p52_R3a == 2) { $p52_R3aAlgunasVeces = 1; } else { $p52_R3aAlgunasVeces = 0; }
									if ($p53_R3a == 2) { $p53_R3aAlgunasVeces = 1; } else { $p53_R3aAlgunasVeces = 0; } 
									if ($p54_R3a == 2) { $p54_R3aAlgunasVeces = 1; } else { $p54_R3aAlgunasVeces = 0; }
									if ($p55_R3a == 2) { $p55_R3aAlgunasVeces = 1; } else { $p55_R3aAlgunasVeces = 0; } 
									if ($p56_R3a == 2) { $p56_R3aAlgunasVeces = 1; } else { $p56_R3aAlgunasVeces = 0; }
									$resAlgunasVeces11 = $p47_R3aAlgunasVeces+$p48_R3aAlgunasVeces+$p49_R3aAlgunasVeces+$p50_R3aAlgunasVeces+$p51_R3aAlgunasVeces+$p52_R3aAlgunasVeces+$p53_R3aAlgunasVeces+$p54_R3aAlgunasVeces+$p55_R3aAlgunasVeces+$p56_R3aAlgunasVeces;
									echo $resAlgunasVeces11;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p47_R3a == 3) { $p47_R3aCasiNunca = 1; } else { $p47_R3aCasiNunca = 0; }
									if ($p48_R3a == 3) { $p48_R3aCasiNunca = 1; } else { $p48_R3aCasiNunca = 0; } 
									if ($p49_R3a == 3) { $p49_R3aCasiNunca = 1; } else { $p49_R3aCasiNunca = 0; }
									if ($p50_R3a == 3) { $p50_R3aCasiNunca = 1; } else { $p50_R3aCasiNunca = 0; } 
									if ($p51_R3a == 3) { $p51_R3aCasiNunca = 1; } else { $p51_R3aCasiNunca = 0; }
									if ($p52_R3a == 3) { $p52_R3aCasiNunca = 1; } else { $p52_R3aCasiNunca = 0; }
									if ($p53_R3a == 3) { $p53_R3aCasiNunca = 1; } else { $p53_R3aCasiNunca = 0; } 
									if ($p54_R3a == 1) { $p54_R3aCasiNunca = 1; } else { $p54_R3aCasiNunca = 0; }
									if ($p55_R3a == 3) { $p55_R3aCasiNunca = 1; } else { $p55_R3aCasiNunca = 0; } 
									if ($p56_R3a == 3) { $p56_R3aCasiNunca = 1; } else { $p56_R3aCasiNunca = 0; }
									$resCasiNunca11 = $p47_R3aCasiNunca+$p48_R3aCasiNunca+$p49_R3aCasiNunca+$p50_R3aCasiNunca+$p51_R3aCasiNunca+$p52_R3aCasiNunca+$p53_R3aCasiNunca+$p54_R3aCasiNunca+$p55_R3aCasiNunca+$p56_R3aCasiNunca;
									echo $resCasiNunca11;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p47_R3a == 4) { $p47_R3aNunca = 1; } else { $p47_R3aNunca = 0; }
									if ($p48_R3a == 4) { $p48_R3aNunca = 1; } else { $p48_R3aNunca = 0; } 
									if ($p49_R3a == 4) { $p49_R3aNunca = 1; } else { $p49_R3aNunca = 0; }
									if ($p50_R3a == 4) { $p50_R3aNunca = 1; } else { $p50_R3aNunca = 0; } 
									if ($p51_R3a == 4) { $p51_R3aNunca = 1; } else { $p51_R3aNunca = 0; }
									if ($p52_R3a == 4) { $p52_R3aNunca = 1; } else { $p52_R3aNunca = 0; }
									if ($p53_R3a == 4) { $p53_R3aNunca = 1; } else { $p53_R3aNunca = 0; } 
									if ($p54_R3a == 0) { $p54_R3aNunca = 1; } else { $p54_R3aNunca = 0; }
									if ($p55_R3a == 4) { $p55_R3aNunca = 1; } else { $p55_R3aNunca = 0; } 
									if ($p56_R3a == 4) { $p56_R3aNunca = 1; } else { $p56_R3aNunca = 0; }
									$resNunca11 = $p47_R3aNunca+$p48_R3aNunca+$p49_R3aNunca+$p50_R3aNunca+$p51_R3aNunca+$p52_R3aNunca+$p53_R3aNunca+$p54_R3aNunca+$p55_R3aNunca+$p56_R3aNunca;
									echo $resNunca11;
									echo '</td>
								</tr>
								<tr>
									<td>12</td>
									<td style="font-size: .9em;">Actos de violencia laboral (malos tratos, acoso, hostigamiento, acoso psicológico).<span style="font-size: .6em; color: grey;"><i> 57 - 64 </i></td>
									<td style="text-align: center;">'; 
									if ($p57_R3a == 0) { $p57_R3aSiempre = 1; } else { $p57_R3aSiempre = 0; }
									if ($p58_R3a == 4) { $p58_R3aSiempre = 1; } else { $p58_R3aSiempre = 0; } 
									if ($p59_R3a == 4) { $p59_R3aSiempre = 1; } else { $p59_R3aSiempre = 0; }
									if ($p60_R3a == 4) { $p60_R3aSiempre = 1; } else { $p60_R3aSiempre = 0; } 
									if ($p61_R3a == 4) { $p61_R3aSiempre = 1; } else { $p61_R3aSiempre = 0; }
									if ($p62_R3a == 4) { $p62_R3aSiempre = 1; } else { $p62_R3aSiempre = 0; }
									if ($p63_R3a == 4) { $p63_R3aSiempre = 1; } else { $p63_R3aSiempre = 0; } 
									if ($p64_R3a == 4) { $p64_R3aSiempre = 1; } else { $p64_R3aSiempre = 0; }
									$resSiempre12 = $p57_R3aSiempre+$p58_R3aSiempre+$p59_R3aSiempre+$p60_R3aSiempre+$p61_R3aSiempre+$p62_R3aSiempre+$p63_R3aSiempre+$p64_R3aSiempre;
									echo $resSiempre12;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p57_R3a == 1) { $p57_R3aCasiSiempre = 1; } else { $p57_R3aCasiSiempre = 0; }
									if ($p58_R3a == 3) { $p58_R3aCasiSiempre = 1; } else { $p58_R3aCasiSiempre = 0; } 
									if ($p59_R3a == 3) { $p59_R3aCasiSiempre = 1; } else { $p59_R3aCasiSiempre = 0; }
									if ($p60_R3a == 3) { $p60_R3aCasiSiempre = 1; } else { $p60_R3aCasiSiempre = 0; } 
									if ($p61_R3a == 3) { $p61_R3aCasiSiempre = 1; } else { $p61_R3aCasiSiempre = 0; }
									if ($p62_R3a == 3) { $p62_R3aCasiSiempre = 1; } else { $p62_R3aCasiSiempre = 0; }
									if ($p63_R3a == 3) { $p63_R3aCasiSiempre = 1; } else { $p63_R3aCasiSiempre = 0; } 
									if ($p64_R3a == 3) { $p64_R3aCasiSiempre = 1; } else { $p64_R3aCasiSiempre = 0; }
									$resCasiSiempre12 = $p57_R3aCasiSiempre+$p58_R3aCasiSiempre+$p59_R3aCasiSiempre+$p60_R3aCasiSiempre+$p61_R3aCasiSiempre+$p62_R3aCasiSiempre+$p63_R3aCasiSiempre+$p64_R3aCasiSiempre;
									echo $resCasiSiempre12;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p57_R3a == 2) { $p57_R3aAlgunasVeces = 1; } else { $p57_R3aAlgunasVeces = 0; }
									if ($p58_R3a == 2) { $p58_R3aAlgunasVeces = 1; } else { $p58_R3aAlgunasVeces = 0; } 
									if ($p59_R3a == 2) { $p59_R3aAlgunasVeces = 1; } else { $p59_R3aAlgunasVeces = 0; }
									if ($p60_R3a == 2) { $p60_R3aAlgunasVeces = 1; } else { $p60_R3aAlgunasVeces = 0; } 
									if ($p61_R3a == 2) { $p61_R3aAlgunasVeces = 1; } else { $p61_R3aAlgunasVeces = 0; }
									if ($p62_R3a == 2) { $p62_R3aAlgunasVeces = 1; } else { $p62_R3aAlgunasVeces = 0; }
									if ($p63_R3a == 2) { $p63_R3aAlgunasVeces = 1; } else { $p63_R3aAlgunasVeces = 0; } 
									if ($p64_R3a == 2) { $p64_R3aAlgunasVeces = 1; } else { $p64_R3aAlgunasVeces = 0; }
									$resAlgunasVeces12 = $p57_R3aAlgunasVeces+$p58_R3aAlgunasVeces+$p59_R3aAlgunasVeces+$p60_R3aAlgunasVeces+$p61_R3aAlgunasVeces+$p62_R3aAlgunasVeces+$p63_R3aAlgunasVeces+$p64_R3aAlgunasVeces;
									echo $resAlgunasVeces12;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p57_R3a == 3) { $p57_R3aCasiNunca = 1; } else { $p57_R3aCasiNunca = 0; }
									if ($p58_R3a == 1) { $p58_R3aCasiNunca = 1; } else { $p58_R3aCasiNunca = 0; } 
									if ($p59_R3a == 1) { $p59_R3aCasiNunca = 1; } else { $p59_R3aCasiNunca = 0; }
									if ($p60_R3a == 1) { $p60_R3aCasiNunca = 1; } else { $p60_R3aCasiNunca = 0; } 
									if ($p61_R3a == 1) { $p61_R3aCasiNunca = 1; } else { $p61_R3aCasiNunca = 0; }
									if ($p62_R3a == 1) { $p62_R3aCasiNunca = 1; } else { $p62_R3aCasiNunca = 0; }
									if ($p63_R3a == 1) { $p63_R3aCasiNunca = 1; } else { $p63_R3aCasiNunca = 0; } 
									if ($p64_R3a == 1) { $p64_R3aCasiNunca = 1; } else { $p64_R3aCasiNunca = 0; }
									$resCasiNunca12 = $p57_R3aCasiNunca+$p58_R3aCasiNunca+$p59_R3aCasiNunca+$p60_R3aCasiNunca+$p61_R3aCasiNunca+$p62_R3aCasiNunca+$p63_R3aCasiNunca+$p64_R3aCasiNunca;
									echo $resCasiNunca12;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p57_R3a == 4) { $p57_R3aNunca = 1; } else { $p57_R3aNunca = 0; }
									if ($p58_R3a == 0) { $p58_R3aNunca = 1; } else { $p58_R3aNunca = 0; } 
									if ($p59_R3a == 0) { $p59_R3aNunca = 1; } else { $p59_R3aNunca = 0; }
									if ($p60_R3a == 0) { $p60_R3aNunca = 1; } else { $p60_R3aNunca = 0; } 
									if ($p61_R3a == 0) { $p61_R3aNunca = 1; } else { $p61_R3aNunca = 0; }
									if ($p62_R3a == 0) { $p62_R3aNunca = 1; } else { $p62_R3aNunca = 0; }
									if ($p63_R3a == 0) { $p63_R3aNunca = 1; } else { $p63_R3aNunca = 0; } 
									if ($p64_R3a == 0) { $p64_R3aNunca = 1; } else { $p64_R3aNunca = 0; }
									$resNunca12 = $p57_R3aNunca+$p58_R3aNunca+$p59_R3aNunca+$p60_R3aNunca+$p61_R3aNunca+$p62_R3aNunca+$p63_R3aNunca+$p64_R3aNunca;
									echo $resNunca12;
									echo '</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

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
							<i>Hoja 12</i>
						</div>
						<div style="position: absolute; margin-left: 490px; margin-top: 0px; font-size: .5em; color: grey; text-align: left;">
							<i>'.$usrNombre_R3a.'</i>
						</div>
							<!-- // RESULTADOS	 -->
							<br>
							<br>
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
									<td>13</td>
									<td style="font-size: .9em;">Atención a clientes y usuarios.<span style="font-size: .6em; color: grey;"><i> 65 - 68</i></span></td>
									<td style="text-align: center;">'; 
									if ($p65_R3a == 4) { $p65_R3aSiempre = 1; } else { $p65_R3aSiempre = 0; }
									if ($p66_R3a == 4) { $p66_R3aSiempre = 1; } else { $p66_R3aSiempre = 0; } 
									if ($p67_R3a == 4) { $p67_R3aSiempre = 1; } else { $p67_R3aSiempre = 0; } 
									if ($p68_R3a == 4) { $p68_R3aSiempre = 1; } else { $p68_R3aSiempre = 0; } 
									$resSiempre13 = $p65_R3aSiempre+$p66_R3aSiempre+$p67_R3aSiempre+$p68_R3aSiempre;
									echo $resSiempre13;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p65_R3a == 3) { $p65_R3aCasiSiempre = 1; } else { $p65_R3aCasiSiempre = 0; }
									if ($p66_R3a == 3) { $p66_R3aCasiSiempre = 1; } else { $p66_R3aCasiSiempre = 0; } 
									if ($p67_R3a == 3) { $p67_R3aCasiSiempre = 1; } else { $p67_R3aCasiSiempre = 0; } 
									if ($p68_R3a == 3) { $p68_R3aCasiSiempre = 1; } else { $p68_R3aCasiSiempre = 0; }
									$resCasiSiempre13 = $p65_R3aCasiSiempre+$p66_R3aCasiSiempre+$p67_R3aCasiSiempre+$p68_R3aCasiSiempre;
									echo $resCasiSiempre13;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p65_R3a == 2) { $p65_R3aAlgunasVeces = 1; } else { $p65_R3aAlgunasVeces = 0; }
									if ($p66_R3a == 2) { $p66_R3aAlgunasVeces = 1; } else { $p66_R3aAlgunasVeces = 0; } 
									if ($p67_R3a == 2) { $p67_R3aAlgunasVeces = 1; } else { $p67_R3aAlgunasVeces = 0; } 
									if ($p68_R3a == 2) { $p68_R3aAlgunasVeces = 1; } else { $p68_R3aAlgunasVeces = 0; }
									$resAlgunasVeces13 = $p65_R3aAlgunasVeces+$p66_R3aAlgunasVeces+$p67_R3aAlgunasVeces+$p68_R3aAlgunasVeces;
									echo $resAlgunasVeces13;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p65_R3a == 1) { $p65_R3aCasiNunca = 1; } else { $p65_R3aCasiNunca = 0; }
									if ($p66_R3a == 1) { $p66_R3aCasiNunca = 1; } else { $p66_R3aCasiNunca = 0; } 
									if ($p67_R3a == 1) { $p67_R3aCasiNunca = 1; } else { $p67_R3aCasiNunca = 0; } 
									if ($p68_R3a == 1) { $p68_R3aCasiNunca = 1; } else { $p68_R3aCasiNunca = 0; }
									$resCasiNunca13 = $p65_R3aCasiNunca+$p66_R3aCasiNunca+$p67_R3aCasiNunca+$p68_R3aCasiNunca;
									echo $resCasiNunca13;
									echo '</td>
									<td style="text-align: center;">';
									if ($p65_R3a == 0) { $p65_R3aNunca = 1; } else { $p65_R3aNunca = 0; }
									if ($p66_R3a == 0) { $p66_R3aNunca = 1; } else { $p66_R3aNunca = 0; } 
									if ($p67_R3a == 0) { $p67_R3aNunca = 1; } else { $p67_R3aNunca = 0; } 
									if ($p68_R3a == 0) { $p68_R3aNunca = 1; } else { $p68_R3aNunca = 0; }
									$resNunca13 = $p65_R3aNunca+$p66_R3aNunca+$p67_R3aNunca+$p68_R3aNunca;
									echo $resNunca13;
									echo '</td>
								</tr>
								<tr>
									<td>14</td>
									<td style="font-size: .9em;">Actitudes de las personas que supervisa.<span style="font-size: .6em; color: grey;"><i> 69 - 72</i></span></td>
									<td style="text-align: center;">'; 
									if ($p69_R3a == 4) { $p69_R3aSiempre = 1; } else { $p69_R3aSiempre = 0; }
									if ($p70_R3a == 4) { $p70_R3aSiempre = 1; } else { $p70_R3aSiempre = 0; } 
									if ($p71_R3a == 4) { $p71_R3aSiempre = 1; } else { $p71_R3aSiempre = 0; } 
									if ($p72_R3a == 4) { $p72_R3aSiempre = 1; } else { $p72_R3aSiempre = 0; } 
									$resSiempre14 = $p69_R3aSiempre+$p70_R3aSiempre+$p71_R3aSiempre+$p72_R3aSiempre;
									echo $resSiempre14;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p69_R3a == 3) { $p69_R3aCasiSiempre = 1; } else { $p69_R3aCasiSiempre = 0; }
									if ($p70_R3a == 3) { $p70_R3aCasiSiempre = 1; } else { $p70_R3aCasiSiempre = 0; } 
									if ($p71_R3a == 3) { $p71_R3aCasiSiempre = 1; } else { $p71_R3aCasiSiempre = 0; } 
									if ($p72_R3a == 3) { $p72_R3aCasiSiempre = 1; } else { $p72_R3aCasiSiempre = 0; } 
									$resCasiSiempre14 = $p69_R3aCasiSiempre+$p70_R3aCasiSiempre+$p71_R3aCasiSiempre+$p72_R3aCasiSiempre;
									echo $resCasiSiempre14;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p69_R3a == 2) { $p69_R3aAlgunasVeces = 1; } else { $p69_R3aAlgunasVeces = 0; }
									if ($p70_R3a == 2) { $p70_R3aAlgunasVeces = 1; } else { $p70_R3aAlgunasVeces = 0; } 
									if ($p71_R3a == 2) { $p71_R3aAlgunasVeces = 1; } else { $p71_R3aAlgunasVeces = 0; } 
									if ($p72_R3a == 2) { $p72_R3aAlgunasVeces = 1; } else { $p72_R3aAlgunasVeces = 0; } 
									$resAlgunasVeces14 = $p69_R3aAlgunasVeces+$p70_R3aAlgunasVeces+$p71_R3aAlgunasVeces+$p72_R3aAlgunasVeces;
									echo $resAlgunasVeces14;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p69_R3a == 1) { $p69_R3aCasiNunca = 1; } else { $p69_R3aCasiNunca = 0; }
									if ($p70_R3a == 1) { $p70_R3aCasiNunca = 1; } else { $p70_R3aCasiNunca = 0; } 
									if ($p71_R3a == 1) { $p71_R3aCasiNunca = 1; } else { $p71_R3aCasiNunca = 0; } 
									if ($p72_R3a == 1) { $p72_R3aCasiNunca = 1; } else { $p72_R3aCasiNunca = 0; } 
									$resCasiNunca14 = $p69_R3aCasiNunca+$p70_R3aCasiNunca+$p71_R3aCasiNunca+$p72_R3aCasiNunca;
									echo $resCasiNunca14;
									echo '</td>
									<td style="text-align: center;">'; 
									if ($p69_R3a == 0) { $p69_R3aNunca = 1; } else { $p69_R3aNunca = 0; }
									if ($p70_R3a == 0) { $p70_R3aNunca = 1; } else { $p70_R3aNunca = 0; } 
									if ($p71_R3a == 0) { $p71_R3aNunca = 1; } else { $p71_R3aNunca = 0; } 
									if ($p72_R3a == 0) { $p72_R3aNunca = 1; } else { $p72_R3aNunca = 0; } 
									$resNunca14 = $p69_R3aNunca+$p70_R3aNunca+$p71_R3aNunca+$p72_R3aNunca;
									echo $resNunca14;
									echo '</td>
								</tr>
							</table>

							<br>
							<br>
							<table>
								<tr>
									<td>
										<img src="soloqr.php?txtQr=http://corsec.com.mx/'.$empresa_R3a.'/impreR03/enviarResultados.aspx?correoCrypt_R3a='.$idUsr.'" style="width: 125px;" />
									</td>
									<td style="width: 300px;">
										<p>http://corsec.com.mx/'.$empresa_R3a.'/impreR03/enviarResultados.aspx?correoCrypt_R3a='.$idUsr.'</p>
									</td>
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