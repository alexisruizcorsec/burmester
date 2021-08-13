<?php 

	$conDos = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

	$cs = $conDos -> query("SELECT SUM(p1_R3a+p2_R3a+p3_R3a+p4_R3a+p5_R3a) AS conAmbDeTrabajo, SUM(p6_R3a+p7_R3a+p8_R3a+p9_R3a+p10_R3a+p11_R3a+p12_R3a+p13_R3a+p14_R3a+p15_R3a+p16_R3a+p65_R3a+p66_R3a+p67_R3a+p68_R3a) AS cargaDeTrabajo, SUM(p23_R3a+p24_R3a+p25_R3a+p26_R3a+p27_R3a+p28_R3a+p29_R3a+p30_R3a+p35_R3a+p36_R3a) AS faltDeContTrab, SUM(p17_R3a+p18_R3a) AS jorDeTrab, SUM(p19_R3a+p20_R3a+p21_R3a+p22_R3a) AS interEnRelFam, SUM(p31_R3a+p32_R3a+p33_R3a+p34_R3a+p37_R3a+p38_R3a+p39_R3a+p40_R3a+p41_R3a) AS liderazgo, SUM(p42_R3a+p43_R3a+p44_R3a+p45_R3a+p46_R3a+p69_R3a+p70_R3a+p71_R3a+p72_R3a) AS relaEntreTrab, SUM(p57_R3a+p58_R3a+p59_R3a+p60_R3a+p61_R3a+p62_R3a+p63_R3a+p64_R3a) AS violencia, SUM(p47_R3a+p48_R3a+p49_R3a+p50_R3a+p51_R3a+p52_R3a) AS recoDesemp, SUM(p53_R3a+p54_R3a+p55_R3a+p56_R3a) AS sentPert, COUNT(codeMd5_R3a) AS CPersonas FROM nom035R3a");

	while ($nivelDeRiezgo = $cs->fetchArray()) {

		$conAmbDeTrabajoCFinal=$nivelDeRiezgo['conAmbDeTrabajo'];
		$cargaDeTrabajoCFinal=$nivelDeRiezgo['cargaDeTrabajo'];
		$faltDeContTrabFinal=$nivelDeRiezgo['faltDeContTrab'];
		$jorDeTrabFinal=$nivelDeRiezgo['jorDeTrab'];
		$interEnRelFamFinal=$nivelDeRiezgo['interEnRelFam'];
		$liderazgoFinal=$nivelDeRiezgo['liderazgo'];
		$relaEntreTrabFinal=$nivelDeRiezgo['relaEntreTrab'];
		$violenciaFinal=$nivelDeRiezgo['violencia'];
		$recoDesempFinal=$nivelDeRiezgo['recoDesemp'];
		$sentPertFinal=$nivelDeRiezgo['sentPert'];

		$CPersonasCFinal=$nivelDeRiezgo['CPersonas'];

	}
	//CALCULO CFINAL
	$cConAmbDeTrabajoF = $conAmbDeTrabajoCFinal/$CPersonasCFinal;
	$cCarDeTrabF = $cargaDeTrabajoCFinal/$CPersonasCFinal;
	$cFaltDeContTrabF = $faltDeContTrabFinal/$CPersonasCFinal;
	$jorDeTrabF = $jorDeTrabFinal/$CPersonasCFinal;
	$interEnRelFamF = $interEnRelFamFinal/$CPersonasCFinal;
	$liderazgoF = $liderazgoFinal/$CPersonasCFinal;
	$relaEntreTrabF = $relaEntreTrabFinal/$CPersonasCFinal;
	$violenciaF = $violenciaFinal/$CPersonasCFinal;
	$recoDesempF = $recoDesempFinal/$CPersonasCFinal;
	$sentPertF = $sentPertFinal/$CPersonasCFinal;


	$cConAmbDeTrabajoF = round($cConAmbDeTrabajoF,1, PHP_ROUND_HALF_UP);
	$cCarDeTrabF = round($cCarDeTrabF,1, PHP_ROUND_HALF_UP);
	$cFaltDeContTrabF = round($cFaltDeContTrabF,1, PHP_ROUND_HALF_UP);
	$jorDeTrabF = round($jorDeTrabF,1, PHP_ROUND_HALF_UP);
	$interEnRelFamF = round($interEnRelFamF,1, PHP_ROUND_HALF_UP);
	$liderazgoF = round($liderazgoF,1, PHP_ROUND_HALF_UP);
	$relaEntreTrabF = round($relaEntreTrabF,1, PHP_ROUND_HALF_UP);
	$violenciaF = round($violenciaF,1, PHP_ROUND_HALF_UP);
	$recoDesempF = round($recoDesempF,1, PHP_ROUND_HALF_UP);
	$sentPertF = round($sentPertF,1, PHP_ROUND_HALF_UP);


	//EL RESULTADO DE cConAmbDeTrabajoF

	switch ($cConAmbDeTrabajoF) {
		case $cConAmbDeTrabajoF === null:
			$nivelCADeTracFinal = 'Nulo o despreciable';
			$colorCADeTracFinal = 'azul';
			break;
		case $cConAmbDeTrabajoF < 5:
			$nivelCADeTracFinal = 'Nulo o despreciable';
			$colorCADeTracFinal = 'azul';
			break;
		case $cConAmbDeTrabajoF >= 5 && $cConAmbDeTrabajoF < 9:
			$nivelCADeTracFinal = 'Bajo';
			$colorCADeTracFinal = 'verde';
			break;
		case $cConAmbDeTrabajoF >= 9 && $cConAmbDeTrabajoF < 11:
			$nivelCADeTracFinal = 'Medio';
			$colorCADeTracFinal = 'amarillo';
			break;
		case $cConAmbDeTrabajoF >= 11 && $cConAmbDeTrabajoF < 14:
			$nivelCADeTracFinal = 'Alto';
			$colorCADeTracFinal = 'naranja';
			break;
			case $cConAmbDeTrabajoF >= 14:
			$nivelCADeTracFinal = 'Muy alto';
			$colorCADeTracFinal = 'rojo';
			break;
		
		default:
			$nivelCADeTracFinal = 'No puede ser medido';
			$colorCADeTracFinal = '';
			break;
	}

	//EL RESULTADO DE cCarDeTrabF

	switch ($cCarDeTrabF) {
		case $cCarDeTrabF === null:
			$nivelcCarDeTrabFinal = 'Nulo o despreciable';
			$colorcCarDeTrabFinal = 'azul';
			break;
		case $cCarDeTrabF < 15:
			$nivelcCarDeTrabFinal = 'Nulo o despreciable';
			$colorcCarDeTrabFinal = 'azul';
			break;
		case $cCarDeTrabF >= 15 && $cCarDeTrabF < 21:
			$nivelcCarDeTrabFinal = 'Bajo';
			$colorcCarDeTrabFinal = 'verde';
			break;
		case $cCarDeTrabF >= 21 && $cCarDeTrabF < 27:
			$nivelcCarDeTrabFinal = 'Medio';
			$colorcCarDeTrabFinal = 'amarillo';
			break;
		case $cCarDeTrabF >= 27 && $cCarDeTrabF < 37:
			$nivelcCarDeTrabFinal = 'Alto';
			$colorcCarDeTrabFinal = 'naranja';
			break;
			case $cCarDeTrabF >= 37:
			$nivelcCarDeTrabFinal = 'Muy alto';
			$colorcCarDeTrabFinal = 'rojo';
			break;
		
		default:
			$nivelcCarDeTrabFinal = 'No puede ser medido';
			$colorcCarDeTrabFinal = '';
			break;
	}

	//EL RESULTADO DE cFaltDeContTrabF

	switch ($cFaltDeContTrabF) {
		case $cFaltDeContTrabF === null:
			$nivelfdeContTrabFinal = 'Nulo o despreciable';
			$colorfdeContTrabFinal = 'azul';
			break;
		case $cFaltDeContTrabF < 11:
			$nivelfdeContTrabFinal = 'Nulo o despreciable';
			$colorfdeContTrabFinal = 'azul';
			break;
		case $cFaltDeContTrabF >= 11 && $cFaltDeContTrabF < 16:
			$nivelfdeContTrabFinal = 'Bajo';
			$colorfdeContTrabFinal = 'verde';
			break;
		case $cFaltDeContTrabF >= 16 && $cFaltDeContTrabF < 21:
			$nivelfdeContTrabFinal = 'Medio';
			$colorfdeContTrabFinal = 'amarillo';
			break;
		case $cFaltDeContTrabF >= 21 && $cFaltDeContTrabF < 25:
			$nivelfdeContTrabFinal = 'Alto';
			$colorfdeContTrabFinal = 'naranja';
			break;
			case $cFaltDeContTrabF >= 25:
			$nivelfdeContTrabFinal = 'Muy alto';
			$colorfdeContTrabFinal = 'rojo';
			break;
		
		default:
			$nivelfdeContTrabFinal = 'No puede ser medido';
			$colorfdeContTrabFinal = '';
			break;
	}

	//EL RESULTADO DE jorDeTrabF

	switch ($jorDeTrabF) {
		case $jorDeTrabF === null:
			$niveljorDeTrabFinal = 'Nulo o despreciable';
			$colorjorDeTrabFinal = 'azul';
			break;
		case $jorDeTrabF < 1:
			$niveljorDeTrabFinal = 'Nulo o despreciable';
			$colorjorDeTrabFinal = 'azul';
			break;
		case $jorDeTrabF >= 1 && $jorDeTrabF < 2:
			$niveljorDeTrabFinal = 'Bajo';
			$colorjorDeTrabFinal = 'verde';
			break;
		case $jorDeTrabF >= 2 && $jorDeTrabF < 4:
			$niveljorDeTrabFinal = 'Medio';
			$colorjorDeTrabFinal = 'amarillo';
			break;
		case $jorDeTrabF >= 4 && $jorDeTrabF < 6:
			$niveljorDeTrabFinal = 'Alto';
			$colorjorDeTrabFinal = 'naranja';
			break;
			case $jorDeTrabF >= 6:
			$niveljorDeTrabFinal = 'Muy alto';
			$colorjorDeTrabFinal = 'rojo';
			break;
		
		default:
			$niveljorDeTrabFinal = 'No puede ser medido';
			$colorjorDeTrabFinal = '';
			break;
	}

	//EL RESULTADO DE interEnRelFamF

	switch ($interEnRelFamF) {
		case $interEnRelFamF === null:
			$nivelinterEnRelFamF = 'Nulo o despreciable';
			$colorinterEnRelFamFinal = 'azul';
			break;
		case $interEnRelFamF < 4:
			$nivelinterEnRelFamF = 'Nulo o despreciable';
			$colorinterEnRelFamFinal = 'azul';
			break;
		case $interEnRelFamF >= 4 && $interEnRelFamF < 6:
			$nivelinterEnRelFamF = 'Bajo';
			$colorinterEnRelFamFinal = 'verde';
			break;
		case $interEnRelFamF >= 6 && $interEnRelFamF < 8:
			$nivelinterEnRelFamF = 'Medio';
			$colorinterEnRelFamFinal = 'amarillo';
			break;
		case $interEnRelFamF >= 8 && $interEnRelFamF < 10:
			$nivelinterEnRelFamF = 'Alto';
			$colorinterEnRelFamFinal = 'naranja';
			break;
			case $interEnRelFamF >= 10:
			$nivelinterEnRelFamF = 'Muy alto';
			$colorinterEnRelFamFinal = 'rojo';
			break;
		
		default:
			$nivelinterEnRelFamF = 'No puede ser medido';
			$colorinterEnRelFamFinal = '';
			break;
	}

	//EL RESULTADO DE liderazgoF

	switch ($liderazgoF) {
		case $liderazgoF === null:
			$nivelliderazgoF = 'Nulo o despreciable';
			$colorliderazgoFinal = 'azul';
			break;
		case $liderazgoF < 9:
			$nivelliderazgoF = 'Nulo o despreciable';
			$colorliderazgoFinal = 'azul';
			break;
		case $liderazgoF >= 9 && $liderazgoF < 12:
			$nivelliderazgoF = 'Bajo';
			$colorliderazgoFinal = 'verde';
			break;
		case $liderazgoF >= 12 && $liderazgoF < 16:
			$nivelliderazgoF = 'Medio';
			$colorliderazgoFinal = 'amarillo';
			break;
		case $liderazgoF >= 16 && $liderazgoF < 20:
			$nivelliderazgoF = 'Alto';
			$colorliderazgoFinal = 'naranja';
			break;
			case $liderazgoF >= 20:
			$nivelliderazgoF = 'Muy alto';
			$colorliderazgoFinal = 'rojo';
			break;
		
		default:
			$nivelliderazgoF = 'No puede ser medido';
			$colorliderazgoFinal = '';
			break;
	}

	//EL RESULTADO DE relaEntreTrabF

	switch ($relaEntreTrabF) {
		case $relaEntreTrabF === null:
			$nivelrelaEnTrabF = 'Nulo o despreciable';
			$colorrelaEnTrabFinal = 'azul';
			break;
		case $relaEntreTrabF < 10:
			$nivelrelaEnTrabF = 'Nulo o despreciable';
			$colorrelaEnTrabFinal = 'azul';
			break;
		case $relaEntreTrabF >= 10 && $relaEntreTrabF < 13:
			$nivelrelaEnTrabF = 'Bajo';
			$colorrelaEnTrabFinal = 'verde';
			break;
		case $relaEntreTrabF >= 13 && $relaEntreTrabF < 17:
			$nivelrelaEnTrabF = 'Medio';
			$colorrelaEnTrabFinal = 'amarillo';
			break;
		case $relaEntreTrabF >= 17 && $relaEntreTrabF < 21:
			$nivelrelaEnTrabF = 'Alto';
			$colorrelaEnTrabFinal = 'naranja';
			break;
			case $relaEntreTrabF >= 21:
			$nivelrelaEnTrabF = 'Muy alto';
			$colorrelaEnTrabFinal = 'rojo';
			break;
		
		default:
			$nivelrelaEnTrabF = 'No puede ser medido';
			$colorrelaEnTrabFinal = '';
			break;
	}


	//EL RESULTADO DE violenciaF

	switch ($violenciaF) {
		case $violenciaF === null:
			$nivelviolenciaF = 'Nulo o despreciable';
			$colorviolenciaFinal = 'azul';
			break;
		case $violenciaF < 7:
			$nivelviolenciaF = 'Nulo o despreciable';
			$colorviolenciaFinal = 'azul';
			break;
		case $violenciaF >= 7 && $violenciaF < 10:
			$nivelviolenciaF = 'Bajo';
			$colorviolenciaFinal = 'verde';
			break;
		case $violenciaF >= 10 && $violenciaF < 13:
			$nivelviolenciaF = 'Medio';
			$colorviolenciaFinal = 'amarillo';
			break;
		case $violenciaF >= 13 && $violenciaF < 16:
			$nivelviolenciaF = 'Alto';
			$colorviolenciaFinal = 'naranja';
			break;
			case $violenciaF >= 16:
			$nivelviolenciaF = 'Muy alto';
			$colorviolenciaFinal = 'rojo';
			break;
		
		default:
			$nivelviolenciaF = 'No puede ser medido';
			$colorviolenciaFinal = '';
			break;
	}


	//EL RESULTADO DE recoDesempF

	switch ($recoDesempF) {
		case $recoDesempF === null:
			$nivelrecoDesempF = 'Nulo o despreciable';
			$colorrecoDesempFinal = 'azul';
			break;
		case $recoDesempF < 6:
			$nivelrecoDesempF = 'Nulo o despreciable';
			$colorrecoDesempFinal = 'azul';
			break;
		case $recoDesempF >= 6 && $recoDesempF < 10:
			$nivelrecoDesempF = 'Bajo';
			$colorrecoDesempFinal = 'verde';
			break;
		case $recoDesempF >= 10 && $recoDesempF < 14:
			$nivelrecoDesempF = 'Medio';
			$colorrecoDesempFinal = 'amarillo';
			break;
		case $recoDesempF >= 14 && $recoDesempF < 18:
			$nivelrecoDesempF = 'Alto';
			$colorrecoDesempFinal = 'naranja';
			break;
			case $recoDesempF >= 18:
			$nivelrecoDesempF = 'Muy alto';
			$colorrecoDesempFinal = 'rojo';
			break;
		
		default:
			$nivelrecoDesempF = 'No puede ser medido';
			$colorrecoDesempFinal = '';
			break;
	}

	//EL RESULTADO DE sentPertF

	switch ($sentPertF) {
		case $sentPertF === null:
			$nivelsentPertF = 'Nulo o despreciable';
			$colorsentPertFinal = 'azul';
			break;
		case $sentPertF < 4:
			$nivelsentPertF = 'Nulo o despreciable';
			$colorsentPertFinal = 'azul';
			break;
		case $sentPertF >= 4 && $sentPertF < 6:
			$nivelsentPertF = 'Bajo';
			$colorsentPertFinal = 'verde';
			break;
		case $sentPertF >= 6 && $sentPertF < 8:
			$nivelsentPertF = 'Medio';
			$colorsentPertFinal = 'amarillo';
			break;
		case $sentPertF >= 8 && $sentPertF < 10:
			$nivelsentPertF = 'Alto';
			$colorsentPertFinal = 'naranja';
			break;
			case $sentPertF >= 10:
			$nivelsentPertF = 'Muy alto';
			$colorsentPertFinal = 'rojo';
			break;
		
		default:
			$nivelsentPertF = 'No puede ser medido';
			$colorsentPertFinal = '';
			break;
	}


	$conDos -> close();


 ?>