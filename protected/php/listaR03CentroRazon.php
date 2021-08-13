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
				 			<h3>Resultados Centro de Trabajo y Razón Social G III</h3>
				 			<!-- <img src="../img/cerebro.svg" class="img-fluid" style="width: 380px;"> -->
							 <br>
							 <table class="table table-striped table-hover">
								<tr>
									<th>Centro de Trabajo</th>
									<th>Razón Social</th>
									<th>Cantidad</th>
								</tr>
							 <?php

							############### Inicia Consulta Tabla Impresión ###############
							$con = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

							$busCentros = $con -> query("SELECT Corporativod,RazonSociald, COUNT(RazonSociald) AS cuantos FROM dataEmpleadosDos INNER JOIN nom035R3a ON Nombred = usrNombre_R3a GROUP BY Corporativod,RazonSociald ORDER BY Corporativod,RazonSociald");

							while ($centros = $busCentros->fetchArray()) {
								$corporativod = $centros['Corporativod'];
								$razonSociald = $centros['RazonSociald'];
								$cuantos = $centros['cuantos'];

								echo '

								<tr style="text-align: left;">
									<td><a href="../impreR03CentroRazon/impre.aspx?centro='.$corporativod.'&razonSoc='.$razonSociald.'" target="_blank" rel="noopener noreferrer">'.$corporativod.'</a></td>
									<td><a href="../impreR03CentroRazon/impre.aspx?centro='.$corporativod.'&razonSoc='.$razonSociald.'" target="_blank" rel="noopener noreferrer">'.$razonSociald.'</a></td>
									<td><a href="../impreR03CentroRazon/impre.aspx?centro='.$corporativod.'&razonSoc='.$razonSociald.'" target="_blank" rel="noopener noreferrer">'.$cuantos.'</a></td>
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



