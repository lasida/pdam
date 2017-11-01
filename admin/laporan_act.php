<?php 
$view = $_POST['view'];
$kec = $_POST['kecamatan'];
$bayar = $_POST['bayar'];

header("location:laporan.php?view=$view&kec=$kec&bayar=$bayar");