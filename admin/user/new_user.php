<?php
include '../config.php';
$uname = $_POST['uname'];

if ($_POST['password'] != $_POST['confirm']) {
	if ($_POST['role_id'] == 2) {
		header("location:../administrator.php?saved=0&staff=$uname");
	} else {
		header("location:../administrator.php?saved=0&admin=$uname");
	}
} else if ($_POST['password'] == null or $_POST['confirm'] == null) {
	if ($_POST['role_id'] == 2) {
		header("location:../administrator.php?saved=empty&&staff=$uname");
	} else {
		header("location:../administrator.php?saved=empty&&admin=$uname");
	}
} else {
$password = md5($_POST['password']);
if ($_POST['role_id'] == 1) {
	mysql_query("INSERT INTO `admin` (`id`, `uname`, `pass`, `foto`, `role_id`) VALUES (NULL, '$uname', '$password', 'logo.jpg', '1')") or die("Error");
	header("location:../administrator.php?saved=1");
}
if ($_POST['role_id'] == 2) {
	mysql_query("insert into admin values('','$uname', '$password', 'logo.jpg', '2')");
	header("location:../administrator.php?saved=2");
}
}