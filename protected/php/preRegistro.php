<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/all.css">
	<link rel="stylesheet" href="../css/animate.css">
	<title>Inicio CORSEC</title>
	<style>
	.imgFondo {
	position: absolute;
	bottom: 0px;
	right: 0px;
	min-width: 100%;
	min-height: 100%;
	width: auto;
	height: auto;
	z-index: -1000;
	overflow: hidden;
	}
	.form-control{
		background-color: rgba(255,255,255,0.1);
		color: #FFF;
	}
	.input-group-text{
		background-color: rgba(255,255,255,0.1);
		color: #FFF;
	}
	input[type="text"]::-webkit-input-placeholder {
		color: #fff;
	}
	input[type="password"]::-webkit-input-placeholder {
		color: #fff;
	}
	.cuadroCero{
		position: absolute;
		width: 30px;
		height: 30px;
		cursor: crosshair;
	}
	</style>
</head>
<body>

	<img src="../img/wallpaper.jpg" class="imgFondo">

	<div class="container-fluid">
		<div class="row d-flex justify-content-center align-items-center" style="margin-top: 140px;">
			<div class="col-12 col-lg-4 col-md-8 justify-content-center text-center">
				<div style="background-color: rgba(0,0,0,0.5); border-radius: 10px;">
					
					<a href="registro/usuarios.aspx" class="cuadroCero"></a>
					<img class="my-5" src="../img/logo2.svg" alt="Logo CORSEC">

					<form action="validaPreRegistro.php" method="POST" class="mx-2 mx-md-4">

						
						<div class="input-group input-group-lg mb-3">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="fas fa-asterisk"></i>
								</div>
							</div>
							<input type="password" class="form-control" name="passwordAdmin" placeholder="Contraseña">
						</div>
						<br>
						<div class="text-right">
							<input type="submit" class="btn btn-outline-light btn-lg" value="Continuar"/>
						</div>
						<br>
						
					</form>
				</div>
			</div>
		</div>
	</div>


	<script src="../js/jquery-3.3.1.slim.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>