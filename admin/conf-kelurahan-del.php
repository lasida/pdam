<?php
include 'config.php';
$id=$_GET['id'];
$filters=$_GET['filters'];
mysql_query("delete from kelurahan where id='$id'");
header("location:konfigurasi_kelurahan.php?success=0&filters=1&term=$filters");

?>
