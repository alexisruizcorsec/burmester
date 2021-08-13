<?php 

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");
date_default_timezone_set('America/Mexico_City');

$con = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");
$cs = $con -> query("SELECT COUNT(codeMd5_R1a) AS cuantoRegistros FROM nom035R1a ");
while ($dato = $cs->fetchArray()) {
	$cuantoRegistros = $dato['cuantoRegistros'];
}
$con -> close();

if ($cuantoRegistros > 0) {
	$ocultar = '';
}else{
	$ocultar = 'style="display: none;"';
	echo "<script> window.location='../error/alerta.aspx?error=404';</script>";
}


 ?>


<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Reporte NOM-035 G1 Estadística</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<style>
		@media print {
			.hoja {
				page-break-before: always;
			}
		}

		.marcoP {
			display: flex;
			align-items: center;
		}

		.hoja {
			margin: 0 auto;
			width: 730px;
			height: 980px;
			text-align: justify;
		}

		body {
			font-family: Arial, sans-serif;
		}

		table {
			border-collapse: collapse;
		}

		th {
			padding: 3px 10px;
			border: 1px solid black;
		}

		td {
			padding: 3px 10px;
			border: 1px solid black;
		}

		.azul {
			background-color: #8eaadb;
			color: #FFF;
		}

		.verde {
			background-color: #79e593;
			color: #FFF;
		}

		.amarillo {
			background-color: #ffff00;
		}

		.naranja {
			background-color: #ffc000;
			color: #FFF;
		}

		.rojo {
			background-color: #ff0000;
			color: #FFF;
		}
	</style>
</head>

