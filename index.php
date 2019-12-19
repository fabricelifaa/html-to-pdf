<?php 
	require "Proctectpdf.php";
	$html= "<h1>Hello world!</h1>";
	$filename= "doc1";
	$password = "Azerty90";
	$destination= __DIR__ .'/output/';

	function create_pdf($html, $filename, $password, $file_dest=null){
		require_once __DIR__ . '/vendor/autoload.php';

		if (! isset($file_dest) || $file_dest = null) {
			$file_dest = __DIR__ .'/output/';
		}
    	
		$mpdf = new \Mpdf\Mpdf();
		$mpdf->WriteHTML($html);
		$mpdf->Output( $filename .'.pdf', \Mpdf\Output\Destination::FILE );
		
		$pdf = new Proctectpdf($filename .'.pdf', $password);
		// save PDF as file on the server
		$pdf->setTitle("Test PDF")->output('F', $file_dest .'test.pdf');
		exit;

	}

	create_pdf($html, $filename, $password, $destination);
