<?php 
include 'config.php';
include 'Class/DB.php';
$nopel = $_POST['nopel'];

$pelanggan = $_POST['nopel'];

$pel = new DB('pelanggan');

$fetch = mysql_fetch_array($pel->getOne('No_Pel', $pelanggan));
$val = $fetch['id'];

header("location:laporan_tagihan.php?stbyno=1&no=$val");
?>