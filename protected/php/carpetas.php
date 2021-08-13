<?php

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");
date_default_timezone_set('America/Mexico_City');

    $con = new SQLite3("../data/nom035.db") or die("Problemas para conectar");
    $cs = $con -> query("SELECT carpetaPrincipal FROM dataEmpleadosDos GROUP BY carpetaPrincipal ORDER BY carpetaPrincipal");
    
	while ($resul = $cs -> fetchArray()) {
        $carpetaPrincipal = $resul['carpetaPrincipal'];
        echo $carpetaPrincipal.'<br>';
    }

    $con -> close();
?>