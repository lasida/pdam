<?php
  require_once 'header.php';
?>

<div class="row">
  <div class="col-md-4">
    <?php if (isset($_GET['success'])): ?>
      <?php if ($_GET['success'] == 1): ?>
        <div class="alert alert-success" role="alert">
          Kelurahan baru disimpan
        </div>
      <?php endif; ?>
      <?php if ($_GET['success'] == 0): ?>
        <div class="alert alert-danger" role="alert">
          Kelurahan dihapus
        </div>
      <?php endif; ?>
      <?php if ($_GET['success'] == 2): ?>
        <div class="alert alert-info" role="alert">
          Kelurahan diperbaharui
        </div>
      <?php endif; ?>
    <?php endif; ?>
    <form class="form" action="conf-kelurahan-new.php" method="post">
    <div class="panel panel-default">
      <div class="panel-body">
        <p class="lead">Tambah Kelurahan</p>
        <hr>
        <select name="kecamatan" class="form-control" style="margin-bottom:20px">
          <option> -- kecamatan -- </option>
          <?php
            require_once 'Class/DB.php';
            $db = new DB('kecamatan');
            $kecs = $db->getAll();
            while ($q = mysql_fetch_array($kecs)) { ?>
            <option value="<?php echo $q['id'] ?>"><?php echo $q['nama_kecamatan']; ?></option>
          <?php
            }
          ?>
        </select>
        <input type="text" name="record" placeholder="Kelurahan" class="form-control"><br>
        <input type="submit" value="Tambah Kecamatan" class="btn btn-default">
      </div>
    </div>
  </form>
  <?php if (isset($_GET['edit'])): ?>
    <form class="form" action="conf-kelurahan-upd.php" method="post">
      <div class="panel panel-info">
        <div class="panel-heading">Edit Kelurahan</div>
        <div class="panel-body">
          <select name="kecamatan" class="form-control" style="margin-bottom:20px">
            <?php
              require_once 'Class/DB.php';
              $db = new DB('kecamatan');
              $kecs = $db->getOne('id', $_GET['kec']);
              $f1 = mysql_fetch_array($kecs);
            ?>
            <option value="<?php echo $_GET['kec'] ?>"><?php echo $f1['nama_kecamatan']." -- tidak dirubah" ?></option>
            <?php
              require_once 'Class/DB.php';
              $db = new DB('kecamatan');
              $kecs = $db->getAll();
              while ($q = mysql_fetch_array($kecs)) { ?>
              <option value="<?php echo $q['id'] ?>"><?php echo $q['nama_kecamatan']; ?></option>
            <?php
              }
            ?>
          </select>
          <?php
            $id = $_GET['edit'];
            require_once 'Class/DB.php';
            $db = new DB('kelurahan');
            $fetch = $db->getOne('id',$id);
            $edit = mysql_fetch_array($fetch);
          ?>
          <input type="hidden" name="id" value="<?php echo $edit['id']; ?>"><br>
          <input type="text" name="kelurahan" placeholder="Kelurahan" class="form-control" value="<?php echo $edit['nama']; ?>"><br>
          <input type="submit" value="Update Kecamatan" class="btn btn-info">
        </div>
      </div>
    </form>
<?php endif; ?>
  </div>
  <div class="col-md-8">
    <div class="panel panel-default">
      <div class="panel-body">
        <form action="conf-kelurahan-fil.php" method="post">
          <span>Filter :</span>
          <select name="filters">
            <option> -- </option>
            <?php
              require_once 'Class/DB.php';
              $db = new DB('kecamatan');
              $kecs = $db->getAll();
              while ($q = mysql_fetch_array($kecs)) { ?>
              <option value="<?php echo $q['id'] ?>"><?php echo $q['nama_kecamatan']; ?></option>
            <?php
              }
            ?>
            <input type="submit" value="Refresh" style="margin-left:20px">
          </select>
        </form>
        <?php if (isset($_GET['filters'])): ?>

        <table class="table table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama</th>
              <th>Kecamatan</th>
              <th>Operasi</th>
            </tr>
          </thead>
          <tbody>
        <?php
          require_once 'Class/DB.php';
          $db = new DB('kelurahan');
          $fetch = $db->getOne('kecamatan_id', $_GET['term']);
          $i = 1;
          while ($f = mysql_fetch_array($fetch)) {
        ?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo $f['nama'] ?></td>
              <td>
                <?php
                  require_once 'Class/DB.php';
                  $db = new DB('kecamatan');
                  $kecId=$f['kecamatan_id'];
                  $take = $db->getOne('id',$kecId);
                  $val = mysql_fetch_array($take);
                  echo $val['nama_kecamatan'];
                ?>
              </td>
              <td>
                <a href="conf-kelurahan-del.php?<?php echo "id=".$f['id']."&filters=".$f['kecamatan_id'] ?>" class="btn btn-danger">Hapus</a>
                <a href="konfigurasi_kelurahan.php?<?php echo "edit=".$f['id']."&kel=".$f['id']."&kec=".$f['kecamatan_id']."&filters=1&term=".$f['kecamatan_id'] ?>" class="btn btn-warning">Edit</a>
              </td>
            </tr>
        <?php
      }
      ?>
          </tbody>
        </table>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
