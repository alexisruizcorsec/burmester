<?php 

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");
date_default_timezone_set('America/Mexico_City');


 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Matriz Individual GII</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            }

        * {
            margin: 0px;
            padding: 0px;
        }
        
        .marcoP{
            width: 2426px;
			padding: 20px;
        }
        
        th{
            background-color: #1F419A;
            color: #fff;
            padding: 3px;
            text-align: left;
            width: 80px;
            height: 40px;
        }
        td{
            width: 80px;
            height: 30px;
            padding: 3px;
        }
        td, .sinColor{
            background-color: transparent;
            width: 10px;
        }
        .textCentrado{
            text-align: center;
        }
        .borderTabla{
            border: 1px solid #1F419A;
        }
        table{
            border-spacing: 0px;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
<!-- <body onload="window.print();"> -->
<div class="marcoP">
        <table style="width: 2426px;">
            <thead>
                <tr>
                    <th colspan="35" rowspan="0" style="background-color: transparent; color: #1F419A;"><h2 style="text-align: center; padding: 5px; margin: 10px;">Matriz Individual GII</h2></th>
                </tr>
            </thead>
            <thead>
                <tr>
                    <td colspan="10" rowspan="0"></td>
                    <td class="borderTabla" colspan="8" rowspan="0" style="text-align: center; color: #1F419A;"><b>CATEGORIAS</b></td>
                    <td></td>
                    <td class="borderTabla" colspan="16" rowspan="0" style="text-align: center; color: #1F419A;"><b>DOMINIOS</b></td>
                </tr>
                    
            </thead>
            <thead>
                <tr style="font-size: .8em;">
                    <th style="background-color: transparent;" colspan="7" rowspan="0"></th style="background-color: transparent; color: #000;">
                    <th class="borderTabla" style="background-color: transparent; color: #1F419A; text-align: center; font-size: 1em;" colspan="2" rowspan="0">Cuestionario</th style="background-color: transparent; color: #000;">
                    <th style="background-color: transparent;" ></th>
                    <th class="borderTabla" style="background-color: transparent; color: #1F419A; text-align: center; font-size: 1em;" colspan="2" rowspan="0">Ambiente de trabajo</th style="background-color: transparent; color: #000;">
                    <th class="borderTabla" style="background-color: transparent; color: #1F419A; text-align: center; font-size: 1em;" colspan="2" rowspan="0">Factores propios de la actividad</th style="background-color: transparent; color: #000;">
                    <th class="borderTabla" style="background-color: transparent; color: #1F419A; text-align: center; font-size: 1em;" colspan="2" rowspan="0">Organización del tiempo de trabajo</th style="background-color: transparent; color: #000;">
                    <th class="borderTabla" style="background-color: transparent; color: #1F419A; text-align: center; font-size: 1em;" colspan="2" rowspan="0">Liderazgo y relaciones en el trabajo</th style="background-color: transparent; color: #000;">
                    <th style="background-color: transparent;"></th>
                    <th class="borderTabla" style="background-color: transparent; color: #1F419A; text-align: center; font-size: 1em;" colspan="2" rowspan="0">Condiciones en el ambiente de trabajo</th style="background-color: transparent; color: #000;">
                    <th class="borderTabla" style="background-color: transparent; color: #1F419A; text-align: center; font-size: 1em;" colspan="2" rowspan="0">Carga de trabajo</th style="background-color: transparent; color: #000;">
                    <th class="borderTabla" style="background-color: transparent; color: #1F419A; text-align: center; font-size: 1em;" colspan="2" rowspan="0">Falta de control sobre el trabajo</th style="background-color: transparent; color: #000;">
                    <th class="borderTabla" style="background-color: transparent; color: #1F419A; text-align: center; font-size: 1em;" colspan="2" rowspan="0">Jornada de trabajo</th style="background-color: transparent; color: #000;">
                    <th class="borderTabla" style="background-color: transparent; color: #1F419A; text-align: center; font-size: 1em;" colspan="2" rowspan="0">Interferencia en la relación trabajo-familia</th style="background-color: transparent; color: #000;">
                    <th class="borderTabla" style="background-color: transparent; color: #1F419A; text-align: center; font-size: 1em;" colspan="2" rowspan="0">Liderazgo</th style="background-color: transparent; color: #000;">
                    <th class="borderTabla" style="background-color: transparent; color: #1F419A; text-align: center; font-size: 1em;" colspan="2" rowspan="0">Relaciones en el trabajo</th style="background-color: transparent; color: #000;">
                    <th class="borderTabla" style="background-color: transparent; color: #1F419A; text-align: center; font-size: 1em;" colspan="2" rowspan="0">Violencia</th style="background-color: transparent; color: #000;">
                </tr>
            </thead>
            <thead>
                <tr style="font-size: .8em;">
                    <th class="borderTabla">Nombre Empresa</th>
                    <th class="borderTabla">Centro de Trabajo</th>
                    <th class="borderTabla">Razón Social</th>
                    <th class="borderTabla">Num Empleado</th>
                    <th class="borderTabla">Puesto</th>
                    <th class="borderTabla">Area</th>
                    <th class="borderTabla">Nombre</th>
                    <th class="borderTabla">Calificación Final</th>
                    <th class="borderTabla">Nivel de riesgo</th>
                    <th class="sinColor"></th>
                    <th class="borderTabla">Calificación</th>
                    <th class="borderTabla">Nivel de riesgo</th>
                    <th class="borderTabla">Calificación</th>
                    <th class="borderTabla">Nivel de riesgo</th>
                    <th class="borderTabla">Calificación</th>
                    <th class="borderTabla">Nivel de riesgo</th>
                    <th class="borderTabla">Calificación</th>
                    <th class="borderTabla">Nivel de riesgo</th>
                    <th class="sinColor"></th>
                    <th class="borderTabla">Calificación</th>
                    <th class="borderTabla">Nivel de riesgo</th>
                    <th class="borderTabla">Calificación</th>
                    <th class="borderTabla">Nivel de riesgo</th>
                    <th class="borderTabla">Calificación</th>
                    <th class="borderTabla">Nivel de riesgo</th>
                    <th class="borderTabla">Calificación</th>
                    <th class="borderTabla">Nivel de riesgo</th>
                    <th class="borderTabla">Calificación</th>
                    <th class="borderTabla">Nivel de riesgo</th>
                    <th class="borderTabla">Calificación</th>
                    <th class="borderTabla">Nivel de riesgo</th>
                    <th class="borderTabla">Calificación</th>
                    <th class="borderTabla">Nivel de riesgo</th>
                    <th class="borderTabla">Calificación</th>
                    <th class="borderTabla">Nivel de riesgo</th>
                </tr>
			</thead>

			<?php 
			
			$con = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

			$csE = $con -> query("SELECT * FROM matrizIndividualGII WHERE Empresad = '$_GET[empresa]'");
			while ($dato = $csE->fetchArray()) {
				$empresad = $dato['Empresad'];
				$carpetaPrincipal = $dato['carpetaPrincipal'];
				$carpetaSecundaria = $dato['carpetaSecundaria'];
				$numEmpleadod = $dato['NumEmpleadod'];
				$puestod = $dato['Puestod'];
				$comodind = $dato['comodind'];
				$nombred = $dato['Nombred'];
				$cFinal = $dato['cFinal'];
				$rCue_cFinal = $dato['rCue_cFinal'];
				$ambieTrab = $dato['ambieTrab'];
				$rCue_ambieTrab = $dato['rCue_ambieTrab'];
				$factContTrab = $dato['factContTrab'];
				$rCue_factContTrab = $dato['rCue_factContTrab'];
				$orgaTempTrap = $dato['orgaTempTrap'];
				$rCue_orgaTempTrap = $dato['rCue_orgaTempTrap'];
				$lidRelaTrab = $dato['lidRelaTrab'];
				$rCue_lidRelaTrab = $dato['rCue_lidRelaTrab'];
				$conAmbTrab = $dato['conAmbTrab'];
				$rCue_conAmbTrab = $dato['rCue_conAmbTrab'];
				$cargaTrab = $dato['cargaTrab'];
				$rCue_cargaTrab = $dato['rCue_cargaTrab'];
				$faContTrab = $dato['faContTrab'];
				$rCue_faContTrab = $dato['rCue_faContTrab'];
				$jornaTrab = $dato['jornaTrab'];
				$rCue_jornaTrab = $dato['rCue_jornaTrab'];
				$interEnlaTrabFam = $dato['interEnlaTrabFam'];
				$rCue_interEnlaTrabFam = $dato['rCue_interEnlaTrabFam'];
				$lider = $dato['lider'];
				$rCue_lider = $dato['rCue_lider'];
				$relaEnTrab = $dato['relaEnTrab'];
				$rCue_relaEnTrab = $dato['rCue_relaEnTrab'];
				$violen = $dato['violen'];
				$rCue_violen = $dato['rCue_violen'];

				//Color Nivel Riesgo rCue_cFinal
				switch ($rCue_cFinal) {
					case 'Muy alto':
						$colorrCue_cFinal = 'style="background-color: red; border: 1px solid red;"';
						break;
					case 'Alto':
						$colorrCue_cFinal = 'style="background-color: orange; border: 1px solid orange;"';
						break;
					case 'Medio':
						$colorrCue_cFinal = 'style="background-color: yellow; border: 1px solid yellow;"';
						break;
					case 'Bajo':
						$colorrCue_cFinal = 'style="background-color: #58D68D; border: 1px solid #58D68D;"';
						break;
					case 'Nulo o despreciable':
						$colorrCue_cFinal = 'style="background-color: #85C1E9; border: 1px solid #85C1E9;"';
						break;
					default:
						$colorrCue_cFinal = 'style="background-color: transparent; border: 1px solid transparent;"';
						break;
				}
				//Color Nivel Riesgo rCue_ambieTrab
				switch ($rCue_ambieTrab) {
					case 'Muy alto':
						$colorrCue_ambieTra = 'style="background-color: red; border: 1px solid red;"';
						break;
					case 'Alto':
						$colorrCue_ambieTra = 'style="background-color: orange; border: 1px solid orange;"';
						break;
					case 'Medio':
						$colorrCue_ambieTra = 'style="background-color: yellow; border: 1px solid yellow;"';
						break;
					case 'Bajo':
						$colorrCue_ambieTra = 'style="background-color: #58D68D; border: 1px solid #58D68D;"';
						break;
					case 'Nulo o despreciable':
						$colorrCue_ambieTra = 'style="background-color: #85C1E9; border: 1px solid #85C1E9;"';
						break;
					default:
						$colorrCue_ambieTra = 'style="background-color: transparent; border: 1px solid transparent;"';
						break;
				}
				//Color Nivel Riesgo rCue_factContTrab
				switch ($rCue_factContTrab) {
					case 'Muy alto':
						$colorrCue_factContTrab = 'style="background-color: red; border: 1px solid red;"';
						break;
					case 'Alto':
						$colorrCue_factContTrab = 'style="background-color: orange; border: 1px solid orange;"';
						break;
					case 'Medio':
						$colorrCue_factContTrab = 'style="background-color: yellow; border: 1px solid yellow;"';
						break;
					case 'Bajo':
						$colorrCue_factContTrab = 'style="background-color: #58D68D; border: 1px solid #58D68D;"';
						break;
					case 'Nulo o despreciable':
						$colorrCue_factContTrab = 'style="background-color: #85C1E9; border: 1px solid #85C1E9;"';
						break;
					default:
						$colorrCue_factContTrab = 'style="background-color: transparent; border: 1px solid transparent;"';
						break;
				}
				//Color Nivel Riesgo rCue_orgaTempTrap
				switch ($rCue_orgaTempTrap) {
					case 'Muy alto':
						$colorrCue_orgaTempTrap = 'style="background-color: red; border: 1px solid red;"';
						break;
					case 'Alto':
						$colorrCue_orgaTempTrap = 'style="background-color: orange; border: 1px solid orange;"';
						break;
					case 'Medio':
						$colorrCue_orgaTempTrap = 'style="background-color: yellow; border: 1px solid yellow;"';
						break;
					case 'Bajo':
						$colorrCue_orgaTempTrap = 'style="background-color: #58D68D; border: 1px solid #58D68D;"';
						break;
					case 'Nulo o despreciable':
						$colorrCue_orgaTempTrap = 'style="background-color: #85C1E9; border: 1px solid #85C1E9;"';
						break;
					default:
						$colorrCue_orgaTempTrap = 'style="background-color: transparent; border: 1px solid transparent;"';
						break;
				}
				//Color Nivel Riesgo rCue_lidRelaTrab
				switch ($rCue_lidRelaTrab) {
					case 'Muy alto':
						$colorrCue_lidRelaTrab = 'style="background-color: red; border: 1px solid red;"';
						break;
					case 'Alto':
						$colorrCue_lidRelaTrab = 'style="background-color: orange; border: 1px solid orange;"';
						break;
					case 'Medio':
						$colorrCue_lidRelaTrab = 'style="background-color: yellow; border: 1px solid yellow;"';
						break;
					case 'Bajo':
						$colorrCue_lidRelaTrab = 'style="background-color: #58D68D; border: 1px solid #58D68D;"';
						break;
					case 'Nulo o despreciable':
						$colorrCue_lidRelaTrab = 'style="background-color: #85C1E9; border: 1px solid #85C1E9;"';
						break;
					default:
						$colorrCue_lidRelaTrab = 'style="background-color: transparent; border: 1px solid transparent;"';
						break;
				}
				//Color Nivel Riesgo rCue_conAmbTrab
				switch ($rCue_conAmbTrab) {
					case 'Muy alto':
						$colorrCue_conAmbTrab = 'style="background-color: red; border: 1px solid red;"';
						break;
					case 'Alto':
						$colorrCue_conAmbTrab = 'style="background-color: orange; border: 1px solid orange;"';
						break;
					case 'Medio':
						$colorrCue_conAmbTrab = 'style="background-color: yellow; border: 1px solid yellow;"';
						break;
					case 'Bajo':
						$colorrCue_conAmbTrab = 'style="background-color: #58D68D; border: 1px solid #58D68D;"';
						break;
					case 'Nulo o despreciable':
						$colorrCue_conAmbTrab = 'style="background-color: #85C1E9; border: 1px solid #85C1E9;"';
						break;
					default:
						$colorrCue_conAmbTrab = 'style="background-color: transparent; border: 1px solid transparent;"';
						break;
				}
				//Color Nivel Riesgo rCue_cargaTrab
				switch ($rCue_cargaTrab) {
					case 'Muy alto':
						$colorrCue_cargaTrab = 'style="background-color: red; border: 1px solid red;"';
						break;
					case 'Alto':
						$colorrCue_cargaTrab = 'style="background-color: orange; border: 1px solid orange;"';
						break;
					case 'Medio':
						$colorrCue_cargaTrab = 'style="background-color: yellow; border: 1px solid yellow;"';
						break;
					case 'Bajo':
						$colorrCue_cargaTrab = 'style="background-color: #58D68D; border: 1px solid #58D68D;"';
						break;
					case 'Nulo o despreciable':
						$colorrCue_cargaTrab = 'style="background-color: #85C1E9; border: 1px solid #85C1E9;"';
						break;
					default:
						$colorrCue_cargaTrab = 'style="background-color: transparent; border: 1px solid transparent;"';
						break;
				}
				//Color Nivel Riesgo rCue_faContTrab
				switch ($rCue_faContTrab) {
					case 'Muy alto':
						$colorrCue_faContTrab = 'style="background-color: red; border: 1px solid red;"';
						break;
					case 'Alto':
						$colorrCue_faContTrab = 'style="background-color: orange; border: 1px solid orange;"';
						break;
					case 'Medio':
						$colorrCue_faContTrab = 'style="background-color: yellow; border: 1px solid yellow;"';
						break;
					case 'Bajo':
						$colorrCue_faContTrab = 'style="background-color: #58D68D; border: 1px solid #58D68D;"';
						break;
					case 'Nulo o despreciable':
						$colorrCue_faContTrab = 'style="background-color: #85C1E9; border: 1px solid #85C1E9;"';
						break;
					default:
						$colorrCue_faContTrab = 'style="background-color: transparent; border: 1px solid transparent;"';
						break;
				}
				//Color Nivel Riesgo rCue_jornaTrab
				switch ($rCue_jornaTrab) {
					case 'Muy alto':
						$colorrCue_jornaTrab = 'style="background-color: red; border: 1px solid red;"';
						break;
					case 'Alto':
						$colorrCue_jornaTrab = 'style="background-color: orange; border: 1px solid orange;"';
						break;
					case 'Medio':
						$colorrCue_jornaTrab = 'style="background-color: yellow; border: 1px solid yellow;"';
						break;
					case 'Bajo':
						$colorrCue_jornaTrab = 'style="background-color: #58D68D; border: 1px solid #58D68D;"';
						break;
					case 'Nulo o despreciable':
						$colorrCue_jornaTrab = 'style="background-color: #85C1E9; border: 1px solid #85C1E9;"';
						break;
					default:
						$colorrCue_jornaTrab = 'style="background-color: transparent; border: 1px solid transparent;"';
						break;
				}
				//Color Nivel Riesgo rCue_interEnlaTrabFam
				switch ($rCue_interEnlaTrabFam) {
					case 'Muy alto':
						$colorrCue_interEnlaTrabFam = 'style="background-color: red; border: 1px solid red;"';
						break;
					case 'Alto':
						$colorrCue_interEnlaTrabFam = 'style="background-color: orange; border: 1px solid orange;"';
						break;
					case 'Medio':
						$colorrCue_interEnlaTrabFam = 'style="background-color: yellow; border: 1px solid yellow;"';
						break;
					case 'Bajo':
						$colorrCue_interEnlaTrabFam = 'style="background-color: #58D68D; border: 1px solid #58D68D;"';
						break;
					case 'Nulo o despreciable':
						$colorrCue_interEnlaTrabFam = 'style="background-color: #85C1E9; border: 1px solid #85C1E9;"';
						break;
					default:
						$colorrCue_interEnlaTrabFam = 'style="background-color: transparent; border: 1px solid transparent;"';
						break;
				}
				//Color Nivel Riesgo rCue_lider
				switch ($rCue_lider) {
					case 'Muy alto':
						$colorrCue_lider = 'style="background-color: red; border: 1px solid red;"';
						break;
					case 'Alto':
						$colorrCue_lider = 'style="background-color: orange; border: 1px solid orange;"';
						break;
					case 'Medio':
						$colorrCue_lider = 'style="background-color: yellow; border: 1px solid yellow;"';
						break;
					case 'Bajo':
						$colorrCue_lider = 'style="background-color: #58D68D; border: 1px solid #58D68D;"';
						break;
					case 'Nulo o despreciable':
						$colorrCue_lider = 'style="background-color: #85C1E9; border: 1px solid #85C1E9;"';
						break;
					default:
						$colorrCue_lider = 'style="background-color: transparent; border: 1px solid transparent;"';
						break;
				}
				//Color Nivel Riesgo rCue_relaEnTrab
				switch ($rCue_relaEnTrab) {
					case 'Muy alto':
						$colorrCue_relaEnTrab = 'style="background-color: red; border: 1px solid red;"';
						break;
					case 'Alto':
						$colorrCue_relaEnTrab = 'style="background-color: orange; border: 1px solid orange;"';
						break;
					case 'Medio':
						$colorrCue_relaEnTrab = 'style="background-color: yellow; border: 1px solid yellow;"';
						break;
					case 'Bajo':
						$colorrCue_relaEnTrab = 'style="background-color: #58D68D; border: 1px solid #58D68D;"';
						break;
					case 'Nulo o despreciable':
						$colorrCue_relaEnTrab = 'style="background-color: #85C1E9; border: 1px solid #85C1E9;"';
						break;
					default:
						$colorrCue_relaEnTrab = 'style="background-color: transparent; border: 1px solid transparent;"';
						break;
				}
				//Color Nivel Riesgo rCue_violen
				switch ($rCue_violen) {
					case 'Muy alto':
						$colorrCue_violen = 'style="background-color: red; border: 1px solid red;"';
						break;
					case 'Alto':
						$colorrCue_violen = 'style="background-color: orange; border: 1px solid orange;"';
						break;
					case 'Medio':
						$colorrCue_violen = 'style="background-color: yellow; border: 1px solid yellow;"';
						break;
					case 'Bajo':
						$colorrCue_violen = 'style="background-color: #58D68D; border: 1px solid #58D68D;"';
						break;
					case 'Nulo o despreciable':
						$colorrCue_violen = 'style="background-color: #85C1E9; border: 1px solid #85C1E9;"';
						break;
					default:
						$colorrCue_violen = 'style="background-color: transparent; border: 1px solid transparent;"';
						break;
				}


				//TABLA

				echo '

			<tr style="font-size: .7em;">
                <td>'.$empresad.'</td>
                <td>'.$carpetaPrincipal.'</td>
                <td>'.$carpetaSecundaria.'</td>
                <td>'.$numEmpleadod.'</td>
                <td>'.$puestod.'</td>
                <td>'.$comodind.'</td>
                <td>'.$nombred.'</td>
                <td class="textCentrado" '.$colorrCue_cFinal.'>'.$cFinal.'</td>
                <td class="textCentrado" '.$colorrCue_cFinal.'>'.$rCue_cFinal.'</td>
                <td></td>
                <td class="textCentrado" '.$colorrCue_ambieTra.'>'.$ambieTrab.'</td>
                <td class="textCentrado" '.$colorrCue_ambieTra.'>'.$rCue_ambieTrab.'</td>
                <td class="textCentrado" '.$colorrCue_factContTrab.'>'.$factContTrab.'</td>
                <td class="textCentrado" '.$colorrCue_factContTrab.'>'.$rCue_factContTrab.'</td>
                <td class="textCentrado" '.$colorrCue_orgaTempTrap.'>'.$orgaTempTrap.'</td>
                <td class="textCentrado" '.$colorrCue_orgaTempTrap.'>'.$rCue_orgaTempTrap.'</td>
                <td class="textCentrado" '.$colorrCue_lidRelaTrab.'>'.$lidRelaTrab.'</td>
                <td class="textCentrado" '.$colorrCue_lidRelaTrab.'>'.$rCue_lidRelaTrab.'</td>
                <td></td>
                <td class="textCentrado" '.$colorrCue_conAmbTrab.'>'.$conAmbTrab.'</td>
                <td class="textCentrado" '.$colorrCue_conAmbTrab.'>'.$rCue_conAmbTrab.'</td>
                <td class="textCentrado" '.$colorrCue_cargaTrab.'>'.$cargaTrab.'</td>
                <td class="textCentrado" '.$colorrCue_cargaTrab.'>'.$rCue_cargaTrab.'</td>
                <td class="textCentrado" '.$colorrCue_faContTrab.'>'.$faContTrab.'</td>
                <td class="textCentrado" '.$colorrCue_faContTrab.'>'.$rCue_faContTrab.'</td>
                <td class="textCentrado" '.$colorrCue_jornaTrab.'>'.$jornaTrab.'</td>
                <td class="textCentrado" '.$colorrCue_jornaTrab.'>'.$rCue_jornaTrab.'</td>
                <td class="textCentrado" '.$colorrCue_interEnlaTrabFam.'>'.$interEnlaTrabFam.'</td>
                <td class="textCentrado" '.$colorrCue_interEnlaTrabFam.'>'.$rCue_interEnlaTrabFam.'</td>
                <td class="textCentrado" '.$colorrCue_lider.'>'.$lider.'</td>
                <td class="textCentrado" '.$colorrCue_lider.'>'.$rCue_lider.'</td>
                <td class="textCentrado" '.$colorrCue_relaEnTrab.'>'.$relaEnTrab.'</td>
                <td class="textCentrado" '.$colorrCue_relaEnTrab.'>'.$rCue_relaEnTrab.'</td>
                <td class="textCentrado" '.$colorrCue_violen.'>'.$violen.'</td>
                <td class="textCentrado" '.$colorrCue_violen.'>'.$rCue_violen.'</td>
            </tr>
				
				
				
				
				
				
				
				';







			}

			$empresad = (isset($empresad)) ? $empresad : '';

			$con -> close();
			
			
			
			
			?>
			
            
        </table>
    </div>
</body>
</html>