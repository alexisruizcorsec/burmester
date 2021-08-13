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
				 			<h3>Resultados individuales G III</h3>
				 			<!-- <img src="../img/cerebro.svg" class="img-fluid" style="width: 380px;"> -->
							 <br>
							 <table class="table table-striped table-hover">
								<tr>
									<th>Centro de Trabajo</th>
									<th>Cantidad</th>
								</tr>
							 <?php

							############### Inicia Consulta Tabla Impresión ###############
							$con = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

							$busCentros = $con -> query("SELECT dirEmpresa_R3a , COUNT(dirEmpresa_R3a ) AS cantidad FROM nom035R3a GROUP BY dirEmpresa_R3a ORDER BY dirEmpresa_R3a");

							while ($centros = $busCentros->fetchArray()) {
								$dirEmpresa_R3a = $centros['dirEmpresa_R3a'];
								$cantidad = $centros['cantidad'];

								echo '

								<tr style="text-align: left;">
									<td><a href="../impreR03ConclusionImpreCentro/impre.aspx?centro='.$dirEmpresa_R3a.'" target="_blank" rel="noopener noreferrer">'.$dirEmpresa_R3a.'</a></td>
									<td><a href="../impreR03ConclusionImpreCentro/impre.aspx?centro='.$dirEmpresa_R3a.'" target="_blank" rel="noopener noreferrer">'.$cantidad.'</a></td>
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



