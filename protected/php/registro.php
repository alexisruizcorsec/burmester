<?php 

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");
date_default_timezone_set('America/Mexico_City');




if (empty($_POST['txtN1'])) {$txtN1 = '0';}else{$txtN1 = $_POST['txtN1'];}
if (empty($_POST['txtN2'])) {$txtN2 = '0';}else{$txtN2 = $_POST['txtN2'];}
if (empty($_POST['txtN3'])) {$txtN3 = '0';}else{$txtN3 = $_POST['txtN3'];}
if (empty($_POST['txtN4'])) {$txtN4 = '0';}else{$txtN4 = $_POST['txtN4'];}
if (empty($_POST['txtN5'])) {$txtN5 = '0';}else{$txtN5 = $_POST['txtN5'];}
if (empty($_POST['txtN6'])) {$txtN6 = '0';}else{$txtN6 = $_POST['txtN6'];}

$numEmpleado = $txtN1.$txtN2.$txtN3.$txtN4.$txtN5.$txtN6;




	$con = new SQLite3("../data/nom035.db") or die("Problemas para conectar");

	//BUSCA EL NUMERO DE EMPLEADO
	$cs = $con -> query("SELECT COUNT(NumEmpleado) AS cuantos FROM dataEmpleados WHERE NumEmpleado = '$numEmpleado'");
	while ($resul = $cs -> fetchArray()) {
		$cuantos = $resul['cuantos'];
	}

	if ($cuantos > 0) {

		$ocultar = '';

		// BUSCA DATOS DEL EMPLEADO
		$csDos = $con -> query("SELECT * FROM dataEmpleados WHERE NumEmpleado = '$numEmpleado'");

			while ($resulDos = $csDos -> fetchArray()) {
				$numEmp = $resulDos['NumEmpleado'];
				$nombre = $resulDos['Nombre'];
				$genero = $resulDos['Genero'];
				$corp = $resulDos['Corporativo'];
				$correoElect = $resulDos['correoElect'];

				if ($genero === 'F' ) {
					$valGenero = 'FEMENINO';
				}else{
					$valGenero = 'MASCULINO';
				}

				$correoElect = (isset($correoElect)) ? $correoElect : '';
			}
	}else{
		$ocultar = 'style="display: none;"';
		// NUM NO ENCONTRADO
		echo "<script> window.location='../error/alerta.aspx?error=numEmpNoValido';</script>";
	}



 ?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Registro de Nuevos Usuarios</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/jquery-ui.css">
	<link rel="stylesheet" href="../css/all.css">
	<link rel="stylesheet" href="../css/animate.css">
	<link rel="stylesheet" href="../css/style.css">
	<style>
		.ocultarCuadro {
			display: none;
		}
	</style>

	
