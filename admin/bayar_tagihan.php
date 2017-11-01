<?php
include 'config.php';
include 'Class/Setting.php';


$id = $_POST['id'];
$tanggal = strtotime($_POST['tanggal']);
$meteran = $_POST['meteran'];
$jumlah = $_POST['jumlah'];

$set = new Setting;
$harga = $set->getHarga();
$tarif = $meteran*$harga;
mysql_query("update tagihan set mKubik='$meteran', jumlah_bayar='$jumlah', tarif='$tarif', ts_bayar='$tanggal', status='1'  where id='$id'")or die (mysql_error());
header("location:det_tagihan.php?id=$id");

 ?>