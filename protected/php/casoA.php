<?php 

if ($p8_R1a == 1) {
				$resP8ModI = '<li style="margin-left: 50px; margin-right: 50px; font-weight: bold;">Ha tenido recuerdos recurrentes sobre el acontecimiento que le provocan malestares.</li>';
			}else{
				$resP8ModI = '';
			}
			if ($p9_R1a == 1) {
				$resP9ModI = '<li style="margin-left: 50px; margin-right: 50px; font-weight: bold;">Ha tenido sueños de carácter recurrente sobre el acontecimiento, que le producen malestar.</li>';
			}else{
				$resP9ModI = '';
			}
			$resulSelector = 'Derivado de este acontecimiento traumático, se identificó que el trabajador ha presentado los siguientes síntomas:'
			.$resP8ModI.$resP9ModI.
			'<br>Considerando estos síntomas y con base en la Guía de Referencia I, inciso b), se identifica que el trabajador requiere valoración clínica.';


 ?>