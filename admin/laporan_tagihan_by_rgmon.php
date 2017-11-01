<?php 
include 'config.php';
include 'Class/DB.php';

$startmon = $_POST['startmon'];
$endmon = $_POST['endmon'];
$yr = $_POST['yr'];

$pel = new DB('tagihan');

header("location:laporan_tagihan.php?stbyrgmon=1&startmon=$startmon&endmon=$endmon&yr=$yr");
?>