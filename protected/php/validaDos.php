<?php 

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");

session_start();

if (isset($_POST['txtUsr']) && !empty($_POST['txtUsr'])) {

	$usrCode = '';

	$usrCode = md5($_POST['txtUsr']);

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



	/*VALIDACIÓN DE USUARIO*/

	if (!empty($codeMd5)) {


			$_SESSION['numEmp'] = $numEmp;
			$_SESSION['nombre'] = $nombre;
			$_SESSION['genero'] = $genero;
			$_SESSION['corp'] = $corp;
			$_SESSION['empresa'] = $empresa;
			$_SESSION['puesto'] = $puesto;
			$_SESSION['razonSocial'] = $razonSocial;
			$_SESSION['correo'] = $correo;
			$_SESSION['telefono'] = $telefono;
			$_SESSION['codeMd5'] = $codeMd5;

			echo "<script> window.location='../veriDatos/alerta.aspx';</script>";

			$con -> close();
			

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