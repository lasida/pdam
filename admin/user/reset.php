<?php
require_once '../config.php';
$id = $_POST['id'];
$role = $_POST['role'];

var_dump($_POST);

if ($_POST['password'] != $_POST['confirm']) {
	header("location:../forgot.php?error=1&id=$id&role=$role");
} else if ($_POST['password'] == null or $_POST['confirm'] == null) {
	header("location:../forgot.php?error=2&id=$id&role=$role");
} else {
	$password = md5($_POST['password']);
	mysql_query("update admin set pass='$password' where id='$id'")or die (mysql_error());
	if ($_POST['role'] == 1) {
		header("location:../administrator.php?saved=3");
	} else {
		header("location:../forgot.php?saved=3");
	}
}


