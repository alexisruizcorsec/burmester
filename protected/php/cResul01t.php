<?php 

	$conCero = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

	$cs = $conCero -> query("SELECT SUM(p1_R3a+p2_R3a+p3_R3a+p4_R3a+p5_R3a+p6_R3a+p7_R3a+p8_R3a+p9_R3a+p10_R3a+p11_R3a+p12_R3a+p13_R3a+p14_R3a+p15_R3a+p16_R3a+p17_R3a+p18_R3a+p19_R3a+p20_R3a+p21_R3a+p22_R3a+p23_R3a+p24_R3a+p25_R3a+p26_R3a+p27_R3a+p28_R3a+p29_R3a+p30_R3a+p31_R3a+p32_R3a+p33_R3a+p34_R3a+p35_R3a+p36_R3a+p37_R3a+p38_R3a+p39_R3a+p40_R3a+p41_R3a+p42_R3a+p43_R3a+p44_R3a+p45_R3a+p46_R3a+p47_R3a+p48_R3a+p49_R3a+p50_R3a+p51_R3a+p52_R3a+p53_R3a+p54_R3a+p55_R3a+p56_R3a+p57_R3a+p58_R3a+p59_R3a+p60_R3a+p61_R3a+p62_R3a+p63_R3a+p64_R3a+p65_R3a+p66_R3a+p67_R3a+p68_R3a+p69_R3a+p70_R3a+p71_R3a+p72_R3a) AS cuantos, COUNT(codeMd5_R3a) AS CPersonas FROM nom035R3a");

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
		case $cfinal < 50:
			$nivelcFinal = 'Nulo o despreciable';
			$colorcFinal = 'azul';
			break;
		case $cfinal >= 50 && $cfinal < 75:
			$nivelcFinal = 'Bajo';
			$colorcFinal = 'verde';
			break;
		case $cfinal >= 75 && $cfinal < 99:
			$nivelcFinal = 'Medio';
			$colorcFinal = 'amarillo';
			break;
		case $cfinal >= 99 && $cfinal < 140:
			$nivelcFinal = 'Alto';
			$colorcFinal = 'naranja';
			break;
			case $cfinal >= 140:
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