<?php 
error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");
date_default_timezone_set('America/Mexico_City');

		$fechaIniCap = date("d-m-Y");
		$horaIniCap = date("g:i:s a");
		$fechaHoraIni = $fechaIniCap.' '.$horaIniCap;

		
		$con = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

		$cantidadTUsr = $con -> query("SELECT COUNT(id) AS totUsr FROM dataEmpleadosInt");

		while ($usrTot = $cantidadTUsr->fetchArray()) {
			$totUsr = $usrTot['totUsr'];
		}

		############### Solo Inconcistencias ###############
		$faltanEnTUsr = $con -> query("SELECT COUNT(usrNombre_R1a) AS cuantoNoEstan FROM nom035R1a WHERE usrNombre_R1a NOT IN(SELECT Nombre FROM dataEmpleadosInt)");

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
		$cantidadR3 = $con -> query("SELECT COUNT(id) AS totalR3a FROM nom035R3a ");

		while ($usrR3 = $cantidadR3->fetchArray()) {
			$totalR3a = $usrR3['totalR3a'];
		}

		$tolFaltanR3a = $totUsr - $totalR3a;

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
					<div class="col-md-12 m-0 p-0">
					<h2>Guía I</h2>
					</div>
					<div class="col-md-6 mx-auto">
						<h5>Cantidad de Capturas vs Total de Colaboradores Guía I</h5>
						<div class="mx-auto text-center m-3">
							<canvas id="graficaGuiaUno"></canvas>
						</div>
						
						<div class="row">
							<table class="table table-hover col-md-11 mx-auto my-3">
							<thead class="bg-primary text-white">
									<tr>
										<th>Corte: <?php echo $fechaHoraIni; ?></th>
										<th>Cantidad:</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Total de colaboradores:</td>
										<td><b><?php echo $totUsr; ?></b></td>
										
									</tr>
									<tr>
										<td>Total de colaboradores que SI realizaron Guía I:</td>
										<td><b class="text-success"><?php echo $totalR1a; ?></b></td>
									</tr>
									
									<tr>
										<td>Total de colaboradores que NO realizaron Guía I:</td>
										<td><b class="text-danger"><?php echo $tolFaltanR1a; ?></b></td>
									</tr>
								</tbody>
							</table>
						</div>
						

					</div>
					<div class="col-md-6 mx-auto">
						<h5>Colaboradores que SI realizaron Guía I</h5>
						<div class="row">
							<table class="table table-hover col-12 mx-auto m-3 table-sm">
								<thead class="bg-primary text-white">
									<tr>
										<th>#</th>
										<th>Num:</th>
										<th>Nombre:</th>
										<th>Unidad:</th>
										<th>Cargo:</th>
										
									</tr>
								</thead>
								<tbody style="font-size: .5em;">
									
										<?php 
											$con = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

											$colSi = $con -> query("SELECT usrNumEmp_R1a,usrNombre_R1a,Corporativo,Puesto FROM nom035R1a INNER JOIN dataEmpleadosInt WHERE usrNombre_R1a = Nombre ORDER BY Corporativo,usrNombre_R1a,usrNumEmp_R1a,Puesto");
											$i=0;

											while ($usrSi = $colSi->fetchArray()) {
												$i++;
												$usrNumEmp_R1a = $usrSi['usrNumEmp_R1a'];
												$usrNombre_R1a = $usrSi['usrNombre_R1a'];
												$corporativo = $usrSi['Corporativo'];
												$puesto = $usrSi['Puesto'];

												echo '
												<tr>
													<td>'.$i.'</td>
													<td>'.$usrNumEmp_R1a.'</td>
													<td>'.$usrNombre_R1a.'</td>
													<td>'.$corporativo.'</td>
													<td>'.$puesto.'</td>
												</tr>
												';
											}

											$con -> close();

										 ?>
										
									
								</tbody>
							</table>
						</div>
					</div>
					<div class="col-md-6 mx-auto">
					</div>
					<div class="col-md-6 mx-auto">
						<h5>Colaboradores que NO realizaron Guía I</h5>
						<div class="row">
							<table class="table table-hover col-12 mx-auto m-3 table-sm">
								<thead class="bg-primary text-white">
									<tr>
										<th>#</th>
										<th>Num:</th>
										<th>Nombre:</th>
										<th>Unidad:</th>
										<th>Cargo:</th>
										
									</tr>
								</thead>
								<tbody style="font-size: .5em;">
									
										<?php 
											$con = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

											$colSi = $con -> query("SELECT NumEmpleado,Nombre,Corporativo,Puesto FROM dataEmpleadosInt WHERE Nombre NOT IN(SELECT usrNombre_R1a FROM nom035R1a) ORDER BY Corporativo,Nombre,NumEmpleado,Puesto");
											$i=0;

											while ($usrSi = $colSi->fetchArray()) {
												$i++;
												$numEmpleado = $usrSi['NumEmpleado'];
												$nombre = $usrSi['Nombre'];
												$corporativo = $usrSi['Corporativo'];
												$puesto = $usrSi['Puesto'];

												echo '
												<tr>
													<td>'.$i.'</td>
													<td>'.$numEmpleado.'</td>
													<td>'.$nombre.'</td>
													<td>'.$corporativo.'</td>
													<td>'.$puesto.'</td>
												</tr>
												';
											}

											$con -> close();

										 ?>
										
									
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<!-- ############### Inicia Bloque Guía III ###############	 -->
				<div class="row py-3">
					<div class="col-md-6 mx-auto">
						<h2>Guía III</h2>
					</div>
				</div>
				<div class="row py-3">
					<div class="col-md-6 mx-auto">
						<h5>Cantidad de Capturas vs Total de Colaboradores Guía III</h5>
						<div class="mx-auto text-center m-3">
							<canvas id="graficaGuiaDos"></canvas>
						</div>
						<div class="row">
							<table class="table table-hover col-md-11 mx-auto my-3">
							<thead class="bg-primary text-white">
									<tr>
										<th>Corte: <?php echo $fechaHoraIni; ?></th>
										<th>Cantidad:</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Total de colaboradores:</td>
										<td><b><?php echo $totUsr; ?></b></td>
										
									</tr>
									<tr>
										<td>Total de colaboradores que SI realizaron Guía III:</td>
										<td class="text-success"><b><?php echo $totalR3a; ?></b></td>
									</tr>
									
									<tr>
										<td>Total de colaboradores que NO realizaron Guía III:</td>
										<td><b class="text-danger"><?php echo $tolFaltanR3a; ?></b></td>
									</tr>
								</tbody>
							</table>

						</div>
						

					</div>
					<div class="col-md-6 mx-auto">
						<h5>Colaboradores que SI realizaron Guía III</h5>
						<div class="row">
							<table class="table table-hover col-12 mx-auto m-3 table-sm">
								<thead class="bg-primary text-white">
									<tr>
										<th>#</th>
										<th>Num:</th>
										<th>Nombre:</th>
										<th>Unidad:</th>
										<th>Cargo:</th>
										
									</tr>
								</thead>
								<tbody style="font-size: .5em;">
									
										<?php 
											$con = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

											$colSi = $con -> query("SELECT usrNumEmp_R3a,usrNombre_R3a,Corporativo,Puesto FROM nom035R3a INNER JOIN dataEmpleadosInt WHERE usrNombre_R3a = Nombre ORDER BY Corporativo,usrNombre_R3a,Puesto");
											$i=0;

											while ($usrSi = $colSi->fetchArray()) {
												$i++;
												$usrNumEmp_R3a = $usrSi['usrNumEmp_R3a'];
												$usrNombre_R3a = $usrSi['usrNombre_R3a'];
												$corporativo = $usrSi['Corporativo'];
												$puesto = $usrSi['Puesto'];

												echo '
												<tr>
													<td>'.$i.'</td>
													<td>'.$usrNumEmp_R3a.'</td>
													<td>'.$usrNombre_R3a.'</td>
													<td>'.$corporativo.'</td>
													<td>'.$puesto.'</td>
												</tr>
												';
											}

											$con -> close();

										 ?>
										
									
								</tbody>
							</table>
						</div>
					</div>
					<div class="col-md-6 mx-auto">

					</div>
					<div class="col-md-6 mx-auto">
						<h5>Colaboradores que NO realizaron Guía III</h5>
						<div class="row">
							<table class="table table-hover col-12 mx-auto m-3 table-sm">
								<thead class="bg-primary text-white">
									<tr>
										<th>#</th>
										<th>Num:</th>
										<th>Nombre:</th>
										<th>Unidad:</th>
										<th>Cargo:</th>
										
									</tr>
								</thead>
								<tbody style="font-size: .5em;">
									
										<?php 
											$con = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

											$colSi = $con -> query("SELECT NumEmpleado,Nombre,Corporativo,Puesto FROM dataEmpleadosInt WHERE Nombre NOT IN(SELECT usrNombre_R3a FROM nom035R3a) ORDER BY Corporativo,Nombre,NumEmpleado,Puesto");
											$i=0;

											while ($usrSi = $colSi->fetchArray()) {
												$i++;
												$NumEmpleado = $usrSi['NumEmpleado'];
												$nombre = $usrSi['Nombre'];
												$corporativo = $usrSi['Corporativo'];
												$puesto = $usrSi['Puesto'];


												echo '
												<tr>
													<td>'.$i.'</td>
													<td>'.$NumEmpleado.'</td>
													<td>'.$nombre.'</td>
													<td>'.$corporativo.'</td>
													<td>'.$puesto.'</td>
												</tr>
												';
											}

											$con -> close();

										 ?>
										
									
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<!-- ############### Termina Bloque Guía III ###############	 -->


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
		            data: [<?php echo $totalR3a; ?>, <?php echo $tolFaltanR3a; ?>]
		        }]
		    },

		    // Configuration options go here
		    options: {}
		});
	</script>
</body>
</html>