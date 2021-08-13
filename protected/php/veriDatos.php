<?php 

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");
date_default_timezone_set('America/Mexico_City');

session_start();

if (isset($_GET['idUsuario']) && !empty($_GET['idUsuario'])) {
	$_SESSION['codeMd5'] = $_GET['idUsuario'];
}

if (isset($_SESSION['codeMd5']) && !empty($_SESSION['codeMd5'])) {
	
	$ocultar = 'style="display: none;"'; // --> recuerda agregar esto en "container"

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





		############### Inicia Si si existe ###############
		// echo "<script> alert('Error este Correo ya existe!');</script>";

		echo "<script> window.location='../menu/cuestionarios.aspx';</script>";

		############### Termina Si si existe ###############

		############### Cierra conexion ###############
		$con -> close();
		############### Cierra conexion ###############
		
	}else{
		$ocultar = '';
	}

}else{
	$ocultar = 'style="display: none;"'; // --> recuerda agregar esto en "container"
	echo "<script> window.location='../error/alerta.aspx?error=404';</script>";
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
<body oncontextmenu='return false' onload="geoLocaliza()">
<!-- <body> -->
<!-- <body oncontextmenu='return false' onkeydown='return false' onload="geoLocaliza()"> -->

<!-- Modal -->
<div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">AVISO DE PRIVACIDAD</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-justify">
        <p>El presente <b>Aviso de Privacidad</b> (aviso) se emite en cumplimiento por lo dispuesto por el artículo 15 de la Ley Federal de Protección de Datos Personales en Posesión de los Particulares (LFPDPPP), de los Lineamientos Generales previstos en el artículo 43, en su fracción III de esta Ley y del artículo 23 de su Reglamento.</p>

			<p><b>Grupo CORSEC</b> (CONSULTORES EN RESPONSABILIDAD EMPRESARIAL Y CALIDAD S.C.), tiene el compromiso jurídico legal y social de cumplir con las medidas legales y de seguridad para proteger sus datos personales con el objetivo de que usted tenga el conocimiento, control y decisión sobre ellos y para las finalidades que en el presente Aviso de Privacidad serán descritas.</p>

			<p>
				<b>1.) Datos del Responsable</b>
			</p>

			<p>En su artículo 3, fracción XIV, de la LFPDPPP establece que el Responsable es:</p>
			<div class="container">
				<div class="row">
					<div class="col-8 mx-auto">
						<p>la; “Persona física o moral de carácter privado que decide sobre el tratamiento de datos personales.”</p>						
					</div>
				</div>
			</div>
			<p><b>CORSEC</b> como Responsable del tratamiento de Datos Personales le comunica que es una Sociedad Civil debidamente constituida de conformidad con las leyes de los Estados Unidos Mexicanos con domicilio en Av. Prolongación Paseo de la Reforma #1015 Piso 1, Col. Santa Fe Alcaldía Álvaro Obregón. CDMX. C.P.:01376, teléfono: 47-56-57-86 o 55-14-15-41-76.</p>

			<p><b>2.) Datos Personales</b></p>

			<p>De conformidad con el <b>artículo 3</b>, <b>fracción V</b>, de la LFPDPPP son:</p>

			<div class="container">
				<div class="row">
					<div class="col-8 mx-auto">
						<p>“Datos personales: Cualquier información concerniente a una persona física identificada o identificable.”</p>						
					</div>
				</div>
			</div>

			<p><b>Corsec</b> recabará de Usted los datos personales necesarios para la adecuada prestación de nuestros servicios, este procedimiento puede ser de manera personal, directa o indirecta. Estos Datos Personales podrán incluir todos o algunos de los siguientes:</p>

			<p><b>3.) Datos de identificación:</b> Nombre completo, correo electrónico, teléfonos de casa, de trabajo, número de celular, Número de Expediente (EXP).</p>
      </div>
      <div class="modal-footer">
        <a href="../" class="btn btn-secondary">Cancelar</a>
        <button type="button" class="btn btn-info" data-dismiss="modal">Acepto</button>
      </div>
    </div>
  </div>
