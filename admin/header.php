<!DOCTYPE html>
<html>
<head>
	<?php
	session_start();
	include 'cek.php';
	include 'config.php';
	?>
	<title>PELAYANAN PELANGGAN PDAM</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/js/jquery-ui/jquery-ui.css">
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/admin.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="../assets/js/jquery-ui/jquery-ui.js"></script>
</head>
<body>
	<div class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="/" class="navbar-brand">PELAYANAN PELANGGAN PDAM TIRTA BENTENG KOTA TANGERANG</a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
<!-- 					<li><a id="pesan_sedia" href="#" data-toggle="modal" data-target="#modalpesan"><span class='glyphicon glyphicon-comment'></span>  Pesan</a></li> -->
					<li><a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">Hy , <?php echo $_SESSION['uname']  ?>&nbsp&nbsp<span class="glyphicon glyphicon-user"></span></a></li>
				</ul>
			</div>
		</div>
	</div>

	<!-- modal input -->


	<div class="col-md-2">
		<div class="row">
			<?php
			$use=$_SESSION['uname'];
			$fo=mysql_query("select foto from admin where uname='$use'");
			while($f=mysql_fetch_array($fo)){
				?>

				<div class="col-xs-6 col-md-12">
					<a class="thumbnail">
						<img class="img-responsive" src="foto/<?php echo $f['foto']; ?>">
					</a>
				</div>
				<?php
			}
			?>
		</div>

		<div class="row"></div>
		<ul class="nav nav-pills nav-stacked">
			<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>  Dashboard</a></li>
			<li><a href="pelanggan.php"><span class="glyphicon glyphicon-briefcase"></span>  Pelanggan</a></li>
			<li><a href="tagihan.php?bayar=0"><span class="glyphicon glyphicon-briefcase"></span>  Tagihan & Pembayaran</a></li>
			<li><a href="#"><span class="glyphicon glyphicon-briefcase"></span>  Laporan</a>
				<ul class="submenu">
					<li><a href="laporan_pelanggan.php">Pelanggan</a></li>
					<li><a href="laporan_tagihan.php">Tagihan</a></li>
				</ul>
			</li>
			<?php if ($_SESSION['role'] == 1): ?>
				<li><a href="administrator.php"><span class="glyphicon glyphicon-lock"></span> Administrator</a></li>
			<?php endif ?>
			<li><a href="#"><span class="glyphicon glyphicon-lock"></span> Master & Konfigurasi
				<ul class="submenu">
					<li><a href="konfigurasi_kecamatan.php">Kecamatan</a></li>
					<li><a href="konfigurasi_kelurahan.php">Kelurahan</a></li>
					<?php if ($_SESSION['role'] == 1): ?>
					<li><a href="konfigurasi.php">Konfigurasi</a></li>
					<?php endif ?>
				</ul></a>
			</li>
<!-- 			<li><a href="<?php echo "forgot.php?id=".$_SESSION['id']."&role=".$_SESSION['role'] ?>"><span class="glyphicon glyphicon-lock"></span> Forgot Password</a></li> -->
			<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>  Logout</a></li>
		</ul>
	</div>
	<div class="col-md-10">
