<?php 


	$cs = $conPorCentro -> query("SELECT usrNombre_R3a, SUM(p1_R3a+p2_R3a+p3_R3a+p4_R3a+p5_R3a+p6_R3a+p7_R3a+p8_R3a+p9_R3a+p10_R3a+p11_R3a+p12_R3a+p13_R3a+p14_R3a+p15_R3a+p16_R3a+p17_R3a+p18_R3a+p19_R3a+p20_R3a+p21_R3a+p22_R3a+p23_R3a+p24_R3a+p25_R3a+p26_R3a+p27_R3a+p28_R3a+p29_R3a+p30_R3a+p31_R3a+p32_R3a+p33_R3a+p34_R3a+p35_R3a+p36_R3a+p37_R3a+p38_R3a+p39_R3a+p40_R3a+p41_R3a+p42_R3a+p43_R3a+p44_R3a+p45_R3a+p46_R3a+p47_R3a+p48_R3a+p49_R3a+p50_R3a+p51_R3a+p52_R3a+p53_R3a+p54_R3a+p55_R3a+p56_R3a+p57_R3a+p58_R3a+p59_R3a+p60_R3a+p61_R3a+p62_R3a+p63_R3a+p64_R3a+p65_R3a+p66_R3a+p67_R3a+p68_R3a+p69_R3a+p70_R3a+p71_R3a+p72_R3a) AS cuantos, COUNT(codeMd5_R3a) AS CPersonas FROM nom035R3a WHERE usrNombre_R3a = '$usrNombre' ");

		while ($nivelDeRiezgo = $cs->fetchArray()) {

			$cuantosCFinalMas=$nivelDeRiezgo['cuantos'];
			$CPersonasCFinalMas=$nivelDeRiezgo['CPersonas'];

		}

		//CALCULO CFINAL
		$cfinalMas = $cuantosCFinalMas/$CPersonasCFinalMas;

		$cfinalMas = round($cfinalMas,1, PHP_ROUND_HALF_UP);

		//EL RESULTADO DE CFINALMas

		switch ($cfinalMas) {
			case $cfinalMas === null:
				$nivelcFinalMas = 'Nulo o despreciable';
				$colorcFinalMas = 'azul';
				break;
			case $cfinalMas < 50:
				$nivelcFinalMas = 'Nulo o despreciable';
				$colorcFinalMas = 'azul';
				break;
			case $cfinalMas >= 50 && $cfinalMas < 75:
				$nivelcFinalMas = 'Bajo';
				$colorcFinalMas = 'verde';
				break;
			case $cfinalMas >= 75 && $cfinalMas < 99:
				$nivelcFinalMas = 'Medio';
				$colorcFinalMas = 'amarillo';
				break;
			case $cfinalMas >= 99 && $cfinalMas < 140:
				$nivelcFinalMas = 'Alto';
				$colorcFinalMas = 'naranja';
				break;
				case $cfinalMas >= 140:
				$nivelcFinalMas = 'Muy alto';
				$colorcFinalMas = 'rojo';
				break;
			
			default:
				$nivelcFinalMas = 'No puede ser medido';
				$colorcFinalMas = '';
				break;
		}


 ?>