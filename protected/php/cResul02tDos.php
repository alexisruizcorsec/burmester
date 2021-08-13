<?php 

	$conUno = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

	$cs = $conUno -> query("SELECT SUM(p1_R2a+p2_R2a+p3_R2a) AS ambDeTrabajo, SUM(p4_R2a+p5_R2a+p6_R2a+p7_R2a+p8_R2a+p9_R2a+p10_R2a+p11_R2a+p12_R2a+p13_R2a+p18_R2a+p19_R2a+p20_R2a+p21_R2a+p22_R2a+p26_R2a+p27_R2a+p41_R2a+p42_R2a+p43_R2a) AS fPropDeAct, SUM(p14_R2a+p15_R2a+p16_R2a+p17_R2a) AS orgTimpDeTrabajo, SUM(p23_R2a+p24_R2a+p25_R2a+p28_R2a+p29_R2a+p30_R2a+p31_R2a+p32_R2a+p33_R2a+p34_R2a+p35_R2a+p36_R2a+p37_R2a+p38_R2a+p39_R2a+p40_R2a+p44_R2a+p45_R2a+p46_R2a) AS lidRelTrabajo, COUNT(codeMd5_R2a) AS CPersonasAmbDeTra FROM nom035R2a");

	while ($nivelDeRiezgo = $cs->fetchArray()) {

		$ambDeTrabajoCFinal=$nivelDeRiezgo['ambDeTrabajo'];
		$fPropDeActCFinal=$nivelDeRiezgo['fPropDeAct'];
		$orgTimptCFinal=$nivelDeRiezgo['orgTimpDeTrabajo'];
		$lidRelCFinal=$nivelDeRiezgo['lidRelTrabajo'];
		$CPersonasAmbDeTraCFinal=$nivelDeRiezgo['CPersonasAmbDeTra'];

	}

	//CALCULO CFINAL
	$cAmbDeTrabajoF = $ambDeTrabajoCFinal/$CPersonasAmbDeTraCFinal;
	$cfPropdeActF = $fPropDeActCFinal/$CPersonasAmbDeTraCFinal;
	$orgTimptF = $orgTimptCFinal/$CPersonasAmbDeTraCFinal;
	$lidRelCF = $lidRelCFinal/$CPersonasAmbDeTraCFinal;


	$cAmbDeTrabajoF = round($cAmbDeTrabajoF,1, PHP_ROUND_HALF_UP);
	$cfPropdeActF = round($cfPropdeActF,1, PHP_ROUND_HALF_UP);
	$orgTimptF = round($orgTimptF,1, PHP_ROUND_HALF_UP);
	$lidRelCF = round($lidRelCF,1, PHP_ROUND_HALF_UP);

	//EL RESULTADO DE CFINAL

	switch ($cAmbDeTrabajoF) {
		case $cAmbDeTrabajoF === 0:
			$nivelADeTracFinal = 'Nulo o despreciable';
			$colorADeTracFinal = 'azul';
			break;
		case $cAmbDeTrabajoF < 3:
			$nivelADeTracFinal = 'Nulo o despreciable';
			$colorADeTracFinal = 'azul';
			break;
		case $cAmbDeTrabajoF >= 3 && $cAmbDeTrabajoF < 5:
			$nivelADeTracFinal = 'Bajo';
			$colorADeTracFinal = 'verde';
			break;
		case $cAmbDeTrabajoF >= 5 && $cAmbDeTrabajoF < 7:
			$nivelADeTracFinal = 'Medio';
			$colorADeTracFinal = 'amarillo';
			break;
		case $cAmbDeTrabajoF >= 7 && $cAmbDeTrabajoF < 9:
			$nivelADeTracFinal = 'Alto';
			$colorADeTracFinal = 'naranja';
			break;
			case $cAmbDeTrabajoF >= 9:
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
		case $cfPropdeActF < 10:
			$nivelcfpTracFinal = 'Nulo o despreciable';
			$colorcfpTracFinal = 'azul';
			break;
		case $cfPropdeActF >= 10 && $cfPropdeActF < 20:
			$nivelcfpTracFinal = 'Bajo';
			$colorcfpTracFinal = 'verde';
			break;
		case $cfPropdeActF >= 20 && $cfPropdeActF < 30:
			$nivelcfpTracFinal = 'Medio';
			$colorcfpTracFinal = 'amarillo';
			break;
		case $cfPropdeActF >= 30 && $cfPropdeActF < 40:
			$nivelcfpTracFinal = 'Alto';
			$colorcfpTracFinal = 'naranja';
			break;
			case $cfPropdeActF >= 40:
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
		case $orgTimptF < 4:
			$nivelorgTFinal = 'Nulo o despreciable';
			$colororgTFinal = 'azul';
			break;
		case $orgTimptF >= 4 && $orgTimptF < 6:
			$nivelorgTFinal = 'Bajo';
			$colororgTFinal = 'verde';
			break;
		case $orgTimptF >= 6 && $orgTimptF < 9:
			$nivelorgTFinal = 'Medio';
			$colororgTFinal = 'amarillo';
			break;
		case $orgTimptF >= 9 && $orgTimptF < 12:
			$nivelorgTFinal = 'Alto';
			$colororgTFinal = 'naranja';
			break;
			case $orgTimptF >= 12:
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
		case $lidRelCF < 10:
			$nivelidRelFinal = 'Nulo o despreciable';
			$colorlidRelFinal = 'azul';
			break;
		case $lidRelCF >= 10 && $lidRelCF < 18:
			$nivelidRelFinal = 'Bajo';
			$colorlidRelFinal = 'verde';
			break;
		case $lidRelCF >= 18 && $lidRelCF < 28:
			$nivelidRelFinal = 'Medio';
			$colorlidRelFinal = 'amarillo';
			break;
		case $lidRelCF >= 28 && $lidRelCF < 38:
			$nivelidRelFinal = 'Alto';
			$colorlidRelFinal = 'naranja';
			break;
			case $lidRelCF >= 38:
			$nivelidRelFinal = 'Muy alto';
			$colorlidRelFinal = 'rojo';
			break;
		
		default:
			$nivelidRelFinal = 'No puede ser medido';
			$colorlidRelFinal = '';
			break;
	}




	$conUno -> close();


 ?>