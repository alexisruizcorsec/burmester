<?php 

	$csDos = $conPorCentro -> query("SELECT SUM(p1_R3a+p2_R3a+p3_R3a+p4_R3a+p5_R3a) AS conAmbDeTrabajo, SUM(p6_R3a+p7_R3a+p8_R3a+p9_R3a+p10_R3a+p11_R3a+p12_R3a+p13_R3a+p14_R3a+p15_R3a+p16_R3a+p65_R3a+p66_R3a+p67_R3a+p68_R3a) AS cargaDeTrabajo, SUM(p23_R3a+p24_R3a+p25_R3a+p26_R3a+p27_R3a+p28_R3a+p29_R3a+p30_R3a+p35_R3a+p36_R3a) AS faltDeContTrab, SUM(p17_R3a+p18_R3a) AS jorDeTrab, SUM(p19_R3a+p20_R3a+p21_R3a+p22_R3a) AS interEnRelFam, SUM(p31_R3a+p32_R3a+p33_R3a+p34_R3a+p37_R3a+p38_R3a+p39_R3a+p40_R3a+p41_R3a) AS liderazgo, SUM(p42_R3a+p43_R3a+p44_R3a+p45_R3a+p46_R3a+p69_R3a+p70_R3a+p71_R3a+p72_R3a) AS relaEntreTrab, SUM(p57_R3a+p58_R3a+p59_R3a+p60_R3a+p61_R3a+p62_R3a+p63_R3a+p64_R3a) AS violencia, SUM(p47_R3a+p48_R3a+p49_R3a+p50_R3a+p51_R3a+p52_R3a) AS recoDesemp, SUM(p53_R3a+p54_R3a+p55_R3a+p56_R3a) AS sentPert, COUNT(codeMd5_R3a) AS CPersonas FROM nom035R3a WHERE dirEmpresa_R3a = '$dirEmpresa'");

	while ($nivelDeRiezgoMas = $csDos->fetchArray()) {

		$conAmbDeTrabajoCFinalMas=$nivelDeRiezgoMas['conAmbDeTrabajo'];
		$cargaDeTrabajoCFinalMas=$nivelDeRiezgoMas['cargaDeTrabajo'];
		$faltDeContTrabFinalMas=$nivelDeRiezgoMas['faltDeContTrab'];
		$jorDeTrabFinalMas=$nivelDeRiezgoMas['jorDeTrab'];
		$interEnRelFamFinalMas=$nivelDeRiezgoMas['interEnRelFam'];
		$liderazgoFinalMas=$nivelDeRiezgoMas['liderazgo'];
		$relaEntreTrabFinalMas=$nivelDeRiezgoMas['relaEntreTrab'];
		$violenciaFinalMas=$nivelDeRiezgoMas['violencia'];
		$recoDesempFinalMas=$nivelDeRiezgoMas['recoDesemp'];
		$sentPertFinalMas=$nivelDeRiezgoMas['sentPert'];

		$CPersonasCFinalMas=$nivelDeRiezgoMas['CPersonas'];

	}
	//CALCULO CFINAL
	$cConAmbDeTrabajoFMas = $conAmbDeTrabajoCFinalMas/$CPersonasCFinalMas;
	$cCarDeTrabFMas = $cargaDeTrabajoCFinalMas/$CPersonasCFinalMas;
	$cFaltDeContTrabFMas = $faltDeContTrabFinalMas/$CPersonasCFinalMas;
	$jorDeTrabFMas = $jorDeTrabFinalMas/$CPersonasCFinalMas;
	$interEnRelFamFMas = $interEnRelFamFinalMas/$CPersonasCFinalMas;
	$liderazgoFMas = $liderazgoFinalMas/$CPersonasCFinalMas;
	$relaEntreTrabFMas = $relaEntreTrabFinalMas/$CPersonasCFinalMas;
	$violenciaFMas = $violenciaFinalMas/$CPersonasCFinalMas;
	$recoDesempFMas = $recoDesempFinalMas/$CPersonasCFinalMas;
	$sentPertFMas = $sentPertFinalMas/$CPersonasCFinalMas;


	$cConAmbDeTrabajoFMas = round($cConAmbDeTrabajoFMas,1, PHP_ROUND_HALF_UP);
	$cCarDeTrabFMas = round($cCarDeTrabFMas,1, PHP_ROUND_HALF_UP);
	$cFaltDeContTrabFMas = round($cFaltDeContTrabFMas,1, PHP_ROUND_HALF_UP);
	$jorDeTrabFMas = round($jorDeTrabFMas,1, PHP_ROUND_HALF_UP);
	$interEnRelFamFMas = round($interEnRelFamFMas,1, PHP_ROUND_HALF_UP);
	$liderazgoFMas = round($liderazgoFMas,1, PHP_ROUND_HALF_UP);
	$relaEntreTrabFMas = round($relaEntreTrabFMas,1, PHP_ROUND_HALF_UP);
	$violenciaFMas = round($violenciaFMas,1, PHP_ROUND_HALF_UP);
	$recoDesempFMas = round($recoDesempFMas,1, PHP_ROUND_HALF_UP);
	$sentPertFMas = round($sentPertFMas,1, PHP_ROUND_HALF_UP);


	//EL RESULTADO DE cConAmbDeTrabajoF

	switch ($cConAmbDeTrabajoFMas) {
		case $cConAmbDeTrabajoFMas === null:
			$nivelCADeTracFinalMas = 'Nulo o despreciable';
			$colorCADeTracFinalMas = 'azul';
			break;
		case $cConAmbDeTrabajoFMas < 5:
			$nivelCADeTracFinalMas = 'Nulo o despreciable';
			$colorCADeTracFinalMas = 'azul';
			break;
		case $cConAmbDeTrabajoFMas >= 5 && $cConAmbDeTrabajoFMas < 9:
			$nivelCADeTracFinalMas = 'Bajo';
			$colorCADeTracFinalMas = 'verde';
			break;
		case $cConAmbDeTrabajoFMas >= 9 && $cConAmbDeTrabajoFMas < 11:
			$nivelCADeTracFinalMas = 'Medio';
			$colorCADeTracFinalMas = 'amarillo';
			break;
		case $cConAmbDeTrabajoFMas >= 11 && $cConAmbDeTrabajoFMas < 14:
			$nivelCADeTracFinalMas = 'Alto';
			$colorCADeTracFinalMas = 'naranja';
			break;
			case $cConAmbDeTrabajoFMas >= 14:
			$nivelCADeTracFinalMas = 'Muy alto';
			$colorCADeTracFinalMas = 'rojo';
			break;
		
		default:
			$nivelCADeTracFinalMas = 'No puede ser medido';
			$colorCADeTracFinalMas = '';
			break;
	}

	//EL RESULTADO DE cCarDeTrabF

	switch ($cCarDeTrabFMas) {
		case $cCarDeTrabFMas === null:
			$nivelcCarDeTrabFinalMas = 'Nulo o despreciable';
			$colorcCarDeTrabFinalMas = 'azul';
			break;
		case $cCarDeTrabFMas < 15:
			$nivelcCarDeTrabFinalMas = 'Nulo o despreciable';
			$colorcCarDeTrabFinalMas = 'azul';
			break;
		case $cCarDeTrabFMas >= 15 && $cCarDeTrabFMas < 21:
			$nivelcCarDeTrabFinalMas = 'Bajo';
			$colorcCarDeTrabFinalMas = 'verde';
			break;
		case $cCarDeTrabFMas >= 21 && $cCarDeTrabFMas < 27:
			$nivelcCarDeTrabFinalMas = 'Medio';
			$colorcCarDeTrabFinalMas = 'amarillo';
			break;
		case $cCarDeTrabFMas >= 27 && $cCarDeTrabFMas < 37:
			$nivelcCarDeTrabFinalMas = 'Alto';
			$colorcCarDeTrabFinalMas = 'naranja';
			break;
			case $cCarDeTrabFMas >= 37:
			$nivelcCarDeTrabFinalMas = 'Muy alto';
			$colorcCarDeTrabFinalMas = 'rojo';
			break;
		
		default:
			$nivelcCarDeTrabFinalMas = 'No puede ser medido';
			$colorcCarDeTrabFinalMas = '';
			break;
	}

	//EL RESULTADO DE cFaltDeContTrabF

	switch ($cFaltDeContTrabFMas) {
		case $cFaltDeContTrabFMas === null:
			$nivelfdeContTrabFinalMas = 'Nulo o despreciable';
			$colorfdeContTrabFinalMas = 'azul';
			break;
		case $cFaltDeContTrabFMas < 11:
			$nivelfdeContTrabFinalMas = 'Nulo o despreciable';
			$colorfdeContTrabFinalMas = 'azul';
			break;
		case $cFaltDeContTrabFMas >= 11 && $cFaltDeContTrabFMas < 16:
			$nivelfdeContTrabFinalMas = 'Bajo';
			$colorfdeContTrabFinalMas = 'verde';
			break;
		case $cFaltDeContTrabFMas >= 16 && $cFaltDeContTrabFMas < 21:
			$nivelfdeContTrabFinalMas = 'Medio';
			$colorfdeContTrabFinalMas = 'amarillo';
			break;
		case $cFaltDeContTrabFMas >= 21 && $cFaltDeContTrabFMas < 25:
			$nivelfdeContTrabFinalMas = 'Alto';
			$colorfdeContTrabFinalMas = 'naranja';
			break;
			case $cFaltDeContTrabFMas >= 25:
			$nivelfdeContTrabFinalMas = 'Muy alto';
			$colorfdeContTrabFinalMas = 'rojo';
			break;
		
		default:
			$nivelfdeContTrabFinalMas = 'No puede ser medido';
			$colorfdeContTrabFinalMas = '';
			break;
	}

	//EL RESULTADO DE jorDeTrabF

	switch ($jorDeTrabFMas) {
		case $jorDeTrabF === null:
			$niveljorDeTrabFinalMas = 'Nulo o despreciable';
			$colorjorDeTrabFinalMas = 'azul';
			break;
		case $jorDeTrabFMas < 1:
			$niveljorDeTrabFinalMas = 'Nulo o despreciable';
			$colorjorDeTrabFinalMas = 'azul';
			break;
		case $jorDeTrabFMas >= 1 && $jorDeTrabFMas < 2:
			$niveljorDeTrabFinalMas = 'Bajo';
			$colorjorDeTrabFinalMas = 'verde';
			break;
		case $jorDeTrabFMas >= 2 && $jorDeTrabFMas < 4:
			$niveljorDeTrabFinalMas = 'Medio';
			$colorjorDeTrabFinalMas = 'amarillo';
			break;
		case $jorDeTrabFMas >= 4 && $jorDeTrabFMas < 6:
			$niveljorDeTrabFinalMas = 'Alto';
			$colorjorDeTrabFinalMas = 'naranja';
			break;
			case $jorDeTrabFMas >= 6:
			$niveljorDeTrabFinalMas = 'Muy alto';
			$colorjorDeTrabFinalMas = 'rojo';
			break;
		
		default:
			$niveljorDeTrabFinalMas = 'No puede ser medido';
			$colorjorDeTrabFinalMas = '';
			break;
	}

	//EL RESULTADO DE interEnRelFamF

	switch ($interEnRelFamFMas) {
		case $interEnRelFamFMas === null:
			$nivelinterEnRelFamFMas = 'Nulo o despreciable';
			$colorinterEnRelFamFinalMas = 'azul';
			break;
		case $interEnRelFamFMas < 4:
			$nivelinterEnRelFamFMas = 'Nulo o despreciable';
			$colorinterEnRelFamFinalMas = 'azul';
			break;
		case $interEnRelFamFMas >= 4 && $interEnRelFamFMas < 6:
			$nivelinterEnRelFamFMas = 'Bajo';
			$colorinterEnRelFamFinalMas = 'verde';
			break;
		case $interEnRelFamFMas >= 6 && $interEnRelFamFMas < 8:
			$nivelinterEnRelFamFMas = 'Medio';
			$colorinterEnRelFamFinalMas = 'amarillo';
			break;
		case $interEnRelFamFMas >= 8 && $interEnRelFamFMas < 10:
			$nivelinterEnRelFamFMas = 'Alto';
			$colorinterEnRelFamFinalMas = 'naranja';
			break;
			case $interEnRelFamFMas >= 10:
			$nivelinterEnRelFamFMas = 'Muy alto';
			$colorinterEnRelFamFinalMas = 'rojo';
			break;
		
		default:
			$nivelinterEnRelFamFMas = 'No puede ser medido';
			$colorinterEnRelFamFinalMas = '';
			break;
	}

	//EL RESULTADO DE liderazgoF

	switch ($liderazgoFMas) {
		case $liderazgoFMas === null:
			$nivelliderazgoFMas = 'Nulo o despreciable';
			$colorliderazgoFinalMas = 'azul';
			break;
		case $liderazgoFMas < 9:
			$nivelliderazgoFMas = 'Nulo o despreciable';
			$colorliderazgoFinalMas = 'azul';
			break;
		case $liderazgoFMas >= 9 && $liderazgoFMas < 12:
			$nivelliderazgoFMas = 'Bajo';
			$colorliderazgoFinalMas = 'verde';
			break;
		case $liderazgoFMas >= 12 && $liderazgoFMas < 16:
			$nivelliderazgoFMas = 'Medio';
			$colorliderazgoFinalMas = 'amarillo';
			break;
		case $liderazgoFMas >= 16 && $liderazgoFMas < 20:
			$nivelliderazgoFMas = 'Alto';
			$colorliderazgoFinalMas = 'naranja';
			break;
			case $liderazgoFMas >= 20:
			$nivelliderazgoFMas = 'Muy alto';
			$colorliderazgoFinalMas = 'rojo';
			break;
		
		default:
			$nivelliderazgoFMas = 'No puede ser medido';
			$colorliderazgoFinalMas = '';
			break;
	}

	//EL RESULTADO DE relaEntreTrabF

	switch ($relaEntreTrabFMas) {
		case $relaEntreTrabFMas === null:
			$nivelrelaEnTrabFMas = 'Nulo o despreciable';
			$colorrelaEnTrabFinalMas = 'azul';
			break;
		case $relaEntreTrabFMas < 10:
			$nivelrelaEnTrabFMas = 'Nulo o despreciable';
			$colorrelaEnTrabFinalMas = 'azul';
			break;
		case $relaEntreTrabFMas >= 10 && $relaEntreTrabFMas < 13:
			$nivelrelaEnTrabFMas = 'Bajo';
			$colorrelaEnTrabFinalMas = 'verde';
			break;
		case $relaEntreTrabFMas >= 13 && $relaEntreTrabFMas < 17:
			$nivelrelaEnTrabFMas = 'Medio';
			$colorrelaEnTrabFinalMas = 'amarillo';
			break;
		case $relaEntreTrabFMas >= 17 && $relaEntreTrabFMas < 21:
			$nivelrelaEnTrabFMas = 'Alto';
			$colorrelaEnTrabFinalMas = 'naranja';
			break;
			case $relaEntreTrabFMas >= 21:
			$nivelrelaEnTrabFMas = 'Muy alto';
			$colorrelaEnTrabFinalMas = 'rojo';
			break;
		
		default:
			$nivelrelaEnTrabFMas = 'No puede ser medido';
			$colorrelaEnTrabFinalMas = '';
			break;
	}


	//EL RESULTADO DE violenciaF

	switch ($violenciaFMas) {
		case $violenciaFMas === null:
			$nivelviolenciaFMas = 'Nulo o despreciable';
			$colorviolenciaFinalMas = 'azul';
			break;
		case $violenciaFMas < 7:
			$nivelviolenciaFMas = 'Nulo o despreciable';
			$colorviolenciaFinalMas = 'azul';
			break;
		case $violenciaFMas >= 7 && $violenciaFMas < 10:
			$nivelviolenciaFMas = 'Bajo';
			$colorviolenciaFinalMas = 'verde';
			break;
		case $violenciaFMas >= 10 && $violenciaFMas < 13:
			$nivelviolenciaFMas = 'Medio';
			$colorviolenciaFinalMas = 'amarillo';
			break;
		case $violenciaFMas >= 13 && $violenciaFMas < 16:
			$nivelviolenciaFMas = 'Alto';
			$colorviolenciaFinalMas = 'naranja';
			break;
			case $violenciaFMas >= 16:
			$nivelviolenciaFMas = 'Muy alto';
			$colorviolenciaFinalMas = 'rojo';
			break;
		
		default:
			$nivelviolenciaFMas = 'No puede ser medido';
			$colorviolenciaFinalMas = '';
			break;
	}


	//EL RESULTADO DE recoDesempF

	switch ($recoDesempFMas) {
		case $recoDesempFMas === null:
			$nivelrecoDesempFMas = 'Nulo o despreciable';
			$colorrecoDesempFinalMas = 'azul';
			break;
		case $recoDesempFMas < 6:
			$nivelrecoDesempFMas = 'Nulo o despreciable';
			$colorrecoDesempFinalMas = 'azul';
			break;
		case $recoDesempFMas >= 6 && $recoDesempFMas < 10:
			$nivelrecoDesempFMas = 'Bajo';
			$colorrecoDesempFinalMas = 'verde';
			break;
		case $recoDesempFMas >= 10 && $recoDesempFMas < 14:
			$nivelrecoDesempFMas = 'Medio';
			$colorrecoDesempFinalMas = 'amarillo';
			break;
		case $recoDesempFMas >= 14 && $recoDesempFMas < 18:
			$nivelrecoDesempFMas = 'Alto';
			$colorrecoDesempFinalMas = 'naranja';
			break;
			case $recoDesempFMas >= 18:
			$nivelrecoDesempFMas = 'Muy alto';
			$colorrecoDesempFinalMas = 'rojo';
			break;
		
		default:
			$nivelrecoDesempFMas = 'No puede ser medido';
			$colorrecoDesempFinalMas = '';
			break;
	}

	//EL RESULTADO DE sentPertF

	switch ($sentPertFMas) {
		case $sentPertFMas === null:
			$nivelsentPertFMas = 'Nulo o despreciable';
			$colorsentPertFinalMas = 'azul';
			break;
		case $sentPertFMas < 4:
			$nivelsentPertFMas = 'Nulo o despreciable';
			$colorsentPertFinalMas = 'azul';
			break;
		case $sentPertFMas >= 4 && $sentPertFMas < 6:
			$nivelsentPertFMas = 'Bajo';
			$colorsentPertFinalMas = 'verde';
			break;
		case $sentPertFMas >= 6 && $sentPertFMas < 8:
			$nivelsentPertFMas = 'Medio';
			$colorsentPertFinalMas = 'amarillo';
			break;
		case $sentPertFMas >= 8 && $sentPertFMas < 10:
			$nivelsentPertFMas = 'Alto';
			$colorsentPertFinalMas = 'naranja';
			break;
			case $sentPertFMas >= 10:
			$nivelsentPertFMas = 'Muy alto';
			$colorsentPertFinalMas = 'rojo';
			break;
		
		default:
			$nivelsentPertFMas = 'No puede ser medido';
			$colorsentPertFinalMas = '';
			break;
	}




 ?>