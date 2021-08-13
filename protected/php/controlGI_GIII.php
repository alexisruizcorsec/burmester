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
<body>


	 <div class="container-fluid animated fadeIn">
	 	<div class="abs-center">
	 		
		 		<div class="bg-muted p-3" style="width: 800px;">
		 			<div class="row">
		 				<div class="col-md-10 mx-auto text-center jumbotron">
				 			<h1>Sistema de control</h1>
				 			<h3>NOM-035-STPS-2018</h3>
				 			<!-- <img src="../img/cerebro.svg" class="img-fluid" style="width: 380px;"> -->
				 			<br>
				 			<div>

				 				<div class="accordion" id="menuGuias">
				 					<div class="card">
				 						<div class="card-header">
				 							<h2 class="mb-0">
				 								<button class="btn">
				 									Registros Guía de Referencia I
				 								</button>
				 							</h2>
				 						</div>

				 						<div id="guia01" class="collapse show" data-parent="#menuGuias">
				 							<div class="card-body">
								        		<table class="table">
								        			<tr>
												      <th scope="col">id</th>
												      <th scope="col">Fecha</th>
												      <!-- <th scope="col">Lugar</th> -->
												      <th scope="col">Nombre</th>
												      <th scope="col">Link</th>
												    </tr>
												    

												    <?php 

												    ############### Inicia Tabla ###############
													$con = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

													$usrG1a = $con -> query("SELECT id,dirEmpresa_R1a,usrNombre_R1a,codeMd5_R1a,fechaHoraFinal_R1a FROM nom035R1a ORDER BY id");

													while ($guiaR1a = $usrG1a->fetchArray()) {
														$id = $guiaR1a['id'];
														$dirEmpresa_R1a = $guiaR1a['dirEmpresa_R1a'];
														$usrNombre_R1a = $guiaR1a['usrNombre_R1a'];
														$codeMd5_R1a = $guiaR1a['codeMd5_R1a'];
														$fechaHoraFinal_R1a = $guiaR1a['fechaHoraFinal_R1a'];

														echo '<tr style="font-size: .8em;">';
														echo '<td>'.$id.'</td>';
														echo '<td>'.$fechaHoraFinal_R1a.'</td>';
														// echo '<td class="text-left">'.$dirEmpresa_R1a.'</td>';
														echo '<td class="text-left">'.$usrNombre_R1a.'</td>';
														echo '<td class="text-left"><a href="../impreR01/enviarResultados.aspx?correoCrypt_R1a='.$codeMd5_R1a.'">Imprimir</a></td>';
														echo '</tr>';
													}

													$usrG1aT = $con -> query("SELECT COUNT(usrNombre_R1a) AS totalCol FROM nom035R1a");

													while ($guiaR1aT = $usrG1aT->fetchArray()) {
														
														$totalCol = $guiaR1aT['totalCol'];
													}

													echo '
															<tr>
																<td><b>Total: </b></td>
																<td class="text-left"><b>'.$totalCol.'</b></td>
																<td></td>
																<td></td>
															</tr>

													';
													$con -> close();
													############### Termina Tabla ###############

												     ?>
												    
												    	
												    	
												    
								        		</table>								        		
								    		</div>
								    	</div>
								    </div>



								    <div class="card">
								    	<div class="card-header">
								    		<h2 class="mb-0">
								    			<button class="btn">
								    				Registros Guía de Referencia III
								    			</button>
								    		</h2>
								    	</div>
								    	<div id="guia03" class="collapse show" data-parent="#menuGuias">
								    		<div class="card-body">
								    			<table class="table">
								        			<tr>
												      <th scope="col">id</th>
												      <th scope="col">Fecha</th>
												      <!-- <th scope="col">Lugar</th> -->
												      <th scope="col">Nombre</th>
												      <th scope="col">Link</th>
												    </tr>
								    		 	<?php 

												    ############### Inicia Tabla ###############
													$con = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

													$usrG1a = $con -> query("SELECT id,dirEmpresa_R3a,usrNombre_R3a,codeMd5_R3a,fechaHoraFinal_R3a FROM nom035R3a ORDER BY id");

													while ($guiaR3a = $usrG1a->fetchArray()) {
														$id = $guiaR3a['id'];
														$dirEmpresa_R3a = $guiaR3a['dirEmpresa_R3a'];
														$usrNombre_R3a = $guiaR3a['usrNombre_R3a'];
														$codeMd5_R3a = $guiaR3a['codeMd5_R3a'];
														$fechaHoraFinal_R3a = $guiaR3a['fechaHoraFinal_R3a'];

														echo '<tr style="font-size: .8em;">';
														echo '<td>'.$id.'</td>';
														echo '<td>'.$fechaHoraFinal_R3a.'</td>';
														// echo '<td class="text-left">'.$dirEmpresa_R3a.'</td>';
														echo '<td class="text-left">'.$usrNombre_R3a.'</td>';
														echo '<td class="text-left"><a href="../impreR03/enviarResultados.aspx?correoCrypt_R3a='.$codeMd5_R3a.'">Imprimir</a></td>';
														echo '</tr>';
													}

													$usrG1aT = $con -> query("SELECT COUNT(usrNombre_R3a) AS totalCol FROM nom035R3a");

													while ($guiaR3aT = $usrG1aT->fetchArray()) {
														
														$totalCol = $guiaR3aT['totalCol'];
													}

													echo '
															<tr>
																<td><b>Total: </b></td>
																<td class="text-left"><b>'.$totalCol.'</b></td>
																<td></td>
																<td></td>
															</tr>

													';
													$con -> close();
													############### Termina Tabla ###############

												     ?>	
												</table>
								    		</div>
								    	</div>
								    </div>


								    <div class="card">
								    	<div class="card-header">
								    		<h2 class="mb-0">
								    			<button class="btn">
								    				Faltan por Contestar Guía III VS Guía I
								    			</button>
								    		</h2>
								    	</div>
								    	<div id="guia03" class="collapse show" data-parent="#menuGuias">
								    		<div class="card-body">
								    			<table class="table">
								        			<tr>
												      <th scope="col">id</th>
												      <th scope="col">Nombre</th>
												    </tr>
								    		 	<?php 

												    ############### Inicia Tabla ###############
													$con = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

													$usrG3aVsG1a = $con -> query("SELECT usrNombre_R1a FROM nom035R1a WHERE usrNombre_R1a NOT IN(SELECT usrNombre_R3a FROM nom035R3a) ORDER BY usrNombre_R1a");
													$i=0;

													while ($guiaR3aVSG1a = $usrG3aVsG1a->fetchArray()) {
														$i++;
														$usrNombre_R1a = $guiaR3aVSG1a['usrNombre_R1a'];

														echo '<tr class="bg-danger text-white" style="font-size: .8em;">';
														echo '<td>'.$i.'</td>';
														echo '<td>'.$usrNombre_R1a.'</td>';
														echo '</tr>';
													}

													$usrG3aTVSG1 = $con -> query("SELECT COUNT(usrNombre_R1a) AS totalCol FROM nom035R1a WHERE usrNombre_R1a NOT IN(SELECT usrNombre_R3a FROM nom035R3a)");

													while ($guiaR3aTVSG1 = $usrG3aTVSG1->fetchArray()) {
														
														$totalCol = $guiaR3aTVSG1['totalCol'];
													}

													echo '
															<tr>
																<td><b>Total: </b></td>
																<td class="text-left"><b>'.$totalCol.'</b></td>
															</tr>

													';
													$con -> close();
													############### Termina Tabla ###############

												     ?>	
												</table>
								    		</div>
								    	</div>
								    </div>


								    <div class="card">
								    	<div class="card-header">
								    		<h2 class="mb-0">
								    			<button class="btn">
								    				Faltan por Contestar Guía I VS Guía III
								    			</button>
								    		</h2>
								    	</div>
								    	<div id="guia03" class="collapse show" data-parent="#menuGuias">
								    		<div class="card-body">
								    			<table class="table">
								        			<tr>
												      <th scope="col">id</th>
												      <th scope="col">Nombre</th>
												    </tr>
								    		 	<?php 

												    ############### Inicia Tabla ###############
													$con = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

													$usrG1aVsG3a = $con -> query("SELECT usrNombre_R3a FROM nom035R3a WHERE usrNombre_R3a NOT IN(SELECT usrNombre_R1a FROM nom035R1a) ORDER BY usrNombre_R3a");
													$i=0;

													while ($guiaR1aVSG3a = $usrG1aVsG3a->fetchArray()) {
														$i++;
														$usrNombre_R3a = $guiaR1aVSG3a['usrNombre_R3a'];

														echo '<tr class="bg-danger text-white" style="font-size: .8em;">';
														echo '<td>'.$i.'</td>';
														echo '<td>'.$usrNombre_R3a.'</td>';
														echo '</tr>';
													}

													$usrG1aTVSG3a = $con -> query("SELECT COUNT(usrNombre_R3a) AS totalCol FROM nom035R3a WHERE usrNombre_R3a NOT IN(SELECT usrNombre_R1a FROM nom035R1a)");

													while ($guiaR1aTVSG3a = $usrG1aTVSG3a->fetchArray()) {
														
														$totalCol = $guiaR1aTVSG3a['totalCol'];
													}

													echo '
															<tr>
																<td><b>Total: </b></td>
																<td class="text-left"><b>'.$totalCol.'</b></td>
															</tr>

													';
													$con -> close();
													############### Termina Tabla ###############

												     ?>	
												</table>
								    		</div>
								    	</div>
								    </div>

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



