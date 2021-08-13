<?php 

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");
date_default_timezone_set('America/Mexico_City');

session_start();

if (isset($_SESSION['codeMd5']) && !empty($_SESSION['codeMd5'])) {
	


	############### Inicia Consulta a CORREO Existente ###############
	$con = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

	$busCorreo = $con -> query("SELECT codeMd5 FROM registroUsr WHERE codeMd5 = '$_SESSION[codeMd5]'");

	while ($usrCrypt = $busCorreo->fetchArray()) {
		$resBus = $usrCrypt['codeMd5'];
	}
	############### Termina Consulta a CORREO Existente ###############

	$resBus = (isset($resBus)) ? $resBus : '';

	############### Inicia Comprobación de si existe correo ###############
	if ($resBus === $_SESSION['codeMd5']) {

		$ocultar = '';

	}else{
		$ocultar = 'style="display: none;"'; // --> recuerda agregar esto en "container"
		echo "<script> window.location='../error/alerta.aspx?error=404';</script>";
	}

	

}else{
	$ocultar = 'style="display: none;"'; // --> recuerda agregar esto en "container"
	echo "<script> window.location='../error/alerta.aspx?error=404';</script>";
}

?>



<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Guía de Referencia I</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/all.css">
	<link rel="stylesheet" href="../css/animate.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/cuestionarioUno.css">
	<style>
		.ocultarCuadro{
			display: none;
		}
	</style>

	
</head>
<body oncontextmenu='return false' onkeydown='return false'>

	<div id="app">
	 <div class="container-fluid animated fadeIn" <?php echo $ocultar; ?>>
	 	<form action="../guiaR01/guardar.aspx" method="POST">
	 	<div class="row">
	 			<div class="p-0 fixed-top">
		 		<nav class="navbar navbar-expand-lg navbar-light bg-primary">
		 			<h3 class="navbar-brand text-light">NOM-035</h3>
		 			<div class="ml-auto">
						<input type="submit" class="btn btn-secondary btn-lg" value="Guardar">
					</div>
		 		</nav>
		 		</div>
	 	</div>
	 	<div class="row">
	 		<div class="col-md-8 mx-auto p-3">
	 			<br>
	 			<br>
	 			<div class="my-5 my-md-4 ">
	 			<h5>CUESTIONARIO PARA IDENTIFICAR A LOS TRABAJADORES QUE FUERON SUJETOS A ACONTECIMIENTOS TRAUMÁTICOS SEVEROS</h5>
	 			</div>
	 			<table class="table mb-5">
	 				<thead>
	 					<tr>
	 						<th class="col-10">Sección / Pregunta</th>
	 						<th class="col-2">Respuesta</th>
	 					</tr>
	 				</thead>
	 				<tbody>

	 					<!-- SECCIÓN I -->

							<tr>
		 						<th>{{seccionX[0]}}</th>
		 						<td></td>
		 					</tr>
		 					<tr>
		 						<td>Ha presenciado o sufrido alguna vez, durante o con motivo del trabajo un acontecimiento como los siguientes:</td>
		 						<td></td>
		 					</tr>

		 					<?php 

		 						$con = new SQLite3("../data/preguntas.db") or die("Problemas para conectar");
								$csI = $con -> query("SELECT * FROM guiaUno WHERE id BETWEEN '2' AND '7' ORDER BY id");

								while ($resulI = $csI -> fetchArray()) {

									$idI = $resulI['id'];
									$preguntaGuiaUnoI = $resulI['preguntaGuiaUno'];

									echo '
									<tr>
				 						<td>'.$preguntaGuiaUnoI.'</td>
				 						<td>
				 							<div class="form-check form-check-inline">
				 								<input class="option-input radio" type="radio" name="opt'.$idI.'" value="1" @click="opt'.$idI.' = 1, optDos'.$idI.' = 1" required>
				 								<label class="form-check-label">Sí</label>
				 							</div>
				 							<div class="form-check form-check-inline">
				 								<input class="option-input2 radio" type="radio" name="opt'.$idI.'" value="0" @click="opt'.$idI.' = 0, optDos'.$idI.' = 1" required>
				 								<label class="form-check-label">No</label>
				 							</div>
				 						</td>
				 					</tr>
				 					';
								}

		 					 ?>
		 					
		 					

		 				</tbody>

						<span class="ocultarCuadro">{{primeraCompro}}</span>



		 				<!-- SECCIÓN II -->
		 				<tbody v-if="color === false">

							<tr>
		 						<th>{{seccionX[1]}}</th>
		 						<td></td>
		 					</tr>
		 					<tr v-for="preII of preguntaII">
		 						<td>{{preII.preg}}</td>
		 						<td>
		 							<div class="form-check form-check-inline">
		 								<input class="option-input radio" type="radio" v-bind:name="preII.nOpt" value="1" required>
		 								<label class="form-check-label">Sí</label>
		 							</div>
		 							<div class="form-check form-check-inline">
		 								<input class="option-input2 radio" type="radio" v-bind:name="preII.nOpt" value="0" required>
		 								<label class="form-check-label">No</label>
		 							</div>
		 						</td>
		 					</tr>
		 				

		 				<!-- SECCIÓN III -->
							<tr>
		 						<th>{{seccionX[2]}}</th>
		 						<td></td>
		 					</tr>
		 					<tr v-for="preIII of preguntaIII">
		 						<td>{{preIII.preg}}</td>
		 						<td>
		 							<div class="form-check form-check-inline">
		 								<input class="option-input radio" type="radio" v-bind:name="preIII.nOpt" value="1" required>
		 								<label class="form-check-label">Sí</label>
		 							</div>
		 							<div class="form-check form-check-inline">
		 								<input class="option-input2 radio" type="radio" v-bind:name="preIII.nOpt" value="0" required>
		 								<label class="form-check-label">No</label>
		 							</div>
		 						</td>
		 					</tr>

		 				<!-- SECCIÓN IV -->

							<tr>
		 						<th>{{seccionX[3]}}</th>
		 						<td></td>
		 					</tr>
		 					<tr v-for="preIV of preguntaIV">
		 						<td>{{preIV.preg}}</td>
		 						<td>
		 							<div class="form-check form-check-inline">
		 								<input class="option-input radio" type="radio" v-bind:name="preIV.nOpt" value="1" required>
		 								<label class="form-check-label">Sí</label>
		 							</div>
		 							<div class="form-check form-check-inline">
		 								<input class="option-input2 radio" type="radio" v-bind:name="preIV.nOpt" value="0" required>
		 								<label class="form-check-label">No</label>
		 							</div>
		 						</td>
		 					</tr>

		 				</tbody>
		 			</table>	 			
	 		</div>

	 	</div>
	 	</form>
	 </div>
	</div>

	<script src="../js/jquery-3.3.1.slim.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/vue.js"></script>
	<script src="../js/oForm01.js"></script>
	<script src="../js/forms.js"></script>
	<script src="../js/info.js"></script>

</body>
</html>



