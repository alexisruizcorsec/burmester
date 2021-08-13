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

		$busCorreo = $con -> query("SELECT codeMd5_R3a FROM nom035R3a WHERE codeMd5_R3a = '$_SESSION[codeMd5]'");

		while ($correoX = $busCorreo->fetchArray()) {
			$resBusDos = $correoX['codeMd5_R3a'];
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
	if (empty($_POST['opt47'])) {$opt47 = '0';} else{$opt47 = $_POST['opt47'];}
	if (empty($_POST['opt48'])) {$opt48 = '0';} else{$opt48 = $_POST['opt48'];}
	if (empty($_POST['opt49'])) {$opt49 = '0';} else{$opt49 = $_POST['opt49'];}
	if (empty($_POST['opt50'])) {$opt50 = '0';} else{$opt50 = $_POST['opt50'];}
	if (empty($_POST['opt51'])) {$opt51 = '0';} else{$opt51 = $_POST['opt51'];}
	if (empty($_POST['opt52'])) {$opt52 = '0';} else{$opt52 = $_POST['opt52'];}
	if (empty($_POST['opt53'])) {$opt53 = '0';} else{$opt53 = $_POST['opt53'];}
	if (empty($_POST['opt54'])) {$opt54 = '0';} else{$opt54 = $_POST['opt54'];}
	if (empty($_POST['opt55'])) {$opt55 = '0';} else{$opt55 = $_POST['opt55'];}
	if (empty($_POST['opt56'])) {$opt56 = '0';} else{$opt56 = $_POST['opt56'];}
	if (empty($_POST['opt57'])) {$opt57 = '0';} else{$opt57 = $_POST['opt57'];}
	if (empty($_POST['opt58'])) {$opt58 = '0';} else{$opt58 = $_POST['opt58'];}
	if (empty($_POST['opt59'])) {$opt59 = '0';} else{$opt59 = $_POST['opt59'];}
	if (empty($_POST['opt60'])) {$opt60 = '0';} else{$opt60 = $_POST['opt60'];}
	if (empty($_POST['opt61'])) {$opt61 = '0';} else{$opt61 = $_POST['opt61'];}
	if (empty($_POST['opt62'])) {$opt62 = '0';} else{$opt62 = $_POST['opt62'];}
	if (empty($_POST['opt63'])) {$opt63 = '0';} else{$opt63 = $_POST['opt63'];}
	if (empty($_POST['opt64'])) {$opt64 = '0';} else{$opt64 = $_POST['opt64'];}
	if (empty($_POST['opt65'])) {$opt65 = '0';} else{$opt65 = $_POST['opt65'];}
	if (empty($_POST['opt66'])) {$opt66 = '0';} else{$opt66 = $_POST['opt66'];}
	if (empty($_POST['opt67'])) {$opt67 = '0';} else{$opt67 = $_POST['opt67'];}
	if (empty($_POST['opt68'])) {$opt68 = '0';} else{$opt68 = $_POST['opt68'];}
	if (empty($_POST['opt69'])) {$opt69 = '0';} else{$opt69 = $_POST['opt69'];}
	if (empty($_POST['opt70'])) {$opt70 = '0';} else{$opt70 = $_POST['opt70'];}
	if (empty($_POST['opt71'])) {$opt71 = '0';} else{$opt71 = $_POST['opt71'];}
	if (empty($_POST['opt72'])) {$opt72 = '0';} else{$opt72 = $_POST['opt72'];}


	$fechaCap = date("d-m-Y");
	$horaCap = date("g:i:s a");

	$fechaHoraFinal = $fechaCap.' '.$horaCap;

		############### Inicia Si no existe Registro ###############

	$cs = $con -> query("INSERT INTO nom035R3a (p1_R3a,p2_R3a,p3_R3a,p4_R3a,p5_R3a,p6_R3a,p7_R3a,p8_R3a,p9_R3a,p10_R3a,p11_R3a,p12_R3a,p13_R3a,p14_R3a,p15_R3a,p16_R3a,p17_R3a,p18_R3a,p19_R3a,p20_R3a,p21_R3a,p22_R3a,p23_R3a,p24_R3a,p25_R3a,p26_R3a,p27_R3a,p28_R3a,p29_R3a,p30_R3a,p31_R3a,p32_R3a,p33_R3a,p34_R3a,p35_R3a,p36_R3a,p37_R3a,p38_R3a,p39_R3a,p40_R3a,p41_R3a,p42_R3a,p43_R3a,p44_R3a,p45_R3a,p46_R3a,p47_R3a,p48_R3a,p49_R3a,p50_R3a,p51_R3a,p52_R3a,p53_R3a,p54_R3a,p55_R3a,p56_R3a,p57_R3a,p58_R3a,p59_R3a,p60_R3a,p61_R3a,p62_R3a,p63_R3a,p64_R3a,p65_R3a,p66_R3a,p67_R3a,p68_R3a,p69_R3a,p70_R3a,p71_R3a,p72_R3a,empresa_R3a,dirEmpresa_R3a,correo_R3a,codeMd5_R3a,usrSexo_R3a,usrNumEmp_R3a,fechaHoraInicio_R3a,fechaHoraFinal_R3a,usrNombre_R3a) VALUES ('$opt1','$opt2','$opt3','$opt4','$opt5','$opt6','$opt7','$opt8','$opt9','$opt10','$opt11','$opt12','$opt13','$opt14','$opt15','$opt16','$opt17','$opt18','$opt19','$opt20','$opt21','$opt22','$opt23','$opt24','$opt25','$opt26','$opt27','$opt28','$opt29','$opt30','$opt31','$opt32','$opt33','$opt34','$opt35','$opt36','$opt37','$opt38','$opt39','$opt40','$opt41','$opt42','$opt43','$opt44','$opt45','$opt46','$opt47','$opt48','$opt49','$opt50','$opt51','$opt52','$opt53','$opt54','$opt55','$opt56','$opt57','$opt58','$opt59','$opt60','$opt61','$opt62','$opt63','$opt64','$opt65','$opt66','$opt67','$opt68','$opt69','$opt70','$opt71','$opt72','$_SESSION[empresa]','$_SESSION[corp]','$_SESSION[correo]','$_SESSION[codeMd5]','$_SESSION[genero]','$_SESSION[numEmp]','$_SESSION[fechaHoraIni]','$fechaHoraFinal','$_SESSION[nombre]')");
		

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
		//     $mail->Subject = 'Resultados de Cuestionario Guía III';
		//     $mail->Body    = '
		// <div style="line-height: 150px; text-align: center">
		// <div style="line-height: 1; display: inline-block; vertical-align: middle; text-align: left; padding: 10px; font-family: Arial, Helvetica, sans-serif; text-align : justify; color: #626265; max-width: 550px; min-width: 320px;">
		// <h3>El colaborador: '.$_SESSION['nombre'].'</h3>


		// <b>Realizo: “CUESTIONARIO PARA IDENTIFICAR A LOS TRABAJADORES QUE FUERON SUJETOS A ACONTECIMIENTOS TRAUMÁTICOS SEVEROS”</b>

		// <p>Para descargar el cuestionario, deberás dar click en el siguiente link:</p>

		// <br>
		// <a href="http://www.corsec.com.mx/'.$_SESSION['empresa'].'/impreR03/enviarResultados.aspx?correoCrypt_R3a='.$_SESSION['codeMd5'].'">http://www.corsec.com.mx/'.$_SESSION['empresa'].'/impreR03/enviarResultados.aspx?correoCrypt_R3a='.$_SESSION['codeMd5'].'</a>
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