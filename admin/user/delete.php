<?php
include '../config.php';

$id = $_GET['id'];
$role = $_GET['role'];
mysql_query("delete from admin where id='$id'");
if ($role == 'staff') {
	header("location:../administrator.php?deleted=2");
} else {
	header("location:../administrator.php?deleted=1");
}