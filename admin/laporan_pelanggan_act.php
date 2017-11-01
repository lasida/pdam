<?php 
$view = $_POST['view'];
$kec = $_POST['kecamatan'];
$kel = $_POST['kelurahan'];

header("location:laporan_pelanggan.php?view=$view&kec=$kec&kel=$kel");