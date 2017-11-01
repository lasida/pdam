<?php
include 'config.php';
include 'Class/DB.php';

$pelanggan = $_POST['pelanggan'];

$pel = new DB('pelanggan');

$fetch = mysql_fetch_array($pel->getOne('No_Pel', $pelanggan));
$val = $fetch['id'];
$val2 = $fetch['Kecamatan'];
$ts = time();
mysql_query("insert into tagihan values('','$val', $val2, ' ', ' ', ' ', ' ', '$ts', '0')");
header("location:tagihan.php?bayar=0");

 ?>