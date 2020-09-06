<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(dirname(__FILE__) . '/dompdf/autoload.inc.php');
require_once("dompdf/src/Dompdf.php");
class Pdf
{
    function createPDF($html, $filename='', $download=TRUE, $paper='letter', $orientation='portrait'){
		
        $dompdf = new Dompdf\DOMPDF();
        $dompdf->load_html($html);
        $dompdf->set_paper($paper, $orientation);
        $dompdf->render();
        if($download)
            $dompdf->stream($filename.'.pdf', array('Attachment' => 1));
        else
            $dompdf->stream($filename.'.pdf', array('Attachment' => 0));
	}
	public function createPdf2($html, $filename='', $download=TRUE, $paper='letter', $orientation='portrait'){
		$dompdf = new Dompdf\DOMPDF();
        $dompdf->load_html($html);
        $dompdf->set_paper($paper, $orientation);
		$dompdf->render();
		$output = $dompdf->output();
		file_put_contents("public/pdf/".$filename.".pdf", $output);
		
        // if($download)
        //     $dompdf->stream($filename.'.pdf', array('Attachment' => 1));
        // else
        //     $dompdf->stream($filename.'.pdf', array('Attachment' => 0));
	}
}
?>
