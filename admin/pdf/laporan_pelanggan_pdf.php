<?php 
require_once 'dompdf/autoload.inc.php';
include 'pelanggan.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$html = ob_get_clean();

$dompdf->setPaper('A4', 'landscape');
$dompdf->loadHtml($html);
$dompdf->render();
ob_end_clean();
$dompdf->stream("codexworld",array("Attachment"=>0));
?>