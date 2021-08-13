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
			if ($p16_R1a == 1) {
				$resP16ModI = '<li style="margin-left: 50px; margin-right: 50px; font-weight: bold;">Ha tenido la impresión de que su vida se va a acortar, que va a morir antes que otras personas o que tiene un futuro limitado.</li>';
			}else{
				$resP16ModI = '';
			}
			if ($p17_R1a == 1) {
				$resP17ModI = '<li style="margin-left: 50px; margin-right: 50px; font-weight: bold;">Ha tenido usted dificultades para dormir.</li>';
			}else{
				$resP17ModI = '';
			}
			if ($p18_R1a == 1) {
				$resP18ModI = '<li style="margin-left: 50px; margin-right: 50px; font-weight: bold;">Ha estado particularmente irritable o le han dado arranques de coraje.</li>';
			}else{
				$resP18ModI = '';
			}
			if ($p19_R1a == 1) {
				$resP19ModI = '<li style="margin-left: 50px; margin-right: 50px; font-weight: bold;">Ha tenido dificultad para concentrarse.</li>';
			}else{
				$resP19ModI = '';
			}
			if ($p20_R1a == 1) {
				$resP20ModI = '<li style="margin-left: 50px; margin-right: 50px; font-weight: bold;">Ha estado nervioso o constantemente en alerta.</li>';
			}else{
				$resP20ModI = '';
			}
			if ($p21_R1a == 1) {
				$resP21ModI = '<li style="margin-left: 50px; margin-right: 50px; font-weight: bold;">Se ha sobresaltado fácilmente por cualquier cosa.</li>';
			}else{
				$resP21ModI = '';
			}
			$resulSelector = 'Derivado de este acontecimiento traumático, se identificó que el trabajador ha presentado los siguientes síntomas:'
			.$resP8ModI.$resP9ModI.$resP17ModI.$resP18ModI.$resP19ModI.$resP20ModI.$resP21ModI.
			'<br>Considerando estos síntomas y con base en la Guía de Referencia I, inciso b), se identifica que el trabajador requiere valoración clínica.';


 ?>