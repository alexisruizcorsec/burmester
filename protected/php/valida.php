<?php 

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");

session_start();

if (isset($_POST['txtUsr']) && !empty($_POST['txtUsr']) &&
	isset($_POST['txtPwd']) && !empty($_POST['txtPwd'])) {

	$correo = '';
	$pass = '';

	$con = new SQLite3("../../protected/data/nom035.db") or die("Problemas para conectar");
	$cs = $con -> query("SELECT * FROM registroUsr WHERE correo2 = '$_POST[txtUsr]'");



	while ($resul = $cs -> fetchArray()) {

		$numEmp = $resul['numEmp'];
		$nombre = $resul['nombre'];
		$genero = $resul['sexo'];
		$corp = $resul['dirEmpresa'];
		$empresa = $resul['empresa'];
		$correo = $resul['correo2'];
		$telefono = $resul['telefono2'];	
		$codeMd5 = $resul['codeMd5'];
		$pass = $resul['password'];
		$activo = $resul['usrActivo'];
	}

	$passCrypt = md5($_POST['txtPwd']);


	/*VALIDACIÓN DE USUARIO*/

	if ($_POST['txtUsr'] === $correo) {

		/*VALIDACIÓN DE PASSWORD*/
		
		if ($passCrypt === $pass) {

			/*VALIDACIÓN DE USUARIO ACTIVO*/
			if ($activo === '1') {
				
				$_SESSION['numEmp'] = $numEmp;
				$_SESSION['nombre'] = $nombre;
				$_SESSION['genero'] = $genero;
				$_SESSION['corp'] = $corp;
				$_SESSION['empresa'] = $empresa;
				$_SESSION['correo'] = $correo;
				$_SESSION['telefono'] = $telefono;
				$_SESSION['codeMd5'] = $codeMd5;

				echo "<script> window.location='../menu/guias.aspx';</script>";

				$con -> close();
			}else{
				echo "<script> window.location='../error/alerta.aspx?error=usrNoActivo';</script>";
				$con -> close();
			}

			
			
		}else{
			// ERROR DE PASSWORD
			echo "<script> window.location='../error/alerta.aspx?error=pswNoValido';</script>";
			$con -> close();
		}

	}else{
		// ERROR DE USUARIO
		echo "<script> window.location='../error/alerta.aspx?error=usrNoValido';</script>";
		$con -> close();
	}
	
	
}else{
	// FLATAN CAMPOS
	echo "<script> window.location='../error/alerta.aspx?error=faltanCampos';</script>";
}

 ?>