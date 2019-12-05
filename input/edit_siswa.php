<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Edit Siswa</title>
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>

<body>
  <?php
  include "header.php";
  include "koneksi/koneksi.php"
  ?>
  <br>
  <?php
  $kode = $_GET['nis'];
  $sql = mysqli_query($koneksi, "select * from siswa where nis ='$kode'") or die(mysqli_error($koneksi));
  while ($data = mysqli_fetch_array($sql)) {
    ?>
    <div class="container">
      <div class="panel panel-primary" style="width:750px;margin:0px auto">
        <div class="panel-heading">Form Edit Siswa</div>
        <div class="panel-body">
          <form method="post" enctype="multipart/form-data" action=act_edit.php?nis=<?= $kode; ?>" data-toggle="validator" role="form">

            <div class="form-group">
              <label class="control-label" for="inputnis">NIS</label>
              <input class="form-control" name="nis" id="inputnis" placeholder="Nis" type="text" value="<?= $data['nis']; ?>" disabled />
              <div class="help-block with-errors"></div>
            </div>

            <div class="form-group">
              <label class="control-label" for="inputnama">Nama</label>
              <input class="form-control" data-error="Please enter nama field." id="inputnama" placeholder="Nama" name="nama" type="text" value="<?= $data['nama']; ?>" required />
              <div class="help-block with-errors"></div>
            </div>

            <div class="form-group">
              <label class="control-label" for="inputlahir">Tempat Lahir</label>
              <input class="form-control" name="tempat" value="<?= $data['tempat']; ?>" id="inputlahir" placeholder="Tempat Lahir" type="text" required />
              <input class="form-control" value="<?= $data['tanggal']; ?>" id="inputtanggal" placeholder="tanggal" type="date" name="tanggal" required />
              <div class="help-block with-errors"></div>
            </div>

            <div class="form-group">
              <label for="jenis">Jenis Kelamin</label></td>
              <select name="jenis" class="form-control">
                <?php
                $nama = mysqli_query($koneksi, "SELECT * FROM siswa");
                while ($row = mysqli_fetch_assoc($nama)) {
                  if ($row['jenis'] == $d['jenis']) {
                    ?>
                    <option value="<?php echo $row['jenis'] ?>" selected="selected"><?php echo $row['jenis'] ?> </option>
                  <?php } else {
                    ?>
                    <option value="<?php echo $row['jenis'] ?>"><?php echo $row['jenis'] ?> </option>
                  <?php }
                } ?>
              </select>
              <div class="form-group">
                <label for="inputtelpon" class="control-label">Telpon</label>
                <input type="tel" name="telpon" class="form-control" value="<?= $data['telpon']; ?>" id="inputtelpon" placeholder="Telpon" required>
                <div class="help-block with-errors"></div>
              </div>

              <div class="form-group">
                <label class="control-label" for="inputAlamat">Alamat</label>
                <textarea class="form-control" data-error="Please enter Alamat field." id="inputAlamat" placeholder="Alamat" name="alamat" required=""><?= $data['alamat']; ?></textarea>
                <div class="help-block with-errors"></div>
              </div>


              <div class="form-group">
                <input type="submit" value="Simpan Data" name="edit" class="btn btn-sm btn-primary" />

                <button class="btn btn-warning" type="Reset">
                  Reset
                </button>
              </div>
              <div class="text-left">
                <a href="dashboard.php" data-toggle="tooltip" class="tip-bottom" data-original-title="Tooltip Dibawah">View All Data Siswa <i class="fa fa-arrow-circle-left"></i></a>
              </div>
          </form>
        </div>
      </div>
    </div>
  </body>
<?php } ?>

</html>