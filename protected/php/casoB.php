<?php 


			if ($p10_R1a == 1) {
				$resP10ModI = '<li style="margin-left: 50px; margin-right: 50px; font-weight: bold;">Se ha esforzado por evitar todo tipo de sentimientos, conversaciones o situaciones que le puedan recordar el acontecimiento.</li>';
			}else{
				$resP10ModI = '';
			}
			if ($p11_R1a == 1) {
				$resP11ModI = '<li style="margin-left: 50px; margin-right: 50px; font-weight: bold;">Se ha esforzado por evitar todo tipo de actividades, lugares o personas que motivan recuerdos del acontecimiento.</li>';
			}else{
				$resP11ModI = '';
			}
			if ($p12_R1a == 1) {
				$resP12ModI = '<li style="margin-left: 50px; margin-right: 50px; font-weight: bold;">Ha tenido dificultad para recordar alguna parte importante del evento.</li>';
			}else{
				$resP12ModI = '';
			}
			if ($p13_R1a == 1) {
				$resP13ModI = '<li style="margin-left: 50px; margin-right: 50px; font-weight: bold;">Ha disminuido su interés en sus actividades cotidianas.</li>';
			}else{
				$resP13ModI = '';
			}
			if ($p14_R1a == 1) {
				$resP14ModI = '<li style="margin-left: 50px; margin-right: 50px; font-weight: bold;">Se ha sentido usted alejado o distante de los demás.</li>';
			}else{
				$resP14ModI = '';
			}
			if ($p15_R1a == 1) {
				$resP15ModI = '<li style="margin-left: 50px; margin-right: 50px; font-weight: bold;">Ha notado que tiene dificultad para expresar sus sentimientos.</li>';
			}else{
				$resP15ModI = '';
			}
			if ($p16_R1a == 1) {
				$resP16ModI = '<li style="margin-left: 50px; margin-right: 50px; font-weight: bold;">Ha tenido la impresión de que su vida se va a acortar, que va a morir antes que otras personas o que tiene un futuro limitado.</li>';
			}else{
				$resP16ModI = '';
			}
			
			$resulSelector = 'Derivado de este acontecimiento traumático, se identificó que el trabajador ha presentado los siguientes síntomas:'
			.$resP10ModI.$resP11ModI.$resP12ModI.$resP13ModI.$resP14ModI.$resP15ModI.$resP16ModI.
			'<br>Considerando estos síntomas y con base en la Guía de Referencia I, inciso b), se identifica que el trabajador requiere valoración clínica.';


 ?>