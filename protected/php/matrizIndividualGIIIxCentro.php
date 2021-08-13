<?php 

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");
date_default_timezone_set('America/Mexico_City');

session_start();

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>NOM-035-STPS-2018</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/all.css">
	<link rel="stylesheet" href="../css/animate.css">
	<link rel="stylesheet" href="../css/style.css">

	
</head>
<!-- <body oncontextmenu='return false' onkeydown='return false'> -->
<body>

	 <div class="container-fluid animated fadeIn">
	 	<div class="abs-center">
	 		
		 		<div class="bg-muted p-3" style="width: 800px;">
		 			<div class="row">
		 				<div class="col-md-10 mx-auto text-center jumbotron">
				 			<h1>Menú de impresión</h1>
							 <h3>Matriz Guía de Referencia III Individual por centro de trabajo.</h3>
							 <small class="text-danger">Nota: Solo puedes usar este módulo, si todas las guías están contestadas y llenado el módulo de nombres cortos.</small>
							 <br>
				 			<!-- <img src="../img/cerebro.svg" class="img-fluid" style="width: 380px;"> -->
							 <br>
							 <table class="table table-striped table-hover">
								<tr>
									<th>Empresa</th>
									<th>Centro de Trabajo</th>
									<th>Colaboradores</th>
								</tr>
							 <?php

							############### Inicia Consulta Tabla Impresión ###############
							$con = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

							$busCentros = $con -> query("SELECT Empresad,carpetaPrincipal, COUNT(Empresad) AS cuantos FROM dataEmpleadosDos GROUP BY Empresad,carpetaPrincipal ORDER BY carpetaPrincipal");

							while ($centros = $busCentros->fetchArray()) {
								$empresad = $centros['Empresad'];
								$carpetaPrincipal = $centros['carpetaPrincipal'];
								$cuantos = $centros['cuantos'];

								echo '

								<tr>
									<td style="text-align: left;"><a href="../impreMatrizIndividualGIIIxCentro/impre.aspx?empresa='.$empresad.'&centroTrab='.$carpetaPrincipal.'" target="_blank" rel="noopener noreferrer">'.$empresad.'</a></td>
									<td style="text-align: center;"><a href="../impreMatrizIndividualGIIIxCentro/impre.aspx?empresa='.$empresad.'&centroTrab='.$carpetaPrincipal.'" target="_blank" rel="noopener noreferrer">'.$carpetaPrincipal.'</a></td>
									<td style="text-align: center;"><a href="../impreMatrizIndividualGIIIxCentro/impre.aspx?empresa='.$empresad.'&centroTrab='.$carpetaPrincipal.'" target="_blank" rel="noopener noreferrer">'.$cuantos.'</a></td>
								</tr>
								
								';
							}

							$con -> close();
							############### Termina Consulta Tabla Impresión ###############
							 
							 ?>

							 
								
							</table>

							<br>
							<br>

			 			</div>
			 		</div>
			 	</div>
	 	</div>
	 </div>

	<script src="../js/jquery-3.3.1.slim.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/forms.js"></script>
	<script src="../js/info.js"></script>

</body>
</html>



