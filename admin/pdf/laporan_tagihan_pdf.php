<?php

require_once 'dompdf/autoload.inc.php';

if (isset($_GET['stbyno'])) {
	include 'tagihan_stbyno.php';
}

if (isset($_GET['stbyrgmon'])) {
	include 'tagihan_stbyrgmon.php';
}

if (isset($_GET['stbyrgyr'])) {
	include 'tagihan_stbyrgyr.php';
}

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$html = ob_get_clean();

$dompdf->setPaper('A4', 'landscape');
$dompdf->loadHtml($html);
$dompdf->render();
ob_end_clean();
$dompdf->stream("codexworld",array("Attachment"=>0));
?>
