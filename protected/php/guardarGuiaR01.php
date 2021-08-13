<?php 

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");
date_default_timezone_set('America/Mexico_City');

session_start();

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'phpMailer/Exception.php';
	require 'phpMailer/PHPMailer.php';
	require 'phpMailer/SMTP.php';

############### Inicia Compro de Campos ###############

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

		
		$fechaFinCap = date("d-m-Y");
		$horaFinCap = date("g:i:s a");
		$fechaHoraFin = $fechaFinCap.' '.$horaFinCap;


		############### Inicia Consulta a CORREO Existente ###############
		$con = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

		$busCorreo = $con -> query("SELECT codeMd5_R1a FROM nom035R1a WHERE codeMd5_R1a = '$_SESSION[codeMd5]'");

		while ($correoX = $busCorreo->fetchArray()) {
			$resBusDos = $correoX['codeMd5_R1a'];
		}
		############### Termina Consulta a CORREO Existente ###############
		$resBusDos = (isset($resBusDos)) ? $resBusDos : '';
		############### Inicia Comprobación de si existe correo ###############
		if ($resBusDos === $_SESSION['codeMd5']) {





			############### Inicia Si si existe ###############
			// echo "<script> alert('Error este Correo ya existe!');</script>";

			echo "<script>window.location='../error/alerta.aspx?error=usrRegistrado&idUsrReg=".$_SESSION['nombre']."';</script>";

			############### Termina Si si existe ###############

			############### Cierra conexion ###############
			$con -> close();
			############### Cierra conexion ###############
			
		}else{


	if (empty($_POST['opt1'])) {$opt1 = '0';} else{$opt1 = $_POST['opt1'];}
	if (empty($_POST['opt2'])) {$opt2 = '0';} else{$opt2 = $_POST['opt2'];}
	if (empty($_POST['opt3'])) {$opt3 = '0';} else{$opt3 = $_POST['opt3'];}
	if (empty($_POST['opt4'])) {$opt4 = '0';} else{$opt4 = $_POST['opt4'];}
	if (empty($_POST['opt5'])) {$opt5 = '0';} else{$opt5 = $_POST['opt5'];}
	if (empty($_POST['opt6'])) {$opt6 = '0';} else{$opt6 = $_POST['opt6'];}
	if (empty($_POST['opt7'])) {$opt7 = '0';} else{$opt7 = $_POST['opt7'];}
	if (empty($_POST['opt8'])) {$opt8 = '0';} else{$opt8 = $_POST['opt8'];}
	if (empty($_POST['opt9'])) {$opt9 = '0';} else{$opt9 = $_POST['opt9'];}
	if (empty($_POST['opt10'])) {$opt10 = '0';} else{$opt10 = $_POST['opt10'];}
	if (empty($_POST['opt11'])) {$opt11 = '0';} else{$opt11 = $_POST['opt11'];}
	if (empty($_POST['opt12'])) {$opt12 = '0';} else{$opt12 = $_POST['opt12'];}
	if (empty($_POST['opt13'])) {$opt13 = '0';} else{$opt13 = $_POST['opt13'];}
	if (empty($_POST['opt14'])) {$opt14 = '0';} else{$opt14 = $_POST['opt14'];}
	if (empty($_POST['opt15'])) {$opt15 = '0';} else{$opt15 = $_POST['opt15'];}
	if (empty($_POST['opt16'])) {$opt16 = '0';} else{$opt16 = $_POST['opt16'];}
	if (empty($_POST['opt17'])) {$opt17 = '0';} else{$opt17 = $_POST['opt17'];}
	if (empty($_POST['opt18'])) {$opt18 = '0';} else{$opt18 = $_POST['opt18'];}
	if (empty($_POST['opt19'])) {$opt19 = '0';} else{$opt19 = $_POST['opt19'];}
	if (empty($_POST['opt20'])) {$opt20 = '0';} else{$opt20 = $_POST['opt20'];}
	if (empty($_POST['opt21'])) {$opt21 = '0';} else{$opt21 = $_POST['opt21'];}



	$fechaCap = date("d-m-Y");
	$horaCap = date("g:i:s a");

	$fechaHoraFinal = $fechaCap.' '.$horaCap;


			############### Inicia Si no existe ###############

		$cs = $con -> query("INSERT INTO nom035R1a (p1_R1a,p2_R1a,p3_R1a,p4_R1a,p5_R1a,p6_R1a,p7_R1a,p8_R1a,p9_R1a,p10_R1a,p11_R1a,p12_R1a,p13_R1a,p14_R1a,p15_R1a,p16_R1a,p17_R1a,p18_R1a,p19_R1a,p20_R1a,p21_R1a,empresa_R1a,dirEmpresa_R1a,correo_R1a,codeMd5_R1a,usrSexo_R1a,usrNumEmp_R1a,fechaHoraInicio_R1a,fechaHoraFinal_R1a,usrNombre_R1a) VALUES ('$opt1','$opt2','$opt3','$opt4','$opt5','$opt6','$opt7','$opt8','$opt9','$opt10','$opt11','$opt12','$opt13','$opt14','$opt15','$opt16','$opt17','$opt18','$opt19','$opt20','$opt21','$_SESSION[empresa]','$_SESSION[corp]','$_SESSION[correo]','$_SESSION[codeMd5]','$_SESSION[genero]','$_SESSION[numEmp]','$_SESSION[fechaHoraIni]','$fechaHoraFinal','$_SESSION[nombre]')");

		// Actualiza dataEmpleadosDos

		$comproCero = $opt8 + $opt9 + $opt10 + $opt11 + $opt12 + $opt13 + $opt14 + $opt15 + $opt16+ $opt17 + $opt18 + $opt19 + $opt20 + $opt21;
		$comproUno = $opt8 + $opt9;
		$comproDos = $opt10 + $opt11 + $opt12 + $opt13 + $opt14 + $opt15 + $opt16;
		$comproTres = $opt17 + $opt18 + $opt19 + $opt20 + $opt21;

		if( $comproCero > 0){
			if($comproUno > 0){ 
				$csActData = $con -> query("UPDATE dataEmpleadosDos SET aconted = 2 WHERE codeMd5d = '$_SESSION[codeMd5]'"); 
			}elseif ($comproDos > 0 && $comproDos < 3) {
				$csActData = $con -> query("UPDATE dataEmpleadosDos SET aconted = 1 WHERE codeMd5d = '$_SESSION[codeMd5]'");
			}elseif ($comproDos >= 3){
				$csActData = $con -> query("UPDATE dataEmpleadosDos SET aconted = 2 WHERE codeMd5d = '$_SESSION[codeMd5]'"); 
			}elseif ($comproTres == 1) {
				$csActData = $con -> query("UPDATE dataEmpleadosDos SET aconted = 1 WHERE codeMd5d = '$_SESSION[codeMd5]'");
			}elseif ($comproTres >= 2) {
				$csActData = $con -> query("UPDATE dataEmpleadosDos SET aconted = 2 WHERE codeMd5d = '$_SESSION[codeMd5]'");
			}

		}
		
		// // No Requieren Atención pero presentarion
		// if($comproDos > 0 && $comproDos < 3){ $csActData = $con -> query("UPDATE dataEmpleadosDos SET aconted = 1 WHERE codeMd5d = '$_SESSION[codeMd5]'");}
		// if($comproTres == 1){ $csActData = $con -> query("UPDATE dataEmpleadosDos SET aconted = 1 WHERE codeMd5d = '$_SESSION[codeMd5]'"); }

		// // Requieren Atención
		// if($comproUno > 0){ $csActData = $con -> query("UPDATE dataEmpleadosDos SET aconted = 2 WHERE codeMd5d = '$_SESSION[codeMd5]'"); }
		// if($comproDos >= 3){ $csActData = $con -> query("UPDATE dataEmpleadosDos SET aconted = 2 WHERE codeMd5d = '$_SESSION[codeMd5]'"); }
		// if($comproTres >= 2){ $csActData = $con -> query("UPDATE dataEmpleadosDos SET aconted = 2 WHERE codeMd5d = '$_SESSION[codeMd5]'"); }

		// // Actualiza dataEmpleadosDos
			

		############### Cierra conexion ###############
		$con -> close();
		############### Cierra conexion ###############
		############### Envia Correo de Confirmación ###############

		echo '<div style="display: none;">';


		// $mail = new PHPMailer(true);

		// try {
		//     //Server settings
		//     $mail->SMTPDebug = 2;
		//     $mail->CharSet = 'UTF-8';

		//     $mail->isSMTP();

		//     $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		//     $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		//     $mail->Username   = 'info@corsec.com.mx';                     // SMTP username
		//     $mail->Password   = 'InfoCorsec#123@2020@';                               // SMTP password
		//     $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
		//     $mail->Port       = 587;                                    // TCP port to connect to

		//     //PARA PHP 5.6 Y POSTERIOR
		//     $mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) );

		//     //Recipients
		//     $mail->setFrom('info@corsec.com.mx', 'NOM-035-STPS-2018 - CUESTIONARIO PARA IDENTIFICAR A LOS TRABAJADORES QUE FUERON SUJETOS A ACONTECIMIENTOS TRAUMÁTICOS SEVEROS');
		//     // $mail->addAddress($correoLista);
		//     // $mail->addAddress('recursoshumanosmx@elementcorp.com');
		//     $mail->addBCC('oliver.velazquez@corsec.com.mx');
		//     // $mail->addBCC('fgutierrez@elementcorp.com');
		//     // $mail->addAttachment('firmaCORSEC.png');

		//     // Content
		//     $mail->isHTML(true);                                  // Set email format to HTML
		//     $mail->Subject = 'Resultados de Cuestionario Guía I';
		//     $mail->Body    = '
		// <div style="line-height: 150px; text-align: center">
		// <div style="line-height: 1; display: inline-block; vertical-align: middle; text-align: left; padding: 10px; font-family: Arial, Helvetica, sans-serif; text-align : justify; color: #626265; max-width: 550px; min-width: 320px;">
		// <h3>El colaborador: '.$_SESSION['nombre'].'</h3>


		// <b>Realizo: “CUESTIONARIO PARA IDENTIFICAR A LOS TRABAJADORES QUE FUERON SUJETOS A ACONTECIMIENTOS TRAUMÁTICOS SEVEROS”</b>

		// <p>Para descargar el cuestionario, deberás dar click en el siguiente link:</p>

		// <br>
		// <a href="http://www.corsec.com.mx/'.$_SESSION['empresa'].'/impreR01/enviarResultados.aspx?correoCrypt_R1a='.$_SESSION['codeMd5'].'">http://www.corsec.com.mx/'.$_SESSION['empresa'].'/impreR01/enviarResultados.aspx?correoCrypt_R1a='.$_SESSION['codeMd5'].'</a>
		// <br>
		// <br>
		
		// <p>¿No tuviste suerte? Comunícate a Asistencia al cliente.</p>
		// <p>Tel:56-14-21-33-22</p>

		// <br>
		// <br>

		// </div>
		// </div>

		//     ';

		//     $mail->send();
		//     echo 'Message COOL! todo bien!';
		// } catch (Exception $e) {
		//     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		// }

		echo '</div>';
	############### Envia Correo de Confirmación ###############

		sleep(1);
		$con -> close();

		echo "<script> window.location='../completado/confirmacion.aspx';</script>";



		}

		############### Termina Si no existe ###############
		############### Termina Comprobación de si existe correo ###############

	}else{
		$ocultar = 'style="display: none;"'; // --> recuerda agregar esto en "container"
		sleep(2);
		echo "<script> window.location='../error/alerta.aspx?error=404';</script>";
	}





	
}else{
	// NO PUEDES VER ESTA PAGINA
	sleep(2);
	echo "<script> window.location='../error/alerta.aspx?error=404';</script>";
}

############### Termina Compro de Campos ###############

 ?>