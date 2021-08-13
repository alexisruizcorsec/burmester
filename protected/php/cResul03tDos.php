<?php 

	$conDos = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

	$cs = $conDos -> query("SELECT SUM(p1_R2a+p2_R2a+p3_R2a) AS conAmbDeTrabajo, SUM(p4_R2a+p5_R2a+p6_R2a+p7_R2a+p8_R2a+p9_R2a+p10_R2a+p11_R2a+p12_R2a+p13_R2a+p41_R2a+p42_R2a+p43_R2a) AS cargaDeTrabajo, SUM(p18_R2a+p19_R2a+p20_R2a+p21_R2a+p22_R2a+p26_R2a+p27_R2a) AS faltDeContTrab, SUM(p14_R2a+p15_R2a) AS jorDeTrab, SUM(p16_R2a+p17_R2a) AS interEnRelFam, SUM(p23_R2a+p24_R2a+p25_R2a+p28_R2a+p29_R2a) AS liderazgo, SUM(p30_R2a+p31_R2a+p32_R2a+p44_R2a+p45_R2a+p46_R2a) AS relaEntreTrab, SUM(p33_R2a+p34_R2a+p35_R2a+p36_R2a+p37_R2a+p38_R2a+p39_R2a+p40_R2a) AS violencia, COUNT(codeMd5_R2a) AS CPersonas FROM nom035R2a");

	while ($nivelDeRiezgo = $cs->fetchArray()) {

		$conAmbDeTrabajoCFinal=$nivelDeRiezgo['conAmbDeTrabajo'];
		$cargaDeTrabajoCFinal=$nivelDeRiezgo['cargaDeTrabajo'];
		$faltDeContTrabFinal=$nivelDeRiezgo['faltDeContTrab'];
		$jorDeTrabFinal=$nivelDeRiezgo['jorDeTrab'];
		$interEnRelFamFinal=$nivelDeRiezgo['interEnRelFam'];
		$liderazgoFinal=$nivelDeRiezgo['liderazgo'];
		$relaEntreTrabFinal=$nivelDeRiezgo['relaEntreTrab'];
		$violenciaFinal=$nivelDeRiezgo['violencia'];

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


	$cConAmbDeTrabajoF = round($cConAmbDeTrabajoF,1, PHP_ROUND_HALF_UP);
	$cCarDeTrabF = round($cCarDeTrabF,1, PHP_ROUND_HALF_UP);
	$cFaltDeContTrabF = round($cFaltDeContTrabF,1, PHP_ROUND_HALF_UP);
	$jorDeTrabF = round($jorDeTrabF,1, PHP_ROUND_HALF_UP);
	$interEnRelFamF = round($interEnRelFamF,1, PHP_ROUND_HALF_UP);
	$liderazgoF = round($liderazgoF,1, PHP_ROUND_HALF_UP);
	$relaEntreTrabF = round($relaEntreTrabF,1, PHP_ROUND_HALF_UP);
	$violenciaF = round($violenciaF,1, PHP_ROUND_HALF_UP);


	//EL RESULTADO DE cConAmbDeTrabajoF

	switch ($cConAmbDeTrabajoF) {
		case $cConAmbDeTrabajoF === null:
			$nivelCADeTracFinal = 'Nulo o despreciable';
			$colorCADeTracFinal = 'azul';
			break;
		case $cConAmbDeTrabajoF < 3:
			$nivelCADeTracFinal = 'Nulo o despreciable';
			$colorCADeTracFinal = 'azul';
			break;
		case $cConAmbDeTrabajoF >= 3 && $cConAmbDeTrabajoF < 5:
			$nivelCADeTracFinal = 'Bajo';
			$colorCADeTracFinal = 'verde';
			break;
		case $cConAmbDeTrabajoF >= 5 && $cConAmbDeTrabajoF < 7:
			$nivelCADeTracFinal = 'Medio';
			$colorCADeTracFinal = 'amarillo';
			break;
		case $cConAmbDeTrabajoF >= 7 && $cConAmbDeTrabajoF < 9:
			$nivelCADeTracFinal = 'Alto';
			$colorCADeTracFinal = 'naranja';
			break;
			case $cConAmbDeTrabajoF >= 9:
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
		case $cCarDeTrabF < 12:
			$nivelcCarDeTrabFinal = 'Nulo o despreciable';
			$colorcCarDeTrabFinal = 'azul';
			break;
		case $cCarDeTrabF >= 12 && $cCarDeTrabF < 16:
			$nivelcCarDeTrabFinal = 'Bajo';
			$colorcCarDeTrabFinal = 'verde';
			break;
		case $cCarDeTrabF >= 16 && $cCarDeTrabF < 20:
			$nivelcCarDeTrabFinal = 'Medio';
			$colorcCarDeTrabFinal = 'amarillo';
			break;
		case $cCarDeTrabF >= 20 && $cCarDeTrabF < 24:
			$nivelcCarDeTrabFinal = 'Alto';
			$colorcCarDeTrabFinal = 'naranja';
			break;
			case $cCarDeTrabF >= 24:
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
		case $cFaltDeContTrabF < 5:
			$nivelfdeContTrabFinal = 'Nulo o despreciable';
			$colorfdeContTrabFinal = 'azul';
			break;
		case $cFaltDeContTrabF >= 5 && $cFaltDeContTrabF < 8:
			$nivelfdeContTrabFinal = 'Bajo';
			$colorfdeContTrabFinal = 'verde';
			break;
		case $cFaltDeContTrabF >= 8 && $cFaltDeContTrabF < 11:
			$nivelfdeContTrabFinal = 'Medio';
			$colorfdeContTrabFinal = 'amarillo';
			break;
		case $cFaltDeContTrabF >= 11 && $cFaltDeContTrabF < 14:
			$nivelfdeContTrabFinal = 'Alto';
			$colorfdeContTrabFinal = 'naranja';
			break;
			case $cFaltDeContTrabF >= 14:
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
		case $interEnRelFamF < 1:
			$nivelinterEnRelFamF = 'Nulo o despreciable';
			$colorinterEnRelFamFinal = 'azul';
			break;
		case $interEnRelFamF >= 1 && $interEnRelFamF < 2:
			$nivelinterEnRelFamF = 'Bajo';
			$colorinterEnRelFamFinal = 'verde';
			break;
		case $interEnRelFamF >= 2 && $interEnRelFamF < 4:
			$nivelinterEnRelFamF = 'Medio';
			$colorinterEnRelFamFinal = 'amarillo';
			break;
		case $interEnRelFamF >= 4 && $interEnRelFamF < 6:
			$nivelinterEnRelFamF = 'Alto';
			$colorinterEnRelFamFinal = 'naranja';
			break;
			case $interEnRelFamF >= 6:
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
		case $liderazgoF < 3:
			$nivelliderazgoF = 'Nulo o despreciable';
			$colorliderazgoFinal = 'azul';
			break;
		case $liderazgoF >= 3 && $liderazgoF < 5:
			$nivelliderazgoF = 'Bajo';
			$colorliderazgoFinal = 'verde';
			break;
		case $liderazgoF >= 5 && $liderazgoF < 8:
			$nivelliderazgoF = 'Medio';
			$colorliderazgoFinal = 'amarillo';
			break;
		case $liderazgoF >= 8 && $liderazgoF < 11:
			$nivelliderazgoF = 'Alto';
			$colorliderazgoFinal = 'naranja';
			break;
			case $liderazgoF >= 11:
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
		case $relaEntreTrabF < 5:
			$nivelrelaEnTrabF = 'Nulo o despreciable';
			$colorrelaEnTrabFinal = 'azul';
			break;
		case $relaEntreTrabF >= 5 && $relaEntreTrabF < 8:
			$nivelrelaEnTrabF = 'Bajo';
			$colorrelaEnTrabFinal = 'verde';
			break;
		case $relaEntreTrabF >= 8 && $relaEntreTrabF < 11:
			$nivelrelaEnTrabF = 'Medio';
			$colorrelaEnTrabFinal = 'amarillo';
			break;
		case $relaEntreTrabF >= 11 && $relaEntreTrabF < 14:
			$nivelrelaEnTrabF = 'Alto';
			$colorrelaEnTrabFinal = 'naranja';
			break;
			case $relaEntreTrabF >= 14:
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


	

	$conDos -> close();


 ?>