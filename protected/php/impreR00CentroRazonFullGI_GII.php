<?php
error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");
date_default_timezone_set('America/Mexico_City');


$centro = (isset($_GET['centro'])) ? $_GET['centro'] : '';
$razonSoc = (isset($_GET['razonSoc'])) ? $_GET['razonSoc'] : '';


?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title><?php echo $centro.'_'.$razonSoc ;?> GI, GII y GII Matriz FULL</title>
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
<body>
<!-- <body onload="window.print();"> -->


<?php 



	$conCero = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

	$csCero = $conCero -> query("SELECT p1_R1a, p2_R1a, p3_R1a, p4_R1a, p5_R1a, p6_R1a, p7_R1a, p8_R1a, p9_R1a, p10_R1a, p11_R1a, p12_R1a, p13_R1a, p14_R1a, p15_R1a, p16_R1a, p17_R1a, p18_R1a, p19_R1a, p20_R1a, p21_R1a, empresa_R1a, dirEmpresa_R1a, correo_R1a, codeMd5_R1a, usrSexo_R1a, usrNumEmp_R1a, fechaHoraInicio_R1a, fechaHoraFinal_R1a, usrNombre_R1a FROM dataEmpleadosDos INNER JOIN nom035R1a ON Nombred = usrNombre_R1a WHERE Corporativod = '$centro' AND RazonSociald = '$razonSoc'  ORDER BY usrNombre_R1a");

	while ($datoX = $csCero->fetchArray()) {

		$codeMd5 = $datoX['codeMd5_R1a'];

		//Inicia GI

		$correoCrypt = '';
		$sumaCasos ='';
		$resulSelector ='';
		$idUsr = $codeMd5;
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
		$empresa_R1a ='';
		$dirEmpresa_R1a = '';
		$correo_R1a = '';
		$codeMd5_R1a = '';
		$usrSexo_R1a = '';
		$usrNumEmp_R1a = '';
		$fecha_ini = '';
		$fecha_R1a = '';
		$nombre_R1a = '';
		$rComp_R1a = '';
		$ocultarUno = '';

		### INICIA CONSULTA GPS ###

		$conCero = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

		$csE = $conCero -> query("SELECT codeMd5d,gpsd FROM dataEmpleadosDos INNER JOIN nom035R1a ON usrNombre_R1a = Nombred WHERE codeMd5d = '$idUsr'");
		while ($dato = $csE->fetchArray()) {
			$correoCrypt = $dato['codeMd5d'];
			$gpsd = $dato['gpsd'];
		}

		$conCero -> close();

		### TERMINA CONSULTA GPS ###

		### INICIA GI ###
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
									<tr>Copia Digital</tr>
									<tr>
										<td>
											<img src="soloqr.php?txtQr=http://corsec.com.mx/'.$empresa_R1a.'/impreR01/enviarResultados.aspx?correoCrypt_R1a='.$idUsr.'" style="width: 125px;" />
										</td>
										<td style="width: 300px;">
											<p  style="font-size: .8em;">http://corsec.com.mx/'.$empresa_R1a.'/impreR01/enviarResultados.aspx?correoCrypt_R1a='.$idUsr.'</p>
										</td>
									</tr>
								</table>
								<br>
								<br>
								<table>
									<tr>Georreferenciación del levantamiento</tr>
									<tr>
										<td>
											<img src="soloqr.php?txtQr=https://www.google.com.mx/maps/@'.$gpsd.',18z" style="width: 125px;" />
										</td>
										<td style="width: 300px;">
											<p style="font-size: .8em;">https://www.google.com.mx/maps/@'.$gpsd.',18z</p>
										</td>
									</tr>
								</table>
						</div>
						</div>
					</div>
				</div>
				';
				
		}
		$con -> close();

		### TERMINA GI ###

		### INICIA GII ###

		$correoCrypt = '';
		$sumaCasos ='';
		$resulSelector ='';
		$dia = '';
		$mes = '';
		$ano = '';
		$comp_R2a = '';
		$p1_R2a = '';
		$p2_R2a = '';
		$p3_R2a = '';
		$p4_R2a = '';
		$p5_R2a = '';
		$p6_R2a = '';
		$p7_R2a = '';
		$p8_R2a = '';
		$p9_R2a = '';
		$p10_R2a = '';
		$p11_R2a = '';
		$p12_R2a = '';
		$p13_R2a = '';
		$p14_R2a = '';
		$p15_R2a = '';
		$p16_R2a = '';
		$p17_R2a = '';
		$p18_R2a = '';
		$p19_R2a = '';
		$p20_R2a = '';
		$p21_R2a = '';
		$p22_R2a = '';
		$p23_R2a = '';
		$p24_R2a = '';
		$p25_R2a = '';
		$p26_R2a = '';
		$p27_R2a = '';
		$p28_R2a = '';
		$p29_R2a = '';
		$p30_R2a = '';
		$p31_R2a = '';
		$p32_R2a = '';
		$p33_R2a = '';
		$p34_R2a = '';
		$p35_R2a = '';
		$p36_R2a = '';
		$p37_R2a = '';
		$p38_R2a = '';
		$p39_R2a = '';
		$p40_R2a = '';
		$p41_R2a = '';
		$p42_R2a = '';
		$p43_R2a = '';
		$p44_R2a = '';
		$p45_R2a = '';
		$p46_R2a = '';
		$empresa_R2a ='';
		$dirEmpresa_R2a = '';
		$correo_R2a = '';
		$codeMd5_R2a = '';
		$usrSexo_R2a = '';
		$usrNumEmp_R2a = '';
		$fecha_ini = '';
		$fecha_R1a = '';
		$nombre_R2a = '';
		$rComp_R2a = '';
		$ocultarUno = '';

		$con = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

		$busCorreo = $con -> query("SELECT * FROM nom035R2a WHERE codeMd5_R2a = '$idUsr'");

		while ($dato = $busCorreo->fetchArray()) {
			$p1_R2a = $dato['p1_R2a'];
			$p2_R2a = $dato['p2_R2a'];
			$p3_R2a = $dato['p3_R2a'];
			$p4_R2a = $dato['p4_R2a'];
			$p5_R2a = $dato['p5_R2a'];
			$p6_R2a = $dato['p6_R2a'];
			$p7_R2a = $dato['p7_R2a'];
			$p8_R2a = $dato['p8_R2a'];
			$p9_R2a = $dato['p9_R2a'];
			$p10_R2a = $dato['p10_R2a'];
			$p11_R2a = $dato['p11_R2a'];
			$p12_R2a = $dato['p12_R2a'];
			$p13_R2a = $dato['p13_R2a'];
			$p14_R2a = $dato['p14_R2a'];
			$p15_R2a = $dato['p15_R2a'];
			$p16_R2a = $dato['p16_R2a'];
			$p17_R2a = $dato['p17_R2a'];
			$p18_R2a = $dato['p18_R2a'];
			$p19_R2a = $dato['p19_R2a'];
			$p20_R2a = $dato['p20_R2a'];
			$p21_R2a = $dato['p21_R2a'];
			$p22_R2a = $dato['p22_R2a'];
			$p23_R2a = $dato['p23_R2a'];
			$p24_R2a = $dato['p24_R2a'];
			$p25_R2a = $dato['p25_R2a'];
			$p26_R2a = $dato['p26_R2a'];
			$p27_R2a = $dato['p27_R2a'];
			$p28_R2a = $dato['p28_R2a'];
			$p29_R2a = $dato['p29_R2a'];
			$p30_R2a = $dato['p30_R2a'];
			$p31_R2a = $dato['p31_R2a'];
			$p32_R2a = $dato['p32_R2a'];
			$p33_R2a = $dato['p33_R2a'];
			$p34_R2a = $dato['p34_R2a'];
			$p35_R2a = $dato['p35_R2a'];
			$p36_R2a = $dato['p36_R2a'];
			$p37_R2a = $dato['p37_R2a'];
			$p38_R2a = $dato['p38_R2a'];
			$p39_R2a = $dato['p39_R2a'];
			$p40_R2a = $dato['p40_R2a'];
			$p41_R2a = $dato['p41_R2a'];
			$p42_R2a = $dato['p42_R2a'];
			$p43_R2a = $dato['p43_R2a'];
			$p44_R2a = $dato['p44_R2a'];
			$p45_R2a = $dato['p45_R2a'];
			$p46_R2a = $dato['p46_R2a'];
			$empresa_R2a = $dato['empresa_R2a'];
			$dirEmpresa_R2a = $dato['dirEmpresa_R2a'];
			$correo_R2a = $dato['correo_R2a'];
			$codeMd5_R2a = $dato['codeMd5_R2a'];
			$usrSexo_R2a = $dato['usrSexo_R2a'];
			$usrNumEmp_R2a = $dato['usrNumEmp_R2a'];
			$fecha_ini = $dato['fechaHoraInicio_R2a'];
			$fecha_R1a = $dato['fechaHoraFinal_R2a'];
			$nombre_R2a = $dato['usrNombre_R2a'];
			
		
	
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
							<div style="position: absolute; margin-left: 560px; margin-top: -32px; font-size: .8em;">
								<i>Hoja 1</i>
							</div>
							<div style="position: absolute; margin-left: 490px; margin-top: 0px; font-size: .5em; color: grey; text-align: left;">
								<i>'.$nombre_R2a.'</i>
							</div>
							<h4>CUESTIONARIO  PARA LA IDENTIFICACIÓN Y ANÁLISIS DE LOS FACTORES DE RIESGO PSICOSOCIAL</h4>
	
							<div style="font-size: .93em;">
								<p>Con base en los requisitos de la <b>Norma Oficial Mexicana NOM-035-STPS-2018</b>, Factores de riesgo psicosocial en el trabajo-Identificación, análisis y prevención, se realizó el <i>“Cuestionario para identificar los factores de riesgo psicosocial en los centros de trabajo”</i> especificado en la <b>Guía de Referencia II</b> de dicha norma.
									<br>
									<br>
									El cuestionario fue aplicado el día: <b>'.$dia.' de '.$mes.' del '.$ano.'.</b>
									<br>
									<br>
									Las respuestas que se presentan a continuación corresponden al trabajador: <b>'.$nombre_R2a.'.</b>
								</p>
								<!-- // CUESTIONARIO PARTE I	 -->
								<p>
								Para responder las preguntas siguientes considere las condiciones de su centro de trabajo, así como la cantidad y ritmo de trabajo
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
										<td>Mi trabajo me exige hacer mucho esfuerzo físico.</td>
										<td>'; if ($p1_R2a == 4) { echo 'X'; } echo '</td>
										<td>'; if ($p1_R2a == 3) { echo 'X'; } echo '</td>
										<td>'; if ($p1_R2a == 2) { echo 'X'; } echo '</td>
										<td>'; if ($p1_R2a == 1) { echo 'X'; } echo '</td>
										<td>'; if ($p1_R2a == 0) { echo 'X'; } echo '</td>
									</tr>
									<tr>
										<td>2</td>
										<td>Me preocupa sufrir un accidente en mi trabajo.</td>
										<td>'; if ($p2_R2a == 4) { echo 'X'; } echo '</td>
										<td>'; if ($p2_R2a == 3) { echo 'X'; } echo '</td>
										<td>'; if ($p2_R2a == 2) { echo 'X'; } echo '</td>
										<td>'; if ($p2_R2a == 1) { echo 'X'; } echo '</td>
										<td>'; if ($p2_R2a == 0) { echo 'X'; } echo '</td>
									</tr>
									<tr>
										<td>3</td>
										<td>Considero que las actividades que realizo son peligrosas.</td>
										<td>'; if ($p3_R2a == 4) { echo 'X'; } echo '</td>
										<td>'; if ($p3_R2a == 3) { echo 'X'; } echo '</td>
										<td>'; if ($p3_R2a == 2) { echo 'X'; } echo '</td>
										<td>'; if ($p3_R2a == 1) { echo 'X'; } echo '</td>
										<td>'; if ($p3_R2a == 0) { echo 'X'; } echo '</td>
									</tr>
									<tr>
										<td>4</td>
										<td>Por la cantidad de trabajo que tengo debo quedarme tiempo adicional a mi turno.</td>
										<td>'; if ($p4_R2a == 4) { echo 'X'; } echo '</td>
										<td>'; if ($p4_R2a == 3) { echo 'X'; } echo '</td>
										<td>'; if ($p4_R2a == 2) { echo 'X'; } echo '</td>
										<td>'; if ($p4_R2a == 1) { echo 'X'; } echo '</td>
										<td>'; if ($p4_R2a == 0) { echo 'X'; } echo '</td>
									</tr>
									<tr>
										<td>5</td>
										<td>Por la cantidad de trabajo que tengo debo trabajar sin parar.</td>
										<td>'; if ($p5_R2a == 4) { echo 'X'; } echo '</td>
										<td>'; if ($p5_R2a == 3) { echo 'X'; } echo '</td>
										<td>'; if ($p5_R2a == 2) { echo 'X'; } echo '</td>
										<td>'; if ($p5_R2a == 1) { echo 'X'; } echo '</td>
										<td>'; if ($p5_R2a == 0) { echo 'X'; } echo '</td>
									</tr>
									<tr>
										<td>6</td>
										<td>Considero que es necesario mantener un ritmo de trabajo acelerado.</td>
										<td>'; if ($p6_R2a == 4) { echo 'X'; } echo '</td>
										<td>'; if ($p6_R2a == 3) { echo 'X'; } echo '</td>
										<td>'; if ($p6_R2a == 2) { echo 'X'; } echo '</td>
										<td>'; if ($p6_R2a == 1) { echo 'X'; } echo '</td>
										<td>'; if ($p6_R2a == 0) { echo 'X'; } echo '</td>
									</tr>
									<tr>
										<td>7</td>
										<td>Mi trabajo exige que esté muy concentrado.</td>
										<td>'; if ($p7_R2a == 4) { echo 'X'; } echo '</td>
										<td>'; if ($p7_R2a == 3) { echo 'X'; } echo '</td>
										<td>'; if ($p7_R2a == 2) { echo 'X'; } echo '</td>
										<td>'; if ($p7_R2a == 1) { echo 'X'; } echo '</td>
										<td>'; if ($p7_R2a == 0) { echo 'X'; } echo '</td>
									</tr>
									<tr>
										<td>8</td>
										<td>Mi trabajo requiere que memorice mucha información.</td>
										<td>'; if ($p8_R2a == 4) { echo 'X'; } echo '</td>
										<td>'; if ($p8_R2a == 3) { echo 'X'; } echo '</td>
										<td>'; if ($p8_R2a == 2) { echo 'X'; } echo '</td>
										<td>'; if ($p8_R2a == 1) { echo 'X'; } echo '</td>
										<td>'; if ($p8_R2a == 0) { echo 'X'; } echo '</td>
									</tr>
									<tr>
										<td>9</td>
										<td>Mi trabajo exige que atienda varios asuntos al mismo tiempo.</td>
										<td>'; if ($p9_R2a == 4) { echo 'X'; } echo '</td>
										<td>'; if ($p9_R2a == 3) { echo 'X'; } echo '</td>
										<td>'; if ($p9_R2a == 2) { echo 'X'; } echo '</td>
										<td>'; if ($p9_R2a == 1) { echo 'X'; } echo '</td>
										<td>'; if ($p9_R2a == 0) { echo 'X'; } echo '</td>
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
							<div style="position: absolute; margin-left: 560px; margin-top: -32px; font-size: .8em;">
								<i>Hoja 2</i>
							</div>
							<div style="position: absolute; margin-left: 490px; margin-top: 0px; font-size: .5em; color: grey; text-align: left;">
								<i>'.$nombre_R2a.'</i>
							</div>
							
								<!-- // CUESTIONARIO PARTE II	 -->
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
										<td>10</td>
										<td>En mi trabajo soy responsable de cosas de mucho valor.</td>
										<td>'; if ($p10_R2a == 4) { echo 'X'; } echo '</td>
										<td>'; if ($p10_R2a == 3) { echo 'X'; } echo '</td>
										<td>'; if ($p10_R2a == 2) { echo 'X'; } echo '</td>
										<td>'; if ($p10_R2a == 1) { echo 'X'; } echo '</td>
										<td>'; if ($p10_R2a == 0) { echo 'X'; } echo '</td>
									</tr>
									<tr>
										<td>11</td>
										<td>Respondo ante mi jefe por los resultados de toda mi área de trabajo.</td>
										<td>'; if ($p11_R2a == 4) { echo 'X'; } echo '</td>
										<td>'; if ($p11_R2a == 3) { echo 'X'; } echo '</td>
										<td>'; if ($p11_R2a == 2) { echo 'X'; } echo '</td>
										<td>'; if ($p11_R2a == 1) { echo 'X'; } echo '</td>
										<td>'; if ($p11_R2a == 0) { echo 'X'; } echo '</td>
									</tr>
									<tr>
										<td>12</td>
										<td>En mi trabajo me dan órdenes contradictorias.</td>
										<td>'; if ($p12_R2a == 4) { echo 'X'; } echo '</td>
										<td>'; if ($p12_R2a == 3) { echo 'X'; } echo '</td>
										<td>'; if ($p12_R2a == 2) { echo 'X'; } echo '</td>
										<td>'; if ($p12_R2a == 1) { echo 'X'; } echo '</td>
										<td>'; if ($p12_R2a == 0) { echo 'X'; } echo '</td>
									</tr>
									<tr>
										<td>13</td>
										<td>Considero que en mi trabajo me piden hacer cosas innecesarias.</td>
										<td>'; if ($p13_R2a == 4) { echo 'X'; } echo '</td>
										<td>'; if ($p13_R2a == 3) { echo 'X'; } echo '</td>
										<td>'; if ($p13_R2a == 2) { echo 'X'; } echo '</td>
										<td>'; if ($p13_R2a == 1) { echo 'X'; } echo '</td>
										<td>'; if ($p13_R2a == 0) { echo 'X'; } echo '</td>
									</tr>
								</table>
								<br>
								<p>
									Las preguntas siguientes están relacionadas con el tiempo destinado a su trabajo y sus responsabilidades familiares.
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
										<td>14</td>
										<td>Trabajo horas extras más de tres veces a la semana.</td>
										<td>'; if ($p14_R2a == 4) { echo 'X'; } echo '</td>
										<td>'; if ($p14_R2a == 3) { echo 'X'; } echo '</td>
										<td>'; if ($p14_R2a == 2) { echo 'X'; } echo '</td>
										<td>'; if ($p14_R2a == 1) { echo 'X'; } echo '</td>
										<td>'; if ($p14_R2a == 0) { echo 'X'; } echo '</td>
									</tr>
									<tr>
										<td>15</td>
										<td>Mi trabajo me exige laborar en días de descanso, festivos o fines de semana.</td>
										<td>'; if ($p15_R2a == 4) { echo 'X'; } echo '</td>
										<td>'; if ($p15_R2a == 3) { echo 'X'; } echo '</td>
										<td>'; if ($p15_R2a == 2) { echo 'X'; } echo '</td>
										<td>'; if ($p15_R2a == 1) { echo 'X'; } echo '</td>
										<td>'; if ($p15_R2a == 0) { echo 'X'; } echo '</td>
									</tr>
									<tr>
										<td>16</td>
										<td>Considero que el tiempo en el trabajo es mucho y perjudica mis actividades familiares o personales.</td>
										<td>'; if ($p16_R2a == 4) { echo 'X'; } echo '</td>
										<td>'; if ($p16_R2a == 3) { echo 'X'; } echo '</td>
										<td>'; if ($p16_R2a == 2) { echo 'X'; } echo '</td>
										<td>'; if ($p16_R2a == 1) { echo 'X'; } echo '</td>
										<td>'; if ($p16_R2a == 0) { echo 'X'; } echo '</td>
									</tr>
									<tr>
										<td>17</td>
										<td>Pienso en las actividades familiares o personales cuando estoy en mi trabajo.</td>
										<td>'; if ($p17_R2a == 4) { echo 'X'; } echo '</td>
										<td>'; if ($p17_R2a == 3) { echo 'X'; } echo '</td>
										<td>'; if ($p17_R2a == 2) { echo 'X'; } echo '</td>
										<td>'; if ($p17_R2a == 1) { echo 'X'; } echo '</td>
										<td>'; if ($p17_R2a == 0) { echo 'X'; } echo '</td>
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
							<div style="position: absolute; margin-left: 560px; margin-top: -32px; font-size: .8em;">
								<i>Hoja 3</i>
							</div>
							<div style="position: absolute; margin-left: 490px; margin-top: 0px; font-size: .5em; color: grey; text-align: left;">
								<i>'.$nombre_R2a.'</i>
							</div>
							
								<!-- // CUESTIONARIO PARTE III	 -->
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
										<td>18</td>
										<td>Mi trabajo permite que desarrolle nuevas habilidades.</td>
										<td>'; if ($p18_R2a == 0) { echo 'X'; } echo '</td>
										<td>'; if ($p18_R2a == 1) { echo 'X'; } echo '</td>
										<td>'; if ($p18_R2a == 2) { echo 'X'; } echo '</td>
										<td>'; if ($p18_R2a == 3) { echo 'X'; } echo '</td>
										<td>'; if ($p18_R2a == 4) { echo 'X'; } echo '</td>
									</tr>
									<tr>
										<td>19</td>
										<td>En mi trabajo puedo aspirar a un mejor puesto.</td>
										<td>'; if ($p19_R2a == 0) { echo 'X'; } echo '</td>
										<td>'; if ($p19_R2a == 1) { echo 'X'; } echo '</td>
										<td>'; if ($p19_R2a == 2) { echo 'X'; } echo '</td>
										<td>'; if ($p19_R2a == 3) { echo 'X'; } echo '</td>
										<td>'; if ($p19_R2a == 4) { echo 'X'; } echo '</td>
									</tr>
									<tr>
										<td>20</td>
										<td>Durante mi jornada de trabajo puedo tomar pausas cuando las necesito.</td>
										<td>'; if ($p20_R2a == 0) { echo 'X'; } echo '</td>
										<td>'; if ($p20_R2a == 1) { echo 'X'; } echo '</td>
										<td>'; if ($p20_R2a == 2) { echo 'X'; } echo '</td>
										<td>'; if ($p20_R2a == 3) { echo 'X'; } echo '</td>
										<td>'; if ($p20_R2a == 4) { echo 'X'; } echo '</td>
									</tr>
									<tr>
										<td>21</td>
										<td>Puedo decidir la velocidad a la que realizo mis actividades en mi trabajo.</td>
										<td>'; if ($p21_R2a == 0) { echo 'X'; } echo '</td>
										<td>'; if ($p21_R2a == 1) { echo 'X'; } echo '</td>
										<td>'; if ($p21_R2a == 2) { echo 'X'; } echo '</td>
										<td>'; if ($p21_R2a == 3) { echo 'X'; } echo '</td>
										<td>'; if ($p21_R2a == 4) { echo 'X'; } echo '</td>
									</tr>
									<tr>
										<td>22</td>
										<td>Puedo cambiar el orden de las actividades que realizo en mi trabajo.</td>
										<td>'; if ($p22_R2a == 0) { echo 'X'; } echo '</td>
										<td>'; if ($p22_R2a == 1) { echo 'X'; } echo '</td>
										<td>'; if ($p22_R2a == 2) { echo 'X'; } echo '</td>
										<td>'; if ($p22_R2a == 3) { echo 'X'; } echo '</td>
										<td>'; if ($p22_R2a == 4) { echo 'X'; } echo '</td>
									</tr>
								</table>
								<!-- // CUESTIONARIO PARTE V	 -->
								<p>
								Las preguntas siguientes están relacionadas con la capacitación e información que recibe sobre su trabajo.
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
										<td>Me informan con claridad cuáles son mis funciones.</td>
										<td>'; if ($p23_R2a == 0) { echo 'X'; } echo '</td>
										<td>'; if ($p23_R2a == 1) { echo 'X'; } echo '</td>
										<td>'; if ($p23_R2a == 2) { echo 'X'; } echo '</td>
										<td>'; if ($p23_R2a == 3) { echo 'X'; } echo '</td>
										<td>'; if ($p23_R2a == 4) { echo 'X'; } echo '</td>
									</tr>
									<tr>
										<td>24</td>
										<td>Me explican claramente los resultados que debo obtener en mi trabajo.</td>
										<td>'; if ($p24_R2a == 0) { echo 'X'; } echo '</td>
										<td>'; if ($p24_R2a == 1) { echo 'X'; } echo '</td>
										<td>'; if ($p24_R2a == 2) { echo 'X'; } echo '</td>
										<td>'; if ($p24_R2a == 3) { echo 'X'; } echo '</td>
										<td>'; if ($p24_R2a == 4) { echo 'X'; } echo '</td>
									</tr>
									<tr>
										<td>25</td>
										<td>Me informan con quién puedo resolver problemas o asuntos de trabajo.</td>
										<td>'; if ($p25_R2a == 0) { echo 'X'; } echo '</td>
										<td>'; if ($p25_R2a == 1) { echo 'X'; } echo '</td>
										<td>'; if ($p25_R2a == 2) { echo 'X'; } echo '</td>
										<td>'; if ($p25_R2a == 3) { echo 'X'; } echo '</td>
										<td>'; if ($p25_R2a == 4) { echo 'X'; } echo '</td>
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
							<div style="position: absolute; margin-left: 560px; margin-top: -32px; font-size: .8em;">
								<i>Hoja 4</i>
							</div>
							<div style="position: absolute; margin-left: 490px; margin-top: 0px; font-size: .5em; color: grey; text-align: left;">
								<i>'.$nombre_R2a.'</i>
							</div>
								<!-- // CUESTIONARIO PARTE IV	 -->
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
										<td>26</td>
										<td>Me permiten asistir a capacitaciones relacionadas con mi trabajo.</td>
										<td>'; if ($p26_R2a == 0) { echo 'X'; } echo '</td>
										<td>'; if ($p26_R2a == 1) { echo 'X'; } echo '</td>
										<td>'; if ($p26_R2a == 2) { echo 'X'; } echo '</td>
										<td>'; if ($p26_R2a == 3) { echo 'X'; } echo '</td>
										<td>'; if ($p26_R2a == 4) { echo 'X'; } echo '</td>
									</tr>
									<tr>
										<td>27</td>
										<td>Recibo capacitación útil para hacer mi trabajo.</td>
										<td>'; if ($p27_R2a == 0) { echo 'X'; } echo '</td>
										<td>'; if ($p27_R2a == 1) { echo 'X'; } echo '</td>
										<td>'; if ($p27_R2a == 2) { echo 'X'; } echo '</td>
										<td>'; if ($p27_R2a == 3) { echo 'X'; } echo '</td>
										<td>'; if ($p27_R2a == 4) { echo 'X'; } echo '</td>
									</tr>
								</table>
								<p>
								Las preguntas siguientes se refieren a las relaciones con sus compañeros de trabajo y su jefe.
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
										<td>28</td>
										<td>Mi jefe tiene en cuenta mis puntos de vista y opiniones.</td>
										<td>'; if ($p28_R2a == 0) { echo 'X'; } echo '</td>
										<td>'; if ($p28_R2a == 1) { echo 'X'; } echo '</td>
										<td>'; if ($p28_R2a == 2) { echo 'X'; } echo '</td>
										<td>'; if ($p28_R2a == 3) { echo 'X'; } echo '</td>
										<td>'; if ($p28_R2a == 4) { echo 'X'; } echo '</td>
									</tr>
									<tr>
										<td>29</td>
										<td>Mi jefe ayuda a solucionar los problemas que se presentan en el trabajo.</td>
										<td>'; if ($p29_R2a == 0) { echo 'X'; } echo '</td>
										<td>'; if ($p29_R2a == 1) { echo 'X'; } echo '</td>
										<td>'; if ($p29_R2a == 2) { echo 'X'; } echo '</td>
										<td>'; if ($p29_R2a == 3) { echo 'X'; } echo '</td>
										<td>'; if ($p29_R2a == 4) { echo 'X'; } echo '</td>
									</tr>
									<tr>
										<td>30</td>
										<td>Puedo confiar en mis compañeros de trabajo.</td>
										<td>'; if ($p30_R2a == 0) { echo 'X'; } echo '</td>
										<td>'; if ($p30_R2a == 1) { echo 'X'; } echo '</td>
										<td>'; if ($p30_R2a == 2) { echo 'X'; } echo '</td>
										<td>'; if ($p30_R2a == 3) { echo 'X'; } echo '</td>
										<td>'; if ($p30_R2a == 4) { echo 'X'; } echo '</td>
									</tr>
									<tr>
										<td>31</td>
										<td>Cuando tenemos que realizar trabajo de equipo los compañeros colaboran.</td>
										<td>'; if ($p31_R2a == 0) { echo 'X'; } echo '</td>
										<td>'; if ($p31_R2a == 1) { echo 'X'; } echo '</td>
										<td>'; if ($p31_R2a == 2) { echo 'X'; } echo '</td>
										<td>'; if ($p31_R2a == 3) { echo 'X'; } echo '</td>
										<td>'; if ($p31_R2a == 4) { echo 'X'; } echo '</td>
									</tr>
									<tr>
										<td>32</td>
										<td>Mis compañeros de trabajo me ayudan cuando tengo dificultades.</td>
										<td>'; if ($p32_R2a == 0) { echo 'X'; } echo '</td>
										<td>'; if ($p32_R2a == 1) { echo 'X'; } echo '</td>
										<td>'; if ($p32_R2a == 2) { echo 'X'; } echo '</td>
										<td>'; if ($p32_R2a == 3) { echo 'X'; } echo '</td>
										<td>'; if ($p32_R2a == 4) { echo 'X'; } echo '</td>
									</tr>
									<tr>
										<td>33</td>
										<td>En mi trabajo puedo expresarme libremente sin interrupciones.</td>
										<td>'; if ($p33_R2a == 0) { echo 'X'; } echo '</td>
										<td>'; if ($p33_R2a == 1) { echo 'X'; } echo '</td>
										<td>'; if ($p33_R2a == 2) { echo 'X'; } echo '</td>
										<td>'; if ($p33_R2a == 3) { echo 'X'; } echo '</td>
										<td>'; if ($p33_R2a == 4) { echo 'X'; } echo '</td>
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
							<div style="position: absolute; margin-left: 560px; margin-top: -32px; font-size: .8em;">
								<i>Hoja 5</i>
							</div>
							<div style="position: absolute; margin-left: 490px; margin-top: 0px; font-size: .5em; color: grey; text-align: left;">
								<i>'.$nombre_R2a.'</i>
							</div>
	
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
										<td>34</td>
										<td>Recibo críticas constantes a mi persona y/o trabajo.</td>
										<td>'; if ($p34_R2a == 4) { echo 'X'; } echo '</td>
										<td>'; if ($p34_R2a == 3) { echo 'X'; } echo '</td>
										<td>'; if ($p34_R2a == 2) { echo 'X'; } echo '</td>
										<td>'; if ($p34_R2a == 1) { echo 'X'; } echo '</td>
										<td>'; if ($p34_R2a == 0) { echo 'X'; } echo '</td>
									</tr>
									<tr>
										<td>35</td>
										<td>Recibo burlas, calumnias, difamaciones, humillaciones o ridiculizaciones.</td>
										<td>'; if ($p35_R2a == 4) { echo 'X'; } echo '</td>
										<td>'; if ($p35_R2a == 3) { echo 'X'; } echo '</td>
										<td>'; if ($p35_R2a == 2) { echo 'X'; } echo '</td>
										<td>'; if ($p35_R2a == 1) { echo 'X'; } echo '</td>
										<td>'; if ($p35_R2a == 0) { echo 'X'; } echo '</td>
									</tr>
									<tr>
										<td>36</td>
										<td>Se ignora mi presencia o se me excluye de las reuniones de trabajo y en la toma de decisiones.</td>
										<td>'; if ($p36_R2a == 4) { echo 'X'; } echo '</td>
										<td>'; if ($p36_R2a == 3) { echo 'X'; } echo '</td>
										<td>'; if ($p36_R2a == 2) { echo 'X'; } echo '</td>
										<td>'; if ($p36_R2a == 1) { echo 'X'; } echo '</td>
										<td>'; if ($p36_R2a == 0) { echo 'X'; } echo '</td>
									</tr>
									<tr>
										<td>37</td>
										<td>Se manipulan las situaciones de trabajo para hacerme parecer un mal trabajador.</td>
										<td>'; if ($p37_R2a == 4) { echo 'X'; } echo '</td>
										<td>'; if ($p37_R2a == 3) { echo 'X'; } echo '</td>
										<td>'; if ($p37_R2a == 2) { echo 'X'; } echo '</td>
										<td>'; if ($p37_R2a == 1) { echo 'X'; } echo '</td>
										<td>'; if ($p37_R2a == 0) { echo 'X'; } echo '</td>
									</tr>
									<tr>
										<td>38</td>
										<td>Se ignoran mis éxitos laborales y se atribuyen a otros trabajadores.</td>
										<td>'; if ($p38_R2a == 4) { echo 'X'; } echo '</td>
										<td>'; if ($p38_R2a == 3) { echo 'X'; } echo '</td>
										<td>'; if ($p38_R2a == 2) { echo 'X'; } echo '</td>
										<td>'; if ($p38_R2a == 1) { echo 'X'; } echo '</td>
										<td>'; if ($p38_R2a == 0) { echo 'X'; } echo '</td>
									</tr>
									<tr>
										<td>39</td>
										<td>Me bloquean o impiden las oportunidades que tengo para obtener ascenso o mejora en mi trabajo.</td>
										<td>'; if ($p39_R2a == 4) { echo 'X'; } echo '</td>
										<td>'; if ($p39_R2a == 3) { echo 'X'; } echo '</td>
										<td>'; if ($p39_R2a == 2) { echo 'X'; } echo '</td>
										<td>'; if ($p39_R2a == 1) { echo 'X'; } echo '</td>
										<td>'; if ($p39_R2a == 0) { echo 'X'; } echo '</td>
									</tr>
									<tr>
										<td>40</td>
										<td>He presenciado actos de violencia en mi centro de trabajo.</td>
										<td>'; if ($p40_R2a == 4) { echo 'X'; } echo '</td>
										<td>'; if ($p40_R2a == 3) { echo 'X'; } echo '</td>
										<td>'; if ($p40_R2a == 2) { echo 'X'; } echo '</td>
										<td>'; if ($p40_R2a == 1) { echo 'X'; } echo '</td>
										<td>'; if ($p40_R2a == 0) { echo 'X'; } echo '</td>
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
							<div style="position: absolute; margin-left: 560px; margin-top: -32px; font-size: .8em;">
								<i>Hoja 6</i>
							</div>
							<div style="position: absolute; margin-left: 490px; margin-top: 0px; font-size: .5em; color: grey; text-align: left;">
								<i>'.$nombre_R2a.'</i>
							</div>
								<!-- // CUESTIONARIO PARTE II	 -->
								<p>
								Las preguntas siguientes están relacionadas con la atención a clientes y usuarios.
								</p>
	
								<table>
									<tr>
										<td>En mi trabajo debo brindar servicio a clientes o usuarios:</td>
										<td>Sí</td>
										<td>'; $sumaAtenPreUno = $p41_R2a+$p42_R2a+$p43_R2a; if ($sumaAtenPreUno >= 1) { echo 'X'; } echo '</td>
										<td>No</td>
										<td>'; if ($sumaAtenPreUno == NULL) { echo 'X'; } echo '</td>
									</tr>
								</table>
								<p>
									Si su respuesta fue "SÍ", responda las preguntas siguientes. Si su respuesta fue "NO" pase a las preguntas de la sección siguiente.
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
										<td>41</td>
										<td>Atiendo clientes o usuarios muy enojados.</td>
										<td>'; if ($p41_R2a == 4) { echo 'X'; } echo '</td>
										<td>'; if ($p41_R2a == 3) { echo 'X'; } echo '</td>
										<td>'; if ($p41_R2a == 2) { echo 'X'; } echo '</td>
										<td>'; if ($p41_R2a == 1) { echo 'X'; } echo '</td>
										<td>'; if ($p41_R2a == 0) { echo 'X'; } echo '</td>
									</tr>
									<tr>
										<td>42</td>
										<td>Mi trabajo me exige atender personas muy necesitadas de ayuda o enfermas.</td>
										<td>'; if ($p42_R2a == 4) { echo 'X'; } echo '</td>
										<td>'; if ($p42_R2a == 3) { echo 'X'; } echo '</td>
										<td>'; if ($p42_R2a == 2) { echo 'X'; } echo '</td>
										<td>'; if ($p42_R2a == 1) { echo 'X'; } echo '</td>
										<td>'; if ($p42_R2a == 0) { echo 'X'; } echo '</td>
									</tr>
									<tr>
										<td>43</td>
										<td>Para hacer mi trabajo debo demostrar sentimientos distintos a los míos.</td>
										<td>'; if ($p43_R2a == 4) { echo 'X'; } echo '</td>
										<td>'; if ($p43_R2a == 3) { echo 'X'; } echo '</td>
										<td>'; if ($p43_R2a == 2) { echo 'X'; } echo '</td>
										<td>'; if ($p43_R2a == 1) { echo 'X'; } echo '</td>
										<td>'; if ($p43_R2a == 0) { echo 'X'; } echo '</td>
									</tr>
								</table>
								<br>
								<table>
									<tr>
										<td>En mi trabajo debo brindar servicio a clientes o usuarios:</td>
										<td>Sí</td>
										<td>'; $sumaAtenPreDos = $p44_R2a+$p45_R2a+$p46_R2a; if ($sumaAtenPreDos >= 1) { echo 'X'; } echo '</td>
										<td>No</td>
										<td>'; if ($sumaAtenPreDos == NULL) { echo 'X'; } echo '</td>
									</tr>
								</table>
	
								<p>
									Si su respuesta fue "SÍ", responda las preguntas siguientes. Si su respuesta fue "NO" pase a las preguntas de la sección siguiente.
								</p>
								<p>Las siguientes preguntas están relacionadas con las actitudes de los trabajadores que supervisa.</p>
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
										<td>44</td>
										<td>Comunican tarde los asuntos de trabajo.</td>
										<td>'; if ($p44_R2a == 4) { echo 'X'; } echo '</td>
										<td>'; if ($p44_R2a == 3) { echo 'X'; } echo '</td>
										<td>'; if ($p44_R2a == 2) { echo 'X'; } echo '</td>
										<td>'; if ($p44_R2a == 1) { echo 'X'; } echo '</td>
										<td>'; if ($p44_R2a == 0) { echo 'X'; } echo '</td>
									</tr>
									<tr>
										<td>45</td>
										<td>Dificultan el logro de los resultados del trabajo.</td>
										<td>'; if ($p45_R2a == 4) { echo 'X'; } echo '</td>
										<td>'; if ($p45_R2a == 3) { echo 'X'; } echo '</td>
										<td>'; if ($p45_R2a == 2) { echo 'X'; } echo '</td>
										<td>'; if ($p45_R2a == 1) { echo 'X'; } echo '</td>
										<td>'; if ($p45_R2a == 0) { echo 'X'; } echo '</td>
									</tr>
									<tr>
										<td>46</td>
										<td>Ignoran las sugerencias para mejorar su trabajo.</td>
										<td>'; if ($p46_R2a == 4) { echo 'X'; } echo '</td>
										<td>'; if ($p46_R2a == 3) { echo 'X'; } echo '</td>
										<td>'; if ($p46_R2a == 2) { echo 'X'; } echo '</td>
										<td>'; if ($p46_R2a == 1) { echo 'X'; } echo '</td>
										<td>'; if ($p46_R2a == 0) { echo 'X'; } echo '</td>
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
							<div style="position: absolute; margin-left: 560px; margin-top: -32px; font-size: .8em;">
								<i>Hoja 7</i>
							</div>
							<div style="position: absolute; margin-left: 490px; margin-top: 0px; font-size: .5em; color: grey; text-align: left;">
								<i>'.$nombre_R2a.'</i>
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
										<td style="font-size: .9em;">Condiciones de centro de trabajo, cantidad y ritmo de trabajo.<span style="font-size: .6em; color: grey;"><i> 1 - 9 (-)</i></span></td>
										<td style="text-align: center;">'; 
										if ($p1_R2a == 4) { $p1_R2aSiempre = 1; } else { $p1_R2aSiempre = 0; }
										if ($p2_R2a == 4) { $p2_R2aSiempre = 1; } else { $p2_R2aSiempre = 0; } 
										if ($p3_R2a == 4) { $p3_R2aSiempre = 1; } else { $p3_R2aSiempre = 0; } 
										if ($p4_R2a == 4) { $p4_R2aSiempre = 1; } else { $p4_R2aSiempre = 0; } 
										if ($p5_R2a == 4) { $p5_R2aSiempre = 1; } else { $p5_R2aSiempre = 0; } 
										if ($p6_R2a == 4) { $p6_R2aSiempre = 1; } else { $p6_R2aSiempre = 0; } 
										if ($p7_R2a == 4) { $p7_R2aSiempre = 1; } else { $p7_R2aSiempre = 0; } 
										if ($p8_R2a == 4) { $p8_R2aSiempre = 1; } else { $p8_R2aSiempre = 0; } 
										if ($p9_R2a == 4) { $p9_R2aSiempre = 1; } else { $p9_R2aSiempre = 0; }
										$resSiempre1 = $p1_R2aSiempre+$p2_R2aSiempre+$p3_R2aSiempre+$p4_R2aSiempre+$p5_R2aSiempre+$p6_R2aSiempre+$p7_R2aSiempre+$p8_R2aSiempre+$p9_R2aSiempre;
										echo $resSiempre1;
										echo '</td>
										<td style="text-align: center;">'; 
										if ($p1_R2a == 3) { $p1_R2aCasiSiempre = 1; } else { $p1_R2aCasiSiempre = 0; }
										if ($p2_R2a == 3) { $p2_R2aCasiSiempre = 1; } else { $p2_R2aCasiSiempre = 0; } 
										if ($p3_R2a == 3) { $p3_R2aCasiSiempre = 1; } else { $p3_R2aCasiSiempre = 0; } 
										if ($p4_R2a == 3) { $p4_R2aCasiSiempre = 1; } else { $p4_R2aCasiSiempre = 0; } 
										if ($p5_R2a == 3) { $p5_R2aCasiSiempre = 1; } else { $p5_R2aCasiSiempre = 0; } 
										if ($p6_R2a == 3) { $p6_R2aCasiSiempre = 1; } else { $p6_R2aCasiSiempre = 0; } 
										if ($p7_R2a == 3) { $p7_R2aCasiSiempre = 1; } else { $p7_R2aCasiSiempre = 0; } 
										if ($p8_R2a == 3) { $p8_R2aCasiSiempre = 1; } else { $p8_R2aCasiSiempre = 0; } 
										if ($p9_R2a == 3) { $p9_R2aCasiSiempre = 1; } else { $p9_R2aCasiSiempre = 0; }
										$resCasiSiempre1 = $p1_R2aCasiSiempre+$p2_R2aCasiSiempre+$p3_R2aCasiSiempre+$p4_R2aCasiSiempre+$p5_R2aCasiSiempre+$p6_R2aCasiSiempre+$p7_R2aCasiSiempre+$p8_R2aCasiSiempre+$p9_R2aCasiSiempre;
										echo $resCasiSiempre1;
										echo '</td>
										<td style="text-align: center;">'; 
										if ($p1_R2a == 2) { $p1_R2aAlgunasVeces = 1; } else { $p1_R2aAlgunasVeces = 0; }
										if ($p2_R2a == 2) { $p2_R2aAlgunasVeces = 1; } else { $p2_R2aAlgunasVeces = 0; } 
										if ($p3_R2a == 2) { $p3_R2aAlgunasVeces = 1; } else { $p3_R2aAlgunasVeces = 0; } 
										if ($p4_R2a == 2) { $p4_R2aAlgunasVeces = 1; } else { $p4_R2aAlgunasVeces = 0; } 
										if ($p5_R2a == 2) { $p5_R2aAlgunasVeces = 1; } else { $p5_R2aAlgunasVeces = 0; } 
										if ($p6_R2a == 2) { $p6_R2aAlgunasVeces = 1; } else { $p6_R2aAlgunasVeces = 0; } 
										if ($p7_R2a == 2) { $p7_R2aAlgunasVeces = 1; } else { $p7_R2aAlgunasVeces = 0; } 
										if ($p8_R2a == 2) { $p8_R2aAlgunasVeces = 1; } else { $p8_R2aAlgunasVeces = 0; } 
										if ($p9_R2a == 2) { $p9_R2aAlgunasVeces = 1; } else { $p9_R2aAlgunasVeces = 0; }
										$resAlgunasVeces1 = $p1_R2aAlgunasVeces+$p2_R2aAlgunasVeces+$p3_R2aAlgunasVeces+$p4_R2aAlgunasVeces+$p5_R2aAlgunasVeces+$p6_R2aAlgunasVeces+$p7_R2aAlgunasVeces+$p8_R2aAlgunasVeces+$p9_R2aAlgunasVeces;
										echo $resAlgunasVeces1;
										echo '</td>
										<td style="text-align: center;">'; 
										if ($p1_R2a == 1) { $p1_R2aCasiNunca = 1; } else { $p1_R2aCasiNunca = 0; }
										if ($p2_R2a == 1) { $p2_R2aCasiNunca = 1; } else { $p2_R2aCasiNunca = 0; } 
										if ($p3_R2a == 1) { $p3_R2aCasiNunca = 1; } else { $p3_R2aCasiNunca = 0; } 
										if ($p4_R2a == 1) { $p4_R2aCasiNunca = 1; } else { $p4_R2aCasiNunca = 0; } 
										if ($p5_R2a == 1) { $p5_R2aCasiNunca = 1; } else { $p5_R2aCasiNunca = 0; } 
										if ($p6_R2a == 1) { $p6_R2aCasiNunca = 1; } else { $p6_R2aCasiNunca = 0; } 
										if ($p7_R2a == 1) { $p7_R2aCasiNunca = 1; } else { $p7_R2aCasiNunca = 0; } 
										if ($p8_R2a == 1) { $p8_R2aCasiNunca = 1; } else { $p8_R2aCasiNunca = 0; } 
										if ($p9_R2a == 1) { $p9_R2aCasiNunca = 1; } else { $p9_R2aCasiNunca = 0; }
										$resCasiNunca1 = $p1_R2aCasiNunca+$p2_R2aCasiNunca+$p3_R2aCasiNunca+$p4_R2aCasiNunca+$p5_R2aCasiNunca+$p6_R2aCasiNunca+$p7_R2aCasiNunca+$p8_R2aCasiNunca+$p9_R2aCasiNunca;
										echo $resCasiNunca1;
										echo '</td>
										<td style="text-align: center;">'; 
										if ($p1_R2a == 0) { $p1_R2aNunca = 1; } else { $p1_R2aNunca = 0; }
										if ($p2_R2a == 0) { $p2_R2aNunca = 1; } else { $p2_R2aNunca = 0; } 
										if ($p3_R2a == 0) { $p3_R2aNunca = 1; } else { $p3_R2aNunca = 0; } 
										if ($p4_R2a == 0) { $p4_R2aNunca = 1; } else { $p4_R2aNunca = 0; } 
										if ($p5_R2a == 0) { $p5_R2aNunca = 1; } else { $p5_R2aNunca = 0; } 
										if ($p6_R2a == 0) { $p6_R2aNunca = 1; } else { $p6_R2aNunca = 0; } 
										if ($p7_R2a == 0) { $p7_R2aNunca = 1; } else { $p7_R2aNunca = 0; } 
										if ($p8_R2a == 0) { $p8_R2aNunca = 1; } else { $p8_R2aNunca = 0; } 
										if ($p9_R2a == 0) { $p9_R2aNunca = 1; } else { $p9_R2aNunca = 0; }
										$resNunca1 = $p1_R2aNunca+$p2_R2aNunca+$p3_R2aNunca+$p4_R2aNunca+$p5_R2aNunca+$p6_R2aNunca+$p7_R2aNunca+$p8_R2aNunca+$p9_R2aNunca;
										echo $resNunca1;
										echo '</td>
									</tr>
									<tr>
										<td>2</td>
										<td style="font-size: .9em;">Actividades que realiza en su trabajo y las responsabilidades que tiene.<span style="font-size: .6em; color: grey;"><i> 10 - 13 (-)</i></span></td>
										<td style="text-align: center;">'; 
										if ($p10_R2a == 4) { $p10_R2aSiempre = 1; } else { $p10_R2aSiempre = 0; }
										if ($p11_R2a == 4) { $p11_R2aSiempre = 1; } else { $p11_R2aSiempre = 0; } 
										if ($p12_R2a == 4) { $p12_R2aSiempre = 1; } else { $p12_R2aSiempre = 0; } 
										if ($p13_R2a == 4) { $p13_R2aSiempre = 1; } else { $p13_R2aSiempre = 0; }
										$resSiempre2 = $p10_R2aSiempre+$p11_R2aSiempre+$p12_R2aSiempre+$p13_R2aSiempre;
										echo $resSiempre2;
										echo '</td>
										<td style="text-align: center;">'; 
										if ($p10_R2a == 3) { $p10_R2aCasiSiempre = 1; } else { $p10_R2aCasiSiempre = 0; }
										if ($p11_R2a == 3) { $p11_R2aCasiSiempre = 1; } else { $p11_R2aCasiSiempre = 0; } 
										if ($p12_R2a == 3) { $p12_R2aCasiSiempre = 1; } else { $p12_R2aCasiSiempre = 0; } 
										if ($p13_R2a == 3) { $p13_R2aCasiSiempre = 1; } else { $p13_R2aCasiSiempre = 0; } 
										$resCasiSiempre2 = $p10_R2aCasiSiempre+$p11_R2aCasiSiempre+$p12_R2aCasiSiempre+$p13_R2aCasiSiempre;
										echo $resCasiSiempre2;
										echo '</td>
										<td style="text-align: center;">'; 
										if ($p10_R2a == 2) { $p10_R2aAlgunasVeces = 1; } else { $p10_R2aAlgunasVeces = 0; }
										if ($p11_R2a == 2) { $p11_R2aAlgunasVeces = 1; } else { $p11_R2aAlgunasVeces = 0; } 
										if ($p12_R2a == 2) { $p12_R2aAlgunasVeces = 1; } else { $p12_R2aAlgunasVeces = 0; } 
										if ($p13_R2a == 2) { $p13_R2aAlgunasVeces = 1; } else { $p13_R2aAlgunasVeces = 0; }
										$resAlgunasVeces2 = $p10_R2aAlgunasVeces+$p11_R2aAlgunasVeces+$p12_R2aAlgunasVeces+$p13_R2aAlgunasVeces;
										echo $resAlgunasVeces2;
										echo '</td>
										<td style="text-align: center;">'; 
										if ($p10_R2a == 1) { $p10_R2aCasiNunca = 1; } else { $p10_R2aCasiNunca = 0; }
										if ($p11_R2a == 1) { $p11_R2aCasiNunca = 1; } else { $p11_R2aCasiNunca = 0; } 
										if ($p12_R2a == 1) { $p12_R2aCasiNunca = 1; } else { $p12_R2aCasiNunca = 0; } 
										if ($p13_R2a == 1) { $p13_R2aCasiNunca = 1; } else { $p13_R2aCasiNunca = 0; }
										$resCasiNunca2 = $p10_R2aCasiNunca+$p11_R2aCasiNunca+$p12_R2aCasiNunca+$p13_R2aCasiNunca;
										echo $resCasiNunca2;
										echo '</td>
										<td style="text-align: center;">'; 
										if ($p10_R2a == 0) { $p10_R2aNunca = 1; } else { $p10_R2aNunca = 0; }
										if ($p11_R2a == 0) { $p11_R2aNunca = 1; } else { $p11_R2aNunca = 0; } 
										if ($p12_R2a == 0) { $p12_R2aNunca = 1; } else { $p12_R2aNunca = 0; } 
										if ($p13_R2a == 0) { $p13_R2aNunca = 1; } else { $p13_R2aNunca = 0; }
										$resNunca2 = $p10_R2aNunca+$p11_R2aNunca+$p12_R2aNunca+$p13_R2aNunca;
										echo $resNunca2;
										echo '</td>
									</tr>
									<tr>
										<td>3</td>
										<td style="font-size: .9em;">Tiempo destinado a su trabajo y sus responsabilidades familiares.<span style="font-size: .6em; color: grey;"><i> 14 - 17 (-)</i></span></td>
										<td style="text-align: center;">'; 
										if ($p14_R2a == 4) { $p14_R2aSiempre = 1; } else { $p14_R2aSiempre = 0; }
										if ($p15_R2a == 4) { $p15_R2aSiempre = 1; } else { $p15_R2aSiempre = 0; } 
										if ($p16_R2a == 4) { $p16_R2aSiempre = 1; } else { $p16_R2aSiempre = 0; } 
										if ($p17_R2a == 4) { $p17_R2aSiempre = 1; } else { $p17_R2aSiempre = 0; }
										$resSiempre3 = $p14_R2aSiempre+$p15_R2aSiempre+$p16_R2aSiempre+$p17_R2aSiempre;
										echo $resSiempre3;
										echo '</td>
										<td style="text-align: center;">'; 
										if ($p14_R2a == 3) { $p14_R2aCasiSiempre = 1; } else { $p14_R2aCasiSiempre = 0; }
										if ($p15_R2a == 3) { $p15_R2aCasiSiempre = 1; } else { $p15_R2aCasiSiempre = 0; } 
										if ($p16_R2a == 3) { $p16_R2aCasiSiempre = 1; } else { $p16_R2aCasiSiempre = 0; } 
										if ($p17_R2a == 3) { $p17_R2aCasiSiempre = 1; } else { $p17_R2aCasiSiempre = 0; } 
										$resCasiSiempre3 = $p14_R2aCasiSiempre+$p15_R2aCasiSiempre+$p16_R2aCasiSiempre+$p17_R2aCasiSiempre;
										echo $resCasiSiempre3;
										echo '</td>
										<td style="text-align: center;">'; 
										if ($p14_R2a == 2) { $p14_R2aAlgunasVeces = 1; } else { $p14_R2aAlgunasVeces = 0; }
										if ($p15_R2a == 2) { $p15_R2aAlgunasVeces = 1; } else { $p15_R2aAlgunasVeces = 0; } 
										if ($p16_R2a == 2) { $p16_R2aAlgunasVeces = 1; } else { $p16_R2aAlgunasVeces = 0; } 
										if ($p17_R2a == 2) { $p17_R2aAlgunasVeces = 1; } else { $p17_R2aAlgunasVeces = 0; }
										$resAlgunasVeces3 = $p14_R2aAlgunasVeces+$p15_R2aAlgunasVeces+$p16_R2aAlgunasVeces+$p17_R2aAlgunasVeces;
										echo $resAlgunasVeces3;
										echo '</td>
										<td style="text-align: center;">'; 
										if ($p14_R2a == 1) { $p14_R2aCasiNunca = 1; } else { $p14_R2aCasiNunca = 0; }
										if ($p15_R2a == 1) { $p15_R2aCasiNunca = 1; } else { $p15_R2aCasiNunca = 0; } 
										if ($p16_R2a == 1) { $p16_R2aCasiNunca = 1; } else { $p16_R2aCasiNunca = 0; } 
										if ($p17_R2a == 1) { $p17_R2aCasiNunca = 1; } else { $p17_R2aCasiNunca = 0; }
										$resCasiNunca3 = $p14_R2aCasiNunca+$p15_R2aCasiNunca+$p16_R2aCasiNunca+$p17_R2aCasiNunca;
										echo $resCasiNunca3;
										echo '</td>
										<td style="text-align: center;">'; 
										if ($p14_R2a == 0) { $p14_R2aNunca = 1; } else { $p14_R2aNunca = 0; }
										if ($p15_R2a == 0) { $p15_R2aNunca = 1; } else { $p15_R2aNunca = 0; } 
										if ($p16_R2a == 0) { $p16_R2aNunca = 1; } else { $p16_R2aNunca = 0; } 
										if ($p17_R2a == 0) { $p17_R2aNunca = 1; } else { $p17_R2aNunca = 0; }
										$resNunca3 = $p14_R2aNunca+$p15_R2aNunca+$p16_R2aNunca+$p17_R2aNunca;
										echo $resNunca3;
										echo '</td>
									</tr>
									<tr>
										<td>4</td>
										<td style="font-size: .9em;">Decisiones que puede tomar en su trabajo.<span style="font-size: .6em; color: grey;"><i> 18 - 22 (+)</i></span></td>
										<td style="text-align: center;">'; 
										if ($p18_R2a == 0) { $p18_R2aSiempre = 1; } else { $p18_R2aSiempre = 0; }
										if ($p19_R2a == 0) { $p19_R2aSiempre = 1; } else { $p19_R2aSiempre = 0; } 
										if ($p20_R2a == 0) { $p20_R2aSiempre = 1; } else { $p20_R2aSiempre = 0; } 
										if ($p21_R2a == 0) { $p21_R2aSiempre = 1; } else { $p21_R2aSiempre = 0; }
										if ($p22_R2a == 0) { $p22_R2aSiempre = 1; } else { $p22_R2aSiempre = 0; }
										$resSiempre4 = $p18_R2aSiempre+$p19_R2aSiempre+$p20_R2aSiempre+$p21_R2aSiempre+$p22_R2aSiempre;
										echo $resSiempre4;
										echo '</td>
										<td style="text-align: center;">'; 
										if ($p18_R2a == 1) { $p18_R2aCasiSiempre = 1; } else { $p18_R2aCasiSiempre = 0; }
										if ($p19_R2a == 1) { $p19_R2aCasiSiempre = 1; } else { $p19_R2aCasiSiempre = 0; } 
										if ($p20_R2a == 1) { $p20_R2aCasiSiempre = 1; } else { $p20_R2aCasiSiempre = 0; } 
										if ($p21_R2a == 1) { $p21_R2aCasiSiempre = 1; } else { $p21_R2aCasiSiempre = 0; }
										if ($p22_R2a == 1) { $p22_R2aCasiSiempre = 1; } else { $p22_R2aCasiSiempre = 0; }
										$resCasiSiempre4 = $p18_R2aCasiSiempre+$p19_R2aCasiSiempre+$p20_R2aCasiSiempre+$p21_R2aCasiSiempre+$p22_R2aCasiSiempre;
										echo $resCasiSiempre4;
										echo '</td>
										<td style="text-align: center;">'; 
										if ($p18_R2a == 2) { $p18_R2aAlgunasVeces = 1; } else { $p18_R2aAlgunasVeces = 0; }
										if ($p19_R2a == 2) { $p19_R2aAlgunasVeces = 1; } else { $p19_R2aAlgunasVeces = 0; } 
										if ($p20_R2a == 2) { $p20_R2aAlgunasVeces = 1; } else { $p20_R2aAlgunasVeces = 0; } 
										if ($p21_R2a == 2) { $p21_R2aAlgunasVeces = 1; } else { $p21_R2aAlgunasVeces = 0; }
										if ($p22_R2a == 2) { $p22_R2aAlgunasVeces = 1; } else { $p22_R2aAlgunasVeces = 0; }
										$resAlgunasVeces4 = $p18_R2aAlgunasVeces+$p19_R2aAlgunasVeces+$p20_R2aAlgunasVeces+$p21_R2aAlgunasVeces+$p22_R2aAlgunasVeces;
										echo $resAlgunasVeces4;
										echo '</td>
										<td style="text-align: center;">'; 
										if ($p18_R2a == 3) { $p18_R2aCasiNunca = 1; } else { $p18_R2aCasiNunca = 0; }
										if ($p19_R2a == 3) { $p19_R2aCasiNunca = 1; } else { $p19_R2aCasiNunca = 0; } 
										if ($p20_R2a == 3) { $p20_R2aCasiNunca = 1; } else { $p20_R2aCasiNunca = 0; } 
										if ($p21_R2a == 3) { $p21_R2aCasiNunca = 1; } else { $p21_R2aCasiNunca = 0; }
										if ($p22_R2a == 3) { $p22_R2aCasiNunca = 1; } else { $p22_R2aCasiNunca = 0; }
										$resCasiNunca4 = $p18_R2aCasiNunca+$p19_R2aCasiNunca+$p20_R2aCasiNunca+$p21_R2aCasiNunca+$p22_R2aCasiNunca;
										echo $resCasiNunca4;
										echo '</td>
										<td style="text-align: center;">'; 
										if ($p18_R2a == 4) { $p18_R2aNunca = 1; } else { $p18_R2aNunca = 0; }
										if ($p19_R2a == 4) { $p19_R2aNunca = 1; } else { $p19_R2aNunca = 0; } 
										if ($p20_R2a == 4) { $p20_R2aNunca = 1; } else { $p20_R2aNunca = 0; } 
										if ($p21_R2a == 4) { $p21_R2aNunca = 1; } else { $p21_R2aNunca = 0; }
										if ($p22_R2a == 4) { $p22_R2aNunca = 1; } else { $p22_R2aNunca = 0; }
										$resNunca4 = $p18_R2aNunca+$p19_R2aNunca+$p20_R2aNunca+$p21_R2aNunca+$p22_R2aNunca;
										echo $resNunca4;
										echo '</td>
									</tr>
									<tr>
										<td>5</td>
										<td style="font-size: .9em;">Capacitación e información que recibe sobre su trabajo.<span style="font-size: .6em; color: grey;"><i> 23 - 27 (+)</i></span></td>
										<td style="text-align: center;">'; 
										if ($p23_R2a == 0) { $p23_R2aSiempre = 1; } else { $p23_R2aSiempre = 0; }
										if ($p24_R2a == 0) { $p24_R2aSiempre = 1; } else { $p24_R2aSiempre = 0; } 
										if ($p25_R2a == 0) { $p25_R2aSiempre = 1; } else { $p25_R2aSiempre = 0; } 
										if ($p26_R2a == 0) { $p26_R2aSiempre = 1; } else { $p26_R2aSiempre = 0; }
										if ($p27_R2a == 0) { $p27_R2aSiempre = 1; } else { $p27_R2aSiempre = 0; }
										$resSiempre5 = $p23_R2aSiempre+$p24_R2aSiempre+$p25_R2aSiempre+$p26_R2aSiempre+$p27_R2aSiempre;
										echo $resSiempre5;
										echo '</td>
										<td style="text-align: center;">'; 
										if ($p23_R2a == 1) { $p23_R2aCasiSiempre = 1; } else { $p23_R2aCasiSiempre = 0; }
										if ($p24_R2a == 1) { $p24_R2aCasiSiempre = 1; } else { $p24_R2aCasiSiempre = 0; } 
										if ($p25_R2a == 1) { $p25_R2aCasiSiempre = 1; } else { $p25_R2aCasiSiempre = 0; } 
										if ($p26_R2a == 1) { $p26_R2aCasiSiempre = 1; } else { $p26_R2aCasiSiempre = 0; }
										if ($p27_R2a == 1) { $p27_R2aCasiSiempre = 1; } else { $p27_R2aCasiSiempre = 0; }
										$resCasiSiempre5 = $p23_R2aCasiSiempre+$p24_R2aCasiSiempre+$p25_R2aCasiSiempre+$p26_R2aCasiSiempre+$p27_R2aCasiSiempre;
										echo $resCasiSiempre5;
										echo '</td>
										<td style="text-align: center;">'; 
										if ($p23_R2a == 2) { $p23_R2aAlgunasVeces = 1; } else { $p23_R2aAlgunasVeces = 0; }
										if ($p24_R2a == 2) { $p24_R2aAlgunasVeces = 1; } else { $p24_R2aAlgunasVeces = 0; } 
										if ($p25_R2a == 2) { $p25_R2aAlgunasVeces = 1; } else { $p25_R2aAlgunasVeces = 0; } 
										if ($p26_R2a == 2) { $p26_R2aAlgunasVeces = 1; } else { $p26_R2aAlgunasVeces = 0; }
										if ($p27_R2a == 2) { $p27_R2aAlgunasVeces = 1; } else { $p27_R2aAlgunasVeces = 0; }
										$resAlgunasVeces5 = $p23_R2aAlgunasVeces+$p24_R2aAlgunasVeces+$p25_R2aAlgunasVeces+$p26_R2aAlgunasVeces+$p27_R2aAlgunasVeces;
										echo $resAlgunasVeces5;
										echo '</td>
										<td style="text-align: center;">'; 
										if ($p23_R2a == 3) { $p23_R2aCasiNunca = 1; } else { $p23_R2aCasiNunca = 0; }
										if ($p24_R2a == 3) { $p24_R2aCasiNunca = 1; } else { $p24_R2aCasiNunca = 0; } 
										if ($p25_R2a == 3) { $p25_R2aCasiNunca = 1; } else { $p25_R2aCasiNunca = 0; } 
										if ($p26_R2a == 3) { $p26_R2aCasiNunca = 1; } else { $p26_R2aCasiNunca = 0; }
										if ($p27_R2a == 3) { $p27_R2aCasiNunca = 1; } else { $p27_R2aCasiNunca = 0; }
										$resCasiNunca5 = $p23_R2aCasiNunca+$p24_R2aCasiNunca+$p25_R2aCasiNunca+$p26_R2aCasiNunca+$p27_R2aCasiNunca;
										echo $resCasiNunca5;
										echo '</td>
										<td style="text-align: center;">'; 
										if ($p23_R2a == 4) { $p23_R2aNunca = 1; } else { $p23_R2aNunca = 0; }
										if ($p24_R2a == 4) { $p24_R2aNunca = 1; } else { $p24_R2aNunca = 0; } 
										if ($p25_R2a == 4) { $p25_R2aNunca = 1; } else { $p25_R2aNunca = 0; } 
										if ($p26_R2a == 4) { $p26_R2aNunca = 1; } else { $p26_R2aNunca = 0; }
										if ($p27_R2a == 4) { $p27_R2aNunca = 1; } else { $p27_R2aNunca = 0; }
										$resNunca5 = $p23_R2aNunca+$p24_R2aNunca+$p25_R2aNunca+$p26_R2aNunca+$p27_R2aNunca;
										echo $resNunca5;
										echo '</td>
									</tr>
									<tr>
										<td>6<span style="font-size: .6em; color: grey;"><i> (a)</i></td>
										<td style="font-size: .9em;">Relaciones con sus compañeros de trabajo y su jefe.<span style="font-size: .6em; color: grey;"><i> 28 - 33 (+)</i></span></td>
										<td style="text-align: center;">'; 
										if ($p28_R2a == 0) { $p28_R2aSiempre = 1; } else { $p28_R2aSiempre = 0; }
										if ($p29_R2a == 0) { $p29_R2aSiempre = 1; } else { $p29_R2aSiempre = 0; } 
										if ($p30_R2a == 0) { $p30_R2aSiempre = 1; } else { $p30_R2aSiempre = 0; } 
										if ($p31_R2a == 0) { $p31_R2aSiempre = 1; } else { $p31_R2aSiempre = 0; }
										if ($p32_R2a == 0) { $p32_R2aSiempre = 1; } else { $p32_R2aSiempre = 0; }
										if ($p33_R2a == 0) { $p33_R2aSiempre = 1; } else { $p33_R2aSiempre = 0; }
										
										$resSiempre6 = $p28_R2aSiempre+$p29_R2aSiempre+$p30_R2aSiempre+$p31_R2aSiempre+$p32_R2aSiempre+$p33_R2aSiempre;
										echo $resSiempre6;
										echo '</td>
										<td style="text-align: center;">'; 
										if ($p28_R2a == 1) { $p28_R2aCasiSiempre = 1; } else { $p28_R2aCasiSiempre = 0; }
										if ($p29_R2a == 1) { $p29_R2aCasiSiempre = 1; } else { $p29_R2aCasiSiempre = 0; } 
										if ($p30_R2a == 1) { $p30_R2aCasiSiempre = 1; } else { $p30_R2aCasiSiempre = 0; } 
										if ($p31_R2a == 1) { $p31_R2aCasiSiempre = 1; } else { $p31_R2aCasiSiempre = 0; }
										if ($p32_R2a == 1) { $p32_R2aCasiSiempre = 1; } else { $p32_R2aCasiSiempre = 0; }
										if ($p33_R2a == 1) { $p33_R2aCasiSiempre = 1; } else { $p33_R2aCasiSiempre = 0; }
										
										$resCasiSiempre6 = $p28_R2aCasiSiempre+$p29_R2aCasiSiempre+$p30_R2aCasiSiempre+$p31_R2aCasiSiempre+$p32_R2aCasiSiempre+$p33_R2aCasiSiempre;
										echo $resCasiSiempre6;
										echo '</td>
										<td style="text-align: center;">'; 
										if ($p28_R2a == 2) { $p28_R2aAlgunasVeces = 1; } else { $p28_R2aAlgunasVeces = 0; }
										if ($p29_R2a == 2) { $p29_R2aAlgunasVeces = 1; } else { $p29_R2aAlgunasVeces = 0; } 
										if ($p30_R2a == 2) { $p30_R2aAlgunasVeces = 1; } else { $p30_R2aAlgunasVeces = 0; } 
										if ($p31_R2a == 2) { $p31_R2aAlgunasVeces = 1; } else { $p31_R2aAlgunasVeces = 0; }
										if ($p32_R2a == 2) { $p32_R2aAlgunasVeces = 1; } else { $p32_R2aAlgunasVeces = 0; }
										if ($p33_R2a == 2) { $p33_R2aAlgunasVeces = 1; } else { $p33_R2aAlgunasVeces = 0; }
										
										$resAlgunasVeces6 = $p28_R2aAlgunasVeces+$p29_R2aAlgunasVeces+$p30_R2aAlgunasVeces+$p31_R2aAlgunasVeces+$p32_R2aAlgunasVeces+$p33_R2aAlgunasVeces;
										echo $resAlgunasVeces6;
										echo '</td>
										<td style="text-align: center;">'; 
										if ($p28_R2a == 3) { $p28_R2aCasiNunca = 1; } else { $p28_R2aCasiNunca = 0; }
										if ($p29_R2a == 3) { $p29_R2aCasiNunca = 1; } else { $p29_R2aCasiNunca = 0; } 
										if ($p30_R2a == 3) { $p30_R2aCasiNunca = 1; } else { $p30_R2aCasiNunca = 0; } 
										if ($p31_R2a == 3) { $p31_R2aCasiNunca = 1; } else { $p31_R2aCasiNunca = 0; }
										if ($p32_R2a == 3) { $p32_R2aCasiNunca = 1; } else { $p32_R2aCasiNunca = 0; }
										if ($p33_R2a == 3) { $p33_R2aCasiNunca = 1; } else { $p33_R2aCasiNunca = 0; }
										
										$resCasiNunca6 = $p28_R2aCasiNunca+$p29_R2aCasiNunca+$p30_R2aCasiNunca+$p31_R2aCasiNunca+$p32_R2aCasiNunca+$p33_R2aCasiNunca;
										echo $resCasiNunca6;
										echo '</td>
										<td style="text-align: center;">'; 
										if ($p28_R2a == 4) { $p28_R2aNunca = 1; } else { $p28_R2aNunca = 0; }
										if ($p29_R2a == 4) { $p29_R2aNunca = 1; } else { $p29_R2aNunca = 0; } 
										if ($p30_R2a == 4) { $p30_R2aNunca = 1; } else { $p30_R2aNunca = 0; } 
										if ($p31_R2a == 4) { $p31_R2aNunca = 1; } else { $p31_R2aNunca = 0; }
										if ($p32_R2a == 4) { $p32_R2aNunca = 1; } else { $p32_R2aNunca = 0; }
										if ($p33_R2a == 4) { $p33_R2aNunca = 1; } else { $p33_R2aNunca = 0; }
										
										$resNunca6 = $p28_R2aNunca+$p29_R2aNunca+$p30_R2aNunca+$p31_R2aNunca+$p32_R2aNunca+$p33_R2aNunca;
										echo $resNunca6;
										echo '</td>
									</tr>
									<tr>
										<td>6<span style="font-size: .6em; color: grey;"><i> (b)</i></td>
										<td style="font-size: .9em;">Relaciones con sus compañeros de trabajo y su jefe.<span style="font-size: .6em; color: grey;"><i> 34 - 40 (-)</i></span></td>
										<td style="text-align: center;">';
										if ($p34_R2a == 4) { $p34_R2aSiempre = 1; } else { $p34_R2aSiempre = 0; }
										if ($p35_R2a == 4) { $p35_R2aSiempre = 1; } else { $p35_R2aSiempre = 0; } 
										if ($p36_R2a == 4) { $p36_R2aSiempre = 1; } else { $p36_R2aSiempre = 0; } 
										if ($p37_R2a == 4) { $p37_R2aSiempre = 1; } else { $p37_R2aSiempre = 0; }
										if ($p38_R2a == 4) { $p38_R2aSiempre = 1; } else { $p38_R2aSiempre = 0; }
										if ($p39_R2a == 4) { $p39_R2aSiempre = 1; } else { $p39_R2aSiempre = 0; }
										if ($p40_R2a == 4) { $p40_R2aSiempre = 1; } else { $p40_R2aSiempre = 0; }
										$resSiempre6 = $p34_R2aSiempre+$p35_R2aSiempre+$p36_R2aSiempre+$p37_R2aSiempre+$p38_R2aSiempre+$p39_R2aSiempre+$p40_R2aSiempre;
										echo $resSiempre6;
										echo '</td>
										<td style="text-align: center;">';
										if ($p34_R2a == 3) { $p34_R2aCasiSiempre = 1; } else { $p34_R2aCasiSiempre = 0; }
										if ($p35_R2a == 3) { $p35_R2aCasiSiempre = 1; } else { $p35_R2aCasiSiempre = 0; } 
										if ($p36_R2a == 3) { $p36_R2aCasiSiempre = 1; } else { $p36_R2aCasiSiempre = 0; } 
										if ($p37_R2a == 3) { $p37_R2aCasiSiempre = 1; } else { $p37_R2aCasiSiempre = 0; }
										if ($p38_R2a == 3) { $p38_R2aCasiSiempre = 1; } else { $p38_R2aCasiSiempre = 0; }
										if ($p39_R2a == 3) { $p39_R2aCasiSiempre = 1; } else { $p39_R2aCasiSiempre = 0; }
										if ($p40_R2a == 3) { $p40_R2aCasiSiempre = 1; } else { $p40_R2aCasiSiempre = 0; }
										$resCasiSiempre6 = $p34_R2aCasiSiempre+$p35_R2aCasiSiempre+$p36_R2aCasiSiempre+$p37_R2aCasiSiempre+$p38_R2aCasiSiempre+$p39_R2aCasiSiempre+$p40_R2aCasiSiempre;
										echo $resCasiSiempre6;
										echo '</td>
										<td style="text-align: center;">';
										if ($p34_R2a == 2) { $p34_R2aAlgunasVeces = 1; } else { $p34_R2aAlgunasVeces = 0; }
										if ($p35_R2a == 2) { $p35_R2aAlgunasVeces = 1; } else { $p35_R2aAlgunasVeces = 0; } 
										if ($p36_R2a == 2) { $p36_R2aAlgunasVeces = 1; } else { $p36_R2aAlgunasVeces = 0; } 
										if ($p37_R2a == 2) { $p37_R2aAlgunasVeces = 1; } else { $p37_R2aAlgunasVeces = 0; }
										if ($p38_R2a == 2) { $p38_R2aAlgunasVeces = 1; } else { $p38_R2aAlgunasVeces = 0; }
										if ($p39_R2a == 2) { $p39_R2aAlgunasVeces = 1; } else { $p39_R2aAlgunasVeces = 0; }
										if ($p40_R2a == 2) { $p40_R2aAlgunasVeces = 1; } else { $p40_R2aAlgunasVeces = 0; }
										$resAlgunasVeces6 = $p34_R2aAlgunasVeces+$p35_R2aAlgunasVeces+$p36_R2aAlgunasVeces+$p37_R2aAlgunasVeces+$p38_R2aAlgunasVeces+$p39_R2aAlgunasVeces+$p40_R2aAlgunasVeces;
										echo $resAlgunasVeces6;
										echo '</td>
										<td style="text-align: center;">';
										if ($p34_R2a == 1) { $p34_R2aCasiNunca = 1; } else { $p34_R2aCasiNunca = 0; }
										if ($p35_R2a == 1) { $p35_R2aCasiNunca = 1; } else { $p35_R2aCasiNunca = 0; } 
										if ($p36_R2a == 1) { $p36_R2aCasiNunca = 1; } else { $p36_R2aCasiNunca = 0; } 
										if ($p37_R2a == 1) { $p37_R2aCasiNunca = 1; } else { $p37_R2aCasiNunca = 0; }
										if ($p38_R2a == 1) { $p38_R2aCasiNunca = 1; } else { $p38_R2aCasiNunca = 0; }
										if ($p39_R2a == 1) { $p39_R2aCasiNunca = 1; } else { $p39_R2aCasiNunca = 0; }
										if ($p40_R2a == 1) { $p40_R2aCasiNunca = 1; } else { $p40_R2aCasiNunca = 0; }
										$resCasiNunca6 = $p34_R2aCasiNunca+$p35_R2aCasiNunca+$p36_R2aCasiNunca+$p37_R2aCasiNunca+$p38_R2aCasiNunca+$p39_R2aCasiNunca+$p40_R2aCasiNunca;
										echo $resCasiNunca6;
										echo '</td>
										<td style="text-align: center;">';
										if ($p34_R2a == 0) { $p34_R2aNunca = 1; } else { $p34_R2aNunca = 0; }
										if ($p35_R2a == 0) { $p35_R2aNunca = 1; } else { $p35_R2aNunca = 0; } 
										if ($p36_R2a == 0) { $p36_R2aNunca = 1; } else { $p36_R2aNunca = 0; } 
										if ($p37_R2a == 0) { $p37_R2aNunca = 1; } else { $p37_R2aNunca = 0; }
										if ($p38_R2a == 0) { $p38_R2aNunca = 1; } else { $p38_R2aNunca = 0; }
										if ($p39_R2a == 0) { $p39_R2aNunca = 1; } else { $p39_R2aNunca = 0; }
										if ($p40_R2a == 0) { $p40_R2aNunca = 1; } else { $p40_R2aNunca = 0; }
										$resNunca6 = $p34_R2aNunca+$p35_R2aNunca+$p36_R2aNunca+$p37_R2aNunca+$p38_R2aNunca+$p39_R2aNunca+$p40_R2aNunca;
										echo $resNunca6;
										echo '</td>
									</tr>
									<tr>
										<td>7</td>
										<td style="font-size: .9em;">Atención a clientes y usuarios.<span style="font-size: .6em; color: grey;"><i> 41 - 43 (-)</i></td>
										<td style="text-align: center;">'; 
										if ($p41_R2a == 4) { $p41_R2aSiempre = 1; } else { $p41_R2aSiempre = 0; }
										if ($p42_R2a == 4) { $p42_R2aSiempre = 1; } else { $p42_R2aSiempre = 0; } 
										if ($p43_R2a == 4) { $p43_R2aSiempre = 1; } else { $p43_R2aSiempre = 0; }
										$resSiempre7 = $p41_R2aSiempre+$p42_R2aSiempre+$p43_R2aSiempre;
										echo $resSiempre7;
										echo '</td>
										<td style="text-align: center;">'; 
										if ($p41_R2a == 3) { $p41_R2aCasiSiempre = 1; } else { $p41_R2aCasiSiempre = 0; }
										if ($p42_R2a == 3) { $p42_R2aCasiSiempre = 1; } else { $p42_R2aCasiSiempre = 0; } 
										if ($p43_R2a == 3) { $p43_R2aCasiSiempre = 1; } else { $p43_R2aCasiSiempre = 0; }
										$resCasiSiempre7 = $p41_R2aCasiSiempre+$p42_R2aCasiSiempre+$p43_R2aCasiSiempre;
										echo $resCasiSiempre7;
										echo '</td>
										<td style="text-align: center;">'; 
										if ($p41_R2a == 2) { $p41_R2aAlgunasVeces = 1; } else { $p41_R2aAlgunasVeces = 0; }
										if ($p42_R2a == 2) { $p42_R2aAlgunasVeces = 1; } else { $p42_R2aAlgunasVeces = 0; } 
										if ($p43_R2a == 2) { $p43_R2aAlgunasVeces = 1; } else { $p43_R2aAlgunasVeces = 0; }
										$resAlgunasVeces7 = $p41_R2aAlgunasVeces+$p42_R2aAlgunasVeces+$p43_R2aAlgunasVeces;
										echo $resAlgunasVeces7;
										echo '</td>
										<td style="text-align: center;">'; 
										if ($p41_R2a == 1) { $p41_R2aCasiNunca = 1; } else { $p41_R2aCasiNunca = 0; }
										if ($p42_R2a == 1) { $p42_R2aCasiNunca = 1; } else { $p42_R2aCasiNunca = 0; } 
										if ($p43_R2a == 1) { $p43_R2aCasiNunca = 1; } else { $p43_R2aCasiNunca = 0; }
										$resCasiNunca7 = $p41_R2aCasiNunca+$p42_R2aCasiNunca+$p43_R2aCasiNunca;
										echo $resCasiNunca7;
										echo '</td>
										<td style="text-align: center;">'; 
										if ($p41_R2a == 0) { $p41_R2aNunca = 1; } else { $p41_R2aNunca = 0; }
										if ($p42_R2a == 0) { $p42_R2aNunca = 1; } else { $p42_R2aNunca = 0; } 
										if ($p43_R2a == 0) { $p43_R2aNunca = 1; } else { $p43_R2aNunca = 0; }
										$resNunca7 = $p41_R2aNunca+$p42_R2aNunca+$p43_R2aNunca;
										echo $resNunca7;
										echo '</td>
									</tr>
									<tr>
										<td>8</td>
										<td style="font-size: .9em;">Actitudes de los trabajadores que supervisa.<span style="font-size: .6em; color: grey;"><i> 44 - 46 (-)</i></td>
										<td style="text-align: center;">'; 
										if ($p44_R2a == 4) { $p44_R2aSiempre = 1; } else { $p44_R2aSiempre = 0; }
										if ($p45_R2a == 4) { $p45_R2aSiempre = 1; } else { $p45_R2aSiempre = 0; } 
										if ($p46_R2a == 4) { $p46_R2aSiempre = 1; } else { $p46_R2aSiempre = 0; }
										$resSiempre8 = $p44_R2aSiempre+$p45_R2aSiempre+$p46_R2aSiempre;
										echo $resSiempre8;
										echo '</td>
										<td style="text-align: center;">'; 
										if ($p44_R2a == 3) { $p44_R2aCasiSiempre = 1; } else { $p44_R2aCasiSiempre = 0; }
										if ($p45_R2a == 3) { $p45_R2aCasiSiempre = 1; } else { $p45_R2aCasiSiempre = 0; } 
										if ($p46_R2a == 3) { $p46_R2aCasiSiempre = 1; } else { $p46_R2aCasiSiempre = 0; }
										$resCasiSiempre8 = $p44_R2aCasiSiempre+$p45_R2aCasiSiempre+$p46_R2aCasiSiempre;
										echo $resCasiSiempre8;
										echo '</td>
										<td style="text-align: center;">'; 
										if ($p44_R2a == 2) { $p44_R2aAlgunasVeces = 1; } else { $p44_R2aAlgunasVeces = 0; }
										if ($p45_R2a == 2) { $p45_R2aAlgunasVeces = 1; } else { $p45_R2aAlgunasVeces = 0; } 
										if ($p46_R2a == 2) { $p46_R2aAlgunasVeces = 1; } else { $p46_R2aAlgunasVeces = 0; }
										$resAlgunasVeces8 = $p44_R2aAlgunasVeces+$p45_R2aAlgunasVeces+$p46_R2aAlgunasVeces;
										echo $resAlgunasVeces8;
										echo '</td>
										<td style="text-align: center;">'; 
										if ($p44_R2a == 1) { $p44_R2aCasiNunca = 1; } else { $p44_R2aCasiNunca = 0; }
										if ($p45_R2a == 1) { $p45_R2aCasiNunca = 1; } else { $p45_R2aCasiNunca = 0; } 
										if ($p46_R2a == 1) { $p46_R2aCasiNunca = 1; } else { $p46_R2aCasiNunca = 0; }
										$resCasiNunca8 = $p44_R2aCasiNunca+$p45_R2aCasiNunca+$p46_R2aCasiNunca;
										echo $resCasiNunca8;
										echo '</td>
										<td style="text-align: center;">'; 
										if ($p44_R2a == 0) { $p44_R2aNunca = 1; } else { $p44_R2aNunca = 0; }
										if ($p45_R2a == 0) { $p45_R2aNunca = 1; } else { $p45_R2aNunca = 0; } 
										if ($p46_R2a == 0) { $p46_R2aNunca = 1; } else { $p46_R2aNunca = 0; }
										$resNunca8 = $p44_R2aNunca+$p45_R2aNunca+$p46_R2aNunca;
										echo $resNunca8;
										echo '</td>
									</tr>
								</table>
	
								<br>
								<br>
								<table>
									<tr>
										<td colspan="2" style="width: 190px; font-size: .8em;"><b>Copia Digital</b></td>
										<td colspan="2" style="width: 210px; font-size: .8em;"><b>Georreferenciación del levantamiento</b></td>
									</tr>
									<tr>
										<td>
											<img src="soloqr.php?txtQr=http://corsec.com.mx/'.$empresa_R2a.'/impreR02/enviarResultados.aspx?correoCrypt_R2a='.$codeMd5_R2a.'" style="width: 75px;" />
										</td>
										<td>
											<p style="width: 190px;font-size: .6em;">http://corsec.com.mx/'.$empresa_R2a.'<br/>/impreR02/enviarResultados.aspx?<br/>correoCrypt_R2a=<br/>'.$codeMd5_R2a.'</p>
										</td>
										<td>
											<img src="soloqr.php?txtQr=https://www.google.com.mx/maps/@'.$gpsd.',18z" style="width: 75px;" />
										</td>
										<td>
											<p style="width: 210px; font-size: .6em;">https://www.google.com.mx/maps/<br/>@'.$gpsd.'<br/>,18z</p>
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

		### TERMINA GII ###

		### INICIA MATRIZ GII ###

		include 'cResul01tDos.php';
		include 'cResul02tDos.php';
		include 'cResul03tDos.php';

		$conPorCentro = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

		$csCentro = $conPorCentro -> query("SELECT dirEmpresa_R2a,usrNombre_R2a FROM nom035R2a WHERE codeMd5_R2a = '$idUsr'");

		while ($CCentros = $csCentro->fetchArray()) {

			$dirEmpresa=$CCentros['dirEmpresa_R2a'];
			$usrNombre=$CCentros['usrNombre_R2a'];
	
			include 'cResul01tDosMasIndi.php';
			include 'cResul02tDosMasIndi.php';
			include 'cResul03tDosMasIndi.php';
	
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
					<div style="position: absolute; margin-left: 490px; margin-top: 0px; font-size: .5em; color: grey; text-align: left;">
								<i>'.$usrNombre.'</i>
					</div>
					<h4>RESULTADOS: <span style="font-size: .7em;"><i>'.$dirEmpresa.'</i></span></h4>
	
					<div style="font-size: .93em;">
						<p>Al realizar el análisis de datos, se obtuvieron los siguientes resultados:</p>
						<!-- // COMPRO I	 -->				
						<p>Nivel de riesgo del cuestionario General</p>
						<br>
						<table>
							<tr>
								<th>Cuestionario</th>
								<th>Calificación del cuestionario</th>
								<th>Nivel de riesgo</th>
							</tr>
							<tr>
								<td>Cuestionario <span style="font-size: .8em;">C<i>final</i></span></td>
								<td class="'.$colorcFinalMas.'">'.$cfinalMas.'</td>
								<td class="'.$colorcFinalMas.'">'.$nivelcFinalMas.'</td>
							</tr>
						</table>
					</div>
					<br>
					<h4>Nivel de riesgo por categoría</h4>
	
					<div style="font-size: .9em;">
						<!-- // COMPRO II	 -->
						<table>
							<tr>
								<th style="width: 250px;">Calificación de la categoría</th>
								<th style="width: 220px;">Calificación del cuestionario</th>
								<th style="width: 140px;">Nivel de riesgo</th>
							</tr>
							<tr>
								<td>Ambiente de trabajo</td>
								<td class="'.$colorADeTracFinalMas.'">'.$cAmbDeTrabajoFMas.'</td>
								<td class="'.$colorADeTracFinalMas.'">'.$nivelADeTracFinalMas.'</td>
							</tr>
							<tr>
								<td>Factores propios de la actividad</td>
								<td class="'.$colorcfpTracFinalMas.'">'.$cfPropdeActFMas.'</td>
								<td class="'.$colorcfpTracFinalMas.'">'.$nivelcfpTracFinalMas.'</td>
							</tr>
							<tr>
								<td>Organización del tiempo de trabajo</td>
								<td class="'.$colororgTFinalMas.'">'.$orgTimptFMas.'</td>
								<td class="'.$colororgTFinalMas.'">'.$nivelorgTFinalMas.'</td>
							</tr>
							<tr>
								<td>Liderazgo y relaciones en el trabajo</td>
								<td class="'.$colorlidRelFinalMas.'">'.$lidRelCFMas.'</td>
								<td class="'.$colorlidRelFinalMas.'">'.$nivelidRelFinalMas.'</td>
							</tr>
						</table>
					</div>
					<br>
					<div style="font-size: .9em;">
						<!-- // COMPRO II	 -->
						<h4>Nivel de riesgo por dominio</h4>
	
						<table>
							<tr>
								<th style="width: 250px;">Resultado del dominio</th>
								<th style="width: 220px;">Calificación del cuestionario</th>
								<th style="width: 140px;">Nivel de riesgo</th>
							</tr>
							<tr>
								<td>Condiciones en el ambiente de trabajo</td>
								<td class="'.$colorCADeTracFinalMas.'">'.$cConAmbDeTrabajoFMas.'</td>
								<td class="'.$colorCADeTracFinalMas.'">'.$nivelCADeTracFinalMas.'</td>
							</tr>
							<tr>
								<td>Carga de trabajo</td>
								<td class="'.$colorcCarDeTrabFinalMas.'">'.$cCarDeTrabFMas.'</td>
								<td class="'.$colorcCarDeTrabFinalMas.'">'.$nivelcCarDeTrabFinalMas.'</td>
							</tr>
							<tr>
								<td>Falta de control sobre el trabajo</td>
								<td class="'.$colorfdeContTrabFinalMas.'">'.$cFaltDeContTrabFMas.'</td>
								<td class="'.$colorfdeContTrabFinalMas.'">'.$nivelfdeContTrabFinalMas.'</td>
							</tr>
							<tr>
								<td>Jornada de trabajo</td>
								<td class="'.$colorjorDeTrabFinalMas.'">'.$jorDeTrabFMas.'</td>
								<td class="'.$colorjorDeTrabFinalMas.'">'.$niveljorDeTrabFinalMas.'</td>
							</tr>
							<tr>
								<td>Interferencia en la relación trabajo-familia</td>
								<td class="'.$colorinterEnRelFamFinalMas.'">'.$interEnRelFamFMas.'</td>
								<td class="'.$colorinterEnRelFamFinalMas.'">'.$nivelinterEnRelFamFMas.'</td>
							</tr>
							<tr>
								<td>Liderazgo</td>
								<td class="'.$colorliderazgoFinalMas.'">'.$liderazgoFMas.'</td>
								<td class="'.$colorliderazgoFinalMas.'">'.$nivelliderazgoFMas.'</td>
							</tr>
							<tr>
								<td>Relaciones en el trabajo</td>
								<td class="'.$colorrelaEnTrabFinalMas.'">'.$relaEntreTrabFMas.'</td>
								<td class="'.$colorrelaEnTrabFinalMas.'">'.$nivelrelaEnTrabFMas.'</td>
							</tr>
							<tr>
								<td>Violencia</td>
								<td class="'.$colorviolenciaFinalMas.'">'.$violenciaFMas.'</td>
								<td class="'.$colorviolenciaFinalMas.'">'.$nivelviolenciaFMas.'</td>
							</tr>
						</table>
					</div>
				</div>
				</div>
			</div>
		</div>
	
	
	
			';
	
		}

		$conPorCentro -> close();


		### TERMINA MATRIZ GII ###






		


}


$conCero -> close();






 ?>


</body>
</html>