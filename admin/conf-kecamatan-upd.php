<?php
include 'config.php';

$id = $_POST['id'];
$kecamatan = $_POST['kecamatan'];
mysql_query("update kecamatan set nama_kecamatan='$kecamatan' where id='$id'")or die (mysql_error());
header("location:konfigurasi_kecamatan.php?success=2");

?>
