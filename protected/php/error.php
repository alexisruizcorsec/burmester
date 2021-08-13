<?php 

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");


if (isset($_GET['error'])  && !empty($_GET['error'])) {

	switch ($_GET['error']) {
		case 'correoRegistrado':
			$tipoError = '
			<span class="h4 text-danger">'.$_GET['idCorreo'].'</span>
			<br>
			Correo registrado.
			<br>';
			break;
		case 'correoR01':
			$tipoError = '
			<span class="h4 text-danger">'.$_GET['idCorreo'].'</span>
			<br>
			Ya llenaste este cuestionario.
			<br>';
			break;

		case 'faltanCampos':
			$tipoError = '
			<span class="h4 text-danger">¡Llena todos los campos!</span>
			<br>';
			break;
		case 'usrRegistrado':
			$tipoError = '
			<span class="h4 text-danger">'.$_GET['idUsrReg'].'</span>
			<br>
			Tu registro fue exitoso.
			<br>';

			// esto no es lo correcto pero le da seguridad al usuario

			break;

		case 'usrNoValido':
			$tipoError = '
			<span class="h4 text-danger">¡Usuario no Registrado!</span>
			<br>
			Revisa tu Nombre y vuelve a intentarlo.
			<br>';
			break;

		case 'pswNoValido':
			$tipoError = '
			<span class="h4 text-danger">¡Password no valido!</span>
			<br>
			Revisa tu password.
			<br>';
			break;

		case 'usrNoActivo':
			$tipoError = '
			<span class="h4 text-danger">¡Aun no has activado tu cuenta!</span>
			<br>
			Te recomendamos revisar tu correo.
			<br>';
			break;

		case 'usrIdNoValido':
			$tipoError = '
			<span class="h4 text-danger">¡Correo no reconocido!</span>
			<br>
			<br>
			Parece que hay un error con tu correo, te recomendamos regístrate nuevamente.
			<br>';
			break;
		
		case 'numEmpNoValido':
			$tipoError = '
			<span class="h4 text-danger">¡Número de empleado no encontrado!</span>
			<br>
			<br>
			Parece que hay un error con tu número de empleado, te recomendamos regístrate nuevamente.
			<br>';
			break;

		default:
			$tipoError = '
			<span class="h4 text-danger">Error 404 "Página web no encontrada"</span> 
			';
			break;
	}


}else{
	$tipoError = '
	<span class="h4 text-danger">Error 404 "Página web no encontrada"</span> 
	';
}

 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>NOM-035</title>
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
				 			<!-- <img src="../img/error.svg" class="img-fluid mx-auto animated swing delay-2s" style="width: 300px;"> -->

				 			<!-- ¿si algo sale mal solo borra aquí y habilita arriba? -->

				 			<?php 

				 			if (!empty($_GET['idUsrReg'])) {

				 				echo '
				 				<img src="../img/activado.svg" class="img-fluid mx-auto animated swing delay-2s" style="width: 280px;">
				 				<h2>¡Completado!</h2>
				 				';
				 			}else{
				 				echo '
								<img src="../img/error.svg" class="img-fluid mx-auto animated swing delay-2s" style="width: 300px;">
								<h2>¡Parece que algo salió mal!</h2>
				 				';
				 			}

				 			 ?>

				 			 <!-- ¿si algo sale mal solo borra aquí y habilita arriba? -->
				 			
				 			<br>
				 			<p class="mb-5">
				 				<?php echo $tipoError; ?>
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



