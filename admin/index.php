<?php
include 'header.php';
?>

<?php
$a = mysql_query("select * from barang_laku");
?>

<div class="col-md-10">
	<h3>Selamat datang</h3>
    <h3>DI PDAM TIRTA BENTENG KOTA TANGERANG</h3>
    <h3>www.pdamtirtabenteng.com</h3>
</div>
<!-- kalender -->
<div class="pull-right">
	<div id="kalender"></div>
</div>

<?php
include 'footer.php';

?>
