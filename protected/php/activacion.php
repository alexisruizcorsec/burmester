<?php 

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");

if (isset($_GET['idUsuario']) && !empty($_GET['idUsuario'])) {

	$usrCrypt = '';
	

	$con = new SQLite3("../../protected/data/usuarios.db") or die("Problemas para conectar");
	$cs = $con -> query("SELECT usrCrypt FROM login WHERE usrCrypt = '$_GET[idUsuario]'");



	while ($resul = $cs -> fetchArray()) {

		$usrCrypt = $resul['usrCrypt'];	

	}

	if ($usrCrypt === $_GET['idUsuario']) {
		

		$actUsr = $con -> query("UPDATE login SET usrActivo = '1' WHERE usrCrypt = '$usrCrypt' ");

		$con -> close();


		echo '

			<!DOCTYPE html>
			<html lang="es">
			<head>
				<meta charset="UTF-8">
				<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
				<title>Activación de usuario</title>
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
							 			<img src="../img/activado.svg" class="img-fluid mx-auto animated swing delay-2s" style="width: 250px;">
							 			<h2 class="text-success">¡Felicidades!</h2>
							 			<br>
							 			<p>
							 				Tu correo ha sido activado exitosamente
							 			</p>
							 			<a href="../" class="btn btn-success btn-lg form-control">Click aquí para continuar</a>
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


		';

	}else{
		$con -> close();
		echo "<script> window.location='../error/alerta.aspx?error=usrIdNoValido';</script>";
	}

}else{
	// NO PUEDES VER ESTA PAGINA
	echo "<script> window.location='../error/alerta.aspx?error=404';</script>";
}



 ?>







