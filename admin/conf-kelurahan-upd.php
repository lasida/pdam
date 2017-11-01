<?php
include 'config.php';
$id = $_POST['id'];
$kecamatan = $_POST['kecamatan'];
$kelurahan = $_POST['kelurahan'];

mysql_query("update kelurahan set nama='$kelurahan', kecamatan_id='$kecamatan' where id='$id'")or die (mysql_error());
header("location:konfigurasi_kelurahan.php?success=2&filters=1&term=$kecamatan");

?>
