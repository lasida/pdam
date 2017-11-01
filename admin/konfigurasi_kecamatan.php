<?php
  require_once 'header.php';
?>

<div class="row">
  <div class="col-md-6">
    <?php if (isset($_GET['success'])): ?>
      <?php if ($_GET['success'] == 1): ?>
        <div class="alert alert-success" role="alert">
          Kecamatan baru disimpan
        </div>
      <?php endif; ?>
      <?php if ($_GET['success'] == 0): ?>
        <div class="alert alert-danger" role="alert">
          Kecamatan dihapus
        </div>
      <?php endif; ?>
      <?php if ($_GET['success'] == 2): ?>
        <div class="alert alert-info" role="alert">
          Kecamatan diperbaharui
        </div>
      <?php endif; ?>
    <?php endif; ?>
    <form class="form" action="conf-kecamatan.php" method="post">
    <div class="panel panel-default">
      <div class="panel-body">
        <p class="lead">Tambah Kecamatan</p>
        <hr>
        <input type="text" name="kecamatan" placeholder="Kecamatan" class="form-control"><br>
        <input type="submit" value="Tambah Kecamatan" class="btn btn-default">
      </div>
    </div>
  </form>
  <?php if (isset($_GET['edit'])): ?>
    <form class="form" action="conf-kecamatan-upd.php" method="post">
      <div class="panel panel-info">
        <div class="panel-heading">Edit Kecamatan</div>
        <div class="panel-body">
          <?php
            $id = $_GET['edit'];
            require_once 'Class/DB.php';
            $db = new DB('kecamatan');
            $fetch = $db->getOne('id',$id);
            $edit = mysql_fetch_array($fetch);
          ?>
          <input type="hidden" name="id" value="<?php echo $edit['id']; ?>"><br>
          <input type="text" name="kecamatan" placeholder="Kecamatan" class="form-control" value="<?php echo $edit['nama_kecamatan']; ?>"><br>
          <input type="submit" value="Update Kecamatan" class="btn btn-info">
        </div>
      </div>
    </form>
<?php endif; ?>
  </div>
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-body">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama</th>
              <th>Operasi</th>
            </tr>
          </thead>
          <tbody>
        <?php
          require_once 'Class/DB.php';
          $db = new DB('kecamatan');
          $fetch = $db->getAll();
          $i = 1;
          while ($f = mysql_fetch_array($fetch)) {
        ?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo $f['nama_kecamatan'] ?></td>
              <td>
                <a href="conf-kecamatan-del.php?id=<?php echo $f['id'] ?>" class="btn btn-danger">Hapus</a>
                <a href="konfigurasi_kecamatan.php?edit=<?php echo $f['id'] ?>" class="btn btn-warning">Edit</a>
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
