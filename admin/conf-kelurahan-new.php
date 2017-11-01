<?php
include 'config.php';

$kecamatan = $_POST['kecamatan'];
$record = $_POST['record'];

mysql_query("insert into kelurahan values('','$record', '$kecamatan')");
header("location:konfigurasi_kelurahan.php?success=1&filters=1&term=$kecamatan");

 ?>