</div>




	 <div class="container-fluid animated fadeIn <?php echo $ocultar; ?>">
	 	<div class="abs-center">
	 		
		 		<div class="bg-muted form p-3">
		 			<div class="row">
		 				<div class="col-12 text-center jumbotron">	
				 			<img src="../img/alertal.svg" class="img-fluid mx-auto animated swing delay-2s" style="width: 250px;">
				 			<h2 class="text-danger">¡Atención!</h2>
				 			<br>
				 			<p class="text-danger">
				 				<b>Verifica que tus datos sean correctos:</b>
								
				 			</p>
				 			<form action="../registroDos/altaUsuario.aspx" method="POST">
					 			<div class="text-left">
					 				<p>
					 					<b>Nombre:</b> <span style="font-size: 1.1em; font-weight: bold;"><?php echo $_SESSION['nombre']; ?></span>
										<br>
										<b>Sexo:</b> <?php if ($_SESSION['genero'] === 'F') { echo "Femenino"; } else{echo "Masculino";} ?>
										<br>
										<b>Puesto:</b> <?php echo $_SESSION['puesto']; ?>
										<br>
										<b>Razón social de la empresa:</b> <?php echo $_SESSION['razonSocial']; ?>
										<br>
										<b>Dirección de la empresa:</b> <?php echo $_SESSION['corp']; ?>
										<br>
										<br>
										<b>Correo Electrónico:</b> 
										<input type="email" name="txtCorreo2" class="form-control" value="<?php echo $_SESSION['correo']; ?>" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" id="email" autofocus/>
										<br>
										<b>Teléfono:</b> 
										<input type="text" name="txtTelefono2" class="form-control" value="<?php echo $_SESSION['telefono']; ?>" maxlength="13" id="number" placeholder="Teléfono de contacto" onkeypress="return event.charCode >= 48 && event.charCode <= 57"/>
										<br>

										<!-- GEO REFERENCIA -->
							 			<div class="form-group ocultarCuadro" id="geoPosLatLong">
							 				<label class="text-muted" for="Empresa">Geo Ref:</label>
							 				<input type="text" name="txtGeoRef" class="form-control" placeholder="Geo Ref" required />
							 			</div>
							 			<!-- GEO REFERENCIA -->
					 				</p>
					 			</div>
					 			<input type="submit" class="btn btn-success btn-lg form-control" value="Continuar" />
					 			<br>
					 			<br>
				 			</form>
				 			<a href="../" class="btn btn-secondary btn-lg form-control">Click aquí para regresar</a>
			 			</div>
			 		</div>
			 	</div>
	 	</div>
	 </div>

	<script src="../js/jquery-3.3.1.slim.min.js"></script>
	<script src="../js/jquery-ui.js"></script>
	<script src="../js/fileinput.js"></script>
	<!-- <script src="../js/fileinput_locale_es.js"></script> -->
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/forms.js"></script>
			<!-- Ajax para Geolocalización -->
		<script>
			
	function geoLocaliza() {
	  var output = document.getElementById("geoPosLatLong");

	  if (!navigator.geolocation){
	    output.innerHTML = '<label class="text-muted" for="Empresa">Geo Ref:</label><input type="text" name="txtGeoRef" class="form-control" placeholder="Geo Ref" value="Tu navegador no soporta la Geo Localización!" required />';
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
		    output.innerHTML = '<label class="text-muted" for="Empresa">Geo Ref:</label><input type="text" name="txtGeoRef" class="form-control" placeholder="Geo Ref" value="No se puede encontrar tu ubicación!" required />';
		  };

		  output.innerHTML = '<label class="text-muted" for="Empresa">Geo Ref:</label><input type="text" name="txtGeoRef" class="form-control" placeholder="Geo Ref" value="Localizando.." required />';

		  navigator.geolocation.getCurrentPosition(success, error);
		}

			  
		</script>
		
	<!-- Ajax para Geolocalización -->

	<script>
		$(document).ready(function()
		{
			$("#mostrarmodal").modal("show");
		});
	</script>

	<script src="../js/info.js"></script>

</body>
</html>



