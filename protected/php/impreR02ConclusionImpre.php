<?php 

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");
date_default_timezone_set('America/Mexico_City');


include 'cResul01tDos.php';
include 'cResul02tDos.php';
include 'cResul03tDos.php';


 ?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Reporte NOM-035 Resultados GII</title>
	<style>
		@media print {
			.hoja{
				page-break-before: always;
			}
		}
		.marcoP{
			display: flex;
        align-items: center;
		}
		.hoja{
			margin: 0 auto;
			width: 730px;
			height: 980px;
			text-align:  justify;
		}
		body {
		    font-family: Arial, sans-serif;
		    }
		table{
			border-collapse: collapse;
		}
		th{
			padding: 3px 10px;
			border: 1px solid black;
		}
		td{
			padding: 3px 10px;
			border: 1px solid black;
		}
		.azul{
			background-color: #8eaadb;
			color: #FFF;
		}
		.verde{
			background-color: #79e593;
			color: #FFF;
		}
		.amarillo{
			background-color: #ffff00;
		}
		.naranja{
			background-color: #ffc000;
			color: #FFF;
		}
		.rojo{
			background-color: #ff0000 ;
			color: #FFF;
		}

	</style>
</head>
<body>
<!-- <body onload="window.print();"> -->
	<?php 


	$conPorCentro = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

	$csCentro = $conPorCentro -> query("SELECT dirEmpresa_R2a,usrNombre_R2a FROM nom035R2a GROUP BY dirEmpresa_R2a,usrNombre_R2a ORDER BY dirEmpresa_R2a,usrNombre_R2a");

	

	while ($CCentros = $csCentro->fetchArray()) {

		$dirEmpresa=$CCentros['dirEmpresa_R2a'];
		$usrNombre=$CCentros['usrNombre_R2a'];

		include 'cResul01tDosMasIndi.php';
		include 'cResul02tDosMasIndi.php';
		include 'cResul03tDosMasIndi.php';

		echo '


	<div class="marcoP">
		<div class="hoja">
			<div style="position: absolute; z-index: -1;">
				<img src="../img/hFondo_.svg" style="height: 950px;">
			</div>
			<div>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<div style="padding: 10px; width: 630px; height: 950px; margin: auto;">
				<div style="position: absolute; margin-left: 490px; margin-top: 0px; font-size: .5em; color: grey; text-align: left;">
							<i>'.$usrNombre.'</i>
				</div>
				<h4>RESULTADOS: <span style="font-size: .7em;"><i>'.$dirEmpresa.'</i></span></h4>

				<div style="font-size: .93em;">
					<p>Al realizar el análisis de datos, se obtuvieron los siguientes resultados:</p>
					<!-- // COMPRO I	 -->				
					<p>Nivel de riesgo del cuestionario General</p>
					<br>
					<table>
						<tr>
							<th>Cuestionario</th>
							<th>Calificación del cuestionario</th>
							<th>Nivel de riesgo</th>
						</tr>
						<tr>
							<td>Cuestionario <span style="font-size: .8em;">C<i>final</i></span></td>
							<td class="'.$colorcFinalMas.'">'.$cfinalMas.'</td>
							<td class="'.$colorcFinalMas.'">'.$nivelcFinalMas.'</td>
						</tr>
					</table>
				</div>
				<br>
				<h4>Nivel de riesgo por categoría</h4>

				<div style="font-size: .9em;">
					<!-- // COMPRO II	 -->
					<table>
						<tr>
							<th style="width: 250px;">Calificación de la categoría</th>
							<th style="width: 220px;">Calificación del cuestionario</th>
							<th style="width: 140px;">Nivel de riesgo</th>
						</tr>
						<tr>
							<td>Ambiente de trabajo</td>
							<td class="'.$colorADeTracFinalMas.'">'.$cAmbDeTrabajoFMas.'</td>
							<td class="'.$colorADeTracFinalMas.'">'.$nivelADeTracFinalMas.'</td>
						</tr>
						<tr>
							<td>Factores propios de la actividad</td>
							<td class="'.$colorcfpTracFinalMas.'">'.$cfPropdeActFMas.'</td>
							<td class="'.$colorcfpTracFinalMas.'">'.$nivelcfpTracFinalMas.'</td>
						</tr>
						<tr>
							<td>Organización del tiempo de trabajo</td>
							<td class="'.$colororgTFinalMas.'">'.$orgTimptFMas.'</td>
							<td class="'.$colororgTFinalMas.'">'.$nivelorgTFinalMas.'</td>
						</tr>
						<tr>
							<td>Liderazgo y relaciones en el trabajo</td>
							<td class="'.$colorlidRelFinalMas.'">'.$lidRelCFMas.'</td>
							<td class="'.$colorlidRelFinalMas.'">'.$nivelidRelFinalMas.'</td>
						</tr>
					</table>
				</div>
				<br>
				<div style="font-size: .9em;">
					<!-- // COMPRO II	 -->
					<h4>Nivel de riesgo por dominio</h4>

					<table>
						<tr>
							<th style="width: 250px;">Resultado del dominio</th>
							<th style="width: 220px;">Calificación del cuestionario</th>
							<th style="width: 140px;">Nivel de riesgo</th>
						</tr>
						<tr>
							<td>Condiciones en el ambiente de trabajo</td>
							<td class="'.$colorCADeTracFinalMas.'">'.$cConAmbDeTrabajoFMas.'</td>
							<td class="'.$colorCADeTracFinalMas.'">'.$nivelCADeTracFinalMas.'</td>
						</tr>
						<tr>
							<td>Carga de trabajo</td>
							<td class="'.$colorcCarDeTrabFinalMas.'">'.$cCarDeTrabFMas.'</td>
							<td class="'.$colorcCarDeTrabFinalMas.'">'.$nivelcCarDeTrabFinalMas.'</td>
						</tr>
						<tr>
							<td>Falta de control sobre el trabajo</td>
							<td class="'.$colorfdeContTrabFinalMas.'">'.$cFaltDeContTrabFMas.'</td>
							<td class="'.$colorfdeContTrabFinalMas.'">'.$nivelfdeContTrabFinalMas.'</td>
						</tr>
						<tr>
							<td>Jornada de trabajo</td>
							<td class="'.$colorjorDeTrabFinalMas.'">'.$jorDeTrabFMas.'</td>
							<td class="'.$colorjorDeTrabFinalMas.'">'.$niveljorDeTrabFinalMas.'</td>
						</tr>
						<tr>
							<td>Interferencia en la relación trabajo-familia</td>
							<td class="'.$colorinterEnRelFamFinalMas.'">'.$interEnRelFamFMas.'</td>
							<td class="'.$colorinterEnRelFamFinalMas.'">'.$nivelinterEnRelFamFMas.'</td>
						</tr>
						<tr>
							<td>Liderazgo</td>
							<td class="'.$colorliderazgoFinalMas.'">'.$liderazgoFMas.'</td>
							<td class="'.$colorliderazgoFinalMas.'">'.$nivelliderazgoFMas.'</td>
						</tr>
						<tr>
							<td>Relaciones en el trabajo</td>
							<td class="'.$colorrelaEnTrabFinalMas.'">'.$relaEntreTrabFMas.'</td>
							<td class="'.$colorrelaEnTrabFinalMas.'">'.$nivelrelaEnTrabFMas.'</td>
						</tr>
						<tr>
							<td>Violencia</td>
							<td class="'.$colorviolenciaFinalMas.'">'.$violenciaFMas.'</td>
							<td class="'.$colorviolenciaFinalMas.'">'.$nivelviolenciaFMas.'</td>
						</tr>
					</table>
				</div>
			</div>
			</div>
		</div>
	</div>



		';

	}



		$conPorCentro -> close();

	 ?>


</body>
</html>