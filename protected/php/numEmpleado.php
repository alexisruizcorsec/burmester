<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Número de Empleado</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/all.css">
	<link rel="stylesheet" href="../css/animate.css">
	<link rel="stylesheet" href="../css/style.css">

	
</head>
<body>

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


	 <div class="container-fluid animated fadeIn">
	 	<div class="abs-center">
	 		
		 		<div class="bg-muted form p-1 mx-2">
		 			<div class="row">
		 				<div class="col-12 text-center jumbotron mt-3">	
				 			<img src="../img/numEmpleado.svg" class="img-fluid mx-auto animated swing delay-2s">
				 			<h2>Ingresa tu número de empleado</h2>
				 			<br>
				 			<div class="my-3 px-2">
				 				<form action="../registro/nuevoRegistro.aspx" method="post">
				 					<div class="row">
				 						
				 						<div class="col-2 p-1">
				 							<input type="text" name="txtN1" class="form-control text-center p-1" style="font-size: 1.8em;" maxlength="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="8" required/>
				 						</div>
				 						<div class="col-2 p-1">
				 							<input type="text" name="txtN2" class="form-control text-center p-1" style="font-size: 1.8em;" maxlength="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="0" required/>
				 						</div>
				 						<div class="col-2 p-1">
				 							<input type="text" name="txtN3" class="form-control text-center p-1" style="font-size: 1.8em;" maxlength="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="0" required/>
				 						</div>
				 						<div class="col-2 p-1">
				 							<input type="text" name="txtN4" class="form-control text-center p-1" style="font-size: 1.8em;" maxlength="1" onkeypress="nextFocus('input1', 'input2'); return event.charCode >= 48 && event.charCode <= 57" autofocus required id="input1"/>
				 						</div>
				 						<div class="col-2 p-1">
				 							<input type="text" name="txtN5" class="form-control text-center p-1" style="font-size: 1.8em;" maxlength="1" onkeypress="nextFocus('input2', 'input3'); return event.charCode >= 48 && event.charCode <= 57" required id="input2"/>
				 						</div>
				 						<div class="col-2 p-1">
				 							<input type="text" name="txtN6" class="form-control text-center p-1" style="font-size: 1.8em;" maxlength="1" onkeypress="nextFocus('input3', 'input4'); return event.charCode >= 48 && event.charCode <= 57" required id="input3"/>
				 						</div>
				 						<div class="mt-5 text-center mx-auto">
				 							<input type="submit" class="btn btn-info btn-lg form-control" id="input4" value="Continuar" />
				 							<a href="../" class="btn btn-secondary btn-lg form-control mt-3">Click aquí para regresar</a>
				 						</div>

				 					</div>
				 					
				 				</form>
				 			</div>
				 			
			 			</div>
			 		</div>
			 	</div>
	 	</div>
	 </div>

	<script src="../js/jquery-3.3.1.slim.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/forms.js"></script>
	<script>
   $(document).ready(function()
   {
      $("#mostrarmodal").modal("show");
   });
</script>

	<script>
		function nextFocus(inputF, inputS) {
		  document.getElementById(inputF).addEventListener('keydown', function(event) {
		    if (event.keyCode == 13) {
		      document.getElementById(inputS).focus();
		    }
		  });
		}
	</script>

</body>
</html>



