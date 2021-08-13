<?php 

$con = new SQLite3("../data/usuarios.db") or die("Problemas para conectar!");

	$busCorreo = $con -> query("SELECT correo FROM login WHERE correo = '$_POST[txtCorreo]'");

	while ($correoX = $busCorreo->fetchArray()) {
		$resBus = $correoX['correo'];
		echo $resBus;
	}




 ?>