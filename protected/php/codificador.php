<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Registro de Nuevos Usuarios</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/animate.css">

	
</head>
<body>


	 <div class="container animated fadeIn">
	 	<div class="abs-center">
	 		
		 		<div class="p-3">
		 			<div class="row">
		 				<div class="col-auto jumbotron mx-auto">	
							 <div class="text-center">
								 <img src="../img/mail.svg" class="img-fluid animated swing delay-2s" style="width: 250px;">
							 </div>
				 			<h2 class="text-center">¡Lista de usuarios Codificada:!</h2>
				 			<br>
				 			<p>
				 			<table class="table table-responsive-md" style="font-size: .8em;">
				 				<tr>
				 					<th>id</th>
				 					<th>Nombre</th>
				 					<th>Code</th>
				 				</tr>
				 				
				 					
				 				
				 				<?php 

				 				error_reporting(E_ALL ^ E_DEPRECATED);
								header("Content-Type: text/html; Charset=UTF-8");

								$con = new SQLite3("../data/nom035.db") or die("Problemas para conectar");

								//BUSCA EL NUMERO DE EMPLEADO
								$cs = $con -> query("SELECT id,NumEmpleado,Nombre FROM dataEmpleados ORDER BY id");
								while ($resul = $cs -> fetchArray()) {
									$id = $resul['id'];
									$nombre = $resul['Nombre'];

									echo '
									<tr>
									<td>'.$id.'</td>
									<td>'.$nombre.'</td>
									<td class="text-justify text-monospace">'.md5($nombre).'</td>
									</tr>
									';
								}



				 				 ?>
				 			</table>
				 			</p>
				 			<a href="../" class="btn btn-secondary btn-lg form-control">Click aquí para regresar</a>
			 			</div>
			 		</div>
			 	</div>
	 	</div>
	 </div>

	<script src="../js/jquery-3.3.1.slim.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>

</body>
</html>



