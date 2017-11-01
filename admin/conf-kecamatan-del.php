<?php
include 'config.php';
$id=$_GET['id'];
mysql_query("delete from kecamatan where id='$id'");
header("location:konfigurasi_kecamatan.php?success=0");

?>
