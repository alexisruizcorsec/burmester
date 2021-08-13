<?php

// CONSULTA AJAX PHP



error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");

$idUsuarioBase=$_POST["idDatoTabla"];


if (isset($idUsuarioBase) && !empty($idUsuarioBase)) {

$con = new SQLite3("../data/baseGeneral.db");

$cs = $con -> query("SELECT * FROM clientes WHERE id ='$idUsuarioBase'");

 while($resultado = $cs->fetchArray()) {
    $idTabla = $resultado['id'];
    $razonSocial = $resultado['razonSocial'];
    $nombreEnPlaca = $resultado['nombreEnPlaca'];
    $anosComoESR = $resultado['anosComoESR'];
    $participaEnElProceso = $resultado['participaEnElProceso'];
    $obtuvoDistintivo2019 = $resultado['obtuvoDistintivo2019'];
    $corporativo = $resultado['corporativo'];
    $directorGeneral = $resultado['directorGeneral'];
    $representanteCemefi = $resultado['representanteCemefi'];
    $representanteCemefi2 = $resultado['representanteCemefi2'];
    $representanteCemefi3 = $resultado['representanteCemefi3'];
    $puesto = $resultado['puesto'];
    $email = $resultado['email'];
    $email2 = $resultado['email2'];
    $email3 = $resultado['email3'];
    $telefono = $resultado['telefono'];
    $producto = $resultado['producto'];
    $servicio = $resultado['servicio'];
    $direccion = $resultado['direccion'];
    $colonia = $resultado['colonia'];
    $delegacion = $resultado['delegacion'];
    $ciudad = $resultado['ciudad'];
    $estado = $resultado['estado'];
    $codPost = $resultado['codPost'];
    $pais = $resultado['pais'];
    $rfc = $resultado['rfc'];
    $telefonoPrincipal = $resultado['telefonoPrincipal'];
    $web = $resultado['web'];
    $facebook = $resultado['facebook'];
    $twitter = $resultado['twitter'];
    $otra = $resultado['otra'];
    $fundacionEmpresarial = $resultado['fundacionEmpresarial'];
    $tamanoDeEmpresa = $resultado['tamanoDeEmpresa'];
    $sector = $resultado['sector'];
    $esPyMECVPatroEntiPromo = $resultado['esPyMECVPatroEntiPromo'];
    $cadenadeValor = $resultado['cadenadeValor'];
    $socios = $resultado['socios'];
    $categoriaSocios = $resultado['categoriaSocios'];
    $pagoRegistrado = $resultado['pagoRegistrado'];
    $fechaDePago = $resultado['fechaDePago'];
    $estatus = $resultado['estatus'];
    $montoPagado = $resultado['montoPagado'];
    $conceptosPagados = $resultado['conceptosPagados'];
    $replica = $resultado['replica'];
    $retroalimentacion = $resultado['retroalimentacion'];
    $fichaDeRegistro = $resultado['fichaDeRegistro'];
    $cartaMotivos = $resultado['cartaMotivos'];
    $cartaDecalogo = $resultado['cartaDecalogo'];
    $comprobanteDePago = $resultado['comprobanteDePago'];
    $logo = $resultado['logo'];
    $codigoDeEtica_Conduc = $resultado['codigoDeEtica_Conduc'];
    $comiteRSE = $resultado['comiteRSE'];
    $reglasDeUsoLogotipo = $resultado['reglasDeUsoLogotipo'];
    $cuestionario = $resultado['cuestionario'];
    $observaciones = $resultado['observaciones'];
    $inscripcion = $resultado['inscripcion'];
    $aliadoRegionalConsultor = $resultado['aliadoRegionalConsultor'];
    $obtuvoDistintivo2014 = $resultado['obtuvoDistintivo2014'];
    $obtuvoDistintivo2015 = $resultado['obtuvoDistintivo2015'];
    $obtuvoDistintivo2016 = $resultado['obtuvoDistintivo2016'];
    $obtuvoDistintivo2017 = $resultado['obtuvoDistintivo2017'];
    $obtuvoDistintivo2018 = $resultado['obtuvoDistintivo2018'];
    $empresa1 = $resultado['empresa1'];
    $inclusionSocial = $resultado['inclusionSocial'];
    $base = $resultado['base'];
    $categoria = $resultado['categoria'];
    $observaContacto = $resultado['observaContacto'];
    $estatusContacto = $resultado['estatusContacto'];
}

$con -> close();

echo '
            <input type="hidden" id="idContacto" value="'.$idTabla.'"/>

            <div class="form-group">
              <label for="razonSocial">Razón social</label>
              <input type="text" class="form-control" id="razonSocial" aria-describedby="razonSocial" value="'.$razonSocial.'">
            </div>
            <div class="form-group">
              <label for="nombreEnPlaca">Nombre en placa</label>
              <input type="text" class="form-control" id="nombreEnPlaca" aria-describedby="nombreEnPlaca" value="'.$nombreEnPlaca.'">
            </div>
            <div class="form-group">
              <label for="anosComoESR">Años como ESR</label>
              <input type="text" class="form-control" id="anosComoESR" aria-describedby="anosComoESR" value="'.$anosComoESR.'">
            </div>
            <div class="form-group">
              <label for="participaEnElProceso">Participa en el proceso</label>
              <input type="text" class="form-control" id="participaEnElProceso" aria-describedby="participaEnElProceso" value="'.$participaEnElProceso.'">
            </div>
            <div class="form-group">
              <label for="obtuvoDistintivo2019">Obtuvo Distintivo 2019</label>
              <input type="text" class="form-control" id="obtuvoDistintivo2019" aria-describedby="obtuvoDistintivo2019" value="'.$obtuvoDistintivo2019.'">
            </div>
            <div class="form-group">
              <label for="corporativo">Corporativo</label>
              <input type="text" class="form-control" id="corporativo" aria-describedby="corporativo" value="'.$corporativo.'">
            </div>
            <div class="form-group">
              <label for="directorGeneral">Director General</label>
              <input type="text" class="form-control" id="directorGeneral" aria-describedby="directorGeneral" value="'.$directorGeneral.'">
            </div>
            <div class="form-group">
              <label for="representanteCemefi">Representante Cemefi</label>
              <input type="text" class="form-control" id="representanteCemefi" aria-describedby="representanteCemefi" value="'.$representanteCemefi.'">
            </div>
            <div class="form-group">
              <label for="representanteCemefi2">Representante Cemefi 2</label>
              <input type="text" class="form-control" id="representanteCemefi2" aria-describedby="representanteCemefi2" value="'.$representanteCemefi2.'">
            </div>
            <div class="form-group">
              <label for="representanteCemefi3">Representante Cemefi 3</label>
              <input type="text" class="form-control" id="representanteCemefi3" aria-describedby="representanteCemefi3" value="'.$representanteCemefi3.'">
            </div>
            <div class="form-group">
              <label for="puesto">Puesto</label>
              <input type="text" class="form-control" id="puesto" aria-describedby="puesto" value="'.$puesto.'">
            </div>
            <div class="form-group">
              <label for="email">e mail</label>
              <input type="text" class="form-control" id="email" aria-describedby="email" value="'.$email.'">
            </div>
            <div class="form-group">
              <label for="email2">e mail 2</label>
              <input type="text" class="form-control" id="email2" aria-describedby="email2" value="'.$email2.'">
            </div>
            <div class="form-group">
              <label for="email3">e mail 3</label>
              <input type="text" class="form-control" id="email3" aria-describedby="email3" value="'.$email3.'">
            </div>
            <div class="form-group">
              <label for="telefono">Teléfono</label>
              <input type="text" class="form-control" id="telefono" aria-describedby="telefono" value="'.$telefono.'">
            </div>
            <div class="form-group">
              <label for="producto">Producto</label>
              <input type="text" class="form-control" id="producto" aria-describedby="producto" value="'.$producto.'">
            </div>
            <div class="form-group">
              <label for="servicio">Servicio</label>
              <input type="text" class="form-control" id="servicio" aria-describedby="servicio" value="'.$servicio.'">
            </div>
            <div class="form-group">
              <label for="direccion">Dirección</label>
              <input type="text" class="form-control" id="direccion" aria-describedby="direccion" value="'.$direccion.'">
            </div>
            <div class="form-group">
              <label for="colonia">Colonia</label>
              <input type="text" class="form-control" id="colonia" aria-describedby="colonia" value="'.$colonia.'">
            </div>
            <div class="form-group">
              <label for="delegacion">Delegación</label>
              <input type="text" class="form-control" id="delegacion" aria-describedby="delegacion" value="'.$delegacion.'">
            </div>
            <div class="form-group">
              <label for="ciudad">Ciudad</label>
              <input type="text" class="form-control" id="ciudad" aria-describedby="ciudad" value="'.$ciudad.'">
            </div>
            <div class="form-group">
              <label for="estado">Estado</label>
              <input type="text" class="form-control" id="estado" aria-describedby="estado" value="'.$estado.'">
            </div>
            <div class="form-group">
              <label for="codPost">C.P.</label>
              <input type="text" class="form-control" id="codPost" aria-describedby="codPost" value="'.$codPost.'">
            </div>
            <div class="form-group">
              <label for="pais">País</label>
              <input type="text" class="form-control" id="pais" aria-describedby="pais" value="'.$pais.'">
            </div>
            <div class="form-group">
              <label for="rfc">RFC</label>
              <input type="text" class="form-control" id="rfc" aria-describedby="rfc" value="'.$rfc.'">
            </div>
            <div class="form-group">
              <label for="telefonoPrincipal">Teléfono Principal</label>
              <input type="text" class="form-control" id="telefonoPrincipal" aria-describedby="telefonoPrincipal" value="'.$telefonoPrincipal.'">
            </div>
            <div class="form-group">
              <label for="web">web</label>
              <input type="text" class="form-control" id="web" aria-describedby="web" value="'.$web.'">
            </div>
            <div class="form-group">
              <label for="facebook">Facebook</label>
              <input type="text" class="form-control" id="facebook" aria-describedby="facebook" value="'.$facebook.'">
            </div>
            <div class="form-group">
              <label for="twitter">Twitter</label>
              <input type="text" class="form-control" id="twitter" aria-describedby="twitter" value="'.$twitter.'">
            </div>
            <div class="form-group">
              <label for="otra">Otra</label>
              <input type="text" class="form-control" id="otra" aria-describedby="otra" value="'.$otra.'">
            </div>
            <div class="form-group">
              <label for="fundacionEmpresarial">Fundación Empresarial</label>
              <input type="text" class="form-control" id="fundacionEmpresarial" aria-describedby="fundacionEmpresarial" value="'.$fundacionEmpresarial.'">
            </div>
            <div class="form-group">
              <label for="tamanoDeEmpresa">Tamaño de empresa</label>
              <input type="text" class="form-control" id="tamanoDeEmpresa" aria-describedby="tamanoDeEmpresa" value="'.$tamanoDeEmpresa.'">
            </div>
            <div class="form-group">
              <label for="sector">Sector</label>
              <input type="text" class="form-control" id="sector" aria-describedby="sector" value="'.$sector.'">
            </div>
            <div class="form-group">
              <label for="esPyMECVPatroEntiPromo">Es PyME C.V., Patrocinadora o Entidad Promotora</label>
              <input type="text" class="form-control" id="esPyMECVPatroEntiPromo" aria-describedby="esPyMECVPatroEntiPromo" value="'.$esPyMECVPatroEntiPromo.'">
            </div>
            <div class="form-group">
              <label for="cadenadeValor">Cadena de Valor</label>
              <input type="text" class="form-control" id="cadenadeValor" aria-describedby="cadenadeValor" value="'.$cadenadeValor.'">
            </div>
            <div class="form-group">
              <label for="socios">Socios</label>
              <input type="text" class="form-control" id="socios" aria-describedby="socios" value="'.$socios.'">
            </div>
            <div class="form-group">
              <label for="categoriaSocios">Categoria Socios</label>
              <input type="text" class="form-control" id="categoriaSocios" aria-describedby="categoriaSocios" value="'.$categoriaSocios.'">
            </div>
            <div class="form-group">
              <label for="pagoRegistrado">Pago Registrado</label>
              <input type="text" class="form-control" id="pagoRegistrado" aria-describedby="pagoRegistrado" value="'.$pagoRegistrado.'">
            </div>
            <div class="form-group">
              <label for="fechaDePago">Fecha de pago</label>
              <input type="text" class="form-control" id="fechaDePago" aria-describedby="fechaDePago" value="'.$fechaDePago.'">
            </div>
            <div class="form-group">
              <label for="estatus">Estatus</label>
              <input type="text" class="form-control" id="estatus" aria-describedby="estatus" value="'.$estatus.'">
            </div>
            <div class="form-group">
              <label for="montoPagado">Monto Pagado</label>
              <input type="text" class="form-control" id="montoPagado" aria-describedby="montoPagado" value="'.$montoPagado.'">
            </div>
            <div class="form-group">
              <label for="conceptosPagados">Conceptos Pagados</label>
              <input type="text" class="form-control" id="conceptosPagados" aria-describedby="conceptosPagados" value="'.$conceptosPagados.'">
            </div>
            <div class="form-group">
              <label for="replica">Réplica</label>
              <input type="text" class="form-control" id="replica" aria-describedby="replica" value="'.$replica.'">
            </div>
            <div class="form-group">
              <label for="retroalimentacion">Retroalimentación</label>
              <input type="text" class="form-control" id="retroalimentacion" aria-describedby="retroalimentacion" value="'.$retroalimentacion.'">
            </div>
            <div class="form-group">
              <label for="fichaDeRegistro">Ficha de Registro</label>
              <input type="text" class="form-control" id="fichaDeRegistro" aria-describedby="fichaDeRegistro" value="'.$fichaDeRegistro.'">
            </div>
            <div class="form-group">
              <label for="cartaMotivos">Carta Motivos</label>
              <input type="text" class="form-control" id="cartaMotivos" aria-describedby="cartaMotivos" value="'.$cartaMotivos.'">
            </div>
            <div class="form-group">
              <label for="cartaDecalogo">Carta Decálogo</label>
              <input type="text" class="form-control" id="cartaDecalogo" aria-describedby="cartaDecalogo" value="'.$cartaDecalogo.'">
            </div>
            <div class="form-group">
              <label for="comprobanteDePago">Comprobante de Pago</label>
              <input type="text" class="form-control" id="comprobanteDePago" aria-describedby="comprobanteDePago" value="'.$comprobanteDePago.'">
            </div>
            <div class="form-group">
              <label for="logo">Logo</label>
              <input type="text" class="form-control" id="logo" aria-describedby="logo" value="'.$logo.'">
            </div>
            <div class="form-group">
              <label for="codigoDeEtica_Conduc">Codigo de Ética / Conducta</label>
              <input type="text" class="form-control" id="codigoDeEtica_Conduc" aria-describedby="codigoDeEtica_Conduc" value="'.$codigoDeEtica_Conduc.'">
            </div>
            <div class="form-group">
              <label for="comiteRSE">Comité RSE</label>
              <input type="text" class="form-control" id="comiteRSE" aria-describedby="comiteRSE" value="'.$comiteRSE.'">
            </div>
            <div class="form-group">
              <label for="reglasDeUsoLogotipo">Reglas de Uso Logotipo</label>
              <input type="text" class="form-control" id="reglasDeUsoLogotipo" aria-describedby="reglasDeUsoLogotipo" value="'.$reglasDeUsoLogotipo.'">
            </div>
            <div class="form-group">
              <label for="cuestionario">Cuestionario</label>
              <input type="text" class="form-control" id="cuestionario" aria-describedby="cuestionario" value="'.$cuestionario.'">
            </div>
            <div class="form-group">
              <label for="observaciones">Observaciones</label>
              <input type="text" class="form-control" id="observaciones" aria-describedby="observaciones" value="'.$observaciones.'">
            </div>
            <div class="form-group">
              <label for="inscripcion">Inscripción</label>
              <input type="text" class="form-control" id="inscripcion" aria-describedby="inscripcion" value="'.$inscripcion.'">
            </div>
            <div class="form-group">
              <label for="aliadoRegionalConsultor">Aliado Regional Consultor</label>
              <input type="text" class="form-control" id="aliadoRegionalConsultor" aria-describedby="aliadoRegionalConsultor" value="'.$aliadoRegionalConsultor.'">
            </div>
            <div class="form-group">
              <label for="obtuvoDistintivo2014">Obtuvo Distintivo 2014</label>
              <input type="text" class="form-control" id="obtuvoDistintivo2014" aria-describedby="obtuvoDistintivo2014" value="'.$obtuvoDistintivo2014.'">
            </div>
            <div class="form-group">
              <label for="obtuvoDistintivo2015">Obtuvo Distintivo 2015</label>
              <input type="text" class="form-control" id="obtuvoDistintivo2015" aria-describedby="obtuvoDistintivo2015" value="'.$obtuvoDistintivo2015.'">
            </div>
            <div class="form-group">
              <label for="obtuvoDistintivo2016">Obtuvo Distintivo 2016</label>
              <input type="text" class="form-control" id="obtuvoDistintivo2016" aria-describedby="obtuvoDistintivo2016" value="'.$obtuvoDistintivo2016.'">
            </div>
            <div class="form-group">
              <label for="obtuvoDistintivo2017">Obtuvo Distintivo 2017</label>
              <input type="text" class="form-control" id="obtuvoDistintivo2017" aria-describedby="obtuvoDistintivo2017" value="'.$obtuvoDistintivo2017.'">
            </div>
            <div class="form-group">
              <label for="obtuvoDistintivo2018">Obtuvo Distintivo 2018</label>
              <input type="text" class="form-control" id="obtuvoDistintivo2018" aria-describedby="obtuvoDistintivo2018" value="'.$obtuvoDistintivo2018.'">
            </div>
            <div class="form-group">
              <label for="empresa1">Empresa 1%</label>
              <input type="text" class="form-control" id="empresa1" aria-describedby="empresa1" value="'.$empresa1.'">
            </div>
            <div class="form-group">
              <label for="inclusionSocial">Inclusión Social</label>
              <input type="text" class="form-control" id="inclusionSocial" aria-describedby="inclusionSocial" value="'.$inclusionSocial.'">
            </div>
            <div class="form-group">
              <label for="base">Base de Datos de Origen</label>
              <input type="text" class="form-control" id="base" aria-describedby="base" value="'.$base.'">
            </div>
            <div class="form-group">
              <label for="categoria">Categoría</label>
              <input type="text" class="form-control" id="categoria" aria-describedby="categoria" value="'.$categoria.'">
            </div>
            <div class="form-group">
              <label for="observaContacto">Observaciones de Contacto</label>
              <input type="text" class="form-control" id="observaContacto" aria-describedby="observaContacto" value="'.$observaContacto.'">
            </div>
            <div class="form-group">
              <label for="estatusContacto">Estatus de Contacto</label>
              <select name="" id="estatusContacto" class="form-control">
                <option value="">-----</option>
                <option value="'.$estatusContacto.'" selected>'.$estatusContacto.'</option>
                <option value="">-----</option>
                <option value="Prospecto">Prospecto</option>
                <option value="No interesado">No interesado</option>
                <option value="Oportunidad de negocio">Oportunidad de negocio</option>
                <option value="Cliente Potencial">Cliente Potencial</option>
                <option value="Cliente">Cliente</option>
              </select>
            </div>


';




}





?>

