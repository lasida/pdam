<?php
include 'config.php';
$filters=$_POST['filters'];
header("location:konfigurasi_kelurahan.php?filters=1&term=$filters");
?>
