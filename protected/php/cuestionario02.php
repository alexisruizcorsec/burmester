<?php 

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");

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
	<title>Guía de Referencia II</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/all.css">
	<link rel="stylesheet" href="../css/animate.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/cuestionarioDos.css">
	
</head>
<body>


	 <div class="container-fluid animated fadeIn" <?php echo $ocultar; ?>>
	 	<form action="../guiaR02/guardar.aspx" method="POST">
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
	 		<div class="col-md-10 mx-auto p-3">
	 			<br>
	 			<br>
	 			<div class="my-5 my-md-4 ">
	 			<h5>CUESTIONARIO PARA IDENTIFICAR LOS FACTORES DE RIESGO PSICOSOCIAL EN LOS CENTROS DE TRABAJO</h5>
	 			<br>
	 			

	 					<!-- PREGUNTA 1 -->
							<?php


								// CONSIDERACIONES B1
								$consideraUno = array(
									'Para responder las preguntas siguientes considere las condiciones de su centro de trabajo, así como la cantidad y ritmo de trabajo.',
									'Las preguntas siguientes están relacionadas con las actividades que realiza en su trabajo y las responsabilidades que tiene.',
									'Las preguntas siguientes están relacionadas con el tiempo destinado a su trabajo y sus responsabilidades familiares.',
									'Las preguntas siguientes están relacionadas con las decisiones que puede tomar en su trabajo.',
									'Las preguntas siguientes están relacionadas con la capacitación e información que recibe sobre su trabajo.',
									'Las preguntas siguientes se refieren a las relaciones con sus compañeros de trabajo y su jefe.',
									'Las preguntas siguientes están relacionadas con la atención a clientes y usuarios.',
									'Las siguientes preguntas están relacionadas con las actitudes de los trabajadores que supervisa.'
								);

								echo '
								<b>'.$consideraUno[0].'</b>
								</div>
								<table class="table mb-5">
								<tbody>
								';

								// PREGUNTAS
								$preguntasUno = array(
									'Mi trabajo me exige hacer mucho esfuerzo físico',
									'Me preocupa sufrir un accidente en mi trabajo',
									'Considero que las actividades que realizo son peligrosas',
									'Por la cantidad de trabajo que tengo debo quedarme tiempo adicional a mi turno',
									'Por la cantidad de trabajo que tengo debo trabajar sin parar',
									'Considero que es necesario mantener un ritmo de trabajo acelerado',
									'Mi trabajo exige que esté muy concentrado',
									'Mi trabajo requiere que memorice mucha información',
									'Mi trabajo exige que atienda varios asuntos al mismo tiempo'
								);

								// CONTADOR DE PREGUNTAS
								$contarPreguntasUno = count($preguntasUno);

								// INICIA CON NUMERO DE PREGUNTA
								$iniPregunta = 1;

								for($x = 0; $x < $contarPreguntasUno; $x++) {


									$numPregunta = $iniPregunta;
									
									echo '
									<tr>
									<td>'.$numPregunta.'.-</td>
	 								<td>';
	 								echo $preguntasUno[$x];
	 								echo '
									<div class="">
									';
										include 'radioOptUno.php';

									echo '
									</div>
									</td>
									</tr>
									';

									// VALOR ASCENDENTE NUMERO DE PREGUNTA
									$numPregunta = $iniPregunta++;

								}

							echo '
							</tbody>
							</table>
							';



							// PREGUNTAS B2


							echo '
								<br>
								<hr>
								<div class="my-5 my-md-4 ">
								<b>'.$consideraUno[1].'</b>
								<br>
								<br>
								<table class="table mb-5">
								<tbody>
								';

								// PREGUNTAS
								$preguntasdDos = array(
									'En mi trabajo soy responsable de cosas de mucho valor',
									'Respondo ante mi jefe por los resultados de toda mi área de trabajo',
									'En mi trabajo me dan órdenes contradictorias',
									'Considero que en mi trabajo me piden hacer cosas innecesarias'
								);

								// CONTADOR DE PREGUNTAS
								$contarPreguntasdDos = count($preguntasdDos);

								// INICIA CON NUMERO DE PREGUNTA
								$iniPregunta = 10;

								for($x = 0; $x < $contarPreguntasdDos; $x++) {


									$numPregunta = $iniPregunta;
									
									echo '
									<tr>
									<td>'.$numPregunta.'.-</td>
	 								<td>';
	 								echo $preguntasdDos[$x];
	 								echo '
									<div class="">
									';
										include 'radioOptUno.php';

									echo '
									</div>
									</td>
									</tr>
									';

									// VALOR ASCENDENTE NUMERO DE PREGUNTA
									$numPregunta = $iniPregunta++;

								}

							echo '
							</tbody>
							</table>
							</div>
							';


							// PREGUNTAS B3


							echo '
								<br>
								<hr>
								<div class="my-5 my-md-4 ">
								<b>'.$consideraUno[2].'</b>
								<br>
								<br>
								<table class="table mb-5">
								<tbody>
								';

								// PREGUNTAS
								$preguntasdTres = array(
									'Trabajo horas extras más de tres veces a la semana',
									'Mi trabajo me exige laborar en días de descanso, festivos o fines de semana',
									'Considero que el tiempo en el trabajo es mucho y perjudica mis actividades familiares o personales',
									'Pienso en las actividades familiares o personales cuando estoy en mi trabajo'
								);

								// CONTADOR DE PREGUNTAS
								$contarPreguntasdTres = count($preguntasdTres);

								// INICIA CON NUMERO DE PREGUNTA
								$iniPregunta = 14;

								for($x = 0; $x < $contarPreguntasdTres; $x++) {


									$numPregunta = $iniPregunta;
									
									echo '
									<tr>
									<td>'.$numPregunta.'.-</td>
	 								<td>';
	 								echo $preguntasdTres[$x];
	 								echo '
									<div class="">
									';
										include 'radioOptUno.php';

									echo '
									</div>
									</td>
									</tr>
									';

									// VALOR ASCENDENTE NUMERO DE PREGUNTA
									$numPregunta = $iniPregunta++;

								}

							echo '
							</tbody>
							</table>
							</div>
							';

							// PREGUNTAS B4


							echo '
								<br>
								<hr>
								<div class="my-5 my-md-4 ">
								<b>'.$consideraUno[3].'</b>
								<br>
								<br>
								<table class="table mb-5">
								<tbody>
								';

								// PREGUNTAS
								$preguntasdCuatro = array(
									'Mi trabajo permite que desarrolle nuevas habilidades',
									'En mi trabajo puedo aspirar a un mejor puesto',
									'Durante mi jornada de trabajo puedo tomar pausas cuando las necesito',
									'Puedo decidir la velocidad a la que realizo mis actividades en mi trabajo',
									'Puedo cambiar el orden de las actividades que realizo en mi trabajo'
								);

								// CONTADOR DE PREGUNTAS
								$contarPreguntasdCuatro = count($preguntasdCuatro);

								// INICIA CON NUMERO DE PREGUNTA
								$iniPregunta = 18;

								for($x = 0; $x < $contarPreguntasdCuatro; $x++) {


									$numPregunta = $iniPregunta;
									
									echo '
									<tr>
									<td>'.$numPregunta.'.-</td>
	 								<td>';
	 								echo $preguntasdCuatro[$x];
	 								echo '
									<div class="">
									';
										include 'radioOptDos.php';

									echo '
									</div>
									</td>
									</tr>
									';

									// VALOR ASCENDENTE NUMERO DE PREGUNTA
									$numPregunta = $iniPregunta++;

								}

							echo '
							</tbody>
							</table>
							</div>
							';

							// PREGUNTAS B5


							echo '
								<br>
								<hr>
								<div class="my-5 my-md-4 ">
								<b>'.$consideraUno[4].'</b>
								<br>
								<br>
								<table class="table mb-5">
								<tbody>
								';

								// PREGUNTAS
								$preguntasdCinco = array(
									'Me informan con claridad cuáles son mis funciones',
									'Me explican claramente los resultados que debo obtener en mi trabajo',
									'Me informan con quién puedo resolver problemas o asuntos de trabajo',
									'Me permiten asistir a capacitaciones relacionadas con mi trabajo',
									'Recibo capacitación útil para hacer mi trabajo'
								);

								// CONTADOR DE PREGUNTAS
								$contarPreguntasdCinco = count($preguntasdCinco);

								// INICIA CON NUMERO DE PREGUNTA
								$iniPregunta = 23;

								for($x = 0; $x < $contarPreguntasdCinco; $x++) {


									$numPregunta = $iniPregunta;
									
									echo '
									<tr>
									<td>'.$numPregunta.'.-</td>
	 								<td>';
	 								echo $preguntasdCinco[$x];
	 								echo '
									<div class="">
									';
										include 'radioOptDos.php';

									echo '
									</div>
									</td>
									</tr>
									';

									// VALOR ASCENDENTE NUMERO DE PREGUNTA
									$numPregunta = $iniPregunta++;

								}

							echo '
							</tbody>
							</table>
							</div>
							';

							// PREGUNTAS B6-A


							echo '
								<br>
								<hr>
								<div class="my-5 my-md-4 ">
								<b>'.$consideraUno[5].'</b>
								<br>
								<br>
								<table class="table mb-5">
								<tbody>
								';

								// PREGUNTAS
								$preguntasdSeisA = array(
									'Mi jefe tiene en cuenta mis puntos de vista y opiniones',
									'Mi jefe ayuda a solucionar los problemas que se presentan en el trabajo',
									'Puedo confiar en mis compañeros de trabajo',
									'Cuando tenemos que realizar trabajo de equipo los compañeros colaboran',
									'Mis compañeros de trabajo me ayudan cuando tengo dificultades',
									'En mi trabajo puedo expresarme libremente sin interrupciones'
								);

								// CONTADOR DE PREGUNTAS
								$contarPreguntasdSeisA = count($preguntasdSeisA);

								// INICIA CON NUMERO DE PREGUNTA
								$iniPregunta = 28;

								for($x = 0; $x < $contarPreguntasdSeisA; $x++) {


									$numPregunta = $iniPregunta;
									
									echo '
									<tr>
									<td>'.$numPregunta.'.-</td>
	 								<td>';
	 								echo $preguntasdSeisA[$x];
	 								echo '
									<div class="">
									';
										include 'radioOptDos.php';

									echo '
									</div>
									</td>
									</tr>
									';

									// VALOR ASCENDENTE NUMERO DE PREGUNTA
									$numPregunta = $iniPregunta++;

								}



							// PREGUNTAS B6-B


								// PREGUNTAS
								$preguntasdSeisB = array(
									'Recibo críticas constantes a mi persona y/o trabajo',
									'Recibo burlas, calumnias, difamaciones, humillaciones o ridiculizaciones',
									'Se ignora mi presencia o se me excluye de las reuniones de trabajo y en la toma de decisiones',
									'Se manipulan las situaciones de trabajo para hacerme parecer un mal trabajador',
									'Se ignoran mis éxitos laborales y se atribuyen a otros trabajadores',
									'Me bloquean o impiden las oportunidades que tengo para obtener ascenso o mejora en mi trabajo',
									'He presenciado actos de violencia en mi centro de trabajo'
								);

								// CONTADOR DE PREGUNTAS
								$contarPreguntasdSeisB = count($preguntasdSeisB);

								// INICIA CON NUMERO DE PREGUNTA
								$iniPregunta = 34;

								for($x = 0; $x < $contarPreguntasdSeisB; $x++) {


									$numPregunta = $iniPregunta;
									
									echo '
									<tr>
									<td>'.$numPregunta.'.-</td>
	 								<td>';
	 								echo $preguntasdSeisB[$x];
	 								echo '
									<div class="">
									';
										include 'radioOptUno.php';

									echo '
									</div>
									</td>
									</tr>
									';

									// VALOR ASCENDENTE NUMERO DE PREGUNTA
									$numPregunta = $iniPregunta++;

								}

							echo '
							</tbody>
							</table>
							</div>
							';

							// PREGUNTAS B7


							echo '
								<br>
								<hr>
								<div class="my-5 my-md-4 ">
								<b>'.$consideraUno[6].'</b>
								<br>
								<br>
								<div id="app">
								<table class="table mb-5">
								<tbody>
								
								<td></td>
								<td class="pt-md-4 pt-5">En mi trabajo debo brindar servicio a clientes o usuarios:</td>
								<td>
		 							<div class="form-check form-check-inline">
		 								<input class="option-input radio" type="radio" name="optActOptUno" value="1" @click="c7Opt = '."'".'mostrar'."'".'" required>
		 								<label class="form-check-label" style="margin-top: 25px; margin-right:20px;">Sí</label>
		 							</div>
		 							<div class="form-check form-check-inline">
		 								<input class="option-input2 radio" type="radio" name="optActOptUno" value="0" @click="c7Opt = '."'".'ocultar'."'".'" required>
		 								<label class="form-check-label" style="margin-top: 25px; margin-right:20px;">No</label>
		 							</div>
		 						</td>
								
		 						</tbody>
								</table>
								';
							// PREGUNTAS B7 COLLAPSE


							echo '
								<br>
								<hr>

								<div class="my-5 my-md-4 ">
								<b>Si su respuesta fue "SÍ", responda las preguntas siguientes. Si su respuesta fue "NO" pase a las preguntas de la sección siguiente.</b>
								<br>
								<br>
								<div v-if="c7Opt === '."'".'mostrar'."'".'">
								<table class="table mb-5">
								<tbody>
								';

								// PREGUNTAS
								$preguntasdSiete = array(
									'Atiendo clientes o usuarios muy enojados',
									'Mi trabajo me exige atender personas muy necesitadas de ayuda o enfermas',
									'Para hacer mi trabajo debo demostrar sentimientos distintos a los míos'								
								);

								// CONTADOR DE PREGUNTAS
								$contarPreguntasdSiete = count($preguntasdSiete);

								// INICIA CON NUMERO DE PREGUNTA
								$iniPregunta = 41;

								for($x = 0; $x < $contarPreguntasdSiete; $x++) {


									$numPregunta = $iniPregunta;
									
									echo '
									<tr>
									<td>'.$numPregunta.'.-</td>
	 								<td>';
	 								echo $preguntasdSiete[$x];
	 								echo '
									<div class="">
									';
										include 'radioOptUno.php';

									echo '
									</div>
									</td>
									</tr>
									';

									// VALOR ASCENDENTE NUMERO DE PREGUNTA
									$numPregunta = $iniPregunta++;

								}

							echo '
							</tbody>
							</table>
							</div>
							</div>';


							// PREGUNTAS B8


							echo '
								<br>
								<hr>
								<div class="my-5 my-md-4 ">
								<b>'.$consideraUno[7].'</b>
								<br>
								<br>
								<table class="table mb-5">
								<tbody>
								
								<td></td>
								<td class="pt-md-4 pt-5">Soy jefe de otros trabajadores:</td>
								<td>
		 							<div class="form-check form-check-inline">
		 								<input class="option-input radio" type="radio" name="optActOptDos" value="1" @click="c8Opt = '."'".'mostrar'."'".'" required>
		 								<label class="form-check-label" style="margin-top: 25px; margin-right:20px;">Sí</label>
		 							</div>
		 							<div class="form-check form-check-inline">
		 								<input class="option-input2 radio" type="radio" name="optActOptDos" value="0" @click="c8Opt = '."'".'ocultar'."'".'" required>
		 								<label class="form-check-label" style="margin-top: 25px; margin-right:20px;">No</label>
		 							</div>
		 						</td>
								
		 						</tbody>
								</table>
								';

							// PREGUNTAS B8 COLLAPSE


							echo '
								<br>
								<hr>
								<div class="my-5 my-md-4 ">
								<b>Si su respuesta fue "SÍ", responda las preguntas siguientes. Si su respuesta fue "NO", ha concluido el cuestionario.</b>
								<br>
								<br>
								<div v-if="c8Opt === '."'".'mostrar'."'".'">
								<table class="table mb-5">
								<tbody>
								';

								// PREGUNTAS
								$preguntasdOcho = array(
									'Comunican tarde los asuntos de trabajo',
									'Dificultan el logro de los resultados del trabajo',
									'Ignoran las sugerencias para mejorar su trabajo'								
								);

								// CONTADOR DE PREGUNTAS
								$contarPreguntasdOcho = count($preguntasdOcho);

								// INICIA CON NUMERO DE PREGUNTA
								$iniPregunta = 44;

								for($x = 0; $x < $contarPreguntasdOcho; $x++) {


									$numPregunta = $iniPregunta;
									
									echo '
									<tr>
									<td>'.$numPregunta.'.-</td>
	 								<td>';
	 								echo $preguntasdOcho[$x];
	 								echo '
									<div>
									';
										include 'radioOptUno.php';

									echo '
									</div>
									</td>
									</tr>
									';

									// VALOR ASCENDENTE NUMERO DE PREGUNTA
									$numPregunta = $iniPregunta++;

								}

							echo '
							</tbody>
							</table>
							</div>
							</div>
							</div>
							</div>';


							 ?>




	 					 	
				</div>
			</div>
		</form>
	</div>

	<script src="../js/jquery-3.3.1.slim.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/vue.js"></script>
	<script src="../js/forms.js"></script>
	<script src="../js/oForm02.js"></script>

</body>
</html>



