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
		.azul{
			background-color: #9be5f7;
			color: #FFF;
		}
		.verde{
			background-color: #6bf56e;
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
	<div class="marcoP">
		<div class="hoja">
			<div style="position: absolute; z-index: -1;">
				<div style="height: 950px;">
					




	<?php 


	$conPorPregunta = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

	$csCTrabajo= $conPorPregunta -> query("SELECT dirEmpresa_R3a FROM nom035R3a GROUP BY dirEmpresa_R3a ORDER BY dirEmpresa_R3a");

	

	while ($cTrabajo = $csCTrabajo->fetchArray()) {

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
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>

					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p1_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p1_R3a = '1'");
					while ($cR1= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR1['rCasiSiempre'];
					}

					if ($valMax1 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>

					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p1_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p1_R3a = '2'");
					while ($cR1= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR1['rAlgunasVeces'];
					}

					if ($valMax1 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>

					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p1_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p1_R3a = '3'");
					while ($cR1= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR1['rCasiNunca'];
					}

					if ($valMax1 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

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

					echo '<td class="'.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
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

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p2_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p2_R3a = '3'");
					while ($cR2= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR2['rCasiSiempre'];
					}

					if ($valMax2 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p2_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p2_R3a = '2'");
					while ($cR2= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR2['rAlgunasVeces'];
					}

					if ($valMax2 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p2_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p2_R3a = '1'");
					while ($cR2= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR2['rCasiNunca'];
					}

					if ($valMax2 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p2_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p2_R3a = '0'");
					while ($cR2= $csNunca->fetchArray()) {
						$rNunca=$cR2['rNunca'];
					}

					if ($valMax2 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					echo '<td class="'.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
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

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p3_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p3_R3a = '3'");
					while ($cR3= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR3['rCasiSiempre'];
					}

					if ($valMax3 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p3_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p3_R3a = '2'");
					while ($cR3= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR3['rAlgunasVeces'];
					}

					if ($valMax3 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p3_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p3_R3a = '1'");
					while ($cR3= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR3['rCasiNunca'];
					}

					if ($valMax3 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p3_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p3_R3a = '0'");
					while ($cR3= $csNunca->fetchArray()) {
						$rNunca=$cR3['rNunca'];
					}

					if ($valMax3 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					echo '<td class="'.$colorNunca.'">';

					echo $rNunca;
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
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p4_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p4_R3a = '1'");
					while ($cR4= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR4['rCasiSiempre'];
					}

					if ($valMax4 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p4_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p4_R3a = '2'");
					while ($cR4= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR4['rAlgunasVeces'];
					}

					if ($valMax4 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p4_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p4_R3a = '3'");
					while ($cR4= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR4['rCasiNunca'];
					}

					if ($valMax4 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

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

					echo '<td class="'.$colorNunca.'">';

					echo $rNunca;
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

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p5_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p5_R3a = '3'");
					while ($cR5= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR5['rCasiSiempre'];
					}

					if ($valMax5 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p5_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p5_R3a = '2'");
					while ($cR5= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR5['rAlgunasVeces'];
					}

					if ($valMax5 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p5_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p5_R3a = '1'");
					while ($cR5= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR5['rCasiNunca'];
					}

					if ($valMax5 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p5_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p5_R3a = '0'");
					while ($cR5= $csNunca->fetchArray()) {
						$rNunca=$cR5['rNunca'];
					}

					if ($valMax5 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					echo '<td class="'.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
			</table>

			



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

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>

					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p6_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p6_R3a = '3'");
					while ($cR6= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR6['rCasiSiempre'];
					}

					if ($valMax6 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>

					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p6_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p6_R3a = '2'");
					while ($cR6= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR6['rAlgunasVeces'];
					}

					if ($valMax6 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>

					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p6_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p6_R3a = '1'");
					while ($cR6= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR6['rCasiNunca'];
					}

					if ($valMax6 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>

					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p6_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p6_R3a = '0'");
					while ($cR6= $csNunca->fetchArray()) {
						$rNunca=$cR6['rNunca'];
					}

					if ($valMax6 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					echo '<td class="'.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
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

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p7_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p7_R3a = '3'");
					while ($cR7= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR7['rCasiSiempre'];
					}

					if ($valMax7 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p7_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p7_R3a = '2'");
					while ($cR7= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR7['rAlgunasVeces'];
					}

					if ($valMax7 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p7_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p7_R3a = '1'");
					while ($cR7= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR7['rCasiNunca'];
					}

					if ($valMax7 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p7_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p7_R3a = '0'");
					while ($cR7= $csNunca->fetchArray()) {
						$rNunca=$cR7['rNunca'];
					}

					if ($valMax7 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					echo '<td class="'.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
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

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p8_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p8_R3a = '3'");
					while ($cR8= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR8['rCasiSiempre'];
					}

					if ($valMax8 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p8_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p8_R3a = '2'");
					while ($cR8= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR8['rAlgunasVeces'];
					}

					if ($valMax8 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p8_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p8_R3a = '1'");
					while ($cR8= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR8['rCasiNunca'];
					}

					if ($valMax8 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p8_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p8_R3a = '0'");
					while ($cR8= $csNunca->fetchArray()) {
						$rNunca=$cR8['rNunca'];
					}

					if ($valMax8 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					echo '<td class="'.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
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

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p9_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p9_R3a = '3'");
					while ($cR9= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR9['rCasiSiempre'];
					}

					if ($valMax9 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p9_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p9_R3a = '2'");
					while ($cR9= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR9['rAlgunasVeces'];
					}

					if ($valMax9 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';
					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p9_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p9_R3a = '1'");
					while ($cR9= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR9['rCasiNunca'];
					}

					if ($valMax9 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p9_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p9_R3a = '0'");
					while ($cR9= $csNunca->fetchArray()) {
						$rNunca=$cR9['rNunca'];
					}

					if ($valMax9 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					echo '<td class="'.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
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

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p10_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p10_R3a = '3'");
					while ($cR10= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR10['rCasiSiempre'];
					}

					if ($valMax10 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p10_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p10_R3a = '2'");
					while ($cR10= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR10['rAlgunasVeces'];
					}

					if ($valMax10 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p10_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p10_R3a = '1'");
					while ($cR10= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR10['rCasiNunca'];
					}

					if ($valMax10 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p10_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p10_R3a = '0'");
					while ($cR10= $csNunca->fetchArray()) {
						$rNunca=$cR10['rNunca'];
					}

					if ($valMax10 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					echo '<td class="'.$colorNunca.'">';
					
					echo $rNunca;
					echo '
					</td>

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

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p11_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p11_R3a = '3'");
					while ($cR11= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR11['rCasiSiempre'];
					}

					if ($valMax11 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p11_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p11_R3a = '2'");
					while ($cR11= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR11['rAlgunasVeces'];
					}

					if ($valMax11 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p11_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p11_R3a = '1'");
					while ($cR11= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR11['rCasiNunca'];
					}

					if ($valMax11 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p11_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p11_R3a = '0'");
					while ($cR11= $csNunca->fetchArray()) {
						$rNunca=$cR11['rNunca'];
					}

					if ($valMax11 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					echo '<td class="'.$colorNunca.'">';
					
					echo $rNunca;
					echo '
					</td>

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

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p12_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p12_R3a = '3'");
					while ($cR12= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR12['rCasiSiempre'];
					}

					if ($valMax12 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p12_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p12_R3a = '2'");
					while ($cR12= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR12['rAlgunasVeces'];
					}

					if ($valMax12 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p12_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p12_R3a = '1'");
					while ($cR12= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR12['rCasiNunca'];
					}

					if ($valMax12 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p12_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p12_R3a = '0'");
					while ($cR12= $csNunca->fetchArray()) {
						$rNunca=$cR12['rNunca'];
					}

					if ($valMax12 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					echo '<td class="'.$colorNunca.'">';
					
					echo $rNunca;
					echo '
					</td>

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

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p13_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p13_R3a = '3'");
					while ($cR13= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR13['rCasiSiempre'];
					}

					if ($valMax13 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p13_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p13_R3a = '2'");
					while ($cR13= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR13['rAlgunasVeces'];
					}

					if ($valMax13 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p13_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p13_R3a = '1'");
					while ($cR13= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR13['rCasiNunca'];
					}

					if ($valMax13 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p13_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p13_R3a = '0'");
					while ($cR13= $csNunca->fetchArray()) {
						$rNunca=$cR13['rNunca'];
					}

					if ($valMax13 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					echo '<td class="'.$colorNunca.'">';
					
					echo $rNunca;
					echo '
					</td>

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

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p14_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p14_R3a = '3'");
					while ($cR14= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR14['rCasiSiempre'];
					}

					if ($valMax14 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p14_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p14_R3a = '2'");
					while ($cR14= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR14['rAlgunasVeces'];
					}

					if ($valMax14 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p14_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p14_R3a = '1'");
					while ($cR14= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR14['rCasiNunca'];
					}

					if ($valMax14 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p14_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p14_R3a = '0'");
					while ($cR14= $csNunca->fetchArray()) {
						$rNunca=$cR14['rNunca'];
					}

					if ($valMax14 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					echo '<td class="'.$colorNunca.'">';
					
					echo $rNunca;
					echo '
					</td>

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

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p15_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p15_R3a = '3'");
					while ($cR15= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR15['rCasiSiempre'];
					}

					if ($valMax15 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p15_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p15_R3a = '2'");
					while ($cR15= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR15['rAlgunasVeces'];
					}

					if ($valMax15 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p15_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p15_R3a = '1'");
					while ($cR15= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR15['rCasiNunca'];
					}

					if ($valMax15 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p15_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p15_R3a = '0'");
					while ($cR15= $csNunca->fetchArray()) {
						$rNunca=$cR15['rNunca'];
					}

					if ($valMax15 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					echo '<td class="'.$colorNunca.'">';
					
					echo $rNunca;
					echo '
					</td>

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

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p16_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p16_R3a = '3'");
					while ($cR16= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR16['rCasiSiempre'];
					}

					if ($valMax16 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p16_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p16_R3a = '2'");
					while ($cR16= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR16['rAlgunasVeces'];
					}

					if ($valMax16 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p16_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p16_R3a = '1'");
					while ($cR16= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR16['rCasiNunca'];
					}

					if ($valMax16 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p16_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p16_R3a = '0'");
					while ($cR16= $csNunca->fetchArray()) {
						$rNunca=$cR16['rNunca'];
					}

					if ($valMax16 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					echo '<td class="'.$colorNunca.'">';
					
					echo $rNunca;
					echo '
					</td>

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
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p23_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p23_R3a = '1'");
					while ($cR23= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR23['rCasiSiempre'];
					}

					if ($valMax23 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p23_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p23_R3a = '2'");
					while ($cR23= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR23['rAlgunasVeces'];
					}

					if ($valMax23 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p23_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p23_R3a = '3'");
					while ($cR23= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR23['rCasiNunca'];
					}

					if ($valMax23 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

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

					echo '<td class="'.$colorNunca.'">';
					
					echo $rNunca;
					echo '
					</td>

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
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p24_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p24_R3a = '1'");
					while ($cR24= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR24['rCasiSiempre'];
					}

					if ($valMax24 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p24_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p24_R3a = '2'");
					while ($cR24= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR24['rAlgunasVeces'];
					}

					if ($valMax24 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p24_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p24_R3a = '3'");
					while ($cR24= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR24['rCasiNunca'];
					}

					if ($valMax24 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

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

					echo '<td class="'.$colorNunca.'">';
					
					echo $rNunca;
					echo '
					</td>

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
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p25_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p25_R3a = '1'");
					while ($cR25= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR25['rCasiSiempre'];
					}

					if ($valMax25 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p25_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p25_R3a = '2'");
					while ($cR25= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR25['rAlgunasVeces'];
					}

					if ($valMax25 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p25_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p25_R3a = '3'");
					while ($cR25= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR25['rCasiNunca'];
					}

					if ($valMax25 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

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

					echo '<td class="'.$colorNunca.'">';
					
					echo $rNunca;
					echo '
					</td>

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
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p26_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p26_R3a = '1'");
					while ($cR26= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR26['rCasiSiempre'];
					}

					if ($valMax26 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p26_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p26_R3a = '2'");
					while ($cR26= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR26['rAlgunasVeces'];
					}

					if ($valMax26 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p26_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p26_R3a = '3'");
					while ($cR26= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR26['rCasiNunca'];
					}

					if ($valMax26 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

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

					echo '<td class="'.$colorNunca.'">';
					
					echo $rNunca;
					echo '
					</td>

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
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p27_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p27_R3a = '1'");
					while ($cR27= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR27['rCasiSiempre'];
					}

					if ($valMax27 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p27_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p27_R3a = '2'");
					while ($cR27= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR27['rAlgunasVeces'];
					}

					if ($valMax27 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p27_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p27_R3a = '3'");
					while ($cR27= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR27['rCasiNunca'];
					}

					if ($valMax27 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

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

					echo '<td class="'.$colorNunca.'">';
					
					echo $rNunca;
					echo '
					</td>

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
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p28_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p28_R3a = '1'");
					while ($cR28= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR28['rCasiSiempre'];
					}

					if ($valMax28 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p28_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p28_R3a = '2'");
					while ($cR28= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR28['rAlgunasVeces'];
					}

					if ($valMax28 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p28_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p28_R3a = '3'");
					while ($cR28= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR28['rCasiNunca'];
					}

					if ($valMax28 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

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

					echo '<td class="'.$colorNunca.'">';
					
					echo $rNunca;
					echo '
					</td>

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

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p29_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p29_R3a = '3'");
					while ($cR29= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR29['rCasiSiempre'];
					}

					if ($valMax29 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p29_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p29_R3a = '2'");
					while ($cR29= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR29['rAlgunasVeces'];
					}

					if ($valMax29 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p29_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p29_R3a = '1'");
					while ($cR29= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR29['rCasiNunca'];
					}

					if ($valMax29 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p29_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p29_R3a = '0'");
					while ($cR29= $csNunca->fetchArray()) {
						$rNunca=$cR29['rNunca'];
					}

					if ($valMax29 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					echo '<td class="'.$colorNunca.'">';
					
					echo $rNunca;
					echo '
					</td>
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
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p30_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p30_R3a = '1'");
					while ($cR30= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR30['rCasiSiempre'];
					}

					if ($valMax30 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p30_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p30_R3a = '2'");
					while ($cR30= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR30['rAlgunasVeces'];
					}

					if ($valMax30 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p30_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p30_R3a = '3'");
					while ($cR30= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR30['rCasiNunca'];
					}

					if ($valMax30 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

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

					echo '<td class="'.$colorNunca.'">';
					
					echo $rNunca;
					echo '
					</td>

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
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p35_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p35_R3a = '1'");
					while ($cR35= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR35['rCasiSiempre'];
					}

					if ($valMax35 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p35_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p35_R3a = '2'");
					while ($cR35= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR35['rAlgunasVeces'];
					}

					if ($valMax35 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p35_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p35_R3a = '3'");
					while ($cR35= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR35['rCasiNunca'];
					}

					if ($valMax35 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

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

					echo '<td class="'.$colorNunca.'">';
					
					echo $rNunca;
					echo '
					</td>

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
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p36_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p36_R3a = '1'");
					while ($cR36= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR36['rCasiSiempre'];
					}

					if ($valMax36 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p36_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p36_R3a = '2'");
					while ($cR36= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR36['rAlgunasVeces'];
					}

					if ($valMax36 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p36_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p36_R3a = '3'");
					while ($cR36= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR36['rCasiNunca'];
					}

					if ($valMax36 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

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

					echo '<td class="'.$colorNunca.'">';
					
					echo $rNunca;
					echo '
					</td>

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

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p65_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p65_R3a = '3'");
					while ($cR65= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR65['rCasiSiempre'];
					}

					if ($valMax65 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p65_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p65_R3a = '2'");
					while ($cR65= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR65['rAlgunasVeces'];
					}

					if ($valMax65 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p65_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p65_R3a = '1'");
					while ($cR65= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR65['rCasiNunca'];
					}

					if ($valMax65 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p65_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p65_R3a = '0'");
					while ($cR65= $csNunca->fetchArray()) {
						$rNunca=$cR65['rNunca'];
					}

					if ($valMax65 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					echo '<td class="'.$colorNunca.'">';
					
					echo $rNunca;
					echo '
					</td>

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

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p66_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p66_R3a = '3'");
					while ($cR66= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR66['rCasiSiempre'];
					}

					if ($valMax66 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p66_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p66_R3a = '2'");
					while ($cR66= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR66['rAlgunasVeces'];
					}

					if ($valMax66 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p66_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p66_R3a = '1'");
					while ($cR66= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR66['rCasiNunca'];
					}

					if ($valMax6 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p66_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p66_R3a = '0'");
					while ($cR66= $csNunca->fetchArray()) {
						$rNunca=$cR66['rNunca'];
					}

					if ($valMax66 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					echo '<td class="'.$colorNunca.'">';
					
					echo $rNunca;
					echo '
					</td>

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

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p67_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p67_R3a = '3'");
					while ($cR67= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR67['rCasiSiempre'];
					}

					if ($valMax67 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p67_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p67_R3a = '2'");
					while ($cR67= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR67['rAlgunasVeces'];
					}

					if ($valMax67 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p67_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p67_R3a = '1'");
					while ($cR67= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR67['rCasiNunca'];
					}

					if ($valMax67 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p67_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p67_R3a = '0'");
					while ($cR67= $csNunca->fetchArray()) {
						$rNunca=$cR67['rNunca'];
					}

					if ($valMax67 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					echo '<td class="'.$colorNunca.'">';
					
					echo $rNunca;
					echo '
					</td>

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

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p68_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p68_R3a = '3'");
					while ($cR68= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR68['rCasiSiempre'];
					}

					if ($valMax68 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p68_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p68_R3a = '2'");
					while ($cR68= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR68['rAlgunasVeces'];
					}

					if ($valMax68 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p68_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p68_R3a = '1'");
					while ($cR68= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR68['rCasiNunca'];
					}

					if ($valMax68 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p68_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p68_R3a = '0'");
					while ($cR68= $csNunca->fetchArray()) {
						$rNunca=$cR68['rNunca'];
					}

					if ($valMax68 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					echo '<td class="'.$colorNunca.'">';
					
					echo $rNunca;
					echo '
					</td>

					
				</tr>
			</table>

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

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>

					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p17_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p17_R3a = '3'");
					while ($cR17= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR17['rCasiSiempre'];
					}

					if ($valMax17 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>

					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p17_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p17_R3a = '2'");
					while ($cR17= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR17['rAlgunasVeces'];
					}

					if ($valMax17 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>

					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p17_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p17_R3a = '1'");
					while ($cR17= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR17['rCasiNunca'];
					}

					if ($valMax17 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>

					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p17_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p17_R3a = '0'");
					while ($cR17= $csNunca->fetchArray()) {
						$rNunca=$cR17['rNunca'];
					}

					if ($valMax17 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					echo '<td class="'.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
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

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p18_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p18_R3a = '3'");
					while ($cR18= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR18['rCasiSiempre'];
					}

					if ($valMax18 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p18_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p18_R3a = '2'");
					while ($cR18= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR18['rAlgunasVeces'];
					}

					if ($valMax18 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p18_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p18_R3a = '1'");
					while ($cR18= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR18['rCasiNunca'];
					}

					if ($valMax18 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p18_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p18_R3a = '0'");
					while ($cR18= $csNunca->fetchArray()) {
						$rNunca=$cR18['rNunca'];
					}

					if ($valMax18 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					echo '<td class="'.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
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

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p19_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p19_R3a = '3'");
					while ($cR19= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR19['rCasiSiempre'];
					}

					if ($valMax19 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p19_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p19_R3a = '2'");
					while ($cR19= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR19['rAlgunasVeces'];
					}

					if ($valMax19 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p19_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p19_R3a = '1'");
					while ($cR19= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR19['rCasiNunca'];
					}

					if ($valMax19 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p19_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p19_R3a = '0'");
					while ($cR19= $csNunca->fetchArray()) {
						$rNunca=$cR19['rNunca'];
					}

					if ($valMax19 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					echo '<td class="'.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
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

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p20_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p20_R3a = '3'");
					while ($cR20= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR20['rCasiSiempre'];
					}

					if ($valMax20 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p20_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p20_R3a = '2'");
					while ($cR20= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR20['rAlgunasVeces'];
					}

					if ($valMax20 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p20_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p20_R3a = '1'");
					while ($cR20= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR20['rCasiNunca'];
					}

					if ($valMax20 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p20_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p20_R3a = '0'");
					while ($cR20= $csNunca->fetchArray()) {
						$rNunca=$cR20['rNunca'];
					}

					if ($valMax20 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					echo '<td class="'.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
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

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p21_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p21_R3a = '3'");
					while ($cR21= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR21['rCasiSiempre'];
					}

					if ($valMax21 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p21_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p21_R3a = '2'");
					while ($cR21= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR21['rAlgunasVeces'];
					}

					if ($valMax21 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p21_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p21_R3a = '1'");
					while ($cR21= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR21['rCasiNunca'];
					}

					if ($valMax21 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p21_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p21_R3a = '0'");
					while ($cR21= $csNunca->fetchArray()) {
						$rNunca=$cR21['rNunca'];
					}

					if ($valMax21 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					echo '<td class="'.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>

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

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p22_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p22_R3a = '3'");
					while ($cR22= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR22['rCasiSiempre'];
					}

					if ($valMax22 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p22_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p22_R3a = '2'");
					while ($cR22= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR22['rAlgunasVeces'];
					}

					if ($valMax22 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p22_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p22_R3a = '1'");
					while ($cR22= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR22['rCasiNunca'];
					}

					if ($valMax22 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p22_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p22_R3a = '0'");
					while ($cR22= $csNunca->fetchArray()) {
						$rNunca=$cR22['rNunca'];
					}

					if ($valMax22 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					echo '<td class="'.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
			</table>

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
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>

					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p31_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p31_R3a = '1'");
					while ($cR31= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR31['rCasiSiempre'];
					}

					if ($valMax31 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>

					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p31_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p31_R3a = '2'");
					while ($cR31= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR31['rAlgunasVeces'];
					}

					if ($valMax31 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>

					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p31_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p31_R3a = '3'");
					while ($cR31= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR31['rCasiNunca'];
					}

					if ($valMax31 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

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

					echo '<td class="'.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
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
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p32_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p32_R3a = '1'");
					while ($cR32= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR32['rCasiSiempre'];
					}

					if ($valMax32 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p32_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p32_R3a = '2'");
					while ($cR32= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR32['rAlgunasVeces'];
					}

					if ($valMax32 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p32_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p32_R3a = '3'");
					while ($cR32= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR32['rCasiNunca'];
					}

					if ($valMax32 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

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

					echo '<td class="'.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
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
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p33_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p33_R3a = '1'");
					while ($cR33= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR33['rCasiSiempre'];
					}

					if ($valMax33 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p33_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p33_R3a = '2'");
					while ($cR33= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR33['rAlgunasVeces'];
					}

					if ($valMax33 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p33_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p33_R3a = '3'");
					while ($cR33= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR33['rCasiNunca'];
					}

					if ($valMax33 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

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

					echo '<td class="'.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
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
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p34_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p34_R3a = '1'");
					while ($cR34= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR34['rCasiSiempre'];
					}

					if ($valMax34 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p34_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p34_R3a = '2'");
					while ($cR34= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR34['rAlgunasVeces'];
					}

					if ($valMax34 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';
					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p34_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p34_R3a = '3'");
					while ($cR34= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR34['rCasiNunca'];
					}

					if ($valMax34 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

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

					echo '<td class="'.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
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
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p37_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p37_R3a = '1'");
					while ($cR37= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR37['rCasiSiempre'];
					}

					if ($valMax37 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p37_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p37_R3a = '2'");
					while ($cR37= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR37['rAlgunasVeces'];
					}

					if ($valMax37 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p37_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p37_R3a = '3'");
					while ($cR37= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR37['rCasiNunca'];
					}

					if ($valMax37 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

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

					echo '<td class="'.$colorNunca.'">';
					
					echo $rNunca;
					echo '
					</td>

					<tr>
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
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p38_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p38_R3a = '1'");
					while ($cR38= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR38['rCasiSiempre'];
					}

					if ($valMax38 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p38_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p38_R3a = '2'");
					while ($cR38= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR38['rAlgunasVeces'];
					}

					if ($valMax38 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p38_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p38_R3a = '3'");
					while ($cR38= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR38['rCasiNunca'];
					}

					if ($valMax38 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

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

					echo '<td class="'.$colorNunca.'">';
					
					echo $rNunca;
					echo '
					</td>

					<tr>
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
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p39_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p39_R3a = '1'");
					while ($cR39= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR39['rCasiSiempre'];
					}

					if ($valMax39 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p39_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p39_R3a = '2'");
					while ($cR39= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR39['rAlgunasVeces'];
					}

					if ($valMax39 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p39_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p39_R3a = '3'");
					while ($cR39= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR39['rCasiNunca'];
					}

					if ($valMax39 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

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

					echo '<td class="'.$colorNunca.'">';
					
					echo $rNunca;
					echo '
					</td>

					<tr>
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
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p40_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p40_R3a = '1'");
					while ($cR40= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR40['rCasiSiempre'];
					}

					if ($valMax40 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p40_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p40_R3a = '2'");
					while ($cR40= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR40['rAlgunasVeces'];
					}

					if ($valMax40 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p40_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p40_R3a = '3'");
					while ($cR40= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR40['rCasiNunca'];
					}

					if ($valMax40 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

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

					echo '<td class="'.$colorNunca.'">';
					
					echo $rNunca;
					echo '
					</td>

					<tr>
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
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p41_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p41_R3a = '1'");
					while ($cR41= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR41['rCasiSiempre'];
					}

					if ($valMax41 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p41_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p41_R3a = '2'");
					while ($cR41= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR41['rAlgunasVeces'];
					}

					if ($valMax41 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p41_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p41_R3a = '3'");
					while ($cR41= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR41['rCasiNunca'];
					}

					if ($valMax41 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

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

					echo '<td class="'.$colorNunca.'">';
					
					echo $rNunca;
					echo '
					</td>

					<tr>
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
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p42_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p42_R3a = '1'");
					while ($cR42= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR42['rCasiSiempre'];
					}

					if ($valMax42 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p42_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p42_R3a = '2'");
					while ($cR42= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR42['rAlgunasVeces'];
					}

					if ($valMax42 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p42_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p42_R3a = '3'");
					while ($cR42= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR42['rCasiNunca'];
					}

					if ($valMax42 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

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

					echo '<td class="'.$colorNunca.'">';
					
					echo $rNunca;
					echo '
					</td>

					<tr>
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
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p43_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p43_R3a = '1'");
					while ($cR43= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR43['rCasiSiempre'];
					}

					if ($valMax43 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p43_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p43_R3a = '2'");
					while ($cR43= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR43['rAlgunasVeces'];
					}

					if ($valMax43 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p43_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p43_R3a = '3'");
					while ($cR43= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR43['rCasiNunca'];
					}

					if ($valMax43 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

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

					echo '<td class="'.$colorNunca.'">';
					
					echo $rNunca;
					echo '
					</td>

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
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p44_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p44_R3a = '1'");
					while ($cR44= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR44['rCasiSiempre'];
					}

					if ($valMax44 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p44_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p44_R3a = '2'");
					while ($cR44= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR44['rAlgunasVeces'];
					}

					if ($valMax44 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p44_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p44_R3a = '3'");
					while ($cR44= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR44['rCasiNunca'];
					}

					if ($valMax44 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

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

					echo '<td class="'.$colorNunca.'">';
					
					echo $rNunca;
					echo '
					</td>

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
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p45_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p45_R3a = '1'");
					while ($cR45= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR45['rCasiSiempre'];
					}

					if ($valMax45 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p45_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p45_R3a = '2'");
					while ($cR45= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR45['rAlgunasVeces'];
					}

					if ($valMax45 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p45_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p45_R3a = '3'");
					while ($cR45= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR45['rCasiNunca'];
					}

					if ($valMax45 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

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

					echo '<td class="'.$colorNunca.'">';
					
					echo $rNunca;
					echo '
					</td>

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
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p46_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p46_R3a = '1'");
					while ($cR46= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR46['rCasiSiempre'];
					}

					if ($valMax46 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p46_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p46_R3a = '2'");
					while ($cR46= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR46['rAlgunasVeces'];
					}

					if ($valMax46 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p46_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p46_R3a = '3'");
					while ($cR46= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR46['rCasiNunca'];
					}

					if ($valMax46 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

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

					echo '<td class="'.$colorNunca.'">';
					
					echo $rNunca;
					echo '
					</td>

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
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p57_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p57_R3a = '1'");
					while ($cR57= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR57['rCasiSiempre'];
					}

					if ($valMax57 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p57_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p57_R3a = '2'");
					while ($cR57= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR57['rAlgunasVeces'];
					}

					if ($valMax57 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p57_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p57_R3a = '3'");
					while ($cR57= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR57['rCasiNunca'];
					}

					if ($valMax57 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

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

					echo '<td class="'.$colorNunca.'">';
					
					echo $rNunca;
					echo '
					</td>

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

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p58_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p58_R3a = '3'");
					while ($cR58= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR58['rCasiSiempre'];
					}

					if ($valMax58 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p58_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p58_R3a = '2'");
					while ($cR58= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR58['rAlgunasVeces'];
					}

					if ($valMax58 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p58_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p58_R3a = '1'");
					while ($cR58= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR58['rCasiNunca'];
					}

					if ($valMax58 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p58_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p58_R3a = '0'");
					while ($cR58= $csNunca->fetchArray()) {
						$rNunca=$cR58['rNunca'];
					}

					if ($valMax58 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					echo '<td class="'.$colorNunca.'">';
					
					echo $rNunca;
					echo '
					</td>

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

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p59_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p59_R3a = '3'");
					while ($cR59= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR59['rCasiSiempre'];
					}

					if ($valMax59 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p59_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p59_R3a = '2'");
					while ($cR59= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR59['rAlgunasVeces'];
					}

					if ($valMax59 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p59_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p59_R3a = '1'");
					while ($cR59= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR59['rCasiNunca'];
					}

					if ($valMax59 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p59_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p59_R3a = '0'");
					while ($cR59= $csNunca->fetchArray()) {
						$rNunca=$cR59['rNunca'];
					}

					if ($valMax59 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					echo '<td class="'.$colorNunca.'">';
					
					echo $rNunca;
					echo '
					</td>

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

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p60_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p60_R3a = '3'");
					while ($cR60= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR60['rCasiSiempre'];
					}

					if ($valMax60 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p60_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p60_R3a = '2'");
					while ($cR60= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR60['rAlgunasVeces'];
					}

					if ($valMax60 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p60_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p60_R3a = '1'");
					while ($cR60= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR60['rCasiNunca'];
					}

					if ($valMax60 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p60_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p60_R3a = '0'");
					while ($cR60= $csNunca->fetchArray()) {
						$rNunca=$cR60['rNunca'];
					}

					if ($valMax5 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					echo '<td class="'.$colorNunca.'">';
					
					echo $rNunca;
					echo '
					</td>
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

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p61_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p61_R3a = '3'");
					while ($cR61= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR61['rCasiSiempre'];
					}

					if ($valMax61 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p61_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p61_R3a = '2'");
					while ($cR61= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR61['rAlgunasVeces'];
					}

					if ($valMax61 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p61_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p61_R3a = '1'");
					while ($cR61= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR61['rCasiNunca'];
					}

					if ($valMax61 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p61_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p61_R3a = '0'");
					while ($cR61= $csNunca->fetchArray()) {
						$rNunca=$cR61['rNunca'];
					}

					if ($valMax61 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					echo '<td class="'.$colorNunca.'">';
					
					echo $rNunca;
					echo '
					</td>

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

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p62_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p62_R3a = '3'");
					while ($cR62= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR62['rCasiSiempre'];
					}

					if ($valMax62 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p62_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p62_R3a = '2'");
					while ($cR62= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR62['rAlgunasVeces'];
					}

					if ($valMax62 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p62_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p62_R3a = '1'");
					while ($cR62= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR62['rCasiNunca'];
					}

					if ($valMax62 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p62_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p62_R3a = '0'");
					while ($cR62= $csNunca->fetchArray()) {
						$rNunca=$cR62['rNunca'];
					}

					if ($valMax62 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					echo '<td class="'.$colorNunca.'">';
					
					echo $rNunca;
					echo '
					</td>

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

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p63_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p63_R3a = '3'");
					while ($cR63= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR63['rCasiSiempre'];
					}

					if ($valMax63 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p63_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p63_R3a = '2'");
					while ($cR63= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR63['rAlgunasVeces'];
					}

					if ($valMax63 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p63_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p63_R3a = '1'");
					while ($cR63= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR63['rCasiNunca'];
					}

					if ($valMax63 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p63_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p63_R3a = '0'");
					while ($cR63= $csNunca->fetchArray()) {
						$rNunca=$cR63['rNunca'];
					}

					if ($valMax63 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					echo '<td class="'.$colorNunca.'">';
					
					echo $rNunca;
					echo '
					</td>

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

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p64_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p64_R3a = '3'");
					while ($cR64= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR64['rCasiSiempre'];
					}

					if ($valMax64 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p64_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p64_R3a = '2'");
					while ($cR64= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR64['rAlgunasVeces'];
					}

					if ($valMax64 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p64_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p64_R3a = '1'");
					while ($cR64= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR64['rCasiNunca'];
					}

					if ($valMax64 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p64_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p64_R3a = '0'");
					while ($cR64= $csNunca->fetchArray()) {
						$rNunca=$cR64['rNunca'];
					}

					if ($valMax64 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					echo '<td class="'.$colorNunca.'">';
					
					echo $rNunca;
					echo '
					</td>

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

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p69_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p69_R3a = '3'");
					while ($cR69= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR69['rCasiSiempre'];
					}

					if ($valMax69 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p69_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p69_R3a = '2'");
					while ($cR69= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR69['rAlgunasVeces'];
					}

					if ($valMax69 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p69_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p69_R3a = '1'");
					while ($cR69= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR69['rCasiNunca'];
					}

					if ($valMax69 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p69_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p69_R3a = '0'");
					while ($cR69= $csNunca->fetchArray()) {
						$rNunca=$cR69['rNunca'];
					}

					if ($valMax69 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					echo '<td class="'.$colorNunca.'">';
					
					echo $rNunca;
					echo '
					</td>

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

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p70_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p70_R3a = '3'");
					while ($cR70= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR70['rCasiSiempre'];
					}

					if ($valMax70 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p70_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p70_R3a = '2'");
					while ($cR70= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR70['rAlgunasVeces'];
					}

					if ($valMax70 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p70_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p70_R3a = '1'");
					while ($cR70= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR70['rCasiNunca'];
					}

					if ($valMax70 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p70_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p70_R3a = '0'");
					while ($cR70= $csNunca->fetchArray()) {
						$rNunca=$cR70['rNunca'];
					}

					if ($valMax70 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					echo '<td class="'.$colorNunca.'">';
					
					echo $rNunca;
					echo '
					</td>

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

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p71_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p71_R3a = '3'");
					while ($cR71= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR71['rCasiSiempre'];
					}

					if ($valMax71 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p71_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p71_R3a = '2'");
					while ($cR71= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR71['rAlgunasVeces'];
					}

					if ($valMax71 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p71_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p71_R3a = '1'");
					while ($cR71= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR71['rCasiNunca'];
					}

					if ($valMax71 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p71_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p71_R3a = '0'");
					while ($cR5= $csNunca->fetchArray()) {
						$rNunca=$cR5['rNunca'];
					}

					if ($valMax71 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					echo '<td class="'.$colorNunca.'">';
					
					echo $rNunca;
					echo '
					</td>

					
				</tr>
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

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p72_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p72_R3a = '3'");
					while ($cR72= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR72['rCasiSiempre'];
					}

					if ($valMax72 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p72_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p72_R3a = '2'");
					while ($cR72= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR72['rAlgunasVeces'];
					}

					if ($valMax72 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p72_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p72_R3a = '1'");
					while ($cR72= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR72['rCasiNunca'];
					}

					if ($valMax72 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p72_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p72_R3a = '0'");
					while ($cR72= $csNunca->fetchArray()) {
						$rNunca=$cR72['rNunca'];
					}

					if ($valMax72 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					echo '<td class="'.$colorNunca.'">';
					
					echo $rNunca;
					echo '
					</td>

					
				</tr>
			</table>


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
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>

					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p47_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p47_R3a = '1'");
					while ($cR47= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR47['rCasiSiempre'];
					}

					if ($valMax47 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>

					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p47_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p47_R3a = '2'");
					while ($cR47= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR47['rAlgunasVeces'];
					}

					if ($valMax47 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>

					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p47_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p47_R3a = '3'");
					while ($cR47= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR47['rCasiNunca'];
					}

					if ($valMax47 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

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

					echo '<td class="'.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
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
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p48_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p48_R3a = '1'");
					while ($cR48= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR48['rCasiSiempre'];
					}

					if ($valMax48 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p48_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p48_R3a = '2'");
					while ($cR48= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR48['rAlgunasVeces'];
					}

					if ($valMax48 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p48_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p48_R3a = '3'");
					while ($cR48= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR48['rCasiNunca'];
					}

					if ($valMax48 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

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

					echo '<td class="'.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
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
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p49_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p49_R3a = '1'");
					while ($cR49= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR49['rCasiSiempre'];
					}

					if ($valMax49 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p49_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p49_R3a = '2'");
					while ($cR49= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR49['rAlgunasVeces'];
					}

					if ($valMax49 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p49_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p49_R3a = '3'");
					while ($cR49= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR49['rCasiNunca'];
					}

					if ($valMax49 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

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

					echo '<td class="'.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
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
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p50_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p50_R3a = '1'");
					while ($cR50= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR50['rCasiSiempre'];
					}

					if ($valMax50 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>

					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p50_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p50_R3a = '2'");
					while ($cR50= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR50['rAlgunasVeces'];
					}

					if ($valMax50 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p50_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p50_R3a = '3'");
					while ($cR50= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR50['rCasiNunca'];
					}

					if ($valMax50 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

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

					echo '<td class="'.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
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
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p51_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p51_R3a = '1'");
					while ($cR51= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR51['rCasiSiempre'];
					}

					if ($valMax51 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p51_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p51_R3a = '2'");
					while ($cR51= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR51['rAlgunasVeces'];
					}

					if ($valMax51 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p51_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p51_R3a = '3'");
					while ($cR51= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR51['rCasiNunca'];
					}

					if ($valMax51 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

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

					echo '<td class="'.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
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
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p52_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p52_R3a = '1'");
					while ($cR52= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR52['rCasiSiempre'];
					}

					if ($valMax52 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p52_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p52_R3a = '2'");
					while ($cR52= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR52['rAlgunasVeces'];
					}

					if ($valMax52 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

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

					echo '<td class="'.$colorCasiNunca.'">';

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

					echo '<td class="'.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
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
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p53_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p53_R3a = '1'");
					while ($cR53= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR53['rCasiSiempre'];
					}

					if ($valMax53 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p53_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p53_R3a = '2'");
					while ($cR53= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR53['rAlgunasVeces'];
					}

					if ($valMax53 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p53_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p53_R3a = '3'");
					while ($cR53= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR53['rCasiNunca'];
					}

					if ($valMax53 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

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

					echo '<td class="'.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
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

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p54_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p54_R3a = '3'");
					while ($cR54= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR54['rCasiSiempre'];
					}

					if ($valMax54 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p54_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p54_R3a = '2'");
					while ($cR54= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR54['rAlgunasVeces'];
					}

					if ($valMax54 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p54_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p54_R3a = '1'");
					while ($cR54= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR54['rCasiNunca'];
					}

					if ($valMax54 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

					echo $rCasiNunca;
					echo '
					</td>
					';
					$csNunca= $conPorPregunta -> query("SELECT COUNT(p54_R3a) AS rNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p54_R3a = '0'");
					while ($cR54= $csNunca->fetchArray()) {
						$rNunca=$cR54['rNunca'];
					}

					if ($valMax54 === $rNunca) {
						$colorNunca = 'rojo';
					}else{
						$colorNunca = '';
					}

					echo '<td class="'.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
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
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p55_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p55_R3a = '1'");
					while ($cR55= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR55['rCasiSiempre'];
					}

					if ($valMax55 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p55_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p55_R3a = '2'");
					while ($cR55= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR55['rAlgunasVeces'];
					}

					if ($valMax55 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p55_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p55_R3a = '3'");
					while ($cR55= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR55['rCasiNunca'];
					}

					if ($valMax55 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

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

					echo '<td class="'.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
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
						$colorSiempre = 'rojo';
					}else{
						$colorSiempre = '';
					}

					echo '<td class="'.$colorSiempre.'">';

					echo $rSiempre;
					echo '
					</td>
					';
					$csCasiSiempre= $conPorPregunta -> query("SELECT COUNT(p56_R3a) AS rCasiSiempre FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p56_R3a = '1'");
					while ($cR56= $csCasiSiempre->fetchArray()) {
						$rCasiSiempre=$cR56['rCasiSiempre'];
					}

					if ($valMax56 === $rCasiSiempre) {
						$colorCasiSiempre = 'rojo';
					}else{
						$colorCasiSiempre = '';
					}

					echo '<td class="'.$colorCasiSiempre.'">';

					echo $rCasiSiempre;
					echo '
					</td>
					';
					$csAlgunasVeces= $conPorPregunta -> query("SELECT COUNT(p56_R3a) AS rAlgunasVeces FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p56_R3a = '2'");
					while ($cR56= $csAlgunasVeces->fetchArray()) {
						$rAlgunasVeces=$cR56['rAlgunasVeces'];
					}

					if ($valMax56 === $rAlgunasVeces) {
						$colorAlgunasVeces = 'rojo';
					}else{
						$colorAlgunasVeces = '';
					}

					echo '<td class="'.$colorAlgunasVeces.'">';

					echo $rAlgunasVeces;
					echo '
					</td>
					';
					$csCasiNunca= $conPorPregunta -> query("SELECT COUNT(p56_R3a) AS rCasiNunca FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa_R3a' AND p56_R3a = '3'");
					while ($cR56= $csCasiNunca->fetchArray()) {
						$rCasiNunca=$cR56['rCasiNunca'];
					}

					if ($valMax56 === $rCasiNunca) {
						$colorCasiNunca = 'rojo';
					}else{
						$colorCasiNunca = '';
					}

					echo '<td class="'.$colorCasiNunca.'">';

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

					echo '<td class="'.$colorNunca.'">';

					echo $rNunca;
					echo '
					</td>
				</tr>
			</table>



		';

	}



		$conPorPregunta -> close();

	 ?>

				</div>
			</div>
		</div>
	</div>

</body>
</html>