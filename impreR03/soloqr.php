<?php 


    include("phpqrcode/qrlib.php");

    $codeText = $_GET['txtQr'];
	$outfile = false;
	$level = 'h';
	$size = 10;
	$margin = 1;
	$saveandprint = false;
    $back_color = 0xFFFFFF;
	$fore_color = 0x000000;
	QRcode::png($codeText, $outfile, $level, $size, $margin, $saveandprint, $back_color, $fore_color);

	


 ?>