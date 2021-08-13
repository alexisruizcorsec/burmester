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
							 <h3>Resultados Centro de Trabajo y Razón Social G I, III y III Matriz con Acontecimientos</h3>
							 <small class="text-danger">Nota: Solo puedes usar este módulo, si todas las guías están contestadas.</small>
							 <br>
				 			<!-- <img src="../img/cerebro.svg" class="img-fluid" style="width: 380px;"> -->
							 <br>
							 <h4>Trabajadores que requieren valoración clínica</h4>
							 <table class="table table-striped table-hover">
								<tr>
									<th>Centro de Trabajo</th>
									<th>Razón Social</th>
									<th>Cantidad</th>
								</tr>
							 <?php

							############### Inicia Consulta Tabla Impresión ###############
							$con = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

							$busCentros = $con -> query("SELECT Corporativod,RazonSociald,carpetaPrincipal,carpetaSecundaria, COUNT(RazonSociald) AS cuantos FROM dataEmpleadosDos WHERE aconted = '2' GROUP BY Corporativod,RazonSociald ORDER BY Corporativod,RazonSociald");

							while ($centros = $busCentros->fetchArray()) {
								$corporativod = $centros['Corporativod'];
								$razonSociald = $centros['RazonSociald'];
								$carpetaPrincipal = $centros['carpetaPrincipal'];
								$carpetaSecundaria = $centros['carpetaSecundaria'];
								$cuantos = $centros['cuantos'];

								echo '

								<tr style="text-align: left;">
									<td><a href="../impreR00CentroRazonFullDosGI_GIII/impre.aspx?centro='.$corporativod.'&razonSoc='.$razonSociald.'&aconted=2&tipo=Requieren valoracion - '.$carpetaPrincipal.' - '.$carpetaSecundaria.'" target="_blank" rel="noopener noreferrer">'.$corporativod.'</a></td>
									<td><a href="../impreR00CentroRazonFullDosGI_GIII/impre.aspx?centro='.$corporativod.'&razonSoc='.$razonSociald.'&aconted=2&tipo=Requieren valoracion - '.$carpetaPrincipal.' - '.$carpetaSecundaria.'" target="_blank" rel="noopener noreferrer">'.$razonSociald.'</a></td>
									<td><a href="../impreR00CentroRazonFullDosGI_GIII/impre.aspx?centro='.$corporativod.'&razonSoc='.$razonSociald.'&aconted=2&tipo=Requieren valoracion - '.$carpetaPrincipal.' - '.$carpetaSecundaria.'" target="_blank" rel="noopener noreferrer">'.$cuantos.'</a></td>
								</tr>
								
								';
							}

							$con -> close();
							############### Termina Consulta Tabla Impresión ###############
							 
							 ?>

							 
								
							</table>

							<br>
							<br>
							<h4>Trabajadores que no requieren valoración clínica, presentaron acontecimientos traumáticos</h4>
							 <table class="table table-striped table-hover">
								<tr>
									<th>Centro de Trabajo</th>
									<th>Razón Social</th>
									<th>Cantidad</th>
								</tr>
							 <?php

							############### Inicia Consulta Tabla Impresión ###############
							$con = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

							$busCentros = $con -> query("SELECT Corporativod,RazonSociald,carpetaPrincipal,carpetaSecundaria, COUNT(RazonSociald) AS cuantos FROM dataEmpleadosDos WHERE aconted = '1' GROUP BY Corporativod,RazonSociald ORDER BY Corporativod,RazonSociald");

							while ($centros = $busCentros->fetchArray()) {
								$corporativod = $centros['Corporativod'];
								$razonSociald = $centros['RazonSociald'];
								$carpetaPrincipal = $centros['carpetaPrincipal'];
								$carpetaSecundaria = $centros['carpetaSecundaria'];
								$cuantos = $centros['cuantos'];

								echo '

								<tr style="text-align: left;">
									<td><a href="../impreR00CentroRazonFullDosGI_GIII/impre.aspx?centro='.$corporativod.'&razonSoc='.$razonSociald.'&aconted=1&tipo=No requieren valoracion - '.$carpetaPrincipal.' - '.$carpetaSecundaria.'" target="_blank" rel="noopener noreferrer">'.$corporativod.'</a></td>
									<td><a href="../impreR00CentroRazonFullDosGI_GIII/impre.aspx?centro='.$corporativod.'&razonSoc='.$razonSociald.'&aconted=1&tipo=No requieren valoracion - '.$carpetaPrincipal.' - '.$carpetaSecundaria.'" target="_blank" rel="noopener noreferrer">'.$razonSociald.'</a></td>
									<td><a href="../impreR00CentroRazonFullDosGI_GIII/impre.aspx?centro='.$corporativod.'&razonSoc='.$razonSociald.'&aconted=1&tipo=No requieren valoracion - '.$carpetaPrincipal.' - '.$carpetaSecundaria.'" target="_blank" rel="noopener noreferrer">'.$cuantos.'</a></td>
								</tr>
								
								';
							}

							$con -> close();
							############### Termina Consulta Tabla Impresión ###############
							 
							 ?>

							 
								
							</table>


							<br>
							<br>
							<h4>Trabajadores que no requieren valoración clínica</h4>
							 <table class="table table-striped table-hover">
								<tr>
									<th>Centro de Trabajo</th>
									<th>Razón Social</th>
									<th>Cantidad</th>
								</tr>
							 <?php

							############### Inicia Consulta Tabla Impresión ###############
							$con = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

							$busCentros = $con -> query("SELECT Corporativod,RazonSociald,carpetaPrincipal,carpetaSecundaria, COUNT(RazonSociald) AS cuantos FROM dataEmpleadosDos WHERE aconted = '0' GROUP BY Corporativod,RazonSociald ORDER BY Corporativod,RazonSociald");

							while ($centros = $busCentros->fetchArray()) {
								$corporativod = $centros['Corporativod'];
								$razonSociald = $centros['RazonSociald'];
								$carpetaPrincipal = $centros['carpetaPrincipal'];
								$carpetaSecundaria = $centros['carpetaSecundaria'];
								$cuantos = $centros['cuantos'];

								echo '

								<tr style="text-align: left;">
									<td><a href="../impreR00CentroRazonFullDosGI_GIII/impre.aspx?centro='.$corporativod.'&razonSoc='.$razonSociald.'&aconted=0&tipo=No fueron sujetos - '.$carpetaPrincipal.' - '.$carpetaSecundaria.'" target="_blank" rel="noopener noreferrer">'.$corporativod.'</a></td>
									<td><a href="../impreR00CentroRazonFullDosGI_GIII/impre.aspx?centro='.$corporativod.'&razonSoc='.$razonSociald.'&aconted=0&tipo=No fueron sujetos - '.$carpetaPrincipal.' - '.$carpetaSecundaria.'" target="_blank" rel="noopener noreferrer">'.$razonSociald.'</a></td>
									<td><a href="../impreR00CentroRazonFullDosGI_GIII/impre.aspx?centro='.$corporativod.'&razonSoc='.$razonSociald.'&aconted=0&tipo=No fueron sujetos - '.$carpetaPrincipal.' - '.$carpetaSecundaria.'" target="_blank" rel="noopener noreferrer">'.$cuantos.'</a></td>
								</tr>
								
								';
							}

							$con -> close();
							############### Termina Consulta Tabla Impresión ###############
							 
							 ?>

							 
								
							</table>
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



