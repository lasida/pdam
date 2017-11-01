<?php
include 'config.php';

$kecamatan=$_POST['kecamatan'];
mysql_query("insert into kecamatan values('','$kecamatan')");
header("location:konfigurasi_kecamatan.php?success=1");

 ?>
