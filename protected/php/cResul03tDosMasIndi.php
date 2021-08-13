<?php 

	$csTres = $conPorCentro -> query("SELECT SUM(p1_R2a+p2_R2a+p3_R2a) AS conAmbDeTrabajo, SUM(p4_R2a+p5_R2a+p6_R2a+p7_R2a+p8_R2a+p9_R2a+p10_R2a+p11_R2a+p12_R2a+p13_R2a+p41_R2a+p42_R2a+p43_R2a) AS cargaDeTrabajo, SUM(p18_R2a+p19_R2a+p20_R2a+p21_R2a+p22_R2a+p26_R2a+p27_R2a) AS faltDeContTrab, SUM(p14_R2a+p15_R2a) AS jorDeTrab, SUM(p16_R2a+p17_R2a) AS interEnRelFam, SUM(p23_R2a+p24_R2a+p25_R2a+p28_R2a+p29_R2a) AS liderazgo, SUM(p30_R2a+p31_R2a+p32_R2a+p44_R2a+p45_R2a+p46_R2a) AS relaEntreTrab, SUM(p33_R2a+p34_R2a+p35_R2a+p36_R2a+p37_R2a+p38_R2a+p39_R2a+p40_R2a) AS violencia, COUNT(codeMd5_R2a) AS CPersonas FROM nom035R2a WHERE usrNombre_R2a = '$usrNombre'");

	while ($nivelDeRiezgoMas = $csTres->fetchArray()) {

		$conAmbDeTrabajoCFinalMas=$nivelDeRiezgoMas['conAmbDeTrabajo'];
		$cargaDeTrabajoCFinalMas=$nivelDeRiezgoMas['cargaDeTrabajo'];
		$faltDeContTrabFinalMas=$nivelDeRiezgoMas['faltDeContTrab'];
		$jorDeTrabFinalMas=$nivelDeRiezgoMas['jorDeTrab'];
		$interEnRelFamFinalMas=$nivelDeRiezgoMas['interEnRelFam'];
		$liderazgoFinalMas=$nivelDeRiezgoMas['liderazgo'];
		$relaEntreTrabFinalMas=$nivelDeRiezgoMas['relaEntreTrab'];
		$violenciaFinalMas=$nivelDeRiezgoMas['violencia'];

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


	$cConAmbDeTrabajoFMas = round($cConAmbDeTrabajoFMas,1, PHP_ROUND_HALF_UP);
	$cCarDeTrabFMas = round($cCarDeTrabFMas,1, PHP_ROUND_HALF_UP);
	$cFaltDeContTrabFMas = round($cFaltDeContTrabFMas,1, PHP_ROUND_HALF_UP);
	$jorDeTrabFMas = round($jorDeTrabFMas,1, PHP_ROUND_HALF_UP);
	$interEnRelFamFMas = round($interEnRelFamFMas,1, PHP_ROUND_HALF_UP);
	$liderazgoFMas = round($liderazgoFMas,1, PHP_ROUND_HALF_UP);
	$relaEntreTrabFMas = round($relaEntreTrabFMas,1, PHP_ROUND_HALF_UP);
	$violenciaFMas = round($violenciaFMas,1, PHP_ROUND_HALF_UP);


	//EL RESULTADO DE cConAmbDeTrabajoF

	switch ($cConAmbDeTrabajoFMas) {
		case $cConAmbDeTrabajoFMas === null:
			$nivelCADeTracFinalMas = 'Nulo o despreciable';
			$colorCADeTracFinalMas = 'azul';
			break;
		case $cConAmbDeTrabajoFMas < 3:
			$nivelCADeTracFinalMas = 'Nulo o despreciable';
			$colorCADeTracFinalMas = 'azul';
			break;
		case $cConAmbDeTrabajoFMas >= 3 && $cConAmbDeTrabajoFMas < 5:
			$nivelCADeTracFinalMas = 'Bajo';
			$colorCADeTracFinalMas = 'verde';
			break;
		case $cConAmbDeTrabajoFMas >= 5 && $cConAmbDeTrabajoFMas < 7:
			$nivelCADeTracFinalMas = 'Medio';
			$colorCADeTracFinalMas = 'amarillo';
			break;
		case $cConAmbDeTrabajoFMas >= 7 && $cConAmbDeTrabajoFMas < 9:
			$nivelCADeTracFinalMas = 'Alto';
			$colorCADeTracFinalMas = 'naranja';
			break;
			case $cConAmbDeTrabajoFMas >= 9:
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
		case $cCarDeTrabFMas < 12:
			$nivelcCarDeTrabFinalMas = 'Nulo o despreciable';
			$colorcCarDeTrabFinalMas = 'azul';
			break;
		case $cCarDeTrabFMas >= 12 && $cCarDeTrabFMas < 16:
			$nivelcCarDeTrabFinalMas = 'Bajo';
			$colorcCarDeTrabFinalMas = 'verde';
			break;
		case $cCarDeTrabFMas >= 16 && $cCarDeTrabFMas < 20:
			$nivelcCarDeTrabFinalMas = 'Medio';
			$colorcCarDeTrabFinalMas = 'amarillo';
			break;
		case $cCarDeTrabFMas >= 20 && $cCarDeTrabFMas < 24:
			$nivelcCarDeTrabFinalMas = 'Alto';
			$colorcCarDeTrabFinalMas = 'naranja';
			break;
			case $cCarDeTrabFMas >= 24:
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
		case $cFaltDeContTrabFMas < 5:
			$nivelfdeContTrabFinalMas = 'Nulo o despreciable';
			$colorfdeContTrabFinalMas = 'azul';
			break;
		case $cFaltDeContTrabFMas >= 5 && $cFaltDeContTrabFMas < 8:
			$nivelfdeContTrabFinalMas = 'Bajo';
			$colorfdeContTrabFinalMas = 'verde';
			break;
		case $cFaltDeContTrabFMas >= 8 && $cFaltDeContTrabFMas < 11:
			$nivelfdeContTrabFinalMas = 'Medio';
			$colorfdeContTrabFinalMas = 'amarillo';
			break;
		case $cFaltDeContTrabFMas >= 11 && $cFaltDeContTrabFMas < 14:
			$nivelfdeContTrabFinalMas = 'Alto';
			$colorfdeContTrabFinalMas = 'naranja';
			break;
			case $cFaltDeContTrabFMas >= 14:
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
		case $jorDeTrabFMas === null:
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
		case $interEnRelFamFMas < 1:
			$nivelinterEnRelFamFMas = 'Nulo o despreciable';
			$colorinterEnRelFamFinalMas = 'azul';
			break;
		case $interEnRelFamFMas >= 1 && $interEnRelFamFMas < 2:
			$nivelinterEnRelFamFMas = 'Bajo';
			$colorinterEnRelFamFinalMas = 'verde';
			break;
		case $interEnRelFamFMas >= 2 && $interEnRelFamFMas < 4:
			$nivelinterEnRelFamFMas = 'Medio';
			$colorinterEnRelFamFinalMas = 'amarillo';
			break;
		case $interEnRelFamFMas >= 4 && $interEnRelFamFMas < 6:
			$nivelinterEnRelFamFMas = 'Alto';
			$colorinterEnRelFamFinalMas = 'naranja';
			break;
			case $interEnRelFamFMas >= 6:
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
		case $liderazgoFMas < 3:
			$nivelliderazgoFMas = 'Nulo o despreciable';
			$colorliderazgoFinalMas = 'azul';
			break;
		case $liderazgoFMas >= 3 && $liderazgoFMas < 5:
			$nivelliderazgoFMas = 'Bajo';
			$colorliderazgoFinalMas = 'verde';
			break;
		case $liderazgoFMas >= 5 && $liderazgoFMas < 8:
			$nivelliderazgoFMas = 'Medio';
			$colorliderazgoFinalMas = 'amarillo';
			break;
		case $liderazgoFMas >= 8 && $liderazgoFMas < 11:
			$nivelliderazgoFMas = 'Alto';
			$colorliderazgoFinalMas = 'naranja';
			break;
			case $liderazgoFMas >= 11:
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
		case $relaEntreTrabFMas < 5:
			$nivelrelaEnTrabFMas = 'Nulo o despreciable';
			$colorrelaEnTrabFinalMas = 'azul';
			break;
		case $relaEntreTrabFMas >= 5 && $relaEntreTrabFMas < 8:
			$nivelrelaEnTrabFMas = 'Bajo';
			$colorrelaEnTrabFinalMas = 'verde';
			break;
		case $relaEntreTrabFMas >= 8 && $relaEntreTrabFMas < 11:
			$nivelrelaEnTrabFMas = 'Medio';
			$colorrelaEnTrabFinalMas = 'amarillo';
			break;
		case $relaEntreTrabFMas >= 11 && $relaEntreTrabFMas < 14:
			$nivelrelaEnTrabFMas = 'Alto';
			$colorrelaEnTrabFinalMas = 'naranja';
			break;
			case $relaEntreTrabFMas >= 14:
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


 ?>