<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Registro de Nuevos Usuarios</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/all.css">
	<link rel="stylesheet" href="../css/animate.css">
	<link rel="stylesheet" href="../css/style.css">

	
</head>
<body>


	 <div class="container-fluid animated fadeIn">
	 	<div class="abs-center">
	 		
		 		<div class="bg-muted form p-3">
		 			<div class="row">
		 				<div class="col-12 text-center jumbotron">	
				 			<img src="../img/mail.svg" class="img-fluid mx-auto animated swing delay-2s" style="width: 250px;">
				 			<h2>¡Lista de usuarios Codificada:!</h2>
				 			<br>
				 			<p>
				 			<table class="table" style="font-size: .8em;">
				 				<tr>
				 					<th>id</th>
				 					<th>Nombre</th>
				 				</tr>
				 				
				 					
				 				
				 				<?php 

				 				error_reporting(E_ALL ^ E_DEPRECATED);
								header("Content-Type: text/html; Charset=UTF-8");

								$con = new SQLite3("../data/nom035.db") or die("Problemas para conectar");

								//BUSCA EL NUMERO DE EMPLEADO
								$cs = $con -> query("SELECT id,usrNombre_R1a,usrNombre_R1a FROM nom035R1a ORDER BY id");
								while ($resul = $cs -> fetchArray()) {
									$id = $resul['id'];
									$usrNombre_R1a = $resul['usrNombre_R1a'];
									$nombre = $resul['usrNombre_R1a'];

									echo '
									<tr>
									<td>'.$id.'</td>
									<td>'.$usrNombre_R1a.'</td>
									<td>'.md5($nombre).'</td>
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
	<script src="../js/forms.js"></script>

</body>
</html>



