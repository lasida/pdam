<?php 
	include 'header.php'; 
	include 'Class/Setting.php'; 
	include 'Class/DB.php'; 
	include 'Modal/modal.php'; 

	$setting = new Setting;
	$GLOBALS['harga'] = $setting->getHarga();

	$pelanggan = new DB('pelanggan');
	$GLOBALS['jumlahPelanggan'] = $pelanggan->count();

	$tagihan = new DB('tagihan');
	$GLOBALS['jumlahTagihan'] = $tagihan->count();

?>

<div class="panel panel-default">
  <div class="panel-body">
    <p class="lead">Konfigurasi Page</p>
    <hr>
    <div class="row">
    	<div class="col-md-6">
		    <ul class="list-group">
		      <li class="list-group-item">
		    		<a class="label label-success pull-right" data-toggle="modal" data-target="#gantiHarga">Ubah</a> <br>
		        <span class="badge"><?php echo "Rp.".number_format($GLOBALS['harga']).",-" ?></span>
				        Harga perkubik
		      </li>
		    	<li class="list-group-item">
		    		<a class="label label-success pull-right" data-toggle="modal" data-target="#tambahPelanggan">Tambah</a> <br>
		        <span class="badge"><?php echo $GLOBALS['jumlahPelanggan']." pelanggan"?></span>
		        Jumlah Pelanggan
		      </li>
		      <li class="list-group-item">
		    		<a class="label label-success pull-right" data-toggle="modal" data-target="#tambahTagihan">Tambah</a> <br>
		        <span class="badge"><?php echo $GLOBALS['jumlahTagihan']." tagihan"?></span>
		        Jumlah Tagihan
		      </li>
		    </ul>
	    </div>
    </div>
  </div>
</div>
