<?php  
	require_once 'header.php';
?>
<div class="row">
	<?php if (isset($_GET['error'])): ?>
		<?php if ($_GET['error'] == 1): ?>
			<div class="col-md-10 col-md-offset-1">
				<div class="alert alert-danger" role="alert">
				  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				  Kecocokan Password salah
				</div>
			</div>
		<?php endif ?>
		<?php if ($_GET['error'] == 2): ?>
			<div class="col-md-10 col-md-offset-1">
				<div class="alert alert-danger" role="alert">
				  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				  Password tidak boleh kosong
				</div>
			</div>
		<?php endif ?>
	<?php endif ?>
	<?php if (isset($_GET['saved'])): ?>
		<div class="col-md-10 col-md-offset-1">
			<div class="alert alert-success" role="alert">
			  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			  Berhasil merubah <strong>password</strong>
			</div>
		</div>
		<?php endif ?>
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">Forgot Password</div>
			<div class="panel-body">
				<form action="user/reset.php" class="form" method="post">
					<input type="hidden" value="<?php echo $_GET['id'] ?>" name="id">
					<input type="hidden" value="<?php echo $_GET['role'] ?>" name="role">
					<input type="password" class="form-control" name="password" placeholder="Password"><br>
					<input type="password" class="form-control" name="confirm" placeholder="Confirm Password"><br>
					<input type="submit" value="Update Password" class="btn btn-default">
				</form>
			</div>
		</div>
	</div>
</div>