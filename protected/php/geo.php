<?php 

$latitud = $_GET['q'];
$longitud = $_GET['q2'];

$geoReferencia = $latitud.','.$longitud;

echo '<label class="text-muted" for="Empresa">Geo Ref:</label><input type="text" name="txtGeoRef" class="form-control" placeholder="Geo Ref" value="'.$geoReferencia.'" required/>';

 ?>