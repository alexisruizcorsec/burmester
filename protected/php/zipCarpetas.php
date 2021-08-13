<?php

error_reporting(E_ALL ^ E_DEPRECATED);
header('Content-type: text/html; charset=utf-8');
date_default_timezone_set('America/Mexico_City');


$rutaCarpeta = 'carpetas.zip';

if(file_exists($rutaCarpeta)){
    unlink($rutaCarpeta);
}

if(!file_exists($rutaCarpeta)){

    $zip = new ZipArchive();
    $res = $zip->open('carpetas.zip', ZipArchive::CREATE);


    $con = new SQLite3("../data/nom035.db") or die("Problemas para conectar");
    $cs = $con -> query("SELECT carpetaPrincipal,Empresad FROM dataEmpleadosDos GROUP BY carpetaPrincipal ORDER BY carpetaPrincipal");
    
    while ($resul = $cs -> fetchArray()) {
        $Empresad = $resul['Empresad'];
        $carpetaPrincipal = $resul['carpetaPrincipal'];
        // echo $carpetaPrincipal.'<br>';
    
        $carpetas = array(
            "1. POLITICA DE PREVENCION DE RIESGOS PSICOSOCIALES", 
            "2. PROCEDIMIENTOS, PROTOCOLOS Y PROGRAMAS", 
            "3. REPORTES GENERALES GUIA I y GUIA III",
            "4. EVIDENCIAS DE APLICACION Y DIFUSION",
            "5. CUESTIONARIOS GUIA I y GUIA III",
            "6. PRESENTACIONES PP NOM-035-STPS-2018"
        );
        $arrlength = count($carpetas);
    
        // for($x = 0; $x < $arrlength; $x++) {
        //     echo $carpetas[$x];
        //     echo "<br>";
        // }
    
        $Empresad = strtoupper($Empresad);
    
        $nombreCarpeta = 'carpetas/CARPETA DIGITAL '.$Empresad.'/'.$carpetaPrincipal;

        //Agrega al ZIP
        $zip->addEmptyDir($nombreCarpeta);

        //Crear Carpeta
        // mkdir($nombreCarpeta, 0777, true);
    
        for ($i=0; $i < $arrlength; $i++) { 
            $ndir = $nombreCarpeta.'/'.$carpetas[$i];
            $ndir = iconv("UTF-8","ISO-8859-1//TRANSLIT",$ndir);

            //Agrega al ZIP
            $zip->addEmptyDir($ndir);

            //Crear Carpeta
            // mkdir($ndir, 0777, true);
    
            //Cuando llega a la carpeta 2
            if($i == 1){
                $dirCarpetaDos = $nombreCarpeta.'/'.$carpetas[$i].'/PROCEDIMIENTO DE ATENCION A QUEJAS Y DENUNCIAS/Formatos';
                $dirCarpetaDos = iconv("UTF-8","ASCII//TRANSLIT",$dirCarpetaDos);

                //Agrega al ZIP
                $zip->addEmptyDir($dirCarpetaDos);

                //Crear Carpeta
                // mkdir($dirCarpetaDos, 0777, true);
    
                $dirCarpetaDos = $nombreCarpeta.'/'.$carpetas[$i].'/PROTOCOLO - VIOLENCIA LABORAL/Formatos';
                $dirCarpetaDos = iconv("UTF-8","ISO-8859-1//TRANSLIT",$dirCarpetaDos);

                //Agrega al ZIP
                $zip->addEmptyDir($dirCarpetaDos);

                //Crear Carpeta
                // mkdir($dirCarpetaDos, 0777, true);
            }
    
            //Cuando llega a la carpeta 4
            if($i == 3){
                $dirCarpetaDos = $nombreCarpeta.'/'.$carpetas[$i].'/Evidencias Fotograficas';
                $dirCarpetaDos = iconv("UTF-8","ISO-8859-1//TRANSLIT",$dirCarpetaDos);

                //Agrega al ZIP
                $zip->addEmptyDir($dirCarpetaDos);

                //Crear Carpeta
                // mkdir($dirCarpetaDos, 0777, true);
    
                $dirCarpetaDos = $nombreCarpeta.'/'.$carpetas[$i].'/Listas de Asistencia';
                $dirCarpetaDos = iconv("UTF-8","ISO-8859-1//TRANSLIT",$dirCarpetaDos);

                //Agrega al ZIP
                $zip->addEmptyDir($dirCarpetaDos);

                //Crear Carpeta
                // mkdir($dirCarpetaDos, 0777, true);
    
                $dirCarpetaDos = $nombreCarpeta.'/'.$carpetas[$i].'/Triptico';
                $dirCarpetaDos = iconv("UTF-8","ISO-8859-1//TRANSLIT",$dirCarpetaDos);
                
                //Agrega al ZIP
                $zip->addEmptyDir($dirCarpetaDos);

                //Crear Carpeta
                // mkdir($dirCarpetaDos, 0777, true);
            }
    
            //Cuando llega a la carpeta 5
            if($i == 4){
    
                $csDos = $con -> query("SELECT carpetaSecundaria FROM dataEmpleadosDos WHERE carpetaPrincipal = '$carpetaPrincipal' GROUP BY carpetaSecundaria ORDER BY carpetaSecundaria");
    
                while ($resulDos = $csDos -> fetchArray()) {
                    $carpetaSecundaria = $resulDos['carpetaSecundaria'];
    
                    $dirCarpetaDos = $nombreCarpeta.'/'.$carpetas[$i].'/'.$carpetaSecundaria;
                    $dirCarpetaDos = iconv("UTF-8","ISO-8859-1//TRANSLIT",$dirCarpetaDos);

                    //Agrega al ZIP
                    $zip->addEmptyDir($dirCarpetaDos);

                    //Crear Carpeta
                    // mkdir($dirCarpetaDos, 0777, true);
    
                    $csTres = $con -> query("SELECT aconted FROM dataEmpleadosDos WHERE carpetaPrincipal = '$carpetaPrincipal' AND carpetaSecundaria = '$carpetaSecundaria' GROUP BY aconted ORDER BY aconted DESC");
    
                        $num = 0;
    
                        while ($resulTres = $csTres -> fetchArray()) {
                            $aconted = $resulTres['aconted'];
                            $num = $num+1;
    
                            //Requieren valoración
                            if ($aconted == 2) {
                                $dirCarpetaTres = $nombreCarpeta.'/'.$carpetas[$i].'/'.$carpetaSecundaria.'/0'.$num.' Requieren valoracion';
                                $dirCarpetaTres = iconv("UTF-8","ISO-8859-1//TRANSLIT",$dirCarpetaTres);

                                //Agrega al ZIP
                                $zip->addEmptyDir($dirCarpetaTres);

                                //Crear Carpeta
                                // mkdir($dirCarpetaTres, 0777, true);
                            }
    
                            //No requieren valoración, pero presentaron acontecimientos.
                            if ($aconted == 1) {
                                $dirCarpetaTres = $nombreCarpeta.'/'.$carpetas[$i].'/'.$carpetaSecundaria.'/0'.$num.' No requieren valoracion - con acontecimientos';
                                $dirCarpetaTres = iconv("UTF-8","ISO-8859-1//TRANSLIT",$dirCarpetaTres);

                                //Agrega al ZIP
                                $zip->addEmptyDir($dirCarpetaTres);
                                
                                //Crear Carpeta
                                // mkdir($dirCarpetaTres, 0777, true);
                            }
    
                            //No requieren
                            if ($aconted == 0) {
                                $dirCarpetaTres = $nombreCarpeta.'/'.$carpetas[$i].'/'.$carpetaSecundaria.'/0'.$num.' No fueron sujetos';
                                $dirCarpetaTres = iconv("UTF-8","ISO-8859-1//TRANSLIT",$dirCarpetaTres);
                                
                                //Agrega al ZIP
                                $zip->addEmptyDir($dirCarpetaTres);
                                
                                //Crear Carpeta
                                // mkdir($dirCarpetaTres, 0777, true);
                            }
                            
                            
                        }
                    
                }
                
                
            }
    
            
        }
    
    }
    
    $zip->close();

    $con -> close();
    
}

// sleep(1);

echo '
<html>
    <head>
        <meta http-equiv="REFRESH" content="0; url=../download/carpetas.zip">
    </head>
</html>

';


?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Descarga Completada</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/all.css">
	<link rel="stylesheet" href="../css/animate.css">
	<link rel="stylesheet" href="../css/style.css">

	
</head>
<body oncontextmenu='return false' onkeydown='return false'>


	 <div class="container-fluid animated fadeIn">
	 	<div class="abs-center">
	 		
		 		<div class="bg-muted form p-3">
		 			<div class="row">
		 				<div class="col-12 text-center jumbotron">	
				 			<img src="../img/zip.svg" class="img-fluid mx-auto animated swing delay-2s" style="width: 250px;">
				 			<h2>¡Gracias!</h2>
				 			<br>
				 			<p>
				 				Descarga completada.
				 			</p>
				 			<a href="../vendor/system/home/inicio.app" class="btn btn-secondary btn-lg form-control">Click aquí para regresar</a>
			 			</div>
			 		</div>
			 	</div>
	 	</div>
	 </div>

	<script src="../js/jquery-3.3.1.slim.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/forms.js"></script>
	<script src="../js/info.js"></script>

</body>
</html>



