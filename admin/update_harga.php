<?php
include 'config.php';
include 'Class/Setting.php';
$harga=$_POST['harga'];

$setting = new Setting;
$setting->updateHarga($harga);
header("location:konfigurasi.php");

?>
