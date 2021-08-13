<?php 

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");

session_start();


if (isset($_POST['passwordAdmin']) && !empty($_POST['passwordAdmin'])) {

	// ESTE ES EL PASS DE ROOT
	$passRoot = 'c5f891ba4f7f3ecd087428ee36663af4';

	$pwRootCode = md5($_POST['passwordAdmin']);

	if ($passRoot === $pwRootCode) {

		$_SESSION['passRoot'] = $passRoot;

		echo "<script> window.location='../registro/usuarios.aspx';</script>";

	}else{
	echo "<script> alert('ERROR CÓDIGO NO VALIDO!');</script>";
	echo "<script> window.location='../';</script>";
}


}else{
	echo "<script> alert('No puedes ver esta pagina!');</script>";
	echo "<script> window.location='../';</script>";
}



 ?>