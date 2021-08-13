<?php 


	$csDos = $conPorCentro -> query("SELECT SUM(p1_R3a+p2_R3a+p3_R3a+p4_R3a+p5_R3a) AS ambDeTrabajo, SUM(p6_R3a+p7_R3a+p8_R3a+p9_R3a+p10_R3a+p11_R3a+p12_R3a+p13_R3a+p14_R3a+p15_R3a+p16_R3a+p23_R3a+p24_R3a+p25_R3a+p26_R3a+p27_R3a+p28_R3a+p29_R3a+p30_R3a+p35_R3a+p36_R3a+p65_R3a+p66_R3a+p67_R3a+p68_R3a) AS fPropDeAct, SUM(p17_R3a+p18_R3a+p19_R3a+p20_R3a+p21_R3a+p22_R3a) AS orgTimpDeTrabajo, SUM(p31_R3a+p32_R3a+p33_R3a+p34_R3a+p37_R3a+p38_R3a+p39_R3a+p40_R3a+p41_R3a+p42_R3a+p43_R3a+p44_R3a+p45_R3a+p46_R3a+p57_R3a+p58_R3a+p59_R3a+p60_R3a+p61_R3a+p62_R3a+p63_R3a+p64_R3a+p69_R3a+p70_R3a+p71_R3a+p72_R3a) AS lidRelTrabajo, SUM(p47_R3a+p48_R3a+p49_R3a+p50_R3a+p51_R3a+p52_R3a+p53_R3a+p54_R3a+p55_R3a+p56_R3a) AS entOrg, COUNT(codeMd5_R3a) AS CPersonasAmbDeTra FROM nom035R3a WHERE usrNombre_R3a = '$usrNombre'");

	while ($nivelDeRiezgoMas = $csDos->fetchArray()) {

		$ambDeTrabajoCFinalMas=$nivelDeRiezgoMas['ambDeTrabajo'];
		$fPropDeActCFinalMas=$nivelDeRiezgoMas['fPropDeAct'];
		$orgTimptCFinalMas=$nivelDeRiezgoMas['orgTimpDeTrabajo'];
		$lidRelCFinalMas=$nivelDeRiezgoMas['lidRelTrabajo'];
		$entOrgFinalMas=$nivelDeRiezgoMas['entOrg'];
		$CPersonasAmbDeTraCFinalMas=$nivelDeRiezgoMas['CPersonasAmbDeTra'];

	}

	//CALCULO CFINAL
	$cAmbDeTrabajoFMas = $ambDeTrabajoCFinalMas/$CPersonasAmbDeTraCFinalMas;
	$cfPropdeActFMas = $fPropDeActCFinalMas/$CPersonasAmbDeTraCFinalMas;
	$orgTimptFMas = $orgTimptCFinalMas/$CPersonasAmbDeTraCFinalMas;
	$lidRelCFMas = $lidRelCFinalMas/$CPersonasAmbDeTraCFinalMas;
	$cEntOrgFMas = $entOrgFinalMas/$CPersonasAmbDeTraCFinalMas;



	$cAmbDeTrabajoFMas = round($cAmbDeTrabajoFMas,1, PHP_ROUND_HALF_UP);
	$cfPropdeActFMas = round($cfPropdeActFMas,1, PHP_ROUND_HALF_UP);
	$orgTimptFMas = round($orgTimptFMas,1, PHP_ROUND_HALF_UP);
	$lidRelCFMas = round($lidRelCFMas,1, PHP_ROUND_HALF_UP);
	$cEntOrgFMas = round($cEntOrgFMas,1, PHP_ROUND_HALF_UP);

	//EL RESULTADO DE CFINAL

	switch ($cAmbDeTrabajoFMas) {
		case $cAmbDeTrabajoFMas === 0:
			$nivelADeTracFinalMas = 'Nulo o despreciable';
			$colorADeTracFinalMas = 'azul';
			break;
		case $cAmbDeTrabajoFMas < 5:
			$nivelADeTracFinalMas = 'Nulo o despreciable';
			$colorADeTracFinalMas = 'azul';
			break;
		case $cAmbDeTrabajoFMas >= 5 && $cAmbDeTrabajoFMas < 9:
			$nivelADeTracFinalMas = 'Bajo';
			$colorADeTracFinalMas = 'verde';
			break;
		case $cAmbDeTrabajoFMas >= 9 && $cAmbDeTrabajoFMas < 11:
			$nivelADeTracFinalMas = 'Medio';
			$colorADeTracFinalMas = 'amarillo';
			break;
		case $cAmbDeTrabajoFMas >= 11 && $cAmbDeTrabajoFMas < 14:
			$nivelADeTracFinalMas = 'Alto';
			$colorADeTracFinalMas = 'naranja';
			break;
			case $cAmbDeTrabajoFMas >= 14:
			$nivelADeTracFinalMas = 'Muy alto';
			$colorADeTracFinalMas = 'rojo';
			break;
		
		default:
			$nivelADeTracFinalMas = 'No puede ser medido';
			$colorADeTracFinalMas = '';
			break;
	}

	//EL RESULTADO DE cfPropdeActFMas

	switch ($cfPropdeActFMas) {
		case $cfPropdeActFMas === null:
			$nivelcfpTracFinalMas = 'Nulo o despreciable';
			$colorcfpTracFinalMas = 'azul';
			break;
		case $cfPropdeActFMas < 15:
			$nivelcfpTracFinalMas = 'Nulo o despreciable';
			$colorcfpTracFinalMas = 'azul';
			break;
		case $cfPropdeActFMas >= 15 && $cfPropdeActFMas < 30:
			$nivelcfpTracFinalMas = 'Bajo';
			$colorcfpTracFinalMas = 'verde';
			break;
		case $cfPropdeActFMas >= 30 && $cfPropdeActFMas < 45:
			$nivelcfpTracFinalMas = 'Medio';
			$colorcfpTracFinalMas = 'amarillo';
			break;
		case $cfPropdeActFMas >= 45 && $cfPropdeActFMas < 60:
			$nivelcfpTracFinalMas = 'Alto';
			$colorcfpTracFinalMas = 'naranja';
			break;
			case $cfPropdeActFMas >= 60:
			$nivelcfpTracFinalMas = 'Muy alto';
			$colorcfpTracFinalMas = 'rojo';
			break;
		
		default:
			$nivelcfpTracFinalMas = 'No puede ser medido';
			$colorcfpTracFinalMas = '';
			break;
	}

	//EL RESULTADO DE orgTimptFMas

	switch ($orgTimptFMas) {
		case $orgTimptFMas === 0:
			$nivelorgTFinalMas = 'Nulo o despreciable';
			$colororgTFinalMas = 'azul';
			break;
		case $orgTimptFMas < 5:
			$nivelorgTFinalMas = 'Nulo o despreciable';
			$colororgTFinalMas = 'azul';
			break;
		case $orgTimptFMas >= 5 && $orgTimptFMas < 7:
			$nivelorgTFinalMas = 'Bajo';
			$colororgTFinalMas = 'verde';
			break;
		case $orgTimptFMas >= 7 && $orgTimptFMas < 10:
			$nivelorgTFinalMas = 'Medio';
			$colororgTFinalMas = 'amarillo';
			break;
		case $orgTimptFMas >= 10 && $orgTimptFMas < 13:
			$nivelorgTFinalMas = 'Alto';
			$colororgTFinalMas = 'naranja';
			break;
			case $orgTimptFMas >= 13:
			$nivelorgTFinalMas = 'Muy alto';
			$colororgTFinalMas = 'rojo';
			break;
		
		default:
			$nivelorgTFinalMas = 'No puede ser medido';
			$colororgTFinalMas = '';
			break;
	}

	//EL RESULTADO DE lidRelCFMas

	switch ($lidRelCFMas) {
		case $lidRelCFMas === null:
			$nivelidRelFinalMas = 'Nulo o despreciable';
			$colorlidRelFinalMas = 'azul';
			break;
		case $lidRelCFMas < 14:
			$nivelidRelFinalMas = 'Nulo o despreciable';
			$colorlidRelFinalMas = 'azul';
			break;
		case $lidRelCFMas >= 14 && $lidRelCFMas < 29:
			$nivelidRelFinalMas = 'Bajo';
			$colorlidRelFinalMas = 'verde';
			break;
		case $lidRelCFMas >= 29 && $lidRelCFMas < 42:
			$nivelidRelFinalMas = 'Medio';
			$colorlidRelFinalMas = 'amarillo';
			break;
		case $lidRelCFMas >= 42 && $lidRelCFMas < 58:
			$nivelidRelFinalMas = 'Alto';
			$colorlidRelFinalMas = 'naranja';
			break;
			case $lidRelCFMas >= 58:
			$nivelidRelFinalMas = 'Muy alto';
			$colorlidRelFinalMas = 'rojo';
			break;
		
		default:
			$nivelidRelFinalMas = 'No puede ser medido';
			$colorlidRelFinalMas = '';
			break;
	}

	//EL RESULTADO DE cEntOrgFMas

	switch ($cEntOrgFMas) {
		case $cEntOrgFMas === null:
			$niveentOrgFinalMas = 'Nulo o despreciable';
			$colorentOrgFinalMas = 'azul';
			break;
		case $cEntOrgFMas < 10:
			$niveentOrgFinalMas = 'Nulo o despreciable';
			$colorentOrgFinalMas = 'azul';
			break;
		case $cEntOrgFMas >= 10 && $cEntOrgFMas < 14:
			$niveentOrgFinalMas = 'Bajo';
			$colorentOrgFinalMas = 'verde';
			break;
		case $cEntOrgFMas >= 14 && $cEntOrgFMas < 18:
			$niveentOrgFinalMas = 'Medio';
			$colorentOrgFinalMas = 'amarillo';
			break;
		case $cEntOrgFMas >= 18 && $cEntOrgFMas < 23:
			$niveentOrgFinalMas = 'Alto';
			$colorentOrgFinalMas = 'naranja';
			break;
			case $cEntOrgFMas >= 23:
			$niveentOrgFinalMas = 'Muy alto';
			$colorentOrgFinalMas = 'rojo';
			break;
		
		default:
			$niveentOrgFinalMas = 'No puede ser medido';
			$colorentOrgFinalMas = '';
			break;
	}


 ?>