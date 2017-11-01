<?php
include 'config.php';
$id=$_GET['id'];
mysql_query("delete from pelanggan where id='$id'");
header("location:pelanggan.php");

?>
