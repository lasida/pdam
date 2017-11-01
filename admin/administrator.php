<?php 
	require_once 'header.php';
?>
<div class="row">
	<?php if (isset($_GET['saved'])): ?>
		<div class="col-md-12">
		<?php if ($_GET['saved'] == 1): ?>
			<div class="alert alert-success" role="alert">
			  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			  Berhasil menambahkan <strong>Administrator</strong> baru
			</div>
		<?php endif ?>
		<?php if ($_GET['saved'] == 2): ?>
			<div class="alert alert-success" role="alert">
			  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			  Berhasil menambahkan <strong>Staff</strong> baru
			</div>
		<?php endif ?>
		<?php if ($_GET['saved'] == 3): ?>
			<div class="alert alert-success" role="alert">
			  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			  Berhasil merubah <strong>password</strong>
			</div>
		<?php endif ?>
		<?php if ($_GET['saved'] == 4): ?>
			<div class="alert alert-danger" role="alert">
			  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			  Password tidak boleh kosong
			</div>
		<?php endif ?>
		<?php if ($_GET['saved'] == 0): ?>
			<div class="alert alert-danger" role="alert">
			  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			  Kecocokan Password salah
			</div>
		<?php endif ?>
		</div>
	<?php endif ?>
	<?php if (isset($_GET['deleted'])): ?>
		<div class="col-md-12">
		<?php if ($_GET['deleted'] == 1): ?>
			<div class="alert alert-danger" role="alert">
			  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			  Berhasil menghapus <strong>Administrator</strong>
			</div>
		<?php endif ?>
		<?php if ($_GET['deleted'] == 2): ?>
			<div class="alert alert-danger" role="alert">
			  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			  Berhasil menghapus <strong>Staff</strong>
			</div>
		<?php endif ?>
		</div>
	<?php endif ?>
	<div class="col-md-6">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<p>Administrator Panel</p>
					</div>
				  <div class="panel-body">
				    <form action="./user/new_user.php" method="post">
				    	<p class="lead">Tambah Administator</p>
				    	<input type="hidden" class="form-control" placeholder="Username" name="role_id" value="1">
				    	<input type="text" class="form-control" placeholder="Username" name="uname" value="<?php if (isset($_GET['admin'])) {
				    		echo $_GET['admin'];
				    	} ?>"><br>
				    	<input type="password" class="form-control" placeholder="Password" name="password"><br>
				    	<input type="password" class="form-control" placeholder="Confirm Password" name="confirm"><br>
				    	<input type="submit" class="btn btn-block btn-primary" value="Tambah Administator">
				    </form>
				  </div>
				  <div class="panel-footer">
				    <p class="lead">Tabel Administrator</p>
				    <table class="table table-hover">
				    	<thead>
				    		<tr>
				    			<th>No</th>
				    			<th>Username</th>
				    			<th>Opsi</th>
				    		</tr>
				    	</thead>
				    	<tbody>
					    	<?php 
					    		$sql = mysql_query("select * from admin where role_id='1'");
					    		$no = 1;
					    		while ($val = $fet = mysql_fetch_array($sql)) { ?>
					    	<tr>
					    		<td><?php echo $no++ ?></td>
					    		<td><?php echo $val['uname'] ?></td>
					    		<td>
					    			<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='user/delete.php?id=<?php echo $val['id']."&role=admin"; ?>' }" class="btn btn-danger">Hapus</a>
					    			<a href="<?php echo "forgot.php?id=".$val['id']."&role=1" ?>" class="btn btn-warning">Ganti Password</a>
					    		</td>
					    	</tr>
								<?php
					    		}
					    	?>
				    	</tbody>
				    </table>
				  </div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-success">
					<div class="panel-heading">
						<p>Staff Panel</p>
					</div>
				  <div class="panel-body">
				    <form action="./user/new_user.php" method="post">
				    	<p class="lead">Tambah Staff</p>
				    	<input type="hidden" class="form-control" placeholder="Username" name="role_id" value="2">
				    	<input type="text" class="form-control" placeholder="Username" name="uname" value="<?php if (isset($_GET['staff'])) {
				    		echo $_GET['staff'];
				    	} ?>"><br>
				    	<input type="password" class="form-control" placeholder="Password" name="password"><br>
				    	<input type="password" class="form-control" placeholder="Confirm Password" name="confirm"><br>
				    	<input type="submit" class="btn btn-block btn-success" value="Tambah Staff">
				    </form>
				  </div>
				  <div class="panel-footer">
				    <p class="lead">Tabel Staff</p>
				    <table class="table table-hover">
				    	<thead>
				    		<tr>
				    			<th>No</th>
				    			<th>Username</th>
				    			<th>Opsi</th>
				    		</tr>
				    	</thead>`
				    	<tbody>
					    	<?php 
					    		$sql = mysql_query("select * from admin where role_id='2'");
					    		$no = 1;
					    		while ($val = $fet = mysql_fetch_array($sql)) { ?>
						    <tr>
					    		<td><?php echo $no++ ?></td>
					    		<td><?php echo $val['uname'] ?></td>
					    		<td>
					    			<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='user/delete.php?id=<?php echo $val['id']."&role=staff"; ?>' }" class="btn btn-danger">Hapus</a>
					    			<a href="<?php echo "forgot.php?id=".$val['id']."&role=1" ?>" class="btn btn-warning">Ganti Password</a>
					    		</td>
					    	</tr>
								<?php
					    		}
					    	?>
				    	</tbody>
				    </table>
				  </div>
				</div>
			</div>
		</div>
	</div>
</div>`