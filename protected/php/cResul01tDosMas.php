<?php 


	$cs = $conPorCentro -> query("SELECT SUM(p1_R2a+p2_R2a+p3_R2a+p4_R2a+p5_R2a+p6_R2a+p7_R2a+p8_R2a+p9_R2a+p10_R2a+p11_R2a+p12_R2a+p13_R2a+p14_R2a+p15_R2a+p16_R2a+p17_R2a+p18_R2a+p19_R2a+p20_R2a+p21_R2a+p22_R2a+p23_R2a+p24_R2a+p25_R2a+p26_R2a+p27_R2a+p28_R2a+p29_R2a+p30_R2a+p31_R2a+p32_R2a+p33_R2a+p34_R2a+p35_R2a+p36_R2a+p37_R2a+p38_R2a+p39_R2a+p40_R2a+p41_R2a+p42_R2a+p43_R2a+p44_R2a+p45_R2a+p46_R2a) AS cuantos, COUNT(codeMd5_R2a) AS CPersonas FROM nom035R2a");

	while ($nivelDeRiezgoMas = $cs->fetchArray()) {

		$cuantosCFinalMas=$nivelDeRiezgoMas['cuantos'];
		$CPersonasCFinalMas=$nivelDeRiezgoMas['CPersonas'];

	}

	//CALCULO CFINAL
	$cfinalMas = $cuantosCFinalMas/$CPersonasCFinalMas;


	$cfinalMas = round($cfinalMas,1, PHP_ROUND_HALF_UP);

	//EL RESULTADO DE CFINAL

	switch ($cfinalMas) {
		case $cfinalMas === null:
			$nivelcFinalMas = 'Nulo o despreciable';
			$colorcFinalMas = 'azul';
			break;
		case $cfinalMas < 20:
			$nivelcFinalMas = 'Nulo o despreciable';
			$colorcFinalMas = 'azul';
			break;
		case $cfinalMas >= 20 && $cfinalMas < 45:
			$nivelcFinalMas = 'Bajo';
			$colorcFinalMas = 'verde';
			break;
		case $cfinalMas >= 45 && $cfinalMas < 70:
			$nivelcFinalMas = 'Medio';
			$colorcFinalMas = 'amarillo';
			break;
		case $cfinalMas >= 70 && $cfinalMas < 90:
			$nivelcFinalMas = 'Alto';
			$colorcFinalMas = 'naranja';
			break;
			case $cfinalMas >= 90:
			$nivelcFinalMas = 'Muy alto';
			$colorcFinalMas = 'rojo';
			break;
		
		default:
			$nivelcFinalMas = 'No puede ser medido';
			$colorcFinalMas = '';
			break;
	}


 ?>