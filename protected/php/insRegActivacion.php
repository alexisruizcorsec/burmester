<?php 

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");
date_default_timezone_set('America/Mexico_City');
include 'info.php';

session_start();

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'phpMailer/Exception.php';
	require 'phpMailer/PHPMailer.php';
	require 'phpMailer/SMTP.php';

############### Inicia Compro de Campos ###############

if (isset($_SESSION['codeMd5']) && !empty($_SESSION['codeMd5'])){


	$resBus = '';

	$varNavega = $info["browser"];	
	$varVersio = $info["version"];
	$varSitemaO = $info["os"];
	$fechaCap = date("d-m-Y");
	$horaCap = date("g:i:s a");
	$fechaHora = $fechaCap.' '.$horaCap;




	############### Inicia Consulta a CORREO Existente ###############
	$con = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");

	$busCorreo = $con -> query("SELECT codeMd5 FROM registroUsr WHERE codeMd5 = '$_SESSION[codeMd5]'");

	while ($usrCrypt = $busCorreo->fetchArray()) {
		$resBus = $usrCrypt['codeMd5'];
	}

	############### Termina Consulta a CORREO Existente ###############

	############### Inicia Comprobación de si existe correo ###############
	if ($resBus === $_SESSION['codeMd5']) {





		############### Inicia Si si existe ###############
		// echo "<script> alert('Error este Correo ya existe!');</script>";

		echo "<script> window.location='../error/alerta.aspx?error=usrRegistrado&idUsrReg=".$_SESSION['nombre']."';</script>";

		############### Termina Si si existe ###############

		############### Cierra conexion ###############
		$con -> close();
		############### Cierra conexion ###############
		
	}else{




$txtCorreo2 = (isset($_POST['txtCorreo2'])) ? $_POST['txtCorreo2'] : '';
$txtTelefono2 = (isset($_POST['txtTelefono2'])) ? $_POST['txtTelefono2'] : '';
$txtGeoRef = (isset($_POST['txtGeoRef'])) ? $_POST['txtGeoRef'] : '';

// SI EL CORREO2 es IGUAL AL CORREO CORREO2 SERA '' NADA
if ($_SESSION['correo'] === $txtCorreo2) {
	$txtCorreo2 = '';
}

// SI EL CORREO2 es IGUAL AL CORREO CORREO2 SERA '' NADA
if ($_SESSION['telefono'] === $txtTelefono2) {
	$txtTelefono2 = '';
}


############### Inicia Si no existe ###############

	$cs = $con -> query("INSERT INTO registroUsr (numEmp,empresa,dirEmpresa,nombre,sexo,telefono,telefono2,correo,correo2,codeMd5,usrActivo,password,passDecrypt,usrSO,usrNavega,usrVerSO,usrGPS,usrFechaHoraReg) VALUES ('$_SESSION[numEmp]','$_SESSION[empresa] ','$_SESSION[corp]','$_SESSION[nombre]','$_SESSION[genero]','$_SESSION[telefono]','$txtTelefono2','$_SESSION[correo]','$txtCorreo2','$_SESSION[codeMd5]',1,'','','$varSitemaO','$varNavega','$varVersio','$txtGeoRef','$fechaHora')");
		



	############### Cierra conexion ###############
	$con -> close();
	############### Cierra conexion ###############


	############### Envia Correo de Confirmación ###############

	echo '<div style="display: none;">';

if (empty($_SESSION['correo'])) {

	if (empty($txtCorreo2)) {
		$correo = 'oliver.velazquez@corsec.com.mx';
	}else{
		$correo = $txtCorreo2;
	}
	
}else{
	$correo = $_SESSION['correo'];
}



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
	//     $mail->setFrom('confirmacion@corsec.com.mx', 'CORSEC - Activación de usuario');
	//     // $mail->addAddress($correoLista);
	//     $mail->addAddress($correo);
	//     // $mail->addBCC('oliver.velazquez@corsec.com.mx');
	//     // $mail->addBCC('fpolom@corsec.com.mx');
	//     // $mail->addAttachment('firmaCORSEC.png');

	//     // Content
	//     $mail->isHTML(true);                                  // Set email format to HTML
	//     $mail->Subject = 'Correo electrónico de confirmación';
	//     $mail->Body    = '
	// <div style="line-height: 150px; text-align: center">
	// <div style="line-height: 1; display: inline-block; vertical-align: middle; text-align: left; padding: 10px; font-family: Arial, Helvetica, sans-serif; text-align : justify; color: #626265; max-width: 550px; min-width: 320px;">
	// <h3>Estimado(a): '.$_SESSION['nombre'].'</h3>


	// <b>¡Felicidades, Registro Exitoso!</b>

	// <p>Si a un no has contestado la encuesta, puedes hacerlo con tu nombre de usuario en el siguiente link:</p>

	// <br>
	// <a href="http://www.corsec.com.mx/'.$_SESSION['empresa'].'/veriDatos/idUsuario='.$_SESSION['codeMd5'].'">http://www.corsec.com.mx/'.$_SESSION['empresa'].'/veriDatos/idUsuario='.$_SESSION['codeMd5'].'</a>
	// <br>
	// <br>

	// <p>Busca en tu bandeja de entrada <b>confirmacion@corsec.com.mx</b> el correo electrónico de confirmación y haz clic en el enlace para activar tu correo.</p>
	// <p>Si no has recibido un correo electrónico de confirmación, por favor revisa tu carpeta de spam o solicita otro correo electrónico.</p>

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

	// echo '</div>';
############### Envia Correo de Confirmación ###############





	
	echo "<script> window.location='../veriDatos/idUsuario=".$_SESSION['codeMd5']."';</script>";
	}

	############### Termina Si no existe ###############
	############### Termina Comprobación de si existe correo ###############
}else{
	// NO PUEDES VER ESTA PAGINA
	echo "<script> window.location='../error/alerta.aspx?error=404';</script>";
}

############### Termina Compro de Campos ###############


 ?>