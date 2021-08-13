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
	<div class="marcoP">
		<div class="hoja">
			<div style="position: absolute; z-index: -1;">
				<div style="height: 950px;">


				<table style="font-size: .8em;">
					<tr>
						<td>Unidad</td>
						<td>Nombre</td>
						<td style="font-size: .8em;">Calificación del cuestionario</td>
						<td style="font-size: .8em;">Ambiente de trabajo</td>
						<td style="font-size: .8em;">Factores propios de la actividad</td>
						<td style="font-size: .8em;">Organización del tiempo de trabajo</td>
						<td style="font-size: .8em;">Liderazgo y relaciones en el trabajo</td>
						<td style="font-size: .8em;">Entorno organizacional</td>
						<td style="font-size: .8em;"></td>
						<td style="font-size: .8em;">Condiciones en el ambiente de trabajo</td>
						<td style="font-size: .8em;">Carga de trabajo</td>
						<td style="font-size: .8em;">Falta de control sobre el trabajo</td>
						<td style="font-size: .8em;">Jornada de trabajo</td>
						<td style="font-size: .8em;">Interferencia en la relación trabajo-familia</td>
						<td style="font-size: .8em;">Liderazgo</td>
						<td style="font-size: .8em;">Relaciones en el trabajo</td>
						<td style="font-size: .8em;">Violencia</td>
						<td style="font-size: .8em;">Reconocimiento del desempeño</td>
						<td style="font-size: .8em;">Insuficiente sentido de pertenencia e inestabilidad</td>
					</tr>
					




	<?php 


	$conPorCentro = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

	$csCentro = $conPorCentro -> query("SELECT dirEmpresa_R3a,usrNombre_R3a FROM nom035R3a GROUP BY dirEmpresa_R3a,usrNombre_R3a ORDER BY dirEmpresa_R3a,usrNombre_R3a");

	

	while ($CCentros = $csCentro->fetchArray()) {

		$dirEmpresa=$CCentros['dirEmpresa_R3a'];
		$usrNombre=$CCentros['usrNombre_R3a'];



				$csMasDatos = $conPorCentro -> query("SELECT dirEmpresa_R3a,usrNombre_R3a, SUM(p1_R3a+p2_R3a+p3_R3a+p4_R3a+p5_R3a+p6_R3a+p7_R3a+p8_R3a+p9_R3a+p10_R3a+p11_R3a+p12_R3a+p13_R3a+p14_R3a+p15_R3a+p16_R3a+p17_R3a+p18_R3a+p19_R3a+p20_R3a+p21_R3a+p22_R3a+p23_R3a+p24_R3a+p25_R3a+p26_R3a+p27_R3a+p28_R3a+p29_R3a+p30_R3a+p31_R3a+p32_R3a+p33_R3a+p34_R3a+p35_R3a+p36_R3a+p37_R3a+p38_R3a+p39_R3a+p40_R3a+p41_R3a+p42_R3a+p43_R3a+p44_R3a+p45_R3a+p46_R3a+p47_R3a+p48_R3a+p49_R3a+p50_R3a+p51_R3a+p52_R3a+p53_R3a+p54_R3a+p55_R3a+p56_R3a+p57_R3a+p58_R3a+p59_R3a+p60_R3a+p61_R3a+p62_R3a+p63_R3a+p64_R3a+p65_R3a+p66_R3a+p67_R3a+p68_R3a+p69_R3a+p70_R3a+p71_R3a+p72_R3a) AS cuantos, SUM(p1_R3a+p2_R3a+p3_R3a+p4_R3a+p5_R3a) AS ambDeTrabajo, SUM(p6_R3a+p7_R3a+p8_R3a+p9_R3a+p10_R3a+p11_R3a+p12_R3a+p13_R3a+p14_R3a+p15_R3a+p16_R3a+p23_R3a+p24_R3a+p25_R3a+p26_R3a+p27_R3a+p28_R3a+p29_R3a+p30_R3a+p35_R3a+p36_R3a+p65_R3a+p66_R3a+p67_R3a+p68_R3a) AS fPropDeAct, SUM(p17_R3a+p18_R3a+p19_R3a+p20_R3a+p21_R3a+p22_R3a) AS orgTimpDeTrabajo, SUM(p31_R3a+p32_R3a+p33_R3a+p34_R3a+p37_R3a+p38_R3a+p39_R3a+p40_R3a+p41_R3a+p42_R3a+p43_R3a+p44_R3a+p45_R3a+p46_R3a+p57_R3a+p58_R3a+p59_R3a+p60_R3a+p61_R3a+p62_R3a+p63_R3a+p64_R3a+p69_R3a+p70_R3a+p71_R3a+p72_R3a) AS lidRelTrabajo, SUM(p47_R3a+p48_R3a+p49_R3a+p50_R3a+p51_R3a+p52_R3a+p53_R3a+p54_R3a+p55_R3a+p56_R3a) AS entOrg, SUM(p1_R3a+p2_R3a+p3_R3a+p4_R3a+p5_R3a) AS conAmbDeTrabajo, SUM(p6_R3a+p7_R3a+p8_R3a+p9_R3a+p10_R3a+p11_R3a+p12_R3a+p13_R3a+p14_R3a+p15_R3a+p16_R3a+p65_R3a+p66_R3a+p67_R3a+p68_R3a) AS cargaDeTrabajo, SUM(p23_R3a+p24_R3a+p25_R3a+p26_R3a+p27_R3a+p28_R3a+p29_R3a+p30_R3a+p35_R3a+p36_R3a) AS faltDeContTrab, SUM(p17_R3a+p18_R3a) AS jorDeTrab, SUM(p19_R3a+p20_R3a+p21_R3a+p22_R3a) AS interEnRelFam, SUM(p31_R3a+p32_R3a+p33_R3a+p34_R3a+p37_R3a+p38_R3a+p39_R3a+p40_R3a+p41_R3a) AS liderazgo, SUM(p42_R3a+p43_R3a+p44_R3a+p45_R3a+p46_R3a+p69_R3a+p70_R3a+p71_R3a+p72_R3a) AS relaEntreTrab, SUM(p57_R3a+p58_R3a+p59_R3a+p60_R3a+p61_R3a+p62_R3a+p63_R3a+p64_R3a) AS violencia, SUM(p47_R3a+p48_R3a+p49_R3a+p50_R3a+p51_R3a+p52_R3a) AS recoDesemp, SUM(p53_R3a+p54_R3a+p55_R3a+p56_R3a) AS sentPert FROM nom035R3a WHERE usrNombre_R3a = '$usrNombre'");

					while ($masDatos = $csMasDatos->fetchArray()) {

						$dirEmpresa_R3a=$masDatos['dirEmpresa_R3a'];
						$usrNombre_R3a=$masDatos['usrNombre_R3a'];
						$cuantos=$masDatos['cuantos'];
						$ambDeTrabajo=$masDatos['ambDeTrabajo'];
						$fPropDeAct=$masDatos['fPropDeAct'];
						$orgTimpDeTrabajo=$masDatos['orgTimpDeTrabajo'];
						$lidRelTrabajo=$masDatos['lidRelTrabajo'];
						$entOrg=$masDatos['entOrg'];

						$conAmbDeTrabajo=$masDatos['conAmbDeTrabajo'];
						$cargaDeTrabajo=$masDatos['cargaDeTrabajo'];
						$faltDeContTrab=$masDatos['faltDeContTrab'];
						$jorDeTrab=$masDatos['jorDeTrab'];
						$interEnRelFam=$masDatos['interEnRelFam'];
						$liderazgo=$masDatos['liderazgo'];
						$relaEntreTrab=$masDatos['relaEntreTrab'];
						$violencia=$masDatos['violencia'];
						$recoDesemp=$masDatos['recoDesemp'];
						$sentPert=$masDatos['sentPert'];




								switch ($cuantos) {
									case $cuantos === null:
										$nivelcuantos = 'Nulo o despreciable';
										$colorcuantos = 'azul';
										break;
									case $cuantos < 50:
										$nivelcuantos = 'Nulo o despreciable';
										$colorcuantos = 'azul';
										break;
									case $cuantos >= 50 && $cuantos < 75:
										$nivelcuantos = 'Bajo';
										$colorcuantos = 'verde';
										break;
									case $cuantos >= 75 && $cuantos < 99:
										$nivelcuantos = 'Medio';
										$colorcuantos = 'amarillo';
										break;
									case $cuantos >= 99 && $cuantos < 140:
										$nivelcuantos = 'Alto';
										$colorcuantos = 'naranja';
										break;
										case $cuantos >= 140:
										$nivelcuantos = 'Muy alto';
										$colorcuantos = 'rojo';
										break;
									
									default:
										$nivelcuantos = 'No puede ser medido';
										$colorcuantos = '';
										break;
								}


									//EL RESULTADO DE ambDeTrabajo

								switch ($ambDeTrabajo) {
									case $ambDeTrabajo === 0:
										$nivelambDeTrabajo = 'Nulo o despreciable';
										$colorambDeTrabajo = 'azul';
										break;
									case $ambDeTrabajo < 5:
										$nivelambDeTrabajo = 'Nulo o despreciable';
										$colorambDeTrabajo = 'azul';
										break;
									case $ambDeTrabajo >= 5 && $ambDeTrabajo < 9:
										$nivelambDeTrabajo = 'Bajo';
										$colorambDeTrabajo = 'verde';
										break;
									case $ambDeTrabajo >= 9 && $ambDeTrabajo < 11:
										$nivelambDeTrabajo = 'Medio';
										$colorambDeTrabajo = 'amarillo';
										break;
									case $ambDeTrabajo >= 11 && $ambDeTrabajo < 14:
										$nivelambDeTrabajo = 'Alto';
										$colorambDeTrabajo = 'naranja';
										break;
										case $ambDeTrabajo >= 14:
										$nivelambDeTrabajo = 'Muy alto';
										$colorambDeTrabajo = 'rojo';
										break;
									
									default:
										$nivelambDeTrabajo = 'No puede ser medido';
										$colorambDeTrabajo = '';
										break;
								}

								//EL RESULTADO DE fPropDeAct

								switch ($fPropDeAct) {
									case $fPropDeAct === null:
										$nivelfPropDeAct = 'Nulo o despreciable';
										$colorfPropDeAct = 'azul';
										break;
									case $fPropDeAct < 15:
										$nivelfPropDeAct = 'Nulo o despreciable';
										$colorfPropDeAct = 'azul';
										break;
									case $fPropDeAct >= 15 && $fPropDeAct < 30:
										$nivelfPropDeAct = 'Bajo';
										$colorfPropDeAct = 'verde';
										break;
									case $fPropDeAct >= 30 && $fPropDeAct < 45:
										$nivelfPropDeAct = 'Medio';
										$colorfPropDeAct = 'amarillo';
										break;
									case $fPropDeAct >= 45 && $fPropDeAct < 60:
										$nivelfPropDeAct = 'Alto';
										$colorfPropDeAct = 'naranja';
										break;
										case $fPropDeAct >= 60:
										$nivelfPropDeAct = 'Muy alto';
										$colorfPropDeAct = 'rojo';
										break;
									
									default:
										$nivelfPropDeAct = 'No puede ser medido';
										$colorfPropDeAct = '';
										break;
								}

								//EL RESULTADO DE orgTimpDeTrabajo

								switch ($orgTimpDeTrabajo) {
									case $orgTimpDeTrabajo === 0:
										$nivelorgTimpDeTrabajo = 'Nulo o despreciable';
										$colororgTimpDeTrabajo = 'azul';
										break;
									case $orgTimpDeTrabajo < 5:
										$nivelorgTimpDeTrabajo = 'Nulo o despreciable';
										$colororgTimpDeTrabajo = 'azul';
										break;
									case $orgTimpDeTrabajo >= 5 && $orgTimpDeTrabajo < 7:
										$nivelorgTimpDeTrabajo = 'Bajo';
										$colororgTimpDeTrabajo = 'verde';
										break;
									case $orgTimpDeTrabajo >= 7 && $orgTimpDeTrabajo < 10:
										$nivelorgTimpDeTrabajo = 'Medio';
										$colororgTimpDeTrabajo = 'amarillo';
										break;
									case $orgTimpDeTrabajo >= 10 && $orgTimpDeTrabajo < 13:
										$nivelorgTimpDeTrabajo = 'Alto';
										$colororgTimpDeTrabajo = 'naranja';
										break;
										case $orgTimpDeTrabajo >= 13:
										$nivelorgTimpDeTrabajo = 'Muy alto';
										$colororgTimpDeTrabajo = 'rojo';
										break;
									
									default:
										$nivelorgTimpDeTrabajo = 'No puede ser medido';
										$colororgTimpDeTrabajo = '';
										break;
								}

								//EL RESULTADO DE lidRelTrabajo

								switch ($lidRelTrabajo) {
									case $lidRelTrabajo === null:
										$nivellidRelTrabajo = 'Nulo o despreciable';
										$colorlidRelTrabajo = 'azul';
										break;
									case $lidRelTrabajo < 14:
										$nivellidRelTrabajo = 'Nulo o despreciable';
										$colorlidRelTrabajo = 'azul';
										break;
									case $lidRelTrabajo >= 14 && $lidRelTrabajo < 29:
										$nivellidRelTrabajo = 'Bajo';
										$colorlidRelTrabajo = 'verde';
										break;
									case $lidRelTrabajo >= 29 && $lidRelTrabajo < 42:
										$nivellidRelTrabajo = 'Medio';
										$colorlidRelTrabajo = 'amarillo';
										break;
									case $lidRelTrabajo >= 42 && $lidRelTrabajo < 58:
										$nivellidRelTrabajo = 'Alto';
										$colorlidRelTrabajo = 'naranja';
										break;
										case $lidRelTrabajo >= 58:
										$nivellidRelTrabajo = 'Muy alto';
										$colorlidRelTrabajo = 'rojo';
										break;
									
									default:
										$nivellidRelTrabajo = 'No puede ser medido';
										$colorlidRelTrabajo = '';
										break;
								}

								//EL RESULTADO DE entOrg

								switch ($entOrg) {
									case $entOrg === null:
										$nivelentOrg = 'Nulo o despreciable';
										$colorentOrg = 'azul';
										break;
									case $entOrg < 10:
										$nivelentOrg = 'Nulo o despreciable';
										$colorentOrg = 'azul';
										break;
									case $entOrg >= 10 && $entOrg < 14:
										$nivelentOrg = 'Bajo';
										$colorentOrg = 'verde';
										break;
									case $entOrg >= 14 && $entOrg < 18:
										$nivelentOrg = 'Medio';
										$colorentOrg = 'amarillo';
										break;
									case $entOrg >= 18 && $entOrg < 23:
										$nivelentOrg = 'Alto';
										$colorentOrg = 'naranja';
										break;
										case $entOrg >= 23:
										$nivelentOrg = 'Muy alto';
										$colorentOrg = 'rojo';
										break;
									
									default:
										$nivelentOrg = 'No puede ser medido';
										$colorentOrg = '';
										break;
								}




									//EL RESULTADO DE conAmbDeTrabajo

								switch ($conAmbDeTrabajo) {
									case $conAmbDeTrabajo === null:
										$nivelconAmbDeTrabajo = 'Nulo o despreciable';
										$colorconAmbDeTrabajo = 'azul';
										break;
									case $conAmbDeTrabajo < 5:
										$nivelconAmbDeTrabajo = 'Nulo o despreciable';
										$colorconAmbDeTrabajo = 'azul';
										break;
									case $conAmbDeTrabajo >= 5 && $conAmbDeTrabajo < 9:
										$nivelconAmbDeTrabajo = 'Bajo';
										$colorconAmbDeTrabajo = 'verde';
										break;
									case $conAmbDeTrabajo >= 9 && $conAmbDeTrabajo < 11:
										$nivelconAmbDeTrabajo = 'Medio';
										$colorconAmbDeTrabajo = 'amarillo';
										break;
									case $conAmbDeTrabajo >= 11 && $conAmbDeTrabajo < 14:
										$nivelconAmbDeTrabajo = 'Alto';
										$colorconAmbDeTrabajo = 'naranja';
										break;
										case $conAmbDeTrabajo >= 14:
										$nivelconAmbDeTrabajo = 'Muy alto';
										$colorconAmbDeTrabajo = 'rojo';
										break;
									
									default:
										$nivelconAmbDeTrabajo = 'No puede ser medido';
										$colorconAmbDeTrabajo = '';
										break;
								}

								//EL RESULTADO DE cargaDeTrabajo

								switch ($cargaDeTrabajo) {
									case $cargaDeTrabajo === null:
										$nivelcargaDeTrabajo = 'Nulo o despreciable';
										$colorcargaDeTrabajo = 'azul';
										break;
									case $cargaDeTrabajo < 15:
										$nivelcargaDeTrabajo = 'Nulo o despreciable';
										$colorcargaDeTrabajo = 'azul';
										break;
									case $cargaDeTrabajo >= 15 && $cargaDeTrabajo < 21:
										$nivelcargaDeTrabajo = 'Bajo';
										$colorcargaDeTrabajo = 'verde';
										break;
									case $cargaDeTrabajo >= 21 && $cargaDeTrabajo < 27:
										$nivelcargaDeTrabajo = 'Medio';
										$colorcargaDeTrabajo = 'amarillo';
										break;
									case $cargaDeTrabajo >= 27 && $cargaDeTrabajo < 37:
										$nivelcargaDeTrabajo = 'Alto';
										$colorcargaDeTrabajo = 'naranja';
										break;
										case $cargaDeTrabajo >= 37:
										$nivelcargaDeTrabajo = 'Muy alto';
										$colorcargaDeTrabajo = 'rojo';
										break;
									
									default:
										$nivelcargaDeTrabajo = 'No puede ser medido';
										$colorcargaDeTrabajo = '';
										break;
								}

								//EL RESULTADO DE faltDeContTrab

								switch ($faltDeContTrab) {
									case $faltDeContTrab === null:
										$nivelfaltDeContTrab= 'Nulo o despreciable';
										$colorfaltDeContTrab= 'azul';
										break;
									case $faltDeContTrab < 11:
										$nivelfaltDeContTrab= 'Nulo o despreciable';
										$colorfaltDeContTrab= 'azul';
										break;
									case $faltDeContTrab >= 11 && $faltDeContTrab < 16:
										$nivelfaltDeContTrab= 'Bajo';
										$colorfaltDeContTrab= 'verde';
										break;
									case $faltDeContTrab >= 16 && $faltDeContTrab < 21:
										$nivelfaltDeContTrab= 'Medio';
										$colorfaltDeContTrab= 'amarillo';
										break;
									case $faltDeContTrab >= 21 && $faltDeContTrab < 25:
										$nivelfaltDeContTrab= 'Alto';
										$colorfaltDeContTrab= 'naranja';
										break;
										case $faltDeContTrab >= 25:
										$nivelfaltDeContTrab= 'Muy alto';
										$colorfaltDeContTrab= 'rojo';
										break;
									
									default:
										$nivelfaltDeContTrab= 'No puede ser medido';
										$colorfaltDeContTrab= '';
										break;
								}

								//EL RESULTADO DE jorDeTrabF

								switch ($jorDeTrab) {
									case $jorDeTrab === null:
										$niveljorDeTrab = 'Nulo o despreciable';
										$colorjorDeTrab = 'azul';
										break;
									case $jorDeTrab < 1:
										$niveljorDeTrab = 'Nulo o despreciable';
										$colorjorDeTrab = 'azul';
										break;
									case $jorDeTrab >= 1 && $jorDeTrab < 2:
										$niveljorDeTrab = 'Bajo';
										$colorjorDeTrab = 'verde';
										break;
									case $jorDeTrab >= 2 && $jorDeTrab < 4:
										$niveljorDeTrab = 'Medio';
										$colorjorDeTrab = 'amarillo';
										break;
									case $jorDeTrab >= 4 && $jorDeTrab < 6:
										$niveljorDeTrab = 'Alto';
										$colorjorDeTrab = 'naranja';
										break;
										case $jorDeTrab >= 6:
										$niveljorDeTrab = 'Muy alto';
										$colorjorDeTrab = 'rojo';
										break;
									
									default:
										$niveljorDeTrab = 'No puede ser medido';
										$colorjorDeTrab = '';
										break;
								}

								//EL RESULTADO DE interEnRelFam

								switch ($interEnRelFam) {
									case $interEnRelFam === null:
										$nivelinterEnRelFam = 'Nulo o despreciable';
										$colorinterEnRelFam = 'azul';
										break;
									case $interEnRelFam < 4:
										$nivelinterEnRelFam = 'Nulo o despreciable';
										$colorinterEnRelFam = 'azul';
										break;
									case $interEnRelFam >= 4 && $interEnRelFam < 6:
										$nivelinterEnRelFam = 'Bajo';
										$colorinterEnRelFam = 'verde';
										break;
									case $interEnRelFam >= 6 && $interEnRelFam < 8:
										$nivelinterEnRelFam = 'Medio';
										$colorinterEnRelFam = 'amarillo';
										break;
									case $interEnRelFam >= 8 && $interEnRelFam < 10:
										$nivelinterEnRelFam = 'Alto';
										$colorinterEnRelFam = 'naranja';
										break;
										case $interEnRelFam >= 10:
										$nivelinterEnRelFam = 'Muy alto';
										$colorinterEnRelFam = 'rojo';
										break;
									
									default:
										$nivelinterEnRelFam = 'No puede ser medido';
										$colorinterEnRelFam = '';
										break;
								}

								//EL RESULTADO DE liderazgo

								switch ($liderazgo) {
									case $liderazgo === null:
										$nivelliderazgo = 'Nulo o despreciable';
										$colorliderazgo = 'azul';
										break;
									case $liderazgo < 9:
										$nivelliderazgo = 'Nulo o despreciable';
										$colorliderazgo = 'azul';
										break;
									case $liderazgo >= 9 && $liderazgo < 12:
										$nivelliderazgo = 'Bajo';
										$colorliderazgo = 'verde';
										break;
									case $liderazgo >= 12 && $liderazgo < 16:
										$nivelliderazgo = 'Medio';
										$colorliderazgo = 'amarillo';
										break;
									case $liderazgo >= 16 && $liderazgo < 20:
										$nivelliderazgo = 'Alto';
										$colorliderazgo = 'naranja';
										break;
										case $liderazgo >= 20:
										$nivelliderazgo = 'Muy alto';
										$colorliderazgo = 'rojo';
										break;
									
									default:
										$nivelliderazgo = 'No puede ser medido';
										$colorliderazgo = '';
										break;
								}

								//EL RESULTADO DE relaEntreTrab

								switch ($relaEntreTrab) {
									case $relaEntreTrab === null:
										$nivelrelaEntreTrab = 'Nulo o despreciable';
										$colorrelaEntreTrab = 'azul';
										break;
									case $relaEntreTrab < 10:
										$nivelrelaEntreTrab = 'Nulo o despreciable';
										$colorrelaEntreTrab = 'azul';
										break;
									case $relaEntreTrab >= 10 && $relaEntreTrab < 13:
										$nivelrelaEntreTrab = 'Bajo';
										$colorrelaEntreTrab = 'verde';
										break;
									case $relaEntreTrab >= 13 && $relaEntreTrab < 17:
										$nivelrelaEntreTrab = 'Medio';
										$colorrelaEntreTrab = 'amarillo';
										break;
									case $relaEntreTrab >= 17 && $relaEntreTrab < 21:
										$nivelrelaEntreTrab = 'Alto';
										$colorrelaEntreTrab = 'naranja';
										break;
										case $relaEntreTrab >= 21:
										$nivelrelaEntreTrab = 'Muy alto';
										$colorrelaEntreTrab = 'rojo';
										break;
									
									default:
										$nivelrelaEntreTrab = 'No puede ser medido';
										$colorrelaEntreTrab = '';
										break;
								}


								//EL RESULTADO DE violencia

								switch ($violencia) {
									case $violencia === null:
										$nivelviolencia = 'Nulo o despreciable';
										$colorviolencia = 'azul';
										break;
									case $violencia < 7:
										$nivelviolencia = 'Nulo o despreciable';
										$colorviolencia = 'azul';
										break;
									case $violencia >= 7 && $violencia < 10:
										$nivelviolencia = 'Bajo';
										$colorviolencia = 'verde';
										break;
									case $violencia >= 10 && $violencia < 13:
										$nivelviolencia = 'Medio';
										$colorviolencia = 'amarillo';
										break;
									case $violencia >= 13 && $violencia < 16:
										$nivelviolencia = 'Alto';
										$colorviolencia = 'naranja';
										break;
										case $violencia >= 16:
										$nivelviolencia = 'Muy alto';
										$colorviolencia = 'rojo';
										break;
									
									default:
										$nivelviolencia = 'No puede ser medido';
										$colorviolencia = '';
										break;
								}


								//EL RESULTADO DE recoDesemp

								switch ($recoDesemp) {
									case $recoDesemp === null:
										$nivelrecoDesemp = 'Nulo o despreciable';
										$colorrecoDesemp = 'azul';
										break;
									case $recoDesemp < 6:
										$nivelrecoDesemp = 'Nulo o despreciable';
										$colorrecoDesemp = 'azul';
										break;
									case $recoDesemp >= 6 && $recoDesemp < 10:
										$nivelrecoDesemp = 'Bajo';
										$colorrecoDesemp = 'verde';
										break;
									case $recoDesemp >= 10 && $recoDesemp < 14:
										$nivelrecoDesemp = 'Medio';
										$colorrecoDesemp = 'amarillo';
										break;
									case $recoDesemp >= 14 && $recoDesemp < 18:
										$nivelrecoDesemp = 'Alto';
										$colorrecoDesemp = 'naranja';
										break;
										case $recoDesemp >= 18:
										$nivelrecoDesemp = 'Muy alto';
										$colorrecoDesemp = 'rojo';
										break;
									
									default:
										$nivelrecoDesemp = 'No puede ser medido';
										$colorrecoDesemp = '';
										break;
								}

								//EL RESULTADO DE sentPert

								switch ($sentPert) {
									case $sentPert === null:
										$nivelsentPert = 'Nulo o despreciable';
										$colorsentPert = 'azul';
										break;
									case $sentPert < 4:
										$nivelsentPert = 'Nulo o despreciable';
										$colorsentPert = 'azul';
										break;
									case $sentPert >= 4 && $sentPert < 6:
										$nivelsentPert = 'Bajo';
										$colorsentPert = 'verde';
										break;
									case $sentPert >= 6 && $sentPert < 8:
										$nivelsentPert = 'Medio';
										$colorsentPert = 'amarillo';
										break;
									case $sentPert >= 8 && $sentPert < 10:
										$nivelsentPert = 'Alto';
										$colorsentPert = 'naranja';
										break;
										case $sentPert >= 10:
										$nivelsentPert = 'Muy alto';
										$colorsentPert = 'rojo';
										break;
									
									default:
										$nivelsentPert = 'No puede ser medido';
										$colorsentPert = '';
										break;
								}





						echo '
						<tr>
							<td>'.$dirEmpresa_R3a.'</td>
							<td>'.$usrNombre_R3a.'</td>
							<td class="'.$colorcuantos.'">'.$cuantos.'</td>
							<td class="'.$colorambDeTrabajo.'">'.$ambDeTrabajo.'</td>
							<td class="'.$colorfPropDeAct.'">'.$fPropDeAct.'</td>
							<td class="'.$colororgTimpDeTrabajo.'">'.$orgTimpDeTrabajo.'</td>
							<td class="'.$colorlidRelTrabajo.'">'.$lidRelTrabajo.'</td>
							<td class="'.$colorentOrg.'">'.$entOrg.'</td>
							<td></td>
							<td class="'.$colorconAmbDeTrabajo.'">'.$conAmbDeTrabajo.'</td>
							<td class="'.$colorcargaDeTrabajo.'">'.$cargaDeTrabajo.'</td>
							<td class="'.$colorfaltDeContTrab.'">'.$faltDeContTrab.'</td>
							<td class="'.$colorjorDeTrab.'">'.$jorDeTrab.'</td>
							<td class="'.$colorinterEnRelFam.'">'.$interEnRelFam.'</td>
							<td class="'.$colorliderazgo.'">'.$liderazgo.'</td>
							<td class="'.$colorrelaEntreTrab.'">'.$relaEntreTrab.'</td>
							<td class="'.$colorviolencia.'">'.$violencia.'</td>
							<td class="'.$colorrecoDesemp.'">'.$recoDesemp.'</td>
							<td class="'.$colorsentPert.'">'.$sentPert.'</td>
						</tr>
						';
					}

	}



		$conPorCentro -> close();

	 ?>


						
					</table>
				</div>
			</div>
		</div>
	</div>

</body>
</html>