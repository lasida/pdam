<?php
include 'header.php';
include 'Class/DB.php';

$tag = new DB('tagihan');
$tagq = mysql_fetch_array($tag->getOne('id', $_GET['id']));

$pel = new DB('pelanggan');
$tagp = mysql_fetch_array($pel->getOne('id', $tagq['id_pelanggan']));
$GLOBALS['kode'] = $tagp['No_Pel'];

?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Tagihan dengan Nomor Pelanggan <?php echo $GLOBALS['kode']; ?></h3>
<a class="btn" href="tagihan.php?bayar=0"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$id_brg=mysql_real_escape_string($_GET['id']);

$det=mysql_query("select * from tagihan where id='$id_brg'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
	?>
	<form action="bayar_tagihan.php" method="post">
		<table class="table">
			<tr>
				<td></td>
				<td><input type="hidden" name="id" value="<?php echo $d['id'] ?>"></td>
			</tr>

			<tr>
				<td>Tanggal Bayar</td>
				<td><input name="tanggal" type="text" class="form-control" id="tgl" autocomplete="off" ></td>
			</tr>
			<tr>
				<td>Meteran</td>
				<td><input type="text" class="form-control" name="meteran" ></td>
			</tr>
			<tr>
				<td>Jumlah Bayar</td>
				<td><input type="text" class="form-control" name="jumlah" ></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" class="btn btn-info" value="Bayar Tagihan"></td>
			</tr>
		</table>
	</form>
	<?php
}
?>
 <script type="text/javascript">
        $(document).ready(function(){

            $('#tgl').datepicker({dateFormat: 'yy/mm/dd'});

        });
    </script>
<?php
include 'footer.php';

?>