</head>
<body onload="geoLocaliza()">


	 <div class="container-fluid animated fadeIn" <?php echo $ocultar; ?>>
	 	<div class="abs-center my-3">
	 		<form action="insertar/insRegistro.aspx" id="formulario" method="POST" class="form">
	 			<div class="row">

	 			
	 			
	 			<div class="text-center col-12">
	 				<img class="img-fluid my-4" src="../img/logo.svg" alt="LOGO" style="width: 250px;">
	 				<h3 class="my-4 text-muted">Registro de Usuario:</h3>
	 			</div>

	 			<!-- GEO REFERENCIA -->
	 			<div class="form-group mb-3 col-12 ocultarCuadro" id="geoPosLatLong">
	 				<label class="text-muted" for="Empresa">Geo Ref:</label>
	 				<input type="text" name="txtGeoRef" id="autoEmpleado" class="form-control mb-3" placeholder="Geo Ref" required />
	 			</div>
				
				<span class="ocultarCuadro">
	 			<div class="form-group mb-3 col-12">
	 				<label class="text-muted" for="Empresa">Núm Empleado:</label>
	 				<input type="text" name="txtNumEmp" id="autoEmpleado" class="form-control mb-3" placeholder="Núm de Empleado" value="<?php echo $numEmp; ?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required />
	 			</div>
	 			<div class="form-group mb-3 col-12">
	 				<label class="text-muted" for="Nombre">Nombre:</label>
	 				<input type="text" name="txtNombre" class="form-control mb-3 mayusculas" placeholder="Nombre" value="<?php echo $nombre; ?>" required />
	 			</div>
	 			<div class="form-group mb-3 col-12">
	 				<label class="text-muted" for="Nombre">Corporativo:</label>
	 				<input type="text" name="txtEmpresa" class="form-control mb-3" placeholder="Corporativo" value="<?php echo $corp; ?>" required />
	 			</div>	 			
				<div class="form-group mb-3 col-md-4">
					<label class="text-muted" for="Sexo">Sexo:</label>
					<select name="optSexo" id="" class="form-control mb-3" required  style="font-size: .8em;">
						<option value="">--------</option>

						<option value="<?php echo $genero; ?>" selected><?php echo $valGenero; ?></option>
						<option value="">--------</option>
						<option value="F">FEMENINO</option>
						<option value="M">MASCULINO</option>						
					</select>
				</div>
				</span>

				<div class="form-group mb-3 col-12">
	 				<label class="text-muted" for="Empresa">Núm Empleado:</label>
	 				<input type="text" id="autoEmpleado" class="form-control mb-3" placeholder="Núm de Empleado" value="<?php echo $numEmp; ?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57" disabled />
	 			</div>
	 			<div class="form-group mb-3 col-12">
	 				<label class="text-muted" for="Nombre">Nombre:</label>
	 				<input type="text" class="form-control mb-3 mayusculas" placeholder="Nombre" value="<?php echo $nombre; ?>" disabled />
	 			</div>
	 			<div class="form-group mb-3 col-12">
	 				<label class="text-muted" for="Nombre">Corporativo:</label>
	 				<input type="text" class="form-control mb-3" placeholder="Corporativo" value="<?php echo $corp; ?>" disabled />
	 			</div>	 			
				<div class="form-group mb-3 col-md-4">
					<label class="text-muted" for="Sexo">Sexo:</label>
					<select id="" class="form-control mb-3" disabled  style="font-size: .8em;">
						<option value="">--------</option>

						<option value="<?php echo $genero; ?>" selected><?php echo $valGenero; ?></option>
						<option value="">--------</option>
						<option value="F">FEMENINO</option>
						<option value="M">MASCULINO</option>						
					</select>
				</div>
				<div class="form-group mb-3 col-md-8">
					<label class="text-muted" for="Telefono">Teléfono de contacto:</label>
					<input type="text" name="txtTelefono" class="form-control" maxlength="13" id="number" placeholder="Teléfono de contacto" onkeypress="return event.charCode >= 48 && event.charCode <= 57" autofocus required/>
				</div>
				<div class="form-group mb-3 col-12">
					<label class="text-muted" for="Correo">Correo:</label>
					<input type="email" name="txtCorreo" class="form-control" value="<?php echo $correoElect; ?>" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" id="email" placeholder="Correo Electrónico" required/>
				</div>
				<div class="form-group mb-3 col-12">
					<label class="text-muted" for="password">Password:</label>
					<input type="password" name="txtPassword" class="form-control mb-3" placeholder="Password" minlength="3" required/>
				</div>
				
				<br>
				<div class="form-group mb-3 col-12">
				<button type="submit" class="btn btn-light btn-lg form-control">Registrar<i class="fas fa-sign-in-alt"></i> <i class="fas fa-save"></i></button>
				</div>
				<div class="form-group mb-3 col-12">
				<a href="../" class="btn btn-light btn-lg form-control"><i class="fas fa-arrow-alt-circle-left"></i> Cancelar</a>
				</div>
				</div>
	 		</form>
	 	</div>
	 </div>

	<script src="../js/jquery-3.3.1.slim.min.js"></script>
	<script src="../js/jquery-ui.js"></script>
	<script src="../js/fileinput.js"></script>
	<script src="../js/fileinput_locale_es.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/forms.js"></script>
		<!-- Ajax para Geolocalización -->
		<script>
			
	function geoLocaliza() {
	  var output = document.getElementById("geoPosLatLong");

	  if (!navigator.geolocation){
	    output.innerHTML = '<label class="text-muted" for="Empresa">Geo Ref:</label><input type="text" name="txtGeoRef" id="autoEmpleado" class="form-control mb-3" placeholder="Geo Ref" value="Tu navegador no soporta la Geo Localización!" required />';
	    return;
	  }

	  function success(position) {
		    var latitude  = position.coords.latitude;
		    var longitude = position.coords.longitude;
		    var geoPos;

		      if (window.XMLHttpRequest) {
		        geoPos = new XMLHttpRequest();
		      }else{
		        geoPos = new ActiveXObject("Microsoft.XMLHTTP");
		      }
		      geoPos.onreadystatechange=function(){
		        if (geoPos.readyState==4 && geoPos.status==200) {
		          document.getElementById("geoPosLatLong").innerHTML=geoPos.responseText;
		        }
		      }
		      geoPos.open("GET", "../localiza/usuario.aspx?q="+latitude+"&q2="+longitude,true);
		      geoPos.send();
		  };

		  function error() {
		    output.innerHTML = '<label class="text-muted" for="Empresa">Geo Ref:</label><input type="text" name="txtGeoRef" id="autoEmpleado" class="form-control mb-3" placeholder="Geo Ref" value="No se puede encontrar tu ubicación!" required />';
		  };

		  output.innerHTML = '<label class="text-muted" for="Empresa">Geo Ref:</label><input type="text" name="txtGeoRef" id="autoEmpleado" class="form-control mb-3" placeholder="Geo Ref" value="Localizando.." required />';

		  navigator.geolocation.getCurrentPosition(success, error);
		}

			  
		</script>
	<!-- Ajax para Geolocalización -->

	  <script>
	  $( "#autoEmpleado" ).autocomplete({
	    source: "../autoDirEmpleado/buscarNumEmpleado.aspx"
	  });
	  </script>

</body>
</html>



