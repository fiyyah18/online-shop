<?php
error_reporting(0);
include "../koneksi/koneksi.php";?>

<!--perintah untuk menampilkan data-->
<?php include 'header.php'; ?>
<?php include '../koneksi/koneksi.php'; ?>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY id_berita DESC");
?>

<?php
//memanggil fungsi delete
if(isset($_GET['aksi']) == 'delete') {
  $kode = $_GET['id_berita'];
  $delete = mysqli_query($koneksi, "DELETE FROM berita WHERE id_berita='$kode'");
  if ($delete) {
    echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus,</div>';
    header("location:pengguna.php");
  } else {
    echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus,</div>';
    header("location:pengguna.php");
  }
}
?>

  <div id="page-wrapper">
    <div class="col-lg-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Berita</h3>
        </div>
        <div class="panel-body">
                 <form class="form-inline" method="get">
                <div class="form-group">
        </div>
        </form><br>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="example" class="display nowrap">

            <!-- data yang akan ditampilkan -->
              <tr>
                <th>id_berita <i class="fa fa-sort"></i></th>
                <th>judul<i class="fa fa-sort"></i></th>
                <th>ID_Kategori<i class="fa fa-sort"></i></th>
                <th>isi_berita<i class="fa fa-sort"></i></th>
                <th>gambar<i class="fa fa-sort"></i></th>
                <th>username<i class="fa fa-sort"></i></th>
                <th>status<i class="fa fa-sort"></i></th>
                <th>tanggal_publish<i class="fa fa-sort"></i></th>
                <th>Aksi <i class="fa fa-sort"></i></th>
              </tr>
            <?php
           	while($row = mysqli_fetch_assoc($query)){
                   $kode = $row['id_berita'];
                   ?>
                  <tr>
                    <td><?php echo  $row["id_berita"]; ?></td>
                    <td><?php echo  $row["judul"]; ?></td>
                    <td><?php echo  $row["ID_Kategori"]; ?></td>
                    <td><?php echo $row["isi_berita"]; ?></td>
                    <td><?php echo  $row["gambar"]; ?></td>
                    <td><?php echo  $row["username"]; ?></td>
                    <td><?php echo  $row["status"]; ?></td>
                    <td><?php echo  $row["tanggal_publish"]; ?></td>
                    <td>
                      <a class="btn btn-sm btn-primary" href="berita.php?kode=<?= $kode; ?>"><i class="fa fa-edit"></i> Edit</a>
                      <a class="btn btn-sm btn-danger" href="berita.php?aksi=delete&kode=<?php echo $kode; ?>" onclick="return confirm('Anda yakin?')" class="btn btn-danger"><i class="fa fa-wrench"></i> Hapus</a></td>
                  </tr>
<?php
}
 ?>
              </tbody>
            </table>
          </div><br>
    
          <div class="text-right">
            <a href="inputberita.php" class="btn btn-sm btn-warning">Tambah Berita <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div><!-- /.row -->
  </div><!-- /#page-wrapper -->
            