<body <?php echo $ocultar;?>>

	<div class="container-fluid">
		<div class="row">
			<div class="col-10 mx-auto my-5" style="margin-top: 50px;">

				<!-- TABLA 1 -->

				<h5>Tabla 1 Trabajadores que requieren valoración clínica.</h5>
				<br>
				<table class="table-responsive-sm" style="font-size: .8em;">
					<tr class="bg-primary">
						<th class="text-white">No.</th>
						<th class="text-white">Unidad</th>
						<th class="text-white">Nombre</th>
						<th class="text-white">Sexo</th>
						<th class="text-white">Correo</th>
						<th class="text-white">Fecha de aplicación de la guía</th>
						<th class="text-white">Evaluación</th>
						<th class="text-white">Link del diagnóstico</th>
					</tr>
					<tr>

						<?php 

					// VERIFICA LA EXISTENCIA DE DATOS
					$conCero = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

					$csC = $conCero -> query("SELECT COUNT(codeMd5_R1a) AS cuantoRegistros FROM nom035R1a ");
					while ($dato = $csC->fetchArray()) {
						$cRegistros = $dato['cuantoRegistros'];
					}

					if ($cRegistros >= 1) {
						$csTabUno = $conCero -> query("SELECT (p2_R1a+p3_R1a+p4_R1a+p5_R1a+p6_R1a+p7_R1a) AS sUno,(p8_R1a+p9_R1a) AS sDos,(p10_R1a+p11_R1a+p12_R1a+p13_R1a+p14_R1a+p15_R1a+p16_R1a) AS sTres,(p17_R1a+p18_R1a+p19_R1a+p20_R1a+p21_R1a) AS sCuatro,dirEmpresa_R1a,usrNombre_R1a,usrSexo_R1a,correo_R1a,fechaHoraInicio_R1a,('REQUIERE VALORACIÓN CLÍNICA') AS valora,('http://corsec.com.mx/'||empresa_R1a||'/impreR01/enviarResultados.aspx?correoCrypt_R1a='||codeMd5_R1a) AS link FROM nom035R1a WHERE sUno >= 1  AND (sDos >= 1 OR sTres >= 3 OR sCuatro >= 2) ORDER BY dirEmpresa_R1a,usrNombre_R1a");

						$idTabUno = 0;

						while ($resTabUno = $csTabUno->fetchArray()) {
							$idTabUno = $idTabUno+1;
							$dirEmpresa_R1a = $resTabUno['dirEmpresa_R1a'];
							$usrNombre_R1a = $resTabUno['usrNombre_R1a'];
							$usrSexo_R1a = $resTabUno['usrSexo_R1a'];
							$correo_R1a = $resTabUno['correo_R1a'];
							$fechaHoraInicio_R1a = $resTabUno['fechaHoraInicio_R1a'];
							$valora = $resTabUno['valora'];
							$link = $resTabUno['link'];
							

							echo'
							<tr style="font-size: .8em;">
							<td>'.$idTabUno.'</td>
							<td>'.$dirEmpresa_R1a .'</td>
							<td>'.$usrNombre_R1a .'</td>
							<td>'.$usrSexo_R1a.'</td>
							<td>'.$correo_R1a.'</td>
							<td>'.$fechaHoraInicio_R1a.'</td>
							<td>'.$valora.'</td>
							<td><a href="'.$link.'">'.$link.'</a></td>
							</tr>
							';
							

						}
						$conCero -> close();
					}else{
						$conCero -> close();
					}


					 ?>
				</table>

				<br><br>

				<!-- TABLA 2 -->

				<h5>Tabla 2 Trabajadores que no requieren valoración clínica, presentaron acontecimientos traumáticos.
				</h5>
				<br>
				<table class="table-responsive-sm" style="font-size: .8em;">
					<tr class="bg-primary">
						<th class="text-white">No.</th>
						<th class="text-white">Unidad</th>
						<th class="text-white">Nombre</th>
						<th class="text-white">Sexo</th>
						<th class="text-white">Correo</th>
						<th class="text-white">Fecha de aplicación de la guía</th>
						<th class="text-white">Evaluación</th>
						<th class="text-white">Link del diagnóstico</th>
					</tr>
					<tr>

						<?php 

					// VERIFICA LA EXISTENCIA DE DATOS
					$conCero = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

					$csC = $conCero -> query("SELECT COUNT(codeMd5_R1a) AS cuantoRegistros FROM nom035R1a ");
					while ($dato = $csC->fetchArray()) {
						$cRegistros = $dato['cuantoRegistros'];
					}

					if ($cRegistros >= 1) {
						$csTabDos = $conCero -> query("SELECT (p2_R1a+p3_R1a+p4_R1a+p5_R1a+p6_R1a+p7_R1a) AS sUno,(p8_R1a+p9_R1a) AS sDos,(p10_R1a+p11_R1a+p12_R1a+p13_R1a+p15_R1a+p15_R1a+p16_R1a) AS sTres,(p17_R1a+p18_R1a+p19_R1a+p20_R1a+p21_R1a) AS sCuatro,dirEmpresa_R1a,usrNombre_R1a,usrSexo_R1a,correo_R1a,fechaHoraInicio_R1a,('NO REQUIERE VALORACIÓN CLÍNICA') AS valora,('http://corsec.com.mx/'||empresa_R1a||'/impreR01/enviarResultados.aspx?correoCrypt_R1a='||codeMd5_R1a) AS link FROM nom035R1a WHERE sUno >= 1  AND (sDos < 1) AND (sTres < 3) AND (sCuatro < 2 ) ORDER BY dirEmpresa_R1a, usrNombre_R1a");

						$idTabDos = 0;

						while ($resTabDos = $csTabDos->fetchArray()) {
							$idTabDos = $idTabDos+1;
							$dirEmpresa_R1a = $resTabDos['dirEmpresa_R1a'];
							$usrNombre_R1a = $resTabDos['usrNombre_R1a'];
							$usrSexo_R1a = $resTabDos['usrSexo_R1a'];
							$correo_R1a = $resTabDos['correo_R1a'];
							$fechaHoraInicio_R1a = $resTabDos['fechaHoraInicio_R1a'];
							$valora = $resTabDos['valora'];
							$link = $resTabDos['link'];
							

							echo'
							<tr style="font-size: .8em;">
							<td>'.$idTabDos.'</td>
							<td>'.$dirEmpresa_R1a.'</td>
							<td>'.$usrNombre_R1a .'</td>
							<td>'.$usrSexo_R1a.'</td>
							<td>'.$correo_R1a.'</td>
							<td>'.$fechaHoraInicio_R1a.'</td>
							<td>'.$valora.'</td>
							<td><a href="'.$link.'">'.$link.'</a></td>
							</tr>
							';
							

						}
						$conCero -> close();
					}else{
						$conCero -> close();
					}


					 ?>
				</table>

				<br><br>

				<!-- TABLA 3 -->

				<h5>Tabla 3 Trabajadores que requieren y no requieren valoración clínica.</h5>
				<br>
				<table class="table-responsive-sm" style="font-size: .8em;">
					<tr class="bg-primary">
						<th class="text-white">Estatus</th>
						<th class="text-white">Número de Empleados</th>
						<th class="text-white">Porcentaje</th>
					</tr>
					<tr>
						<td class="bg-primary text-white">No requieren valoración clínica</td>
						<td><?php  
						$noRequierenA = $cRegistros - ($idTabUno+$idTabDos);
						echo $noRequierenA;
						?></td>
						<td><?php

						if($cRegistros !== 0){
							$porNoRequierenA = round(($noRequierenA/$cRegistros)*100, 1, PHP_ROUND_HALF_UP).'%';
						}else{
							$porNoRequierenA = '0%';
						}

						echo $porNoRequierenA;
						?></td>
					</tr>
					<tr>
						<td class="bg-primary text-white">No requieren valoración clínica, presentaron acontecimientos
							traumáticos</td>
						<td><?php  
						$siReqASiPre = $idTabDos;
						echo $siReqASiPre;
						?></td>
						<td><?php

						if($cRegistros !== 0){
							$porSiReqASiPre = round(($siReqASiPre/$cRegistros)*100, 1, PHP_ROUND_HALF_UP).'%';
						}else{
							$porSiReqASiPre = '0%';
						}
						
						echo $porSiReqASiPre;
						?></td>
					</tr>
					<tr>
						<td class="bg-primary text-white">Sí requieren valoración clínica</td>
						<td><?php  
						$noReqASiPre = $idTabUno;
						echo $noReqASiPre;
						?></td>
						<td><?php

						if($cRegistros !== 0){
							$porNoReqASiPre = round(($noReqASiPre/$cRegistros)*100, 1, PHP_ROUND_HALF_UP).'%';
						}else{
							$porNoReqASiPre = '0%';
						}
						
						echo $porNoReqASiPre;
						?></td>
					</tr>
					<tr>
						<td class="bg-primary text-white text-right">Total:</td>
						<td><?php  
						$totalEmp = $cRegistros;
						echo $totalEmp;
						?></td>
						<td><?php

						if($cRegistros !== 0){
							$porTotalEmp = round(($totalEmp/$cRegistros)*100, 1, PHP_ROUND_HALF_UP).'%';
						}else{
							$porTotalEmp = '0%';
						}
						
						echo $porTotalEmp;
						?></td>
					</tr>
				</table>
				<br>
				<br>
				<div class="row">
					<div class="col-8 mx-auto">
						<canvas id="graficaTabla3"></canvas>
					</div>
				</div>
				<br>
				<br>
				<!-- TABLA 4 -->

				<h5>Tabla 4 Porcentaje de recurrencia de los acontecimientos traumáticos severos en las personas que
					requieren valoración clínica.</h5>
				<br>
				<table class="table-responsive-sm" style="font-size: .8em;">
					<tr class="bg-primary">
						<th class="text-white">Número del acontecimiento</th>
						<th class="text-white">Descripción del acontecimiento</th>
						<th class="text-white">Porcentaje de recurrencia</th>
					</tr>

					<?php 

					// VERIFICA LA EXISTENCIA DE DATOS
					$conCero = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

					$csC = $conCero -> query("SELECT COUNT(codeMd5_R1a) AS cuantoRegistros FROM nom035R1a ");
					while ($dato = $csC->fetchArray()) {
						$cRegistros = $dato['cuantoRegistros'];
					}

					if ($cRegistros >= 1) {
						$csTabCuatro = $conCero -> query("SELECT SUM(p2_R1a) AS p2Sum, SUM(p3_R1a) AS p3Sum, SUM(p4_R1a) AS p4Sum, SUM(p5_R1a) AS p5Sum, SUM(p6_R1a) AS p6Sum, SUM(p7_R1a) AS p7Sum, (p2_R1a+p3_R1a+p4_R1a+p5_R1a+p6_R1a+p7_R1a) AS sUno,(p8_R1a+p9_R1a) AS sDos,(p10_R1a+p11_R1a+p12_R1a+p13_R1a+p15_R1a+p15_R1a+p16_R1a) AS sTres,(p17_R1a+p18_R1a+p19_R1a+p20_R1a+p21_R1a) AS sCuatro FROM nom035R1a WHERE sUno >= 1  AND (sDos >= 1 OR sTres >= 3 OR sCuatro >= 2)");

						$idTabCuatro = 0;

						while ($resTabCuatro = $csTabCuatro->fetchArray()) {
							$p2Sum = $resTabCuatro['p2Sum'];
							$p3Sum = $resTabCuatro['p3Sum'];
							$p4Sum = $resTabCuatro['p4Sum'];
							$p5Sum = $resTabCuatro['p5Sum'];
							$p6Sum = $resTabCuatro['p6Sum'];
							$p7Sum = $resTabCuatro['p7Sum'];
							

						}
						$conCero -> close();
					}else{
						$conCero -> close();
					}

					 ?>


					<tr>
						<td>1</td>
						<td>Accidente que tenga como consecuencia la muerte, la pérdida de un miembro o una lesión grave
						</td>
						<td><?php

						if($noReqASiPre !== 0){
							$recAccidentes = round(($p2Sum/$noReqASiPre)*100, 1, PHP_ROUND_HALF_UP);
						}else{
							$recAccidentes = 0;
						}

						$recAccidentesPor = $recAccidentes.'%';
						echo $recAccidentesPor;
						?></td>
					</tr>
					<tr>
						<td>2</td>
						<td>Asaltos</td>
						<td><?php

						if($noReqASiPre !== 0){
							$recAsalto = round(($p3Sum/$noReqASiPre)*100, 1, PHP_ROUND_HALF_UP);
						}else{
							$recAsalto = 0;
						}

						$recAsaltoPor = $recAsalto.'%';
						echo $recAsaltoPor;
						?></td>
					</tr>
					<tr>
						<td>3</td>
						<td>Actos violentos que derivaron en lesiones graves</td>
						<td><?php

						if($noReqASiPre !== 0){
							$recActos = round(($p4Sum/$noReqASiPre)*100, 1, PHP_ROUND_HALF_UP);
						}else{
							$recActos = 0;
						}
						
						$recActosPro = $recActos.'%';
						echo $recActosPro;
						?></td>
					</tr>
					<tr>
						<td>4</td>
						<td>Secuestro</td>
						<td><?php

						if($noReqASiPre !== 0){
							$recSecuestro = round(($p5Sum/$noReqASiPre)*100, 1, PHP_ROUND_HALF_UP);
						}else{
							$recSecuestro = 0;
						}
						
						$recSecuestroPor = $recSecuestro.'%';
						echo $recSecuestroPor;
						?></td>
					</tr>
					<tr>
						<td>5</td>
						<td>Amenazas</td>
						<td><?php

						if($noReqASiPre !== 0){
							$recAmenaza = round(($p6Sum/$noReqASiPre)*100, 1, PHP_ROUND_HALF_UP);
						}else{
							$recAmenaza = 0;
						}
						
						$recAmenazaPor = $recAmenaza.'%';
						echo $recAmenazaPor;
						?></td>
					</tr>
					<tr>
						<td>6</td>
						<td>Cualquier otro que ponga en riesgo su vida o salud, y/o la de otras personas</td>
						<td><?php

						if($noReqASiPre !== 0){
							$recOtro = round(($p7Sum/$noReqASiPre)*100, 1, PHP_ROUND_HALF_UP);
						}else{
							$recOtro = 0;
						}

						$recOtroPor = $recOtro.'%';
						echo $recOtroPor;
						?></td>
					</tr>
				</table>
				<br>
				<br>
				<div class="row">
					<div class="col-8 mx-auto">
						<canvas id="graficaTabla4"></canvas>
					</div>
				</div>
				<br>
				<br>
				<!-- TABLA 5 -->

				<h5>Tabla 5 Porcentaje de recurrencia de los síntomas presentados en las personas que requieren
					valoración clínica.</h5>
				<br>
				<table class="table-responsive-sm" style="font-size: .8em;">
					<tr class="bg-primary">
						<th class="text-white">Número del síntoma</th>
						<th class="text-white">Descripción del acontecimiento</th>
						<th class="text-white">Porcentaje de recurrencia</th>
					</tr>

					<?php 

					// VERIFICA LA EXISTENCIA DE DATOS
					$conCero = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

					$csC = $conCero -> query("SELECT COUNT(codeMd5_R1a) AS cuantoRegistros FROM nom035R1a ");
					while ($dato = $csC->fetchArray()) {
						$cRegistros = $dato['cuantoRegistros'];
					}

					if ($cRegistros >= 1) {
						$csTabCinco = $conCero -> query("SELECT SUM(p8_R1a) AS p8Sum, SUM(p9_R1a) AS p9Sum, SUM(p10_R1a) AS p10Sum, SUM(p11_R1a) AS p11Sum, SUM(p12_R1a) AS p12Sum, SUM(p13_R1a) AS p13Sum, SUM(p14_R1a) AS p14Sum, SUM(p15_R1a) AS p15Sum, SUM(p16_R1a) AS p16Sum, SUM(p17_R1a) AS p17Sum, SUM(p18_R1a) AS p18Sum, SUM(p19_R1a) AS p19Sum, SUM(p20_R1a) AS p20Sum, SUM(p21_R1a) AS p21Sum, (p2_R1a+p3_R1a+p4_R1a+p5_R1a+p6_R1a+p7_R1a) AS sUno,(p8_R1a+p9_R1a) AS sDos,(p10_R1a+p11_R1a+p12_R1a+p13_R1a+p15_R1a+p15_R1a+p16_R1a) AS sTres,(p17_R1a+p18_R1a+p19_R1a+p20_R1a+p21_R1a) AS sCuatro FROM nom035R1a WHERE sUno >= 1  AND (sDos >= 1 OR sTres >= 3 OR sCuatro >= 2)");

						$idTabCinco = 0;

						while ($resTabCinco = $csTabCinco->fetchArray()) {
							$p8Sum = $resTabCinco['p8Sum'];
							$p9Sum = $resTabCinco['p9Sum'];
							$p10Sum = $resTabCinco['p10Sum'];
							$p11Sum = $resTabCinco['p11Sum'];
							$p12Sum = $resTabCinco['p12Sum'];
							$p13Sum = $resTabCinco['p13Sum'];
							$p14Sum = $resTabCinco['p14Sum'];
							$p15Sum = $resTabCinco['p15Sum'];
							$p16Sum = $resTabCinco['p16Sum'];
							$p17Sum = $resTabCinco['p17Sum'];
							$p18Sum = $resTabCinco['p18Sum'];
							$p19Sum = $resTabCinco['p19Sum'];
							$p20Sum = $resTabCinco['p20Sum'];
							$p21Sum = $resTabCinco['p21Sum'];
							

						}
						$conCero -> close();
					}else{
						$conCero -> close();
					}

					 ?>


					<tr>
						<td>1</td>
						<td>Recuerdos recurrentes sobre el acontecimiento que le provocan malestares.</td>
						<td><?php

						if($noReqASiPre !== 0){
							$recRecuerdos = round(($p8Sum/$noReqASiPre)*100, 1, PHP_ROUND_HALF_UP);
						}else{
							$recRecuerdos = 0;
						}

						$recRecuerdosPor = $recRecuerdos.'%';
						echo $recRecuerdosPor;
						?></td>
					</tr>
					<tr>
						<td>2</td>
						<td>Sueños de carácter recurrente sobre el acontecimiento, que le producen malestar.</td>
						<td><?php

						if($noReqASiPre !== 0){
							$recSuenos = round(($p9Sum/$noReqASiPre)*100, 1, PHP_ROUND_HALF_UP);
						}else{
							$recSuenos = 0;
						}

						$recSuenosPor = $recSuenos.'%';
						echo $recSuenosPor;
						?></td>
					</tr>
					<tr>
						<td>3</td>
						<td>Se ha esforzado por evitar todo tipo de sentimientos, conversaciones o situaciones que le
							puedan recordar el acontecimiento.</td>
						<td><?php

						if($noReqASiPre !== 0){
							$recSentimientos = round(($p10Sum/$noReqASiPre)*100, 1, PHP_ROUND_HALF_UP);
						}else{
							$recSentimientos = 0;
						}

						$recSentimientosPro = $recSentimientos.'%';
						echo $recSentimientosPro;
						?></td>
					</tr>
					<tr>
						<td>4</td>
						<td>Se ha esforzado por evitar todo tipo de actividades, lugares o personas que motivan
							recuerdos del acontecimiento.</td>
						<td><?php

						if($noReqASiPre !== 0){
							$recLugares = round(($p11Sum/$noReqASiPre)*100, 1, PHP_ROUND_HALF_UP);
						}else{
							$recLugares = 0;
						}
						
						$recLugaresPor = $recLugares.'%';
						echo $recLugaresPor;
						?></td>
					</tr>
					<tr>
						<td>5</td>
						<td>Ha tenido dificultad para recordar alguna parte importante del evento.</td>
						<td><?php

						if($noReqASiPre !== 0){
							$recDificultades = round(($p12Sum/$noReqASiPre)*100, 1, PHP_ROUND_HALF_UP);
						}else{
							$recDificultades = 0;
						}

						$recDificultadesPor = $recDificultades.'%';
						echo $recDificultadesPor;
						?></td>
					</tr>
					<tr>
						<td>6</td>
						<td>Ha disminuido su interés en sus actividades cotidianas.</td>
						<td><?php

						if($noReqASiPre !== 0){
							$recActCot = round(($p13Sum/$noReqASiPre)*100, 1, PHP_ROUND_HALF_UP);
						}else{
							$recActCot = 0;
						}

						$recActCotPor = $recActCot.'%';
						echo $recActCotPor;
						?></td>
					</tr>
					<tr>
						<td>7</td>
						<td>Se ha sentido usted alejado o distante de los demás.</td>
						<td><?php

						if($noReqASiPre !== 0){
							$recDistante = round(($p14Sum/$noReqASiPre)*100, 1, PHP_ROUND_HALF_UP);
						}else{
							$recDistante = 0;
						}
						
						$recDistantePor = $recDistante.'%';
						echo $recDistantePor;
						?></td>
					</tr>
					<tr>
						<td>8</td>
						<td>Ha notado que tiene dificultad para expresar sus sentimientos.</td>
						<td><?php

						if($noReqASiPre !== 0){
							$recDifExpSent = round(($p15Sum/$noReqASiPre)*100, 1, PHP_ROUND_HALF_UP);
						}else{
							$recDifExpSent = 0;
						}

						$recDifExpSentPor = $recDifExpSent.'%';
						echo $recDifExpSentPor;
						?></td>
					</tr>
					<tr>
						<td>9</td>
						<td>Ha tenido la impresión de que su vida se va a acortar, que va a morir antes que otras
							personas o que tiene un futuro limitado.</td>
						<td><?php

						if($noReqASiPre !== 0){
							$recImpresion = round(($p16Sum/$noReqASiPre)*100, 1, PHP_ROUND_HALF_UP);
						}else{
							$recImpresion = 0;
						}

						$recImpresionPor = $recImpresion.'%';
						echo $recImpresionPor;
						?></td>
					</tr>
					<tr>
						<td>10</td>
						<td>Ha tenido usted dificultades para dormir.</td>
						<td><?php

						if($noReqASiPre !== 0){
							$recDifDorm = round(($p17Sum/$noReqASiPre)*100, 1, PHP_ROUND_HALF_UP);
						}else{
							$recDifDorm = 0;
						}

						$recDifDormPor = $recDifDorm.'%';
						echo $recDifDormPor;
						?></td>
					</tr>
					<tr>
						<td>11</td>
						<td>Ha estado particularmente irritable o le han dado arranques de coraje.</td>
						<td><?php

						if($noReqASiPre !== 0){
							$recIrritable = round(($p18Sum/$noReqASiPre)*100, 1, PHP_ROUND_HALF_UP);
						}else{
							$recIrritable = 0;
						}

						$recIrritablePor = $recIrritable.'%';
						echo $recIrritablePor;
						?></td>
					</tr>
					<tr>
						<td>12</td>
						<td>Ha tenido dificultad para concentrarse.</td>
						<td><?php

						if($noReqASiPre !== 0){
							$recDifConcen = round(($p19Sum/$noReqASiPre)*100, 1, PHP_ROUND_HALF_UP);
						}else{
							$recDifConcen = 0;
						}

						$recDifConcenPor = $recDifConcen.'%';
						echo $recDifConcenPor;
						?></td>
					</tr>
					<tr>
						<td>13</td>
						<td>Ha estado nervioso o constantemente en alerta.</td>
						<td><?php 
						
						if($noReqASiPre !== 0){
							$recCAlerta = round(($p20Sum/$noReqASiPre)*100, 1, PHP_ROUND_HALF_UP);
						}else{
							$recCAlerta = 0;
						}

						$recCAlertaPor = $recCAlerta.'%';
						echo $recCAlertaPor;
						?></td>
					</tr>
					<tr>
						<td>14</td>
						<td>Se ha sobresaltado fácilmente por cualquier cosa.</td>
						<td><?php

						if($noReqASiPre !== 0){
							$recSobresalto = round(($p21Sum/$noReqASiPre)*100, 1, PHP_ROUND_HALF_UP);
						}else{
							$recSobresalto = 0;
						}

						$recSobresaltoPor = $recSobresalto.'%';
						echo $recSobresaltoPor;
						?></td>
					</tr>
				</table>
				<br>
				<br>
				<div class="row">
					<div class="col-8 mx-auto">
						<canvas id="graficaTabla5"></canvas>
					</div>
				</div>
				<br>
				<br>
				<!-- TABLA 6 -->

				<h5>Tabla 6 Porcentaje de recurrencias de los acontecimientos traumáticos severos en las personas que no
					requieren valoración clínica pero que presentaron acontecimientos traumáticos.</h5>
				<br>
				<table class="table-responsive-sm" style="font-size: .8em;">
					<tr class="bg-primary">
						<th class="text-white">Número del acontecimiento</th>
						<th class="text-white">Descripción del acontecimiento</th>
						<th class="text-white">Porcentaje de recurrencia</th>
					</tr>

					<?php 

					// VERIFICA LA EXISTENCIA DE DATOS
					$conCero = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

					$csC = $conCero -> query("SELECT COUNT(codeMd5_R1a) AS cuantoRegistros FROM nom035R1a");
					while ($dato = $csC->fetchArray()) {
						$cRegistros = $dato['cuantoRegistros'];
					}

					if ($cRegistros >= 1) {
						$csTabSeis = $conCero -> query("SELECT SUM(p2_R1a) AS p2Sum, SUM(p3_R1a) AS p3Sum, SUM(p4_R1a) AS p4Sum, SUM(p5_R1a) AS p5Sum, SUM(p6_R1a) AS p6Sum, SUM(p7_R1a) AS p7Sum, (p2_R1a+p3_R1a+p4_R1a+p5_R1a+p6_R1a+p7_R1a) AS sUno,(p8_R1a+p9_R1a) AS sDos,(p10_R1a+p11_R1a+p12_R1a+p13_R1a+p15_R1a+p15_R1a+p16_R1a) AS sTres,(p17_R1a+p18_R1a+p19_R1a+p20_R1a+p21_R1a) AS sCuatro FROM nom035R1a WHERE sUno >= 1  AND (sDos < 1) AND (sTres < 3) AND (sCuatro < 2 )");

						$idTabSeis = 0;

						while ($resTabSeis = $csTabSeis->fetchArray()) {
							$p2NoSum = $resTabSeis['p2Sum'];
							$p3NoSum = $resTabSeis['p3Sum'];
							$p4NoSum = $resTabSeis['p4Sum'];
							$p5NoSum = $resTabSeis['p5Sum'];
							$p6NoSum = $resTabSeis['p6Sum'];
							$p7NoSum = $resTabSeis['p7Sum'];
							

						}
						$conCero -> close();
					}else{
						$conCero -> close();
					}

					 ?>


					<tr>
						<td>1</td>
						<td>Accidente que tenga como consecuencia la muerte, la pérdida de un miembro o una lesión grave
						</td>
						<td><?php

						if($siReqASiPre !== 0){
							$recAccidentesNo = round(($p2NoSum/$siReqASiPre)*100, 1, PHP_ROUND_HALF_UP);
						}else{
							$recAccidentesNo = 0;
						}
						
						$recAccidentesNoPor = $recAccidentesNo.'%';
						echo $recAccidentesNoPor;
						?></td>
					</tr>
					<tr>
						<td>2</td>
						<td>Asaltos</td>
						<td><?php

						if($siReqASiPre !== 0){
							$recAsaltoNo = round(($p3NoSum/$siReqASiPre)*100, 1, PHP_ROUND_HALF_UP);
						}else{
							$recAsaltoNo = 0;
						}
						
						$recAsaltoNoPor = $recAsaltoNo.'%';
						echo $recAsaltoNoPor;
						?></td>
					</tr>
					<tr>
						<td>3</td>
						<td>Actos violentos que derivaron en lesiones graves</td>
						<td><?php

						if($siReqASiPre !== 0){
							$recActosNo = round(($p4NoSum/$siReqASiPre)*100, 1, PHP_ROUND_HALF_UP);
						}else{
							$recActosNo = 0;
						}

						$recActosNoPro = $recActosNo.'%';
						echo $recActosNoPro;
						?></td>
					</tr>
					<tr>
						<td>4</td>
						<td>Secuestro</td>
						<td><?php

						if($siReqASiPre !== 0){
							$recSecuestroNo = round(($p5NoSum/$siReqASiPre)*100, 1, PHP_ROUND_HALF_UP);
						}else{
							$recSecuestroNo = 0;
						}

						$recSecuestroNoPor = $recSecuestroNo.'%';
						echo $recSecuestroNoPor;
						?></td>
					</tr>
					<tr>
						<td>5</td>
						<td>Amenazas</td>
						<td><?php

						if($siReqASiPre !== 0){
							$recAmenazaNo = round(($p6NoSum/$siReqASiPre)*100, 1, PHP_ROUND_HALF_UP);
						}else{
							$recAmenazaNo = 0;
						}
						
						$recAmenazaNoPor = $recAmenazaNo.'%';
						echo $recAmenazaNoPor;
						?></td>
					</tr>
					<tr>
						<td>6</td>
						<td>Cualquier otro que ponga en riesgo su vida o salud, y/o la de otras personas</td>
						<td><?php

						if($siReqASiPre !== 0){
							$recOtroNo = round(($p7NoSum/$siReqASiPre)*100, 1, PHP_ROUND_HALF_UP);
						}else{
							$recOtroNo = 0;
						}
						
						$recOtroNoPor = $recOtroNo.'%';
						echo $recOtroNoPor;
						?></td>
					</tr>
				</table>
				<br>
				<br>
				<div class="row">
					<div class="col-8 mx-auto">
						<canvas id="graficaTabla6"></canvas>
					</div>
				</div>
				<br>
				<br>
				<!-- TABLA 7 -->

				<h5>Tabla 7 Porcentaje de recurrencias de los síntomas en las personas que no requieren valoración
					clínica pero que presentaron acontecimientos traumáticos.</h5>
				<br>
				<table class="table-responsive-sm" style="font-size: .8em;">
					<tr class="bg-primary">
						<th class="text-white">Número del síntoma</th>
						<th class="text-white">Descripción del acontecimiento</th>
						<th class="text-white">Porcentaje de recurrencia</th>
					</tr>

					<?php 

					// VERIFICA LA EXISTENCIA DE DATOS
					$conCero = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

					$csC = $conCero -> query("SELECT COUNT(codeMd5_R1a) AS cuantoRegistros FROM nom035R1a ");
					while ($dato = $csC->fetchArray()) {
						$cRegistros = $dato['cuantoRegistros'];
					}

					if ($cRegistros >= 1) {
						$csTabSiete = $conCero -> query("SELECT SUM(p8_R1a) AS p8Sum, SUM(p9_R1a) AS p9Sum, SUM(p10_R1a) AS p10Sum, SUM(p11_R1a) AS p11Sum, SUM(p12_R1a) AS p12Sum, SUM(p13_R1a) AS p13Sum, SUM(p14_R1a) AS p14Sum, SUM(p15_R1a) AS p15Sum, SUM(p16_R1a) AS p16Sum, SUM(p17_R1a) AS p17Sum, SUM(p18_R1a) AS p18Sum, SUM(p19_R1a) AS p19Sum, SUM(p20_R1a) AS p20Sum, SUM(p21_R1a) AS p21Sum, (p2_R1a+p3_R1a+p4_R1a+p5_R1a+p6_R1a+p7_R1a) AS sUno,(p8_R1a+p9_R1a) AS sDos,(p10_R1a+p11_R1a+p12_R1a+p13_R1a+p15_R1a+p15_R1a+p16_R1a) AS sTres,(p17_R1a+p18_R1a+p19_R1a+p20_R1a+p21_R1a) AS sCuatro FROM nom035R1a WHERE sUno >= 1  AND (sDos < 1) AND (sTres < 3) AND (sCuatro < 2 )");

						$idTabSiete = 0;

						while ($resTabSiete = $csTabSiete->fetchArray()) {
							$p8NoSum = $resTabSiete['p8Sum'];
							$p9NoSum = $resTabSiete['p9Sum'];
							$p10NoSum = $resTabSiete['p10Sum'];
							$p11NoSum = $resTabSiete['p11Sum'];
							$p12NoSum = $resTabSiete['p12Sum'];
							$p13NoSum = $resTabSiete['p13Sum'];
							$p14NoSum = $resTabSiete['p14Sum'];
							$p15NoSum = $resTabSiete['p15Sum'];
							$p16NoSum = $resTabSiete['p16Sum'];
							$p17NoSum = $resTabSiete['p17Sum'];
							$p18NoSum = $resTabSiete['p18Sum'];
							$p19NoSum = $resTabSiete['p19Sum'];
							$p20NoSum = $resTabSiete['p20Sum'];
							$p21NoSum = $resTabSiete['p21Sum'];
							

						}
						$conCero -> close();
					}else{
						$conCero -> close();
					}

					 ?>


					<tr>
						<td>1</td>
						<td>Recuerdos recurrentes sobre el acontecimiento que le provocan malestares.</td>
						<td><?php

						if($siReqASiPre !== 0){
							$recRecuerdosNo = round(($p8NoSum/$siReqASiPre)*100, 1, PHP_ROUND_HALF_UP);
						}else{
							$recRecuerdosNo = 0;
						}
						
						$recRecuerdosNoPor = $recRecuerdosNo.'%';
						echo $recRecuerdosNoPor;
						?></td>
					</tr>
					<tr>
						<td>2</td>
						<td>Sueños de carácter recurrente sobre el acontecimiento, que le producen malestar.</td>
						<td><?php

						if($siReqASiPre !== 0){
							$recSuenosNo = round(($p9NoSum/$siReqASiPre)*100, 1, PHP_ROUND_HALF_UP);
						}else{
							$recSuenosNo = 0;
						}
						
						$recSuenosNoPor = $recSuenosNo.'%';
						echo $recSuenosNoPor;
						?></td>
					</tr>
					<tr>
						<td>3</td>
						<td>Se ha esforzado por evitar todo tipo de sentimientos, conversaciones o situaciones que le
							puedan recordar el acontecimiento.</td>
						<td><?php

						if($siReqASiPre !== 0){
							$recSentimientosNo = round(($p10NoSum/$siReqASiPre)*100, 1, PHP_ROUND_HALF_UP);
						}else{
							$recSentimientosNo = 0;
						}
						
						$recSentimientosNoPro = $recSentimientosNo.'%';
						echo $recSentimientosNoPro;
						?></td>
					</tr>
					<tr>
						<td>4</td>
						<td>Se ha esforzado por evitar todo tipo de actividades, lugares o personas que motivan
							recuerdos del acontecimiento.</td>
						<td><?php

						if($siReqASiPre !== 0){
							$recLugaresNo = round(($p11NoSum/$siReqASiPre)*100, 1, PHP_ROUND_HALF_UP);
						}else{
							$recLugaresNo = 0;
						}
						
						$recLugaresNoPor = $recLugaresNo.'%';
						echo $recLugaresNoPor;
						?></td>
					</tr>
					<tr>
						<td>5</td>
						<td>Ha tenido dificultad para recordar alguna parte importante del evento.</td>
						<td><?php

						if($siReqASiPre !== 0){
							$recDificultadesNo = round(($p12NoSum/$siReqASiPre)*100, 1, PHP_ROUND_HALF_UP);
						}else{
							$recDificultadesNo = 0;
						}
						
						$recDificultadesNoPor = $recDificultadesNo.'%';
						echo $recDificultadesNoPor;
						?></td>
					</tr>
					<tr>
						<td>6</td>
						<td>Ha disminuido su interés en sus actividades cotidianas.</td>
						<td><?php

						if($siReqASiPre !== 0){
							$recActCotNo = round(($p13NoSum/$siReqASiPre)*100, 1, PHP_ROUND_HALF_UP);
						}else{
							$recActCotNo = 0;
						}
						
						$recActCotNoPor = $recActCotNo.'%';
						echo $recActCotNoPor;
						?></td>
					</tr>
					<tr>
						<td>7</td>
						<td>Se ha sentido usted alejado o distante de los demás.</td>
						<td><?php

						if($siReqASiPre !== 0){
							$recDistanteNo = round(($p14NoSum/$siReqASiPre)*100, 1, PHP_ROUND_HALF_UP);
						}else{
							$recDistanteNo = 0;
						}

						$recDistanteNoPor = $recDistanteNo.'%';
						echo $recDistanteNoPor;
						?></td>
					</tr>
					<tr>
						<td>8</td>
						<td>Ha notado que tiene dificultad para expresar sus sentimientos.</td>
						<td><?php

						if($siReqASiPre !== 0){
							$recDifExpSentNo = round(($p15NoSum/$siReqASiPre)*100, 1, PHP_ROUND_HALF_UP);
						}else{
							$recDifExpSentNo = 0;
						}
						
						$recDifExpSentNoPor = $recDifExpSentNo.'%';
						echo $recDifExpSentNoPor;
						?></td>
					</tr>
					<tr>
						<td>9</td>
						<td>Ha tenido la impresión de que su vida se va a acortar, que va a morir antes que otras
							personas o que tiene un futuro limitado.</td>
						<td><?php

						if($siReqASiPre !== 0){
							$recImpresionNo = round(($p16NoSum/$siReqASiPre)*100, 1, PHP_ROUND_HALF_UP);
						}else{
							$recImpresionNo = 0;
						}
						
						$recImpresionNoPor = $recImpresionNo.'%';
						echo $recImpresionNoPor;
						?></td>
					</tr>
					<tr>
						<td>10</td>
						<td>Ha tenido usted dificultades para dormir.</td>
						<td><?php

						if($siReqASiPre !== 0){
							$recDifDormNo = round(($p17NoSum/$siReqASiPre)*100, 1, PHP_ROUND_HALF_UP);
						}else{
							$recDifDormNo = 0;
						}
						
						$recDifDormNoPor = $recDifDormNo.'%';
						echo $recDifDormNoPor;
						?></td>
					</tr>
					<tr>
						<td>11</td>
						<td>Ha estado particularmente irritable o le han dado arranques de coraje.</td>
						<td><?php

						if($siReqASiPre !== 0){
							$recIrritableNo = round(($p18NoSum/$siReqASiPre)*100, 1, PHP_ROUND_HALF_UP);
						}else{
							$recIrritableNo = 0;
						}
						
						$recIrritableNoPor = $recIrritableNo.'%';
						echo $recIrritableNoPor;
						?></td>
					</tr>
					<tr>
						<td>12</td>
						<td>Ha tenido dificultad para concentrarse.</td>
						<td><?php

						if($siReqASiPre !== 0){
							$recDifConcenNo = round(($p19NoSum/$siReqASiPre)*100, 1, PHP_ROUND_HALF_UP);
						}else{
							$recDifConcenNo = 0;
						}
						
						$recDifConcenNoPor = $recDifConcenNo.'%';
						echo $recDifConcenNoPor;
						?></td>
					</tr>
					<tr>
						<td>13</td>
						<td>Ha estado nervioso o constantemente en alerta.</td>
						<td><?php

						if($siReqASiPre !== 0){
							$recCAlertaNo = round(($p20NoSum/$siReqASiPre)*100, 1, PHP_ROUND_HALF_UP);
						}else{
							$recCAlertaNo = 0;
						}
						
						$recCAlertaNoPor = $recCAlertaNo.'%';
						echo $recCAlertaNoPor;
						?></td>
					</tr>
					<tr>
						<td>14</td>
						<td>Se ha sobresaltado fácilmente por cualquier cosa.</td>
						<td><?php

						if($siReqASiPre !== 0){
							$recSobresaltoNo = round(($p21NoSum/$siReqASiPre)*100, 1, PHP_ROUND_HALF_UP);
						}else{
							$recSobresaltoNo = 0;
						}
						
						$recSobresaltoNoPor = $recSobresaltoNo.'%';
						echo $recSobresaltoNoPor;
						?></td>
					</tr>
				</table>
				<br>
				<br>
				<div class="row">
					<div class="col-8 mx-auto">
						<canvas id="graficaTabla7"></canvas>
					</div>
				</div>
				<br>
				<br>

				<!-- TABLA 8 -->

				<h5>Tabla 8 Personas que requieren valoración clínica según su sexo.</h5>
				<br>
				<b>Si requieren valoración clínica.</b>
				<table class="table-responsive-sm" style="font-size: .8em;">
					<tr class="bg-primary">
						<th class="text-white">Sexo</th>
						<th class="text-white">Número de trabajadores</th>
						<th class="text-white">Porcentaje</th>
					</tr>

					<?php 

					// VERIFICA LA EXISTENCIA DE DATOS
					$conCero = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

					$csC = $conCero -> query("SELECT COUNT(codeMd5_R1a) AS cuantoRegistros FROM nom035R1a ");
					while ($dato = $csC->fetchArray()) {
						$cRegistros = $dato['cuantoRegistros'];
					}

					if ($cRegistros >= 1) {
						$csTabOchoUno = $conCero -> query("SELECT (p2_R1a+p3_R1a+p4_R1a+p5_R1a+p6_R1a+p7_R1a) AS sUno,(p8_R1a+p9_R1a) AS sDos,(p10_R1a+p11_R1a+p12_R1a+p13_R1a+p15_R1a+p15_R1a+p16_R1a) AS sTres,(p17_R1a+p18_R1a+p19_R1a+p20_R1a+p21_R1a) AS sCuatro,usrSexo_R1a, COUNT(usrSexo_R1a) AS cuantosHombres FROM nom035R1a WHERE sUno >= 1  AND (sDos >= 1 OR sTres >= 3 OR sCuatro >= 2) AND usrSexo_R1a = 'M'");

						while ($resTabOchoUno = $csTabOchoUno->fetchArray()) {
							$cuantosHombres = $resTabOchoUno['cuantosHombres'];

						}

						$csTabOchoDos = $conCero -> query("SELECT (p2_R1a+p3_R1a+p4_R1a+p5_R1a+p6_R1a+p7_R1a) AS sUno,(p8_R1a+p9_R1a) AS sDos,(p10_R1a+p11_R1a+p12_R1a+p13_R1a+p15_R1a+p15_R1a+p16_R1a) AS sTres,(p17_R1a+p18_R1a+p19_R1a+p20_R1a+p21_R1a) AS sCuatro,usrSexo_R1a, COUNT(usrSexo_R1a) AS cuantasMujeres FROM nom035R1a WHERE sUno >= 1  AND (sDos >= 1 OR sTres >= 3 OR sCuatro >= 2) AND usrSexo_R1a = 'F'");
						
						while ($resTabOchoDos = $csTabOchoDos->fetchArray()) {
							$cuantasMujeres = $resTabOchoDos['cuantasMujeres'];

						}

						// Suma de Colaboradores Hombres y Mujeres
						$totalColaboradores = $cuantosHombres+$cuantasMujeres;

						$conCero -> close();
					}else{
						$conCero -> close();
					}

					 ?>

					<tr>
						<td class="bg-primary text-white">Femenino</td>
						<td><?php 
						echo $cuantasMujeres;
						?></td>
						<td><?php

						if($totalColaboradores !== 0){
							$cuantasMujeresPor = round(($cuantasMujeres/$totalColaboradores)*100, 1, PHP_ROUND_HALF_UP).'%';
						}else{
							$cuantasMujeresPor = '0%';
						}
						
						echo $cuantasMujeresPor;
						?></td>
					</tr>
					<tr>
						<td class="bg-primary text-white">Masculino</td>
						<td><?php  
						echo $cuantosHombres;
						?></td>
						<td><?php

						if($totalColaboradores !== 0){
							$cuantosHombresPor = round(($cuantosHombres/$totalColaboradores)*100, 1, PHP_ROUND_HALF_UP).'%';
						}else{
							$cuantosHombresPor = '0%';
						}
						
						echo $cuantosHombresPor;
						?></td>
					</tr>
					<tr>
						<td class="bg-primary text-white text-right">Total:</td>
						<td><?php
						echo $totalColaboradores;
						?></td>
						<td><?php
						$totalColaboradoresPor = $cuantasMujeresPor+$cuantosHombresPor.'%';
						echo $totalColaboradoresPor;
						?></td>
					</tr>
				</table>
				<br>
				<br>
				<div class="row">
					<div class="col-8 mx-auto">
						<canvas id="graficaTabla8"></canvas>
					</div>
				</div>
				<br>
				<br>

				<!-- TABLA 9 -->

				<h5>Tabla 9 Personas que no requieren valoración clínica pero que presentaron acontecimientos
					traumáticos severos según su sexo.</h5>
				<br>
				<b>No requieren valoración clínica, presentan acontecimientos traumáticos.</b>
				<table class="table-responsive-sm" style="font-size: .8em;">
					<tr class="bg-primary">
						<th class="text-white">Sexo</th>
						<th class="text-white">Número de trabajadores</th>
						<th class="text-white">Porcentaje</th>
					</tr>

					<?php 

					// VERIFICA LA EXISTENCIA DE DATOS
					$conCero = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

					$csC = $conCero -> query("SELECT COUNT(codeMd5_R1a) AS cuantoRegistros FROM nom035R1a ");
					while ($dato = $csC->fetchArray()) {
						$cRegistros = $dato['cuantoRegistros'];
					}

					if ($cRegistros >= 1) {
						$csTabNueveUno = $conCero -> query("SELECT (p2_R1a+p3_R1a+p4_R1a+p5_R1a+p6_R1a+p7_R1a) AS sUno,(p8_R1a+p9_R1a) AS sDos,(p10_R1a+p11_R1a+p12_R1a+p13_R1a+p15_R1a+p15_R1a+p16_R1a) AS sTres,(p17_R1a+p18_R1a+p19_R1a+p20_R1a+p21_R1a) AS sCuatro,usrSexo_R1a, COUNT(usrSexo_R1a) AS cuantosHombres FROM nom035R1a WHERE sUno >= 1  AND (sDos < 1) AND (sTres < 3) AND (sCuatro < 2 ) AND usrSexo_R1a = 'M'");

						while ($resTabNueveUno = $csTabNueveUno->fetchArray()) {
							$cuantosHombresNo = $resTabNueveUno['cuantosHombres'];

						}

						$csTabNueveDos = $conCero -> query("SELECT (p2_R1a+p3_R1a+p4_R1a+p5_R1a+p6_R1a+p7_R1a) AS sUno,(p8_R1a+p9_R1a) AS sDos,(p10_R1a+p11_R1a+p12_R1a+p13_R1a+p15_R1a+p15_R1a+p16_R1a) AS sTres,(p17_R1a+p18_R1a+p19_R1a+p20_R1a+p21_R1a) AS sCuatro,usrSexo_R1a, COUNT(usrSexo_R1a) AS cuantasMujeres FROM nom035R1a WHERE sUno >= 1  AND (sDos < 1) AND (sTres < 3) AND (sCuatro < 2 ) AND usrSexo_R1a = 'F'");
						
						while ($resTabNueveDos = $csTabNueveDos->fetchArray()) {
							$cuantasMujeresNo = $resTabNueveDos['cuantasMujeres'];

						}

						// Suma de Colaboradores Hombres y Mujeres
						$totalColaboradoresNo = $cuantosHombresNo+$cuantasMujeresNo;

						$conCero -> close();
					}else{
						$conCero -> close();
					}

					 ?>

					<tr>
						<td class="bg-primary text-white">Femenino</td>
						<td><?php 
						echo $cuantasMujeresNo;
						?></td>
						<td><?php

						if($totalColaboradoresNo !== 0){
							$cuantasMujeresNoPor = round(($cuantasMujeresNo/$totalColaboradoresNo)*100, 1, PHP_ROUND_HALF_UP).'%';
						}else{
							$cuantasMujeresNoPor = '0%';
						}
						
						echo $cuantasMujeresNoPor;
						?></td>
					</tr>
					<tr>
						<td class="bg-primary text-white">Masculino</td>
						<td><?php  
						echo $cuantosHombresNo;
						?></td>
						<td><?php

						if($totalColaboradoresNo !== 0){
							$cuantosHombresNoPor = round(($cuantosHombresNo/$totalColaboradoresNo)*100, 1, PHP_ROUND_HALF_UP).'%';
						}else{
							$cuantosHombresNoPor = '0%';
						}
						
						echo $cuantosHombresNoPor;
						?></td>
					</tr>
					<tr>
						<td class="bg-primary text-white text-right">Total:</td>
						<td><?php
						echo $totalColaboradoresNo;
						?></td>
						<td><?php
						$totalColaboradoresNoPor = $cuantasMujeresNoPor+$cuantosHombresNoPor.'%';
						echo $totalColaboradoresNoPor;
						?></td>
					</tr>
				</table>
				<br>
				<br>
				<div class="row">
					<div class="col-8 mx-auto">
						<canvas id="graficaTabla9"></canvas>
					</div>
				</div>
				<br>
				<br>
			</div>
		</div>
	</div>
	<script src="../js/jquery-3.3.1.slim.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/chart.js"></script>
	<script>
		var ctx = document.getElementById('graficaTabla3').getContext('2d');
		var chart = new Chart(ctx, {
			// The type of chart we want to create
			type: 'pie',

			// The data for our dataset
			data: {
				labels: ['No requieren valoración clínica',
					'No requieren valoración clínica, presentaron acontecimientos traumáticos',
					'Sí requieren valoración clínica'
				],
				datasets: [{
					label: 'Número de trabajadores que requieren o no valoración clínica',
					backgroundColor: ['#9BDAF2', '#034AA6', '#4E52A6'],
					borderColor: ['#9BDAF2', '#034AA6', '#4E52A6'],
					data: [ <?php echo $noRequierenA; ?> , <?php echo $noReqASiPre; ?> , <?php echo $siReqASiPre; ?> ]
				}]
			},

			// Configuration options go here
			options: {}
		});

		var ctx = document.getElementById('graficaTabla4').getContext('2d');
		var chart = new Chart(ctx, {
			// The type of chart we want to create
			type: 'bar',

			// The data for our dataset
			data: {
				labels: ['1', '2', '3', '4', '5', '6'],
				datasets: [{
					label: 'Recurrencia de acontecimientos traumáticos en las personas que requieren valoración clínica',
					backgroundColor: ['#9BDAF2', '#9BDAF2', '#9BDAF2', '#9BDAF2', '#9BDAF2', '#9BDAF2'],
					borderColor: ['#9BDAF2', '#9BDAF2', '#9BDAF2', '#9BDAF2', '#9BDAF2', '#9BDAF2'],
					data: [ <?php echo $recAccidentes; ?> , <?php echo $recAsalto; ?> , <?php echo $recActos; ?> , <?php echo $recSecuestro;?> , <?php echo $recAmenaza; ?> , <?php echo $recOtro; ?> ]
				}]
			},

			// Configuration options go here
			options: {}
		});

		var ctx = document.getElementById('graficaTabla5').getContext('2d');
		var chart = new Chart(ctx, {
			// The type of chart we want to create
			type: 'bar',

			// The data for our dataset
			data: {
				labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14'],
				datasets: [{
					label: 'Recurrencia de acontecimientos traumáticos en las personas que requieren valoración clínica',
					backgroundColor: ['#9BDAF2', '#9BDAF2', '#9BDAF2', '#9BDAF2', '#9BDAF2', '#9BDAF2',
						'#9BDAF2', '#9BDAF2', '#9BDAF2', '#9BDAF2', '#9BDAF2', '#9BDAF2', '#9BDAF2',
						'#9BDAF2'
					],
					borderColor: ['#9BDAF2', '#9BDAF2', '#9BDAF2', '#9BDAF2', '#9BDAF2', '#9BDAF2', '#9BDAF2',
						'#9BDAF2', '#9BDAF2', '#9BDAF2', '#9BDAF2', '#9BDAF2', '#9BDAF2', '#9BDAF2'
					],
					data: [ <?php echo $recRecuerdos; ?> , <?php echo $recSuenos; ?> , <?php echo $recSentimientos; ?> , <?php echo $recLugares; ?> , <?php echo $recDificultades; ?> , <?php echo $recActCot; ?> , <?php echo $recDistante; ?> , <?php echo $recDifExpSent; ?> , <?php echo $recImpresion; ?> , <?php echo $recDifDorm; ?> , <?php echo $recIrritable; ?> , <?php echo $recDifConcen; ?> , <?php echo $recCAlerta; ?> , <?php echo $recSobresalto; ?> ]
				}]
			},

			// Configuration options go here
			options: {}
		});

		var ctx = document.getElementById('graficaTabla6').getContext('2d');
		var chart = new Chart(ctx, {
			// The type of chart we want to create
			type: 'bar',

			// The data for our dataset
			data: {
				labels: ['1', '2', '3', '4', '5', '6'],
				datasets: [{
					label: 'Recurrencia de acontecimientos traumáticos en las personas que requieren valoración clínica',
					backgroundColor: ['#9BDAF2', '#9BDAF2', '#9BDAF2', '#9BDAF2', '#9BDAF2', '#9BDAF2'],
					borderColor: ['#9BDAF2', '#9BDAF2', '#9BDAF2', '#9BDAF2', '#9BDAF2', '#9BDAF2'],
					data: [ <?php echo $recAccidentesNo; ?> , <?php echo $recAsaltoNo; ?> , <?php echo $recActosNo; ?> , <?php echo $recSecuestroNo; ?> , <?php echo $recAmenazaNo; ?> , <?php echo $recOtroNo; ?> ]
				}]
			},

			// Configuration options go here
			options: {}
		});

		var ctx = document.getElementById('graficaTabla7').getContext('2d');
		var chart = new Chart(ctx, {
			// The type of chart we want to create
			type: 'bar',

			// The data for our dataset
			data: {
				labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14'],
				datasets: [{
					label: 'Recurrencia de acontecimientos traumáticos en las personas que requieren valoración clínica',
					backgroundColor: ['#9BDAF2', '#9BDAF2', '#9BDAF2', '#9BDAF2', '#9BDAF2', '#9BDAF2',
						'#9BDAF2', '#9BDAF2', '#9BDAF2', '#9BDAF2', '#9BDAF2', '#9BDAF2', '#9BDAF2',
						'#9BDAF2'
					],
					borderColor: ['#9BDAF2', '#9BDAF2', '#9BDAF2', '#9BDAF2', '#9BDAF2', '#9BDAF2', '#9BDAF2',
						'#9BDAF2', '#9BDAF2', '#9BDAF2', '#9BDAF2', '#9BDAF2', '#9BDAF2', '#9BDAF2'
					],
					data: [ <?php echo $recRecuerdosNo; ?> , <?php echo $recSuenosNo; ?> , <?php echo $recSentimientosNo; ?> , <?php echo $recLugaresNo; ?> , <?php echo $recDificultadesNo; ?> , <?php echo $recActCotNo; ?> , <?php echo $recDistanteNo; ?> , <?php echo $recDifExpSentNo; ?> , <?php echo $recImpresionNo; ?> , <?php echo $recDifDormNo; ?> , <?php echo $recIrritableNo; ?> , <?php echo $recDifConcenNo; ?> , <?php echo $recCAlertaNo; ?> , <?php echo $recSobresaltoNo; ?> ]
				}]
			},

			// Configuration options go here
			options: {}
		});

		var ctx = document.getElementById('graficaTabla8').getContext('2d');
		var chart = new Chart(ctx, {
			// The type of chart we want to create
			type: 'doughnut',

			// The data for our dataset
			data: {
				labels: ['Femenino', 'Masculino'],
				datasets: [{
					label: 'Número de trabajadores que requieren o no valoración clínica',
					backgroundColor: ['#4E52A6', '#9BDAF2'],
					borderColor: ['#4E52A6', '#9BDAF2'],
					data: [ <?php $cuantasMujeresPor = round(($cuantasMujeres / $totalColaboradores) * 100, 1, PHP_ROUND_HALF_UP); echo $cuantasMujeresPor; ?> , <?php $cuantosHombresPor = round(($cuantosHombres / $totalColaboradores) * 100, 1, PHP_ROUND_HALF_UP); echo $cuantosHombresPor; ?> ]
				}]
			},

			// Configuration options go here
			options: {}
		});

		var ctx = document.getElementById('graficaTabla9').getContext('2d');
		var chart = new Chart(ctx, {
			// The type of chart we want to create
			type: 'doughnut',

			// The data for our dataset
			data: {
				labels: ['Femenino', 'Masculino'],
				datasets: [{
					label: 'Número de trabajadores que requieren o no valoración clínica',
					backgroundColor: ['#4E52A6', '#9BDAF2'],
					borderColor: ['#4E52A6', '#9BDAF2'],
					data: [ <?php $cuantasMujeresNoPor = round(($cuantasMujeresNo / $totalColaboradoresNo) * 100, 1, PHP_ROUND_HALF_UP); echo $cuantasMujeresNoPor; ?> , <?php $cuantosHombresNoPor = round(( $cuantosHombresNo / $totalColaboradoresNo) * 100, 1, PHP_ROUND_HALF_UP); echo $cuantosHombresNoPor; ?> ]
				}]
			},

			// Configuration options go here
			options: {}
		});
	</script>
</body>

</html>