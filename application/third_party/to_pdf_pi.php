<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

ini_set("memory_limit","4112M");

function pdf_create($html, $filename, $stream=TRUE, $orientation="portrait", $paper="letter"){
	
	require_once(BASEPATH."plugins/dompdf/dompdf_config.inc.php");

	$dompdf = new DOMPDF();

  	$dompdf->set_paper($paper, $orientation);

	$dompdf->load_html($html);

	$dompdf->render();

	if ($stream) {
		$dompdf->stream($filename.".pdf");
	}
}

function pdf_create_save($html, $filename, $stream=TRUE, $orientation="portrait", $paper="letter"){

	require_once(BASEPATH."plugins/dompdf/dompdf_config.inc.php");

	$dompdf = new DOMPDF();

  	$dompdf->set_paper($paper, $orientation);

	$dompdf->load_html($html);

	$dompdf->render();

	$output = $dompdf->output();
   
    write_file('./files/requisitions_format/'.$filename.'.php',  $output);
}

