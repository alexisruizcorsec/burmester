<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Reporte NOM-035 GI</title>
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

	$conCero = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

	$cs = $conCero -> query("SELECT * FROM nom035R1a ORDER BY usrNombre_R1a");

	while ($datoX = $cs->fetchArray()) {

		$codeMd5 = $datoX['codeMd5_R1a']; 

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

	$busCorreo = $con -> query("SELECT * FROM nom035R1a WHERE codeMd5_R1a = '$idUsr'");

	while ($dato = $busCorreo->fetchArray()) {
		$p1_R1a = $dato['p1_R1a'];
		$p2_R1a = $dato['p2_R1a'];
		$p3_R1a = $dato['p3_R1a'];
		$p4_R1a = $dato['p4_R1a'];
		$p5_R1a = $dato['p5_R1a'];
		$p6_R1a = $dato['p6_R1a'];
		$p7_R1a = $dato['p7_R1a'];
		$p8_R1a = $dato['p8_R1a'];
		$p9_R1a = $dato['p9_R1a'];
		$p10_R1a = $dato['p10_R1a'];
		$p11_R1a = $dato['p11_R1a'];
		$p12_R1a = $dato['p12_R1a'];
		$p13_R1a = $dato['p13_R1a'];
		$p14_R1a = $dato['p14_R1a'];
		$p15_R1a = $dato['p15_R1a'];
		$p16_R1a = $dato['p16_R1a'];
		$p17_R1a = $dato['p17_R1a'];
		$p18_R1a = $dato['p18_R1a'];
		$p19_R1a = $dato['p19_R1a'];
		$p20_R1a = $dato['p20_R1a'];
		$p21_R1a = $dato['p21_R1a'];
		$empresa_R1a = $dato['empresa_R1a'];
		$dirEmpresa_R1a = $dato['dirEmpresa_R1a'];
		$codeMd5_R1a = $dato['codeMd5_R1a'];
		$usrNumEmp_R1a = $dato['usrNumEmp_R1a'];
		$fecha_R1a = $dato['fechaHoraFinal_R1a'];
		$nombre_R1a = $dato['usrNombre_R1a'];

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



###########################
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
				<div style="position: absolute; margin-left: 560px; margin-top: -32px; font-size: .8em;">
					<i>Hoja 1</i>
				</div>
				<div style="position: absolute; margin-left: 490px; margin-top: 0px; font-size: .5em; color: grey; text-align: left;">
					<i>'.$nombre_R1a.'</i>
				</div>

				<h4>REPORTE PARA IDENTIFICAR A LOS TRABAJADORES QUE FUERON SUJETOS A ACONTECIMIENTOS TRAUMÁTICOS SEVEROS <span style="font-size: .5em; color: #DDDDDD;"><i>'.$sumaCasos.'</i></span></h4>

				<div style="font-size: .93em;">
					<p>Con base en los resultados del <i>“Cuestionario para identificar a los trabajadores que fueron sujetos a acontecimientos traumáticos severos”</i> especificado en la <b>Guía de Referencia I de la NORMA Oficial Mexicana NOM-035-STPS-2018</b>, Factores de riesgo psicosocial en el trabajo-Identificación, análisis y prevención, que fue aplicado el día <b>'.$dia.' de '.$mes.' del '.$ano.'</b>, se identificó que el colaborador <b>'.$nombre_R1a.'</b></p>
					<!-- // COMPRO I	 -->				
					<p>'.$rComp_R1a.'</p>

					<p>'.$resulSelector.'</p>
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
			<div style="padding: 10px; width: 630px; height: 950px; margin: auto;">
				<div style="position: absolute; margin-left: 560px; margin-top: -13px; font-size: .8em;">
					<i>Hoja 2</i>
				</div>
				<div style="position: absolute; margin-left: 490px; margin-top: 5px; font-size: .5em; color: grey; text-align: left;">
					<i>'.$nombre_R1a.'</i>
				</div>
				<h4>RESULTADOS DEL “CUESTIONARIO PARA IDENTIFICAR A LOS TRABAJADORES QUE FUERON SUJETOS A ACONTECIMIENTOS TRAUMÁTICOS SEVEROS”</h4>
				<br>
				<div style="font-size: .93em;">
					<p><b>I.- Acontecimiento traumático severo</b></p>
					<p>Ha presenciado o sufrido alguna vez, durante o con motivo del trabajo un acontecimiento como los siguientes:</p>
					<ol>
						<li>¿Accidente que tenga como consecuencia la muerte, la pérdida de un miembro o una lesión grave?</li>
						<p>'; if ($p2_R1a == 1) { echo '<input type="checkbox" checked>Sí<br> <input type="checkbox">No<br>'; }else{ echo '<input type="checkbox">Sí<br> <input type="checkbox" checked>No<br>'; } echo '</p>
						<li>¿Asaltos?</li>
						<p>'; if ($p3_R1a == 1) { echo '<input type="checkbox" checked>Sí<br> <input type="checkbox">No<br>'; }else{ echo '<input type="checkbox">Sí<br> <input type="checkbox" checked>No<br>'; } echo '</p>
						<li>¿Actos violentos que derivaron en lesiones graves?</li>
						<p>'; if ($p4_R1a == 1) { echo '<input type="checkbox" checked>Sí<br> <input type="checkbox">No<br>'; }else{ echo '<input type="checkbox">Sí<br> <input type="checkbox" checked>No<br>'; } echo '</p>
						<li>¿Secuestro?</li>
						<p>'; if ($p5_R1a == 1) { echo '<input type="checkbox" checked>Sí<br> <input type="checkbox">No<br>'; }else{ echo '<input type="checkbox">Sí<br> <input type="checkbox" checked>No<br>'; } echo '</p>
						<li>¿Amenazas?</li>
						<p>'; if ($p6_R1a == 1) { echo '<input type="checkbox" checked>Sí<br> <input type="checkbox">No<br>'; }else{ echo '<input type="checkbox">Sí<br> <input type="checkbox" checked>No<br>'; } echo '</p>
						<li>¿Cualquier otro que ponga en riesgo su vida o salud, y/o la de otras personas?</li>
						<p>'; if ($p7_R1a == 1) { echo '<input type="checkbox" checked>Sí<br> <input type="checkbox">No<br>'; }else{ echo '<input type="checkbox">Sí<br> <input type="checkbox" checked>No<br>'; } echo '</p>
						
					</ol>
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
			<div style="padding: 10px; width: 630px; height: 950px; margin: auto;">
				<div style="position: absolute; margin-left: 560px; margin-top: -13px; font-size: .8em;">
					<i>Hoja 3</i>
				</div>
				<div style="position: absolute; margin-left: 490px; margin-top: 5px; font-size: .5em; color: grey; text-align: left;">
					<i>'.$nombre_R1a.'</i>
				</div>
					<p><b>II.- Recuerdos persistentes sobre el acontecimiento</b></p>
					<ol>
						<li value="7">¿Ha tenido recuerdos recurrentes sobre el acontecimiento que le provocan malestares?</li>
						<p>'; if ($p8_R1a == 1) { echo '<input type="checkbox" checked>Sí<br> <input type="checkbox">No<br>'; }else{ echo '<input type="checkbox">Sí<br> <input type="checkbox" checked>No<br>'; } echo '</p>
						<li>¿Ha tenido sueños de carácter recurrente sobre el acontecimiento, que le producen malestar?</li>
						<p>'; if ($p9_R1a == 1) { echo '<input type="checkbox" checked>Sí<br> <input type="checkbox">No<br>'; }else{ echo '<input type="checkbox">Sí<br> <input type="checkbox" checked>No<br>'; } echo '</p>
						
					</ol>
					<p><b>III.- Esfuerzo por evitar circunstancias parecidas o asociadas al acontecimiento</b></p>
					<ol>
						<li value="9">¿Se ha esforzado por evitar todo tipo de sentimientos, conversaciones o situaciones que le puedan recordar el acontecimiento?</li>
						<p>'; if ($p10_R1a == 1) { echo '<input type="checkbox" checked>Sí<br> <input type="checkbox">No<br>'; }else{ echo '<input type="checkbox">Sí<br> <input type="checkbox" checked>No<br>'; } echo '</p>
						<li>¿Se ha esforzado por evitar todo tipo de actividades, lugares o personas que motivan recuerdos del acontecimiento?</li>
						<p>'; if ($p11_R1a == 1) { echo '<input type="checkbox" checked>Sí<br> <input type="checkbox">No<br>'; }else{ echo '<input type="checkbox">Sí<br> <input type="checkbox" checked>No<br>'; } echo '</p>
						<li>¿Ha tenido dificultad para recordar alguna parte importante del evento?</li>
						<p>'; if ($p12_R1a == 1) { echo '<input type="checkbox" checked>Sí<br> <input type="checkbox">No<br>'; }else{ echo '<input type="checkbox">Sí<br> <input type="checkbox" checked>No<br>'; } echo '</p>
						<li>¿Ha disminuido su interés en sus actividades cotidianas?</li>
						<p>'; if ($p13_R1a == 1) { echo '<input type="checkbox" checked>Sí<br> <input type="checkbox">No<br>'; }else{ echo '<input type="checkbox">Sí<br> <input type="checkbox" checked>No<br>'; } echo '</p>
						<li>¿Se ha sentido usted alejado o distante de los demás?</li>
						<p>'; if ($p14_R1a == 1) { echo '<input type="checkbox" checked>Sí<br> <input type="checkbox">No<br>'; }else{ echo '<input type="checkbox">Sí<br> <input type="checkbox" checked>No<br>'; } echo '</p>
					</ol>
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
			<div style="padding: 10px; width: 630px; height: 950px; margin: auto;">
				<div style="position: absolute; margin-left: 560px; margin-top: -13px; font-size: .8em;">
					<i>Hoja 4</i>
				</div>
				<div style="position: absolute; margin-left: 490px; margin-top: 5px; font-size: .5em; color: grey; text-align: left;">
					<i>'.$nombre_R1a.'</i>
				</div>
					<ol>
						<li value="14">¿Ha notado que tiene dificultad para expresar sus sentimientos?</li>
						<p>'; if ($p15_R1a == 1) { echo '<input type="checkbox" checked>Sí<br> <input type="checkbox">No<br>'; }else{ echo '<input type="checkbox">Sí<br> <input type="checkbox" checked>No<br>'; } echo '</p>
						<li>¿Ha tenido la impresión de que su vida se va a acortar, que va a morir antes que otras personas o que tiene un futuro limitado?</li>
						<p>'; if ($p16_R1a == 1) { echo '<input type="checkbox" checked>Sí<br> <input type="checkbox">No<br>'; }else{ echo '<input type="checkbox">Sí<br> <input type="checkbox" checked>No<br>'; } echo '</p>
					</ol>
					<p><b>IV.- Afectación</b></p>
					<ol>
						<li value="16">¿Ha tenido usted dificultades para dormir?</li>
						<p>'; if ($p17_R1a == 1) { echo '<input type="checkbox" checked>Sí<br> <input type="checkbox">No<br>'; }else{ echo '<input type="checkbox">Sí<br> <input type="checkbox" checked>No<br>'; } echo '</p>
						<li>¿Ha estado particularmente irritable o le han dado arranques de coraje?</li>
						<p>'; if ($p18_R1a == 1) { echo '<input type="checkbox" checked>Sí<br> <input type="checkbox">No<br>'; }else{ echo '<input type="checkbox">Sí<br> <input type="checkbox" checked>No<br>'; } echo '</p>
						<li>¿Ha tenido dificultad para concentrarse?</li>
						<p>'; if ($p19_R1a == 1) { echo '<input type="checkbox" checked>Sí<br> <input type="checkbox">No<br>'; }else{ echo '<input type="checkbox">Sí<br> <input type="checkbox" checked>No<br>'; } echo '</p>
						<li>¿Ha estado nervioso o constantemente en alerta?</li>
						<p>'; if ($p20_R1a == 1) { echo '<input type="checkbox" checked>Sí<br> <input type="checkbox">No<br>'; }else{ echo '<input type="checkbox">Sí<br> <input type="checkbox" checked>No<br>'; } echo '</p>
						<li>¿Se ha sobresaltado fácilmente por cualquier cosa?</li>
						<p>'; if ($p21_R1a == 1) { echo '<input type="checkbox" checked>Sí<br> <input type="checkbox">No<br>'; }else{ echo '<input type="checkbox">Sí<br> <input type="checkbox" checked>No<br>'; } echo '</p>
					</ol>
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
			<div style="padding: 10px; width: 630px; height: 950px; margin: auto;">
				<div style="position: absolute; margin-left: 560px; margin-top: -13px; font-size: .8em;">
					<i>Hoja 5</i>
				</div>
				<div style="position: absolute; margin-left: 490px; margin-top: 5px; font-size: .5em; color: grey; text-align: left;">
					<i>'.$nombre_R1a.'</i>
				</div>
					<p><b>RESULTADOS</b></p>
					<table>
						<tr>
							<th>Sección / Pregunta</th>
							<th>Respuestas</th>
						</tr>
						<tr>
							<td>I.- Acontecimiento traumático severo</td>
							'; $totalSiI = $p2_R1a+$p3_R1a+$p4_R1a+$p5_R1a+$p6_R1a+$p7_R1a; $totalNoI = 6-$totalSiI; echo '
							<td>Sí: '; echo $totalSiI; echo ' No: '; echo $totalNoI.'</td>
						</tr>
						<tr>
							<td>II.- Recuerdos persistentes sobre el acontecimiento</td>
							'; $totalSiII = $p8_R1a+$p9_R1a; $totalNoII = 2-$totalSiII; echo '
							<td>Sí: '; echo $totalSiII; echo 'No: '; echo $totalNoII; echo '</td>
						</tr>
						<tr>
							<td style="width: 450px;">III.- Esfuerzo por evitar circunstancias parecidas o asociadas al acontecimiento</td>
							'; $totalSiIII = $p10_R1a+$p11_R1a+$p12_R1a+$p13_R1a+$p14_R1a+$p15_R1a+$p16_R1a; $totalNoIII = 7-$totalSiIII; echo'
							<td>Sí: '; echo $totalSiIII; echo 'No: '; echo $totalNoIII; echo '</td>
						</tr>
						<tr>
							<td>IV.- Afectación</td>
							'; $totalSiIV = $p17_R1a+$p18_R1a+$p19_R1a+$p20_R1a+$p21_R1a; $totalNoIV = 5-$totalSiIV; echo '
							<td>Sí: '; echo $totalSiIV; echo 'No: '; echo $totalNoIV; echo '</td>
						</tr>
						<tr>
							<th style="text-align: right;">Totales:</th>
							'; $totalSiF = $totalSiI+$totalSiII+$totalSiIII+$totalSiIV; $totalNoF = 20-$totalSiF; echo '
							<th>Sí: '; echo $totalSiF; echo ' No: '; echo $totalNoF; echo '</th>
						</tr>
					</table>
					<br>
					<br>
					<table>
						<tr>
							<td>
								<img src="soloqr.php?txtQr=http://www.corsec.com.mx/'.$empresa_R1a.'/impreR01/enviarResultados.aspx?correoCrypt_R1a='.$idUsr.'" style="width: 125px;" />
							</td>
							<td style="width: 300px;">
								<p style="font-size: .8em;">http://www.corsec.com.mx/'.$empresa_R1a.'/impreR01/enviarResultados.aspx?correoCrypt_R1a='.$idUsr.'</p>
							</td>
						</tr>
					</table>
			</div>
			</div>
		</div>
	</div>


	


';


	}

}

$con -> close();



 ?>


</body>
</html>