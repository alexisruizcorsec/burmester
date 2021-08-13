<?php 

	$conUno = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

	$cs = $conUno -> query("SELECT SUM(p1_R3a+p2_R3a+p3_R3a+p4_R3a+p5_R3a) AS ambDeTrabajo, SUM(p6_R3a+p7_R3a+p8_R3a+p9_R3a+p10_R3a+p11_R3a+p12_R3a+p13_R3a+p14_R3a+p15_R3a+p16_R3a+p23_R3a+p24_R3a+p25_R3a+p26_R3a+p27_R3a+p28_R3a+p29_R3a+p30_R3a+p35_R3a+p36_R3a+p65_R3a+p66_R3a+p67_R3a+p68_R3a) AS fPropDeAct, SUM(p17_R3a+p18_R3a+p19_R3a+p20_R3a+p21_R3a+p22_R3a) AS orgTimpDeTrabajo, SUM(p31_R3a+p32_R3a+p33_R3a+p34_R3a+p37_R3a+p38_R3a+p39_R3a+p40_R3a+p41_R3a+p42_R3a+p43_R3a+p44_R3a+p45_R3a+p46_R3a+p57_R3a+p58_R3a+p59_R3a+p60_R3a+p61_R3a+p62_R3a+p63_R3a+p64_R3a+p69_R3a+p70_R3a+p71_R3a+p72_R3a) AS lidRelTrabajo, SUM(p47_R3a+p48_R3a+p49_R3a+p50_R3a+p51_R3a+p52_R3a+p53_R3a+p54_R3a+p55_R3a+p56_R3a) AS entOrg, COUNT(codeMd5_R3a) AS CPersonasAmbDeTra FROM nom035R3a");

	while ($nivelDeRiezgo = $cs->fetchArray()) {

		$ambDeTrabajoCFinal=$nivelDeRiezgo['ambDeTrabajo'];
		$fPropDeActCFinal=$nivelDeRiezgo['fPropDeAct'];
		$orgTimptCFinal=$nivelDeRiezgo['orgTimpDeTrabajo'];
		$lidRelCFinal=$nivelDeRiezgo['lidRelTrabajo'];
		$entOrgFinal=$nivelDeRiezgo['entOrg'];
		$CPersonasAmbDeTraCFinal=$nivelDeRiezgo['CPersonasAmbDeTra'];

	}

	//CALCULO CFINAL
	$cAmbDeTrabajoF = $ambDeTrabajoCFinal/$CPersonasAmbDeTraCFinal;
	$cfPropdeActF = $fPropDeActCFinal/$CPersonasAmbDeTraCFinal;
	$orgTimptF = $orgTimptCFinal/$CPersonasAmbDeTraCFinal;
	$lidRelCF = $lidRelCFinal/$CPersonasAmbDeTraCFinal;
	$cEntOrgF = $entOrgFinal/$CPersonasAmbDeTraCFinal;



	$cAmbDeTrabajoF = round($cAmbDeTrabajoF,1, PHP_ROUND_HALF_UP);
	$cfPropdeActF = round($cfPropdeActF,1, PHP_ROUND_HALF_UP);
	$orgTimptF = round($orgTimptF,1, PHP_ROUND_HALF_UP);
	$lidRelCF = round($lidRelCF,1, PHP_ROUND_HALF_UP);
	$cEntOrgF = round($cEntOrgF,1, PHP_ROUND_HALF_UP);

	//EL RESULTADO DE CFINAL

	switch ($cAmbDeTrabajoF) {
		case $cAmbDeTrabajoF === 0:
			$nivelADeTracFinal = 'Nulo o despreciable';
			$colorADeTracFinal = 'azul';
			break;
		case $cAmbDeTrabajoF < 5:
			$nivelADeTracFinal = 'Nulo o despreciable';
			$colorADeTracFinal = 'azul';
			break;
		case $cAmbDeTrabajoF >= 5 && $cAmbDeTrabajoF < 9:
			$nivelADeTracFinal = 'Bajo';
			$colorADeTracFinal = 'verde';
			break;
		case $cAmbDeTrabajoF >= 9 && $cAmbDeTrabajoF < 11:
			$nivelADeTracFinal = 'Medio';
			$colorADeTracFinal = 'amarillo';
			break;
		case $cAmbDeTrabajoF >= 11 && $cAmbDeTrabajoF < 14:
			$nivelADeTracFinal = 'Alto';
			$colorADeTracFinal = 'naranja';
			break;
			case $cAmbDeTrabajoF >= 14:
			$nivelADeTracFinal = 'Muy alto';
			$colorADeTracFinal = 'rojo';
			break;
		
		default:
			$nivelADeTracFinal = 'No puede ser medido';
			$colorADeTracFinal = '';
			break;
	}

	//EL RESULTADO DE cfPropdeActF

	switch ($cfPropdeActF) {
		case $cfPropdeActF === null:
			$nivelcfpTracFinal = 'Nulo o despreciable';
			$colorcfpTracFinal = 'azul';
			break;
		case $cfPropdeActF < 15:
			$nivelcfpTracFinal = 'Nulo o despreciable';
			$colorcfpTracFinal = 'azul';
			break;
		case $cfPropdeActF >= 15 && $cfPropdeActF < 30:
			$nivelcfpTracFinal = 'Bajo';
			$colorcfpTracFinal = 'verde';
			break;
		case $cfPropdeActF >= 30 && $cfPropdeActF < 45:
			$nivelcfpTracFinal = 'Medio';
			$colorcfpTracFinal = 'amarillo';
			break;
		case $cfPropdeActF >= 45 && $cfPropdeActF < 60:
			$nivelcfpTracFinal = 'Alto';
			$colorcfpTracFinal = 'naranja';
			break;
			case $cfPropdeActF >= 60:
			$nivelcfpTracFinal = 'Muy alto';
			$colorcfpTracFinal = 'rojo';
			break;
		
		default:
			$nivelcfpTracFinal = 'No puede ser medido';
			$colorcfpTracFinal = '';
			break;
	}

	//EL RESULTADO DE orgTimptF

	switch ($orgTimptF) {
		case $orgTimptF === 0:
			$nivelorgTFinal = 'Nulo o despreciable';
			$colororgTFinal = 'azul';
			break;
		case $orgTimptF < 5:
			$nivelorgTFinal = 'Nulo o despreciable';
			$colororgTFinal = 'azul';
			break;
		case $orgTimptF >= 5 && $orgTimptF < 7:
			$nivelorgTFinal = 'Bajo';
			$colororgTFinal = 'verde';
			break;
		case $orgTimptF >= 7 && $orgTimptF < 10:
			$nivelorgTFinal = 'Medio';
			$colororgTFinal = 'amarillo';
			break;
		case $orgTimptF >= 10 && $orgTimptF < 13:
			$nivelorgTFinal = 'Alto';
			$colororgTFinal = 'naranja';
			break;
			case $orgTimptF >= 13:
			$nivelorgTFinal = 'Muy alto';
			$colororgTFinal = 'rojo';
			break;
		
		default:
			$nivelorgTFinal = 'No puede ser medido';
			$colororgTFinal = '';
			break;
	}

	//EL RESULTADO DE lidRelCF

	switch ($lidRelCF) {
		case $lidRelCF === null:
			$nivelidRelFinal = 'Nulo o despreciable';
			$colorlidRelFinal = 'azul';
			break;
		case $lidRelCF < 14:
			$nivelidRelFinal = 'Nulo o despreciable';
			$colorlidRelFinal = 'azul';
			break;
		case $lidRelCF >= 14 && $lidRelCF < 29:
			$nivelidRelFinal = 'Bajo';
			$colorlidRelFinal = 'verde';
			break;
		case $lidRelCF >= 29 && $lidRelCF < 42:
			$nivelidRelFinal = 'Medio';
			$colorlidRelFinal = 'amarillo';
			break;
		case $lidRelCF >= 42 && $lidRelCF < 58:
			$nivelidRelFinal = 'Alto';
			$colorlidRelFinal = 'naranja';
			break;
			case $lidRelCF >= 58:
			$nivelidRelFinal = 'Muy alto';
			$colorlidRelFinal = 'rojo';
			break;
		
		default:
			$nivelidRelFinal = 'No puede ser medido';
			$colorlidRelFinal = '';
			break;
	}

	//EL RESULTADO DE cEntOrgF

	switch ($cEntOrgF) {
		case $cEntOrgF === null:
			$niveentOrgFinal = 'Nulo o despreciable';
			$colorentOrgFinal = 'azul';
			break;
		case $cEntOrgF < 10:
			$niveentOrgFinal = 'Nulo o despreciable';
			$colorentOrgFinal = 'azul';
			break;
		case $cEntOrgF >= 10 && $cEntOrgF < 14:
			$niveentOrgFinal = 'Bajo';
			$colorentOrgFinal = 'verde';
			break;
		case $cEntOrgF >= 14 && $cEntOrgF < 18:
			$niveentOrgFinal = 'Medio';
			$colorentOrgFinal = 'amarillo';
			break;
		case $cEntOrgF >= 18 && $cEntOrgF < 23:
			$niveentOrgFinal = 'Alto';
			$colorentOrgFinal = 'naranja';
			break;
			case $cEntOrgF >= 23:
			$niveentOrgFinal = 'Muy alto';
			$colorentOrgFinal = 'rojo';
			break;
		
		default:
			$niveentOrgFinal = 'No puede ser medido';
			$colorentOrgFinal = '';
			break;
	}


	$conUno -> close();


 ?>