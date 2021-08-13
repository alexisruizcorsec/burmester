<?php 

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");
date_default_timezone_set('America/Mexico_City');


 ?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Lista NOM-035 Resultados G3 por Categoria</title>
	<script src="../js/chart.js"></script>
	<style>
		@media print {
			.hoja{
				page-break-before: always;
			}
		}
		.marcoP{
			display: flex;
        align-items: center;
		}
/*		.hoja{
			margin: 0 auto;
			width: 730px;
			height: 980px;
			text-align:  justify;
		}*/
		body {
		    font-family: Arial, sans-serif;
		    }
		table{
			border-collapse: collapse;
		}
		th{
			padding: 3px 10px;
			border: 1px solid black;
		}
		td{
			padding: 3px 10px;
			border: 1px solid black;
		}
		.tSinBorde{
			text-align: center;
			border: 0px solid black;
		}
		.azul{
			background-color: #9be5f7;
		}
		.verde{
			background-color: #6bf56e;
		}
		.amarillo{
			background-color: #ffff00;
		}
		.naranja{
			background-color: #ffc000;
		}
		.rojo{
			background-color: #ff0000 ;
			color: #FFF;
		}
		.centrado {
			text-align: center;
		}

	</style>
</head>
<body>
<!-- <body onload="window.print();"> -->
	<div class="marcoP">
		<div class="hoja">
			<div style="position: absolute; z-index: -1;">
				<div style="height: 950px;">
<?php 
    
    $conPorCategoria = new SQLite3("../data/nom035.db") or die("Problemas para conectar!");
    $csCTrabajo = $conPorCategoria -> query("SELECT COUNT(dirEmpresa_R3a) AS cuantosCentros, dirEmpresa_R3a FROM nom035R3a GROUP BY dirEmpresa_R3a ORDER BY dirEmpresa_R3a");

    while($cTrabajo = $csCTrabajo->fetchArray()){
        $cuantosCentros = $cTrabajo['cuantosCentros'];
        $dirEmpresa_R3a = $cTrabajo['dirEmpresa_R3a'];

        echo '
            <h3>'.$dirEmpresa_R3a.'</h3>

            <table style="font-size: .8em; width: 800px;">
                <tr>
                    <td style="width: 200px; text-align: center"><b> AMBIENTE DE TRABAJO </b></td>
                    <td style="width: 90px; text-align: center"> Número de colaboradores </td>
                    <td style="width: 90px; text-align: center"> Porcentaje </td>
                </tr>
                <tr>
                    <td class="centrado rojo"> Muy alto </td>
                    <td class="centrado"> 22 </td>
                    <td class="centrado"> 32 </td>
                </tr>
                <tr>
                    <td class="centrado naranja"> Alto </td>
                    <td class="centrado"> 22 </td>
                    <td class="centrado"> 32 </td>
                </tr>
                <tr>
                    <td class="centrado amarillo"> Medio </td>
                    <td class="centrado"> 22 </td>
                    <td class="centrado"> 32 </td>
                </tr>
                <tr>
                    <td class="centrado verde"> Bajo </td>
                    <td class="centrado"> 22 </td>
                    <td class="centrado"> 32 </td>
                </tr>
                <tr>
                    <td class="centrado azul"> Nulo o despreciable </td>
                    <td class="centrado"> 22 </td>
                    <td class="centrado"> 32 </td>
                </tr>
                <tr>
                    <td class="centrado"> TOTAL </td>
                    <td class="centrado"> 22 </td>
                    <td class="centrado"> 32 </td>
                </tr>
                <tr>
                    <td class="centrado"> PROMEDIO </td>
                    <td class="centrado"> 22 </td>
                    <td class="centrado"> 32 </td>
                </tr>
            </table>
            <br/>

                <p> Espacio para la donita </p> 

                <div style="font-size: .8em;">
                    <h3> Categorías </h3>
                    <h4>Ambiente de trabajo</h4>
                    ';
                    // $varGraf = "amb".substr(md5($dirEmpresa_R3a), 28, 4);

            echo'
            <table style="width: 800px;">
                <tr>
                    <td class="tSinBorde" style="width: 400px;">
                    <b>Prueba gráfica </b>
                    <div>
                        <canvas id="grafica01a"></canvas>
                    </div>
                    </td>
                </tr>
            </table>
        </div>

        
        ';
        
    ####Script para las gráficas de donita###
    echo "
    <script>
    var ctx1 = document.getElementById('grafica01a').getContext('2d');
    var mixedChart = new Chart(ctx1, {
        type: 'doughnut',
        data: {
            labels: ['Nulo o despreciable', 'Bajo', 'Medio', 'Alto', 'Muy alto'],
            datasets: [{
                label: 'Ambiente de trabajo',
                data: [12, 19, 5, 2, 3],
                backgroundColor: [
                    'rgba(155,229,247,1)',
                    'rgba(107,245,110,1)',
                    'rgba(255,255,0,1)',
                    'rgba(255,192,0,1)',
                    'rgba(255,0,0,1)'
                ],
                borderColor: [
                    'rgba(255,255,255,1)'
                ],
                borderWidth: 2
            }]
        },
        options: {
            tooltips: {
                enabled: true,
                mode: 'single',
                callbacks: {
                    label: function(tooltipItems, data) { 
                        return data.datasets[tooltipItems.datasetIndex].label + ': ' + data.datasets[tooltipItems.datasetIndex].data[tooltipItems.index] + '% ' + data.labels[tooltipItems.datasetIndex];
                    }
                }
            },
         }
    });
        </script>
    ";

    }

    $conPorCategoria -> close();

    ?>
                </div>
			</div>
		</div>
	</div>

    </body>
</html>