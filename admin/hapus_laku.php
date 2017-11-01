<?php
include 'config.php';

$id=$_GET['id'];
$bayar=$_GET['bayar'];;
var_dump($bayar);
mysql_query("delete from tagihan where id='$id'");
header("location:tagihan.php?bayar=$bayar");
 ?>
