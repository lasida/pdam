<?php
include 'config.php';
$id=$_POST['id'];
$nama=$_POST['nama'];
$noTlp=$_POST['noTlp'];
$KTP=$_POST['KTP'];
$KK=$_POST['KK'];
$jnsKelamin=$_POST['jnsKelamin'];
$kecamatan=$_POST['kecamatan'];
$kelurahan=$_POST['kelurahan'];
$alamat=$_POST['alamat'];

mysql_query("update pelanggan set Nama='$nama', Telp='$noTlp', No_Ktp='$KTP', No_KK='$KK', Gender='$jnsKelamin', Kecamatan='$kecamatan', kelurahan_id='$kelurahan', Alamat='$alamat' where id='$id'")or die (mysql_error());
header("location:pelanggan.php");

?>
