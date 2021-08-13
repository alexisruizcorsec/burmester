<?php 

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");
date_default_timezone_set('America/Mexico_City');
session_start();

include_once 'conexion.php';

$objeto = new Conexion();
$conexion = $objeto->Conectar();

$_POST = json_decode(file_get_contents("php://input"), true);

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

$corporativod = (isset($_POST['Corporativod'])) ? $_POST['Corporativod'] : '';
$razonSociald = (isset($_POST['RazonSociald'])) ? $_POST['RazonSociald'] : '';
$carpetaPrincipal = (isset($_POST['carpetaPrincipal'])) ? $_POST['carpetaPrincipal'] : '';
$carpetaSecundaria = (isset($_POST['carpetaSecundaria'])) ? $_POST['carpetaSecundaria'] : '';


switch ($opcion) {
	case 1:
		$consulta = "INSERT INTO dataEmpleadosDos (impacto,nomImpacto) VALUES('$impacto','$nomImpacto')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
		break;

	case 2:
		$consulta = "UPDATE dataEmpleadosDos SET carpetaPrincipal='$carpetaPrincipal', carpetaSecundaria='$carpetaSecundaria' WHERE Corporativod='$corporativod' AND RazonSociald='$razonSociald'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
		break;

	case 3:
		$consulta = "DELETE FROM dataEmpleadosDos WHERE id='$id'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
		break;

	case 4:
		$consulta = "SELECT Corporativod,RazonSociald,carpetaPrincipal,carpetaSecundaria FROM dataEmpleadosDos GROUP BY Corporativod,RazonSociald ORDER BY Corporativod,RazonSociald";
	    $resultado = $conexion->prepare($consulta);
	    $resultado->execute();
	    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

		break;
}

echo json_encode($data);

$conexion = NULL;

 ?>