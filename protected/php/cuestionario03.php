<?php 

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");

session_start();

if (isset($_SESSION['codeMd5']) && !empty($_SESSION['codeMd5'])) {
	$ocultar = '';




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
	<title>Guía de Referencia III</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/all.css">
	<link rel="stylesheet" href="../css/animate.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/cuestionarioDos.css">
	
</head>
<body oncontextmenu='return false' onkeydown='return false'>


	 <div class="container-fluid animated fadeIn" <?php echo $ocultar; ?>>
	 	<form action="../guiaR03/guardar.aspx" method="POST">

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
	 				<h5>CUESTIONARIO PARA IDENTIFICAR LOS FACTORES DE RIESGO PSICOSOCIAL Y EVALUAR EL ENTORNO ORGANIZACIONAL EN LOS CENTROS DE TRABAJO</h5>
	 				<br>
	 				<b>Para responder las preguntas siguientes considere las condiciones ambientales de su centro de trabajo.</b>
	 			</div>

		 		<table class="table mb-5">
		 			<tbody>
			 			<tr>
			 				<td>1.-</td>
			 				<td>
			 					El espacio donde trabajo me permite realizar mis actividades de manera segura e higiénica
								<div class="">
									<div class="form-check form-check-inline mx-1 mb-3">
		 								<input class="option-input radio" type="radio" name="opt1" value="0" required>
		 								<label class="form-check-label lvdeTexto">Siempre</label>
		 							</div>
		 							<div class="form-check form-check-inline mx-1 mb-3">
		 								<input class="option-input radio" type="radio" name="opt1" value="1" required>
		 								<label class="form-check-label lvdeTexto">Casi siempre</label>
		 							</div>
		 							<div class="form-check form-check-inline mx-1 mb-3">
		 								<input class="option-input radio" type="radio" name="opt1" value="2" required>
		 								<label class="form-check-label lvdeTexto">Algunas veces</label>
		 							</div>
		 							<div class="form-check form-check-inline mx-1 mb-3">
		 								<input class="option-input radio" type="radio" name="opt1" value="3" required>
		 								<label class="form-check-label lvdeTexto">Casi nunca</label>
		 							</div>
		 							<div class="form-check form-check-inline mx-1 mb-3">
		 								<input class="option-input radio" type="radio" name="opt1" value="4" required>
		 								<label class="form-check-label lvdeTexto">Nunca</label>
		 							</div>
								</div>
							</td>
						</tr>
						<tr>
			 				<td>2.-</td>
			 				<td>
			 					Mi trabajo me exige hacer mucho esfuerzo físico
								<div class="">
									<div class="form-check form-check-inline mx-1 mb-3">
		 								<input class="option-input radio" type="radio" name="opt2" value="4" required>
		 								<label class="form-check-label lvdeTexto">Siempre</label>
		 							</div>
		 							<div class="form-check form-check-inline mx-1 mb-3">
		 								<input class="option-input radio" type="radio" name="opt2" value="3" required>
		 								<label class="form-check-label lvdeTexto">Casi siempre</label>
		 							</div>
		 							<div class="form-check form-check-inline mx-1 mb-3">
		 								<input class="option-input radio" type="radio" name="opt2" value="2" required>
		 								<label class="form-check-label lvdeTexto">Algunas veces</label>
		 							</div>
		 							<div class="form-check form-check-inline mx-1 mb-3">
		 								<input class="option-input radio" type="radio" name="opt2" value="1" required>
		 								<label class="form-check-label lvdeTexto">Casi nunca</label>
		 							</div>
		 							<div class="form-check form-check-inline mx-1 mb-3">
		 								<input class="option-input radio" type="radio" name="opt2" value="0" required>
		 								<label class="form-check-label lvdeTexto">Nunca</label>
		 							</div>
								</div>
							</td>
						</tr>
						<tr>
			 				<td>3.-</td>
			 				<td>
			 					Me preocupa sufrir un accidente en mi trabajo
								<div class="">
									<div class="form-check form-check-inline mx-1 mb-3">
		 								<input class="option-input radio" type="radio" name="opt3" value="4" required>
		 								<label class="form-check-label lvdeTexto">Siempre</label>
		 							</div>
		 							<div class="form-check form-check-inline mx-1 mb-3">
		 								<input class="option-input radio" type="radio" name="opt3" value="3" required>
		 								<label class="form-check-label lvdeTexto">Casi siempre</label>
		 							</div>
		 							<div class="form-check form-check-inline mx-1 mb-3">
		 								<input class="option-input radio" type="radio" name="opt3" value="2" required>
		 								<label class="form-check-label lvdeTexto">Algunas veces</label>
		 							</div>
		 							<div class="form-check form-check-inline mx-1 mb-3">
		 								<input class="option-input radio" type="radio" name="opt3" value="1" required>
		 								<label class="form-check-label lvdeTexto">Casi nunca</label>
		 							</div>
		 							<div class="form-check form-check-inline mx-1 mb-3">
		 								<input class="option-input radio" type="radio" name="opt3" value="0" required>
		 								<label class="form-check-label lvdeTexto">Nunca</label>
		 							</div>
								</div>
							</td>
						</tr>
						<tr>
			 				<td>4.-</td>
			 				<td>
			 					Considero que en mi trabajo se aplican las normas de seguridad y salud en el trabajo
								<div class="">
									<div class="form-check form-check-inline mx-1 mb-3">
		 								<input class="option-input radio" type="radio" name="opt4" value="0" required>
		 								<label class="form-check-label lvdeTexto">Siempre</label>
		 							</div>
		 							<div class="form-check form-check-inline mx-1 mb-3">
		 								<input class="option-input radio" type="radio" name="opt4" value="1" required>
		 								<label class="form-check-label lvdeTexto">Casi siempre</label>
		 							</div>
		 							<div class="form-check form-check-inline mx-1 mb-3">
		 								<input class="option-input radio" type="radio" name="opt4" value="2" required>
		 								<label class="form-check-label lvdeTexto">Algunas veces</label>
		 							</div>
		 							<div class="form-check form-check-inline mx-1 mb-3">
		 								<input class="option-input radio" type="radio" name="opt4" value="3" required>
		 								<label class="form-check-label lvdeTexto">Casi nunca</label>
		 							</div>
		 							<div class="form-check form-check-inline mx-1 mb-3">
		 								<input class="option-input radio" type="radio" name="opt4" value="4" required>
		 								<label class="form-check-label lvdeTexto">Nunca</label>
		 							</div>
								</div>
							</td>
						</tr>
						<tr>
			 				<td>5.-</td>
			 				<td>
			 					Considero que las actividades que realizo son peligrosas
								<div class="">
									<div class="form-check form-check-inline mx-1 mb-3">
		 								<input class="option-input radio" type="radio" name="opt5" value="4" required>
		 								<label class="form-check-label lvdeTexto">Siempre</label>
		 							</div>
		 							<div class="form-check form-check-inline mx-1 mb-3">
		 								<input class="option-input radio" type="radio" name="opt5" value="3" required>
		 								<label class="form-check-label lvdeTexto">Casi siempre</label>
		 							</div>
		 							<div class="form-check form-check-inline mx-1 mb-3">
		 								<input class="option-input radio" type="radio" name="opt5" value="2" required>
		 								<label class="form-check-label lvdeTexto">Algunas veces</label>
		 							</div>
		 							<div class="form-check form-check-inline mx-1 mb-3">
		 								<input class="option-input radio" type="radio" name="opt5" value="1" required>
		 								<label class="form-check-label lvdeTexto">Casi nunca</label>
		 							</div>
		 							<div class="form-check form-check-inline mx-1 mb-3">
		 								<input class="option-input radio" type="radio" name="opt5" value="0" required>
		 								<label class="form-check-label lvdeTexto">Nunca</label>
		 							</div>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
	 			
	 			

	 					<!-- PREGUNTA 1 -->
							<?php


								// CONSIDERACIONES C1
								$consideraUno = array(
									'Para responder a las preguntas siguientes piense en la cantidad y ritmo de trabajo que tiene.',
									'Las preguntas siguientes están relacionadas con el esfuerzo mental que le exige su trabajo.',
									'Las preguntas siguientes están relacionadas con las actividades que realiza en su trabajo y las responsabilidades que tiene.',
									'Las preguntas siguientes están relacionadas con su jornada de trabajo.',
									'Las preguntas siguientes están relacionadas con las decisiones que puede tomar en su trabajo.',
									'Las preguntas siguientes están relacionadas con cualquier tipo de cambio que ocurra en su trabajo (considere los últimos cambios realizados).',
									'Las preguntas siguientes están relacionadas con la capacitación e información que se le proporciona sobre su trabajo.',
									'Las preguntas siguientes están relacionadas con el o los jefes con quien tiene contacto.',
									'Las preguntas siguientes se refieren a las relaciones con sus compañeros.',
									'Las preguntas siguientes están relacionadas con la información que recibe sobre su rendimiento en el trabajo, el reconocimiento, el sentido de pertenencia y la estabilidad que le ofrece su trabajo.',
									'Las preguntas siguientes están relacionadas con actos de violencia laboral (malos tratos, acoso, hostigamiento, acoso psicológico).'
								);

								



							// PREGUNTAS C2


							echo '
								<br>
								<hr>
								<div class="my-5 my-md-4 ">
								<b>'.$consideraUno[0].'</b>
								<br>
								<br>
								<table class="table mb-5">
								<tbody>
								';

								// PREGUNTAS
								$preguntasdDos = array(
									'Por la cantidad de trabajo que tengo debo quedarme tiempo adicional a mi turno',
									'Por la cantidad de trabajo que tengo debo trabajar sin parar',
									'Considero que es necesario mantener un ritmo de trabajo acelerado'
								);

								// CONTADOR DE PREGUNTAS
								$contarPreguntasdDos = count($preguntasdDos);

								// INICIA CON NUMERO DE PREGUNTA
								$iniPregunta = 6;

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


							// PREGUNTAS C3


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
								$preguntasdTres = array(
									'Mi trabajo exige que esté muy concentrado',
									'Mi trabajo requiere que memorice mucha información',
									'En mi trabajo tengo que tomar decisiones difíciles muy rápido',
									'Mi trabajo exige que atienda varios asuntos al mismo tiempo'
								);

								// CONTADOR DE PREGUNTAS
								$contarPreguntasdTres = count($preguntasdTres);

								// INICIA CON NUMERO DE PREGUNTA
								$iniPregunta = 9;

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

							// PREGUNTAS C4


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
								$preguntasdCuatro = array(
									'En mi trabajo soy responsable de cosas de mucho valor',
									'Respondo ante mi jefe por los resultados de toda mi área de trabajo',
									'En el trabajo me dan órdenes contradictorias',
									'Considero que en mi trabajo me piden hacer cosas innecesarias'
								);

								// CONTADOR DE PREGUNTAS
								$contarPreguntasdCuatro = count($preguntasdCuatro);

								// INICIA CON NUMERO DE PREGUNTA
								$iniPregunta = 13;

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

							// PREGUNTAS C5


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
								$preguntasdCinco = array(
									'Trabajo horas extras más de tres veces a la semana',
									'Mi trabajo me exige laborar en días de descanso, festivos o fines de semana',
									'Considero que el tiempo en el trabajo es mucho y perjudica mis actividades familiares o personales',
									'Debo atender asuntos de trabajo cuando estoy en casa',
									'Pienso en las actividades familiares o personales cuando estoy en mi trabajo',
									'Pienso que mis responsabilidades familiares afectan mi trabajo'
								);

								// CONTADOR DE PREGUNTAS
								$contarPreguntasdCinco = count($preguntasdCinco);

								// INICIA CON NUMERO DE PREGUNTA
								$iniPregunta = 17;

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

							// PREGUNTAS C6


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
								$preguntasdSeis = array(
									'Mi trabajo permite que desarrolle nuevas habilidades',
									'En mi trabajo puedo aspirar a un mejor puesto',
									'Durante mi jornada de trabajo puedo tomar pausas cuando las necesito',
									'Puedo decidir cuánto trabajo realizo durante la jornada laboral',
									'Puedo decidir la velocidad a la que realizo mis actividades en mi trabajo',
									'Puedo cambiar el orden de las actividades que realizo en mi trabajo'
								);

								// CONTADOR DE PREGUNTAS
								$contarPreguntasdSeis = count($preguntasdSeis);

								// INICIA CON NUMERO DE PREGUNTA
								$iniPregunta = 23;

								for($x = 0; $x < $contarPreguntasdSeis; $x++) {


									$numPregunta = $iniPregunta;
									
									echo '
									<tr>
									<td>'.$numPregunta.'.-</td>
	 								<td>';
	 								echo $preguntasdSeis[$x];
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

							// PREGUNTAS C7


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
								$preguntasdSiete = array(
									'Los cambios que se presentan en mi trabajo dificultan mi labor'
								);

								// CONTADOR DE PREGUNTAS
								$contarPreguntasdSiete = count($preguntasdSiete);

								// INICIA CON NUMERO DE PREGUNTA
								$iniPregunta = 29;

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


								// PREGUNTAS
								$preguntasdSiete = array(
									'Cuando se presentan cambios en mi trabajo se tienen en cuenta mis ideas o aportaciones'
								);

								// CONTADOR DE PREGUNTAS
								$contarPreguntasdSiete = count($preguntasdSiete);

								// INICIA CON NUMERO DE PREGUNTA
								$iniPregunta = 30;

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

							// PREGUNTAS C8


							echo '
								<br>
								<hr>
								<div class="my-5 my-md-4 ">
								<b>'.$consideraUno[6].'</b>
								<br>
								<br>
								<table class="table mb-5">
								<tbody>
								';

								// PREGUNTAS
								$preguntasdOcho = array(
									
									'Me informan con claridad cuáles son mis funciones',
									'Me explican claramente los resultados que debo obtener en mi trabajo',
									'Me explican claramente los objetivos de mi trabajo',
									'Me informan con quién puedo resolver problemas o asuntos de trabajo',
									'Me permiten asistir a capacitaciones relacionadas con mi trabajo',
									'Recibo capacitación útil para hacer mi trabajo'
								);

								// CONTADOR DE PREGUNTAS
								$contarPreguntasdOcho = count($preguntasdOcho);

								// INICIA CON NUMERO DE PREGUNTA
								$iniPregunta = 31;

								for($x = 0; $x < $contarPreguntasdOcho; $x++) {


									$numPregunta = $iniPregunta;
									
									echo '
									<tr>
									<td>'.$numPregunta.'.-</td>
	 								<td>';
	 								echo $preguntasdOcho[$x];
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

							// PREGUNTAS C9


							echo '
								<br>
								<hr>
								<div class="my-5 my-md-4 ">
								<b>'.$consideraUno[7].'</b>
								<br>
								<br>
								<table class="table mb-5">
								<tbody>
								';

								// PREGUNTAS
								$preguntasdNueve = array(
									'Mi jefe ayuda a organizar mejor el trabajo',
									'Mi jefe tiene en cuenta mis puntos de vista y opiniones',
									'Mi jefe me comunica a tiempo la información relacionada con el trabajo',
									'La orientación que me da mi jefe me ayuda a realizar mejor mi trabajo',
									'Mi jefe ayuda a solucionar los problemas que se presentan en el trabajo'
								);

								// CONTADOR DE PREGUNTAS
								$contarPreguntasdNueve = count($preguntasdNueve);

								// INICIA CON NUMERO DE PREGUNTA
								$iniPregunta = 37;

								for($x = 0; $x < $contarPreguntasdNueve; $x++) {


									$numPregunta = $iniPregunta;
									
									echo '
									<tr>
									<td>'.$numPregunta.'.-</td>
	 								<td>';
	 								echo $preguntasdNueve[$x];
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

							// PREGUNTAS C10


							echo '
								<br>
								<hr>
								<div class="my-5 my-md-4 ">
								<b>'.$consideraUno[8].'</b>
								<br>
								<br>
								<table class="table mb-5">
								<tbody>
								';

								// PREGUNTAS
								$preguntasdDiez = array(
									'Puedo confiar en mis compañeros de trabajo',
									'Entre compañeros solucionamos los problemas de trabajo de forma respetuosa',
									'En mi trabajo me hacen sentir parte del grupo',
									'Cuando tenemos que realizar trabajo de equipo los compañeros colaboran',
									'Mis compañeros de trabajo me ayudan cuando tengo dificultades'
								);

								// CONTADOR DE PREGUNTAS
								$contarPreguntasdDiez = count($preguntasdDiez);

								// INICIA CON NUMERO DE PREGUNTA
								$iniPregunta = 42;

								for($x = 0; $x < $contarPreguntasdDiez; $x++) {


									$numPregunta = $iniPregunta;
									
									echo '
									<tr>
									<td>'.$numPregunta.'.-</td>
	 								<td>';
	 								echo $preguntasdDiez[$x];
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

							// PREGUNTAS C11


							echo '
								<br>
								<hr>
								<div class="my-5 my-md-4 ">
								<b>'.$consideraUno[9].'</b>
								<br>
								<br>
								<table class="table mb-5">
								<tbody>
								';

								// PREGUNTAS
								$preguntasdOnce = array(
									'Me informan sobre lo que hago bien en mi trabajo',
									'La forma como evalúan mi trabajo en mi centro de trabajo me ayuda a mejorar mi desempeño',
									'En mi centro de trabajo me pagan a tiempo mi salario',
									'El pago que recibo es el que merezco por el trabajo que realizo',
									'Si obtengo los resultados esperados en mi trabajo me recompensan o reconocen',
									'Las personas que hacen bien el trabajo pueden crecer laboralmente',
									'Considero que mi trabajo es estable'
								);

								// CONTADOR DE PREGUNTAS
								$contarPreguntasdOnce = count($preguntasdOnce);

								// INICIA CON NUMERO DE PREGUNTA
								$iniPregunta = 47;

								for($x = 0; $x < $contarPreguntasdOnce; $x++) {


									$numPregunta = $iniPregunta;
									
									echo '
									<tr>
									<td>'.$numPregunta.'.-</td>
	 								<td>';
	 								echo $preguntasdOnce[$x];
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

								// PREGUNTAS
								$preguntasdOnce = array(
									'En mi trabajo existe continua rotación de personal'
								);

								// CONTADOR DE PREGUNTAS
								$contarPreguntasdOnce = count($preguntasdOnce);

								// INICIA CON NUMERO DE PREGUNTA
								$iniPregunta = 54;

								for($x = 0; $x < $contarPreguntasdOnce; $x++) {


									$numPregunta = $iniPregunta;
									
									echo '
									<tr>
									<td>'.$numPregunta.'.-</td>
	 								<td>';
	 								echo $preguntasdOnce[$x];
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

								// PREGUNTAS
								$preguntasdOnce = array(
									'Siento orgullo de laborar en este centro de trabajo',
									'Me siento comprometido con mi trabajo'
								);

								// CONTADOR DE PREGUNTAS
								$contarPreguntasdOnce = count($preguntasdOnce);

								// INICIA CON NUMERO DE PREGUNTA
								$iniPregunta = 55;

								for($x = 0; $x < $contarPreguntasdOnce; $x++) {


									$numPregunta = $iniPregunta;
									
									echo '
									<tr>
									<td>'.$numPregunta.'.-</td>
	 								<td>';
	 								echo $preguntasdOnce[$x];
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


							//#########

							

							//#######


							// PREGUNTAS C12-A


							echo '
								<br>
								<hr>
								<div class="my-5 my-md-4 ">
								<b>'.$consideraUno[10].'</b>
								<br>
								<br>
								<table class="table mb-5">
								<tbody>
								';

								// PREGUNTAS
								$preguntasdDoceA = array(
									'En mi trabajo puedo expresarme libremente sin interrupciones'
								);

								// CONTADOR DE PREGUNTAS
								$contarPreguntasdDoceA = count($preguntasdDoceA);

								// INICIA CON NUMERO DE PREGUNTA
								$iniPregunta = 57;

								for($x = 0; $x < $contarPreguntasdDoceA; $x++) {


									$numPregunta = $iniPregunta;
									
									echo '
									<tr>
									<td>'.$numPregunta.'.-</td>
	 								<td>';
	 								echo $preguntasdDoceA[$x];
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



							// PREGUNTAS C12-B


								// PREGUNTAS
								$preguntasdDoceB = array(
									'Recibo críticas constantes a mi persona y/o trabajo',
									'Recibo burlas, calumnias, difamaciones, humillaciones o ridiculizaciones',
									'Se ignora mi presencia o se me excluye de las reuniones de trabajo y en la toma de decisiones',
									'Se manipulan las situaciones de trabajo para hacerme parecer un mal trabajador',
									'Se ignoran mis éxitos laborales y se atribuyen a otros trabajadores',
									'Me bloquean o impiden las oportunidades que tengo para obtener ascenso o mejora en mi trabajo',
									'He presenciado actos de violencia en mi centro de trabajo'
								);

								// CONTADOR DE PREGUNTAS
								$contarPreguntasdDoceB = count($preguntasdDoceB);

								// INICIA CON NUMERO DE PREGUNTA
								$iniPregunta = 58;

								for($x = 0; $x < $contarPreguntasdDoceB; $x++) {


									$numPregunta = $iniPregunta;
									
									echo '
									<tr>
									<td>'.$numPregunta.'.-</td>
	 								<td>';
	 								echo $preguntasdDoceB[$x];
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

							// PREGUNTAS C13


							echo '
								<br>
								<hr>
								<div class="my-5 my-md-4 ">
								<b>Las preguntas siguientes están relacionadas con la atención a clientes y usuarios.</b>
								<br>
								<br>
								<div id="app">
								<table class="table mb-5">
								<tbody>
								
								<td></td>
								<td class="pt-md-4 pt-5">En mi trabajo debo brindar servicio a clientes o usuarios:</td>
								<td>
		 							<div class="form-check form-check-inline">
		 								<input class="option-input radio" type="radio" name="optActOptUno" value="1" @click="c13Opt = '."'".'mostrar'."'".'" required>
		 								<label class="form-check-label" style="margin-top: 25px; margin-right:20px;">Sí</label>
		 							</div>
		 							<div class="form-check form-check-inline">
		 								<input class="option-input2 radio" type="radio" name="optActOptUno" value="0" @click="c13Opt = '."'".'ocultar'."'".'" required>
		 								<label class="form-check-label" style="margin-top: 25px; margin-right:20px;">No</label>
		 							</div>
		 						</td>
								
		 						</tbody>
								</table>
								';


							// PREGUNTAS C13 COLLAPSE


							echo '
								<br>
								<hr>

								<div class="my-5 my-md-4 ">
								<b>Si su respuesta fue "SÍ", responda las preguntas siguientes. Si su respuesta fue "NO" pase a las preguntas de la sección siguiente.</b>
								<br>
								<br>
								<div v-if="c13Opt === '."'".'mostrar'."'".'">
								<table class="table mb-5">
								<tbody>
								';

								// PREGUNTAS
								$preguntasdTrece = array(
									'Atiendo clientes o usuarios muy enojados',
									'Mi trabajo me exige atender personas muy necesitadas de ayuda o enfermas',
									'Para hacer mi trabajo debo demostrar sentimientos distintos a los míos',
									'Mi trabajo me exige atender situaciones de violencia'								
								);

								// CONTADOR DE PREGUNTAS
								$contarPreguntasdTrece = count($preguntasdTrece);

								// INICIA CON NUMERO DE PREGUNTA
								$iniPregunta = 65;

								for($x = 0; $x < $contarPreguntasdTrece; $x++) {


									$numPregunta = $iniPregunta;
									
									echo '
									<tr>
									<td>'.$numPregunta.'.-</td>
	 								<td>';
	 								echo $preguntasdTrece[$x];
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


							// PREGUNTAS C14


							echo '
								<br>
								<hr>
								<div class="my-5 my-md-4 ">
								<b>Las preguntas siguientes están relacionadas con las actitudes de las personas que supervisa.</b>
								<br>
								<br>
								<table class="table mb-5">
								<tbody>
								
								<td></td>
								<td class="pt-md-4 pt-5">Soy jefe de otros trabajadores:</td>
								<td>
		 							<div class="form-check form-check-inline">
		 								<input class="option-input radio" type="radio" name="optActOptDos" value="1" @click="c14Opt = '."'".'mostrar'."'".'" required>
		 								<label class="form-check-label" style="margin-top: 25px; margin-right:20px;">Sí</label>
		 							</div>
		 							<div class="form-check form-check-inline">
		 								<input class="option-input2 radio" type="radio" name="optActOptDos" value="0" @click="c14Opt = '."'".'ocultar'."'".'" required>
		 								<label class="form-check-label" style="margin-top: 25px; margin-right:20px;">No</label>
		 							</div>
		 						</td>
								
		 						</tbody>
								</table>
								';

							// PREGUNTAS C14 COLLAPSE


							echo '
								<br>
								<hr>
								<div class="my-5 my-md-4 ">
								<b>Si su respuesta fue "SÍ", responda las preguntas siguientes. Si su respuesta fue "NO", ha concluido el cuestionario.</b>
								<br>
								<br>
								<div v-if="c14Opt === '."'".'mostrar'."'".'">
								<table class="table mb-5">
								<tbody>
								';

								// PREGUNTAS
								$preguntasdCatorce = array(
									'Comunican tarde los asuntos de trabajo',
									'Dificultan el logro de los resultados del trabajo',
									'Cooperan poco cuando se necesita',
									'Ignoran las sugerencias para mejorar su trabajo'								
								);

								// CONTADOR DE PREGUNTAS
								$contarPreguntasdCatorce = count($preguntasdCatorce);

								// INICIA CON NUMERO DE PREGUNTA
								$iniPregunta = 69;

								for($x = 0; $x < $contarPreguntasdCatorce; $x++) {


									$numPregunta = $iniPregunta;
									
									echo '
									<tr>
									<td>'.$numPregunta.'.-</td>
	 								<td>';
	 								echo $preguntasdCatorce[$x];
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
							</div>
							</div>';




							 ?>




	 					 		

	 	</div>
	 	</form>
	 </div>

	<script src="../js/jquery-3.3.1.slim.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/vue.js"></script>
	<script src="../js/forms.js"></script>
	<script src="../js/oForm03.js"></script>
	<script src="../js/info.js"></script>

</body>
</html>



