<?php
error_reporting(0);
include "../koneksi/koneksi.php";
?>

<!--perintah untuk menampilkan data-->
<?php include 'header.php'; ?>
<?php include '../koneksi/koneksi.php'; ?>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM profile ORDER BY id_profile DESC");
?>


  <div id="page-wrapper">
    <div class="col-lg-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Profile</h3>
        </div>
        <div class="panel-body">
                 <form class="form-inline" method="get">
                <div class="form-group">
        </div>
        </form><br>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="example" class="display nowrap">

          <div class="form-group">
            <label class="control-label" for="inputid_profile">ID</label>
            <input class="form-control" name="id_profile" data-error="Please enter id_profile field." id="inputid_profile" placeholder="Id_profile" type="text" required value="<?= $data['id_profile'] ?>" />
            <div class="help-block with-errors"></div>
          </div>

          <div class="form-group">
            <label class="control-label" for="inputnama_lengkap">Nama</label>
            <input class="form-control" name="nama_lengkap" data-error="Please enter nama_lengkap field." id="inputnama_lengkap" placeholder="nama_lengkap" type="text" required value="<?= $data['nama_lengkap']?>"/>
            <div class="help-block with-errors"></div>
          </div>

          <div class="form-group">
            <label class="control-label" for="inputtempat_lahir">Tempat Lahir</label>
            <input class="form-control" name="tempat_lahir" data-error="Please enter tempat_lahir field." id="inpututempat_lahir" placeholder="tempat_lahir" type="text" required value="<?= $data['tempat_lahir'] ?>"/>
            <div class="help-block with-errors"></div>
          </div>

          <div class="form-group">
            <label class="control-label" for="inputtanggal_lahir">Tanggal Lahir</label>
            <input class="form-control" name="tanggal_lahir" data-error="Please enter tanggal_lahir field." id="inputtanggal_lahir" placeholder="tanggal_lahir" type="text" required value="<?= $data['tanggal_lahir'] ?>"/>
            <div class="help-block with-errors"></div>
          </div>

          <div class="form-group">
            <label class="control-label" for="inputagama">Agama</label>
            <input class="form-control" name="agama" data-error="Please enter agama field." id="inputagama" placeholder="agama" type="text" required value="<?= $data['agama'] ?>"/>
            <div class="help-block with-errors"></div>
          </div>

          <div class="form-group">
            <label class="control-label" for="inputnalamat">Alamat</label>
            <input class="form-control" name="alamat" data-error="Please enter alamat field." id="inputalamat" placeholder="alamat" type="text" required value="<?= $data['alamat'] ?>"/>
            <div class="help-block with-errors"></div>
          </div>

          </div>
        </form>
        </div>
      </div>
    </div>
  </div><!-- /.row -->
  </div><!-- /#page-wrapper -->
