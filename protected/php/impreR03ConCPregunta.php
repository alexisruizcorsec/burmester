<?php 

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");
date_default_timezone_set('America/Mexico_City');


 ?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Lista NOM-035 Resultados G3</title>
	<script src="../js/chart.js"></script>
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
/*		.hoja{
			margin: 0 auto;
			width: 730px;
			height: 980px;
			text-align:  justify;
		}*/
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
		.tSinBorde{
			text-align: center;
			border: 0px solid black;
		}
		.azul{
			background-color: #9be5f7;
		}
		.verde{
			background-color: #6bf56e;
		}
		.amarillo{
			background-color: #ffff00;
		}
		.naranja{
			background-color: #ffc000;
		}
		.rojo{
			background-color: #ff0000 ;
			color: #FFF;
		}
		.centrado {
			text-align: center;
		}

	</style>
</head>
<body>
<!-- <body onload="window.print();"> -->
	<div class="marcoP">
		<div class="hoja">
			<div style="position: absolute; z-index: -1;">
				<div style="height: 950px;">
					




	<?php 


	$conPorPregunta = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

	$csCTrabajo= $conPorPregunta -> query("SELECT COUNT(dirEmpresa_R3a) AS cuatosCentros, dirEmpresa_R3a FROM nom035R3a GROUP BY dirEmpresa_R3a ORDER BY dirEmpresa_R3a");

	

	while ($cTrabajo = $csCTrabajo->fetchArray()) {

		$cuatosCentros=$cTrabajo['cuatosCentros'];
		$dirEmpresa_R3a=$cTrabajo['dirEmpresa_R3a'];


		echo '
			<h3>'.$dirEmpresa_R3a.'</h3>

			<table style="font-size: .8em; width: 800px;">
				<tr>
					<td style="width: 300px;"><b>1.- Ambiente de trabajo</b></td>
					<td style="width: 70px;">Siempre</td>
					<td style="width: 90px;">Casi siempre</td>
					<td style="width: 90px;">Algunas veces</td>
					<td style="width: 90px;">Casi nunca</td>
					<td>Nunca</td>
				</tr>
				<tr>
					<td>1.- El espacio donde trabajo me permite realizar mis actividades de manera segura e higiénica.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p1_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p1_R3a = '0'");
					while ($cR1= $csCSiempre->fetchArray()) {
						$rSiempre=$cR1['rSiempre'];
					}

					$csCMaxR1= $conPorPregunta -> query("SELECT MAX(totalP1) AS valMax FROM(SELECT COUNT(p1_R3a) AS totalP1 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p1_R3a = '4' UNION ALL SELECT COUNT(p1_R3a) AS totalP1 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p1_R3a = '3' UNION ALL SELECT COUNT(p1_R3a) AS totalP1 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p1_R3a = '2' UNION ALL SELECT COUNT(p1_R3a) AS totalP1 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p1_R3a = '1' UNION ALL SELECT COUNT(p1_R3a) AS totalP1 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p1_R3a = '0')");

					while ($cR1Max= $csCMaxR1->fetchArray()) {
						$valMax1=$cR1Max['valMax'];
					}

					if ($valMax1 === $rSiempre) {
						$colorSiempre = 'azul';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>

					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p1_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p1_R3a = '1'");
					while ($cR1= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR1['rCasiSiempre'];
					}

					if ($valMax1 === $rCasiSiempre) {
						$colorCasiSiempre = 'verde';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>

					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p1_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p1_R3a = '2'");
					while ($cR1= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR1['rAlgunasVeces'];
					}

					if ($valMax1 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>

					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p1_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p1_R3a = '3'");
					while ($cR1= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR1['rCasiNunca'];
					}

					if ($valMax1 === $rCasiNunca) {
						$colorCasiNunca = 'naranja';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>

					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p1_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p1_R3a = '4'");
					while ($cR1= $csNunca->fetchArray()) {
						$rNunca=$cR1['rNunca'];
					}

					if ($valMax1 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR01p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR01p = (isset($sumaR01p)) ? $sumaR01p : 0;
					$por01rSiempre = round(($rSiempre/$sumaR01p)*100,0, PHP_ROUND_HALF_EVEN);
					$por01rCasiSiempre = round(($rCasiSiempre/$sumaR01p)*100,0, PHP_ROUND_HALF_EVEN);
					$por01rAlgunasVeces = round(($rAlgunasVeces/$sumaR01p)*100,0, PHP_ROUND_HALF_EVEN);
					$por01rCasiNunca = round(($rCasiNunca/$sumaR01p)*100,0, PHP_ROUND_HALF_EVEN);
					$por01rNunca = round(($rNunca/$sumaR01p)*100,0, PHP_ROUND_HALF_EVEN);

					$por01rSiempre = (isset($por01rSiempre)) ? $por01rSiempre : 0;
					$por01rCasiSiempre = (isset($por01rCasiSiempre)) ? $por01rCasiSiempre : 0;
					$por01rAlgunasVeces = (isset($por01rAlgunasVeces)) ? $por01rAlgunasVeces : 0;
					$por01rCasiNunca = (isset($por01rCasiNunca)) ? $por01rCasiNunca : 0;
					$por01rNunca = (isset($por01rNunca)) ? $por01rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado azul">'.$por01rSiempre.'%</td>
						<td class="centrado verde">'.$por01rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por01rAlgunasVeces.'%</td>
						<td class="centrado naranja">'.$por01rCasiNunca.'%</td>
						<td class="centrado rojo">'.$por01rNunca.'%</td>
					</tr>
					';


				echo '
				<tr>
					<td>2.- Mi trabajo me exige hacer mucho esfuerzo físico.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p2_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p2_R3a = '4'");
					while ($cR2= $csCSiempre->fetchArray()) {
						$rSiempre=$cR2['rSiempre'];
					}

					$csCMaxR2= $conPorPregunta -> query("SELECT MAX(totalp2) AS valMax FROM(SELECT COUNT(p2_R3a) AS totalp2 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p2_R3a = '4' UNION ALL SELECT COUNT(p2_R3a) AS totalp2 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p2_R3a = '3' UNION ALL SELECT COUNT(p2_R3a) AS totalp2 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p2_R3a = '2' UNION ALL SELECT COUNT(p2_R3a) AS totalp2 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p2_R3a = '1' UNION ALL SELECT COUNT(p2_R3a) AS totalp2 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p2_R3a = '0')");

					while ($cR2Max= $csCMaxR2->fetchArray()) {
						$valMax2=$cR2Max['valMax'];
					}

					if ($valMax2 === $rSiempre) {
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p2_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p2_R3a = '3'");
					while ($cR2= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR2['rCasiSiempre'];
					}

					if ($valMax2 === $rCasiSiempre) {
						$colorCasiSiempre = 'naranja';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p2_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p2_R3a = '2'");
					while ($cR2= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR2['rAlgunasVeces'];
					}

					if ($valMax2 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p2_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p2_R3a = '1'");
					while ($cR2= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR2['rCasiNunca'];
					}

					if ($valMax2 === $rCasiNunca) {
						$colorCasiNunca = 'verde';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p2_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p2_R3a = '0'");
					while ($cR2= $csNunca->fetchArray()) {
						$rNunca=$cR2['rNunca'];
					}

					if ($valMax2 === $rNunca) {
						$colorNunca = 'azul';
					}else{
						$colorNunca = '';
					}


					####### SUMA DE TOTALES #######
					$sumaR02p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR02p = (isset($sumaR02p)) ? $sumaR02p : 0;
					$por02rSiempre = round(($rSiempre/$sumaR02p)*100,0, PHP_ROUND_HALF_EVEN);
					$por02rCasiSiempre = round(($rCasiSiempre/$sumaR02p)*100,0, PHP_ROUND_HALF_EVEN);
					$por02rAlgunasVeces = round(($rAlgunasVeces/$sumaR02p)*100,0, PHP_ROUND_HALF_EVEN);
					$por02rCasiNunca = round(($rCasiNunca/$sumaR02p)*100,0, PHP_ROUND_HALF_EVEN);
					$por02rNunca = round(($rNunca/$sumaR02p)*100,0, PHP_ROUND_HALF_EVEN);

					$por02rSiempre = (isset($por02rSiempre)) ? $por02rSiempre : 0;
					$por02rCasiSiempre = (isset($por02rCasiSiempre)) ? $por02rCasiSiempre : 0;
					$por02rAlgunasVeces = (isset($por02rAlgunasVeces)) ? $por02rAlgunasVeces : 0;
					$por02rCasiNunca = (isset($por02rCasiNunca)) ? $por02rCasiNunca : 0;
					$por02rNunca = (isset($por02rNunca)) ? $por02rNunca : 0;

					
					###### SUMA DE TOTALES #######

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado rojo">'.$por02rSiempre.'%</td>
						<td class="centrado naranja">'.$por02rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por02rAlgunasVeces.'%</td>
						<td class="centrado verde">'.$por02rCasiNunca.'%</td>
						<td class="centrado azul">'.$por02rNunca.'%</td>
					</tr>
					';


				echo '
				<tr>
					<td>3.- Me preocupa sufrir un accidente en mi trabajo.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p3_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p3_R3a = '4'");
					while ($cR3= $csCSiempre->fetchArray()) {
						$rSiempre=$cR3['rSiempre'];
					}

					$csCMaxR3= $conPorPregunta -> query("SELECT MAX(totalp3) AS valMax FROM(SELECT COUNT(p3_R3a) AS totalp3 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p3_R3a = '4' UNION ALL SELECT COUNT(p3_R3a) AS totalp3 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p3_R3a = '3' UNION ALL SELECT COUNT(p3_R3a) AS totalp3 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p3_R3a = '2' UNION ALL SELECT COUNT(p3_R3a) AS totalp3 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p3_R3a = '1' UNION ALL SELECT COUNT(p3_R3a) AS totalp3 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p3_R3a = '0')");

					while ($cR3Max= $csCMaxR3->fetchArray()) {
						$valMax3=$cR3Max['valMax'];
					}

					if ($valMax3 === $rSiempre) {
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p3_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p3_R3a = '3'");
					while ($cR3= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR3['rCasiSiempre'];
					}

					if ($valMax3 === $rCasiSiempre) {
						$colorCasiSiempre = 'naranja';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p3_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p3_R3a = '2'");
					while ($cR3= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR3['rAlgunasVeces'];
					}

					if ($valMax3 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p3_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p3_R3a = '1'");
					while ($cR3= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR3['rCasiNunca'];
					}

					if ($valMax3 === $rCasiNunca) {
						$colorCasiNunca = 'verde';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p3_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p3_R3a = '0'");
					while ($cR3= $csNunca->fetchArray()) {
						$rNunca=$cR3['rNunca'];
					}

					if ($valMax3 === $rNunca) {
						$colorNunca = 'azul';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR03p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR03p = (isset($sumaR03p)) ? $sumaR03p : 0;
					$por03rSiempre = round(($rSiempre/$sumaR03p)*100,0, PHP_ROUND_HALF_EVEN);
					$por03rCasiSiempre = round(($rCasiSiempre/$sumaR03p)*100,0, PHP_ROUND_HALF_EVEN);
					$por03rAlgunasVeces = round(($rAlgunasVeces/$sumaR03p)*100,0, PHP_ROUND_HALF_EVEN);
					$por03rCasiNunca = round(($rCasiNunca/$sumaR03p)*100,0, PHP_ROUND_HALF_EVEN);
					$por03rNunca = round(($rNunca/$sumaR03p)*100,0, PHP_ROUND_HALF_EVEN);

					$por03rSiempre = (isset($por03rSiempre)) ? $por03rSiempre : 0;
					$por03rCasiSiempre = (isset($por03rCasiSiempre)) ? $por03rCasiSiempre : 0;
					$por03rAlgunasVeces = (isset($por03rAlgunasVeces)) ? $por03rAlgunasVeces : 0;
					$por03rCasiNunca = (isset($por03rCasiNunca)) ? $por03rCasiNunca : 0;
					$por03rNunca = (isset($por03rNunca)) ? $por03rNunca : 0;

					
					###### SUMA DE TOTALES #######

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado rojo">'.$por03rSiempre.'%</td>
						<td class="centrado naranja">'.$por03rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por03rAlgunasVeces.'%</td>
						<td class="centrado verde">'.$por03rCasiNunca.'%</td>
						<td class="centrado azul">'.$por03rNunca.'%</td>
					</tr>
					';


				echo '
					</td>
				</tr>
				<tr>
					<td>4.- Considero que en mi trabajo se aplican las normas de seguridad y salud en el trabajo.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p4_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p4_R3a = '0'");
					while ($cR4= $csCSiempre->fetchArray()) {
						$rSiempre=$cR4['rSiempre'];
					}

					$csCMaxR4= $conPorPregunta -> query("SELECT MAX(totalp4) AS valMax FROM(SELECT COUNT(p4_R3a) AS totalp4 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p4_R3a = '4' UNION ALL SELECT COUNT(p4_R3a) AS totalp4 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p4_R3a = '3' UNION ALL SELECT COUNT(p4_R3a) AS totalp4 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p4_R3a = '2' UNION ALL SELECT COUNT(p4_R3a) AS totalp4 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p4_R3a = '1' UNION ALL SELECT COUNT(p4_R3a) AS totalp4 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p4_R3a = '0')");

					while ($cR4Max= $csCMaxR4->fetchArray()) {
						$valMax4=$cR4Max['valMax'];
					}

					if ($valMax4 === $rSiempre) {
						$colorSiempre = 'azul';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p4_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p4_R3a = '1'");
					while ($cR4= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR4['rCasiSiempre'];
					}

					if ($valMax4 === $rCasiSiempre) {
						$colorCasiSiempre = 'verde';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p4_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p4_R3a = '2'");
					while ($cR4= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR4['rAlgunasVeces'];
					}

					if ($valMax4 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p4_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p4_R3a = '3'");
					while ($cR4= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR4['rCasiNunca'];
					}

					if ($valMax4 === $rCasiNunca) {
						$colorCasiNunca = 'naranja';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p4_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p4_R3a = '4'");
					while ($cR4= $csNunca->fetchArray()) {
						$rNunca=$cR4['rNunca'];
					}

					if ($valMax4 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR04p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR04p = (isset($sumaR04p)) ? $sumaR04p : 0;
					$por04rSiempre = round(($rSiempre/$sumaR04p)*100,0, PHP_ROUND_HALF_EVEN);
					$por04rCasiSiempre = round(($rCasiSiempre/$sumaR04p)*100,0, PHP_ROUND_HALF_EVEN);
					$por04rAlgunasVeces = round(($rAlgunasVeces/$sumaR04p)*100,0, PHP_ROUND_HALF_EVEN);
					$por04rCasiNunca = round(($rCasiNunca/$sumaR04p)*100,0, PHP_ROUND_HALF_EVEN);
					$por04rNunca = round(($rNunca/$sumaR04p)*100,0, PHP_ROUND_HALF_EVEN);

					$por04rSiempre = (isset($por04rSiempre)) ? $por04rSiempre : 0;
					$por04rCasiSiempre = (isset($por04rCasiSiempre)) ? $por04rCasiSiempre : 0;
					$por04rAlgunasVeces = (isset($por04rAlgunasVeces)) ? $por04rAlgunasVeces : 0;
					$por04rCasiNunca = (isset($por04rCasiNunca)) ? $por04rCasiNunca : 0;
					$por04rNunca = (isset($por04rNunca)) ? $por04rNunca : 0;

					
					###### SUMA DE TOTALES #######

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado azul">'.$por04rSiempre.'%</td>
						<td class="centrado verde">'.$por04rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por04rAlgunasVeces.'%</td>
						<td class="centrado naranja">'.$por04rCasiNunca.'%</td>
						<td class="centrado rojo">'.$por04rNunca.'%</td>
					</tr>
					';


				echo '
					</td>
				</tr>
				<tr>
					<td>5.- Considero que las actividades que realizo son peligrosas.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p5_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p5_R3a = '4'");
					while ($cR5= $csCSiempre->fetchArray()) {
						$rSiempre=$cR5['rSiempre'];
					}

					$csCMaxR5= $conPorPregunta -> query("SELECT MAX(totalp5) AS valMax FROM(SELECT COUNT(p5_R3a) AS totalp5 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p5_R3a = '4' UNION ALL SELECT COUNT(p5_R3a) AS totalp5 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p5_R3a = '3' UNION ALL SELECT COUNT(p5_R3a) AS totalp5 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p5_R3a = '2' UNION ALL SELECT COUNT(p5_R3a) AS totalp5 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p5_R3a = '1' UNION ALL SELECT COUNT(p5_R3a) AS totalp5 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p5_R3a = '0')");

					while ($cR5Max= $csCMaxR5->fetchArray()) {
						$valMax5=$cR5Max['valMax'];
					}

					if ($valMax5 === $rSiempre) {
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p5_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p5_R3a = '3'");
					while ($cR5= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR5['rCasiSiempre'];
					}

					if ($valMax5 === $rCasiSiempre) {
						$colorCasiSiempre = 'naranja';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p5_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p5_R3a = '2'");
					while ($cR5= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR5['rAlgunasVeces'];
					}

					if ($valMax5 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p5_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p5_R3a = '1'");
					while ($cR5= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR5['rCasiNunca'];
					}

					if ($valMax5 === $rCasiNunca) {
						$colorCasiNunca = 'verde';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p5_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p5_R3a = '0'");
					while ($cR5= $csNunca->fetchArray()) {
						$rNunca=$cR5['rNunca'];
					}

					if ($valMax5 === $rNunca) {
						$colorNunca = 'azul';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######

					$sumaR05p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR05p = (isset($sumaR05p)) ? $sumaR05p : 0;
					$por05rSiempre = round(($rSiempre/$sumaR05p)*100,0, PHP_ROUND_HALF_EVEN);
					$por05rCasiSiempre = round(($rCasiSiempre/$sumaR05p)*100,0, PHP_ROUND_HALF_EVEN);
					$por05rAlgunasVeces = round(($rAlgunasVeces/$sumaR05p)*100,0, PHP_ROUND_HALF_EVEN);
					$por05rCasiNunca = round(($rCasiNunca/$sumaR05p)*100,0, PHP_ROUND_HALF_EVEN);
					$por05rNunca = round(($rNunca/$sumaR05p)*100,0, PHP_ROUND_HALF_EVEN);

					$por05rSiempre = (isset($por05rSiempre)) ? $por05rSiempre : 0;
					$por05rCasiSiempre = (isset($por05rCasiSiempre)) ? $por05rCasiSiempre : 0;
					$por05rAlgunasVeces = (isset($por05rAlgunasVeces)) ? $por05rAlgunasVeces : 0;
					$por05rCasiNunca = (isset($por05rCasiNunca)) ? $por05rCasiNunca : 0;
					$por05rNunca = (isset($por05rNunca)) ? $por05rNunca : 0;

					
					###### SUMA DE TOTALES #######

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado rojo">'.$por05rSiempre.'%</td>
						<td class="centrado naranja">'.$por05rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por05rAlgunasVeces.'%</td>
						<td class="centrado verde">'.$por05rCasiNunca.'%</td>
						<td class="centrado azul">'.$por05rNunca.'%</td>
					</tr>
					';


				echo '
					</td>
				</tr>
			</table>
			<br>
			<div style="font-size: .8em;">
				<h3>Ambiente de trabajo</h3>
				<h4>Condiciones en el ambiente de trabajo</h4>
				';
				$dDatos01_1a = '['.$por01rSiempre.','.$por01rCasiSiempre.','.$por01rAlgunasVeces.','.$por01rCasiNunca.','.$por01rNunca.']';

				$dDatos03_1a = '['.$por03rSiempre.','.$por03rCasiSiempre.','.$por03rAlgunasVeces.','.$por03rCasiNunca.','.$por03rNunca.']';

				$dDatos02_1a = '['.$por02rSiempre.','.$por02rCasiSiempre.','.$por02rAlgunasVeces.','.$por02rCasiNunca.','.$por02rNunca.']';

				$dDatos04_1a = '['.$por04rSiempre.','.$por04rCasiSiempre.','.$por04rAlgunasVeces.','.$por04rCasiNunca.','.$por04rNunca.']';

				$dDatos05_1a = '['.$por05rSiempre.','.$por05rCasiSiempre.','.$por05rAlgunasVeces.','.$por05rCasiNunca.','.$por05rNunca.']';

				$varGraf = "amb".substr(md5($dirEmpresa_R3a), 28, 4);

				echo'
				<table style="width: 800px;">
					<tr>
						<td class="tSinBorde" style="width: 400px;">
							<b>Condiciones peligrosas e inseguras (1, 3)</b>
							<div>
								<canvas id="grafica01a'.$varGraf.'"></canvas>
							</div>
							
						</td>
						<td class="tSinBorde" style="width: 400px;">
							<b>Condiciones deficientes e insalubres (2, 4)</b>
							<div>
								<canvas id="grafica02a'.$varGraf.'"></canvas>
							</div>
						</td>
					</tr>
					<tr>
						<td class="tSinBorde" style="width: 400px;">
							<b>Trabajos peligrosos (5)</b>
							<div>
								<canvas id="grafica03a'.$varGraf.'"></canvas>
							</div>
						</td>
					</tr>
				</table>
			</div>

			



			<br>
			<table style="font-size: .8em; width: 800px;">
				<tr>
					<td style="width: 300px;"><b>2.- Factores propios de la actividad</b></td>
					<td style="width: 70px;">Siempre</td>
					<td style="width: 90px;">Casi siempre</td>
					<td style="width: 90px;">Algunas veces</td>
					<td style="width: 90px;">Casi nunca</td>
					<td>Nunca</td>
				</tr>
				<tr>
					<td>6.-	Por la cantidad de trabajo que tengo debo quedarme tiempo adicional a mi turno.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p6_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p6_R3a = '4'");
					while ($cR6= $csCSiempre->fetchArray()) {
						$rSiempre=$cR6['rSiempre'];
					}

					$csCMaxR6= $conPorPregunta -> query("SELECT MAX(totalP6) AS valMax FROM(SELECT COUNT(p6_R3a) AS totalP6 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p6_R3a = '4' UNION ALL SELECT COUNT(p6_R3a) AS totalP6 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p6_R3a = '3' UNION ALL SELECT COUNT(p6_R3a) AS totalP6 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p6_R3a = '2' UNION ALL SELECT COUNT(p6_R3a) AS totalP6 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p6_R3a = '1' UNION ALL SELECT COUNT(p6_R3a) AS totalP6 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p6_R3a = '0')");

					while ($cR6Max= $csCMaxR6->fetchArray()) {
						$valMax6=$cR6Max['valMax'];
					}

					if ($valMax6 === $rSiempre) {
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>

					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p6_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p6_R3a = '3'");
					while ($cR6= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR6['rCasiSiempre'];
					}

					if ($valMax6 === $rCasiSiempre) {
						$colorCasiSiempre = 'naranja';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>

					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p6_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p6_R3a = '2'");
					while ($cR6= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR6['rAlgunasVeces'];
					}

					if ($valMax6 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>

					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p6_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p6_R3a = '1'");
					while ($cR6= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR6['rCasiNunca'];
					}

					if ($valMax6 === $rCasiNunca) {
						$colorCasiNunca = 'verde';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>

					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p6_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p6_R3a = '0'");
					while ($cR6= $csNunca->fetchArray()) {
						$rNunca=$cR6['rNunca'];
					}

					if ($valMax6 === $rNunca) {
						$colorNunca = 'azul';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR06p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR06p = (isset($sumaR06p)) ? $sumaR06p : 0;
					$por06rSiempre = round(($rSiempre/$sumaR06p)*100,0, PHP_ROUND_HALF_EVEN);
					$por06rCasiSiempre = round(($rCasiSiempre/$sumaR06p)*100,0, PHP_ROUND_HALF_EVEN);
					$por06rAlgunasVeces = round(($rAlgunasVeces/$sumaR06p)*100,0, PHP_ROUND_HALF_EVEN);
					$por06rCasiNunca = round(($rCasiNunca/$sumaR06p)*100,0, PHP_ROUND_HALF_EVEN);
					$por06rNunca = round(($rNunca/$sumaR06p)*100,0, PHP_ROUND_HALF_EVEN);

					$por06rSiempre = (isset($por06rSiempre)) ? $por06rSiempre : 0;
					$por06rCasiSiempre = (isset($por06rCasiSiempre)) ? $por06rCasiSiempre : 0;
					$por06rAlgunasVeces = (isset($por06rAlgunasVeces)) ? $por06rAlgunasVeces : 0;
					$por06rCasiNunca = (isset($por06rCasiNunca)) ? $por06rCasiNunca : 0;
					$por06rNunca = (isset($por06rNunca)) ? $por06rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado rojo">'.$por06rSiempre.'%</td>
						<td class="centrado naranja">'.$por06rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por06rAlgunasVeces.'%</td>
						<td class="centrado verde">'.$por06rCasiNunca.'%</td>
						<td class="centrado azul">'.$por06rNunca.'%</td>
					</tr>
					';
				echo'
				<tr>
					<td>7.-	Por la cantidad de trabajo que tengo debo trabajar sin parar.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p7_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p7_R3a = '4'");
					while ($cR7= $csCSiempre->fetchArray()) {
						$rSiempre=$cR7['rSiempre'];
					}

					$csCMaxR7= $conPorPregunta -> query("SELECT MAX(totalp7) AS valMax FROM(SELECT COUNT(p7_R3a) AS totalp7 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p7_R3a = '4' UNION ALL SELECT COUNT(p7_R3a) AS totalp7 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p7_R3a = '3' UNION ALL SELECT COUNT(p7_R3a) AS totalp7 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p7_R3a = '2' UNION ALL SELECT COUNT(p7_R3a) AS totalp7 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p7_R3a = '1' UNION ALL SELECT COUNT(p7_R3a) AS totalp7 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p7_R3a = '0')");

					while ($cR7Max= $csCMaxR7->fetchArray()) {
						$valMax7=$cR7Max['valMax'];
					}

					if ($valMax7 === $rSiempre) {
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p7_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p7_R3a = '3'");
					while ($cR7= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR7['rCasiSiempre'];
					}

					if ($valMax7 === $rCasiSiempre) {
						$colorCasiSiempre = 'naranja';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p7_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p7_R3a = '2'");
					while ($cR7= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR7['rAlgunasVeces'];
					}

					if ($valMax7 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p7_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p7_R3a = '1'");
					while ($cR7= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR7['rCasiNunca'];
					}

					if ($valMax7 === $rCasiNunca) {
						$colorCasiNunca = 'verde';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p7_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p7_R3a = '0'");
					while ($cR7= $csNunca->fetchArray()) {
						$rNunca=$cR7['rNunca'];
					}

					if ($valMax7 === $rNunca) {
						$colorNunca = 'azul';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR07p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR07p = (isset($sumaR07p)) ? $sumaR07p : 0;
					$por07rSiempre = round(($rSiempre/$sumaR07p)*100,0, PHP_ROUND_HALF_EVEN);
					$por07rCasiSiempre = round(($rCasiSiempre/$sumaR07p)*100,0, PHP_ROUND_HALF_EVEN);
					$por07rAlgunasVeces = round(($rAlgunasVeces/$sumaR07p)*100,0, PHP_ROUND_HALF_EVEN);
					$por07rCasiNunca = round(($rCasiNunca/$sumaR07p)*100,0, PHP_ROUND_HALF_EVEN);
					$por07rNunca = round(($rNunca/$sumaR07p)*100,0, PHP_ROUND_HALF_EVEN);

					$por07rSiempre = (isset($por07rSiempre)) ? $por07rSiempre : 0;
					$por07rCasiSiempre = (isset($por07rCasiSiempre)) ? $por07rCasiSiempre : 0;
					$por07rAlgunasVeces = (isset($por07rAlgunasVeces)) ? $por07rAlgunasVeces : 0;
					$por07rCasiNunca = (isset($por07rCasiNunca)) ? $por07rCasiNunca : 0;
					$por07rNunca = (isset($por07rNunca)) ? $por07rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado rojo">'.$por07rSiempre.'%</td>
						<td class="centrado naranja">'.$por07rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por07rAlgunasVeces.'%</td>
						<td class="centrado verde">'.$por07rCasiNunca.'%</td>
						<td class="centrado azul">'.$por07rNunca.'%</td>
					</tr>
					';
				echo'
				<tr>
					<td>8.-	Considero que es necesario mantener un ritmo de trabajo acelerado.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p8_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p8_R3a = '4'");
					while ($cR8= $csCSiempre->fetchArray()) {
						$rSiempre=$cR8['rSiempre'];
					}

					$csCMaxR8= $conPorPregunta -> query("SELECT MAX(totalp8) AS valMax FROM(SELECT COUNT(p8_R3a) AS totalp8 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p8_R3a = '4' UNION ALL SELECT COUNT(p8_R3a) AS totalp8 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p8_R3a = '3' UNION ALL SELECT COUNT(p8_R3a) AS totalp8 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p8_R3a = '2' UNION ALL SELECT COUNT(p8_R3a) AS totalp8 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p8_R3a = '1' UNION ALL SELECT COUNT(p8_R3a) AS totalp8 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p8_R3a = '0')");

					while ($cR8Max= $csCMaxR8->fetchArray()) {
						$valMax8=$cR8Max['valMax'];
					}

					if ($valMax8 === $rSiempre) {
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p8_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p8_R3a = '3'");
					while ($cR8= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR8['rCasiSiempre'];
					}

					if ($valMax8 === $rCasiSiempre) {
						$colorCasiSiempre = 'naranja';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p8_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p8_R3a = '2'");
					while ($cR8= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR8['rAlgunasVeces'];
					}

					if ($valMax8 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p8_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p8_R3a = '1'");
					while ($cR8= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR8['rCasiNunca'];
					}

					if ($valMax8 === $rCasiNunca) {
						$colorCasiNunca = 'verde';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p8_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p8_R3a = '0'");
					while ($cR8= $csNunca->fetchArray()) {
						$rNunca=$cR8['rNunca'];
					}

					if ($valMax8 === $rNunca) {
						$colorNunca = 'azul';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR08p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR08p = (isset($sumaR08p)) ? $sumaR08p : 0;
					$por08rSiempre = round(($rSiempre/$sumaR08p)*100,0, PHP_ROUND_HALF_EVEN);
					$por08rCasiSiempre = round(($rCasiSiempre/$sumaR08p)*100,0, PHP_ROUND_HALF_EVEN);
					$por08rAlgunasVeces = round(($rAlgunasVeces/$sumaR08p)*100,0, PHP_ROUND_HALF_EVEN);
					$por08rCasiNunca = round(($rCasiNunca/$sumaR08p)*100,0, PHP_ROUND_HALF_EVEN);
					$por08rNunca = round(($rNunca/$sumaR08p)*100,0, PHP_ROUND_HALF_EVEN);

					$por08rSiempre = (isset($por08rSiempre)) ? $por08rSiempre : 0;
					$por08rCasiSiempre = (isset($por08rCasiSiempre)) ? $por08rCasiSiempre : 0;
					$por08rAlgunasVeces = (isset($por08rAlgunasVeces)) ? $por08rAlgunasVeces : 0;
					$por08rCasiNunca = (isset($por08rCasiNunca)) ? $por08rCasiNunca : 0;
					$por08rNunca = (isset($por08rNunca)) ? $por08rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado rojo">'.$por08rSiempre.'%</td>
						<td class="centrado naranja">'.$por08rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por08rAlgunasVeces.'%</td>
						<td class="centrado verde">'.$por08rCasiNunca.'%</td>
						<td class="centrado azul">'.$por08rNunca.'%</td>
					</tr>
					';
				echo'
				<tr>
					<td>9.-	Mi trabajo exige que esté muy concentrado.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p9_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p9_R3a = '4'");
					while ($cR9= $csCSiempre->fetchArray()) {
						$rSiempre=$cR9['rSiempre'];
					}

					$csCMaxR9= $conPorPregunta -> query("SELECT MAX(totalp9) AS valMax FROM(SELECT COUNT(p9_R3a) AS totalp9 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p9_R3a = '4' UNION ALL SELECT COUNT(p9_R3a) AS totalp9 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p9_R3a = '3' UNION ALL SELECT COUNT(p9_R3a) AS totalp9 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p9_R3a = '2' UNION ALL SELECT COUNT(p9_R3a) AS totalp9 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p9_R3a = '1' UNION ALL SELECT COUNT(p9_R3a) AS totalp9 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p9_R3a = '0')");

					while ($cR9Max= $csCMaxR9->fetchArray()) {
						$valMax9=$cR9Max['valMax'];
					}

					if ($valMax9 === $rSiempre) {
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p9_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p9_R3a = '3'");
					while ($cR9= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR9['rCasiSiempre'];
					}

					if ($valMax9 === $rCasiSiempre) {
						$colorCasiSiempre = 'naranja';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p9_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p9_R3a = '2'");
					while ($cR9= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR9['rAlgunasVeces'];
					}

					if ($valMax9 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';
					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p9_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p9_R3a = '1'");
					while ($cR9= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR9['rCasiNunca'];
					}

					if ($valMax9 === $rCasiNunca) {
						$colorCasiNunca = 'verde';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p9_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p9_R3a = '0'");
					while ($cR9= $csNunca->fetchArray()) {
						$rNunca=$cR9['rNunca'];
					}

					if ($valMax9 === $rNunca) {
						$colorNunca = 'azul';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR09p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR09p = (isset($sumaR09p)) ? $sumaR09p : 0;
					$por09rSiempre = round(($rSiempre/$sumaR09p)*100,0, PHP_ROUND_HALF_EVEN);
					$por09rCasiSiempre = round(($rCasiSiempre/$sumaR09p)*100,0, PHP_ROUND_HALF_EVEN);
					$por09rAlgunasVeces = round(($rAlgunasVeces/$sumaR09p)*100,0, PHP_ROUND_HALF_EVEN);
					$por09rCasiNunca = round(($rCasiNunca/$sumaR09p)*100,0, PHP_ROUND_HALF_EVEN);
					$por09rNunca = round(($rNunca/$sumaR09p)*100,0, PHP_ROUND_HALF_EVEN);

					$por09rSiempre = (isset($por09rSiempre)) ? $por09rSiempre : 0;
					$por09rCasiSiempre = (isset($por09rCasiSiempre)) ? $por09rCasiSiempre : 0;
					$por09rAlgunasVeces = (isset($por09rAlgunasVeces)) ? $por09rAlgunasVeces : 0;
					$por09rCasiNunca = (isset($por09rCasiNunca)) ? $por09rCasiNunca : 0;
					$por09rNunca = (isset($por09rNunca)) ? $por09rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado rojo">'.$por09rSiempre.'%</td>
						<td class="centrado naranja">'.$por09rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por09rAlgunasVeces.'%</td>
						<td class="centrado verde">'.$por09rCasiNunca.'%</td>
						<td class="centrado azul">'.$por09rNunca.'%</td>
					</tr>
					';
				echo'
				<tr>
					<td>10.-	Mi trabajo requiere que memorice mucha información.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p10_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p10_R3a = '4'");
					while ($cR10= $csCSiempre->fetchArray()) {
						$rSiempre=$cR10['rSiempre'];
					}

					$csCMaxR10= $conPorPregunta -> query("SELECT MAX(totalp10) AS valMax FROM(SELECT COUNT(p10_R3a) AS totalp10 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p10_R3a = '4' UNION ALL SELECT COUNT(p10_R3a) AS totalp10 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p10_R3a = '3' UNION ALL SELECT COUNT(p10_R3a) AS totalp10 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p10_R3a = '2' UNION ALL SELECT COUNT(p10_R3a) AS totalp10 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p10_R3a = '1' UNION ALL SELECT COUNT(p10_R3a) AS totalp10 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p10_R3a = '0')");

					while ($cR10Max= $csCMaxR10->fetchArray()) {
						$valMax10=$cR10Max['valMax'];
					}

					if ($valMax10 === $rSiempre) {
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p10_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p10_R3a = '3'");
					while ($cR10= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR10['rCasiSiempre'];
					}

					if ($valMax10 === $rCasiSiempre) {
						$colorCasiSiempre = 'naranja';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p10_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p10_R3a = '2'");
					while ($cR10= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR10['rAlgunasVeces'];
					}

					if ($valMax10 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p10_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p10_R3a = '1'");
					while ($cR10= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR10['rCasiNunca'];
					}

					if ($valMax10 === $rCasiNunca) {
						$colorCasiNunca = 'verde';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p10_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p10_R3a = '0'");
					while ($cR10= $csNunca->fetchArray()) {
						$rNunca=$cR10['rNunca'];
					}

					if ($valMax10 === $rNunca) {
						$colorNunca = 'azul';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR10p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR10p = (isset($sumaR10p)) ? $sumaR10p : 0;
					$por10rSiempre = round(($rSiempre/$sumaR10p)*100,0, PHP_ROUND_HALF_EVEN);
					$por10rCasiSiempre = round(($rCasiSiempre/$sumaR10p)*100,0, PHP_ROUND_HALF_EVEN);
					$por10rAlgunasVeces = round(($rAlgunasVeces/$sumaR10p)*100,0, PHP_ROUND_HALF_EVEN);
					$por10rCasiNunca = round(($rCasiNunca/$sumaR10p)*100,0, PHP_ROUND_HALF_EVEN);
					$por10rNunca = round(($rNunca/$sumaR10p)*100,0, PHP_ROUND_HALF_EVEN);

					$por10rSiempre = (isset($por10rSiempre)) ? $por10rSiempre : 0;
					$por10rCasiSiempre = (isset($por10rCasiSiempre)) ? $por10rCasiSiempre : 0;
					$por10rAlgunasVeces = (isset($por10rAlgunasVeces)) ? $por10rAlgunasVeces : 0;
					$por10rCasiNunca = (isset($por10rCasiNunca)) ? $por10rCasiNunca : 0;
					$por10rNunca = (isset($por10rNunca)) ? $por10rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado rojo">'.$por10rSiempre.'%</td>
						<td class="centrado naranja">'.$por10rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por10rAlgunasVeces.'%</td>
						<td class="centrado verde">'.$por10rCasiNunca.'%</td>
						<td class="centrado azul">'.$por10rNunca.'%</td>
					</tr>
					';

				echo'
					<tr>
					<td>11.-	En mi trabajo tengo que tomar decisiones difíciles muy rápido.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p11_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p11_R3a = '4'");
					while ($cR11= $csCSiempre->fetchArray()) {
						$rSiempre=$cR11['rSiempre'];
					}

					$csCMaxR11= $conPorPregunta -> query("SELECT MAX(totalp11) AS valMax FROM(SELECT COUNT(p11_R3a) AS totalp11 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p11_R3a = '4' UNION ALL SELECT COUNT(p11_R3a) AS totalp11 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p11_R3a = '3' UNION ALL SELECT COUNT(p11_R3a) AS totalp11 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p11_R3a = '2' UNION ALL SELECT COUNT(p11_R3a) AS totalp11 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p11_R3a = '1' UNION ALL SELECT COUNT(p11_R3a) AS totalp11 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p11_R3a = '0')");

					while ($cR11Max= $csCMaxR11->fetchArray()) {
						$valMax11=$cR11Max['valMax'];
					}

					if ($valMax11 === $rSiempre) {
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p11_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p11_R3a = '3'");
					while ($cR11= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR11['rCasiSiempre'];
					}

					if ($valMax11 === $rCasiSiempre) {
						$colorCasiSiempre = 'naranja';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p11_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p11_R3a = '2'");
					while ($cR11= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR11['rAlgunasVeces'];
					}

					if ($valMax11 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p11_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p11_R3a = '1'");
					while ($cR11= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR11['rCasiNunca'];
					}

					if ($valMax11 === $rCasiNunca) {
						$colorCasiNunca = 'verde';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p11_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p11_R3a = '0'");
					while ($cR11= $csNunca->fetchArray()) {
						$rNunca=$cR11['rNunca'];
					}

					if ($valMax11 === $rNunca) {
						$colorNunca = 'azul';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR11p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR11p = (isset($sumaR11p)) ? $sumaR11p : 0;
					$por11rSiempre = round(($rSiempre/$sumaR11p)*100,0, PHP_ROUND_HALF_EVEN);
					$por11rCasiSiempre = round(($rCasiSiempre/$sumaR11p)*100,0, PHP_ROUND_HALF_EVEN);
					$por11rAlgunasVeces = round(($rAlgunasVeces/$sumaR11p)*100,0, PHP_ROUND_HALF_EVEN);
					$por11rCasiNunca = round(($rCasiNunca/$sumaR11p)*100,0, PHP_ROUND_HALF_EVEN);
					$por11rNunca = round(($rNunca/$sumaR11p)*100,0, PHP_ROUND_HALF_EVEN);

					$por11rSiempre = (isset($por11rSiempre)) ? $por11rSiempre : 0;
					$por11rCasiSiempre = (isset($por11rCasiSiempre)) ? $por11rCasiSiempre : 0;
					$por11rAlgunasVeces = (isset($por11rAlgunasVeces)) ? $por11rAlgunasVeces : 0;
					$por11rCasiNunca = (isset($por11rCasiNunca)) ? $por11rCasiNunca : 0;
					$por11rNunca = (isset($por11rNunca)) ? $por11rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado rojo">'.$por11rSiempre.'%</td>
						<td class="centrado naranja">'.$por11rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por11rAlgunasVeces.'%</td>
						<td class="centrado verde">'.$por11rCasiNunca.'%</td>
						<td class="centrado azul">'.$por11rNunca.'%</td>
					</tr>
					';
				echo'

					<tr>
					<td>12.-	Mi trabajo exige que atienda varios asuntos al mismo tiempo.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p12_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p12_R3a = '4'");
					while ($cR12= $csCSiempre->fetchArray()) {
						$rSiempre=$cR12['rSiempre'];
					}

					$csCMaxR12= $conPorPregunta -> query("SELECT MAX(totalp12) AS valMax FROM(SELECT COUNT(p12_R3a) AS totalp12 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p12_R3a = '4' UNION ALL SELECT COUNT(p12_R3a) AS totalp12 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p12_R3a = '3' UNION ALL SELECT COUNT(p12_R3a) AS totalp12 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p12_R3a = '2' UNION ALL SELECT COUNT(p12_R3a) AS totalp12 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p12_R3a = '1' UNION ALL SELECT COUNT(p12_R3a) AS totalp12 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p12_R3a = '0')");

					while ($cR12Max= $csCMaxR12->fetchArray()) {
						$valMax12=$cR12Max['valMax'];
					}

					if ($valMax12 === $rSiempre) {
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p12_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p12_R3a = '3'");
					while ($cR12= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR12['rCasiSiempre'];
					}

					if ($valMax12 === $rCasiSiempre) {
						$colorCasiSiempre = 'naranja';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p12_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p12_R3a = '2'");
					while ($cR12= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR12['rAlgunasVeces'];
					}

					if ($valMax12 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p12_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p12_R3a = '1'");
					while ($cR12= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR12['rCasiNunca'];
					}

					if ($valMax12 === $rCasiNunca) {
						$colorCasiNunca = 'verde';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p12_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p12_R3a = '0'");
					while ($cR12= $csNunca->fetchArray()) {
						$rNunca=$cR12['rNunca'];
					}

					if ($valMax12 === $rNunca) {
						$colorNunca = 'azul';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR12p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR12p = (isset($sumaR12p)) ? $sumaR12p : 0;
					$por12rSiempre = round(($rSiempre/$sumaR12p)*100,0, PHP_ROUND_HALF_EVEN);
					$por12rCasiSiempre = round(($rCasiSiempre/$sumaR12p)*100,0, PHP_ROUND_HALF_EVEN);
					$por12rAlgunasVeces = round(($rAlgunasVeces/$sumaR12p)*100,0, PHP_ROUND_HALF_EVEN);
					$por12rCasiNunca = round(($rCasiNunca/$sumaR12p)*100,0, PHP_ROUND_HALF_EVEN);
					$por12rNunca = round(($rNunca/$sumaR12p)*100,0, PHP_ROUND_HALF_EVEN);

					$por12rSiempre = (isset($por12rSiempre)) ? $por12rSiempre : 0;
					$por12rCasiSiempre = (isset($por12rCasiSiempre)) ? $por12rCasiSiempre : 0;
					$por12rAlgunasVeces = (isset($por12rAlgunasVeces)) ? $por12rAlgunasVeces : 0;
					$por12rCasiNunca = (isset($por12rCasiNunca)) ? $por12rCasiNunca : 0;
					$por12rNunca = (isset($por12rNunca)) ? $por12rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado rojo">'.$por12rSiempre.'%</td>
						<td class="centrado naranja">'.$por12rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por12rAlgunasVeces.'%</td>
						<td class="centrado verde">'.$por12rCasiNunca.'%</td>
						<td class="centrado azul">'.$por12rNunca.'%</td>
					</tr>
					';
				echo'

					<tr>
					<td>13.-	En mi trabajo soy responsable de cosas de mucho valor.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p13_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p13_R3a = '4'");
					while ($cR13= $csCSiempre->fetchArray()) {
						$rSiempre=$cR13['rSiempre'];
					}

					$csCMaxR13= $conPorPregunta -> query("SELECT MAX(totalp13) AS valMax FROM(SELECT COUNT(p13_R3a) AS totalp13 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p13_R3a = '4' UNION ALL SELECT COUNT(p13_R3a) AS totalp13 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p13_R3a = '3' UNION ALL SELECT COUNT(p13_R3a) AS totalp13 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p13_R3a = '2' UNION ALL SELECT COUNT(p13_R3a) AS totalp13 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p13_R3a = '1' UNION ALL SELECT COUNT(p13_R3a) AS totalp13 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p13_R3a = '0')");

					while ($cR13Max= $csCMaxR13->fetchArray()) {
						$valMax13=$cR13Max['valMax'];
					}

					if ($valMax13 === $rSiempre) {
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p13_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p13_R3a = '3'");
					while ($cR13= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR13['rCasiSiempre'];
					}

					if ($valMax13 === $rCasiSiempre) {
						$colorCasiSiempre = 'naranja';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p13_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p13_R3a = '2'");
					while ($cR13= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR13['rAlgunasVeces'];
					}

					if ($valMax13 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p13_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p13_R3a = '1'");
					while ($cR13= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR13['rCasiNunca'];
					}

					if ($valMax13 === $rCasiNunca) {
						$colorCasiNunca = 'verde';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p13_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p13_R3a = '0'");
					while ($cR13= $csNunca->fetchArray()) {
						$rNunca=$cR13['rNunca'];
					}

					if ($valMax13 === $rNunca) {
						$colorNunca = 'azul';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR13p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR13p = (isset($sumaR13p)) ? $sumaR13p : 0;
					$por13rSiempre = round(($rSiempre/$sumaR13p)*100,0, PHP_ROUND_HALF_EVEN);
					$por13rCasiSiempre = round(($rCasiSiempre/$sumaR13p)*100,0, PHP_ROUND_HALF_EVEN);
					$por13rAlgunasVeces = round(($rAlgunasVeces/$sumaR13p)*100,0, PHP_ROUND_HALF_EVEN);
					$por13rCasiNunca = round(($rCasiNunca/$sumaR13p)*100,0, PHP_ROUND_HALF_EVEN);
					$por13rNunca = round(($rNunca/$sumaR13p)*100,0, PHP_ROUND_HALF_EVEN);

					$por13rSiempre = (isset($por13rSiempre)) ? $por13rSiempre : 0;
					$por13rCasiSiempre = (isset($por13rCasiSiempre)) ? $por13rCasiSiempre : 0;
					$por13rAlgunasVeces = (isset($por13rAlgunasVeces)) ? $por13rAlgunasVeces : 0;
					$por13rCasiNunca = (isset($por13rCasiNunca)) ? $por13rCasiNunca : 0;
					$por13rNunca = (isset($por13rNunca)) ? $por13rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado rojo">'.$por13rSiempre.'%</td>
						<td class="centrado naranja">'.$por13rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por13rAlgunasVeces.'%</td>
						<td class="centrado verde">'.$por13rCasiNunca.'%</td>
						<td class="centrado azul">'.$por13rNunca.'%</td>
					</tr>
					';
				echo'

					<tr>
					<td>14.-	Respondo ante mi jefe por los resultados de toda mi área de trabajo.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p14_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p14_R3a = '4'");
					while ($cR14= $csCSiempre->fetchArray()) {
						$rSiempre=$cR14['rSiempre'];
					}

					$csCMaxR14= $conPorPregunta -> query("SELECT MAX(totalp14) AS valMax FROM(SELECT COUNT(p14_R3a) AS totalp14 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p14_R3a = '4' UNION ALL SELECT COUNT(p14_R3a) AS totalp14 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p14_R3a = '3' UNION ALL SELECT COUNT(p14_R3a) AS totalp14 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p14_R3a = '2' UNION ALL SELECT COUNT(p14_R3a) AS totalp14 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p14_R3a = '1' UNION ALL SELECT COUNT(p14_R3a) AS totalp14 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p14_R3a = '0')");

					while ($cR14Max= $csCMaxR14->fetchArray()) {
						$valMax14=$cR14Max['valMax'];
					}

					if ($valMax14 === $rSiempre) {
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p14_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p14_R3a = '3'");
					while ($cR14= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR14['rCasiSiempre'];
					}

					if ($valMax14 === $rCasiSiempre) {
						$colorCasiSiempre = 'naranja';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p14_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p14_R3a = '2'");
					while ($cR14= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR14['rAlgunasVeces'];
					}

					if ($valMax14 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p14_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p14_R3a = '1'");
					while ($cR14= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR14['rCasiNunca'];
					}

					if ($valMax14 === $rCasiNunca) {
						$colorCasiNunca = 'verde';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p14_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p14_R3a = '0'");
					while ($cR14= $csNunca->fetchArray()) {
						$rNunca=$cR14['rNunca'];
					}

					if ($valMax14 === $rNunca) {
						$colorNunca = 'azul';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR14p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR14p = (isset($sumaR14p)) ? $sumaR14p : 0;
					$por14rSiempre = round(($rSiempre/$sumaR14p)*100,0, PHP_ROUND_HALF_EVEN);
					$por14rCasiSiempre = round(($rCasiSiempre/$sumaR14p)*100,0, PHP_ROUND_HALF_EVEN);
					$por14rAlgunasVeces = round(($rAlgunasVeces/$sumaR14p)*100,0, PHP_ROUND_HALF_EVEN);
					$por14rCasiNunca = round(($rCasiNunca/$sumaR14p)*100,0, PHP_ROUND_HALF_EVEN);
					$por14rNunca = round(($rNunca/$sumaR14p)*100,0, PHP_ROUND_HALF_EVEN);

					$por14rSiempre = (isset($por14rSiempre)) ? $por14rSiempre : 0;
					$por14rCasiSiempre = (isset($por14rCasiSiempre)) ? $por14rCasiSiempre : 0;
					$por14rAlgunasVeces = (isset($por14rAlgunasVeces)) ? $por14rAlgunasVeces : 0;
					$por14rCasiNunca = (isset($por14rCasiNunca)) ? $por14rCasiNunca : 0;
					$por14rNunca = (isset($por14rNunca)) ? $por14rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado rojo">'.$por14rSiempre.'%</td>
						<td class="centrado naranja">'.$por14rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por14rAlgunasVeces.'%</td>
						<td class="centrado verde">'.$por14rCasiNunca.'%</td>
						<td class="centrado azul">'.$por14rNunca.'%</td>
					</tr>
					';
				echo'

					<tr>
					<td>15.-	En el trabajo me dan órdenes contradictorias.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p15_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p15_R3a = '4'");
					while ($cR15= $csCSiempre->fetchArray()) {
						$rSiempre=$cR15['rSiempre'];
					}

					$csCMaxR15= $conPorPregunta -> query("SELECT MAX(totalp15) AS valMax FROM(SELECT COUNT(p15_R3a) AS totalp15 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p15_R3a = '4' UNION ALL SELECT COUNT(p15_R3a) AS totalp15 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p15_R3a = '3' UNION ALL SELECT COUNT(p15_R3a) AS totalp15 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p15_R3a = '2' UNION ALL SELECT COUNT(p15_R3a) AS totalp15 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p15_R3a = '1' UNION ALL SELECT COUNT(p15_R3a) AS totalp15 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p15_R3a = '0')");

					while ($cR15Max= $csCMaxR15->fetchArray()) {
						$valMax15=$cR15Max['valMax'];
					}

					if ($valMax15 === $rSiempre) {
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p15_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p15_R3a = '3'");
					while ($cR15= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR15['rCasiSiempre'];
					}

					if ($valMax15 === $rCasiSiempre) {
						$colorCasiSiempre = 'naranja';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p15_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p15_R3a = '2'");
					while ($cR15= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR15['rAlgunasVeces'];
					}

					if ($valMax15 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p15_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p15_R3a = '1'");
					while ($cR15= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR15['rCasiNunca'];
					}

					if ($valMax15 === $rCasiNunca) {
						$colorCasiNunca = 'verde';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p15_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p15_R3a = '0'");
					while ($cR15= $csNunca->fetchArray()) {
						$rNunca=$cR15['rNunca'];
					}

					if ($valMax15 === $rNunca) {
						$colorNunca = 'azul';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR15p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR15p = (isset($sumaR15p)) ? $sumaR15p : 0;
					$por15rSiempre = round(($rSiempre/$sumaR15p)*100,0, PHP_ROUND_HALF_EVEN);
					$por15rCasiSiempre = round(($rCasiSiempre/$sumaR15p)*100,0, PHP_ROUND_HALF_EVEN);
					$por15rAlgunasVeces = round(($rAlgunasVeces/$sumaR15p)*100,0, PHP_ROUND_HALF_EVEN);
					$por15rCasiNunca = round(($rCasiNunca/$sumaR15p)*100,0, PHP_ROUND_HALF_EVEN);
					$por15rNunca = round(($rNunca/$sumaR15p)*100,0, PHP_ROUND_HALF_EVEN);

					$por15rSiempre = (isset($por15rSiempre)) ? $por15rSiempre : 0;
					$por15rCasiSiempre = (isset($por15rCasiSiempre)) ? $por15rCasiSiempre : 0;
					$por15rAlgunasVeces = (isset($por15rAlgunasVeces)) ? $por15rAlgunasVeces : 0;
					$por15rCasiNunca = (isset($por15rCasiNunca)) ? $por15rCasiNunca : 0;
					$por15rNunca = (isset($por15rNunca)) ? $por15rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado rojo">'.$por15rSiempre.'%</td>
						<td class="centrado naranja">'.$por15rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por15rAlgunasVeces.'%</td>
						<td class="centrado verde">'.$por15rCasiNunca.'%</td>
						<td class="centrado azul">'.$por15rNunca.'%</td>
					</tr>
					';
				echo'

					<tr>
					<td>16.-	Considero que en mi trabajo me piden hacer cosas innecesarias.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p16_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p16_R3a = '4'");
					while ($cR16= $csCSiempre->fetchArray()) {
						$rSiempre=$cR16['rSiempre'];
					}

					$csCMaxR16= $conPorPregunta -> query("SELECT MAX(totalp16) AS valMax FROM(SELECT COUNT(p16_R3a) AS totalp16 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p16_R3a = '4' UNION ALL SELECT COUNT(p16_R3a) AS totalp16 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p16_R3a = '3' UNION ALL SELECT COUNT(p16_R3a) AS totalp16 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p16_R3a = '2' UNION ALL SELECT COUNT(p16_R3a) AS totalp16 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p16_R3a = '1' UNION ALL SELECT COUNT(p16_R3a) AS totalp16 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p16_R3a = '0')");

					while ($cR16Max= $csCMaxR16->fetchArray()) {
						$valMax16=$cR16Max['valMax'];
					}

					if ($valMax16 === $rSiempre) {
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p16_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p16_R3a = '3'");
					while ($cR16= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR16['rCasiSiempre'];
					}

					if ($valMax16 === $rCasiSiempre) {
						$colorCasiSiempre = 'naranja';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p16_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p16_R3a = '2'");
					while ($cR16= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR16['rAlgunasVeces'];
					}

					if ($valMax16 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p16_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p16_R3a = '1'");
					while ($cR16= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR16['rCasiNunca'];
					}

					if ($valMax16 === $rCasiNunca) {
						$colorCasiNunca = 'verde';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p16_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p16_R3a = '0'");
					while ($cR16= $csNunca->fetchArray()) {
						$rNunca=$cR16['rNunca'];
					}

					if ($valMax16 === $rNunca) {
						$colorNunca = 'azul';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR16p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR16p = (isset($sumaR16p)) ? $sumaR16p : 0;
					$por16rSiempre = round(($rSiempre/$sumaR16p)*100,0, PHP_ROUND_HALF_EVEN);
					$por16rCasiSiempre = round(($rCasiSiempre/$sumaR16p)*100,0, PHP_ROUND_HALF_EVEN);
					$por16rAlgunasVeces = round(($rAlgunasVeces/$sumaR16p)*100,0, PHP_ROUND_HALF_EVEN);
					$por16rCasiNunca = round(($rCasiNunca/$sumaR16p)*100,0, PHP_ROUND_HALF_EVEN);
					$por16rNunca = round(($rNunca/$sumaR16p)*100,0, PHP_ROUND_HALF_EVEN);

					$por16rSiempre = (isset($por16rSiempre)) ? $por16rSiempre : 0;
					$por16rCasiSiempre = (isset($por16rCasiSiempre)) ? $por16rCasiSiempre : 0;
					$por16rAlgunasVeces = (isset($por16rAlgunasVeces)) ? $por16rAlgunasVeces : 0;
					$por16rCasiNunca = (isset($por16rCasiNunca)) ? $por16rCasiNunca : 0;
					$por16rNunca = (isset($por16rNunca)) ? $por16rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado rojo">'.$por16rSiempre.'%</td>
						<td class="centrado naranja">'.$por16rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por16rAlgunasVeces.'%</td>
						<td class="centrado verde">'.$por16rCasiNunca.'%</td>
						<td class="centrado azul">'.$por16rNunca.'%</td>
					</tr>
					';
				echo'

					<tr>
					<td>23.-	Mi trabajo permite que desarrolle nuevas habilidades.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p23_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p23_R3a = '0'");
					while ($cR23= $csCSiempre->fetchArray()) {
						$rSiempre=$cR23['rSiempre'];
					}

					$csCMaxR23= $conPorPregunta -> query("SELECT MAX(totalp23) AS valMax FROM(SELECT COUNT(p23_R3a) AS totalp23 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p23_R3a = '4' UNION ALL SELECT COUNT(p23_R3a) AS totalp23 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p23_R3a = '3' UNION ALL SELECT COUNT(p23_R3a) AS totalp23 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p23_R3a = '2' UNION ALL SELECT COUNT(p23_R3a) AS totalp23 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p23_R3a = '1' UNION ALL SELECT COUNT(p23_R3a) AS totalp23 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p23_R3a = '0')");

					while ($cR23Max= $csCMaxR23->fetchArray()) {
						$valMax23=$cR23Max['valMax'];
					}

					if ($valMax23 === $rSiempre) {
						$colorSiempre = 'azul';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p23_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p23_R3a = '1'");
					while ($cR23= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR23['rCasiSiempre'];
					}

					if ($valMax23 === $rCasiSiempre) {
						$colorCasiSiempre = 'verde';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p23_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p23_R3a = '2'");
					while ($cR23= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR23['rAlgunasVeces'];
					}

					if ($valMax23 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p23_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p23_R3a = '3'");
					while ($cR23= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR23['rCasiNunca'];
					}

					if ($valMax23 === $rCasiNunca) {
						$colorCasiNunca = 'naranja';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p23_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p23_R3a = '4'");
					while ($cR23= $csNunca->fetchArray()) {
						$rNunca=$cR23['rNunca'];
					}

					if ($valMax23 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR23p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR23p = (isset($sumaR23p)) ? $sumaR23p : 0;
					$por23rSiempre = round(($rSiempre/$sumaR23p)*100,0, PHP_ROUND_HALF_EVEN);
					$por23rCasiSiempre = round(($rCasiSiempre/$sumaR23p)*100,0, PHP_ROUND_HALF_EVEN);
					$por23rAlgunasVeces = round(($rAlgunasVeces/$sumaR23p)*100,0, PHP_ROUND_HALF_EVEN);
					$por23rCasiNunca = round(($rCasiNunca/$sumaR23p)*100,0, PHP_ROUND_HALF_EVEN);
					$por23rNunca = round(($rNunca/$sumaR23p)*100,0, PHP_ROUND_HALF_EVEN);

					$por23rSiempre = (isset($por23rSiempre)) ? $por23rSiempre : 0;
					$por23rCasiSiempre = (isset($por23rCasiSiempre)) ? $por23rCasiSiempre : 0;
					$por23rAlgunasVeces = (isset($por23rAlgunasVeces)) ? $por23rAlgunasVeces : 0;
					$por23rCasiNunca = (isset($por23rCasiNunca)) ? $por23rCasiNunca : 0;
					$por23rNunca = (isset($por23rNunca)) ? $por23rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado azul">'.$por23rSiempre.'%</td>
						<td class="centrado verde">'.$por23rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por23rAlgunasVeces.'%</td>
						<td class="centrado naranja">'.$por23rCasiNunca.'%</td>
						<td class="centrado rojo">'.$por23rNunca.'%</td>
					</tr>
					';
				echo'

					<tr>
					<td>24.-	En mi trabajo puedo aspirar a un mejor puesto.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p24_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p24_R3a = '0'");
					while ($cR24= $csCSiempre->fetchArray()) {
						$rSiempre=$cR24['rSiempre'];
					}

					$csCMaxR24= $conPorPregunta -> query("SELECT MAX(totalp24) AS valMax FROM(SELECT COUNT(p24_R3a) AS totalp24 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p24_R3a = '4' UNION ALL SELECT COUNT(p24_R3a) AS totalp24 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p24_R3a = '3' UNION ALL SELECT COUNT(p24_R3a) AS totalp24 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p24_R3a = '2' UNION ALL SELECT COUNT(p24_R3a) AS totalp24 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p24_R3a = '1' UNION ALL SELECT COUNT(p24_R3a) AS totalp24 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p24_R3a = '0')");

					while ($cR24Max= $csCMaxR24->fetchArray()) {
						$valMax24=$cR24Max['valMax'];
					}

					if ($valMax24 === $rSiempre) {
						$colorSiempre = 'azul';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p24_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p24_R3a = '1'");
					while ($cR24= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR24['rCasiSiempre'];
					}

					if ($valMax24 === $rCasiSiempre) {
						$colorCasiSiempre = 'verde';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p24_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p24_R3a = '2'");
					while ($cR24= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR24['rAlgunasVeces'];
					}

					if ($valMax24 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p24_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p24_R3a = '3'");
					while ($cR24= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR24['rCasiNunca'];
					}

					if ($valMax24 === $rCasiNunca) {
						$colorCasiNunca = 'naranja';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p24_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p24_R3a = '4'");
					while ($cR24= $csNunca->fetchArray()) {
						$rNunca=$cR24['rNunca'];
					}

					if ($valMax24 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR24p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR24p = (isset($sumaR24p)) ? $sumaR24p : 0;
					$por24rSiempre = round(($rSiempre/$sumaR24p)*100,0, PHP_ROUND_HALF_EVEN);
					$por24rCasiSiempre = round(($rCasiSiempre/$sumaR24p)*100,0, PHP_ROUND_HALF_EVEN);
					$por24rAlgunasVeces = round(($rAlgunasVeces/$sumaR24p)*100,0, PHP_ROUND_HALF_EVEN);
					$por24rCasiNunca = round(($rCasiNunca/$sumaR24p)*100,0, PHP_ROUND_HALF_EVEN);
					$por24rNunca = round(($rNunca/$sumaR24p)*100,0, PHP_ROUND_HALF_EVEN);

					$por24rSiempre = (isset($por24rSiempre)) ? $por24rSiempre : 0;
					$por24rCasiSiempre = (isset($por24rCasiSiempre)) ? $por24rCasiSiempre : 0;
					$por24rAlgunasVeces = (isset($por24rAlgunasVeces)) ? $por24rAlgunasVeces : 0;
					$por24rCasiNunca = (isset($por24rCasiNunca)) ? $por24rCasiNunca : 0;
					$por24rNunca = (isset($por24rNunca)) ? $por24rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado azul">'.$por24rSiempre.'%</td>
						<td class="centrado verde">'.$por24rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por24rAlgunasVeces.'%</td>
						<td class="centrado naranja">'.$por24rCasiNunca.'%</td>
						<td class="centrado rojo">'.$por24rNunca.'%</td>
					</tr>
					';
				echo'

					<tr>
					<td>25.-	Durante mi jornada de trabajo puedo tomar pausas cuando las necesito.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p25_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p25_R3a = '0'");
					while ($cR25= $csCSiempre->fetchArray()) {
						$rSiempre=$cR25['rSiempre'];
					}

					$csCMaxR25= $conPorPregunta -> query("SELECT MAX(totalp25) AS valMax FROM(SELECT COUNT(p25_R3a) AS totalp25 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p25_R3a = '4' UNION ALL SELECT COUNT(p25_R3a) AS totalp25 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p25_R3a = '3' UNION ALL SELECT COUNT(p25_R3a) AS totalp25 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p25_R3a = '2' UNION ALL SELECT COUNT(p25_R3a) AS totalp25 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p25_R3a = '1' UNION ALL SELECT COUNT(p25_R3a) AS totalp25 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p25_R3a = '0')");

					while ($cR25Max= $csCMaxR25->fetchArray()) {
						$valMax25=$cR25Max['valMax'];
					}

					if ($valMax25 === $rSiempre) {
						$colorSiempre = 'azul';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p25_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p25_R3a = '1'");
					while ($cR25= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR25['rCasiSiempre'];
					}

					if ($valMax25 === $rCasiSiempre) {
						$colorCasiSiempre = 'verde';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p25_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p25_R3a = '2'");
					while ($cR25= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR25['rAlgunasVeces'];
					}

					if ($valMax25 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p25_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p25_R3a = '3'");
					while ($cR25= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR25['rCasiNunca'];
					}

					if ($valMax25 === $rCasiNunca) {
						$colorCasiNunca = 'naranja';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p25_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p25_R3a = '4'");
					while ($cR25= $csNunca->fetchArray()) {
						$rNunca=$cR25['rNunca'];
					}

					if ($valMax25 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR25p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR25p = (isset($sumaR25p)) ? $sumaR25p : 0;
					$por25rSiempre = round(($rSiempre/$sumaR25p)*100,0, PHP_ROUND_HALF_EVEN);
					$por25rCasiSiempre = round(($rCasiSiempre/$sumaR25p)*100,0, PHP_ROUND_HALF_EVEN);
					$por25rAlgunasVeces = round(($rAlgunasVeces/$sumaR25p)*100,0, PHP_ROUND_HALF_EVEN);
					$por25rCasiNunca = round(($rCasiNunca/$sumaR25p)*100,0, PHP_ROUND_HALF_EVEN);
					$por25rNunca = round(($rNunca/$sumaR25p)*100,0, PHP_ROUND_HALF_EVEN);

					$por25rSiempre = (isset($por25rSiempre)) ? $por25rSiempre : 0;
					$por25rCasiSiempre = (isset($por25rCasiSiempre)) ? $por25rCasiSiempre : 0;
					$por25rAlgunasVeces = (isset($por25rAlgunasVeces)) ? $por25rAlgunasVeces : 0;
					$por25rCasiNunca = (isset($por25rCasiNunca)) ? $por25rCasiNunca : 0;
					$por25rNunca = (isset($por25rNunca)) ? $por25rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado azul">'.$por25rSiempre.'%</td>
						<td class="centrado verde">'.$por25rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por25rAlgunasVeces.'%</td>
						<td class="centrado naranja">'.$por25rCasiNunca.'%</td>
						<td class="centrado rojo">'.$por25rNunca.'%</td>
					</tr>
					';
				echo'

					<tr>
					<td>26.-	Puedo decidir cuánto trabajo realizo durante la jornada laboral.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p26_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p26_R3a = '0'");
					while ($cR26= $csCSiempre->fetchArray()) {
						$rSiempre=$cR26['rSiempre'];
					}

					$csCMaxR26= $conPorPregunta -> query("SELECT MAX(totalp26) AS valMax FROM(SELECT COUNT(p26_R3a) AS totalp26 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p26_R3a = '4' UNION ALL SELECT COUNT(p26_R3a) AS totalp26 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p26_R3a = '3' UNION ALL SELECT COUNT(p26_R3a) AS totalp26 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p26_R3a = '2' UNION ALL SELECT COUNT(p26_R3a) AS totalp26 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p26_R3a = '1' UNION ALL SELECT COUNT(p26_R3a) AS totalp26 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p26_R3a = '0')");

					while ($cR26Max= $csCMaxR26->fetchArray()) {
						$valMax26=$cR26Max['valMax'];
					}

					if ($valMax26 === $rSiempre) {
						$colorSiempre = 'azul';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p26_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p26_R3a = '1'");
					while ($cR26= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR26['rCasiSiempre'];
					}

					if ($valMax26 === $rCasiSiempre) {
						$colorCasiSiempre = 'verde';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p26_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p26_R3a = '2'");
					while ($cR26= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR26['rAlgunasVeces'];
					}

					if ($valMax26 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p26_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p26_R3a = '3'");
					while ($cR26= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR26['rCasiNunca'];
					}

					if ($valMax26 === $rCasiNunca) {
						$colorCasiNunca = 'naranja';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p26_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p26_R3a = '4'");
					while ($cR26= $csNunca->fetchArray()) {
						$rNunca=$cR26['rNunca'];
					}

					if ($valMax26 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR26p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR26p = (isset($sumaR26p)) ? $sumaR26p : 0;
					$por26rSiempre = round(($rSiempre/$sumaR26p)*100,0, PHP_ROUND_HALF_EVEN);
					$por26rCasiSiempre = round(($rCasiSiempre/$sumaR26p)*100,0, PHP_ROUND_HALF_EVEN);
					$por26rAlgunasVeces = round(($rAlgunasVeces/$sumaR26p)*100,0, PHP_ROUND_HALF_EVEN);
					$por26rCasiNunca = round(($rCasiNunca/$sumaR26p)*100,0, PHP_ROUND_HALF_EVEN);
					$por26rNunca = round(($rNunca/$sumaR26p)*100,0, PHP_ROUND_HALF_EVEN);

					$por26rSiempre = (isset($por26rSiempre)) ? $por26rSiempre : 0;
					$por26rCasiSiempre = (isset($por26rCasiSiempre)) ? $por26rCasiSiempre : 0;
					$por26rAlgunasVeces = (isset($por26rAlgunasVeces)) ? $por26rAlgunasVeces : 0;
					$por26rCasiNunca = (isset($por26rCasiNunca)) ? $por26rCasiNunca : 0;
					$por26rNunca = (isset($por26rNunca)) ? $por26rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado azul">'.$por26rSiempre.'%</td>
						<td class="centrado verde">'.$por26rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por26rAlgunasVeces.'%</td>
						<td class="centrado naranja">'.$por26rCasiNunca.'%</td>
						<td class="centrado rojo">'.$por26rNunca.'%</td>
					</tr>
					';
				echo'

					<tr>
					<td>27.-	Puedo decidir la velocidad a la que realizo mis actividades en mi trabajo.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p27_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p27_R3a = '0'");
					while ($cR27= $csCSiempre->fetchArray()) {
						$rSiempre=$cR27['rSiempre'];
					}

					$csCMaxR27= $conPorPregunta -> query("SELECT MAX(totalp27) AS valMax FROM(SELECT COUNT(p27_R3a) AS totalp27 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p27_R3a = '4' UNION ALL SELECT COUNT(p27_R3a) AS totalp27 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p27_R3a = '3' UNION ALL SELECT COUNT(p27_R3a) AS totalp27 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p27_R3a = '2' UNION ALL SELECT COUNT(p27_R3a) AS totalp27 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p27_R3a = '1' UNION ALL SELECT COUNT(p27_R3a) AS totalp27 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p27_R3a = '0')");

					while ($cR27Max= $csCMaxR27->fetchArray()) {
						$valMax27=$cR27Max['valMax'];
					}

					if ($valMax27 === $rSiempre) {
						$colorSiempre = 'azul';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p27_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p27_R3a = '1'");
					while ($cR27= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR27['rCasiSiempre'];
					}

					if ($valMax27 === $rCasiSiempre) {
						$colorCasiSiempre = 'verde';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p27_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p27_R3a = '2'");
					while ($cR27= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR27['rAlgunasVeces'];
					}

					if ($valMax27 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p27_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p27_R3a = '3'");
					while ($cR27= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR27['rCasiNunca'];
					}

					if ($valMax27 === $rCasiNunca) {
						$colorCasiNunca = 'naranja';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p27_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p27_R3a = '4'");
					while ($cR27= $csNunca->fetchArray()) {
						$rNunca=$cR27['rNunca'];
					}

					if ($valMax27 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR27p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR27p = (isset($sumaR27p)) ? $sumaR27p : 0;
					$por27rSiempre = round(($rSiempre/$sumaR27p)*100,0, PHP_ROUND_HALF_EVEN);
					$por27rCasiSiempre = round(($rCasiSiempre/$sumaR27p)*100,0, PHP_ROUND_HALF_EVEN);
					$por27rAlgunasVeces = round(($rAlgunasVeces/$sumaR27p)*100,0, PHP_ROUND_HALF_EVEN);
					$por27rCasiNunca = round(($rCasiNunca/$sumaR27p)*100,0, PHP_ROUND_HALF_EVEN);
					$por27rNunca = round(($rNunca/$sumaR27p)*100,0, PHP_ROUND_HALF_EVEN);

					$por27rSiempre = (isset($por27rSiempre)) ? $por27rSiempre : 0;
					$por27rCasiSiempre = (isset($por27rCasiSiempre)) ? $por27rCasiSiempre : 0;
					$por27rAlgunasVeces = (isset($por27rAlgunasVeces)) ? $por27rAlgunasVeces : 0;
					$por27rCasiNunca = (isset($por27rCasiNunca)) ? $por27rCasiNunca : 0;
					$por27rNunca = (isset($por27rNunca)) ? $por27rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado azul">'.$por27rSiempre.'%</td>
						<td class="centrado verde">'.$por27rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por27rAlgunasVeces.'%</td>
						<td class="centrado naranja">'.$por27rCasiNunca.'%</td>
						<td class="centrado rojo">'.$por27rNunca.'%</td>
					</tr>
					';
				echo'


					<tr>
					<td>28.-	Puedo cambiar el orden de las actividades que realizo en mi trabajo</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p28_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p28_R3a = '0'");
					while ($cR28= $csCSiempre->fetchArray()) {
						$rSiempre=$cR28['rSiempre'];
					}

					$csCMaxR28= $conPorPregunta -> query("SELECT MAX(totalp28) AS valMax FROM(SELECT COUNT(p28_R3a) AS totalp28 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p28_R3a = '4' UNION ALL SELECT COUNT(p28_R3a) AS totalp28 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p28_R3a = '3' UNION ALL SELECT COUNT(p28_R3a) AS totalp28 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p28_R3a = '2' UNION ALL SELECT COUNT(p28_R3a) AS totalp28 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p28_R3a = '1' UNION ALL SELECT COUNT(p28_R3a) AS totalp28 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p28_R3a = '0')");

					while ($cR28Max= $csCMaxR28->fetchArray()) {
						$valMax28=$cR28Max['valMax'];
					}

					if ($valMax28 === $rSiempre) {
						$colorSiempre = 'azul';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p28_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p28_R3a = '1'");
					while ($cR28= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR28['rCasiSiempre'];
					}

					if ($valMax28 === $rCasiSiempre) {
						$colorCasiSiempre = 'verde';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p28_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p28_R3a = '2'");
					while ($cR28= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR28['rAlgunasVeces'];
					}

					if ($valMax28 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p28_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p28_R3a = '3'");
					while ($cR28= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR28['rCasiNunca'];
					}

					if ($valMax28 === $rCasiNunca) {
						$colorCasiNunca = 'naranja';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p28_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p28_R3a = '4'");
					while ($cR28= $csNunca->fetchArray()) {
						$rNunca=$cR28['rNunca'];
					}

					if ($valMax28 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR28p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR28p = (isset($sumaR28p)) ? $sumaR28p : 0;
					$por28rSiempre = round(($rSiempre/$sumaR28p)*100,0, PHP_ROUND_HALF_EVEN);
					$por28rCasiSiempre = round(($rCasiSiempre/$sumaR28p)*100,0, PHP_ROUND_HALF_EVEN);
					$por28rAlgunasVeces = round(($rAlgunasVeces/$sumaR28p)*100,0, PHP_ROUND_HALF_EVEN);
					$por28rCasiNunca = round(($rCasiNunca/$sumaR28p)*100,0, PHP_ROUND_HALF_EVEN);
					$por28rNunca = round(($rNunca/$sumaR28p)*100,0, PHP_ROUND_HALF_EVEN);

					$por28rSiempre = (isset($por28rSiempre)) ? $por28rSiempre : 0;
					$por28rCasiSiempre = (isset($por28rCasiSiempre)) ? $por28rCasiSiempre : 0;
					$por28rAlgunasVeces = (isset($por28rAlgunasVeces)) ? $por28rAlgunasVeces : 0;
					$por28rCasiNunca = (isset($por28rCasiNunca)) ? $por28rCasiNunca : 0;
					$por28rNunca = (isset($por28rNunca)) ? $por28rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado azul">'.$por28rSiempre.'%</td>
						<td class="centrado verde">'.$por28rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por28rAlgunasVeces.'%</td>
						<td class="centrado naranja">'.$por28rCasiNunca.'%</td>
						<td class="centrado rojo">'.$por28rNunca.'%</td>
					</tr>
					';
				echo'

					<tr>
					<td>29.-	Los cambios que se presentan en mi trabajo dificultan mi labor.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p29_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p29_R3a = '4'");
					while ($cR29= $csCSiempre->fetchArray()) {
						$rSiempre=$cR29['rSiempre'];
					}

					$csCMaxR29= $conPorPregunta -> query("SELECT MAX(totalp29) AS valMax FROM(SELECT COUNT(p29_R3a) AS totalp29 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p29_R3a = '4' UNION ALL SELECT COUNT(p29_R3a) AS totalp29 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p29_R3a = '3' UNION ALL SELECT COUNT(p29_R3a) AS totalp29 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p29_R3a = '2' UNION ALL SELECT COUNT(p29_R3a) AS totalp29 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p29_R3a = '1' UNION ALL SELECT COUNT(p29_R3a) AS totalp29 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p29_R3a = '0')");

					while ($cR29Max= $csCMaxR29->fetchArray()) {
						$valMax29=$cR29Max['valMax'];
					}

					if ($valMax29 === $rSiempre) {
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p29_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p29_R3a = '3'");
					while ($cR29= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR29['rCasiSiempre'];
					}

					if ($valMax29 === $rCasiSiempre) {
						$colorCasiSiempre = 'naranja';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p29_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p29_R3a = '2'");
					while ($cR29= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR29['rAlgunasVeces'];
					}

					if ($valMax29 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p29_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p29_R3a = '1'");
					while ($cR29= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR29['rCasiNunca'];
					}

					if ($valMax29 === $rCasiNunca) {
						$colorCasiNunca = 'verde';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p29_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p29_R3a = '0'");
					while ($cR29= $csNunca->fetchArray()) {
						$rNunca=$cR29['rNunca'];
					}

					if ($valMax29 === $rNunca) {
						$colorNunca = 'azul';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR29p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR29p = (isset($sumaR29p)) ? $sumaR29p : 0;
					$por29rSiempre = round(($rSiempre/$sumaR29p)*100,0, PHP_ROUND_HALF_EVEN);
					$por29rCasiSiempre = round(($rCasiSiempre/$sumaR29p)*100,0, PHP_ROUND_HALF_EVEN);
					$por29rAlgunasVeces = round(($rAlgunasVeces/$sumaR29p)*100,0, PHP_ROUND_HALF_EVEN);
					$por29rCasiNunca = round(($rCasiNunca/$sumaR29p)*100,0, PHP_ROUND_HALF_EVEN);
					$por29rNunca = round(($rNunca/$sumaR29p)*100,0, PHP_ROUND_HALF_EVEN);

					$por29rSiempre = (isset($por29rSiempre)) ? $por29rSiempre : 0;
					$por29rCasiSiempre = (isset($por29rCasiSiempre)) ? $por29rCasiSiempre : 0;
					$por29rAlgunasVeces = (isset($por29rAlgunasVeces)) ? $por29rAlgunasVeces : 0;
					$por29rCasiNunca = (isset($por29rCasiNunca)) ? $por29rCasiNunca : 0;
					$por29rNunca = (isset($por29rNunca)) ? $por29rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado rojo">'.$por29rSiempre.'%</td>
						<td class="centrado naranja">'.$por29rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por29rAlgunasVeces.'%</td>
						<td class="centrado verde">'.$por29rCasiNunca.'%</td>
						<td class="centrado azul">'.$por29rNunca.'%</td>
					</tr>
					';
				echo'

					<tr>
					<td>30.-	Cuando se presentan cambios en mi trabajo se tienen en cuenta mis ideas o aportaciones.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p30_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p30_R3a = '0'");
					while ($cR30= $csCSiempre->fetchArray()) {
						$rSiempre=$cR30['rSiempre'];
					}

					$csCMaxR30= $conPorPregunta -> query("SELECT MAX(totalp30) AS valMax FROM(SELECT COUNT(p30_R3a) AS totalp30 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p30_R3a = '4' UNION ALL SELECT COUNT(p30_R3a) AS totalp30 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p30_R3a = '3' UNION ALL SELECT COUNT(p30_R3a) AS totalp30 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p30_R3a = '2' UNION ALL SELECT COUNT(p30_R3a) AS totalp30 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p30_R3a = '1' UNION ALL SELECT COUNT(p30_R3a) AS totalp30 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p30_R3a = '0')");

					while ($cR30Max= $csCMaxR30->fetchArray()) {
						$valMax30=$cR30Max['valMax'];
					}

					if ($valMax30 === $rSiempre) {
						$colorSiempre = 'azul';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p30_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p30_R3a = '1'");
					while ($cR30= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR30['rCasiSiempre'];
					}

					if ($valMax30 === $rCasiSiempre) {
						$colorCasiSiempre = 'verde';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p30_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p30_R3a = '2'");
					while ($cR30= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR30['rAlgunasVeces'];
					}

					if ($valMax30 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p30_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p30_R3a = '3'");
					while ($cR30= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR30['rCasiNunca'];
					}

					if ($valMax30 === $rCasiNunca) {
						$colorCasiNunca = 'naranja';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p30_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p30_R3a = '4'");
					while ($cR30= $csNunca->fetchArray()) {
						$rNunca=$cR30['rNunca'];
					}

					if ($valMax30 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR30p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR30p = (isset($sumaR30p)) ? $sumaR30p : 0;
					$por30rSiempre = round(($rSiempre/$sumaR30p)*100,0, PHP_ROUND_HALF_EVEN);
					$por30rCasiSiempre = round(($rCasiSiempre/$sumaR30p)*100,0, PHP_ROUND_HALF_EVEN);
					$por30rAlgunasVeces = round(($rAlgunasVeces/$sumaR30p)*100,0, PHP_ROUND_HALF_EVEN);
					$por30rCasiNunca = round(($rCasiNunca/$sumaR30p)*100,0, PHP_ROUND_HALF_EVEN);
					$por30rNunca = round(($rNunca/$sumaR30p)*100,0, PHP_ROUND_HALF_EVEN);

					$por30rSiempre = (isset($por30rSiempre)) ? $por30rSiempre : 0;
					$por30rCasiSiempre = (isset($por30rCasiSiempre)) ? $por30rCasiSiempre : 0;
					$por30rAlgunasVeces = (isset($por30rAlgunasVeces)) ? $por30rAlgunasVeces : 0;
					$por30rCasiNunca = (isset($por30rCasiNunca)) ? $por30rCasiNunca : 0;
					$por30rNunca = (isset($por30rNunca)) ? $por30rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado azul">'.$por30rSiempre.'%</td>
						<td class="centrado verde">'.$por30rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por30rAlgunasVeces.'%</td>
						<td class="centrado naranja">'.$por30rCasiNunca.'%</td>
						<td class="centrado rojo">'.$por30rNunca.'%</td>
					</tr>
					';
				echo'

					<tr>
					<td>35.-	Me permiten asistir a capacitaciones relacionadas con mi trabajo.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p35_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p35_R3a = '0'");
					while ($cR35= $csCSiempre->fetchArray()) {
						$rSiempre=$cR35['rSiempre'];
					}

					$csCMaxR35= $conPorPregunta -> query("SELECT MAX(totalp35) AS valMax FROM(SELECT COUNT(p35_R3a) AS totalp35 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p35_R3a = '4' UNION ALL SELECT COUNT(p35_R3a) AS totalp35 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p35_R3a = '3' UNION ALL SELECT COUNT(p35_R3a) AS totalp35 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p35_R3a = '2' UNION ALL SELECT COUNT(p35_R3a) AS totalp35 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p35_R3a = '1' UNION ALL SELECT COUNT(p35_R3a) AS totalp35 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p35_R3a = '0')");

					while ($cR35Max= $csCMaxR35->fetchArray()) {
						$valMax35=$cR35Max['valMax'];
					}

					if ($valMax35 === $rSiempre) {
						$colorSiempre = 'azul';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p35_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p35_R3a = '1'");
					while ($cR35= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR35['rCasiSiempre'];
					}

					if ($valMax35 === $rCasiSiempre) {
						$colorCasiSiempre = 'verde';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p35_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p35_R3a = '2'");
					while ($cR35= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR35['rAlgunasVeces'];
					}

					if ($valMax35 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p35_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p35_R3a = '3'");
					while ($cR35= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR35['rCasiNunca'];
					}

					if ($valMax35 === $rCasiNunca) {
						$colorCasiNunca = 'naranja';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p35_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p35_R3a = '4'");
					while ($cR35= $csNunca->fetchArray()) {
						$rNunca=$cR35['rNunca'];
					}

					if ($valMax35 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR35p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR35p = (isset($sumaR35p)) ? $sumaR35p : 0;
					$por35rSiempre = round(($rSiempre/$sumaR35p)*100,0, PHP_ROUND_HALF_EVEN);
					$por35rCasiSiempre = round(($rCasiSiempre/$sumaR35p)*100,0, PHP_ROUND_HALF_EVEN);
					$por35rAlgunasVeces = round(($rAlgunasVeces/$sumaR35p)*100,0, PHP_ROUND_HALF_EVEN);
					$por35rCasiNunca = round(($rCasiNunca/$sumaR35p)*100,0, PHP_ROUND_HALF_EVEN);
					$por35rNunca = round(($rNunca/$sumaR35p)*100,0, PHP_ROUND_HALF_EVEN);

					$por35rSiempre = (isset($por35rSiempre)) ? $por35rSiempre : 0;
					$por35rCasiSiempre = (isset($por35rCasiSiempre)) ? $por35rCasiSiempre : 0;
					$por35rAlgunasVeces = (isset($por35rAlgunasVeces)) ? $por35rAlgunasVeces : 0;
					$por35rCasiNunca = (isset($por35rCasiNunca)) ? $por35rCasiNunca : 0;
					$por35rNunca = (isset($por35rNunca)) ? $por35rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado azul">'.$por35rSiempre.'%</td>
						<td class="centrado verde">'.$por35rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por35rAlgunasVeces.'%</td>
						<td class="centrado naranja">'.$por35rCasiNunca.'%</td>
						<td class="centrado rojo">'.$por35rNunca.'%</td>
					</tr>
					';
				echo'

					<tr>
					<td>36.-	Recibo capacitación útil para hacer mi trabajo.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p36_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p36_R3a = '0'");
					while ($cR36= $csCSiempre->fetchArray()) {
						$rSiempre=$cR36['rSiempre'];
					}

					$csCMaxR36= $conPorPregunta -> query("SELECT MAX(totalp36) AS valMax FROM(SELECT COUNT(p36_R3a) AS totalp36 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p36_R3a = '4' UNION ALL SELECT COUNT(p36_R3a) AS totalp36 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p36_R3a = '3' UNION ALL SELECT COUNT(p36_R3a) AS totalp36 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p36_R3a = '2' UNION ALL SELECT COUNT(p36_R3a) AS totalp36 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p36_R3a = '1' UNION ALL SELECT COUNT(p36_R3a) AS totalp36 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p36_R3a = '0')");

					while ($cR36Max= $csCMaxR36->fetchArray()) {
						$valMax36=$cR36Max['valMax'];
					}

					if ($valMax36 === $rSiempre) {
						$colorSiempre = 'azul';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p36_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p36_R3a = '1'");
					while ($cR36= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR36['rCasiSiempre'];
					}

					if ($valMax36 === $rCasiSiempre) {
						$colorCasiSiempre = 'verde';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p36_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p36_R3a = '2'");
					while ($cR36= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR36['rAlgunasVeces'];
					}

					if ($valMax36 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p36_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p36_R3a = '3'");
					while ($cR36= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR36['rCasiNunca'];
					}

					if ($valMax36 === $rCasiNunca) {
						$colorCasiNunca = 'naranja';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p36_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p36_R3a = '4'");
					while ($cR36= $csNunca->fetchArray()) {
						$rNunca=$cR36['rNunca'];
					}

					if ($valMax36 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR36p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR36p = (isset($sumaR36p)) ? $sumaR36p : 0;
					$por36rSiempre = round(($rSiempre/$sumaR36p)*100,0, PHP_ROUND_HALF_EVEN);
					$por36rCasiSiempre = round(($rCasiSiempre/$sumaR36p)*100,0, PHP_ROUND_HALF_EVEN);
					$por36rAlgunasVeces = round(($rAlgunasVeces/$sumaR36p)*100,0, PHP_ROUND_HALF_EVEN);
					$por36rCasiNunca = round(($rCasiNunca/$sumaR36p)*100,0, PHP_ROUND_HALF_EVEN);
					$por36rNunca = round(($rNunca/$sumaR36p)*100,0, PHP_ROUND_HALF_EVEN);

					$por36rSiempre = (isset($por36rSiempre)) ? $por36rSiempre : 0;
					$por36rCasiSiempre = (isset($por36rCasiSiempre)) ? $por36rCasiSiempre : 0;
					$por36rAlgunasVeces = (isset($por36rAlgunasVeces)) ? $por36rAlgunasVeces : 0;
					$por36rCasiNunca = (isset($por36rCasiNunca)) ? $por36rCasiNunca : 0;
					$por36rNunca = (isset($por36rNunca)) ? $por36rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado azul">'.$por36rSiempre.'%</td>
						<td class="centrado verde">'.$por36rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por36rAlgunasVeces.'%</td>
						<td class="centrado naranja">'.$por36rCasiNunca.'%</td>
						<td class="centrado rojo">'.$por36rNunca.'%</td>
					</tr>
					';
				echo'

					<tr>
					<td>65.-	Atiendo clientes o usuarios muy enojados.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p65_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p65_R3a = '4'");
					while ($cR65= $csCSiempre->fetchArray()) {
						$rSiempre=$cR65['rSiempre'];
					}

					$csCMaxR65= $conPorPregunta -> query("SELECT MAX(totalp65) AS valMax FROM(SELECT COUNT(p65_R3a) AS totalp65 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p65_R3a = '4' UNION ALL SELECT COUNT(p65_R3a) AS totalp65 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p65_R3a = '3' UNION ALL SELECT COUNT(p65_R3a) AS totalp65 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p65_R3a = '2' UNION ALL SELECT COUNT(p65_R3a) AS totalp65 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p65_R3a = '1' UNION ALL SELECT COUNT(p65_R3a) AS totalp65 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p65_R3a = '0')");

					while ($cR65Max= $csCMaxR65->fetchArray()) {
						$valMax65=$cR65Max['valMax'];
					}

					if ($valMax65 === $rSiempre) {
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p65_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p65_R3a = '3'");
					while ($cR65= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR65['rCasiSiempre'];
					}

					if ($valMax65 === $rCasiSiempre) {
						$colorCasiSiempre = 'naranja';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p65_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p65_R3a = '2'");
					while ($cR65= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR65['rAlgunasVeces'];
					}

					if ($valMax65 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p65_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p65_R3a = '1'");
					while ($cR65= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR65['rCasiNunca'];
					}

					if ($valMax65 === $rCasiNunca) {
						$colorCasiNunca = 'verde';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p65_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p65_R3a = '0'");
					while ($cR65= $csNunca->fetchArray()) {
						$rNunca=$cR65['rNunca'];
					}

					if ($valMax65 === $rNunca) {
						$colorNunca = 'azul';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR65p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR65p = (isset($sumaR65p)) ? $sumaR65p : 0;
					$por65rSiempre = round(($rSiempre/$sumaR65p)*100,0, PHP_ROUND_HALF_EVEN);
					$por65rCasiSiempre = round(($rCasiSiempre/$sumaR65p)*100,0, PHP_ROUND_HALF_EVEN);
					$por65rAlgunasVeces = round(($rAlgunasVeces/$sumaR65p)*100,0, PHP_ROUND_HALF_EVEN);
					$por65rCasiNunca = round(($rCasiNunca/$sumaR65p)*100,0, PHP_ROUND_HALF_EVEN);
					$por65rNunca = round(($rNunca/$sumaR65p)*100,0, PHP_ROUND_HALF_EVEN);

					$por65rSiempre = (isset($por65rSiempre)) ? $por65rSiempre : 0;
					$por65rCasiSiempre = (isset($por65rCasiSiempre)) ? $por65rCasiSiempre : 0;
					$por65rAlgunasVeces = (isset($por65rAlgunasVeces)) ? $por65rAlgunasVeces : 0;
					$por65rCasiNunca = (isset($por65rCasiNunca)) ? $por65rCasiNunca : 0;
					$por65rNunca = (isset($por65rNunca)) ? $por65rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado rojo">'.$por65rSiempre.'%</td>
						<td class="centrado naranja">'.$por65rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por65rAlgunasVeces.'%</td>
						<td class="centrado verde">'.$por65rCasiNunca.'%</td>
						<td class="centrado azul">'.$por65rNunca.'%</td>
					</tr>
					';
				echo'

					<tr>
					<td>66.-	Mi trabajo me exige atender personas muy necesitadas de ayuda o enfermas.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p66_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p66_R3a = '4'");
					while ($cR66= $csCSiempre->fetchArray()) {
						$rSiempre=$cR66['rSiempre'];
					}

					$csCMaxR66= $conPorPregunta -> query("SELECT MAX(totalp66) AS valMax FROM(SELECT COUNT(p66_R3a) AS totalp66 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p66_R3a = '4' UNION ALL SELECT COUNT(p66_R3a) AS totalp66 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p66_R3a = '3' UNION ALL SELECT COUNT(p66_R3a) AS totalp66 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p66_R3a = '2' UNION ALL SELECT COUNT(p66_R3a) AS totalp66 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p66_R3a = '1' UNION ALL SELECT COUNT(p66_R3a) AS totalp66 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p66_R3a = '0')");

					while ($cR66Max= $csCMaxR66->fetchArray()) {
						$valMax66=$cR66Max['valMax'];
					}

					if ($valMax66 === $rSiempre) {
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p66_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p66_R3a = '3'");
					while ($cR66= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR66['rCasiSiempre'];
					}

					if ($valMax66 === $rCasiSiempre) {
						$colorCasiSiempre = 'naranja';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p66_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p66_R3a = '2'");
					while ($cR66= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR66['rAlgunasVeces'];
					}

					if ($valMax66 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p66_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p66_R3a = '1'");
					while ($cR66= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR66['rCasiNunca'];
					}

					if ($valMax6 === $rCasiNunca) {
						$colorCasiNunca = 'verde';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p66_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p66_R3a = '0'");
					while ($cR66= $csNunca->fetchArray()) {
						$rNunca=$cR66['rNunca'];
					}

					if ($valMax66 === $rNunca) {
						$colorNunca = 'azul';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR66p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR66p = (isset($sumaR66p)) ? $sumaR66p : 0;
					$por66rSiempre = round(($rSiempre/$sumaR66p)*100,0, PHP_ROUND_HALF_EVEN);
					$por66rCasiSiempre = round(($rCasiSiempre/$sumaR66p)*100,0, PHP_ROUND_HALF_EVEN);
					$por66rAlgunasVeces = round(($rAlgunasVeces/$sumaR66p)*100,0, PHP_ROUND_HALF_EVEN);
					$por66rCasiNunca = round(($rCasiNunca/$sumaR66p)*100,0, PHP_ROUND_HALF_EVEN);
					$por66rNunca = round(($rNunca/$sumaR66p)*100,0, PHP_ROUND_HALF_EVEN);

					$por66rSiempre = (isset($por66rSiempre)) ? $por66rSiempre : 0;
					$por66rCasiSiempre = (isset($por66rCasiSiempre)) ? $por66rCasiSiempre : 0;
					$por66rAlgunasVeces = (isset($por66rAlgunasVeces)) ? $por66rAlgunasVeces : 0;
					$por66rCasiNunca = (isset($por66rCasiNunca)) ? $por66rCasiNunca : 0;
					$por66rNunca = (isset($por66rNunca)) ? $por66rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado rojo">'.$por66rSiempre.'%</td>
						<td class="centrado naranja">'.$por66rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por66rAlgunasVeces.'%</td>
						<td class="centrado verde">'.$por66rCasiNunca.'%</td>
						<td class="centrado azul">'.$por66rNunca.'%</td>
					</tr>
					';
				echo'

					<tr>
					<td>67.-	Para hacer mi trabajo debo demostrar sentimientos distintos a los míos.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p67_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p67_R3a = '4'");
					while ($cR67= $csCSiempre->fetchArray()) {
						$rSiempre=$cR67['rSiempre'];
					}

					$csCMaxR67= $conPorPregunta -> query("SELECT MAX(totalp67) AS valMax FROM(SELECT COUNT(p67_R3a) AS totalp67 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p67_R3a = '4' UNION ALL SELECT COUNT(p67_R3a) AS totalp67 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p67_R3a = '3' UNION ALL SELECT COUNT(p67_R3a) AS totalp67 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p67_R3a = '2' UNION ALL SELECT COUNT(p67_R3a) AS totalp67 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p67_R3a = '1' UNION ALL SELECT COUNT(p67_R3a) AS totalp67 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p67_R3a = '0')");

					while ($cR67Max= $csCMaxR67->fetchArray()) {
						$valMax67=$cR67Max['valMax'];
					}

					if ($valMax67 === $rSiempre) {
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p67_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p67_R3a = '3'");
					while ($cR67= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR67['rCasiSiempre'];
					}

					if ($valMax67 === $rCasiSiempre) {
						$colorCasiSiempre = 'naranja';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p67_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p67_R3a = '2'");
					while ($cR67= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR67['rAlgunasVeces'];
					}

					if ($valMax67 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p67_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p67_R3a = '1'");
					while ($cR67= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR67['rCasiNunca'];
					}

					if ($valMax67 === $rCasiNunca) {
						$colorCasiNunca = 'verde';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p67_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p67_R3a = '0'");
					while ($cR67= $csNunca->fetchArray()) {
						$rNunca=$cR67['rNunca'];
					}

					if ($valMax67 === $rNunca) {
						$colorNunca = 'azul';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR67p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR67p = (isset($sumaR67p)) ? $sumaR67p : 0;
					$por67rSiempre = round(($rSiempre/$sumaR67p)*100,0, PHP_ROUND_HALF_EVEN);
					$por67rCasiSiempre = round(($rCasiSiempre/$sumaR67p)*100,0, PHP_ROUND_HALF_EVEN);
					$por67rAlgunasVeces = round(($rAlgunasVeces/$sumaR67p)*100,0, PHP_ROUND_HALF_EVEN);
					$por67rCasiNunca = round(($rCasiNunca/$sumaR67p)*100,0, PHP_ROUND_HALF_EVEN);
					$por67rNunca = round(($rNunca/$sumaR67p)*100,0, PHP_ROUND_HALF_EVEN);

					$por67rSiempre = (isset($por67rSiempre)) ? $por67rSiempre : 0;
					$por67rCasiSiempre = (isset($por67rCasiSiempre)) ? $por67rCasiSiempre : 0;
					$por67rAlgunasVeces = (isset($por67rAlgunasVeces)) ? $por67rAlgunasVeces : 0;
					$por67rCasiNunca = (isset($por67rCasiNunca)) ? $por67rCasiNunca : 0;
					$por67rNunca = (isset($por67rNunca)) ? $por67rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado rojo">'.$por67rSiempre.'%</td>
						<td class="centrado naranja">'.$por67rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por67rAlgunasVeces.'%</td>
						<td class="centrado verde">'.$por67rCasiNunca.'%</td>
						<td class="centrado azul">'.$por67rNunca.'%</td>
					</tr>
					';
				echo'

					<tr>
					<td>68.-	Mi trabajo me exige atender situaciones de violencia.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p68_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p68_R3a = '4'");
					while ($cR68= $csCSiempre->fetchArray()) {
						$rSiempre=$cR68['rSiempre'];
					}

					$csCMaxR68= $conPorPregunta -> query("SELECT MAX(totalp68) AS valMax FROM(SELECT COUNT(p68_R3a) AS totalp68 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p68_R3a = '4' UNION ALL SELECT COUNT(p68_R3a) AS totalp68 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p68_R3a = '3' UNION ALL SELECT COUNT(p68_R3a) AS totalp68 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p68_R3a = '2' UNION ALL SELECT COUNT(p68_R3a) AS totalp68 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p68_R3a = '1' UNION ALL SELECT COUNT(p68_R3a) AS totalp68 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p68_R3a = '0')");

					while ($cR68Max= $csCMaxR68->fetchArray()) {
						$valMax68=$cR68Max['valMax'];
					}

					if ($valMax68 === $rSiempre) {
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p68_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p68_R3a = '3'");
					while ($cR68= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR68['rCasiSiempre'];
					}

					if ($valMax68 === $rCasiSiempre) {
						$colorCasiSiempre = 'naranja';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p68_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p68_R3a = '2'");
					while ($cR68= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR68['rAlgunasVeces'];
					}

					if ($valMax68 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p68_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p68_R3a = '1'");
					while ($cR68= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR68['rCasiNunca'];
					}

					if ($valMax68 === $rCasiNunca) {
						$colorCasiNunca = 'verde';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p68_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p68_R3a = '0'");
					while ($cR68= $csNunca->fetchArray()) {
						$rNunca=$cR68['rNunca'];
					}

					if ($valMax68 === $rNunca) {
						$colorNunca = 'azul';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR68p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR68p = (isset($sumaR68p)) ? $sumaR68p : 0;
					$por68rSiempre = round(($rSiempre/$sumaR68p)*100,0, PHP_ROUND_HALF_EVEN);
					$por68rCasiSiempre = round(($rCasiSiempre/$sumaR68p)*100,0, PHP_ROUND_HALF_EVEN);
					$por68rAlgunasVeces = round(($rAlgunasVeces/$sumaR68p)*100,0, PHP_ROUND_HALF_EVEN);
					$por68rCasiNunca = round(($rCasiNunca/$sumaR68p)*100,0, PHP_ROUND_HALF_EVEN);
					$por68rNunca = round(($rNunca/$sumaR68p)*100,0, PHP_ROUND_HALF_EVEN);

					$por68rSiempre = (isset($por68rSiempre)) ? $por68rSiempre : 0;
					$por68rCasiSiempre = (isset($por68rCasiSiempre)) ? $por68rCasiSiempre : 0;
					$por68rAlgunasVeces = (isset($por68rAlgunasVeces)) ? $por68rAlgunasVeces : 0;
					$por68rCasiNunca = (isset($por68rCasiNunca)) ? $por68rCasiNunca : 0;
					$por68rNunca = (isset($por68rNunca)) ? $por68rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado rojo">'.$por68rSiempre.'%</td>
						<td class="centrado naranja">'.$por68rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por68rAlgunasVeces.'%</td>
						<td class="centrado verde">'.$por68rCasiNunca.'%</td>
						<td class="centrado azul">'.$por68rNunca.'%</td>
					</tr>
					';
				echo'
			</table>

			<br>

			<div style="font-size: .8em;">
				<h3>Factores propios de la actividad</h3>
				<h4>Carga de trabajo</h4>
				';
				$dDatos06_1a = '['.$por06rSiempre.','.$por06rCasiSiempre.','.$por06rAlgunasVeces.','.$por06rCasiNunca.','.$por06rNunca.']';

				$dDatos12_1a = '['.$por12rSiempre.','.$por12rCasiSiempre.','.$por12rAlgunasVeces.','.$por12rCasiNunca.','.$por12rNunca.']';

				$dDatos07_1a = '['.$por07rSiempre.','.$por07rCasiSiempre.','.$por07rAlgunasVeces.','.$por07rCasiNunca.','.$por07rNunca.']';

				$dDatos08_1a = '['.$por08rSiempre.','.$por08rCasiSiempre.','.$por08rAlgunasVeces.','.$por08rCasiNunca.','.$por08rNunca.']';

				$dDatos09_1a = '['.$por09rSiempre.','.$por09rCasiSiempre.','.$por09rAlgunasVeces.','.$por09rCasiNunca.','.$por09rNunca.']';

				$dDatos10_1a = '['.$por10rSiempre.','.$por10rCasiSiempre.','.$por10rAlgunasVeces.','.$por10rCasiNunca.','.$por10rNunca.']';

				$dDatos11_1a = '['.$por11rSiempre.','.$por11rCasiSiempre.','.$por11rAlgunasVeces.','.$por11rCasiNunca.','.$por11rNunca.']';

				$dDatos65_1a = '['.$por65rSiempre.','.$por65rCasiSiempre.','.$por65rAlgunasVeces.','.$por65rCasiNunca.','.$por65rNunca.']';

				$dDatos66_1a = '['.$por66rSiempre.','.$por66rCasiSiempre.','.$por66rAlgunasVeces.','.$por66rCasiNunca.','.$por66rNunca.']';

				$dDatos67_1a = '['.$por67rSiempre.','.$por67rCasiSiempre.','.$por67rAlgunasVeces.','.$por67rCasiNunca.','.$por67rNunca.']';

				$dDatos68_1a = '['.$por68rSiempre.','.$por68rCasiSiempre.','.$por68rAlgunasVeces.','.$por68rCasiNunca.','.$por68rNunca.']';

				$dDatos13_1a = '['.$por13rSiempre.','.$por13rCasiSiempre.','.$por13rAlgunasVeces.','.$por13rCasiNunca.','.$por13rNunca.']';

				$dDatos14_1a = '['.$por14rSiempre.','.$por14rCasiSiempre.','.$por14rAlgunasVeces.','.$por14rCasiNunca.','.$por14rNunca.']';

				$dDatos15_1a = '['.$por15rSiempre.','.$por15rCasiSiempre.','.$por15rAlgunasVeces.','.$por15rCasiNunca.','.$por15rNunca.']';

				$dDatos16_1a = '['.$por16rSiempre.','.$por16rCasiSiempre.','.$por16rAlgunasVeces.','.$por16rCasiNunca.','.$por16rNunca.']';

				$dDatos25_1a = '['.$por25rSiempre.','.$por25rCasiSiempre.','.$por25rAlgunasVeces.','.$por25rCasiNunca.','.$por25rNunca.']';

				$dDatos26_1a = '['.$por26rSiempre.','.$por26rCasiSiempre.','.$por26rAlgunasVeces.','.$por26rCasiNunca.','.$por26rNunca.']';

				$dDatos27_1a = '['.$por27rSiempre.','.$por27rCasiSiempre.','.$por27rAlgunasVeces.','.$por27rCasiNunca.','.$por27rNunca.']';

				$dDatos28_1a = '['.$por28rSiempre.','.$por28rCasiSiempre.','.$por28rAlgunasVeces.','.$por28rCasiNunca.','.$por28rNunca.']';

				$dDatos23_1a = '['.$por23rSiempre.','.$por23rCasiSiempre.','.$por23rAlgunasVeces.','.$por23rCasiNunca.','.$por23rNunca.']';

				$dDatos24_1a = '['.$por24rSiempre.','.$por24rCasiSiempre.','.$por24rAlgunasVeces.','.$por24rCasiNunca.','.$por24rNunca.']';

				$dDatos29_1a = '['.$por29rSiempre.','.$por29rCasiSiempre.','.$por29rAlgunasVeces.','.$por29rCasiNunca.','.$por29rNunca.']';

				$dDatos30_1a = '['.$por30rSiempre.','.$por30rCasiSiempre.','.$por30rAlgunasVeces.','.$por30rCasiNunca.','.$por30rNunca.']';

				$dDatos35_1a = '['.$por35rSiempre.','.$por35rCasiSiempre.','.$por35rAlgunasVeces.','.$por35rCasiNunca.','.$por35rNunca.']';

				$dDatos36_1a = '['.$por36rSiempre.','.$por36rCasiSiempre.','.$por36rAlgunasVeces.','.$por36rCasiNunca.','.$por36rNunca.']';

				echo'
				<table style="width: 800px;">
					<tr>
						<td class="tSinBorde" style="width: 400px;">
							<b>Cargas cuantitativas (6, 12)</b>
							<div>
								<canvas id="grafica01b'.$varGraf.'"></canvas>
							</div>
							
						</td>
						<td class="tSinBorde" style="width: 400px;">
							<b>Ritmos de trabajo acelerado (7, 8)</b>
							<div>
								<canvas id="grafica02b'.$varGraf.'"></canvas>
							</div>
						</td>
					</tr>
					<tr>
						<td class="tSinBorde" style="width: 400px;">
							<b>Carga mental (9, 10, 11)</b>
							<div>
								<canvas id="grafica03b'.$varGraf.'"></canvas>
							</div>
						</td>
						<td class="tSinBorde" style="width: 400px;">
							<b>Cargas psicológicas emocionales (65, 66, 67, 68)</b>
							<div>
								<canvas id="grafica04b'.$varGraf.'"></canvas>
							</div>
						</td>
					</tr>
					<tr>
						<td class="tSinBorde" style="width: 400px;">
							<b>Cargas de alta responsabilidad (13, 14)</b>
							<div>
								<canvas id="grafica05b'.$varGraf.'"></canvas>
							</div>
						</td>
						<td class="tSinBorde" style="width: 400px;">
							<b>Cargas contradictorias o inconsistentes (15, 16)</b>
							<div>
								<canvas id="grafica06b'.$varGraf.'"></canvas>
							</div>
						</td>
					</tr>
					<tr>
						<td class="tSinBorde" style="width: 400px;">
							<b>Falta de control y autonomía sobre el trabajo (25, 26, 27, 28)</b>
							<div>
								<canvas id="grafica07b'.$varGraf.'"></canvas>
							</div>
						</td>
						<td class="tSinBorde" style="width: 400px;">
							<b>Limitada o nula posibilidad de desarrollo (23, 24)</b>
							<div>
								<canvas id="grafica08b'.$varGraf.'"></canvas>
							</div>
						</td>
					</tr>
					<tr>
						<td class="tSinBorde" style="width: 400px;">
							<b>Insuficiente participación y manejo del cambio (29, 30)</b>
							<div>
								<canvas id="grafica09b'.$varGraf.'"></canvas>
							</div>
						</td>
						<td class="tSinBorde" style="width: 400px;">
							<b>Limitada o inexistente capacitación (35, 36)</b>
							<div>
								<canvas id="grafica10b'.$varGraf.'"></canvas>
							</div>
						</td>
					</tr>
				</table>
			</div>

			



			<br>

			<table style="font-size: .8em; width: 800px;">
				<tr>
					<td style="width: 300px;"><b>3.- Organización del tiempo de trabajo</b></td>
					<td style="width: 70px;">Siempre</td>
					<td style="width: 90px;">Casi siempre</td>
					<td style="width: 90px;">Algunas veces</td>
					<td style="width: 90px;">Casi nunca</td>
					<td>Nunca</td>
				</tr>
				<tr>
					<td>17.-	Trabajo horas extras más de tres veces a la semana.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p17_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p17_R3a = '4'");
					while ($cR17= $csCSiempre->fetchArray()) {
						$rSiempre=$cR17['rSiempre'];
					}

					$csCMaxR17= $conPorPregunta -> query("SELECT MAX(totalP17) AS valMax FROM(SELECT COUNT(p17_R3a) AS totalP17 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p17_R3a = '4' UNION ALL SELECT COUNT(p17_R3a) AS totalP17 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p17_R3a = '3' UNION ALL SELECT COUNT(p17_R3a) AS totalP17 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p17_R3a = '2' UNION ALL SELECT COUNT(p17_R3a) AS totalP17 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p17_R3a = '1' UNION ALL SELECT COUNT(p17_R3a) AS totalP17 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p17_R3a = '0')");

					while ($cR17Max= $csCMaxR17->fetchArray()) {
						$valMax17=$cR17Max['valMax'];
					}

					if ($valMax17 === $rSiempre) {
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>

					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p17_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p17_R3a = '3'");
					while ($cR17= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR17['rCasiSiempre'];
					}

					if ($valMax17 === $rCasiSiempre) {
						$colorCasiSiempre = 'naranja';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>

					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p17_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p17_R3a = '2'");
					while ($cR17= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR17['rAlgunasVeces'];
					}

					if ($valMax17 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>

					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p17_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p17_R3a = '1'");
					while ($cR17= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR17['rCasiNunca'];
					}

					if ($valMax17 === $rCasiNunca) {
						$colorCasiNunca = 'verde';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>

					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p17_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p17_R3a = '0'");
					while ($cR17= $csNunca->fetchArray()) {
						$rNunca=$cR17['rNunca'];
					}

					if ($valMax17 === $rNunca) {
						$colorNunca = 'azul';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR17p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR17p = (isset($sumaR17p)) ? $sumaR17p : 0;
					$por17rSiempre = round(($rSiempre/$sumaR17p)*100,0, PHP_ROUND_HALF_EVEN);
					$por17rCasiSiempre = round(($rCasiSiempre/$sumaR17p)*100,0, PHP_ROUND_HALF_EVEN);
					$por17rAlgunasVeces = round(($rAlgunasVeces/$sumaR17p)*100,0, PHP_ROUND_HALF_EVEN);
					$por17rCasiNunca = round(($rCasiNunca/$sumaR17p)*100,0, PHP_ROUND_HALF_EVEN);
					$por17rNunca = round(($rNunca/$sumaR17p)*100,0, PHP_ROUND_HALF_EVEN);

					$por17rSiempre = (isset($por17rSiempre)) ? $por17rSiempre : 0;
					$por17rCasiSiempre = (isset($por17rCasiSiempre)) ? $por17rCasiSiempre : 0;
					$por17rAlgunasVeces = (isset($por17rAlgunasVeces)) ? $por17rAlgunasVeces : 0;
					$por17rCasiNunca = (isset($por17rCasiNunca)) ? $por17rCasiNunca : 0;
					$por17rNunca = (isset($por17rNunca)) ? $por17rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado rojo">'.$por17rSiempre.'%</td>
						<td class="centrado naranja">'.$por17rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por17rAlgunasVeces.'%</td>
						<td class="centrado verde">'.$por17rCasiNunca.'%</td>
						<td class="centrado azul">'.$por17rNunca.'%</td>
					</tr>
					';
				echo'
				<tr>
					<td>18.-	Mi trabajo me exige laborar en días de descanso, festivos o fines de semana.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p18_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p18_R3a = '4'");
					while ($cR18= $csCSiempre->fetchArray()) {
						$rSiempre=$cR18['rSiempre'];
					}

					$csCMaxR18= $conPorPregunta -> query("SELECT MAX(totalp18) AS valMax FROM(SELECT COUNT(p18_R3a) AS totalp18 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p18_R3a = '4' UNION ALL SELECT COUNT(p18_R3a) AS totalp18 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p18_R3a = '3' UNION ALL SELECT COUNT(p18_R3a) AS totalp18 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p18_R3a = '2' UNION ALL SELECT COUNT(p18_R3a) AS totalp18 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p18_R3a = '1' UNION ALL SELECT COUNT(p18_R3a) AS totalp18 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p18_R3a = '0')");

					while ($cR18Max= $csCMaxR18->fetchArray()) {
						$valMax18=$cR18Max['valMax'];
					}

					if ($valMax18 === $rSiempre) {
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p18_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p18_R3a = '3'");
					while ($cR18= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR18['rCasiSiempre'];
					}

					if ($valMax18 === $rCasiSiempre) {
						$colorCasiSiempre = 'naranja';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p18_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p18_R3a = '2'");
					while ($cR18= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR18['rAlgunasVeces'];
					}

					if ($valMax18 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p18_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p18_R3a = '1'");
					while ($cR18= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR18['rCasiNunca'];
					}

					if ($valMax18 === $rCasiNunca) {
						$colorCasiNunca = 'verde';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p18_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p18_R3a = '0'");
					while ($cR18= $csNunca->fetchArray()) {
						$rNunca=$cR18['rNunca'];
					}

					if ($valMax18 === $rNunca) {
						$colorNunca = 'azul';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR18p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR18p = (isset($sumaR18p)) ? $sumaR18p : 0;
					$por18rSiempre = round(($rSiempre/$sumaR18p)*100,0, PHP_ROUND_HALF_EVEN);
					$por18rCasiSiempre = round(($rCasiSiempre/$sumaR18p)*100,0, PHP_ROUND_HALF_EVEN);
					$por18rAlgunasVeces = round(($rAlgunasVeces/$sumaR18p)*100,0, PHP_ROUND_HALF_EVEN);
					$por18rCasiNunca = round(($rCasiNunca/$sumaR18p)*100,0, PHP_ROUND_HALF_EVEN);
					$por18rNunca = round(($rNunca/$sumaR18p)*100,0, PHP_ROUND_HALF_EVEN);

					$por18rSiempre = (isset($por18rSiempre)) ? $por18rSiempre : 0;
					$por18rCasiSiempre = (isset($por18rCasiSiempre)) ? $por18rCasiSiempre : 0;
					$por18rAlgunasVeces = (isset($por18rAlgunasVeces)) ? $por18rAlgunasVeces : 0;
					$por18rCasiNunca = (isset($por18rCasiNunca)) ? $por18rCasiNunca : 0;
					$por18rNunca = (isset($por18rNunca)) ? $por18rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado rojo">'.$por18rSiempre.'%</td>
						<td class="centrado naranja">'.$por18rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por18rAlgunasVeces.'%</td>
						<td class="centrado verde">'.$por18rCasiNunca.'%</td>
						<td class="centrado azul">'.$por18rNunca.'%</td>
					</tr>
					';
				echo'
				<tr>
					<td>19.-	Considero que el tiempo en el trabajo es mucho y perjudica mis actividades familiares o personales.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p19_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p19_R3a = '4'");
					while ($cR19= $csCSiempre->fetchArray()) {
						$rSiempre=$cR19['rSiempre'];
					}

					$csCMaxR19= $conPorPregunta -> query("SELECT MAX(totalp19) AS valMax FROM(SELECT COUNT(p19_R3a) AS totalp19 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p19_R3a = '4' UNION ALL SELECT COUNT(p19_R3a) AS totalp19 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p19_R3a = '3' UNION ALL SELECT COUNT(p19_R3a) AS totalp19 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p19_R3a = '2' UNION ALL SELECT COUNT(p19_R3a) AS totalp19 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p19_R3a = '1' UNION ALL SELECT COUNT(p19_R3a) AS totalp19 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p19_R3a = '0')");

					while ($cR19Max= $csCMaxR19->fetchArray()) {
						$valMax19=$cR19Max['valMax'];
					}

					if ($valMax19 === $rSiempre) {
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p19_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p19_R3a = '3'");
					while ($cR19= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR19['rCasiSiempre'];
					}

					if ($valMax19 === $rCasiSiempre) {
						$colorCasiSiempre = 'naranja';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p19_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p19_R3a = '2'");
					while ($cR19= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR19['rAlgunasVeces'];
					}

					if ($valMax19 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p19_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p19_R3a = '1'");
					while ($cR19= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR19['rCasiNunca'];
					}

					if ($valMax19 === $rCasiNunca) {
						$colorCasiNunca = 'verde';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p19_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p19_R3a = '0'");
					while ($cR19= $csNunca->fetchArray()) {
						$rNunca=$cR19['rNunca'];
					}

					if ($valMax19 === $rNunca) {
						$colorNunca = 'azul';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR19p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR19p = (isset($sumaR19p)) ? $sumaR19p : 0;
					$por19rSiempre = round(($rSiempre/$sumaR19p)*100,0, PHP_ROUND_HALF_EVEN);
					$por19rCasiSiempre = round(($rCasiSiempre/$sumaR19p)*100,0, PHP_ROUND_HALF_EVEN);
					$por19rAlgunasVeces = round(($rAlgunasVeces/$sumaR19p)*100,0, PHP_ROUND_HALF_EVEN);
					$por19rCasiNunca = round(($rCasiNunca/$sumaR19p)*100,0, PHP_ROUND_HALF_EVEN);
					$por19rNunca = round(($rNunca/$sumaR19p)*100,0, PHP_ROUND_HALF_EVEN);

					$por19rSiempre = (isset($por19rSiempre)) ? $por19rSiempre : 0;
					$por19rCasiSiempre = (isset($por19rCasiSiempre)) ? $por19rCasiSiempre : 0;
					$por19rAlgunasVeces = (isset($por19rAlgunasVeces)) ? $por19rAlgunasVeces : 0;
					$por19rCasiNunca = (isset($por19rCasiNunca)) ? $por19rCasiNunca : 0;
					$por19rNunca = (isset($por19rNunca)) ? $por19rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado rojo">'.$por19rSiempre.'%</td>
						<td class="centrado naranja">'.$por19rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por19rAlgunasVeces.'%</td>
						<td class="centrado verde">'.$por19rCasiNunca.'%</td>
						<td class="centrado azul">'.$por19rNunca.'%</td>
					</tr>
					';
				echo'
				<tr>
					<td>20.-	Debo atender asuntos de trabajo cuando estoy en casa.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p20_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p20_R3a = '4'");
					while ($cR20= $csCSiempre->fetchArray()) {
						$rSiempre=$cR20['rSiempre'];
					}

					$csCMaxR20= $conPorPregunta -> query("SELECT MAX(totalp20) AS valMax FROM(SELECT COUNT(p20_R3a) AS totalp20 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p20_R3a = '4' UNION ALL SELECT COUNT(p20_R3a) AS totalp20 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p20_R3a = '3' UNION ALL SELECT COUNT(p20_R3a) AS totalp20 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p20_R3a = '2' UNION ALL SELECT COUNT(p20_R3a) AS totalp20 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p20_R3a = '1' UNION ALL SELECT COUNT(p20_R3a) AS totalp20 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p20_R3a = '0')");

					while ($cR20Max= $csCMaxR20->fetchArray()) {
						$valMax20=$cR20Max['valMax'];
					}

					if ($valMax20 === $rSiempre) {
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p20_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p20_R3a = '3'");
					while ($cR20= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR20['rCasiSiempre'];
					}

					if ($valMax20 === $rCasiSiempre) {
						$colorCasiSiempre = 'naranja';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p20_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p20_R3a = '2'");
					while ($cR20= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR20['rAlgunasVeces'];
					}

					if ($valMax20 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p20_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p20_R3a = '1'");
					while ($cR20= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR20['rCasiNunca'];
					}

					if ($valMax20 === $rCasiNunca) {
						$colorCasiNunca = 'verde';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p20_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p20_R3a = '0'");
					while ($cR20= $csNunca->fetchArray()) {
						$rNunca=$cR20['rNunca'];
					}

					if ($valMax20 === $rNunca) {
						$colorNunca = 'azul';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR20p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR20p = (isset($sumaR20p)) ? $sumaR20p : 0;
					$por20rSiempre = round(($rSiempre/$sumaR20p)*100,0, PHP_ROUND_HALF_EVEN);
					$por20rCasiSiempre = round(($rCasiSiempre/$sumaR20p)*100,0, PHP_ROUND_HALF_EVEN);
					$por20rAlgunasVeces = round(($rAlgunasVeces/$sumaR20p)*100,0, PHP_ROUND_HALF_EVEN);
					$por20rCasiNunca = round(($rCasiNunca/$sumaR20p)*100,0, PHP_ROUND_HALF_EVEN);
					$por20rNunca = round(($rNunca/$sumaR20p)*100,0, PHP_ROUND_HALF_EVEN);

					$por20rSiempre = (isset($por20rSiempre)) ? $por20rSiempre : 0;
					$por20rCasiSiempre = (isset($por20rCasiSiempre)) ? $por20rCasiSiempre : 0;
					$por20rAlgunasVeces = (isset($por20rAlgunasVeces)) ? $por20rAlgunasVeces : 0;
					$por20rCasiNunca = (isset($por20rCasiNunca)) ? $por20rCasiNunca : 0;
					$por20rNunca = (isset($por20rNunca)) ? $por20rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado rojo">'.$por20rSiempre.'%</td>
						<td class="centrado naranja">'.$por20rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por20rAlgunasVeces.'%</td>
						<td class="centrado verde">'.$por20rCasiNunca.'%</td>
						<td class="centrado azul">'.$por20rNunca.'%</td>
					</tr>
					';
				echo'
				<tr>
					<td>21.-	Pienso en las actividades familiares o personales cuando estoy en mi trabajo.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p21_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p21_R3a = '4'");
					while ($cR21= $csCSiempre->fetchArray()) {
						$rSiempre=$cR21['rSiempre'];
					}

					$csCMaxR21= $conPorPregunta -> query("SELECT MAX(totalp21) AS valMax FROM(SELECT COUNT(p21_R3a) AS totalp21 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p21_R3a = '4' UNION ALL SELECT COUNT(p21_R3a) AS totalp21 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p21_R3a = '3' UNION ALL SELECT COUNT(p21_R3a) AS totalp21 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p21_R3a = '2' UNION ALL SELECT COUNT(p21_R3a) AS totalp21 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p21_R3a = '1' UNION ALL SELECT COUNT(p21_R3a) AS totalp21 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p21_R3a = '0')");

					while ($cR21Max= $csCMaxR21->fetchArray()) {
						$valMax21=$cR21Max['valMax'];
					}

					if ($valMax21 === $rSiempre) {
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p21_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p21_R3a = '3'");
					while ($cR21= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR21['rCasiSiempre'];
					}

					if ($valMax21 === $rCasiSiempre) {
						$colorCasiSiempre = 'naranja';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p21_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p21_R3a = '2'");
					while ($cR21= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR21['rAlgunasVeces'];
					}

					if ($valMax21 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p21_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p21_R3a = '1'");
					while ($cR21= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR21['rCasiNunca'];
					}

					if ($valMax21 === $rCasiNunca) {
						$colorCasiNunca = 'verde';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p21_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p21_R3a = '0'");
					while ($cR21= $csNunca->fetchArray()) {
						$rNunca=$cR21['rNunca'];
					}

					if ($valMax21 === $rNunca) {
						$colorNunca = 'azul';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR21p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR21p = (isset($sumaR21p)) ? $sumaR21p : 0;
					$por21rSiempre = round(($rSiempre/$sumaR21p)*100,0, PHP_ROUND_HALF_EVEN);
					$por21rCasiSiempre = round(($rCasiSiempre/$sumaR21p)*100,0, PHP_ROUND_HALF_EVEN);
					$por21rAlgunasVeces = round(($rAlgunasVeces/$sumaR21p)*100,0, PHP_ROUND_HALF_EVEN);
					$por21rCasiNunca = round(($rCasiNunca/$sumaR21p)*100,0, PHP_ROUND_HALF_EVEN);
					$por21rNunca = round(($rNunca/$sumaR21p)*100,0, PHP_ROUND_HALF_EVEN);

					$por21rSiempre = (isset($por21rSiempre)) ? $por21rSiempre : 0;
					$por21rCasiSiempre = (isset($por21rCasiSiempre)) ? $por21rCasiSiempre : 0;
					$por21rAlgunasVeces = (isset($por21rAlgunasVeces)) ? $por21rAlgunasVeces : 0;
					$por21rCasiNunca = (isset($por21rCasiNunca)) ? $por21rCasiNunca : 0;
					$por21rNunca = (isset($por21rNunca)) ? $por21rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado rojo">'.$por21rSiempre.'%</td>
						<td class="centrado naranja">'.$por21rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por21rAlgunasVeces.'%</td>
						<td class="centrado verde">'.$por21rCasiNunca.'%</td>
						<td class="centrado azul">'.$por21rNunca.'%</td>
					</tr>
					';
				echo'

				<tr>
					<td>22.-	Pienso que mis responsabilidades familiares afectan mi trabajo.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p22_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p22_R3a = '4'");
					while ($cR22= $csCSiempre->fetchArray()) {
						$rSiempre=$cR22['rSiempre'];
					}

					$csCMaxR22= $conPorPregunta -> query("SELECT MAX(totalp22) AS valMax FROM(SELECT COUNT(p22_R3a) AS totalp22 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p22_R3a = '4' UNION ALL SELECT COUNT(p22_R3a) AS totalp22 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p22_R3a = '3' UNION ALL SELECT COUNT(p22_R3a) AS totalp22 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p22_R3a = '2' UNION ALL SELECT COUNT(p22_R3a) AS totalp22 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p22_R3a = '1' UNION ALL SELECT COUNT(p22_R3a) AS totalp22 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p22_R3a = '0')");

					while ($cR22Max= $csCMaxR22->fetchArray()) {
						$valMax22=$cR22Max['valMax'];
					}

					if ($valMax22 === $rSiempre) {
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p22_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p22_R3a = '3'");
					while ($cR22= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR22['rCasiSiempre'];
					}

					if ($valMax22 === $rCasiSiempre) {
						$colorCasiSiempre = 'naranja';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p22_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p22_R3a = '2'");
					while ($cR22= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR22['rAlgunasVeces'];
					}

					if ($valMax22 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p22_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p22_R3a = '1'");
					while ($cR22= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR22['rCasiNunca'];
					}

					if ($valMax22 === $rCasiNunca) {
						$colorCasiNunca = 'verde';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p22_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p22_R3a = '0'");
					while ($cR22= $csNunca->fetchArray()) {
						$rNunca=$cR22['rNunca'];
					}

					if ($valMax22 === $rNunca) {
						$colorNunca = 'azul';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR22p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR22p = (isset($sumaR22p)) ? $sumaR22p : 0;
					$por22rSiempre = round(($rSiempre/$sumaR22p)*100,0, PHP_ROUND_HALF_EVEN);
					$por22rCasiSiempre = round(($rCasiSiempre/$sumaR22p)*100,0, PHP_ROUND_HALF_EVEN);
					$por22rAlgunasVeces = round(($rAlgunasVeces/$sumaR22p)*100,0, PHP_ROUND_HALF_EVEN);
					$por22rCasiNunca = round(($rCasiNunca/$sumaR22p)*100,0, PHP_ROUND_HALF_EVEN);
					$por22rNunca = round(($rNunca/$sumaR22p)*100,0, PHP_ROUND_HALF_EVEN);

					$por22rSiempre = (isset($por22rSiempre)) ? $por22rSiempre : 0;
					$por22rCasiSiempre = (isset($por22rCasiSiempre)) ? $por22rCasiSiempre : 0;
					$por22rAlgunasVeces = (isset($por22rAlgunasVeces)) ? $por22rAlgunasVeces : 0;
					$por22rCasiNunca = (isset($por22rCasiNunca)) ? $por22rCasiNunca : 0;
					$por22rNunca = (isset($por22rNunca)) ? $por22rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado rojo">'.$por22rSiempre.'%</td>
						<td class="centrado naranja">'.$por22rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por22rAlgunasVeces.'%</td>
						<td class="centrado verde">'.$por22rCasiNunca.'%</td>
						<td class="centrado azul">'.$por22rNunca.'%</td>
					</tr>
					';
				echo'
			</table>

			<br>


			<div style="font-size: .8em;">
				<h3>Organización del tiempo de trabajo</h3>
				<h4>Jornada de trabajo</h4>
				';
				
				$dDatos17_1a = '['.$por17rSiempre.','.$por17rCasiSiempre.','.$por17rAlgunasVeces.','.$por17rCasiNunca.','.$por17rNunca.']';

				$dDatos18_1a = '['.$por18rSiempre.','.$por18rCasiSiempre.','.$por18rAlgunasVeces.','.$por18rCasiNunca.','.$por18rNunca.']';

				$dDatos19_1a = '['.$por19rSiempre.','.$por19rCasiSiempre.','.$por19rAlgunasVeces.','.$por19rCasiNunca.','.$por19rNunca.']';

				$dDatos20_1a = '['.$por20rSiempre.','.$por20rCasiSiempre.','.$por20rAlgunasVeces.','.$por20rCasiNunca.','.$por20rNunca.']';

				$dDatos21_1a = '['.$por21rSiempre.','.$por21rCasiSiempre.','.$por21rAlgunasVeces.','.$por21rCasiNunca.','.$por21rNunca.']';

				$dDatos22_1a = '['.$por22rSiempre.','.$por22rCasiSiempre.','.$por22rAlgunasVeces.','.$por22rCasiNunca.','.$por22rNunca.']';


				echo'
				<table style="width: 800px;">
					<tr>
						<td class="tSinBorde" style="width: 400px;">
							<b>Jornadas de trabajo extensas (17, 18)</b>
							<div>
								<canvas id="grafica01c'.$varGraf.'"></canvas>
							</div>
							
						</td>
						<td class="tSinBorde" style="width: 400px;">
							<b>Influencia del trabajo fuera del centro laboral (19, 20)</b>
							<div>
								<canvas id="grafica02c'.$varGraf.'"></canvas>
							</div>
						</td>
					</tr>
					<tr>
						<td class="tSinBorde" style="width: 400px;">
							<b>Influencia de las responsabilidades familiares (21, 22)</b>
							<div>
								<canvas id="grafica03c'.$varGraf.'"></canvas>
							</div>
						</td>
					</tr>
					
				</table>
			</div>

			



			<br>


			<table style="font-size: .8em; width: 800px;">
				<tr>
					<td style="width: 300px;"><b>4.- Liderazgo y relaciones en el trabajo</b></td>
					<td style="width: 70px;">Siempre</td>
					<td style="width: 90px;">Casi siempre</td>
					<td style="width: 90px;">Algunas veces</td>
					<td style="width: 90px;">Casi nunca</td>
					<td>Nunca</td>
				</tr>
				<tr>
					<td>31.-	Me informan con claridad cuáles son mis funciones.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p31_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p31_R3a = '0'");
					while ($cR31= $csCSiempre->fetchArray()) {
						$rSiempre=$cR31['rSiempre'];
					}

					$csCMaxR31= $conPorPregunta -> query("SELECT MAX(totalP31) AS valMax FROM(SELECT COUNT(p31_R3a) AS totalP31 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p31_R3a = '4' UNION ALL SELECT COUNT(p31_R3a) AS totalP31 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p31_R3a = '3' UNION ALL SELECT COUNT(p31_R3a) AS totalP31 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p31_R3a = '2' UNION ALL SELECT COUNT(p31_R3a) AS totalP31 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p31_R3a = '1' UNION ALL SELECT COUNT(p31_R3a) AS totalP31 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p31_R3a = '0')");

					while ($cR31Max= $csCMaxR31->fetchArray()) {
						$valMax31=$cR31Max['valMax'];
					}

					if ($valMax31 === $rSiempre) {
						$colorSiempre = 'azul';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>

					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p31_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p31_R3a = '1'");
					while ($cR31= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR31['rCasiSiempre'];
					}

					if ($valMax31 === $rCasiSiempre) {
						$colorCasiSiempre = 'verde';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>

					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p31_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p31_R3a = '2'");
					while ($cR31= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR31['rAlgunasVeces'];
					}

					if ($valMax31 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>

					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p31_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p31_R3a = '3'");
					while ($cR31= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR31['rCasiNunca'];
					}

					if ($valMax31 === $rCasiNunca) {
						$colorCasiNunca = 'naranja';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>

					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p31_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p31_R3a = '4'");
					while ($cR31= $csNunca->fetchArray()) {
						$rNunca=$cR31['rNunca'];
					}

					if ($valMax31 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR31p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR31p = (isset($sumaR31p)) ? $sumaR31p : 0;
					$por31rSiempre = round(($rSiempre/$sumaR31p)*100,0, PHP_ROUND_HALF_EVEN);
					$por31rCasiSiempre = round(($rCasiSiempre/$sumaR31p)*100,0, PHP_ROUND_HALF_EVEN);
					$por31rAlgunasVeces = round(($rAlgunasVeces/$sumaR31p)*100,0, PHP_ROUND_HALF_EVEN);
					$por31rCasiNunca = round(($rCasiNunca/$sumaR31p)*100,0, PHP_ROUND_HALF_EVEN);
					$por31rNunca = round(($rNunca/$sumaR31p)*100,0, PHP_ROUND_HALF_EVEN);

					$por31rSiempre = (isset($por31rSiempre)) ? $por31rSiempre : 0;
					$por31rCasiSiempre = (isset($por31rCasiSiempre)) ? $por31rCasiSiempre : 0;
					$por31rAlgunasVeces = (isset($por31rAlgunasVeces)) ? $por31rAlgunasVeces : 0;
					$por31rCasiNunca = (isset($por31rCasiNunca)) ? $por31rCasiNunca : 0;
					$por31rNunca = (isset($por31rNunca)) ? $por31rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado azul">'.$por31rSiempre.'%</td>
						<td class="centrado verde">'.$por31rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por31rAlgunasVeces.'%</td>
						<td class="centrado naranja">'.$por31rCasiNunca.'%</td>
						<td class="centrado rojo">'.$por31rNunca.'%</td>
					</tr>
					';
				echo'
				<tr>
					<td>32.-	Me explican claramente los resultados que debo obtener en mi trabajo.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p32_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p32_R3a = '0'");
					while ($cR32= $csCSiempre->fetchArray()) {
						$rSiempre=$cR32['rSiempre'];
					}

					$csCMaxR32= $conPorPregunta -> query("SELECT MAX(totalp32) AS valMax FROM(SELECT COUNT(p32_R3a) AS totalp32 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p32_R3a = '4' UNION ALL SELECT COUNT(p32_R3a) AS totalp32 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p32_R3a = '3' UNION ALL SELECT COUNT(p32_R3a) AS totalp32 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p32_R3a = '2' UNION ALL SELECT COUNT(p32_R3a) AS totalp32 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p32_R3a = '1' UNION ALL SELECT COUNT(p32_R3a) AS totalp32 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p32_R3a = '0')");

					while ($cR32Max= $csCMaxR32->fetchArray()) {
						$valMax32=$cR32Max['valMax'];
					}

					if ($valMax32 === $rSiempre) {
						$colorSiempre = 'azul';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p32_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p32_R3a = '1'");
					while ($cR32= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR32['rCasiSiempre'];
					}

					if ($valMax32 === $rCasiSiempre) {
						$colorCasiSiempre = 'verde';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p32_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p32_R3a = '2'");
					while ($cR32= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR32['rAlgunasVeces'];
					}

					if ($valMax32 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p32_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p32_R3a = '3'");
					while ($cR32= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR32['rCasiNunca'];
					}

					if ($valMax32 === $rCasiNunca) {
						$colorCasiNunca = 'naranja';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p32_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p32_R3a = '4'");
					while ($cR32= $csNunca->fetchArray()) {
						$rNunca=$cR32['rNunca'];
					}

					if ($valMax32 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR32p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR32p = (isset($sumaR32p)) ? $sumaR32p : 0;
					$por32rSiempre = round(($rSiempre/$sumaR32p)*100,0, PHP_ROUND_HALF_EVEN);
					$por32rCasiSiempre = round(($rCasiSiempre/$sumaR32p)*100,0, PHP_ROUND_HALF_EVEN);
					$por32rAlgunasVeces = round(($rAlgunasVeces/$sumaR32p)*100,0, PHP_ROUND_HALF_EVEN);
					$por32rCasiNunca = round(($rCasiNunca/$sumaR32p)*100,0, PHP_ROUND_HALF_EVEN);
					$por32rNunca = round(($rNunca/$sumaR32p)*100,0, PHP_ROUND_HALF_EVEN);

					$por32rSiempre = (isset($por32rSiempre)) ? $por32rSiempre : 0;
					$por32rCasiSiempre = (isset($por32rCasiSiempre)) ? $por32rCasiSiempre : 0;
					$por32rAlgunasVeces = (isset($por32rAlgunasVeces)) ? $por32rAlgunasVeces : 0;
					$por32rCasiNunca = (isset($por32rCasiNunca)) ? $por32rCasiNunca : 0;
					$por32rNunca = (isset($por32rNunca)) ? $por32rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado azul">'.$por32rSiempre.'%</td>
						<td class="centrado verde">'.$por32rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por32rAlgunasVeces.'%</td>
						<td class="centrado naranja">'.$por32rCasiNunca.'%</td>
						<td class="centrado rojo">'.$por32rNunca.'%</td>
					</tr>
					';
				echo'
				<tr>
					<td>33.-	Me explican claramente los objetivos de mi trabajo.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p33_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p33_R3a = '0'");
					while ($cR33= $csCSiempre->fetchArray()) {
						$rSiempre=$cR33['rSiempre'];
					}

					$csCMaxR33= $conPorPregunta -> query("SELECT MAX(totalp33) AS valMax FROM(SELECT COUNT(p33_R3a) AS totalp33 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p33_R3a = '4' UNION ALL SELECT COUNT(p33_R3a) AS totalp33 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p33_R3a = '3' UNION ALL SELECT COUNT(p33_R3a) AS totalp33 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p33_R3a = '2' UNION ALL SELECT COUNT(p33_R3a) AS totalp33 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p33_R3a = '1' UNION ALL SELECT COUNT(p33_R3a) AS totalp33 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p33_R3a = '0')");

					while ($cR33Max= $csCMaxR33->fetchArray()) {
						$valMax33=$cR33Max['valMax'];
					}

					if ($valMax33 === $rSiempre) {
						$colorSiempre = 'azul';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p33_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p33_R3a = '1'");
					while ($cR33= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR33['rCasiSiempre'];
					}

					if ($valMax33 === $rCasiSiempre) {
						$colorCasiSiempre = 'verde';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p33_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p33_R3a = '2'");
					while ($cR33= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR33['rAlgunasVeces'];
					}

					if ($valMax33 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p33_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p33_R3a = '3'");
					while ($cR33= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR33['rCasiNunca'];
					}

					if ($valMax33 === $rCasiNunca) {
						$colorCasiNunca = 'naranja';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p33_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p33_R3a = '4'");
					while ($cR33= $csNunca->fetchArray()) {
						$rNunca=$cR33['rNunca'];
					}

					if ($valMax33 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR33p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR33p = (isset($sumaR33p)) ? $sumaR33p : 0;
					$por33rSiempre = round(($rSiempre/$sumaR33p)*100,0, PHP_ROUND_HALF_EVEN);
					$por33rCasiSiempre = round(($rCasiSiempre/$sumaR33p)*100,0, PHP_ROUND_HALF_EVEN);
					$por33rAlgunasVeces = round(($rAlgunasVeces/$sumaR33p)*100,0, PHP_ROUND_HALF_EVEN);
					$por33rCasiNunca = round(($rCasiNunca/$sumaR33p)*100,0, PHP_ROUND_HALF_EVEN);
					$por33rNunca = round(($rNunca/$sumaR33p)*100,0, PHP_ROUND_HALF_EVEN);

					$por33rSiempre = (isset($por33rSiempre)) ? $por33rSiempre : 0;
					$por33rCasiSiempre = (isset($por33rCasiSiempre)) ? $por33rCasiSiempre : 0;
					$por33rAlgunasVeces = (isset($por33rAlgunasVeces)) ? $por33rAlgunasVeces : 0;
					$por33rCasiNunca = (isset($por33rCasiNunca)) ? $por33rCasiNunca : 0;
					$por33rNunca = (isset($por33rNunca)) ? $por33rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado azul">'.$por33rSiempre.'%</td>
						<td class="centrado verde">'.$por33rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por33rAlgunasVeces.'%</td>
						<td class="centrado naranja">'.$por33rCasiNunca.'%</td>
						<td class="centrado rojo">'.$por33rNunca.'%</td>
					</tr>
					';
				echo'
				<tr>
					<td>34.-	Me informan con quién puedo resolver problemas o asuntos de trabajo.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p34_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p34_R3a = '0'");
					while ($cR34= $csCSiempre->fetchArray()) {
						$rSiempre=$cR34['rSiempre'];
					}

					$csCMaxR34= $conPorPregunta -> query("SELECT MAX(totalp34) AS valMax FROM(SELECT COUNT(p34_R3a) AS totalp34 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p34_R3a = '4' UNION ALL SELECT COUNT(p34_R3a) AS totalp34 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p34_R3a = '3' UNION ALL SELECT COUNT(p34_R3a) AS totalp34 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p34_R3a = '2' UNION ALL SELECT COUNT(p34_R3a) AS totalp34 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p34_R3a = '1' UNION ALL SELECT COUNT(p34_R3a) AS totalp34 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p34_R3a = '0')");

					while ($cR34Max= $csCMaxR34->fetchArray()) {
						$valMax34=$cR34Max['valMax'];
					}

					if ($valMax34 === $rSiempre) {
						$colorSiempre = 'azul';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p34_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p34_R3a = '1'");
					while ($cR34= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR34['rCasiSiempre'];
					}

					if ($valMax34 === $rCasiSiempre) {
						$colorCasiSiempre = 'verde';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p34_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p34_R3a = '2'");
					while ($cR34= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR34['rAlgunasVeces'];
					}

					if ($valMax34 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';
					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p34_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p34_R3a = '3'");
					while ($cR34= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR34['rCasiNunca'];
					}

					if ($valMax34 === $rCasiNunca) {
						$colorCasiNunca = 'naranja';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p34_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p34_R3a = '4'");
					while ($cR34= $csNunca->fetchArray()) {
						$rNunca=$cR34['rNunca'];
					}

					if ($valMax34 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR34p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR34p = (isset($sumaR34p)) ? $sumaR34p : 0;
					$por34rSiempre = round(($rSiempre/$sumaR34p)*100,0, PHP_ROUND_HALF_EVEN);
					$por34rCasiSiempre = round(($rCasiSiempre/$sumaR34p)*100,0, PHP_ROUND_HALF_EVEN);
					$por34rAlgunasVeces = round(($rAlgunasVeces/$sumaR34p)*100,0, PHP_ROUND_HALF_EVEN);
					$por34rCasiNunca = round(($rCasiNunca/$sumaR34p)*100,0, PHP_ROUND_HALF_EVEN);
					$por34rNunca = round(($rNunca/$sumaR34p)*100,0, PHP_ROUND_HALF_EVEN);

					$por34rSiempre = (isset($por34rSiempre)) ? $por34rSiempre : 0;
					$por34rCasiSiempre = (isset($por34rCasiSiempre)) ? $por34rCasiSiempre : 0;
					$por34rAlgunasVeces = (isset($por34rAlgunasVeces)) ? $por34rAlgunasVeces : 0;
					$por34rCasiNunca = (isset($por34rCasiNunca)) ? $por34rCasiNunca : 0;
					$por34rNunca = (isset($por34rNunca)) ? $por34rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado azul">'.$por34rSiempre.'%</td>
						<td class="centrado verde">'.$por34rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por34rAlgunasVeces.'%</td>
						<td class="centrado naranja">'.$por34rCasiNunca.'%</td>
						<td class="centrado rojo">'.$por34rNunca.'%</td>
					</tr>
					';
				echo'
				<tr>
					<td>37.-	Mi jefe ayuda a organizar mejor el trabajo.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p37_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p37_R3a = '0'");
					while ($cR37= $csCSiempre->fetchArray()) {
						$rSiempre=$cR37['rSiempre'];
					}

					$csCMaxR37= $conPorPregunta -> query("SELECT MAX(totalp37) AS valMax FROM(SELECT COUNT(p37_R3a) AS totalp37 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p37_R3a = '4' UNION ALL SELECT COUNT(p37_R3a) AS totalp37 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p37_R3a = '3' UNION ALL SELECT COUNT(p37_R3a) AS totalp37 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p37_R3a = '2' UNION ALL SELECT COUNT(p37_R3a) AS totalp37 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p37_R3a = '1' UNION ALL SELECT COUNT(p37_R3a) AS totalp37 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p37_R3a = '0')");

					while ($cR37Max= $csCMaxR37->fetchArray()) {
						$valMax37=$cR37Max['valMax'];
					}

					if ($valMax37 === $rSiempre) {
						$colorSiempre = 'azul';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p37_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p37_R3a = '1'");
					while ($cR37= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR37['rCasiSiempre'];
					}

					if ($valMax37 === $rCasiSiempre) {
						$colorCasiSiempre = 'verde';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p37_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p37_R3a = '2'");
					while ($cR37= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR37['rAlgunasVeces'];
					}

					if ($valMax37 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p37_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p37_R3a = '3'");
					while ($cR37= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR37['rCasiNunca'];
					}

					if ($valMax37 === $rCasiNunca) {
						$colorCasiNunca = 'naranja';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p37_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p37_R3a = '4'");
					while ($cR37= $csNunca->fetchArray()) {
						$rNunca=$cR37['rNunca'];
					}

					if ($valMax37 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR37p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR37p = (isset($sumaR37p)) ? $sumaR37p : 0;
					$por37rSiempre = round(($rSiempre/$sumaR37p)*100,0, PHP_ROUND_HALF_EVEN);
					$por37rCasiSiempre = round(($rCasiSiempre/$sumaR37p)*100,0, PHP_ROUND_HALF_EVEN);
					$por37rAlgunasVeces = round(($rAlgunasVeces/$sumaR37p)*100,0, PHP_ROUND_HALF_EVEN);
					$por37rCasiNunca = round(($rCasiNunca/$sumaR37p)*100,0, PHP_ROUND_HALF_EVEN);
					$por37rNunca = round(($rNunca/$sumaR37p)*100,0, PHP_ROUND_HALF_EVEN);

					$por37rSiempre = (isset($por37rSiempre)) ? $por37rSiempre : 0;
					$por37rCasiSiempre = (isset($por37rCasiSiempre)) ? $por37rCasiSiempre : 0;
					$por37rAlgunasVeces = (isset($por37rAlgunasVeces)) ? $por37rAlgunasVeces : 0;
					$por37rCasiNunca = (isset($por37rCasiNunca)) ? $por37rCasiNunca : 0;
					$por37rNunca = (isset($por37rNunca)) ? $por37rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado azul">'.$por37rSiempre.'%</td>
						<td class="centrado verde">'.$por37rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por37rAlgunasVeces.'%</td>
						<td class="centrado naranja">'.$por37rCasiNunca.'%</td>
						<td class="centrado rojo">'.$por37rNunca.'%</td>
					</tr>
					';
				echo'
					<td>38.-	Mi jefe tiene en cuenta mis puntos de vista y opiniones.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p38_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p38_R3a = '0'");
					while ($cR38= $csCSiempre->fetchArray()) {
						$rSiempre=$cR38['rSiempre'];
					}

					$csCMaxR38= $conPorPregunta -> query("SELECT MAX(totalp38) AS valMax FROM(SELECT COUNT(p38_R3a) AS totalp38 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p38_R3a = '4' UNION ALL SELECT COUNT(p38_R3a) AS totalp38 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p38_R3a = '3' UNION ALL SELECT COUNT(p38_R3a) AS totalp38 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p38_R3a = '2' UNION ALL SELECT COUNT(p38_R3a) AS totalp38 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p38_R3a = '1' UNION ALL SELECT COUNT(p38_R3a) AS totalp38 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p38_R3a = '0')");

					while ($cR38Max= $csCMaxR38->fetchArray()) {
						$valMax38=$cR38Max['valMax'];
					}

					if ($valMax38 === $rSiempre) {
						$colorSiempre = 'azul';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p38_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p38_R3a = '1'");
					while ($cR38= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR38['rCasiSiempre'];
					}

					if ($valMax38 === $rCasiSiempre) {
						$colorCasiSiempre = 'verde';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p38_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p38_R3a = '2'");
					while ($cR38= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR38['rAlgunasVeces'];
					}

					if ($valMax38 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p38_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p38_R3a = '3'");
					while ($cR38= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR38['rCasiNunca'];
					}

					if ($valMax38 === $rCasiNunca) {
						$colorCasiNunca = 'naranja';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p38_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p38_R3a = '4'");
					while ($cR38= $csNunca->fetchArray()) {
						$rNunca=$cR38['rNunca'];
					}

					if ($valMax38 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR38p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR38p = (isset($sumaR38p)) ? $sumaR38p : 0;
					$por38rSiempre = round(($rSiempre/$sumaR38p)*100,0, PHP_ROUND_HALF_EVEN);
					$por38rCasiSiempre = round(($rCasiSiempre/$sumaR38p)*100,0, PHP_ROUND_HALF_EVEN);
					$por38rAlgunasVeces = round(($rAlgunasVeces/$sumaR38p)*100,0, PHP_ROUND_HALF_EVEN);
					$por38rCasiNunca = round(($rCasiNunca/$sumaR38p)*100,0, PHP_ROUND_HALF_EVEN);
					$por38rNunca = round(($rNunca/$sumaR38p)*100,0, PHP_ROUND_HALF_EVEN);

					$por38rSiempre = (isset($por38rSiempre)) ? $por38rSiempre : 0;
					$por38rCasiSiempre = (isset($por38rCasiSiempre)) ? $por38rCasiSiempre : 0;
					$por38rAlgunasVeces = (isset($por38rAlgunasVeces)) ? $por38rAlgunasVeces : 0;
					$por38rCasiNunca = (isset($por38rCasiNunca)) ? $por38rCasiNunca : 0;
					$por38rNunca = (isset($por38rNunca)) ? $por38rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado azul">'.$por38rSiempre.'%</td>
						<td class="centrado verde">'.$por38rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por38rAlgunasVeces.'%</td>
						<td class="centrado naranja">'.$por38rCasiNunca.'%</td>
						<td class="centrado rojo">'.$por38rNunca.'%</td>
					</tr>
					';
				echo'
					<td>39.-	Mi jefe me comunica a tiempo la información relacionada con el trabajo.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p39_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p39_R3a = '0'");
					while ($cR39= $csCSiempre->fetchArray()) {
						$rSiempre=$cR39['rSiempre'];
					}

					$csCMaxR39= $conPorPregunta -> query("SELECT MAX(totalp39) AS valMax FROM(SELECT COUNT(p39_R3a) AS totalp39 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p39_R3a = '4' UNION ALL SELECT COUNT(p39_R3a) AS totalp39 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p39_R3a = '3' UNION ALL SELECT COUNT(p39_R3a) AS totalp39 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p39_R3a = '2' UNION ALL SELECT COUNT(p39_R3a) AS totalp39 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p39_R3a = '1' UNION ALL SELECT COUNT(p39_R3a) AS totalp39 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p39_R3a = '0')");

					while ($cR39Max= $csCMaxR39->fetchArray()) {
						$valMax39=$cR39Max['valMax'];
					}

					if ($valMax39 === $rSiempre) {
						$colorSiempre = 'azul';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p39_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p39_R3a = '1'");
					while ($cR39= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR39['rCasiSiempre'];
					}

					if ($valMax39 === $rCasiSiempre) {
						$colorCasiSiempre = 'verde';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p39_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p39_R3a = '2'");
					while ($cR39= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR39['rAlgunasVeces'];
					}

					if ($valMax39 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p39_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p39_R3a = '3'");
					while ($cR39= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR39['rCasiNunca'];
					}

					if ($valMax39 === $rCasiNunca) {
						$colorCasiNunca = 'naranaja';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p39_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p39_R3a = '4'");
					while ($cR39= $csNunca->fetchArray()) {
						$rNunca=$cR39['rNunca'];
					}

					if ($valMax39 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR39p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR39p = (isset($sumaR39p)) ? $sumaR39p : 0;
					$por39rSiempre = round(($rSiempre/$sumaR39p)*100,0, PHP_ROUND_HALF_EVEN);
					$por39rCasiSiempre = round(($rCasiSiempre/$sumaR39p)*100,0, PHP_ROUND_HALF_EVEN);
					$por39rAlgunasVeces = round(($rAlgunasVeces/$sumaR39p)*100,0, PHP_ROUND_HALF_EVEN);
					$por39rCasiNunca = round(($rCasiNunca/$sumaR39p)*100,0, PHP_ROUND_HALF_EVEN);
					$por39rNunca = round(($rNunca/$sumaR39p)*100,0, PHP_ROUND_HALF_EVEN);

					$por39rSiempre = (isset($por39rSiempre)) ? $por39rSiempre : 0;
					$por39rCasiSiempre = (isset($por39rCasiSiempre)) ? $por39rCasiSiempre : 0;
					$por39rAlgunasVeces = (isset($por39rAlgunasVeces)) ? $por39rAlgunasVeces : 0;
					$por39rCasiNunca = (isset($por39rCasiNunca)) ? $por39rCasiNunca : 0;
					$por39rNunca = (isset($por39rNunca)) ? $por39rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado azul">'.$por39rSiempre.'%</td>
						<td class="centrado verde">'.$por39rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por39rAlgunasVeces.'%</td>
						<td class="centrado naranja">'.$por39rCasiNunca.'%</td>
						<td class="centrado rojo">'.$por39rNunca.'%</td>
					</tr>
					';
				echo'
					<td>40.-	La orientación que me da mi jefe me ayuda a realizar mejor mi trabajo.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p40_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p40_R3a = '0'");
					while ($cR40= $csCSiempre->fetchArray()) {
						$rSiempre=$cR40['rSiempre'];
					}

					$csCMaxR40= $conPorPregunta -> query("SELECT MAX(totalp40) AS valMax FROM(SELECT COUNT(p40_R3a) AS totalp40 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p40_R3a = '4' UNION ALL SELECT COUNT(p40_R3a) AS totalp40 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p40_R3a = '3' UNION ALL SELECT COUNT(p40_R3a) AS totalp40 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p40_R3a = '2' UNION ALL SELECT COUNT(p40_R3a) AS totalp40 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p40_R3a = '1' UNION ALL SELECT COUNT(p40_R3a) AS totalp40 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p40_R3a = '0')");

					while ($cR40Max= $csCMaxR40->fetchArray()) {
						$valMax40=$cR40Max['valMax'];
					}

					if ($valMax40 === $rSiempre) {
						$colorSiempre = 'azul';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p40_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p40_R3a = '1'");
					while ($cR40= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR40['rCasiSiempre'];
					}

					if ($valMax40 === $rCasiSiempre) {
						$colorCasiSiempre = 'verde';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p40_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p40_R3a = '2'");
					while ($cR40= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR40['rAlgunasVeces'];
					}

					if ($valMax40 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p40_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p40_R3a = '3'");
					while ($cR40= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR40['rCasiNunca'];
					}

					if ($valMax40 === $rCasiNunca) {
						$colorCasiNunca = 'naranja';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p40_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p40_R3a = '4'");
					while ($cR40= $csNunca->fetchArray()) {
						$rNunca=$cR40['rNunca'];
					}

					if ($valMax40 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR40p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR40p = (isset($sumaR40p)) ? $sumaR40p : 0;
					$por40rSiempre = round(($rSiempre/$sumaR40p)*100,0, PHP_ROUND_HALF_EVEN);
					$por40rCasiSiempre = round(($rCasiSiempre/$sumaR40p)*100,0, PHP_ROUND_HALF_EVEN);
					$por40rAlgunasVeces = round(($rAlgunasVeces/$sumaR40p)*100,0, PHP_ROUND_HALF_EVEN);
					$por40rCasiNunca = round(($rCasiNunca/$sumaR40p)*100,0, PHP_ROUND_HALF_EVEN);
					$por40rNunca = round(($rNunca/$sumaR40p)*100,0, PHP_ROUND_HALF_EVEN);

					$por40rSiempre = (isset($por40rSiempre)) ? $por40rSiempre : 0;
					$por40rCasiSiempre = (isset($por40rCasiSiempre)) ? $por40rCasiSiempre : 0;
					$por40rAlgunasVeces = (isset($por40rAlgunasVeces)) ? $por40rAlgunasVeces : 0;
					$por40rCasiNunca = (isset($por40rCasiNunca)) ? $por40rCasiNunca : 0;
					$por40rNunca = (isset($por40rNunca)) ? $por40rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado azul">'.$por40rSiempre.'%</td>
						<td class="centrado verde">'.$por40rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por40rAlgunasVeces.'%</td>
						<td class="centrado naranja">'.$por40rCasiNunca.'%</td>
						<td class="centrado rojo">'.$por40rNunca.'%</td>
					</tr>
					';
				echo'
					<td>41.-	Mi jefe ayuda a solucionar los problemas que se presentan en el trabajo.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p41_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p41_R3a = '0'");
					while ($cR41= $csCSiempre->fetchArray()) {
						$rSiempre=$cR41['rSiempre'];
					}

					$csCMaxR41= $conPorPregunta -> query("SELECT MAX(totalp41) AS valMax FROM(SELECT COUNT(p41_R3a) AS totalp41 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p41_R3a = '4' UNION ALL SELECT COUNT(p41_R3a) AS totalp41 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p41_R3a = '3' UNION ALL SELECT COUNT(p41_R3a) AS totalp41 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p41_R3a = '2' UNION ALL SELECT COUNT(p41_R3a) AS totalp41 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p41_R3a = '1' UNION ALL SELECT COUNT(p41_R3a) AS totalp41 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p41_R3a = '0')");

					while ($cR41Max= $csCMaxR41->fetchArray()) {
						$valMax41=$cR41Max['valMax'];
					}

					if ($valMax41 === $rSiempre) {
						$colorSiempre = 'azul';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p41_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p41_R3a = '1'");
					while ($cR41= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR41['rCasiSiempre'];
					}

					if ($valMax41 === $rCasiSiempre) {
						$colorCasiSiempre = 'verde';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p41_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p41_R3a = '2'");
					while ($cR41= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR41['rAlgunasVeces'];
					}

					if ($valMax41 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p41_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p41_R3a = '3'");
					while ($cR41= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR41['rCasiNunca'];
					}

					if ($valMax41 === $rCasiNunca) {
						$colorCasiNunca = 'naranja';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p41_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p41_R3a = '4'");
					while ($cR41= $csNunca->fetchArray()) {
						$rNunca=$cR41['rNunca'];
					}

					if ($valMax41 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR41p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR41p = (isset($sumaR41p)) ? $sumaR41p : 0;
					$por41rSiempre = round(($rSiempre/$sumaR41p)*100,0, PHP_ROUND_HALF_EVEN);
					$por41rCasiSiempre = round(($rCasiSiempre/$sumaR41p)*100,0, PHP_ROUND_HALF_EVEN);
					$por41rAlgunasVeces = round(($rAlgunasVeces/$sumaR41p)*100,0, PHP_ROUND_HALF_EVEN);
					$por41rCasiNunca = round(($rCasiNunca/$sumaR41p)*100,0, PHP_ROUND_HALF_EVEN);
					$por41rNunca = round(($rNunca/$sumaR41p)*100,0, PHP_ROUND_HALF_EVEN);

					$por41rSiempre = (isset($por41rSiempre)) ? $por41rSiempre : 0;
					$por41rCasiSiempre = (isset($por41rCasiSiempre)) ? $por41rCasiSiempre : 0;
					$por41rAlgunasVeces = (isset($por41rAlgunasVeces)) ? $por41rAlgunasVeces : 0;
					$por41rCasiNunca = (isset($por41rCasiNunca)) ? $por41rCasiNunca : 0;
					$por41rNunca = (isset($por41rNunca)) ? $por41rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado azul">'.$por41rSiempre.'%</td>
						<td class="centrado verde">'.$por41rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por41rAlgunasVeces.'%</td>
						<td class="centrado naranja">'.$por41rCasiNunca.'%</td>
						<td class="centrado rojo">'.$por41rNunca.'%</td>
					</tr>
					';
				echo'
					<td>42.-	Puedo confiar en mis compañeros de trabajo.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p42_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p42_R3a = '0'");
					while ($cR42= $csCSiempre->fetchArray()) {
						$rSiempre=$cR42['rSiempre'];
					}

					$csCMaxR42= $conPorPregunta -> query("SELECT MAX(totalp42) AS valMax FROM(SELECT COUNT(p42_R3a) AS totalp42 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p42_R3a = '4' UNION ALL SELECT COUNT(p42_R3a) AS totalp42 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p42_R3a = '3' UNION ALL SELECT COUNT(p42_R3a) AS totalp42 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p42_R3a = '2' UNION ALL SELECT COUNT(p42_R3a) AS totalp42 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p42_R3a = '1' UNION ALL SELECT COUNT(p42_R3a) AS totalp42 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p42_R3a = '0')");

					while ($cR42Max= $csCMaxR42->fetchArray()) {
						$valMax42=$cR42Max['valMax'];
					}

					if ($valMax42 === $rSiempre) {
						$colorSiempre = 'azul';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p42_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p42_R3a = '1'");
					while ($cR42= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR42['rCasiSiempre'];
					}

					if ($valMax42 === $rCasiSiempre) {
						$colorCasiSiempre = 'verde';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p42_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p42_R3a = '2'");
					while ($cR42= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR42['rAlgunasVeces'];
					}

					if ($valMax42 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p42_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p42_R3a = '3'");
					while ($cR42= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR42['rCasiNunca'];
					}

					if ($valMax42 === $rCasiNunca) {
						$colorCasiNunca = 'naranja';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p42_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p42_R3a = '4'");
					while ($cR42= $csNunca->fetchArray()) {
						$rNunca=$cR42['rNunca'];
					}

					if ($valMax42 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR42p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR42p = (isset($sumaR42p)) ? $sumaR42p : 0;
					$por42rSiempre = round(($rSiempre/$sumaR42p)*100,0, PHP_ROUND_HALF_EVEN);
					$por42rCasiSiempre = round(($rCasiSiempre/$sumaR42p)*100,0, PHP_ROUND_HALF_EVEN);
					$por42rAlgunasVeces = round(($rAlgunasVeces/$sumaR42p)*100,0, PHP_ROUND_HALF_EVEN);
					$por42rCasiNunca = round(($rCasiNunca/$sumaR42p)*100,0, PHP_ROUND_HALF_EVEN);
					$por42rNunca = round(($rNunca/$sumaR42p)*100,0, PHP_ROUND_HALF_EVEN);

					$por42rSiempre = (isset($por42rSiempre)) ? $por42rSiempre : 0;
					$por42rCasiSiempre = (isset($por42rCasiSiempre)) ? $por42rCasiSiempre : 0;
					$por42rAlgunasVeces = (isset($por42rAlgunasVeces)) ? $por42rAlgunasVeces : 0;
					$por42rCasiNunca = (isset($por42rCasiNunca)) ? $por42rCasiNunca : 0;
					$por42rNunca = (isset($por42rNunca)) ? $por42rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado azul">'.$por42rSiempre.'%</td>
						<td class="centrado verde">'.$por42rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por42rAlgunasVeces.'%</td>
						<td class="centrado naranja">'.$por42rCasiNunca.'%</td>
						<td class="centrado rojo">'.$por42rNunca.'%</td>
					</tr>
					';
				echo'
					<td>43.-	Entre compañeros solucionamos los problemas de trabajo de forma respetuosa.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p43_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p43_R3a = '0'");
					while ($cR43= $csCSiempre->fetchArray()) {
						$rSiempre=$cR43['rSiempre'];
					}

					$csCMaxR43= $conPorPregunta -> query("SELECT MAX(totalp43) AS valMax FROM(SELECT COUNT(p43_R3a) AS totalp43 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p43_R3a = '4' UNION ALL SELECT COUNT(p43_R3a) AS totalp43 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p43_R3a = '3' UNION ALL SELECT COUNT(p43_R3a) AS totalp43 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p43_R3a = '2' UNION ALL SELECT COUNT(p43_R3a) AS totalp43 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p43_R3a = '1' UNION ALL SELECT COUNT(p43_R3a) AS totalp43 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p43_R3a = '0')");

					while ($cR43Max= $csCMaxR43->fetchArray()) {
						$valMax43=$cR43Max['valMax'];
					}

					if ($valMax43 === $rSiempre) {
						$colorSiempre = 'azul';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p43_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p43_R3a = '1'");
					while ($cR43= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR43['rCasiSiempre'];
					}

					if ($valMax43 === $rCasiSiempre) {
						$colorCasiSiempre = 'verde';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p43_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p43_R3a = '2'");
					while ($cR43= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR43['rAlgunasVeces'];
					}

					if ($valMax43 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p43_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p43_R3a = '3'");
					while ($cR43= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR43['rCasiNunca'];
					}

					if ($valMax43 === $rCasiNunca) {
						$colorCasiNunca = 'naranja';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p43_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p43_R3a = '4'");
					while ($cR43= $csNunca->fetchArray()) {
						$rNunca=$cR43['rNunca'];
					}

					if ($valMax43 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR43p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR43p = (isset($sumaR43p)) ? $sumaR43p : 0;
					$por43rSiempre = round(($rSiempre/$sumaR43p)*100,0, PHP_ROUND_HALF_EVEN);
					$por43rCasiSiempre = round(($rCasiSiempre/$sumaR43p)*100,0, PHP_ROUND_HALF_EVEN);
					$por43rAlgunasVeces = round(($rAlgunasVeces/$sumaR43p)*100,0, PHP_ROUND_HALF_EVEN);
					$por43rCasiNunca = round(($rCasiNunca/$sumaR43p)*100,0, PHP_ROUND_HALF_EVEN);
					$por43rNunca = round(($rNunca/$sumaR43p)*100,0, PHP_ROUND_HALF_EVEN);

					$por43rSiempre = (isset($por43rSiempre)) ? $por43rSiempre : 0;
					$por43rCasiSiempre = (isset($por43rCasiSiempre)) ? $por43rCasiSiempre : 0;
					$por43rAlgunasVeces = (isset($por43rAlgunasVeces)) ? $por43rAlgunasVeces : 0;
					$por43rCasiNunca = (isset($por43rCasiNunca)) ? $por43rCasiNunca : 0;
					$por43rNunca = (isset($por43rNunca)) ? $por43rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado azul">'.$por43rSiempre.'%</td>
						<td class="centrado verde">'.$por43rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por43rAlgunasVeces.'%</td>
						<td class="centrado naranja">'.$por43rCasiNunca.'%</td>
						<td class="centrado rojo">'.$por43rNunca.'%</td>
					</tr>
					';
				echo'
					<tr>
					<td>44.-	En mi trabajo me hacen sentir parte del grupo.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p44_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p44_R3a = '0'");
					while ($cR44= $csCSiempre->fetchArray()) {
						$rSiempre=$cR44['rSiempre'];
					}

					$csCMaxR44= $conPorPregunta -> query("SELECT MAX(totalp44) AS valMax FROM(SELECT COUNT(p44_R3a) AS totalp44 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p44_R3a = '4' UNION ALL SELECT COUNT(p44_R3a) AS totalp44 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p44_R3a = '3' UNION ALL SELECT COUNT(p44_R3a) AS totalp44 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p44_R3a = '2' UNION ALL SELECT COUNT(p44_R3a) AS totalp44 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p44_R3a = '1' UNION ALL SELECT COUNT(p44_R3a) AS totalp44 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p44_R3a = '0')");

					while ($cR44Max= $csCMaxR44->fetchArray()) {
						$valMax44=$cR44Max['valMax'];
					}

					if ($valMax44 === $rSiempre) {
						$colorSiempre = 'azul';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p44_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p44_R3a = '1'");
					while ($cR44= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR44['rCasiSiempre'];
					}

					if ($valMax44 === $rCasiSiempre) {
						$colorCasiSiempre = 'verde';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p44_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p44_R3a = '2'");
					while ($cR44= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR44['rAlgunasVeces'];
					}

					if ($valMax44 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p44_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p44_R3a = '3'");
					while ($cR44= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR44['rCasiNunca'];
					}

					if ($valMax44 === $rCasiNunca) {
						$colorCasiNunca = 'naranja';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p44_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p44_R3a = '4'");
					while ($cR44= $csNunca->fetchArray()) {
						$rNunca=$cR44['rNunca'];
					}

					if ($valMax4 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR44p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR44p = (isset($sumaR44p)) ? $sumaR44p : 0;
					$por44rSiempre = round(($rSiempre/$sumaR44p)*100,0, PHP_ROUND_HALF_EVEN);
					$por44rCasiSiempre = round(($rCasiSiempre/$sumaR44p)*100,0, PHP_ROUND_HALF_EVEN);
					$por44rAlgunasVeces = round(($rAlgunasVeces/$sumaR44p)*100,0, PHP_ROUND_HALF_EVEN);
					$por44rCasiNunca = round(($rCasiNunca/$sumaR44p)*100,0, PHP_ROUND_HALF_EVEN);
					$por44rNunca = round(($rNunca/$sumaR44p)*100,0, PHP_ROUND_HALF_EVEN);

					$por44rSiempre = (isset($por44rSiempre)) ? $por44rSiempre : 0;
					$por44rCasiSiempre = (isset($por44rCasiSiempre)) ? $por44rCasiSiempre : 0;
					$por44rAlgunasVeces = (isset($por44rAlgunasVeces)) ? $por44rAlgunasVeces : 0;
					$por44rCasiNunca = (isset($por44rCasiNunca)) ? $por44rCasiNunca : 0;
					$por44rNunca = (isset($por44rNunca)) ? $por44rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado azul">'.$por44rSiempre.'%</td>
						<td class="centrado verde">'.$por44rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por44rAlgunasVeces.'%</td>
						<td class="centrado naranja">'.$por44rCasiNunca.'%</td>
						<td class="centrado rojo">'.$por44rNunca.'%</td>
					</tr>
					';
				echo'

					<tr>
					<td>45.-	Cuando tenemos que realizar trabajo de equipo los compañeros colaboran.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p45_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p45_R3a = '0'");
					while ($cR45= $csCSiempre->fetchArray()) {
						$rSiempre=$cR45['rSiempre'];
					}

					$csCMaxR45= $conPorPregunta -> query("SELECT MAX(totalp45) AS valMax FROM(SELECT COUNT(p45_R3a) AS totalp45 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p45_R3a = '4' UNION ALL SELECT COUNT(p45_R3a) AS totalp45 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p45_R3a = '3' UNION ALL SELECT COUNT(p45_R3a) AS totalp45 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p45_R3a = '2' UNION ALL SELECT COUNT(p45_R3a) AS totalp45 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p45_R3a = '1' UNION ALL SELECT COUNT(p45_R3a) AS totalp45 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p45_R3a = '0')");

					while ($cR45Max= $csCMaxR45->fetchArray()) {
						$valMax45=$cR45Max['valMax'];
					}

					if ($valMax45 === $rSiempre) {
						$colorSiempre = 'azul';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p45_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p45_R3a = '1'");
					while ($cR45= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR45['rCasiSiempre'];
					}

					if ($valMax45 === $rCasiSiempre) {
						$colorCasiSiempre = 'verde';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p45_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p45_R3a = '2'");
					while ($cR45= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR45['rAlgunasVeces'];
					}

					if ($valMax45 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p45_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p45_R3a = '3'");
					while ($cR45= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR45['rCasiNunca'];
					}

					if ($valMax45 === $rCasiNunca) {
						$colorCasiNunca = 'naranja';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p45_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p45_R3a = '4'");
					while ($cR45= $csNunca->fetchArray()) {
						$rNunca=$cR45['rNunca'];
					}

					if ($valMax45 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR45p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR45p = (isset($sumaR45p)) ? $sumaR45p : 0;
					$por45rSiempre = round(($rSiempre/$sumaR45p)*100,0, PHP_ROUND_HALF_EVEN);
					$por45rCasiSiempre = round(($rCasiSiempre/$sumaR45p)*100,0, PHP_ROUND_HALF_EVEN);
					$por45rAlgunasVeces = round(($rAlgunasVeces/$sumaR45p)*100,0, PHP_ROUND_HALF_EVEN);
					$por45rCasiNunca = round(($rCasiNunca/$sumaR45p)*100,0, PHP_ROUND_HALF_EVEN);
					$por45rNunca = round(($rNunca/$sumaR45p)*100,0, PHP_ROUND_HALF_EVEN);

					$por45rSiempre = (isset($por45rSiempre)) ? $por45rSiempre : 0;
					$por45rCasiSiempre = (isset($por45rCasiSiempre)) ? $por45rCasiSiempre : 0;
					$por45rAlgunasVeces = (isset($por45rAlgunasVeces)) ? $por45rAlgunasVeces : 0;
					$por45rCasiNunca = (isset($por45rCasiNunca)) ? $por45rCasiNunca : 0;
					$por45rNunca = (isset($por45rNunca)) ? $por45rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado azul">'.$por45rSiempre.'%</td>
						<td class="centrado verde">'.$por45rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por45rAlgunasVeces.'%</td>
						<td class="centrado naranja">'.$por45rCasiNunca.'%</td>
						<td class="centrado rojo">'.$por45rNunca.'%</td>
					</tr>
					';
				echo'

					<tr>
					<td>46.-	Mis compañeros de trabajo me ayudan cuando tengo dificultades.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p46_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p46_R3a = '0'");
					while ($cR46= $csCSiempre->fetchArray()) {
						$rSiempre=$cR46['rSiempre'];
					}

					$csCMaxR46= $conPorPregunta -> query("SELECT MAX(totalp46) AS valMax FROM(SELECT COUNT(p46_R3a) AS totalp46 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p46_R3a = '4' UNION ALL SELECT COUNT(p46_R3a) AS totalp46 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p46_R3a = '3' UNION ALL SELECT COUNT(p46_R3a) AS totalp46 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p46_R3a = '2' UNION ALL SELECT COUNT(p46_R3a) AS totalp46 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p46_R3a = '1' UNION ALL SELECT COUNT(p46_R3a) AS totalp46 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p46_R3a = '0')");

					while ($cR46Max= $csCMaxR46->fetchArray()) {
						$valMax46=$cR46Max['valMax'];
					}

					if ($valMax46 === $rSiempre) {
						$colorSiempre = 'azul';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p46_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p46_R3a = '1'");
					while ($cR46= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR46['rCasiSiempre'];
					}

					if ($valMax46 === $rCasiSiempre) {
						$colorCasiSiempre = 'verde';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p46_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p46_R3a = '2'");
					while ($cR46= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR46['rAlgunasVeces'];
					}

					if ($valMax46 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p46_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p46_R3a = '3'");
					while ($cR46= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR46['rCasiNunca'];
					}

					if ($valMax46 === $rCasiNunca) {
						$colorCasiNunca = 'naranja';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p46_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p46_R3a = '4'");
					while ($cR46= $csNunca->fetchArray()) {
						$rNunca=$cR46['rNunca'];
					}

					if ($valMax46 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR46p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR46p = (isset($sumaR46p)) ? $sumaR46p : 0;
					$por46rSiempre = round(($rSiempre/$sumaR46p)*100,0, PHP_ROUND_HALF_EVEN);
					$por46rCasiSiempre = round(($rCasiSiempre/$sumaR46p)*100,0, PHP_ROUND_HALF_EVEN);
					$por46rAlgunasVeces = round(($rAlgunasVeces/$sumaR46p)*100,0, PHP_ROUND_HALF_EVEN);
					$por46rCasiNunca = round(($rCasiNunca/$sumaR46p)*100,0, PHP_ROUND_HALF_EVEN);
					$por46rNunca = round(($rNunca/$sumaR46p)*100,0, PHP_ROUND_HALF_EVEN);

					$por46rSiempre = (isset($por46rSiempre)) ? $por46rSiempre : 0;
					$por46rCasiSiempre = (isset($por46rCasiSiempre)) ? $por46rCasiSiempre : 0;
					$por46rAlgunasVeces = (isset($por46rAlgunasVeces)) ? $por46rAlgunasVeces : 0;
					$por46rCasiNunca = (isset($por46rCasiNunca)) ? $por46rCasiNunca : 0;
					$por46rNunca = (isset($por46rNunca)) ? $por46rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado azul">'.$por46rSiempre.'%</td>
						<td class="centrado verde">'.$por46rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por46rAlgunasVeces.'%</td>
						<td class="centrado naranja">'.$por46rCasiNunca.'%</td>
						<td class="centrado rojo">'.$por46rNunca.'%</td>
					</tr>
					';
				echo'

					<tr>
					<td>57.-	En mi trabajo puedo expresarme libremente sin interrupciones.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p57_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p57_R3a = '0'");
					while ($cR57= $csCSiempre->fetchArray()) {
						$rSiempre=$cR57['rSiempre'];
					}

					$csCMaxR57= $conPorPregunta -> query("SELECT MAX(totalp57) AS valMax FROM(SELECT COUNT(p57_R3a) AS totalp57 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p57_R3a = '4' UNION ALL SELECT COUNT(p57_R3a) AS totalp57 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p57_R3a = '3' UNION ALL SELECT COUNT(p57_R3a) AS totalp57 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p57_R3a = '2' UNION ALL SELECT COUNT(p57_R3a) AS totalp57 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p57_R3a = '1' UNION ALL SELECT COUNT(p57_R3a) AS totalp57 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p57_R3a = '0')");

					while ($cR57Max= $csCMaxR57->fetchArray()) {
						$valMax57=$cR57Max['valMax'];
					}

					if ($valMax57 === $rSiempre) {
						$colorSiempre = 'azul';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p57_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p57_R3a = '1'");
					while ($cR57= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR57['rCasiSiempre'];
					}

					if ($valMax57 === $rCasiSiempre) {
						$colorCasiSiempre = 'verde';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p57_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p57_R3a = '2'");
					while ($cR57= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR57['rAlgunasVeces'];
					}

					if ($valMax57 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p57_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p57_R3a = '3'");
					while ($cR57= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR57['rCasiNunca'];
					}

					if ($valMax57 === $rCasiNunca) {
						$colorCasiNunca = 'naranja';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p57_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p57_R3a = '4'");
					while ($cR57= $csNunca->fetchArray()) {
						$rNunca=$cR57['rNunca'];
					}

					if ($valMax57 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR57p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR57p = (isset($sumaR57p)) ? $sumaR57p : 0;
					$por57rSiempre = round(($rSiempre/$sumaR57p)*100,0, PHP_ROUND_HALF_EVEN);
					$por57rCasiSiempre = round(($rCasiSiempre/$sumaR57p)*100,0, PHP_ROUND_HALF_EVEN);
					$por57rAlgunasVeces = round(($rAlgunasVeces/$sumaR57p)*100,0, PHP_ROUND_HALF_EVEN);
					$por57rCasiNunca = round(($rCasiNunca/$sumaR57p)*100,0, PHP_ROUND_HALF_EVEN);
					$por57rNunca = round(($rNunca/$sumaR57p)*100,0, PHP_ROUND_HALF_EVEN);

					$por57rSiempre = (isset($por57rSiempre)) ? $por57rSiempre : 0;
					$por57rCasiSiempre = (isset($por57rCasiSiempre)) ? $por57rCasiSiempre : 0;
					$por57rAlgunasVeces = (isset($por57rAlgunasVeces)) ? $por57rAlgunasVeces : 0;
					$por57rCasiNunca = (isset($por57rCasiNunca)) ? $por57rCasiNunca : 0;
					$por57rNunca = (isset($por57rNunca)) ? $por57rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado azul">'.$por57rSiempre.'%</td>
						<td class="centrado verde">'.$por57rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por57rAlgunasVeces.'%</td>
						<td class="centrado naranja">'.$por57rCasiNunca.'%</td>
						<td class="centrado rojo">'.$por57rNunca.'%</td>
					</tr>
					';
				echo'

					<tr>
					<td>58.-	Recibo críticas constantes a mi persona y/o trabajo.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p58_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p58_R3a = '4'");
					while ($cR58= $csCSiempre->fetchArray()) {
						$rSiempre=$cR58['rSiempre'];
					}

					$csCMaxR58= $conPorPregunta -> query("SELECT MAX(totalp58) AS valMax FROM(SELECT COUNT(p58_R3a) AS totalp58 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p58_R3a = '4' UNION ALL SELECT COUNT(p58_R3a) AS totalp58 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p58_R3a = '3' UNION ALL SELECT COUNT(p58_R3a) AS totalp58 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p58_R3a = '2' UNION ALL SELECT COUNT(p58_R3a) AS totalp58 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p58_R3a = '1' UNION ALL SELECT COUNT(p58_R3a) AS totalp58 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p58_R3a = '0')");

					while ($cR58Max= $csCMaxR58->fetchArray()) {
						$valMax58=$cR58Max['valMax'];
					}

					if ($valMax58 === $rSiempre) {
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p58_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p58_R3a = '3'");
					while ($cR58= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR58['rCasiSiempre'];
					}

					if ($valMax58 === $rCasiSiempre) {
						$colorCasiSiempre = 'naranja';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p58_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p58_R3a = '2'");
					while ($cR58= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR58['rAlgunasVeces'];
					}

					if ($valMax58 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p58_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p58_R3a = '1'");
					while ($cR58= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR58['rCasiNunca'];
					}

					if ($valMax58 === $rCasiNunca) {
						$colorCasiNunca = 'verde';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p58_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p58_R3a = '0'");
					while ($cR58= $csNunca->fetchArray()) {
						$rNunca=$cR58['rNunca'];
					}

					if ($valMax58 === $rNunca) {
						$colorNunca = 'azul';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR58p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR58p = (isset($sumaR58p)) ? $sumaR58p : 0;
					$por58rSiempre = round(($rSiempre/$sumaR58p)*100,0, PHP_ROUND_HALF_EVEN);
					$por58rCasiSiempre = round(($rCasiSiempre/$sumaR58p)*100,0, PHP_ROUND_HALF_EVEN);
					$por58rAlgunasVeces = round(($rAlgunasVeces/$sumaR58p)*100,0, PHP_ROUND_HALF_EVEN);
					$por58rCasiNunca = round(($rCasiNunca/$sumaR58p)*100,0, PHP_ROUND_HALF_EVEN);
					$por58rNunca = round(($rNunca/$sumaR58p)*100,0, PHP_ROUND_HALF_EVEN);

					$por58rSiempre = (isset($por58rSiempre)) ? $por58rSiempre : 0;
					$por58rCasiSiempre = (isset($por58rCasiSiempre)) ? $por58rCasiSiempre : 0;
					$por58rAlgunasVeces = (isset($por58rAlgunasVeces)) ? $por58rAlgunasVeces : 0;
					$por58rCasiNunca = (isset($por58rCasiNunca)) ? $por58rCasiNunca : 0;
					$por58rNunca = (isset($por58rNunca)) ? $por58rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado rojo">'.$por58rSiempre.'%</td>
						<td class="centrado naranja">'.$por58rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por58rAlgunasVeces.'%</td>
						<td class="centrado verde">'.$por58rCasiNunca.'%</td>
						<td class="centrado azul">'.$por58rNunca.'%</td>
					</tr>
					';
				echo'

					<tr>
					<td>59.-	Recibo burlas, calumnias, difamaciones, humillaciones o ridiculizaciones.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p59_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p59_R3a = '4'");
					while ($cR59= $csCSiempre->fetchArray()) {
						$rSiempre=$cR59['rSiempre'];
					}

					$csCMaxR59= $conPorPregunta -> query("SELECT MAX(totalp59) AS valMax FROM(SELECT COUNT(p59_R3a) AS totalp59 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p59_R3a = '4' UNION ALL SELECT COUNT(p59_R3a) AS totalp59 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p59_R3a = '3' UNION ALL SELECT COUNT(p59_R3a) AS totalp59 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p59_R3a = '2' UNION ALL SELECT COUNT(p59_R3a) AS totalp59 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p59_R3a = '1' UNION ALL SELECT COUNT(p59_R3a) AS totalp59 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p59_R3a = '0')");

					while ($cR59Max= $csCMaxR59->fetchArray()) {
						$valMax59=$cR59Max['valMax'];
					}

					if ($valMax59 === $rSiempre) {
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p59_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p59_R3a = '3'");
					while ($cR59= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR59['rCasiSiempre'];
					}

					if ($valMax59 === $rCasiSiempre) {
						$colorCasiSiempre = 'naranja';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p59_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p59_R3a = '2'");
					while ($cR59= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR59['rAlgunasVeces'];
					}

					if ($valMax59 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p59_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p59_R3a = '1'");
					while ($cR59= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR59['rCasiNunca'];
					}

					if ($valMax59 === $rCasiNunca) {
						$colorCasiNunca = 'verde';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p59_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p59_R3a = '0'");
					while ($cR59= $csNunca->fetchArray()) {
						$rNunca=$cR59['rNunca'];
					}

					if ($valMax59 === $rNunca) {
						$colorNunca = 'azul';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR59p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR59p = (isset($sumaR59p)) ? $sumaR59p : 0;
					$por59rSiempre = round(($rSiempre/$sumaR59p)*100,0, PHP_ROUND_HALF_EVEN);
					$por59rCasiSiempre = round(($rCasiSiempre/$sumaR59p)*100,0, PHP_ROUND_HALF_EVEN);
					$por59rAlgunasVeces = round(($rAlgunasVeces/$sumaR59p)*100,0, PHP_ROUND_HALF_EVEN);
					$por59rCasiNunca = round(($rCasiNunca/$sumaR59p)*100,0, PHP_ROUND_HALF_EVEN);
					$por59rNunca = round(($rNunca/$sumaR59p)*100,0, PHP_ROUND_HALF_EVEN);

					$por59rSiempre = (isset($por59rSiempre)) ? $por59rSiempre : 0;
					$por59rCasiSiempre = (isset($por59rCasiSiempre)) ? $por59rCasiSiempre : 0;
					$por59rAlgunasVeces = (isset($por59rAlgunasVeces)) ? $por59rAlgunasVeces : 0;
					$por59rCasiNunca = (isset($por59rCasiNunca)) ? $por59rCasiNunca : 0;
					$por59rNunca = (isset($por59rNunca)) ? $por59rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado rojo">'.$por59rSiempre.'%</td>
						<td class="centrado naranja">'.$por59rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por59rAlgunasVeces.'%</td>
						<td class="centrado verde">'.$por59rCasiNunca.'%</td>
						<td class="centrado azul">'.$por59rNunca.'%</td>
					</tr>
					';
				echo'

					<tr>
					<td>60.-	Se ignora mi presencia o se me excluye de las reuniones de trabajo y en la toma de decisiones.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p60_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p60_R3a = '4'");
					while ($cR60= $csCSiempre->fetchArray()) {
						$rSiempre=$cR60['rSiempre'];
					}

					$csCMaxR60= $conPorPregunta -> query("SELECT MAX(totalp60) AS valMax FROM(SELECT COUNT(p60_R3a) AS totalp60 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p60_R3a = '4' UNION ALL SELECT COUNT(p60_R3a) AS totalp60 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p60_R3a = '3' UNION ALL SELECT COUNT(p60_R3a) AS totalp60 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p60_R3a = '2' UNION ALL SELECT COUNT(p60_R3a) AS totalp60 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p60_R3a = '1' UNION ALL SELECT COUNT(p60_R3a) AS totalp60 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p60_R3a = '0')");

					while ($cR60Max= $csCMaxR60->fetchArray()) {
						$valMax60=$cR60Max['valMax'];
					}

					if ($valMax60 === $rSiempre) {
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p60_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p60_R3a = '3'");
					while ($cR60= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR60['rCasiSiempre'];
					}

					if ($valMax60 === $rCasiSiempre) {
						$colorCasiSiempre = 'naranja';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p60_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p60_R3a = '2'");
					while ($cR60= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR60['rAlgunasVeces'];
					}

					if ($valMax60 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p60_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p60_R3a = '1'");
					while ($cR60= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR60['rCasiNunca'];
					}

					if ($valMax60 === $rCasiNunca) {
						$colorCasiNunca = 'verde';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p60_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p60_R3a = '0'");
					while ($cR60= $csNunca->fetchArray()) {
						$rNunca=$cR60['rNunca'];
					}

					if ($valMax5 === $rNunca) {
						$colorNunca = 'azul';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR60p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR60p = (isset($sumaR60p)) ? $sumaR60p : 0;
					$por60rSiempre = round(($rSiempre/$sumaR60p)*100,0, PHP_ROUND_HALF_EVEN);
					$por60rCasiSiempre = round(($rCasiSiempre/$sumaR60p)*100,0, PHP_ROUND_HALF_EVEN);
					$por60rAlgunasVeces = round(($rAlgunasVeces/$sumaR60p)*100,0, PHP_ROUND_HALF_EVEN);
					$por60rCasiNunca = round(($rCasiNunca/$sumaR60p)*100,0, PHP_ROUND_HALF_EVEN);
					$por60rNunca = round(($rNunca/$sumaR60p)*100,0, PHP_ROUND_HALF_EVEN);

					$por60rSiempre = (isset($por60rSiempre)) ? $por60rSiempre : 0;
					$por60rCasiSiempre = (isset($por60rCasiSiempre)) ? $por60rCasiSiempre : 0;
					$por60rAlgunasVeces = (isset($por60rAlgunasVeces)) ? $por60rAlgunasVeces : 0;
					$por60rCasiNunca = (isset($por60rCasiNunca)) ? $por60rCasiNunca : 0;
					$por60rNunca = (isset($por60rNunca)) ? $por60rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado rojo">'.$por60rSiempre.'%</td>
						<td class="centrado naranja">'.$por60rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por60rAlgunasVeces.'%</td>
						<td class="centrado verde">'.$por60rCasiNunca.'%</td>
						<td class="centrado azul">'.$por60rNunca.'%</td>
					</tr>
					';
				echo'
					<tr>
					<td>61.-	Se manipulan las situaciones de trabajo para hacerme parecer un mal trabajador.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p61_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p61_R3a = '4'");
					while ($cR61= $csCSiempre->fetchArray()) {
						$rSiempre=$cR61['rSiempre'];
					}

					$csCMaxR61= $conPorPregunta -> query("SELECT MAX(totalp61) AS valMax FROM(SELECT COUNT(p61_R3a) AS totalp61 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p61_R3a = '4' UNION ALL SELECT COUNT(p61_R3a) AS totalp61 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p61_R3a = '3' UNION ALL SELECT COUNT(p61_R3a) AS totalp61 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p61_R3a = '2' UNION ALL SELECT COUNT(p61_R3a) AS totalp61 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p61_R3a = '1' UNION ALL SELECT COUNT(p61_R3a) AS totalp61 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p61_R3a = '0')");

					while ($cR61Max= $csCMaxR61->fetchArray()) {
						$valMax61=$cR61Max['valMax'];
					}

					if ($valMax61 === $rSiempre) {
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p61_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p61_R3a = '3'");
					while ($cR61= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR61['rCasiSiempre'];
					}

					if ($valMax61 === $rCasiSiempre) {
						$colorCasiSiempre = 'naranja';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p61_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p61_R3a = '2'");
					while ($cR61= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR61['rAlgunasVeces'];
					}

					if ($valMax61 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p61_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p61_R3a = '1'");
					while ($cR61= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR61['rCasiNunca'];
					}

					if ($valMax61 === $rCasiNunca) {
						$colorCasiNunca = 'verde';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p61_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p61_R3a = '0'");
					while ($cR61= $csNunca->fetchArray()) {
						$rNunca=$cR61['rNunca'];
					}

					if ($valMax61 === $rNunca) {
						$colorNunca = 'azul';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR61p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR61p = (isset($sumaR61p)) ? $sumaR61p : 0;
					$por61rSiempre = round(($rSiempre/$sumaR61p)*100,0, PHP_ROUND_HALF_EVEN);
					$por61rCasiSiempre = round(($rCasiSiempre/$sumaR61p)*100,0, PHP_ROUND_HALF_EVEN);
					$por61rAlgunasVeces = round(($rAlgunasVeces/$sumaR61p)*100,0, PHP_ROUND_HALF_EVEN);
					$por61rCasiNunca = round(($rCasiNunca/$sumaR61p)*100,0, PHP_ROUND_HALF_EVEN);
					$por61rNunca = round(($rNunca/$sumaR61p)*100,0, PHP_ROUND_HALF_EVEN);

					$por61rSiempre = (isset($por61rSiempre)) ? $por61rSiempre : 0;
					$por61rCasiSiempre = (isset($por61rCasiSiempre)) ? $por61rCasiSiempre : 0;
					$por61rAlgunasVeces = (isset($por61rAlgunasVeces)) ? $por61rAlgunasVeces : 0;
					$por61rCasiNunca = (isset($por61rCasiNunca)) ? $por61rCasiNunca : 0;
					$por61rNunca = (isset($por61rNunca)) ? $por61rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado rojo">'.$por61rSiempre.'%</td>
						<td class="centrado naranja">'.$por61rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por61rAlgunasVeces.'%</td>
						<td class="centrado verde">'.$por61rCasiNunca.'%</td>
						<td class="centrado azul">'.$por61rNunca.'%</td>
					</tr>
					';
				echo'

					<tr>
					<td>62.-	Se ignoran mis éxitos laborales y se atribuyen a otros trabajadores.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p62_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p62_R3a = '4'");
					while ($cR62= $csCSiempre->fetchArray()) {
						$rSiempre=$cR62['rSiempre'];
					}

					$csCMaxR62= $conPorPregunta -> query("SELECT MAX(totalp62) AS valMax FROM(SELECT COUNT(p62_R3a) AS totalp62 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p62_R3a = '4' UNION ALL SELECT COUNT(p62_R3a) AS totalp62 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p62_R3a = '3' UNION ALL SELECT COUNT(p62_R3a) AS totalp62 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p62_R3a = '2' UNION ALL SELECT COUNT(p62_R3a) AS totalp62 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p62_R3a = '1' UNION ALL SELECT COUNT(p62_R3a) AS totalp62 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p62_R3a = '0')");

					while ($cR62Max= $csCMaxR62->fetchArray()) {
						$valMax62=$cR62Max['valMax'];
					}

					if ($valMax62 === $rSiempre) {
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p62_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p62_R3a = '3'");
					while ($cR62= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR62['rCasiSiempre'];
					}

					if ($valMax62 === $rCasiSiempre) {
						$colorCasiSiempre = 'naranja';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p62_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p62_R3a = '2'");
					while ($cR62= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR62['rAlgunasVeces'];
					}

					if ($valMax62 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p62_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p62_R3a = '1'");
					while ($cR62= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR62['rCasiNunca'];
					}

					if ($valMax62 === $rCasiNunca) {
						$colorCasiNunca = 'verde';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p62_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p62_R3a = '0'");
					while ($cR62= $csNunca->fetchArray()) {
						$rNunca=$cR62['rNunca'];
					}

					if ($valMax62 === $rNunca) {
						$colorNunca = 'azul';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR62p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR62p = (isset($sumaR62p)) ? $sumaR62p : 0;
					$por62rSiempre = round(($rSiempre/$sumaR62p)*100,0, PHP_ROUND_HALF_EVEN);
					$por62rCasiSiempre = round(($rCasiSiempre/$sumaR62p)*100,0, PHP_ROUND_HALF_EVEN);
					$por62rAlgunasVeces = round(($rAlgunasVeces/$sumaR62p)*100,0, PHP_ROUND_HALF_EVEN);
					$por62rCasiNunca = round(($rCasiNunca/$sumaR62p)*100,0, PHP_ROUND_HALF_EVEN);
					$por62rNunca = round(($rNunca/$sumaR62p)*100,0, PHP_ROUND_HALF_EVEN);

					$por62rSiempre = (isset($por62rSiempre)) ? $por62rSiempre : 0;
					$por62rCasiSiempre = (isset($por62rCasiSiempre)) ? $por62rCasiSiempre : 0;
					$por62rAlgunasVeces = (isset($por62rAlgunasVeces)) ? $por62rAlgunasVeces : 0;
					$por62rCasiNunca = (isset($por62rCasiNunca)) ? $por62rCasiNunca : 0;
					$por62rNunca = (isset($por62rNunca)) ? $por62rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado rojo">'.$por62rSiempre.'%</td>
						<td class="centrado naranja">'.$por62rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por62rAlgunasVeces.'%</td>
						<td class="centrado verde">'.$por62rCasiNunca.'%</td>
						<td class="centrado azul">'.$por62rNunca.'%</td>
					</tr>
					';
				echo'

					<tr>
					<td>63.-	Me bloquean o impiden las oportunidades que tengo para obtener ascenso o mejora en mi trabajo.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p63_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p63_R3a = '4'");
					while ($cR63= $csCSiempre->fetchArray()) {
						$rSiempre=$cR63['rSiempre'];
					}

					$csCMaxR63= $conPorPregunta -> query("SELECT MAX(totalp63) AS valMax FROM(SELECT COUNT(p63_R3a) AS totalp63 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p63_R3a = '4' UNION ALL SELECT COUNT(p63_R3a) AS totalp63 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p63_R3a = '3' UNION ALL SELECT COUNT(p63_R3a) AS totalp63 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p63_R3a = '2' UNION ALL SELECT COUNT(p63_R3a) AS totalp63 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p63_R3a = '1' UNION ALL SELECT COUNT(p63_R3a) AS totalp63 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p63_R3a = '0')");

					while ($cR63Max= $csCMaxR63->fetchArray()) {
						$valMax63=$cR63Max['valMax'];
					}

					if ($valMax63 === $rSiempre) {
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p63_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p63_R3a = '3'");
					while ($cR63= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR63['rCasiSiempre'];
					}

					if ($valMax63 === $rCasiSiempre) {
						$colorCasiSiempre = 'naranja';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p63_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p63_R3a = '2'");
					while ($cR63= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR63['rAlgunasVeces'];
					}

					if ($valMax63 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p63_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p63_R3a = '1'");
					while ($cR63= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR63['rCasiNunca'];
					}

					if ($valMax63 === $rCasiNunca) {
						$colorCasiNunca = 'verde';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p63_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p63_R3a = '0'");
					while ($cR63= $csNunca->fetchArray()) {
						$rNunca=$cR63['rNunca'];
					}

					if ($valMax63 === $rNunca) {
						$colorNunca = 'azul';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR63p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR63p = (isset($sumaR63p)) ? $sumaR63p : 0;
					$por63rSiempre = round(($rSiempre/$sumaR63p)*100,0, PHP_ROUND_HALF_EVEN);
					$por63rCasiSiempre = round(($rCasiSiempre/$sumaR63p)*100,0, PHP_ROUND_HALF_EVEN);
					$por63rAlgunasVeces = round(($rAlgunasVeces/$sumaR63p)*100,0, PHP_ROUND_HALF_EVEN);
					$por63rCasiNunca = round(($rCasiNunca/$sumaR63p)*100,0, PHP_ROUND_HALF_EVEN);
					$por63rNunca = round(($rNunca/$sumaR63p)*100,0, PHP_ROUND_HALF_EVEN);

					$por63rSiempre = (isset($por63rSiempre)) ? $por63rSiempre : 0;
					$por63rCasiSiempre = (isset($por63rCasiSiempre)) ? $por63rCasiSiempre : 0;
					$por63rAlgunasVeces = (isset($por63rAlgunasVeces)) ? $por63rAlgunasVeces : 0;
					$por63rCasiNunca = (isset($por63rCasiNunca)) ? $por63rCasiNunca : 0;
					$por63rNunca = (isset($por63rNunca)) ? $por63rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado rojo">'.$por63rSiempre.'%</td>
						<td class="centrado naranja">'.$por63rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por63rAlgunasVeces.'%</td>
						<td class="centrado verde">'.$por63rCasiNunca.'%</td>
						<td class="centrado azul">'.$por63rNunca.'%</td>
					</tr>
					';
				echo'

					<tr>
					<td>64.-	He presenciado actos de violencia en mi centro de trabajo.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p64_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p64_R3a = '4'");
					while ($cR64= $csCSiempre->fetchArray()) {
						$rSiempre=$cR64['rSiempre'];
					}

					$csCMaxR64= $conPorPregunta -> query("SELECT MAX(totalp64) AS valMax FROM(SELECT COUNT(p64_R3a) AS totalp64 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p64_R3a = '4' UNION ALL SELECT COUNT(p64_R3a) AS totalp64 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p64_R3a = '3' UNION ALL SELECT COUNT(p64_R3a) AS totalp64 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p64_R3a = '2' UNION ALL SELECT COUNT(p64_R3a) AS totalp64 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p64_R3a = '1' UNION ALL SELECT COUNT(p64_R3a) AS totalp64 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p64_R3a = '0')");

					while ($cR64Max= $csCMaxR64->fetchArray()) {
						$valMax64=$cR64Max['valMax'];
					}

					if ($valMax64 === $rSiempre) {
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p64_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p64_R3a = '3'");
					while ($cR64= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR64['rCasiSiempre'];
					}

					if ($valMax64 === $rCasiSiempre) {
						$colorCasiSiempre = 'naranja';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p64_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p64_R3a = '2'");
					while ($cR64= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR64['rAlgunasVeces'];
					}

					if ($valMax64 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p64_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p64_R3a = '1'");
					while ($cR64= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR64['rCasiNunca'];
					}

					if ($valMax64 === $rCasiNunca) {
						$colorCasiNunca = 'verde';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p64_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p64_R3a = '0'");
					while ($cR64= $csNunca->fetchArray()) {
						$rNunca=$cR64['rNunca'];
					}

					if ($valMax64 === $rNunca) {
						$colorNunca = 'azul';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR64p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR64p = (isset($sumaR64p)) ? $sumaR64p : 0;
					$por64rSiempre = round(($rSiempre/$sumaR64p)*100,0, PHP_ROUND_HALF_EVEN);
					$por64rCasiSiempre = round(($rCasiSiempre/$sumaR64p)*100,0, PHP_ROUND_HALF_EVEN);
					$por64rAlgunasVeces = round(($rAlgunasVeces/$sumaR64p)*100,0, PHP_ROUND_HALF_EVEN);
					$por64rCasiNunca = round(($rCasiNunca/$sumaR64p)*100,0, PHP_ROUND_HALF_EVEN);
					$por64rNunca = round(($rNunca/$sumaR64p)*100,0, PHP_ROUND_HALF_EVEN);

					$por64rSiempre = (isset($por64rSiempre)) ? $por64rSiempre : 0;
					$por64rCasiSiempre = (isset($por64rCasiSiempre)) ? $por64rCasiSiempre : 0;
					$por64rAlgunasVeces = (isset($por64rAlgunasVeces)) ? $por64rAlgunasVeces : 0;
					$por64rCasiNunca = (isset($por64rCasiNunca)) ? $por64rCasiNunca : 0;
					$por64rNunca = (isset($por64rNunca)) ? $por64rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado rojo">'.$por64rSiempre.'%</td>
						<td class="centrado naranja">'.$por64rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por64rAlgunasVeces.'%</td>
						<td class="centrado verde">'.$por64rCasiNunca.'%</td>
						<td class="centrado azul">'.$por64rNunca.'%</td>
					</tr>
					';
				echo'

					<tr>
					<td>69.-	Comunican tarde los asuntos de trabajo.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p69_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p69_R3a = '4'");
					while ($cR69= $csCSiempre->fetchArray()) {
						$rSiempre=$cR69['rSiempre'];
					}

					$csCMaxR69= $conPorPregunta -> query("SELECT MAX(totalp69) AS valMax FROM(SELECT COUNT(p69_R3a) AS totalp69 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p69_R3a = '4' UNION ALL SELECT COUNT(p69_R3a) AS totalp69 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p69_R3a = '3' UNION ALL SELECT COUNT(p69_R3a) AS totalp69 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p69_R3a = '2' UNION ALL SELECT COUNT(p69_R3a) AS totalp69 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p69_R3a = '1' UNION ALL SELECT COUNT(p69_R3a) AS totalp69 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p69_R3a = '0')");

					while ($cR69Max= $csCMaxR69->fetchArray()) {
						$valMax69=$cR69Max['valMax'];
					}

					if ($valMax69 === $rSiempre) {
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p69_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p69_R3a = '3'");
					while ($cR69= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR69['rCasiSiempre'];
					}

					if ($valMax69 === $rCasiSiempre) {
						$colorCasiSiempre = 'naranja';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p69_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p69_R3a = '2'");
					while ($cR69= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR69['rAlgunasVeces'];
					}

					if ($valMax69 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p69_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p69_R3a = '1'");
					while ($cR69= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR69['rCasiNunca'];
					}

					if ($valMax69 === $rCasiNunca) {
						$colorCasiNunca = 'verde';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p69_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p69_R3a = '0'");
					while ($cR69= $csNunca->fetchArray()) {
						$rNunca=$cR69['rNunca'];
					}

					if ($valMax69 === $rNunca) {
						$colorNunca = 'azul';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR69p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR69p = (isset($sumaR69p)) ? $sumaR69p : 0;
					$por69rSiempre = round(($rSiempre/$sumaR69p)*100,0, PHP_ROUND_HALF_EVEN);
					$por69rCasiSiempre = round(($rCasiSiempre/$sumaR69p)*100,0, PHP_ROUND_HALF_EVEN);
					$por69rAlgunasVeces = round(($rAlgunasVeces/$sumaR69p)*100,0, PHP_ROUND_HALF_EVEN);
					$por69rCasiNunca = round(($rCasiNunca/$sumaR69p)*100,0, PHP_ROUND_HALF_EVEN);
					$por69rNunca = round(($rNunca/$sumaR69p)*100,0, PHP_ROUND_HALF_EVEN);

					$por69rSiempre = (isset($por69rSiempre)) ? $por69rSiempre : 0;
					$por69rCasiSiempre = (isset($por69rCasiSiempre)) ? $por69rCasiSiempre : 0;
					$por69rAlgunasVeces = (isset($por69rAlgunasVeces)) ? $por69rAlgunasVeces : 0;
					$por69rCasiNunca = (isset($por69rCasiNunca)) ? $por69rCasiNunca : 0;
					$por69rNunca = (isset($por69rNunca)) ? $por69rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado rojo">'.$por69rSiempre.'%</td>
						<td class="centrado naranja">'.$por69rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por69rAlgunasVeces.'%</td>
						<td class="centrado verde">'.$por69rCasiNunca.'%</td>
						<td class="centrado azul">'.$por69rNunca.'%</td>
					</tr>
					';
				echo'

					<tr>
					<td>70.-	Dificultan el logro de los resultados del trabajo.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p70_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p70_R3a = '4'");
					while ($cR70= $csCSiempre->fetchArray()) {
						$rSiempre=$cR70['rSiempre'];
					}

					$csCMaxR70= $conPorPregunta -> query("SELECT MAX(totalp70) AS valMax FROM(SELECT COUNT(p70_R3a) AS totalp70 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p70_R3a = '4' UNION ALL SELECT COUNT(p70_R3a) AS totalp70 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p70_R3a = '3' UNION ALL SELECT COUNT(p70_R3a) AS totalp70 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p70_R3a = '2' UNION ALL SELECT COUNT(p70_R3a) AS totalp70 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p70_R3a = '1' UNION ALL SELECT COUNT(p70_R3a) AS totalp70 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p70_R3a = '0')");

					while ($cR70Max= $csCMaxR70->fetchArray()) {
						$valMax70=$cR70Max['valMax'];
					}

					if ($valMax70 === $rSiempre) {
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p70_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p70_R3a = '3'");
					while ($cR70= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR70['rCasiSiempre'];
					}

					if ($valMax70 === $rCasiSiempre) {
						$colorCasiSiempre = 'naranja';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p70_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p70_R3a = '2'");
					while ($cR70= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR70['rAlgunasVeces'];
					}

					if ($valMax70 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p70_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p70_R3a = '1'");
					while ($cR70= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR70['rCasiNunca'];
					}

					if ($valMax70 === $rCasiNunca) {
						$colorCasiNunca = 'verde';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p70_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p70_R3a = '0'");
					while ($cR70= $csNunca->fetchArray()) {
						$rNunca=$cR70['rNunca'];
					}

					if ($valMax70 === $rNunca) {
						$colorNunca = 'azul';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR70p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR70p = (isset($sumaR70p)) ? $sumaR70p : 0;
					$por70rSiempre = round(($rSiempre/$sumaR70p)*100,0, PHP_ROUND_HALF_EVEN);
					$por70rCasiSiempre = round(($rCasiSiempre/$sumaR70p)*100,0, PHP_ROUND_HALF_EVEN);
					$por70rAlgunasVeces = round(($rAlgunasVeces/$sumaR70p)*100,0, PHP_ROUND_HALF_EVEN);
					$por70rCasiNunca = round(($rCasiNunca/$sumaR70p)*100,0, PHP_ROUND_HALF_EVEN);
					$por70rNunca = round(($rNunca/$sumaR70p)*100,0, PHP_ROUND_HALF_EVEN);

					$por70rSiempre = (isset($por70rSiempre)) ? $por70rSiempre : 0;
					$por70rCasiSiempre = (isset($por70rCasiSiempre)) ? $por70rCasiSiempre : 0;
					$por70rAlgunasVeces = (isset($por70rAlgunasVeces)) ? $por70rAlgunasVeces : 0;
					$por70rCasiNunca = (isset($por70rCasiNunca)) ? $por70rCasiNunca : 0;
					$por70rNunca = (isset($por70rNunca)) ? $por70rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado rojo">'.$por70rSiempre.'%</td>
						<td class="centrado naranja">'.$por70rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por70rAlgunasVeces.'%</td>
						<td class="centrado verde">'.$por70rCasiNunca.'%</td>
						<td class="centrado azul">'.$por70rNunca.'%</td>
					</tr>
					';
				echo'

					<tr>
					<td>71.-	Cooperan poco cuando se necesita.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p71_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p71_R3a = '4'");
					while ($cR71= $csCSiempre->fetchArray()) {
						$rSiempre=$cR71['rSiempre'];
					}

					$csCMaxR71= $conPorPregunta -> query("SELECT MAX(totalp71) AS valMax FROM(SELECT COUNT(p71_R3a) AS totalp71 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p71_R3a = '4' UNION ALL SELECT COUNT(p71_R3a) AS totalp71 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p71_R3a = '3' UNION ALL SELECT COUNT(p71_R3a) AS totalp71 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p71_R3a = '2' UNION ALL SELECT COUNT(p71_R3a) AS totalp71 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p71_R3a = '1' UNION ALL SELECT COUNT(p71_R3a) AS totalp71 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p71_R3a = '0')");

					while ($cR71Max= $csCMaxR71->fetchArray()) {
						$valMax71=$cR71Max['valMax'];
					}

					if ($valMax71 === $rSiempre) {
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p71_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p71_R3a = '3'");
					while ($cR71= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR71['rCasiSiempre'];
					}

					if ($valMax71 === $rCasiSiempre) {
						$colorCasiSiempre = 'naranja';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p71_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p71_R3a = '2'");
					while ($cR71= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR71['rAlgunasVeces'];
					}

					if ($valMax71 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p71_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p71_R3a = '1'");
					while ($cR71= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR71['rCasiNunca'];
					}

					if ($valMax71 === $rCasiNunca) {
						$colorCasiNunca = 'verde';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p71_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p71_R3a = '0'");
					while ($cR5= $csNunca->fetchArray()) {
						$rNunca=$cR5['rNunca'];
					}

					if ($valMax71 === $rNunca) {
						$colorNunca = 'azul';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR71p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR71p = (isset($sumaR71p)) ? $sumaR71p : 0;
					$por71rSiempre = round(($rSiempre/$sumaR71p)*100,0, PHP_ROUND_HALF_EVEN);
					$por71rCasiSiempre = round(($rCasiSiempre/$sumaR71p)*100,0, PHP_ROUND_HALF_EVEN);
					$por71rAlgunasVeces = round(($rAlgunasVeces/$sumaR71p)*100,0, PHP_ROUND_HALF_EVEN);
					$por71rCasiNunca = round(($rCasiNunca/$sumaR71p)*100,0, PHP_ROUND_HALF_EVEN);
					$por71rNunca = round(($rNunca/$sumaR71p)*100,0, PHP_ROUND_HALF_EVEN);

					$por71rSiempre = (isset($por71rSiempre)) ? $por71rSiempre : 0;
					$por71rCasiSiempre = (isset($por71rCasiSiempre)) ? $por71rCasiSiempre : 0;
					$por71rAlgunasVeces = (isset($por71rAlgunasVeces)) ? $por71rAlgunasVeces : 0;
					$por71rCasiNunca = (isset($por71rCasiNunca)) ? $por71rCasiNunca : 0;
					$por71rNunca = (isset($por71rNunca)) ? $por71rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado rojo">'.$por71rSiempre.'%</td>
						<td class="centrado naranja">'.$por71rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por71rAlgunasVeces.'%</td>
						<td class="centrado verde">'.$por71rCasiNunca.'%</td>
						<td class="centrado azul">'.$por71rNunca.'%</td>
					</tr>
					';
				echo'
				<tr>
					<td>72.-	Ignoran las sugerencias para mejorar su trabajo.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p72_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p72_R3a = '4'");
					while ($cR72= $csCSiempre->fetchArray()) {
						$rSiempre=$cR72['rSiempre'];
					}

					$csCMaxR72= $conPorPregunta -> query("SELECT MAX(totalp72) AS valMax FROM(SELECT COUNT(p72_R3a) AS totalp72 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p72_R3a = '4' UNION ALL SELECT COUNT(p72_R3a) AS totalp72 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p72_R3a = '3' UNION ALL SELECT COUNT(p72_R3a) AS totalp72 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p72_R3a = '2' UNION ALL SELECT COUNT(p72_R3a) AS totalp72 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p72_R3a = '1' UNION ALL SELECT COUNT(p72_R3a) AS totalp72 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p72_R3a = '0')");

					while ($cR72Max= $csCMaxR72->fetchArray()) {
						$valMax72=$cR72Max['valMax'];
					}

					if ($valMax72 === $rSiempre) {
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p72_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p72_R3a = '3'");
					while ($cR72= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR72['rCasiSiempre'];
					}

					if ($valMax72 === $rCasiSiempre) {
						$colorCasiSiempre = 'naranja';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p72_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p72_R3a = '2'");
					while ($cR72= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR72['rAlgunasVeces'];
					}

					if ($valMax72 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p72_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p72_R3a = '1'");
					while ($cR72= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR72['rCasiNunca'];
					}

					if ($valMax72 === $rCasiNunca) {
						$colorCasiNunca = 'verde';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p72_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p72_R3a = '0'");
					while ($cR72= $csNunca->fetchArray()) {
						$rNunca=$cR72['rNunca'];
					}

					if ($valMax72 === $rNunca) {
						$colorNunca = 'azul';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR72p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR72p = (isset($sumaR72p)) ? $sumaR72p : 0;
					$por72rSiempre = round(($rSiempre/$sumaR72p)*100,0, PHP_ROUND_HALF_EVEN);
					$por72rCasiSiempre = round(($rCasiSiempre/$sumaR72p)*100,0, PHP_ROUND_HALF_EVEN);
					$por72rAlgunasVeces = round(($rAlgunasVeces/$sumaR72p)*100,0, PHP_ROUND_HALF_EVEN);
					$por72rCasiNunca = round(($rCasiNunca/$sumaR72p)*100,0, PHP_ROUND_HALF_EVEN);
					$por72rNunca = round(($rNunca/$sumaR72p)*100,0, PHP_ROUND_HALF_EVEN);

					$por72rSiempre = (isset($por72rSiempre)) ? $por72rSiempre : 0;
					$por72rCasiSiempre = (isset($por72rCasiSiempre)) ? $por72rCasiSiempre : 0;
					$por72rAlgunasVeces = (isset($por72rAlgunasVeces)) ? $por72rAlgunasVeces : 0;
					$por72rCasiNunca = (isset($por72rCasiNunca)) ? $por72rCasiNunca : 0;
					$por72rNunca = (isset($por72rNunca)) ? $por72rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado rojo">'.$por72rSiempre.'%</td>
						<td class="centrado naranja">'.$por72rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por72rAlgunasVeces.'%</td>
						<td class="centrado verde">'.$por72rCasiNunca.'%</td>
						<td class="centrado azul">'.$por72rNunca.'%</td>
					</tr>
					';
				echo'
			</table>


			<br>

			<div style="font-size: .8em;">
				<h3>Liderazgo y relaciones en el trabajo</h3>
				<h4>Liderazgo</h4>
				';
				
				$dDatos31_1a = '['.$por31rSiempre.','.$por31rCasiSiempre.','.$por31rAlgunasVeces.','.$por31rCasiNunca.','.$por31rNunca.']';

				$dDatos32_1a = '['.$por32rSiempre.','.$por32rCasiSiempre.','.$por32rAlgunasVeces.','.$por32rCasiNunca.','.$por32rNunca.']';

				$dDatos33_1a = '['.$por33rSiempre.','.$por33rCasiSiempre.','.$por33rAlgunasVeces.','.$por33rCasiNunca.','.$por33rNunca.']';

				$dDatos34_1a = '['.$por34rSiempre.','.$por34rCasiSiempre.','.$por34rAlgunasVeces.','.$por34rCasiNunca.','.$por34rNunca.']';

				$dDatos37_1a = '['.$por37rSiempre.','.$por37rCasiSiempre.','.$por37rAlgunasVeces.','.$por37rCasiNunca.','.$por37rNunca.']';

				$dDatos38_1a = '['.$por38rSiempre.','.$por38rCasiSiempre.','.$por38rAlgunasVeces.','.$por38rCasiNunca.','.$por38rNunca.']';

				$dDatos39_1a = '['.$por39rSiempre.','.$por39rCasiSiempre.','.$por39rAlgunasVeces.','.$por39rCasiNunca.','.$por39rNunca.']';

				$dDatos40_1a = '['.$por40rSiempre.','.$por40rCasiSiempre.','.$por40rAlgunasVeces.','.$por40rCasiNunca.','.$por40rNunca.']';

				$dDatos41_1a = '['.$por41rSiempre.','.$por41rCasiSiempre.','.$por41rAlgunasVeces.','.$por41rCasiNunca.','.$por41rNunca.']';

				$dDatos42_1a = '['.$por42rSiempre.','.$por42rCasiSiempre.','.$por42rAlgunasVeces.','.$por42rCasiNunca.','.$por42rNunca.']';

				$dDatos43_1a = '['.$por43rSiempre.','.$por43rCasiSiempre.','.$por43rAlgunasVeces.','.$por43rCasiNunca.','.$por43rNunca.']';

				$dDatos44_1a = '['.$por44rSiempre.','.$por44rCasiSiempre.','.$por44rAlgunasVeces.','.$por44rCasiNunca.','.$por44rNunca.']';

				$dDatos45_1a = '['.$por45rSiempre.','.$por45rCasiSiempre.','.$por45rAlgunasVeces.','.$por45rCasiNunca.','.$por45rNunca.']';

				$dDatos46_1a = '['.$por46rSiempre.','.$por46rCasiSiempre.','.$por46rAlgunasVeces.','.$por46rCasiNunca.','.$por46rNunca.']';

				$dDatos69_1a = '['.$por69rSiempre.','.$por69rCasiSiempre.','.$por69rAlgunasVeces.','.$por69rCasiNunca.','.$por69rNunca.']';

				$dDatos70_1a = '['.$por70rSiempre.','.$por70rCasiSiempre.','.$por70rAlgunasVeces.','.$por70rCasiNunca.','.$por70rNunca.']';

				$dDatos71_1a = '['.$por71rSiempre.','.$por71rCasiSiempre.','.$por71rAlgunasVeces.','.$por71rCasiNunca.','.$por71rNunca.']';

				$dDatos72_1a = '['.$por72rSiempre.','.$por72rCasiSiempre.','.$por72rAlgunasVeces.','.$por72rCasiNunca.','.$por72rNunca.']';

				$dDatos57_1a = '['.$por57rSiempre.','.$por57rCasiSiempre.','.$por57rAlgunasVeces.','.$por57rCasiNunca.','.$por57rNunca.']';

				$dDatos58_1a = '['.$por58rSiempre.','.$por58rCasiSiempre.','.$por58rAlgunasVeces.','.$por58rCasiNunca.','.$por58rNunca.']';

				$dDatos59_1a = '['.$por59rSiempre.','.$por59rCasiSiempre.','.$por59rAlgunasVeces.','.$por59rCasiNunca.','.$por59rNunca.']';

				$dDatos60_1a = '['.$por60rSiempre.','.$por60rCasiSiempre.','.$por60rAlgunasVeces.','.$por60rCasiNunca.','.$por60rNunca.']';

				$dDatos61_1a = '['.$por61rSiempre.','.$por61rCasiSiempre.','.$por61rAlgunasVeces.','.$por61rCasiNunca.','.$por61rNunca.']';

				$dDatos62_1a = '['.$por62rSiempre.','.$por62rCasiSiempre.','.$por62rAlgunasVeces.','.$por62rCasiNunca.','.$por62rNunca.']';

				$dDatos63_1a = '['.$por63rSiempre.','.$por63rCasiSiempre.','.$por63rAlgunasVeces.','.$por63rCasiNunca.','.$por63rNunca.']';

				$dDatos64_1a = '['.$por64rSiempre.','.$por64rCasiSiempre.','.$por64rAlgunasVeces.','.$por64rCasiNunca.','.$por64rNunca.']';


				echo'
				<table style="width: 800px;">
					<tr>
						<td class="tSinBorde" style="width: 400px;">
							<b>Escaza claridad de funciones (31, 32, 33, 34)</b>
							<div>
								<canvas id="grafica01d'.$varGraf.'"></canvas>
							</div>
							
						</td>
						<td class="tSinBorde" style="width: 400px;">
							<b>Características del liderazgo (37, 38, 39, 40, 41)</b>
							<div>
								<canvas id="grafica02d'.$varGraf.'"></canvas>
							</div>
						</td>
					</tr>
					<tr>
						<td class="tSinBorde" style="width: 400px;">
							<b>Relaciones sociales en el trabajo (42, 43, 44, 45, 46)</b>
							<div>
								<canvas id="grafica03d'.$varGraf.'"></canvas>
							</div>
						</td>
						<td class="tSinBorde" style="width: 400px;">
							<b>Deficiente relación con los colaboradores que supervisa (69, 70, 71, 72)</b>
							<div>
								<canvas id="grafica04d'.$varGraf.'"></canvas>
							</div>
						</td>
					</tr>
					<tr>
						<td class="tSinBorde" style="width: 400px;">
							<b>Violencia laboral (57, 58, 59, 60, 61, 62, 63, 64)</b>
							<div>
								<canvas id="grafica05d'.$varGraf.'"></canvas>
							</div>
						</td>
					</tr>
					
				</table>
			</div>

			



			<br>


			<table style="font-size: .8em; width: 800px;">
				<tr>
					<td style="width: 300px;"><b>5.- Entorno organizacional</b></td>
					<td style="width: 70px;">Siempre</td>
					<td style="width: 90px;">Casi siempre</td>
					<td style="width: 90px;">Algunas veces</td>
					<td style="width: 90px;">Casi nunca</td>
					<td>Nunca</td>
				</tr>
				<tr>
					<td>47.-	Me informan sobre lo que hago bien en mi trabajo.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p47_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p47_R3a = '0'");
					while ($cR47= $csCSiempre->fetchArray()) {
						$rSiempre=$cR47['rSiempre'];
					}

					$csCMaxR47= $conPorPregunta -> query("SELECT MAX(totalP47) AS valMax FROM(SELECT COUNT(p47_R3a) AS totalP47 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p47_R3a = '4' UNION ALL SELECT COUNT(p47_R3a) AS totalP47 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p47_R3a = '3' UNION ALL SELECT COUNT(p47_R3a) AS totalP47 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p47_R3a = '2' UNION ALL SELECT COUNT(p47_R3a) AS totalP47 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p47_R3a = '1' UNION ALL SELECT COUNT(p47_R3a) AS totalP47 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p47_R3a = '0')");

					while ($cR47Max= $csCMaxR47->fetchArray()) {
						$valMax47=$cR47Max['valMax'];
					}

					if ($valMax47 === $rSiempre) {
						$colorSiempre = 'azul';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>

					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p47_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p47_R3a = '1'");
					while ($cR47= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR47['rCasiSiempre'];
					}

					if ($valMax47 === $rCasiSiempre) {
						$colorCasiSiempre = 'verde';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>

					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p47_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p47_R3a = '2'");
					while ($cR47= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR47['rAlgunasVeces'];
					}

					if ($valMax47 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>

					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p47_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p47_R3a = '3'");
					while ($cR47= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR47['rCasiNunca'];
					}

					if ($valMax47 === $rCasiNunca) {
						$colorCasiNunca = 'naranja';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>

					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p47_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p47_R3a = '4'");
					while ($cR47= $csNunca->fetchArray()) {
						$rNunca=$cR47['rNunca'];
					}

					if ($valMax47 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR47p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR47p = (isset($sumaR47p)) ? $sumaR47p : 0;
					$por47rSiempre = round(($rSiempre/$sumaR47p)*100,0, PHP_ROUND_HALF_EVEN);
					$por47rCasiSiempre = round(($rCasiSiempre/$sumaR47p)*100,0, PHP_ROUND_HALF_EVEN);
					$por47rAlgunasVeces = round(($rAlgunasVeces/$sumaR47p)*100,0, PHP_ROUND_HALF_EVEN);
					$por47rCasiNunca = round(($rCasiNunca/$sumaR47p)*100,0, PHP_ROUND_HALF_EVEN);
					$por47rNunca = round(($rNunca/$sumaR47p)*100,0, PHP_ROUND_HALF_EVEN);

					$por47rSiempre = (isset($por47rSiempre)) ? $por47rSiempre : 0;
					$por47rCasiSiempre = (isset($por47rCasiSiempre)) ? $por47rCasiSiempre : 0;
					$por47rAlgunasVeces = (isset($por47rAlgunasVeces)) ? $por47rAlgunasVeces : 0;
					$por47rCasiNunca = (isset($por47rCasiNunca)) ? $por47rCasiNunca : 0;
					$por47rNunca = (isset($por47rNunca)) ? $por47rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado azul">'.$por47rSiempre.'%</td>
						<td class="centrado verde">'.$por47rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por47rAlgunasVeces.'%</td>
						<td class="centrado naranja">'.$por47rCasiNunca.'%</td>
						<td class="centrado rojo">'.$por47rNunca.'%</td>
					</tr>
					';
				echo'
				<tr>
					<td>48.-	La forma como evalúan mi trabajo en mi centro de trabajo me ayuda a mejorar mi desempeño.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p48_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p48_R3a = '0'");
					while ($cR48= $csCSiempre->fetchArray()) {
						$rSiempre=$cR48['rSiempre'];
					}

					$csCMaxR48= $conPorPregunta -> query("SELECT MAX(totalp48) AS valMax FROM(SELECT COUNT(p48_R3a) AS totalp48 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p48_R3a = '4' UNION ALL SELECT COUNT(p48_R3a) AS totalp48 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p48_R3a = '3' UNION ALL SELECT COUNT(p48_R3a) AS totalp48 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p48_R3a = '2' UNION ALL SELECT COUNT(p48_R3a) AS totalp48 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p48_R3a = '1' UNION ALL SELECT COUNT(p48_R3a) AS totalp48 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p48_R3a = '0')");

					while ($cR48Max= $csCMaxR48->fetchArray()) {
						$valMax48=$cR48Max['valMax'];
					}

					if ($valMax48 === $rSiempre) {
						$colorSiempre = 'azul';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p48_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p48_R3a = '1'");
					while ($cR48= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR48['rCasiSiempre'];
					}

					if ($valMax48 === $rCasiSiempre) {
						$colorCasiSiempre = 'verde';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p48_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p48_R3a = '2'");
					while ($cR48= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR48['rAlgunasVeces'];
					}

					if ($valMax48 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p48_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p48_R3a = '3'");
					while ($cR48= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR48['rCasiNunca'];
					}

					if ($valMax48 === $rCasiNunca) {
						$colorCasiNunca = 'naranja';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p48_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p48_R3a = '4'");
					while ($cR48= $csNunca->fetchArray()) {
						$rNunca=$cR48['rNunca'];
					}

					if ($valMax48 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR48p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR48p = (isset($sumaR48p)) ? $sumaR48p : 0;
					$por48rSiempre = round(($rSiempre/$sumaR48p)*100,0, PHP_ROUND_HALF_EVEN);
					$por48rCasiSiempre = round(($rCasiSiempre/$sumaR48p)*100,0, PHP_ROUND_HALF_EVEN);
					$por48rAlgunasVeces = round(($rAlgunasVeces/$sumaR48p)*100,0, PHP_ROUND_HALF_EVEN);
					$por48rCasiNunca = round(($rCasiNunca/$sumaR48p)*100,0, PHP_ROUND_HALF_EVEN);
					$por48rNunca = round(($rNunca/$sumaR48p)*100,0, PHP_ROUND_HALF_EVEN);

					$por48rSiempre = (isset($por48rSiempre)) ? $por48rSiempre : 0;
					$por48rCasiSiempre = (isset($por48rCasiSiempre)) ? $por48rCasiSiempre : 0;
					$por48rAlgunasVeces = (isset($por48rAlgunasVeces)) ? $por48rAlgunasVeces : 0;
					$por48rCasiNunca = (isset($por48rCasiNunca)) ? $por48rCasiNunca : 0;
					$por48rNunca = (isset($por48rNunca)) ? $por48rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado azul">'.$por48rSiempre.'%</td>
						<td class="centrado verde">'.$por48rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por48rAlgunasVeces.'%</td>
						<td class="centrado naranja">'.$por48rCasiNunca.'%</td>
						<td class="centrado rojo">'.$por48rNunca.'%</td>
					</tr>
					';
				echo'
				<tr>
					<td>49.-	En mi centro de trabajo me pagan a tiempo mi salario.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p49_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p49_R3a = '0'");
					while ($cR49= $csCSiempre->fetchArray()) {
						$rSiempre=$cR49['rSiempre'];
					}

					$csCMaxR49= $conPorPregunta -> query("SELECT MAX(totalp49) AS valMax FROM(SELECT COUNT(p49_R3a) AS totalp49 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p49_R3a = '4' UNION ALL SELECT COUNT(p49_R3a) AS totalp49 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p49_R3a = '3' UNION ALL SELECT COUNT(p49_R3a) AS totalp49 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p49_R3a = '2' UNION ALL SELECT COUNT(p49_R3a) AS totalp49 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p49_R3a = '1' UNION ALL SELECT COUNT(p49_R3a) AS totalp49 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p49_R3a = '0')");

					while ($cR49Max= $csCMaxR49->fetchArray()) {
						$valMax49=$cR49Max['valMax'];
					}

					if ($valMax49 === $rSiempre) {
						$colorSiempre = 'azul';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p49_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p49_R3a = '1'");
					while ($cR49= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR49['rCasiSiempre'];
					}

					if ($valMax49 === $rCasiSiempre) {
						$colorCasiSiempre = 'verde';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p49_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p49_R3a = '2'");
					while ($cR49= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR49['rAlgunasVeces'];
					}

					if ($valMax49 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p49_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p49_R3a = '3'");
					while ($cR49= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR49['rCasiNunca'];
					}

					if ($valMax49 === $rCasiNunca) {
						$colorCasiNunca = 'naranja';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p49_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p49_R3a = '4'");
					while ($cR49= $csNunca->fetchArray()) {
						$rNunca=$cR49['rNunca'];
					}

					if ($valMax49 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR49p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR49p = (isset($sumaR49p)) ? $sumaR49p : 0;
					$por49rSiempre = round(($rSiempre/$sumaR49p)*100,0, PHP_ROUND_HALF_EVEN);
					$por49rCasiSiempre = round(($rCasiSiempre/$sumaR49p)*100,0, PHP_ROUND_HALF_EVEN);
					$por49rAlgunasVeces = round(($rAlgunasVeces/$sumaR49p)*100,0, PHP_ROUND_HALF_EVEN);
					$por49rCasiNunca = round(($rCasiNunca/$sumaR49p)*100,0, PHP_ROUND_HALF_EVEN);
					$por49rNunca = round(($rNunca/$sumaR49p)*100,0, PHP_ROUND_HALF_EVEN);

					$por49rSiempre = (isset($por49rSiempre)) ? $por49rSiempre : 0;
					$por49rCasiSiempre = (isset($por49rCasiSiempre)) ? $por49rCasiSiempre : 0;
					$por49rAlgunasVeces = (isset($por49rAlgunasVeces)) ? $por49rAlgunasVeces : 0;
					$por49rCasiNunca = (isset($por49rCasiNunca)) ? $por49rCasiNunca : 0;
					$por49rNunca = (isset($por49rNunca)) ? $por49rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado azul">'.$por49rSiempre.'%</td>
						<td class="centrado verde">'.$por49rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por49rAlgunasVeces.'%</td>
						<td class="centrado naranja">'.$por49rCasiNunca.'%</td>
						<td class="centrado rojo">'.$por49rNunca.'%</td>
					</tr>
					';
				echo'
				<tr>
					<td>50.-	El pago que recibo es el que merezco por el trabajo que realizo.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p50_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p50_R3a = '0'");
					while ($cR50= $csCSiempre->fetchArray()) {
						$rSiempre=$cR50['rSiempre'];
					}

					$csCMaxR50= $conPorPregunta -> query("SELECT MAX(totalp50) AS valMax FROM(SELECT COUNT(p50_R3a) AS totalp50 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p50_R3a = '4' UNION ALL SELECT COUNT(p50_R3a) AS totalp50 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p50_R3a = '3' UNION ALL SELECT COUNT(p50_R3a) AS totalp50 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p50_R3a = '2' UNION ALL SELECT COUNT(p50_R3a) AS totalp50 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p50_R3a = '1' UNION ALL SELECT COUNT(p50_R3a) AS totalp50 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p50_R3a = '0')");

					while ($cR50Max= $csCMaxR50->fetchArray()) {
						$valMax50=$cR50Max['valMax'];
					}

					if ($valMax50 === $rSiempre) {
						$colorSiempre = 'azul';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p50_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p50_R3a = '1'");
					while ($cR50= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR50['rCasiSiempre'];
					}

					if ($valMax50 === $rCasiSiempre) {
						$colorCasiSiempre = 'verde';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>

					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p50_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p50_R3a = '2'");
					while ($cR50= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR50['rAlgunasVeces'];
					}

					if ($valMax50 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p50_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p50_R3a = '3'");
					while ($cR50= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR50['rCasiNunca'];
					}

					if ($valMax50 === $rCasiNunca) {
						$colorCasiNunca = 'naranja';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p50_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p50_R3a = '4'");
					while ($cR50= $csNunca->fetchArray()) {
						$rNunca=$cR50['rNunca'];
					}

					if ($valMax50 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR50p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR50p = (isset($sumaR50p)) ? $sumaR50p : 0;
					$por50rSiempre = round(($rSiempre/$sumaR50p)*100,0, PHP_ROUND_HALF_EVEN);
					$por50rCasiSiempre = round(($rCasiSiempre/$sumaR50p)*100,0, PHP_ROUND_HALF_EVEN);
					$por50rAlgunasVeces = round(($rAlgunasVeces/$sumaR50p)*100,0, PHP_ROUND_HALF_EVEN);
					$por50rCasiNunca = round(($rCasiNunca/$sumaR50p)*100,0, PHP_ROUND_HALF_EVEN);
					$por50rNunca = round(($rNunca/$sumaR50p)*100,0, PHP_ROUND_HALF_EVEN);

					$por50rSiempre = (isset($por50rSiempre)) ? $por50rSiempre : 0;
					$por50rCasiSiempre = (isset($por50rCasiSiempre)) ? $por50rCasiSiempre : 0;
					$por50rAlgunasVeces = (isset($por50rAlgunasVeces)) ? $por50rAlgunasVeces : 0;
					$por50rCasiNunca = (isset($por50rCasiNunca)) ? $por50rCasiNunca : 0;
					$por50rNunca = (isset($por50rNunca)) ? $por50rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado azul">'.$por50rSiempre.'%</td>
						<td class="centrado verde">'.$por50rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por50rAlgunasVeces.'%</td>
						<td class="centrado naranja">'.$por50rCasiNunca.'%</td>
						<td class="centrado rojo">'.$por50rNunca.'%</td>
					</tr>
					';
				echo'
				<tr>
					<td>51.-	Si obtengo los resultados esperados en mi trabajo me recompensan o reconocen.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p51_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p51_R3a = '0'");
					while ($cR51= $csCSiempre->fetchArray()) {
						$rSiempre=$cR51['rSiempre'];
					}

					$csCMaxR51= $conPorPregunta -> query("SELECT MAX(totalp51) AS valMax FROM(SELECT COUNT(p51_R3a) AS totalp51 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p51_R3a = '4' UNION ALL SELECT COUNT(p51_R3a) AS totalp51 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p51_R3a = '3' UNION ALL SELECT COUNT(p51_R3a) AS totalp51 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p51_R3a = '2' UNION ALL SELECT COUNT(p51_R3a) AS totalp51 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p51_R3a = '1' UNION ALL SELECT COUNT(p51_R3a) AS totalp51 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p51_R3a = '0')");

					while ($cR51Max= $csCMaxR51->fetchArray()) {
						$valMax51=$cR51Max['valMax'];
					}

					if ($valMax51 === $rSiempre) {
						$colorSiempre = 'azul';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p51_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p51_R3a = '1'");
					while ($cR51= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR51['rCasiSiempre'];
					}

					if ($valMax51 === $rCasiSiempre) {
						$colorCasiSiempre = 'verde';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p51_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p51_R3a = '2'");
					while ($cR51= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR51['rAlgunasVeces'];
					}

					if ($valMax51 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p51_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p51_R3a = '3'");
					while ($cR51= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR51['rCasiNunca'];
					}

					if ($valMax51 === $rCasiNunca) {
						$colorCasiNunca = 'naranja';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p51_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p51_R3a = '4'");
					while ($cR51= $csNunca->fetchArray()) {
						$rNunca=$cR51['rNunca'];
					}

					if ($valMax51 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR51p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR51p = (isset($sumaR51p)) ? $sumaR51p : 0;
					$por51rSiempre = round(($rSiempre/$sumaR51p)*100,0, PHP_ROUND_HALF_EVEN);
					$por51rCasiSiempre = round(($rCasiSiempre/$sumaR51p)*100,0, PHP_ROUND_HALF_EVEN);
					$por51rAlgunasVeces = round(($rAlgunasVeces/$sumaR51p)*100,0, PHP_ROUND_HALF_EVEN);
					$por51rCasiNunca = round(($rCasiNunca/$sumaR51p)*100,0, PHP_ROUND_HALF_EVEN);
					$por51rNunca = round(($rNunca/$sumaR51p)*100,0, PHP_ROUND_HALF_EVEN);

					$por51rSiempre = (isset($por51rSiempre)) ? $por51rSiempre : 0;
					$por51rCasiSiempre = (isset($por51rCasiSiempre)) ? $por51rCasiSiempre : 0;
					$por51rAlgunasVeces = (isset($por51rAlgunasVeces)) ? $por51rAlgunasVeces : 0;
					$por51rCasiNunca = (isset($por51rCasiNunca)) ? $por51rCasiNunca : 0;
					$por51rNunca = (isset($por51rNunca)) ? $por51rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado azul">'.$por51rSiempre.'%</td>
						<td class="centrado verde">'.$por51rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por51rAlgunasVeces.'%</td>
						<td class="centrado naranja">'.$por51rCasiNunca.'%</td>
						<td class="centrado rojo">'.$por51rNunca.'%</td>
					</tr>
					';
				echo'
				<tr>
					<td>52.-	Las personas que hacen bien el trabajo pueden crecer laboralmente.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p52_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p52_R3a = '0'");
					while ($cR52= $csCSiempre->fetchArray()) {
						$rSiempre=$cR52['rSiempre'];
					}

					$csCMaxR52= $conPorPregunta -> query("SELECT MAX(totalp52) AS valMax FROM(SELECT COUNT(p52_R3a) AS totalp52 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p52_R3a = '4' UNION ALL SELECT COUNT(p52_R3a) AS totalp52 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p52_R3a = '3' UNION ALL SELECT COUNT(p52_R3a) AS totalp52 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p52_R3a = '2' UNION ALL SELECT COUNT(p52_R3a) AS totalp52 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p52_R3a = '1' UNION ALL SELECT COUNT(p52_R3a) AS totalp52 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p52_R3a = '0')");

					while ($cR52Max= $csCMaxR52->fetchArray()) {
						$valMax52=$cR52Max['valMax'];
					}

					if ($valMax52 === $rSiempre) {
						$colorSiempre = 'azul';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p52_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p52_R3a = '1'");
					while ($cR52= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR52['rCasiSiempre'];
					}

					if ($valMax52 === $rCasiSiempre) {
						$colorCasiSiempre = 'verde';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p52_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p52_R3a = '2'");
					while ($cR52= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR52['rAlgunasVeces'];
					}

					if ($valMax52 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'naranja';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p52_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p52_R3a = '3'");
					while ($cR52= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR52['rCasiNunca'];
					}

					if ($valMax52 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p52_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p52_R3a = '4'");
					while ($cR52= $csNunca->fetchArray()) {
						$rNunca=$cR52['rNunca'];
					}

					if ($valMax52 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR52p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR52p = (isset($sumaR52p)) ? $sumaR52p : 0;
					$por52rSiempre = round(($rSiempre/$sumaR52p)*100,0, PHP_ROUND_HALF_EVEN);
					$por52rCasiSiempre = round(($rCasiSiempre/$sumaR52p)*100,0, PHP_ROUND_HALF_EVEN);
					$por52rAlgunasVeces = round(($rAlgunasVeces/$sumaR52p)*100,0, PHP_ROUND_HALF_EVEN);
					$por52rCasiNunca = round(($rCasiNunca/$sumaR52p)*100,0, PHP_ROUND_HALF_EVEN);
					$por52rNunca = round(($rNunca/$sumaR52p)*100,0, PHP_ROUND_HALF_EVEN);

					$por52rSiempre = (isset($por52rSiempre)) ? $por52rSiempre : 0;
					$por52rCasiSiempre = (isset($por52rCasiSiempre)) ? $por52rCasiSiempre : 0;
					$por52rAlgunasVeces = (isset($por52rAlgunasVeces)) ? $por52rAlgunasVeces : 0;
					$por52rCasiNunca = (isset($por52rCasiNunca)) ? $por52rCasiNunca : 0;
					$por52rNunca = (isset($por52rNunca)) ? $por52rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado azul">'.$por52rSiempre.'%</td>
						<td class="centrado verde">'.$por52rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por52rAlgunasVeces.'%</td>
						<td class="centrado naranja">'.$por52rCasiNunca.'%</td>
						<td class="centrado rojo">'.$por52rNunca.'%</td>
					</tr>
					';
				echo'
				<tr>
					<td>53.-	Considero que mi trabajo es estable.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p53_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p53_R3a = '0'");
					while ($cR53= $csCSiempre->fetchArray()) {
						$rSiempre=$cR53['rSiempre'];
					}

					$csCMaxR53= $conPorPregunta -> query("SELECT MAX(totalp53) AS valMax FROM(SELECT COUNT(p53_R3a) AS totalp53 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p53_R3a = '4' UNION ALL SELECT COUNT(p53_R3a) AS totalp53 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p53_R3a = '3' UNION ALL SELECT COUNT(p53_R3a) AS totalp53 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p53_R3a = '2' UNION ALL SELECT COUNT(p53_R3a) AS totalp53 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p53_R3a = '1' UNION ALL SELECT COUNT(p53_R3a) AS totalp53 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p53_R3a = '0')");

					while ($cR53Max= $csCMaxR53->fetchArray()) {
						$valMax53=$cR53Max['valMax'];
					}

					if ($valMax53 === $rSiempre) {
						$colorSiempre = 'azul';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p53_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p53_R3a = '1'");
					while ($cR53= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR53['rCasiSiempre'];
					}

					if ($valMax53 === $rCasiSiempre) {
						$colorCasiSiempre = 'verde';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p53_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p53_R3a = '2'");
					while ($cR53= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR53['rAlgunasVeces'];
					}

					if ($valMax53 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p53_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p53_R3a = '3'");
					while ($cR53= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR53['rCasiNunca'];
					}

					if ($valMax53 === $rCasiNunca) {
						$colorCasiNunca = 'naranja';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p53_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p53_R3a = '4'");
					while ($cR53= $csNunca->fetchArray()) {
						$rNunca=$cR53['rNunca'];
					}

					if ($valMax53 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}
####### SUMA DE TOTALES #######
					$sumaR53p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR53p = (isset($sumaR53p)) ? $sumaR53p : 0;
					$por53rSiempre = round(($rSiempre/$sumaR53p)*100,0, PHP_ROUND_HALF_EVEN);
					$por53rCasiSiempre = round(($rCasiSiempre/$sumaR53p)*100,0, PHP_ROUND_HALF_EVEN);
					$por53rAlgunasVeces = round(($rAlgunasVeces/$sumaR53p)*100,0, PHP_ROUND_HALF_EVEN);
					$por53rCasiNunca = round(($rCasiNunca/$sumaR53p)*100,0, PHP_ROUND_HALF_EVEN);
					$por53rNunca = round(($rNunca/$sumaR53p)*100,0, PHP_ROUND_HALF_EVEN);

					$por53rSiempre = (isset($por53rSiempre)) ? $por53rSiempre : 0;
					$por53rCasiSiempre = (isset($por53rCasiSiempre)) ? $por53rCasiSiempre : 0;
					$por53rAlgunasVeces = (isset($por53rAlgunasVeces)) ? $por53rAlgunasVeces : 0;
					$por53rCasiNunca = (isset($por53rCasiNunca)) ? $por53rCasiNunca : 0;
					$por53rNunca = (isset($por53rNunca)) ? $por53rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado azul">'.$por53rSiempre.'%</td>
						<td class="centrado verde">'.$por53rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por53rAlgunasVeces.'%</td>
						<td class="centrado naranja">'.$por53rCasiNunca.'%</td>
						<td class="centrado rojo">'.$por53rNunca.'%</td>
					</tr>
					';
				echo'
				<tr>
					<td>54.-	En mi trabajo existe continua rotación de personal.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p54_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p54_R3a = '4'");
					while ($cR54= $csCSiempre->fetchArray()) {
						$rSiempre=$cR54['rSiempre'];
					}

					$csCMaxR54= $conPorPregunta -> query("SELECT MAX(totalp54) AS valMax FROM(SELECT COUNT(p54_R3a) AS totalp54 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p54_R3a = '4' UNION ALL SELECT COUNT(p54_R3a) AS totalp54 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p54_R3a = '3' UNION ALL SELECT COUNT(p54_R3a) AS totalp54 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p54_R3a = '2' UNION ALL SELECT COUNT(p54_R3a) AS totalp54 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p54_R3a = '1' UNION ALL SELECT COUNT(p54_R3a) AS totalp54 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p54_R3a = '0')");

					while ($cR54Max= $csCMaxR54->fetchArray()) {
						$valMax54=$cR54Max['valMax'];
					}

					if ($valMax54 === $rSiempre) {
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p54_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p54_R3a = '3'");
					while ($cR54= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR54['rCasiSiempre'];
					}

					if ($valMax54 === $rCasiSiempre) {
						$colorCasiSiempre = 'naranja';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p54_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p54_R3a = '2'");
					while ($cR54= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR54['rAlgunasVeces'];
					}

					if ($valMax54 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p54_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p54_R3a = '1'");
					while ($cR54= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR54['rCasiNunca'];
					}

					if ($valMax54 === $rCasiNunca) {
						$colorCasiNunca = 'verde';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p54_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p54_R3a = '0'");
					while ($cR54= $csNunca->fetchArray()) {
						$rNunca=$cR54['rNunca'];
					}

					if ($valMax54 === $rNunca) {
						$colorNunca = 'azul';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR54p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR54p = (isset($sumaR54p)) ? $sumaR54p : 0;
					$por54rSiempre = round(($rSiempre/$sumaR54p)*100,0, PHP_ROUND_HALF_EVEN);
					$por54rCasiSiempre = round(($rCasiSiempre/$sumaR54p)*100,0, PHP_ROUND_HALF_EVEN);
					$por54rAlgunasVeces = round(($rAlgunasVeces/$sumaR54p)*100,0, PHP_ROUND_HALF_EVEN);
					$por54rCasiNunca = round(($rCasiNunca/$sumaR54p)*100,0, PHP_ROUND_HALF_EVEN);
					$por54rNunca = round(($rNunca/$sumaR54p)*100,0, PHP_ROUND_HALF_EVEN);

					$por54rSiempre = (isset($por54rSiempre)) ? $por54rSiempre : 0;
					$por54rCasiSiempre = (isset($por54rCasiSiempre)) ? $por54rCasiSiempre : 0;
					$por54rAlgunasVeces = (isset($por54rAlgunasVeces)) ? $por54rAlgunasVeces : 0;
					$por54rCasiNunca = (isset($por54rCasiNunca)) ? $por54rCasiNunca : 0;
					$por54rNunca = (isset($por54rNunca)) ? $por54rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado rojo">'.$por54rSiempre.'%</td>
						<td class="centrado naranja">'.$por54rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por54rAlgunasVeces.'%</td>
						<td class="centrado verde">'.$por54rCasiNunca.'%</td>
						<td class="centrado azul">'.$por54rNunca.'%</td>
					</tr>
					';
				echo'
				<tr>
					<td>55.-	Siento orgullo de laborar en este centro de trabajo.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p55_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p55_R3a = '0'");
					while ($cR55= $csCSiempre->fetchArray()) {
						$rSiempre=$cR55['rSiempre'];
					}

					$csCMaxR55= $conPorPregunta -> query("SELECT MAX(totalp55) AS valMax FROM(SELECT COUNT(p55_R3a) AS totalp55 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p55_R3a = '4' UNION ALL SELECT COUNT(p55_R3a) AS totalp55 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p55_R3a = '3' UNION ALL SELECT COUNT(p55_R3a) AS totalp55 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p55_R3a = '2' UNION ALL SELECT COUNT(p55_R3a) AS totalp55 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p55_R3a = '1' UNION ALL SELECT COUNT(p55_R3a) AS totalp55 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p55_R3a = '0')");

					while ($cR55Max= $csCMaxR55->fetchArray()) {
						$valMax55=$cR55Max['valMax'];
					}

					if ($valMax55 === $rSiempre) {
						$colorSiempre = 'azul';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p55_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p55_R3a = '1'");
					while ($cR55= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR55['rCasiSiempre'];
					}

					if ($valMax55 === $rCasiSiempre) {
						$colorCasiSiempre = 'verde';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p55_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p55_R3a = '2'");
					while ($cR55= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR55['rAlgunasVeces'];
					}

					if ($valMax55 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p55_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p55_R3a = '3'");
					while ($cR55= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR55['rCasiNunca'];
					}

					if ($valMax55 === $rCasiNunca) {
						$colorCasiNunca = 'naranja';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p55_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p55_R3a = '4'");
					while ($cR55= $csNunca->fetchArray()) {
						$rNunca=$cR55['rNunca'];
					}

					if ($valMax55 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR55p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR55p = (isset($sumaR55p)) ? $sumaR55p : 0;
					$por55rSiempre = round(($rSiempre/$sumaR55p)*100,0, PHP_ROUND_HALF_EVEN);
					$por55rCasiSiempre = round(($rCasiSiempre/$sumaR55p)*100,0, PHP_ROUND_HALF_EVEN);
					$por55rAlgunasVeces = round(($rAlgunasVeces/$sumaR55p)*100,0, PHP_ROUND_HALF_EVEN);
					$por55rCasiNunca = round(($rCasiNunca/$sumaR55p)*100,0, PHP_ROUND_HALF_EVEN);
					$por55rNunca = round(($rNunca/$sumaR55p)*100,0, PHP_ROUND_HALF_EVEN);

					$por55rSiempre = (isset($por55rSiempre)) ? $por55rSiempre : 0;
					$por55rCasiSiempre = (isset($por55rCasiSiempre)) ? $por55rCasiSiempre : 0;
					$por55rAlgunasVeces = (isset($por55rAlgunasVeces)) ? $por55rAlgunasVeces : 0;
					$por55rCasiNunca = (isset($por55rCasiNunca)) ? $por55rCasiNunca : 0;
					$por55rNunca = (isset($por55rNunca)) ? $por55rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado azul">'.$por55rSiempre.'%</td>
						<td class="centrado verde">'.$por55rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por55rAlgunasVeces.'%</td>
						<td class="centrado naranja">'.$por55rCasiNunca.'%</td>
						<td class="centrado rojo">'.$por55rNunca.'%</td>
					</tr>
					';
				echo'
				<tr>
					<td>56.-	Me siento comprometido con mi trabajo.</td>
					';
					$csCSiempre= $conPorPregunta -> query("SELECT COUNT(p56_R3a) AS rSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p56_R3a = '0'");
					while ($cR56= $csCSiempre->fetchArray()) {
						$rSiempre=$cR56['rSiempre'];
					}

					$csCMaxR56= $conPorPregunta -> query("SELECT MAX(totalp56) AS valMax FROM(SELECT COUNT(p56_R3a) AS totalp56 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p56_R3a = '4' UNION ALL SELECT COUNT(p56_R3a) AS totalp56 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p56_R3a = '3' UNION ALL SELECT COUNT(p56_R3a) AS totalp56 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p56_R3a = '2' UNION ALL SELECT COUNT(p56_R3a) AS totalp56 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p56_R3a = '1' UNION ALL SELECT COUNT(p56_R3a) AS totalp56 FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p56_R3a = '0')");

					while ($cR56Max= $csCMaxR56->fetchArray()) {
						$valMax56=$cR56Max['valMax'];
					}

					if ($valMax56 === $rSiempre) {
						$colorSiempre = 'azul';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="centrado '.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p56_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p56_R3a = '1'");
					while ($cR56= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR56['rCasiSiempre'];
					}

					if ($valMax56 === $rCasiSiempre) {
						$colorCasiSiempre = 'verde';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="centrado '.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p56_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p56_R3a = '2'");
					while ($cR56= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR56['rAlgunasVeces'];
					}

					if ($valMax56 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'amarillo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="centrado '.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p56_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p56_R3a = '3'");
					while ($cR56= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR56['rCasiNunca'];
					}

					if ($valMax56 === $rCasiNunca) {
						$colorCasiNunca = 'naranja';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="centrado '.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p56_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p56_R3a = '4'");
					while ($cR56= $csNunca->fetchArray()) {
						$rNunca=$cR56['rNunca'];
					}

					if ($valMax56 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					####### SUMA DE TOTALES #######
					$sumaR56p = $rSiempre+$rCasiSiempre+$rAlgunasVeces+$rCasiNunca+$rNunca;
					$sumaR56p = (isset($sumaR56p)) ? $sumaR56p : 0;
					$por56rSiempre = round(($rSiempre/$sumaR56p)*100,0, PHP_ROUND_HALF_EVEN);
					$por56rCasiSiempre = round(($rCasiSiempre/$sumaR56p)*100,0, PHP_ROUND_HALF_EVEN);
					$por56rAlgunasVeces = round(($rAlgunasVeces/$sumaR56p)*100,0, PHP_ROUND_HALF_EVEN);
					$por56rCasiNunca = round(($rCasiNunca/$sumaR56p)*100,0, PHP_ROUND_HALF_EVEN);
					$por56rNunca = round(($rNunca/$sumaR56p)*100,0, PHP_ROUND_HALF_EVEN);

					$por56rSiempre = (isset($por56rSiempre)) ? $por56rSiempre : 0;
					$por56rCasiSiempre = (isset($por56rCasiSiempre)) ? $por56rCasiSiempre : 0;
					$por56rAlgunasVeces = (isset($por56rAlgunasVeces)) ? $por56rAlgunasVeces : 0;
					$por56rCasiNunca = (isset($por56rCasiNunca)) ? $por56rCasiNunca : 0;
					$por56rNunca = (isset($por56rNunca)) ? $por56rNunca : 0;

					
					###### SUMA DE TOTALES #######

					

					echo '<td class="centrado '.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
				';


				echo'
					<tr>
						<td style="text-align: right;"><i>Total en porcentaje</i></td>
						<td class="centrado azul">'.$por56rSiempre.'%</td>
						<td class="centrado verde">'.$por56rCasiSiempre.'%</td>
						<td class="centrado amarillo">'.$por56rAlgunasVeces.'%</td>
						<td class="centrado naranja">'.$por56rCasiNunca.'%</td>
						<td class="centrado rojo">'.$por56rNunca.'%</td>
					</tr>
			</table>

			<br>

			<div style="font-size: .8em;">
				<h3>Entorno organizacional</h3>
				<h4>Reconocimiento del desempeño</h4>
				';
				
				$dDatos47_1a = '['.$por47rSiempre.','.$por47rCasiSiempre.','.$por47rAlgunasVeces.','.$por47rCasiNunca.','.$por47rNunca.']';

				$dDatos48_1a = '['.$por48rSiempre.','.$por48rCasiSiempre.','.$por48rAlgunasVeces.','.$por48rCasiNunca.','.$por48rNunca.']';

				$dDatos49_1a = '['.$por49rSiempre.','.$por49rCasiSiempre.','.$por49rAlgunasVeces.','.$por49rCasiNunca.','.$por49rNunca.']';

				$dDatos50_1a = '['.$por50rSiempre.','.$por50rCasiSiempre.','.$por50rAlgunasVeces.','.$por50rCasiNunca.','.$por50rNunca.']';

				$dDatos51_1a = '['.$por51rSiempre.','.$por51rCasiSiempre.','.$por51rAlgunasVeces.','.$por51rCasiNunca.','.$por51rNunca.']';

				$dDatos52_1a = '['.$por52rSiempre.','.$por52rCasiSiempre.','.$por52rAlgunasVeces.','.$por52rCasiNunca.','.$por52rNunca.']';

				$dDatos55_1a = '['.$por55rSiempre.','.$por55rCasiSiempre.','.$por55rAlgunasVeces.','.$por55rCasiNunca.','.$por55rNunca.']';

				$dDatos56_1a = '['.$por56rSiempre.','.$por56rCasiSiempre.','.$por56rAlgunasVeces.','.$por56rCasiNunca.','.$por56rNunca.']';

				$dDatos53_1a = '['.$por53rSiempre.','.$por53rCasiSiempre.','.$por53rAlgunasVeces.','.$por53rCasiNunca.','.$por53rNunca.']';

				$dDatos54_1a = '['.$por54rSiempre.','.$por54rCasiSiempre.','.$por54rAlgunasVeces.','.$por54rCasiNunca.','.$por54rNunca.']';

				echo'
				<table style="width: 800px;">
					<tr>
						<td class="tSinBorde" style="width: 400px;">
							<b>Escasa o nula retroalimentación del desempeño (47, 48)</b>
							<div>
								<canvas id="grafica01e'.$varGraf.'"></canvas>
							</div>
							
						</td>
						<td class="tSinBorde" style="width: 400px;">
							<b>Escaso o nulo reconocimiento y compensación (49, 50, 51, 52)</b>
							<div>
								<canvas id="grafica02e'.$varGraf.'"></canvas>
							</div>
						</td>
					</tr>
					<tr>
						<td class="tSinBorde" style="width: 400px;">
							<b>ReLimitado sentido de pertenencia (55, 56)</b>
							<div>
								<canvas id="grafica03e'.$varGraf.'"></canvas>
							</div>
						</td>
						<td class="tSinBorde" style="width: 400px;">
							<b>Inestabilidad laboral (53, 54)</b>
							<div>
								<canvas id="grafica04e'.$varGraf.'"></canvas>
							</div>
						</td>
					</tr>
					
				</table>
			</div>

			



			<br>

			



		';

echo "
		<script>
        var ctx1 = document.getElementById('grafica01a".$varGraf."').getContext('2d');
        var mixedChart = new Chart(ctx1, {
            type: 'doughnut',
            data: {
                labels: ['Siempre','Casi siempre','Algunas veces','Casi nunca'],
                datasets: [{
                    label: 'Pregunta (1)',
                    data: ".$dDatos01_1a.",
                    backgroundColor: [
                        'rgba(155,229,247,1)',
                        'rgba(107,245,110,1)',
                        'rgba(255,255,0,1)',
                        'rgba(255,192,0,1)',
                        'rgba(255,0,0,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Pregunta (3)',
                    data: ".$dDatos03_1a.",
                    backgroundColor: [
                        'rgba(255,0,0,1)',
	                    'rgba(255,192,0,1)',
	                    'rgba(255,255,0,1)',
	                    'rgba(107,245,110,1)',
	                    'rgba(155,229,247,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                }
               ]
            },
            options: {
            	legend: {
			        display: false
			    },
	            tooltips: {
	                enabled: true,
	                mode: 'single',
	                callbacks: {
	                    label: function(tooltipItems, data) { 
	                        return data.datasets[tooltipItems.datasetIndex].label + ': ' + data.datasets[tooltipItems.datasetIndex].data[tooltipItems.index] + '% ' + data.labels[tooltipItems.datasetIndex];
	                    }
	                }
	            },
	     	}
        });

        var ctx2 = document.getElementById('grafica02a".$varGraf."').getContext('2d');
        var mixedChart = new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: [],
                datasets: [{
                    label: 'Pregunta (2)',
                    data: ".$dDatos02_1a.",
                    backgroundColor: [
                        'rgba(255,0,0,1)',
	                    'rgba(255,192,0,1)',
	                    'rgba(255,255,0,1)',
	                    'rgba(107,245,110,1)',
	                    'rgba(155,229,247,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Pregunta (4)',
                    data: ".$dDatos04_1a.",
                    backgroundColor: [
                    	'rgba(155,229,247,1)',
                        'rgba(107,245,110,1)',
                        'rgba(255,255,0,1)',
                        'rgba(255,192,0,1)',
                        'rgba(255,0,0,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                }
               ]
            },
            options: {
	            tooltips: {
	                enabled: true,
	                mode: 'single',
	                callbacks: {
	                    label: function(tooltipItems, data) { 
	                        return data.datasets[tooltipItems.datasetIndex].label + ': ' + data.datasets[tooltipItems.datasetIndex].data[tooltipItems.index] + '%';
	                    }
	                }
	            },
	     	}
        });

        var ctx3 = document.getElementById('grafica03a".$varGraf."').getContext('2d');
        var mixedChart = new Chart(ctx3, {
            type: 'doughnut',
            data: {
                labels: [],
                datasets: [{
                    label: 'Pregunta (5)',
                    data: ".$dDatos05_1a.",
                    backgroundColor: [
                        'rgba(255,0,0,1)',
	                    'rgba(255,192,0,1)',
	                    'rgba(255,255,0,1)',
	                    'rgba(107,245,110,1)',
	                    'rgba(155,229,247,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                }
               ]
            },
            options: {
	            tooltips: {
	                enabled: true,
	                mode: 'single',
	                callbacks: {
	                    label: function(tooltipItems, data) { 
	                        return data.datasets[tooltipItems.datasetIndex].label + ': ' + data.datasets[tooltipItems.datasetIndex].data[tooltipItems.index] + '%';
	                    }
	                }
	            },
	     	}
        });

        var ctx4 = document.getElementById('grafica01b".$varGraf."').getContext('2d');
        var mixedChart = new Chart(ctx4, {
            type: 'doughnut',
            data: {
                labels: [],
                datasets: [{
                    label: 'Pregunta (6)',
                    data: ".$dDatos06_1a.",
                    backgroundColor: [
                        'rgba(255,0,0,1)',
	                    'rgba(255,192,0,1)',
	                    'rgba(255,255,0,1)',
	                    'rgba(107,245,110,1)',
	                    'rgba(155,229,247,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Pregunta (12)',
                    data: ".$dDatos12_1a.",
                    backgroundColor: [
                    	'rgba(255,0,0,1)',
	                    'rgba(255,192,0,1)',
	                    'rgba(255,255,0,1)',
	                    'rgba(107,245,110,1)',
	                    'rgba(155,229,247,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                }
               ]
            },
            options: {
	            tooltips: {
	                enabled: true,
	                mode: 'single',
	                callbacks: {
	                    label: function(tooltipItems, data) { 
	                        return data.datasets[tooltipItems.datasetIndex].label + ': ' + data.datasets[tooltipItems.datasetIndex].data[tooltipItems.index] + '%';
	                    }
	                }
	            },
	     	}
        });

        var ctx5 = document.getElementById('grafica02b".$varGraf."').getContext('2d');
        var mixedChart = new Chart(ctx5, {
            type: 'doughnut',
            data: {
                labels: [],
                datasets: [{
                    label: 'Pregunta (7)',
                    data: ".$dDatos07_1a.",
                    backgroundColor: [
                        'rgba(255,0,0,1)',
	                    'rgba(255,192,0,1)',
	                    'rgba(255,255,0,1)',
	                    'rgba(107,245,110,1)',
	                    'rgba(155,229,247,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Pregunta (8)',
                    data: ".$dDatos08_1a.",
                    backgroundColor: [
                    	'rgba(255,0,0,1)',
	                    'rgba(255,192,0,1)',
	                    'rgba(255,255,0,1)',
	                    'rgba(107,245,110,1)',
	                    'rgba(155,229,247,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                }
               ]
            },
            options: {
	            tooltips: {
	                enabled: true,
	                mode: 'single',
	                callbacks: {
	                    label: function(tooltipItems, data) { 
	                        return data.datasets[tooltipItems.datasetIndex].label + ': ' + data.datasets[tooltipItems.datasetIndex].data[tooltipItems.index] + '%';
	                    }
	                }
	            },
	     	}
        });


        var ctx6 = document.getElementById('grafica03b".$varGraf."').getContext('2d');
        var mixedChart = new Chart(ctx6, {
            type: 'doughnut',
            data: {
                labels: [],
                datasets: [{
                    label: 'Pregunta (9)',
                    data: ".$dDatos09_1a.",
                    backgroundColor: [
                        'rgba(255,0,0,1)',
	                    'rgba(255,192,0,1)',
	                    'rgba(255,255,0,1)',
	                    'rgba(107,245,110,1)',
	                    'rgba(155,229,247,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Pregunta (10)',
                    data: ".$dDatos10_1a.",
                    backgroundColor: [
                    	'rgba(255,0,0,1)',
	                    'rgba(255,192,0,1)',
	                    'rgba(255,255,0,1)',
	                    'rgba(107,245,110,1)',
	                    'rgba(155,229,247,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Pregunta (11)',
                    data: ".$dDatos11_1a.",
                    backgroundColor: [
                    	'rgba(255,0,0,1)',
	                    'rgba(255,192,0,1)',
	                    'rgba(255,255,0,1)',
	                    'rgba(107,245,110,1)',
	                    'rgba(155,229,247,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                }
               ]
            },
            options: {
	            tooltips: {
	                enabled: true,
	                mode: 'single',
	                callbacks: {
	                    label: function(tooltipItems, data) { 
	                        return data.datasets[tooltipItems.datasetIndex].label + ': ' + data.datasets[tooltipItems.datasetIndex].data[tooltipItems.index] + '%';
	                    }
	                }
	            },
	     	}
        });

        var ctx7 = document.getElementById('grafica04b".$varGraf."').getContext('2d');
        var mixedChart = new Chart(ctx7, {
            type: 'doughnut',
            data: {
                labels: [],
                datasets: [{
                    label: 'Pregunta (65)',
                    data: ".$dDatos65_1a.",
                    backgroundColor: [
                        'rgba(255,0,0,1)',
	                    'rgba(255,192,0,1)',
	                    'rgba(255,255,0,1)',
	                    'rgba(107,245,110,1)',
	                    'rgba(155,229,247,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Pregunta (66)',
                    data: ".$dDatos66_1a.",
                    backgroundColor: [
                    	'rgba(255,0,0,1)',
	                    'rgba(255,192,0,1)',
	                    'rgba(255,255,0,1)',
	                    'rgba(107,245,110,1)',
	                    'rgba(155,229,247,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Pregunta (67)',
                    data: ".$dDatos67_1a.",
                    backgroundColor: [
                    	'rgba(255,0,0,1)',
	                    'rgba(255,192,0,1)',
	                    'rgba(255,255,0,1)',
	                    'rgba(107,245,110,1)',
	                    'rgba(155,229,247,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Pregunta (68)',
                    data: ".$dDatos68_1a.",
                    backgroundColor: [
                    	'rgba(255,0,0,1)',
	                    'rgba(255,192,0,1)',
	                    'rgba(255,255,0,1)',
	                    'rgba(107,245,110,1)',
	                    'rgba(155,229,247,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                }
               ]
            },
            options: {
	            tooltips: {
	                enabled: true,
	                mode: 'single',
	                callbacks: {
	                    label: function(tooltipItems, data) { 
	                        return data.datasets[tooltipItems.datasetIndex].label + ': ' + data.datasets[tooltipItems.datasetIndex].data[tooltipItems.index] + '%';
	                    }
	                }
	            },
	     	}
        });

        var ctx8 = document.getElementById('grafica05b".$varGraf."').getContext('2d');
        var mixedChart = new Chart(ctx8, {
            type: 'doughnut',
            data: {
                labels: [],
                datasets: [{
                    label: 'Pregunta (13)',
                    data: ".$dDatos13_1a.",
                    backgroundColor: [
                        'rgba(255,0,0,1)',
	                    'rgba(255,192,0,1)',
	                    'rgba(255,255,0,1)',
	                    'rgba(107,245,110,1)',
	                    'rgba(155,229,247,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Pregunta (14)',
                    data: ".$dDatos14_1a.",
                    backgroundColor: [
                    	'rgba(255,0,0,1)',
	                    'rgba(255,192,0,1)',
	                    'rgba(255,255,0,1)',
	                    'rgba(107,245,110,1)',
	                    'rgba(155,229,247,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                }
               ]
            },
            options: {
	            tooltips: {
	                enabled: true,
	                mode: 'single',
	                callbacks: {
	                    label: function(tooltipItems, data) { 
	                        return data.datasets[tooltipItems.datasetIndex].label + ': ' + data.datasets[tooltipItems.datasetIndex].data[tooltipItems.index] + '%';
	                    }
	                }
	            },
	     	}
        });

        var ctx9 = document.getElementById('grafica06b".$varGraf."').getContext('2d');
        var mixedChart = new Chart(ctx9, {
            type: 'doughnut',
            data: {
                labels: [],
                datasets: [{
                    label: 'Pregunta (15)',
                    data: ".$dDatos15_1a.",
                    backgroundColor: [
                        'rgba(255,0,0,1)',
	                    'rgba(255,192,0,1)',
	                    'rgba(255,255,0,1)',
	                    'rgba(107,245,110,1)',
	                    'rgba(155,229,247,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Pregunta (16)',
                    data: ".$dDatos16_1a.",
                    backgroundColor: [
                    	'rgba(255,0,0,1)',
	                    'rgba(255,192,0,1)',
	                    'rgba(255,255,0,1)',
	                    'rgba(107,245,110,1)',
	                    'rgba(155,229,247,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                }
               ]
            },
            options: {
	            tooltips: {
	                enabled: true,
	                mode: 'single',
	                callbacks: {
	                    label: function(tooltipItems, data) { 
	                        return data.datasets[tooltipItems.datasetIndex].label + ': ' + data.datasets[tooltipItems.datasetIndex].data[tooltipItems.index] + '%';
	                    }
	                }
	            },
	     	}
        });

        var ctx10 = document.getElementById('grafica07b".$varGraf."').getContext('2d');
        var mixedChart = new Chart(ctx10, {
            type: 'doughnut',
            data: {
                labels: [],
                datasets: [{
                    label: 'Pregunta (25)',
                    data: ".$dDatos25_1a.",
                    backgroundColor: [
						'rgba(155,229,247,1)',
						'rgba(107,245,110,1)',
						'rgba(255,255,0,1)',
						'rgba(255,192,0,1)',
						'rgba(255,0,0,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Pregunta (26)',
                    data: ".$dDatos26_1a.",
                    backgroundColor: [
                    	'rgba(155,229,247,1)',
						'rgba(107,245,110,1)',
						'rgba(255,255,0,1)',
						'rgba(255,192,0,1)',
						'rgba(255,0,0,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Pregunta (27)',
                    data: ".$dDatos27_1a.",
                    backgroundColor: [
                    	'rgba(155,229,247,1)',
						'rgba(107,245,110,1)',
						'rgba(255,255,0,1)',
						'rgba(255,192,0,1)',
						'rgba(255,0,0,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Pregunta (28)',
                    data: ".$dDatos28_1a.",
                    backgroundColor: [
                    	'rgba(155,229,247,1)',
						'rgba(107,245,110,1)',
						'rgba(255,255,0,1)',
						'rgba(255,192,0,1)',
						'rgba(255,0,0,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                }

               ]
            },
            options: {
	            tooltips: {
	                enabled: true,
	                mode: 'single',
	                callbacks: {
	                    label: function(tooltipItems, data) { 
	                        return data.datasets[tooltipItems.datasetIndex].label + ': ' + data.datasets[tooltipItems.datasetIndex].data[tooltipItems.index] + '%';
	                    }
	                }
	            },
	     	}
        });

        var ctx11 = document.getElementById('grafica08b".$varGraf."').getContext('2d');
        var mixedChart = new Chart(ctx11, {
            type: 'doughnut',
            data: {
                labels: [],
                datasets: [{
                    label: 'Pregunta (23)',
                    data: ".$dDatos23_1a.",
                    backgroundColor: [
						'rgba(155,229,247,1)',
						'rgba(107,245,110,1)',
						'rgba(255,255,0,1)',
						'rgba(255,192,0,1)',
						'rgba(255,0,0,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Pregunta (24)',
                    data: ".$dDatos24_1a.",
                    backgroundColor: [
                    	'rgba(155,229,247,1)',
						'rgba(107,245,110,1)',
						'rgba(255,255,0,1)',
						'rgba(255,192,0,1)',
						'rgba(255,0,0,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                }

               ]
            },
            options: {
	            tooltips: {
	                enabled: true,
	                mode: 'single',
	                callbacks: {
	                    label: function(tooltipItems, data) { 
	                        return data.datasets[tooltipItems.datasetIndex].label + ': ' + data.datasets[tooltipItems.datasetIndex].data[tooltipItems.index] + '%';
	                    }
	                }
	            },
	     	}
        });

        var ctx12 = document.getElementById('grafica09b".$varGraf."').getContext('2d');
        var mixedChart = new Chart(ctx12, {
            type: 'doughnut',
            data: {
                labels: [],
                datasets: [{
                    label: 'Pregunta (29)',
                    data: ".$dDatos29_1a.",
                    backgroundColor: [
	                    'rgba(255,0,0,1)',
	                    'rgba(255,192,0,1)',
	                    'rgba(255,255,0,1)',
	                    'rgba(107,245,110,1)',
	                    'rgba(155,229,247,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Pregunta (30)',
                    data: ".$dDatos30_1a.",
                    backgroundColor: [
                    	'rgba(155,229,247,1)',
						'rgba(107,245,110,1)',
						'rgba(255,255,0,1)',
						'rgba(255,192,0,1)',
						'rgba(255,0,0,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                }

               ]
            },
            options: {
	            tooltips: {
	                enabled: true,
	                mode: 'single',
	                callbacks: {
	                    label: function(tooltipItems, data) { 
	                        return data.datasets[tooltipItems.datasetIndex].label + ': ' + data.datasets[tooltipItems.datasetIndex].data[tooltipItems.index] + '%';
	                    }
	                }
	            },
	     	}
        });

        var ctx13 = document.getElementById('grafica10b".$varGraf."').getContext('2d');
        var mixedChart = new Chart(ctx13, {
            type: 'doughnut',
            data: {
                labels: [],
                datasets: [{
                    label: 'Pregunta (35)',
                    data: ".$dDatos35_1a.",
                    backgroundColor: [
	                    'rgba(155,229,247,1)',
						'rgba(107,245,110,1)',
						'rgba(255,255,0,1)',
						'rgba(255,192,0,1)',
						'rgba(255,0,0,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Pregunta (36)',
                    data: ".$dDatos36_1a.",
                    backgroundColor: [
                    	'rgba(155,229,247,1)',
						'rgba(107,245,110,1)',
						'rgba(255,255,0,1)',
						'rgba(255,192,0,1)',
						'rgba(255,0,0,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                }

               ]
            },
            options: {
	            tooltips: {
	                enabled: true,
	                mode: 'single',
	                callbacks: {
	                    label: function(tooltipItems, data) { 
	                        return data.datasets[tooltipItems.datasetIndex].label + ': ' + data.datasets[tooltipItems.datasetIndex].data[tooltipItems.index] + '%';
	                    }
	                }
	            },
	     	}
        });

        var ctx14 = document.getElementById('grafica01c".$varGraf."').getContext('2d');
        var mixedChart = new Chart(ctx14, {
            type: 'doughnut',
            data: {
                labels: [],
                datasets: [{
                    label: 'Pregunta (17)',
                    data: ".$dDatos17_1a.",
                    backgroundColor: [
                    	'rgba(255,0,0,1)',
                    	'rgba(255,192,0,1)',
                    	'rgba(255,255,0,1)',
                    	'rgba(107,245,110,1)',
	                    'rgba(155,229,247,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Pregunta (18)',
                    data: ".$dDatos18_1a.",
                    backgroundColor: [
                    	'rgba(255,0,0,1)',
                    	'rgba(255,192,0,1)',
                    	'rgba(255,255,0,1)',
                    	'rgba(107,245,110,1)',
	                    'rgba(155,229,247,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                }

               ]
            },
            options: {
	            tooltips: {
	                enabled: true,
	                mode: 'single',
	                callbacks: {
	                    label: function(tooltipItems, data) { 
	                        return data.datasets[tooltipItems.datasetIndex].label + ': ' + data.datasets[tooltipItems.datasetIndex].data[tooltipItems.index] + '%';
	                    }
	                }
	            },
	     	}
        });

        var ctx15 = document.getElementById('grafica02c".$varGraf."').getContext('2d');
        var mixedChart = new Chart(ctx15, {
            type: 'doughnut',
            data: {
                labels: [],
                datasets: [{
                    label: 'Pregunta (19)',
                    data: ".$dDatos19_1a.",
                    backgroundColor: [
                    	'rgba(255,0,0,1)',
                    	'rgba(255,192,0,1)',
                    	'rgba(255,255,0,1)',
                    	'rgba(107,245,110,1)',
	                    'rgba(155,229,247,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Pregunta (20)',
                    data: ".$dDatos20_1a.",
                    backgroundColor: [
                    	'rgba(255,0,0,1)',
                    	'rgba(255,192,0,1)',
                    	'rgba(255,255,0,1)',
                    	'rgba(107,245,110,1)',
	                    'rgba(155,229,247,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                }

               ]
            },
            options: {
	            tooltips: {
	                enabled: true,
	                mode: 'single',
	                callbacks: {
	                    label: function(tooltipItems, data) { 
	                        return data.datasets[tooltipItems.datasetIndex].label + ': ' + data.datasets[tooltipItems.datasetIndex].data[tooltipItems.index] + '%';
	                    }
	                }
	            },
	     	}
        });

        var ctx16 = document.getElementById('grafica03c".$varGraf."').getContext('2d');
        var mixedChart = new Chart(ctx16, {
            type: 'doughnut',
            data: {
                labels: [],
                datasets: [{
                    label: 'Pregunta (21)',
                    data: ".$dDatos21_1a.",
                    backgroundColor: [
                    	'rgba(255,0,0,1)',
                    	'rgba(255,192,0,1)',
                    	'rgba(255,255,0,1)',
                    	'rgba(107,245,110,1)',
	                    'rgba(155,229,247,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Pregunta (22)',
                    data: ".$dDatos22_1a.",
                    backgroundColor: [
                    	'rgba(255,0,0,1)',
                    	'rgba(255,192,0,1)',
                    	'rgba(255,255,0,1)',
                    	'rgba(107,245,110,1)',
	                    'rgba(155,229,247,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                }

               ]
            },
            options: {
	            tooltips: {
	                enabled: true,
	                mode: 'single',
	                callbacks: {
	                    label: function(tooltipItems, data) { 
	                        return data.datasets[tooltipItems.datasetIndex].label + ': ' + data.datasets[tooltipItems.datasetIndex].data[tooltipItems.index] + '%';
	                    }
	                }
	            },
	     	}
        });

        var ctx17 = document.getElementById('grafica01d".$varGraf."').getContext('2d');
        var mixedChart = new Chart(ctx17, {
            type: 'doughnut',
            data: {
                labels: [],
                datasets: [{
                    label: 'Pregunta (31)',
                    data: ".$dDatos31_1a.",
                    backgroundColor: [
                    	'rgba(155,229,247,1)',
                    	'rgba(107,245,110,1)',
                    	'rgba(255,255,0,1)',
                    	'rgba(255,192,0,1)',
                    	'rgba(255,0,0,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Pregunta (32)',
                    data: ".$dDatos32_1a.",
                    backgroundColor: [
                    	'rgba(155,229,247,1)',
                    	'rgba(107,245,110,1)',
                    	'rgba(255,255,0,1)',
                    	'rgba(255,192,0,1)',
                    	'rgba(255,0,0,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Pregunta (33)',
                    data: ".$dDatos33_1a.",
                    backgroundColor: [
                    	'rgba(155,229,247,1)',
                    	'rgba(107,245,110,1)',
                    	'rgba(255,255,0,1)',
                    	'rgba(255,192,0,1)',
                    	'rgba(255,0,0,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Pregunta (34)',
                    data: ".$dDatos34_1a.",
                    backgroundColor: [
                    	'rgba(155,229,247,1)',
                    	'rgba(107,245,110,1)',
                    	'rgba(255,255,0,1)',
                    	'rgba(255,192,0,1)',
                    	'rgba(255,0,0,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                }

               ]
            },
            options: {
	            tooltips: {
	                enabled: true,
	                mode: 'single',
	                callbacks: {
	                    label: function(tooltipItems, data) { 
	                        return data.datasets[tooltipItems.datasetIndex].label + ': ' + data.datasets[tooltipItems.datasetIndex].data[tooltipItems.index] + '%';
	                    }
	                }
	            },
	     	}
        });

        var ctx18 = document.getElementById('grafica02d".$varGraf."').getContext('2d');
        var mixedChart = new Chart(ctx18, {
            type: 'doughnut',
            data: {
                labels: [],
                datasets: [{
                    label: 'Pregunta (37)',
                    data: ".$dDatos37_1a.",
                    backgroundColor: [
                    	'rgba(155,229,247,1)',
                    	'rgba(107,245,110,1)',
                    	'rgba(255,255,0,1)',
                    	'rgba(255,192,0,1)',
                    	'rgba(255,0,0,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Pregunta (38)',
                    data: ".$dDatos38_1a.",
                    backgroundColor: [
                    	'rgba(155,229,247,1)',
                    	'rgba(107,245,110,1)',
                    	'rgba(255,255,0,1)',
                    	'rgba(255,192,0,1)',
                    	'rgba(255,0,0,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Pregunta (39)',
                    data: ".$dDatos39_1a.",
                    backgroundColor: [
                    	'rgba(155,229,247,1)',
                    	'rgba(107,245,110,1)',
                    	'rgba(255,255,0,1)',
                    	'rgba(255,192,0,1)',
                    	'rgba(255,0,0,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Pregunta (40)',
                    data: ".$dDatos40_1a.",
                    backgroundColor: [
                    	'rgba(155,229,247,1)',
                    	'rgba(107,245,110,1)',
                    	'rgba(255,255,0,1)',
                    	'rgba(255,192,0,1)',
                    	'rgba(255,0,0,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Pregunta (41)',
                    data: ".$dDatos41_1a.",
                    backgroundColor: [
                    	'rgba(155,229,247,1)',
                    	'rgba(107,245,110,1)',
                    	'rgba(255,255,0,1)',
                    	'rgba(255,192,0,1)',
                    	'rgba(255,0,0,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                }

               ]
            },
            options: {
	            tooltips: {
	                enabled: true,
	                mode: 'single',
	                callbacks: {
	                    label: function(tooltipItems, data) { 
	                        return data.datasets[tooltipItems.datasetIndex].label + ': ' + data.datasets[tooltipItems.datasetIndex].data[tooltipItems.index] + '%';
	                    }
	                }
	            },
	     	}
        });

        var ctx19 = document.getElementById('grafica03d".$varGraf."').getContext('2d');
        var mixedChart = new Chart(ctx19, {
            type: 'doughnut',
            data: {
                labels: [],
                datasets: [{
                    label: 'Pregunta (42)',
                    data: ".$dDatos42_1a.",
                    backgroundColor: [
                    	'rgba(155,229,247,1)',
                    	'rgba(107,245,110,1)',
                    	'rgba(255,255,0,1)',
                    	'rgba(255,192,0,1)',
                    	'rgba(255,0,0,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Pregunta (43)',
                    data: ".$dDatos43_1a.",
                    backgroundColor: [
                    	'rgba(155,229,247,1)',
                    	'rgba(107,245,110,1)',
                    	'rgba(255,255,0,1)',
                    	'rgba(255,192,0,1)',
                    	'rgba(255,0,0,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Pregunta (44)',
                    data: ".$dDatos44_1a.",
                    backgroundColor: [
                    	'rgba(155,229,247,1)',
                    	'rgba(107,245,110,1)',
                    	'rgba(255,255,0,1)',
                    	'rgba(255,192,0,1)',
                    	'rgba(255,0,0,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Pregunta (45)',
                    data: ".$dDatos45_1a.",
                    backgroundColor: [
                    	'rgba(155,229,247,1)',
                    	'rgba(107,245,110,1)',
                    	'rgba(255,255,0,1)',
                    	'rgba(255,192,0,1)',
                    	'rgba(255,0,0,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Pregunta (46)',
                    data: ".$dDatos46_1a.",
                    backgroundColor: [
                    	'rgba(155,229,247,1)',
                    	'rgba(107,245,110,1)',
                    	'rgba(255,255,0,1)',
                    	'rgba(255,192,0,1)',
                    	'rgba(255,0,0,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                }

               ]
            },
            options: {
	            tooltips: {
	                enabled: true,
	                mode: 'single',
	                callbacks: {
	                    label: function(tooltipItems, data) { 
	                        return data.datasets[tooltipItems.datasetIndex].label + ': ' + data.datasets[tooltipItems.datasetIndex].data[tooltipItems.index] + '%';
	                    }
	                }
	            },
	     	}
        });

        var ctx20 = document.getElementById('grafica04d".$varGraf."').getContext('2d');
        var mixedChart = new Chart(ctx20, {
            type: 'doughnut',
            data: {
                labels: [],
                datasets: [{
                    label: 'Pregunta (69)',
                    data: ".$dDatos69_1a.",
                    backgroundColor: [
						'rgba(255,0,0,1)',
						'rgba(255,192,0,1)',
						'rgba(255,255,0,1)',
						'rgba(107,245,110,1)',
                    	'rgba(155,229,247,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Pregunta (70)',
                    data: ".$dDatos70_1a.",
                    backgroundColor: [
                    	'rgba(255,0,0,1)',
						'rgba(255,192,0,1)',
						'rgba(255,255,0,1)',
						'rgba(107,245,110,1)',
                    	'rgba(155,229,247,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Pregunta (71)',
                    data: ".$dDatos71_1a.",
                    backgroundColor: [
                    	'rgba(255,0,0,1)',
						'rgba(255,192,0,1)',
						'rgba(255,255,0,1)',
						'rgba(107,245,110,1)',
                    	'rgba(155,229,247,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Pregunta (72)',
                    data: ".$dDatos72_1a.",
                    backgroundColor: [
                    	'rgba(255,0,0,1)',
						'rgba(255,192,0,1)',
						'rgba(255,255,0,1)',
						'rgba(107,245,110,1)',
                    	'rgba(155,229,247,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                }

               ]
            },
            options: {
	            tooltips: {
	                enabled: true,
	                mode: 'single',
	                callbacks: {
	                    label: function(tooltipItems, data) { 
	                        return data.datasets[tooltipItems.datasetIndex].label + ': ' + data.datasets[tooltipItems.datasetIndex].data[tooltipItems.index] + '%';
	                    }
	                }
	            },
	     	}
        });

        var ctx21 = document.getElementById('grafica05d".$varGraf."').getContext('2d');
        var mixedChart = new Chart(ctx21, {
            type: 'doughnut',
            data: {
                labels: [],
                datasets: [{
                    label: 'Pregunta (57)',
                    data: ".$dDatos57_1a.",
                    backgroundColor: [
	                    'rgba(155,229,247,1)',
	                    'rgba(107,245,110,1)',
	                    'rgba(255,255,0,1)',
	                    'rgba(255,192,0,1)',
	                    'rgba(255,0,0,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Pregunta (58)',
                    data: ".$dDatos58_1a.",
                    backgroundColor: [
                    	'rgba(255,0,0,1)',
						'rgba(255,192,0,1)',
						'rgba(255,255,0,1)',
						'rgba(107,245,110,1)',
                    	'rgba(155,229,247,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Pregunta (59)',
                    data: ".$dDatos59_1a.",
                    backgroundColor: [
                    	'rgba(255,0,0,1)',
						'rgba(255,192,0,1)',
						'rgba(255,255,0,1)',
						'rgba(107,245,110,1)',
                    	'rgba(155,229,247,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Pregunta (60)',
                    data: ".$dDatos60_1a.",
                    backgroundColor: [
                    	'rgba(255,0,0,1)',
						'rgba(255,192,0,1)',
						'rgba(255,255,0,1)',
						'rgba(107,245,110,1)',
                    	'rgba(155,229,247,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Pregunta (61)',
                    data: ".$dDatos61_1a.",
                    backgroundColor: [
                    	'rgba(255,0,0,1)',
						'rgba(255,192,0,1)',
						'rgba(255,255,0,1)',
						'rgba(107,245,110,1)',
                    	'rgba(155,229,247,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Pregunta (62)',
                    data: ".$dDatos62_1a.",
                    backgroundColor: [
                    	'rgba(255,0,0,1)',
						'rgba(255,192,0,1)',
						'rgba(255,255,0,1)',
						'rgba(107,245,110,1)',
                    	'rgba(155,229,247,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Pregunta (63)',
                    data: ".$dDatos63_1a.",
                    backgroundColor: [
                    	'rgba(255,0,0,1)',
						'rgba(255,192,0,1)',
						'rgba(255,255,0,1)',
						'rgba(107,245,110,1)',
                    	'rgba(155,229,247,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Pregunta (64)',
                    data: ".$dDatos64_1a.",
                    backgroundColor: [
                    	'rgba(255,0,0,1)',
						'rgba(255,192,0,1)',
						'rgba(255,255,0,1)',
						'rgba(107,245,110,1)',
                    	'rgba(155,229,247,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                }

               ]
            },
            options: {
	            tooltips: {
	                enabled: true,
	                mode: 'single',
	                callbacks: {
	                    label: function(tooltipItems, data) { 
	                        return data.datasets[tooltipItems.datasetIndex].label + ': ' + data.datasets[tooltipItems.datasetIndex].data[tooltipItems.index] + '%';
	                    }
	                }
	            },
	     	}
        });

        var ctx22 = document.getElementById('grafica01e".$varGraf."').getContext('2d');
        var mixedChart = new Chart(ctx22, {
            type: 'doughnut',
            data: {
                labels: [],
                datasets: [{
                    label: 'Pregunta (47)',
                    data: ".$dDatos47_1a.",
                    backgroundColor: [
						'rgba(155,229,247,1)',
	                    'rgba(107,245,110,1)',
	                    'rgba(255,255,0,1)',
	                    'rgba(255,192,0,1)',
	                    'rgba(255,0,0,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Pregunta (48)',
                    data: ".$dDatos48_1a.",
                    backgroundColor: [
                    	'rgba(155,229,247,1)',
	                    'rgba(107,245,110,1)',
	                    'rgba(255,255,0,1)',
	                    'rgba(255,192,0,1)',
	                    'rgba(255,0,0,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                }

               ]
            },
            options: {
	            tooltips: {
	                enabled: true,
	                mode: 'single',
	                callbacks: {
	                    label: function(tooltipItems, data) { 
	                        return data.datasets[tooltipItems.datasetIndex].label + ': ' + data.datasets[tooltipItems.datasetIndex].data[tooltipItems.index] + '%';
	                    }
	                }
	            },
	     	}
        });

        var ctx23 = document.getElementById('grafica02e".$varGraf."').getContext('2d');
        var mixedChart = new Chart(ctx23, {
            type: 'doughnut',
            data: {
                labels: [],
                datasets: [{
                    label: 'Pregunta (49)',
                    data: ".$dDatos49_1a.",
                    backgroundColor: [
						'rgba(155,229,247,1)',
	                    'rgba(107,245,110,1)',
	                    'rgba(255,255,0,1)',
	                    'rgba(255,192,0,1)',
	                    'rgba(255,0,0,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Pregunta (50)',
                    data: ".$dDatos50_1a.",
                    backgroundColor: [
                    	'rgba(155,229,247,1)',
	                    'rgba(107,245,110,1)',
	                    'rgba(255,255,0,1)',
	                    'rgba(255,192,0,1)',
	                    'rgba(255,0,0,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Pregunta (51)',
                    data: ".$dDatos51_1a.",
                    backgroundColor: [
                    	'rgba(155,229,247,1)',
	                    'rgba(107,245,110,1)',
	                    'rgba(255,255,0,1)',
	                    'rgba(255,192,0,1)',
	                    'rgba(255,0,0,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Pregunta (52)',
                    data: ".$dDatos52_1a.",
                    backgroundColor: [
                    	'rgba(155,229,247,1)',
	                    'rgba(107,245,110,1)',
	                    'rgba(255,255,0,1)',
	                    'rgba(255,192,0,1)',
	                    'rgba(255,0,0,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                }

               ]
            },
            options: {
	            tooltips: {
	                enabled: true,
	                mode: 'single',
	                callbacks: {
	                    label: function(tooltipItems, data) { 
	                        return data.datasets[tooltipItems.datasetIndex].label + ': ' + data.datasets[tooltipItems.datasetIndex].data[tooltipItems.index] + '%';
	                    }
	                }
	            },
	     	}
        });

        var ctx24 = document.getElementById('grafica03e".$varGraf."').getContext('2d');
        var mixedChart = new Chart(ctx24, {
            type: 'doughnut',
            data: {
                labels: [],
                datasets: [{
                    label: 'Pregunta (55)',
                    data: ".$dDatos55_1a.",
                    backgroundColor: [
						'rgba(155,229,247,1)',
	                    'rgba(107,245,110,1)',
	                    'rgba(255,255,0,1)',
	                    'rgba(255,192,0,1)',
	                    'rgba(255,0,0,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Pregunta (56)',
                    data: ".$dDatos56_1a.",
                    backgroundColor: [
                    	'rgba(155,229,247,1)',
	                    'rgba(107,245,110,1)',
	                    'rgba(255,255,0,1)',
	                    'rgba(255,192,0,1)',
	                    'rgba(255,0,0,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                }

               ]
            },
            options: {
	            tooltips: {
	                enabled: true,
	                mode: 'single',
	                callbacks: {
	                    label: function(tooltipItems, data) { 
	                        return data.datasets[tooltipItems.datasetIndex].label + ': ' + data.datasets[tooltipItems.datasetIndex].data[tooltipItems.index] + '%';
	                    }
	                }
	            },
	     	}
        });


        var ctx25 = document.getElementById('grafica04e".$varGraf."').getContext('2d');
        var mixedChart = new Chart(ctx25, {
            type: 'doughnut',
            data: {
                labels: [],
                datasets: [{
                    label: 'Pregunta (53)',
                    data: ".$dDatos53_1a.",
                    backgroundColor: [
						'rgba(155,229,247,1)',
	                    'rgba(107,245,110,1)',
	                    'rgba(255,255,0,1)',
	                    'rgba(255,192,0,1)',
	                    'rgba(255,0,0,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Pregunta (54)',
                    data: ".$dDatos54_1a.",
                    backgroundColor: [
	                    'rgba(255,0,0,1)',
	                    'rgba(255,192,0,1)',
	                    'rgba(255,255,0,1)',
	                    'rgba(107,245,110,1)',
                    	'rgba(155,229,247,1)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,1)'
                    ],
                    borderWidth: 2
                }

               ]
            },
            options: {
	            tooltips: {
	                enabled: true,
	                mode: 'single',
	                callbacks: {
	                    label: function(tooltipItems, data) { 
	                        return data.datasets[tooltipItems.datasetIndex].label + ': ' + data.datasets[tooltipItems.datasetIndex].data[tooltipItems.index] + '%';
	                    }
	                }
	            },
	     	}
        });

    </script>
	
";




	}



		$conPorPregunta -> close();


	 ?>

				</div>
			</div>
		</div>
	</div>
	

		

</body>
</html>