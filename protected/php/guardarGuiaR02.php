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

	$resBus = '';

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

		$busCorreo = $con -> query("SELECT codeMd5_R2a FROM nom035R2a WHERE codeMd5_R2a = '$_SESSION[codeMd5]'");

		while ($correoX = $busCorreo->fetchArray()) {
			$resBusDos = $correoX['codeMd5_R2a'];
		}
		############### Termina Consulta a CORREO Existente ###############
		$resBusDos = (isset($resBusDos)) ? $resBusDos : '';
		############### Inicia Comprobación de si existe correo ###############
		if ($resBusDos === $_SESSION['codeMd5']) {





			############### Inicia Si si existe ###############
			// echo "<script> alert('Error este Correo ya existe!');</script>";

			echo "<script> window.location='../error/alerta.aspx?error=usrRegistrado&idUsrReg=".$_SESSION['nombre']."';</script>";

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
	if (empty($_POST['opt22'])) {$opt22 = '0';} else{$opt22 = $_POST['opt22'];}
	if (empty($_POST['opt23'])) {$opt23 = '0';} else{$opt23 = $_POST['opt23'];}
	if (empty($_POST['opt24'])) {$opt24 = '0';} else{$opt24 = $_POST['opt24'];}
	if (empty($_POST['opt25'])) {$opt25 = '0';} else{$opt25 = $_POST['opt25'];}
	if (empty($_POST['opt26'])) {$opt26 = '0';} else{$opt26 = $_POST['opt26'];}
	if (empty($_POST['opt27'])) {$opt27 = '0';} else{$opt27 = $_POST['opt27'];}
	if (empty($_POST['opt28'])) {$opt28 = '0';} else{$opt28 = $_POST['opt28'];}
	if (empty($_POST['opt29'])) {$opt29 = '0';} else{$opt29 = $_POST['opt29'];}
	if (empty($_POST['opt30'])) {$opt30 = '0';} else{$opt30 = $_POST['opt30'];}
	if (empty($_POST['opt31'])) {$opt31 = '0';} else{$opt31 = $_POST['opt31'];}
	if (empty($_POST['opt32'])) {$opt32 = '0';} else{$opt32 = $_POST['opt32'];}
	if (empty($_POST['opt33'])) {$opt33 = '0';} else{$opt33 = $_POST['opt33'];}
	if (empty($_POST['opt34'])) {$opt34 = '0';} else{$opt34 = $_POST['opt34'];}
	if (empty($_POST['opt35'])) {$opt35 = '0';} else{$opt35 = $_POST['opt35'];}
	if (empty($_POST['opt36'])) {$opt36 = '0';} else{$opt36 = $_POST['opt36'];}
	if (empty($_POST['opt37'])) {$opt37 = '0';} else{$opt37 = $_POST['opt37'];}
	if (empty($_POST['opt38'])) {$opt38 = '0';} else{$opt38 = $_POST['opt38'];}
	if (empty($_POST['opt39'])) {$opt39 = '0';} else{$opt39 = $_POST['opt39'];}
	if (empty($_POST['opt40'])) {$opt40 = '0';} else{$opt40 = $_POST['opt40'];}
	if (empty($_POST['opt41'])) {$opt41 = '0';} else{$opt41 = $_POST['opt41'];}
	if (empty($_POST['opt42'])) {$opt42 = '0';} else{$opt42 = $_POST['opt42'];}
	if (empty($_POST['opt43'])) {$opt43 = '0';} else{$opt43 = $_POST['opt43'];}
	if (empty($_POST['opt44'])) {$opt44 = '0';} else{$opt44 = $_POST['opt44'];}
	if (empty($_POST['opt45'])) {$opt45 = '0';} else{$opt45 = $_POST['opt45'];}
	if (empty($_POST['opt46'])) {$opt46 = '0';} else{$opt46 = $_POST['opt46'];}



	$fechaCap = date("d-m-Y");
	$horaCap = date("g:i:s a");

	$fechaHoraFinal = $fechaCap.' '.$horaCap;


		############### Inicia Si no existe Registro ###############

	$cs = $con -> query("INSERT INTO nom035R2a (p1_R2a,p2_R2a,p3_R2a,p4_R2a,p5_R2a,p6_R2a,p7_R2a,p8_R2a,p9_R2a,p10_R2a,p11_R2a,p12_R2a,p13_R2a,p14_R2a,p15_R2a,p16_R2a,p17_R2a,p18_R2a,p19_R2a,p20_R2a,p21_R2a,p22_R2a,p23_R2a,p24_R2a,p25_R2a,p26_R2a,p27_R2a,p28_R2a,p29_R2a,p30_R2a,p31_R2a,p32_R2a,p33_R2a,p34_R2a,p35_R2a,p36_R2a,p37_R2a,p38_R2a,p39_R2a,p40_R2a,p41_R2a,p42_R2a,p43_R2a,p44_R2a,p45_R2a,p46_R2a,empresa_R2a,dirEmpresa_R2a,correo_R2a,codeMd5_R2a,usrSexo_R2a,usrNumEmp_R2a,fechaHoraInicio_R2a,fechaHoraFinal_R2a,usrNombre_R2a) VALUES ('$opt1','$opt2','$opt3','$opt4','$opt5','$opt6','$opt7','$opt8','$opt9','$opt10','$opt11','$opt12','$opt13','$opt14','$opt15','$opt16','$opt17','$opt18','$opt19','$opt20','$opt21','$opt22','$opt23','$opt24','$opt25','$opt26','$opt27','$opt28','$opt29','$opt30','$opt31','$opt32','$opt33','$opt34','$opt35','$opt36','$opt37','$opt38','$opt39','$opt40','$opt41','$opt42','$opt43','$opt44','$opt45','$opt46','$_SESSION[empresa]','$_SESSION[corp]','$_SESSION[correo]','$_SESSION[codeMd5]','$_SESSION[genero]','$_SESSION[numEmp]','$_SESSION[fechaHoraIni]','$fechaHoraFinal','$_SESSION[nombre]')");
		

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

		//     $mail->Host       = 'smtp.flockmail.com';  // Specify main and backup SMTP servers
		//     $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		//     $mail->Username   = 'confirmacion@corsec.com.mx';                     // SMTP username
		//     $mail->Password   = 'Correos#123';                               // SMTP password
		//     $mail->SMTPSecure = 'starttls';                                  // Enable TLS encryption, `ssl` also accepted
		//     $mail->Port       = 587;                                    // TCP port to connect to

		//     //PARA PHP 5.6 Y POSTERIOR
		//     $mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) );

		//     //Recipients
		//     $mail->setFrom('confirmacion@corsec.com.mx', 'NOM-035-STPS-2018 - CUESTIONARIO PARA IDENTIFICAR A LOS TRABAJADORES QUE FUERON SUJETOS A ACONTECIMIENTOS TRAUMÁTICOS SEVEROS');
		//     // $mail->addAddress($correoLista);
		//     // $mail->addAddress('recursoshumanosmx@elementcorp.com');
		//     $mail->addBCC('oliver.velazquez@corsec.com.mx');
		//     // $mail->addBCC('fgutierrez@elementcorp.com');
		//     // $mail->addAttachment('firmaCORSEC.png');

		//     // Content
		//     $mail->isHTML(true);                                  // Set email format to HTML
		//     $mail->Subject = 'Resultados de Cuestionario Guía II';
		//     $mail->Body    = '
		// <div style="line-height: 150px; text-align: center">
		// <div style="line-height: 1; display: inline-block; vertical-align: middle; text-align: left; padding: 10px; font-family: Arial, Helvetica, sans-serif; text-align : justify; color: #626265; max-width: 550px; min-width: 320px;">
		// <h3>El colaborador: '.$_SESSION['nombre'].'</h3>


		// <b>Realizo: “CUESTIONARIO PARA IDENTIFICAR A LOS TRABAJADORES QUE FUERON SUJETOS A ACONTECIMIENTOS TRAUMÁTICOS SEVEROS”</b>

		// <p>Para descargar el cuestionario, deberás dar click en el siguiente link:</p>

		// <br>
		// <a href="http://www.corsec.com.mx/'.$_SESSION['empresa'].'/impreR02/enviarResultados.aspx?correoCrypt_R2a='.$_SESSION['codeMd5'].'">http://www.corsec.com.mx/'.$_SESSION['empresa'].'/impreR02/enviarResultados.aspx?correoCrypt_R2a='.$_SESSION['codeMd5'].'</a>
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
		// $con -> close();
			
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