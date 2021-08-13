<?php 

	$conCero = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

	$cs = $conCero -> query("SELECT SUM(p1_R2a+p2_R2a+p3_R2a+p4_R2a+p5_R2a+p6_R2a+p7_R2a+p8_R2a+p9_R2a+p10_R2a+p11_R2a+p12_R2a+p13_R2a+p14_R2a+p15_R2a+p16_R2a+p17_R2a+p18_R2a+p19_R2a+p20_R2a+p21_R2a+p22_R2a+p23_R2a+p24_R2a+p25_R2a+p26_R2a+p27_R2a+p28_R2a+p29_R2a+p30_R2a+p31_R2a+p32_R2a+p33_R2a+p34_R2a+p35_R2a+p36_R2a+p37_R2a+p38_R2a+p39_R2a+p40_R2a+p41_R2a+p42_R2a+p43_R2a+p44_R2a+p45_R2a+p46_R2a) AS cuantos, COUNT(codeMd5_R2a) AS CPersonas FROM nom035R2a");

	while ($nivelDeRiezgo = $cs->fetchArray()) {

		$cuantosCFinal=$nivelDeRiezgo['cuantos'];
		$CPersonasCFinal=$nivelDeRiezgo['CPersonas'];

	}

	//CALCULO CFINAL
	$cfinal = $cuantosCFinal/$CPersonasCFinal;


	$cfinal = round($cfinal,1, PHP_ROUND_HALF_UP);

	//EL RESULTADO DE CFINAL

	switch ($cfinal) {
		case $cfinal === null:
			$nivelcFinal = 'Nulo o despreciable';
			$colorcFinal = 'azul';
			break;
		case $cfinal < 20:
			$nivelcFinal = 'Nulo o despreciable';
			$colorcFinal = 'azul';
			break;
		case $cfinal >= 20 && $cfinal < 45:
			$nivelcFinal = 'Bajo';
			$colorcFinal = 'verde';
			break;
		case $cfinal >= 45 && $cfinal < 70:
			$nivelcFinal = 'Medio';
			$colorcFinal = 'amarillo';
			break;
		case $cfinal >= 70 && $cfinal < 90:
			$nivelcFinal = 'Alto';
			$colorcFinal = 'naranja';
			break;
			case $cfinal >= 90:
			$nivelcFinal = 'Muy alto';
			$colorcFinal = 'rojo';
			break;
		
		default:
			$nivelcFinal = 'No puede ser medido';
			$colorcFinal = '';
			break;
	}

	$conCero -> close();


 ?>