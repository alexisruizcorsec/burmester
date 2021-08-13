<?php 
error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");
date_default_timezone_set('America/Mexico_City');

		$fechaIniCap = date("d-m-Y");
		$horaIniCap = date("g:i:s a");
		$fechaHoraIni = $fechaIniCap.' '.$horaIniCap;

		
		$con = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

		$cantidadTUsr = $con -> query("SELECT COUNT(id) AS totUsr FROM dataEmpleados");

		while ($usrTot = $cantidadTUsr->fetchArray()) {
			$totUsr = $usrTot['totUsr'];
		}

		############### Solo Inconcistencias ###############
		$faltanEnTUsr = $con -> query("SELECT COUNT(usrNombre_R1a) AS cuantoNoEstan FROM nom035R1a WHERE usrNombre_R1a NOT IN(SELECT Nombre FROM dataEmpleados)");

		while ($fUsrR1 = $faltanEnTUsr->fetchArray()) {
			$cuantoNoEstan = $fUsrR1['cuantoNoEstan'];
		}
		############### Solo Inconcistencias ###############	

		$cantidadR1 = $con -> query("SELECT COUNT(id) AS totalR1a FROM nom035R1a ");

		while ($usrR1 = $cantidadR1->fetchArray()) {
			$totalR1a = $usrR1['totalR1a'];
		}

		############### Solo Inconcistencias ###############	
		$titalSiLista = $totalR1a-$cuantoNoEstan;
		############### Solo Inconcistencias ###############	

		$tolFaltanR1a = $totUsr - ($totalR1a-$cuantoNoEstan);



		###################
		$cantidadR2 = $con -> query("SELECT COUNT(id) AS totalR2a FROM nom035R2a ");

		while ($usrR2 = $cantidadR2->fetchArray()) {
			$totalR2a = $usrR2['totalR2a'];
		}

		$tolFaltanR2a = $totUsr - $totalR2a;

		$con -> close();


 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Control de Avances</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			
			<div class="col-12 mx-auto" style="height: 950px;">
							
				<div class="row py-3">
					<div class="col-md-6 mx-auto">
						<h2>Guía I</h2>
						<h5>Cantidad de Capturas vs Total de Colaboradores Guía I</h5>
						<div class="mx-auto text-center m-3">
							<canvas id="graficaGuiaUno"></canvas>
						</div>
						
						<div class="row">
							<table class="table table-hover col-md-11 mx-auto m-3">
							<thead class="bg-primary text-white">
									<tr>
										<th>Corte: <?php echo $fechaHoraIni; ?></th>
										<th>Cantidad:</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Total:</td>
										<td><b><?php echo $totUsr; ?></b></td>
										
									</tr>
									<tr>
										<td>Contestaron:</td>
										<td class="text-success"><b><?php echo $titalSiLista; ?></b></td>
									</tr>
									<tr>
										<td>Faltan:</td>
										<td><b class="text-danger"><?php echo $tolFaltanR1a; ?></b></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<!-- ############### Inicia Bloque Guía II ###############	 -->
				<div class="row py-3">
					<div class="col-md-6 mx-auto">
						<h2>Guía II</h2>
						<h5>Cantidad de Capturas vs Total de Colaboradores Guía II</h5>
						<div class="mx-auto text-center m-3">
							<canvas id="graficaGuiaDos"></canvas>
						</div>
						<div class="row">
							<table class="table table-hover col-md-11 mx-auto m-3">
							<thead class="bg-primary text-white">
									<tr>
										<th>Corte: <?php echo $fechaHoraIni; ?></th>
										<th>Cantidad:</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Total:</td>
										<td><b><?php echo $totUsr; ?></b></td>
										
									</tr>
									<tr>
										<td>Contestaron:</td>
										<td class="text-success"><b><?php echo $totalR2a; ?></b></td>
									</tr>
									
									<tr>
										<td>Faltan:</td>
										<td><b class="text-danger"><?php echo $tolFaltanR2a; ?></b></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<!-- ############### Termina Bloque Guía II ###############	 -->


			</div>
		</div>
	</div>
	<script src="../js/jquery-3.3.1.slim.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/chart.js"></script>
	<script>
		var ctx = document.getElementById('graficaGuiaUno').getContext('2d');
		var chart = new Chart(ctx, {
		    // The type of chart we want to create
		    type: 'pie',

		    // The data for our dataset
		    data: {
		        labels: ['Contestaron', 'Faltan'],
		        datasets: [{
		        	label: 'Guia I',
		        	backgroundColor: ['#B0DD65', '#F55069'],
		            borderColor: ['#B0DD65', '#F55069'],
		            data: [<?php echo $titalSiLista; ?>, <?php echo $tolFaltanR1a; ?>]
		        }]
		    },

		    // Configuration options go here
		    options: {}
		});
	</script>
	<script>
		var ctx = document.getElementById('graficaGuiaDos').getContext('2d');
		var chart = new Chart(ctx, {
		    // The type of chart we want to create
		    type: 'pie',

		    // The data for our dataset
		    data: {
		        labels: ['Contestaron', 'Faltan'],
		        datasets: [{
		        	label: 'Guia I',
		        	backgroundColor: ['#B0DD65', '#F55069'],
		            borderColor: ['#B0DD65', '#F55069'],
		            data: [<?php echo $totalR2a; ?>, <?php echo $tolFaltanR2a; ?>]
		        }]
		    },

		    // Configuration options go here
		    options: {}
		});
	</script>
</body>
</html>