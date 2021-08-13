<?php 

	$csDos = $conPorCentro -> query("SELECT SUM(p1_R2a+p2_R2a+p3_R2a) AS ambDeTrabajo, SUM(p4_R2a+p5_R2a+p6_R2a+p7_R2a+p8_R2a+p9_R2a+p10_R2a+p11_R2a+p12_R2a+p13_R2a+p18_R2a+p19_R2a+p20_R2a+p21_R2a+p22_R2a+p26_R2a+p27_R2a+p41_R2a+p42_R2a+p43_R2a) AS fPropDeAct, SUM(p14_R2a+p15_R2a+p16_R2a+p17_R2a) AS orgTimpDeTrabajo, SUM(p23_R2a+p24_R2a+p25_R2a+p28_R2a+p29_R2a+p30_R2a+p31_R2a+p32_R2a+p33_R2a+p34_R2a+p35_R2a+p36_R2a+p37_R2a+p38_R2a+p39_R2a+p40_R2a+p44_R2a+p45_R2a+p46_R2a) AS lidRelTrabajo, COUNT(codeMd5_R2a) AS CPersonasAmbDeTra FROM nom035R2a");

	while ($nivelDeRiezgoMas = $csDos->fetchArray()) {

		$ambDeTrabajoCFinalMas=$nivelDeRiezgoMas['ambDeTrabajo'];
		$fPropDeActCFinalMas=$nivelDeRiezgoMas['fPropDeAct'];
		$orgTimptCFinalMas=$nivelDeRiezgoMas['orgTimpDeTrabajo'];
		$lidRelCFinalMas=$nivelDeRiezgoMas['lidRelTrabajo'];
		$CPersonasAmbDeTraCFinalMas=$nivelDeRiezgoMas['CPersonasAmbDeTra'];

	}

	//CALCULO CFINAL
	$cAmbDeTrabajoFMas = $ambDeTrabajoCFinalMas/$CPersonasAmbDeTraCFinalMas;
	$cfPropdeActFMas = $fPropDeActCFinalMas/$CPersonasAmbDeTraCFinalMas;
	$orgTimptFMas = $orgTimptCFinalMas/$CPersonasAmbDeTraCFinalMas;
	$lidRelCFMas = $lidRelCFinalMas/$CPersonasAmbDeTraCFinalMas;


	$cAmbDeTrabajoFMas = round($cAmbDeTrabajoFMas,1, PHP_ROUND_HALF_UP);
	$cfPropdeActFMas = round($cfPropdeActFMas,1, PHP_ROUND_HALF_UP);
	$orgTimptFMas = round($orgTimptFMas,1, PHP_ROUND_HALF_UP);
	$lidRelCFMas = round($lidRelCFMas,1, PHP_ROUND_HALF_UP);

	//EL RESULTADO DE CFINAL

	switch ($cAmbDeTrabajoFMas) {
		case $cAmbDeTrabajoFMas === 0:
			$nivelADeTracFinalMas = 'Nulo o despreciable';
			$colorADeTracFinalMas = 'azul';
			break;
		case $cAmbDeTrabajoFMas < 3:
			$nivelADeTracFinalMas = 'Nulo o despreciable';
			$colorADeTracFinalMas = 'azul';
			break;
		case $cAmbDeTrabajoFMas >= 3 && $cAmbDeTrabajoFMas < 5:
			$nivelADeTracFinalMas = 'Bajo';
			$colorADeTracFinalMas = 'verde';
			break;
		case $cAmbDeTrabajoFMas >= 5 && $cAmbDeTrabajoFMas < 7:
			$nivelADeTracFinalMas = 'Medio';
			$colorADeTracFinalMas = 'amarillo';
			break;
		case $cAmbDeTrabajoFMas >= 7 && $cAmbDeTrabajoFMas < 9:
			$nivelADeTracFinalMas = 'Alto';
			$colorADeTracFinalMas = 'naranja';
			break;
			case $cAmbDeTrabajoFMas >= 9:
			$nivelADeTracFinalMas = 'Muy alto';
			$colorADeTracFinalMas = 'rojo';
			break;
		
		default:
			$nivelADeTracFinalMas = 'No puede ser medido';
			$colorADeTracFinalMas = '';
			break;
	}

	//EL RESULTADO DE cfPropdeActF

	switch ($cfPropdeActFMas) {
		case $cfPropdeActFMas === null:
			$nivelcfpTracFinalMas = 'Nulo o despreciable';
			$colorcfpTracFinalMas = 'azul';
			break;
		case $cfPropdeActFMas < 10:
			$nivelcfpTracFinalMas = 'Nulo o despreciable';
			$colorcfpTracFinalMas = 'azul';
			break;
		case $cfPropdeActFMas >= 10 && $cfPropdeActFMas < 20:
			$nivelcfpTracFinalMas = 'Bajo';
			$colorcfpTracFinalMas = 'verde';
			break;
		case $cfPropdeActFMas >= 20 && $cfPropdeActFMas < 30:
			$nivelcfpTracFinalMas = 'Medio';
			$colorcfpTracFinalMas = 'amarillo';
			break;
		case $cfPropdeActFMas >= 30 && $cfPropdeActFMas < 40:
			$nivelcfpTracFinalMas = 'Alto';
			$colorcfpTracFinalMas = 'naranja';
			break;
			case $cfPropdeActFMas >= 40:
			$nivelcfpTracFinalMas = 'Muy alto';
			$colorcfpTracFinalMas = 'rojo';
			break;
		
		default:
			$nivelcfpTracFinalMas = 'No puede ser medido';
			$colorcfpTracFinalMas = '';
			break;
	}

	//EL RESULTADO DE orgTimptF

	switch ($orgTimptFMas) {
		case $orgTimptFMas === 0:
			$nivelorgTFinalMas = 'Nulo o despreciable';
			$colororgTFinalMas = 'azul';
			break;
		case $orgTimptFMas < 4:
			$nivelorgTFinalMas = 'Nulo o despreciable';
			$colororgTFinalMas = 'azul';
			break;
		case $orgTimptFMas >= 4 && $orgTimptFMas < 6:
			$nivelorgTFinalMas = 'Bajo';
			$colororgTFinalMas = 'verde';
			break;
		case $orgTimptFMas >= 6 && $orgTimptFMas < 9:
			$nivelorgTFinalMas = 'Medio';
			$colororgTFinalMas = 'amarillo';
			break;
		case $orgTimptFMas >= 9 && $orgTimptFMas < 12:
			$nivelorgTFinalMas = 'Alto';
			$colororgTFinalMas = 'naranja';
			break;
			case $orgTimptFMas >= 12:
			$nivelorgTFinalMas = 'Muy alto';
			$colororgTFinalMas = 'rojo';
			break;
		
		default:
			$nivelorgTFinalMas = 'No puede ser medido';
			$colororgTFinalMas = '';
			break;
	}

	//EL RESULTADO DE lidRelCF

	switch ($lidRelCFMas) {
		case $lidRelCFMas === null:
			$nivelidRelFinalMas = 'Nulo o despreciable';
			$colorlidRelFinalMas = 'azul';
			break;
		case $lidRelCFMas < 10:
			$nivelidRelFinalMas = 'Nulo o despreciable';
			$colorlidRelFinalMas = 'azul';
			break;
		case $lidRelCFMas >= 10 && $lidRelCFMas < 18:
			$nivelidRelFinalMas = 'Bajo';
			$colorlidRelFinalMas = 'verde';
			break;
		case $lidRelCFMas >= 18 && $lidRelCFMas < 28:
			$nivelidRelFinalMas = 'Medio';
			$colorlidRelFinalMas = 'amarillo';
			break;
		case $lidRelCFMas >= 28 && $lidRelCFMas < 38:
			$nivelidRelFinalMas = 'Alto';
			$colorlidRelFinalMas = 'naranja';
			break;
			case $lidRelCFMas >= 38:
			$nivelidRelFinalMas = 'Muy alto';
			$colorlidRelFinalMas = 'rojo';
			break;
		
		default:
			$nivelidRelFinalMas = 'No puede ser medido';
			$colorlidRelFinalMas = '';
			break;
	}


 ?>