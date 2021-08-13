<?php require_once "seguridad.php" ?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>CORSEC</title>

  <!-- Custom fonts for this template-->
  <link href="../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet" />
  <link href="../../../css/sb-admin-2.css" rel="stylesheet" />

</head>

<body id="page-top" <?php $ocultar = (isset($ocultar)) ? $ocultar : ''; echo $ocultar;?> >
  <?php require_once "assets/inc/parte_superior.inc" ?>

  <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tablero</h1>
      </div>
      <div class="col-md-12 animate__animated animate__fadeIn">
        <div class="card shadow mb-4">
          <div class="card-body">

            <div class="row">
              <div class="col-md-6">
                <div class="card shadow mb-4 mt-3">
                  <div class="card-header py-3 bg-primary">
                    <h6 class="m-0 font-weight-bold text-white text-center">Controles GI y GII</h6>
                  </div>

                  <div class="card-body p-0 mb-3">
                    <div class="row">
                      <div class="col-12" style="font-size: .9em;">
                        <ul class="mt-4">
                          <li>
                            <a href="../../../controlGI_GII/impre.aspx" target="_blank" rel="noopener noreferrer">Control</a>
                          </li>
                          <li>
                            <a href="../../../controlDinamicoGI_GII/impre.aspx?filtroFecha=<?php echo date('d-m-Y');?>"
                              target="_blank" rel="noopener noreferrer">Control Dinamico (<i>Fecha Actual</i>)</a>
                          </li>
                          <li>
                            <a href="../../../avancesGI_GII/impre.aspx" target="_blank" rel="noopener noreferrer">Avances</a>
                          </li>
                          <li>
                            <a href="../../../resumenGI_GII/impre.aspx" target="_blank" rel="noopener noreferrer">Resumen</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>

                </div>
              </div>

              <div class="col-md-6">
                <div class="card shadow mb-4 mt-3">
                  <div class="card-header py-3 bg-primary">
                    <h6 class="m-0 font-weight-bold text-white text-center">Controles GI y GIII</h6>
                  </div>

                  <div class="card-body p-0 mb-3">
                    <div class="row">
                      <div class="col-12" style="font-size: .9em;">
                        <ul class="mt-4">
                          <li>
                            <a href="../../../controlGI_GIII/impre.aspx" target="_blank" rel="noopener noreferrer">Control</a>
                          </li>
                          <li>
                            <a href="../../../controlDinamicoGI_GIII/impre.aspx?filtroFecha=<?php echo date('d-m-Y');?>"
                              target="_blank" rel="noopener noreferrer">Control Dinamico (<i>Fecha Actual</i>)</a>
                          </li>
                          <li>
                            <a href="../../../avancesGI_GIII/impre.aspx" target="_blank" rel="noopener noreferrer">Avances</a>
                          </li>
                          <li>
                            <a href="../../../resumenGI_GIII/impre.aspx" target="_blank" rel="noopener noreferrer">Resumen</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>

                </div>
              </div>

              <div class="col-md-6">
                <div class="card shadow mb-4 mt-3">
                  <div class="card-header py-3 bg-warning">
                    <h6 class="m-0 font-weight-bold text-white text-center">Herramientas</h6>
                  </div>

                  <div class="card-body p-0 mb-3">
                    <div class="row">
                      <div class="col-12" style="font-size: .9em;">
                        <ul class="mt-4">
                          <li>
                            <a href="../../../codificador/impre.aspx" target="_blank" rel="noopener noreferrer">Codificador</a>
                          </li>
                          <li>
                            <a href="../../../nombreCorto/app.aspx" target="_blank" rel="noopener noreferrer">Nombre Corto</a>
                          </li>
                          <li>
                            <a href="../../../zip/carpetas.aspx" target="_blank" rel="noopener noreferrer">Descargar Carpetas</a>
                          </li>
                        </ul>
                      </div>
                    </div>

                  </div>

                </div>
              </div>

              <div class="col-md-6">
                <div class="card shadow mb-4 mt-3">
                  <div class="card-header py-3 bg-info">
                    <h6 class="m-0 font-weight-bold text-white text-center">Impresión Global</h6>
                  </div>

                  <div class="card-body p-0 mb-3">
                    <div class="row">
                      <div class="col-12" style="font-size: .9em;">
                        <ul class="mt-4">
                          <li>
                            <a href="../../../impreR01Gen/impre.aspx" target="_blank" rel="noopener noreferrer">Cuestionarios Guía I</a>
                          </li>
                          <li>
                            <a href="../../../impreR02Gen/impre.aspx" target="_blank" rel="noopener noreferrer">Cuestionarios Guía II</a>
                          </li>
                          <li>
                            <a href="../../../impreR03Gen/impre.aspx" target="_blank" rel="noopener noreferrer">Cuestionarios Guía III</a>
                          </li>
                        </ul>
                        <hr>
                        <ul>
                          <li>
                            <a href="../../../impreR01Con/impre.aspx">Conclusiones Guía I (solo terminados)</a>
                          </li>
                        </ul>
                        <hr>
                        <ul>
                          <li>
                            <a href="../../../impreR02ConIndi/impre.aspx" target="_blank" rel="noopener noreferrer">Matriz de Riesgos Guía II por Colaborador</a>
                          </li>
                          <li>
                            <a href="../../../impreR03ConIndi/impre.aspx" target="_blank" rel="noopener noreferrer">Matriz de Riesgos Guía III por Colaborador</a>
                          </li>
                        </ul>
                        <hr>
                        <ul>
                          <li>
                            <a href="../../../impreR02Con/impre.aspx" target="_blank" rel="noopener noreferrer">Matriz de Riesgos Guía II por Centro de Trabajo</a>
                          </li>
                          <li>
                            <a href="../../../impreR03Con/impre.aspx" target="_blank" rel="noopener noreferrer">Matriz de Riesgos Guía III por Centro de Trabajo</a>
                          </li>
                        </ul>
                      </div>
                    </div>

                  </div>

                </div>
              </div>

              <div class="col-md-6">
                <div class="card shadow mb-4 mt-3">
                  <div class="card-header py-3 bg-success">
                    <h6 class="m-0 font-weight-bold text-white text-center">Carpetas GI y GII</h6>
                  </div>

                  <div class="card-body p-0 mb-3">
                    <div class="row">
                      <div class="col-12" style="font-size: .9em;">
                        <ul class="mt-4">
                          <li>
                            <a href="../../../listaR00CentroRazonFullGI_GII/impre.aspx" target="_blank" rel="noopener noreferrer">Carpeta Virtual Centro de Trabajo (solo terminados)</a>
                          </li>
                          <li>
                            <a href="../../../listaR00CentroRazonFullDosGI_GII/impre.aspx" target="_blank" rel="noopener noreferrer">Carpeta Virtual Dos Centro de Trabajo y Razón Social (solo terminados)</a>
                          </li>
                        </ul>
                      </div>
                    </div>

                  </div>

                </div>
              </div>

              <div class="col-md-6">
                <div class="card shadow mb-4 mt-3">
                  <div class="card-header py-3 bg-success">
                    <h6 class="m-0 font-weight-bold text-white text-center">Carpetas GI y GIII</h6>
                  </div>

                  <div class="card-body p-0 mb-3">
                    <div class="row">
                      <div class="col-12" style="font-size: .9em;">
                        <ul class="mt-4">
                          <li>
                            <a href="../../../listaR00CentroRazonFullGI_GIII/impre.aspx" target="_blank" rel="noopener noreferrer">Carpeta Virtual Centro de Trabajo (solo terminados)</a>
                          </li>
                          <li>
                            <a href="../../../listaR00CentroRazonFullDosGI_GIII/impre.aspx" target="_blank" rel="noopener noreferrer">Carpeta Virtual Dos Centro de Trabajo y Razón Social (solo terminados)</a>
                          </li>
                        </ul>
                      </div>
                    </div>

                  </div>

                </div>
              </div>

              <div class="col-md-6">
                <div class="card shadow mb-4 mt-3">
                  <div class="card-header py-3" style="background-color: pink;">
                    <h6 class="m-0 font-weight-bold text-white text-center">Matriz Individual GII</h6>
                  </div>

                  <div class="card-body p-0 mb-3">
                    <div class="row">
                      <div class="col-12" style="font-size: .9em;">
                        <ul class="mt-4">
                          <li>
                            <a href="../../../matrizIndividualGII/impre.aspx" target="_blank" rel="noopener noreferrer">General Empresa (solo terminados)</a>
                          </li>
                          <li>
                            <a href="../../../matrizIndividualGIIxCentro/impre.aspx" target="_blank" rel="noopener noreferrer">Individual por Centro de Trabajo (solo terminados)</a>
                          </li>
                          <li>
                            <a href="../../../matrizIndividualGIIxCentroRazon/impre.aspx" target="_blank" rel="noopener noreferrer">Individual Por Centro de Trabajo y Razón Social (solo terminados)</a>
                          </li>
                        </ul>
                      </div>
                    </div>

                  </div>

                </div>
              </div>

              <div class="col-md-6">
                <div class="card shadow mb-4 mt-3">
                  <div class="card-header py-3" style="background-color: pink;">
                    <h6 class="m-0 font-weight-bold text-white text-center">Matriz Individual GIII</h6>
                  </div>

                  <div class="card-body p-0 mb-3">
                    <div class="row">
                      <div class="col-12" style="font-size: .9em;">
                        <ul class="mt-4">
                          <li>
                            <a href="../../../matrizIndividualGIII/impre.aspx" target="_blank" rel="noopener noreferrer">General Empresa (solo terminados)</a>
                          </li>
                          <li>
                            <a href="../../../matrizIndividualGIIIxCentro/impre.aspx" target="_blank" rel="noopener noreferrer">Individual por Centro de Trabajo (solo terminados)</a>
                          </li>
                          <li>
                            <a href="../../../matrizIndividualGIIIxCentroRazon/impre.aspx" target="_blank" rel="noopener noreferrer">Individual Por Centro de Trabajo y Razón Social (solo terminados)</a>
                          </li>
                        </ul>
                      </div>
                    </div>

                  </div>

                </div>
              </div>

            </div>


          </div>
        </div>
      </div>

    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- End of Main Content -->


  <?php require_once "assets/inc/parte_inferior.inc" ?>

  <script src="../../../vendor/jquery/jquery.min.js"></script>
  <script src="../../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="../../../js/sb-admin-2.min.js"></script>
  <script src="../../../vendor/chart.js/Chart.min.js"></script>
  <!-- <script src="../../../js/demo/chart-area-demo.js"></script>
  <script src="../../../js/demo/chart-pie-demo.js"></script> -->

</body>

</html>