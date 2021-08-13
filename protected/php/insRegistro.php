<?php 

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");
include 'info.php';

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'phpMailer/Exception.php';
	require 'phpMailer/PHPMailer.php';
	require 'phpMailer/SMTP.php';

############### Inicia Compro de Campos ###############

if (isset($_POST['txtNumEmp']) && !empty($_POST['txtNumEmp']) &&
	isset($_POST['txtNombre']) && !empty($_POST['txtNombre']) &&
	isset($_POST['txtEmpresa']) && !empty($_POST['txtEmpresa']) &&	
	isset($_POST['optSexo']) && !empty($_POST['optSexo']) &&
	isset($_POST['txtTelefono']) && !empty($_POST['txtTelefono']) &&
	isset($_POST['txtCorreo']) && !empty($_POST['txtCorreo']) &&
	isset($_POST['txtPassword']) && !empty($_POST['txtPassword'])) {

	$varNavega = $info["browser"];	
	$varVersio = $info["version"];
	$varSitemaO = $info["os"];
	$fechaCap = date("d-m-Y");
	$horaCap = date("g:i:s a");
	$fechaHora = $fechaCap.' '.$horaCap;

	############### Inicia Variables ###############

	$resBus = "";

	############### Termina Variables ###############

	############### Inicia Convertidor de Variables a Mayusculas ###############

	$nombre = mb_strtoupper($_POST['txtNombre'], 'UTF-8');
	$dirEmpresaVar = mb_strtoupper($_POST['txtEmpresa'], 'UTF-8');

	$usrCryptPre = md5($nombre);

	############### Termina Convertidor de Variables a Mayusculas ###############

	############### Inicia Encritación de Password ###############
	$pwCode = md5($_POST['txtPassword']);
	$correoMD5 = md5($_POST['txtCorreo']);
	############### Inicia Encritación de Password ###############


	############### Inicia Consulta a CORREO Existente ###############
	$con = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

	$busCorreo = $con -> query("SELECT codeMd5 FROM registroUsr WHERE codeMd5 = '$usrCryptPre'");

	while ($usrCrypt = $busCorreo->fetchArray()) {
		$resBus = $usrCrypt['codeMd5'];
	}

	############### Termina Consulta a CORREO Existente ###############

	############### Inicia Comprobación de si existe correo ###############
	if ($resBus === $usrCryptPre) {

		############### Inicia Si si existe ###############
		// echo "<script> alert('Error este Correo ya existe!');</script>";
		echo "<script> window.location='../../error/alerta.aspx?error=correoRegistrado&idCorreo=".$_POST['txtCorreo']."';</script>";
		############### Termina Si si existe ###############

		############### Cierra conexion ###############
		$con -> close();
		############### Cierra conexion ###############
		
	}else{

		############### Inicia Si no existe ###############



	$usrCode = '';

	$usrCode = md5($nombre);

	$con = new SQLite3("../../protected/data/nom035.db") or die("Problemas para conectar");
	$cs = $con -> query("SELECT * FROM dataEmpleados WHERE codeMd5 = '$usrCode'");



	while ($resul = $cs -> fetchArray()) {

		$numEmp = $resul['NumEmpleado'];
		$nombre = $resul['Nombre'];
		$genero = $resul['Genero'];
		$corp = $resul['Corporativo'];
		$empresa = $resul['Empresa'];
		$puesto = $resul['Puesto'];
		$razonSocial = $resul['RazonSocial'];
		$correo = $resul['correoElect'];
		$telefono = $resul['Telefono'];
		$codeMd5 = $resul['codeMd5'];

	}



	$cs = $con -> query("INSERT INTO registroUsr (numEmp,empresa,dirEmpresa,nombre,sexo,telefono,telefono2,correo,correo2,codeMd5,usrActivo,password,passDecrypt,usrSO,usrNavega,usrVerSO,usrGPS,usrFechaHoraReg) VALUES ('$numEmp','$empresa','$corp','$nombre','$genero','$telefono','$_POST[txtTelefono]','$correo','$_POST[txtCorreo]','$codeMd5',1,'$pwCode','$_POST[txtPassword]','$varSitemaO','$varNavega','$varVersio','$_POST[txtGeoRef]','$fechaHora')");
		

	############### Cierra conexion ###############
	$con -> close();
	############### Cierra conexion ###############


	############### Envia Correo de Confirmación ###############

	echo '<div style="display: none;">';


	$mail = new PHPMailer(true);

	try {
	    //Server settings
	    $mail->SMTPDebug = 2;
	    $mail->CharSet = 'UTF-8';

	    $mail->isSMTP();

	    $mail->Host       = 'smtp.flockmail.com';  // Specify main and backup SMTP servers
	    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
	    $mail->Username   = 'confirmacion@corsec.com.mx';                     // SMTP username
	    $mail->Password   = 'Correos#123';                               // SMTP password
	    $mail->SMTPSecure = 'starttls';                                  // Enable TLS encryption, `ssl` also accepted
	    $mail->Port       = 587;                                    // TCP port to connect to

	    //PARA PHP 5.6 Y POSTERIOR
	    $mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) );

	    //Recipients
	    $mail->setFrom('confirmacion@corsec.com.mx', 'CORSEC - Activación de usuario');
	    // $mail->addAddress($correoLista);
	    $mail->addAddress($_POST['txtCorreo']);
	    // $mail->addBCC('oliver.velazquez@corsec.com.mx');
	    // $mail->addBCC('fpolom@corsec.com.mx');
	    // $mail->addAttachment('firmaCORSEC.png');

	    // Content
	    $mail->isHTML(true);                                  // Set email format to HTML
	    $mail->Subject = 'Correo electrónico de confirmación';
	    $mail->Body    = '
	<div style="line-height: 150px; text-align: center">
	<div style="line-height: 1; display: inline-block; vertical-align: middle; text-align: left; padding: 10px; font-family: Arial, Helvetica, sans-serif; text-align : justify; color: #626265; max-width: 550px; min-width: 320px;">
	<h3>Estimado(a): '.$nombre.'</h3>


	<b>¡Felicidades, Registro Exitoso!</b>

	<p>Tu alta de usuario ha sido satisfactoria, si aún no inicias sesión da click en el siguiente enlace:</p>

	<br>
	<a href="http://www.corsec.com.mx/'.$empresa.'">http://www.corsec.com.mx/'.$empresa.'</a>
	<br>
	<br>
	<p>Te recordamos que tus datos de registro son los siguientes:</p>
	<p>Correo: <b>'.$_POST['txtCorreo'].'</b></p>
	<p>Password: <b>'.$_POST['txtPassword'].'</b></p>

	<p>Busca en tu bandeja de entrada <b>confirmacion@corsec.com.mx</b> el correo electrónico de confirmación y haz clic en el enlace.</p>

	<p>¿No tuviste suerte? Comunícate a Asistencia al cliente.</p>
	<p>Tel:56-14-21-33-22</p>

	<br>
	<br>

	</div>
	</div>

	    ';

	    $mail->send();
	    echo 'Message COOL! todo bien!';
	} catch (Exception $e) {
	    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}

	echo '</div>';
############### Envia Correo de Confirmación ###############





	
	echo "<script> window.location='../../mail/confirmacion.aspx';</script>";
	}

	############### Termina Si no existe ###############
	############### Termina Comprobación de si existe correo ###############
}else{
	// NO PUEDES VER ESTA PAGINA
	echo "<script> window.location='../../error/alerta.aspx?error=404';</script>";
}

############### Termina Compro de Campos ###############

 ?>