<?php
include 'config.php';
$nama=$_POST['nama'];
$noPlgn=$_POST['noPlgn'];
$noTlp=$_POST['noTlp'];
$KTP=$_POST['KTP'];
$KK=$_POST['KK'];
$jnsKelamin=$_POST['jnsKelamin'];
$kecamatan=$_POST['kecamatan'];
$kelurahan=$_POST['kelurahan'];
$alamat=$_POST['alamat'];
$noPlgnGnrt = "TGR-".time();

mysql_query("insert into pelanggan values('','$noPlgnGnrt','$nama','$noTlp','$KTP','$KK','$jnsKelamin','$kecamatan', '$kelurahan','$alamat')");
header("location:pelanggan.php");

 ?>
