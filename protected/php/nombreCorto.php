<?php 

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");
date_default_timezone_set('America/Mexico_City');

session_start();

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>NOM-035-STPS-2018</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/all.css">
	<link rel="stylesheet" href="../css/animate.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/sweetalert2.min.css">
	<style>
		
		html {
        	height: 100%;
        }

		body {
			display: flex;
			justify-content: center;
			align-items: center;
			min-height: 100%;
        }

	</style>

	
</head>
<!-- <body oncontextmenu='return false' onkeydown='return false'> -->
<body style="background-color: #dddddd;">

	<div class="container" id="app">
		<div class="row">
			<div class="col-md-8 mx-auto rounded my-md-5 shadow animated fadeIn bg-white">
				<div class="centrado-h-v">
					<div class="py-5 px-3">
						<h3>Nombre Corto</h3>
						<p>Crea nombres cortos para los centros de trabajo</p>
						<span class="small text-danger">Nota: Los nombre cortos, serán los títulos para la estructura de carpetas.</span>
						<div class="row">
							<div class="col-md-12 mt-5">
								<table class="table table-responsive" id="dataTable" width="100%" cellspacing="0" cellpadding="0" style="font-size: .8em;">
									<thead class="bg-primary text-white">
									<tr>
										<th>#</th>
										<th>Dirección física</th>
										<th>Razón Social</th>
										<th>Carpeta primaria</th>
										<th>Carpeta secundaria</th>
										<th></th>
									</tr>
									</thead>
									<tbody>
									<tr v-for="(listaDes, index) of datos">
										<td><i>{{index+1}}<i></td>
										<td>{{listaDes.Corporativod}}</td>
										<td><b>{{listaDes.RazonSociald}}</b></td>
										<td>{{listaDes.carpetaPrincipal}}</td>
										<td>{{listaDes.carpetaSecundaria}}</td>
										<td>
										<div class="btn-group">
											<button class="btn btn-primary btn-sm"
											@click="btnEditar(listaDes.Corporativod, listaDes.RazonSociald, listaDes.carpetaPrincipal, listaDes.carpetaSecundaria)">
											<i class="fas fa-pen text-light"></i>
											</button>
											<!-- <button class="btn btn-danger btn-sm"
											@click="btnEliminar(listaDes.id, listaDes.impacto)">
											<i class="fas fa-trash-alt text-light"></i>
											</button> -->
										</div>
										</td>
									</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="../js/jquery-3.3.1.slim.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/sweetalert2.min.js"></script>
  	<script src="../js/axios.min.js"></script>
	<script src="../js/vue.js"></script>
	<script>
		new Vue({
			el: '#app',
			data: {
				datos: [],
			},
			methods: {

				btnEditar: async function (Corporativod,RazonSociald,carpetaPrincipal,carpetaSecundaria) {


					await Swal.fire({
					title: 'EDITAR',
					html: '<div class="row text-left"><div class="form-group col-md-12" ><label>Dirección física</label><input  class="form-control bg-light border-1 small" type="text" value="' + Corporativod + '" id="Corporativod" disabled></div><div class="form-group col-md-12" ><label>Razón Social	</label><input  class="form-control bg-light border-1 small" type="text" value="' + RazonSociald + '" id="RazonSociald" disabled><div class="form-group col-md-12" ><label>Carpeta primaria</label><input  class="form-control bg-light border-1 small" type="text" value="' + carpetaPrincipal + '" id="carpetaPrincipal" maxlength="52" onKeypress="if (event.keyCode > 32 && event.keyCode < 48 || event.keyCode > 57 && event.keyCode < 65 || event.keyCode > 90 && event.keyCode < 97 || event.keyCode > 122 && event.keyCode < 160 || event.keyCode > 166 && event.keyCode < 190) event.returnValue = false;"></div><div class="form-group col-md-12" ><label>Carpeta secundaria</label><input  class="form-control bg-light border-1 small" type="text" value="' + carpetaSecundaria + '" id="carpetaSecundaria" maxlength="52" onKeypress="if (event.keyCode > 32 && event.keyCode < 48 || event.keyCode > 57 && event.keyCode < 65 || event.keyCode > 90 && event.keyCode < 97 || event.keyCode > 122 && event.keyCode < 160 || event.keyCode > 166 && event.keyCode < 190) event.returnValue = false;"></div></div>',
					focusConfirm: false,
					showCancelButton: true,
					confirmButtonText: 'Guardar',
					confirmButtonColor: '#1cc88a',
					cancelButtonText: 'Cancelar',
					cancelButtonColor: '#3085d6',
					}).then((result) => {

					if (result.value) {
						Corporativod = document.getElementById('Corporativod').value,
						RazonSociald = document.getElementById('RazonSociald').value,
						carpetaPrincipal = document.getElementById('carpetaPrincipal').value,
						carpetaSecundaria = document.getElementById('carpetaSecundaria').value

						this.editar(Corporativod,RazonSociald,carpetaPrincipal,carpetaSecundaria);
						Swal.fire(
						'¡Actualizado!',
						'El registro ha sido actualizado.',
						'success'
						)
					}
					});

				},

				// Procedimiento EDITAR.
				editar(Corporativod,RazonSociald,carpetaPrincipal,carpetaSecundaria) {
					axios.post('../listaNombreCorto/crud.app', {
						opcion: 2,
						Corporativod: Corporativod,
						RazonSociald: RazonSociald,
						carpetaPrincipal: carpetaPrincipal,
						carpetaSecundaria: carpetaSecundaria
					}).then(response => {
						this.listaDatos();
					});
				},

				listaDatos() {
					axios.post('../listaNombreCorto/crud.app', {
						opcion: 4
					}).then(response => {
						this.datos = response.data;
					});
				},
			},

			created() {
					this.listaDatos();
			},
		})
			
	</script>


</body>
</html>
