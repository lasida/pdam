<?php
include 'config.php';
include 'Class/DB.php';

$startyr = $_POST['startyr'];
$endyr = $_POST['endyr'];

$pel = new DB('tagihan');

header("location:laporan_tagihan.php?stbyrgyr=1&startyr=$startyr&endyr=$endyr");
?>
