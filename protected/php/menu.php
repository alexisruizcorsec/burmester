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

	$con -> close();
	############### Termina Consulta a CORREO Existente ###############

	$resBus = (isset($resBus)) ? $resBus : '';

	############### Inicia Comprobación de si existe correo ###############
	if ($resBus === $_SESSION['codeMd5']) {

		$ocultar = '';
		$fechaIniCap = date("d-m-Y");
		$horaIniCap = date("g:i:s a");
		$fechaHoraIni = $fechaIniCap.' '.$horaIniCap;
		$_SESSION['fechaHoraIni'] = $fechaHoraIni;

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
	<title>NOM-035-STPS-2018</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/all.css">
	<link rel="stylesheet" href="../css/animate.css">
	<link rel="stylesheet" href="../css/style.css">

	
</head>
<body oncontextmenu='return false' onkeydown='return false'>
<!-- <body> -->

	 <div class="container-fluid animated fadeIn" <?php echo $ocultar; ?>>
	 	<div class="abs-center">
	 		
		 		<div class="bg-muted p-3" style="width: 800px;">
		 			<div class="row">
		 				<div class="col-md-10 mx-auto text-center jumbotron">
				 			<h1>Factores de riesgo psicosocial</h1>
				 			<h3>NOM-035-STPS-2018</h3>
				 			<!-- <img src="../img/cerebro.svg" class="img-fluid" style="width: 380px;"> -->
				 			<br>
				 			<div>

				 			<?php 

				 				############### Inicia Consulta a Usuario Existente ###############

				 				############### Inicia Consulta Cuestionario Guía Uno ###############
								$conDos = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

								$busUsrRUno = $conDos -> query("SELECT codeMd5_R1a FROM nom035R1a WHERE codeMd5_R1a = '$_SESSION[codeMd5]'");

								while ($usrCryptUno = $busUsrRUno->fetchArray()) {
									$codeMd5_R1a = $usrCryptUno['codeMd5_R1a'];
								}

								$codeMd5_R1a = (isset($codeMd5_R1a)) ? $codeMd5_R1a : '';

								if ($codeMd5_R1a === '') {
									$ocultarOptMenuUno = '';
									$acordeonUno =  'class="collapse show"';
									$acordeonDos =  'class="collapse"'; //cambiar nombre acordeonDos por acordeonTres
									$acordeonTres =  'class="collapse"'; //cambiar nombre acordeonTres por acordeonDos
								}else{
									$ocultarOptMenuUno = 'style="display: none;"';
									$acordeonUno =  'class="collapse"';
									$acordeonDos =  'class="collapse show"'; //cambiar nombre acordeonDos por acordeonTres
									$acordeonTres =  'class="collapse show"'; //cambiar nombre acordeonTres por acordeonDos
								}

								############### Termina Consulta Cuestionario Guía Uno ###############

								############### Inicia Consulta Cuestionario Guía Dos ###############
								$busUsrRDos = $conDos -> query("SELECT codeMd5_R2a FROM nom035R2a WHERE codeMd5_R2a = '$_SESSION[codeMd5]'");

								while ($usrCryptDos = $busUsrRDos->fetchArray()) {
									$codeMd5_R2a = $usrCryptDos['codeMd5_R2a'];
								}

								$codeMd5_R2a = (isset($codeMd5_R2a)) ? $codeMd5_R2a : '';

								if ($codeMd5_R2a === '') {
									$ocultarOptMenuDos = '';
								}else{
									$ocultarOptMenuDos = 'style="display: none;"';
								}

								############### Termina Consulta Cuestionario Guía Dos ###############

								############### Inicia Consulta Cuestionario Guía Tres ###############
								$busUsrRTres = $conDos -> query("SELECT codeMd5_R3a FROM nom035R3a WHERE codeMd5_R3a = '$_SESSION[codeMd5]'");

								while ($usrCryptTres = $busUsrRTres->fetchArray()) {
									$codeMd5_R3a = $usrCryptTres['codeMd5_R3a'];
								}

								$codeMd5_R3a = (isset($codeMd5_R3a)) ? $codeMd5_R3a : '';

								if ($codeMd5_R3a === '') {
									$ocultarOptMenuTres = '';
								}else{
									$ocultarOptMenuTres = 'style="display: none;"';
								}

								$conDos -> close();

								############### Termina Consulta Cuestionario Guía Tres ###############

								############### Inicia Consulta Cuestionario Guía Tres ###############

								if ($codeMd5_R1a > '' && $codeMd5_R1a == $codeMd5_R2a || $codeMd5_R1a > '' && $codeMd5_R1a === $codeMd5_R3a) {
									$cuestionarioFinal = 'Has concluido satisfactoria mente los cuestionarios';
									$ocultarCuestionario = '';
								}else{
									$cuestionarioFinal = '';
									$ocultarCuestionario = 'style="display: none;"';
								}

								############### Termina Consulta Cuestionario Guía Tres ###############



								############### Termina Consulta a Usuario Existente ###############



				 			 ?>

				 				<div class="accordion" id="menuGuias">
				 					<div class="card" <?php echo $ocultarOptMenuUno; ?>>
				 						<div class="card-header">
				 							<h2 class="mb-0">
				 								<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#guia01" aria-expanded="true">
				 									Guía de Referencia I
				 								</button>
				 							</h2>
				 						</div>

				 						<div id="guia01" <?php echo $acordeonUno; ?> data-parent="#menuGuias">
				 							<div class="card-body">
								        		Cuestionario para identificar a los trabajadores que fueron sujetos a acontecimientos traumáticos severos.
								        		<br>
								        		<img src="../img/cuestionario.svg" class="img-fluid">
								        		<div class="mt-3">
								        			<a href="../guia01/diagnostico.aspx" class="btn btn-secondary">Iniciar cuestionario</a>
								        		</div>								        		
								    		</div>
								    	</div>
									</div>
									
									<!-- ###### COMENTAR PARA DESACTIVAR GUÍA DE REFERENCIA II ###### -->

								    <!-- <div class="card" <?php echo $ocultarOptMenuDos; ?>>
								    	<div class="card-header">
								    		<h2 class="mb-0">
								    			<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#guia02" aria-expanded="false">
								    				Guía de Referencia II
								    			</button>
								    		</h2>
								    	</div>
								    	<div id="guia02" <?php echo $acordeonDos; ?> data-parent="#menuGuias">
								    		<div class="card-body">
								    		 	Cuestionario para identificación y análisis de los factores de riesgo psicosocial.
								    		 	<br>
								    		 	<img src="../img/cuestionario2.svg" class="img-fluid">
								        		<div class="mt-3">
								        			<a href="../guia02/diagnostico.aspx" class="btn btn-secondary">Iniciar cuestionario</a>
								        		</div>	
								    		</div>
								    	</div>
									</div> -->
									
									<!-- ###### COMENTAR PARA DESACTIVAR GUÍA DE REFERENCIA II ###### -->
									
									<!-- ###### COMENTAR PARA DESACTIVAR GUÍA DE REFERENCIA III ###### -->

								    <div class="card" <?php echo $ocultarOptMenuTres; ?>>
								    	<div class="card-header">
								    		<h2 class="mb-0">
								    			<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#guia03" aria-expanded="false">
								    				Guía de Referencia III
								    			</button>
								    		</h2>
								    	</div>
								    	<div id="guia03" <?php echo $acordeonTres; ?> data-parent="#menuGuias">
								    		<div class="card-body">
								    		 	Cuestionario para identificación y análisis de los factores de riesgo psicosocial y evaluación del entorno organizacional en los centros de trabajo.
								    		 	<br>
								    		 	<img src="../img/cuestionario3.svg" class="img-fluid">
								        		<div class="mt-3">
								        			<a href="../guia03/diagnostico.aspx" class="btn btn-secondary">Iniciar cuestionario</a>
								        		</div>	
								    		</div>
								    	</div>
									</div>
									
									<!-- ###### COMENTAR PARA DESACTIVAR GUÍA DE REFERENCIA III ###### -->

								    <!-- <div class="card">
								    	<div class="card-header">
								    		<h2 class="mb-0">
								    			<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#guia04" aria-expanded="false">
								    				Guía de Referencia IV
								    			</button>
								    		</h2>
								    	</div>
								    	<div id="guia04" class="collapse" data-parent="#menuGuias">
								    		<div class="card-body">
								    		 	Política de prevención de riesgos psicosociales.
								    		</div>
								    	</div>
								    </div> -->

								    <!-- <div class="card">
								    	<div class="card-header">
								    		<h2 class="mb-0">
								    			<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#guia05" aria-expanded="false">
								    				Guía de Referencia V
								    			</button>
								    		</h2>
								    	</div>
								    	<div id="guia05" class="collapse" data-parent="#menuGuias">
								    		<div class="card-body">
								    		 	Datos del trabajador.
								    		</div>
								    	</div>
									</div> -->
									<div <?php echo $ocultarCuestionario; ?>>
										<h3 class="text-danger"><?php echo $cuestionarioFinal; ?></h3>
									</div>
								    

								</div>

							</div>
				 			<br>
				 			<a href="../" class="btn btn-secondary btn-lg form-md-control">Click aquí para regresar</a>
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



