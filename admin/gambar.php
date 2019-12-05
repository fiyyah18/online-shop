<?php
error_reporting(0);
include "../koneksi/koneksi.php";

//Perintah agar tidak dapat diinjeksi
session_start();
$level = $_SESSION['level'];
if ($level == "") {
  ?>
  <script language="JavaScript">
    alert('Anda Tidak Dapat Mengakses Halaman Ini, Silahkan Login dahulu');
    document.location = ('index.php');
  </script>
<?php } ?>

<!--perintah untuk menampilkan data-->
<?php include 'header.php'; ?>
<?php include '../koneksi/koneksi.php'; ?>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM galeri ORDER BY id_galeri DESC");
?>

<?php
//memanggil fungsi delete
if(isset($_GET['aksi']) == 'delete') {
  $id_galeri = $_GET['id_galeri'];
  
  $sql = mysqli_query($koneksi,"select*from galeri where id_galeri = '$id_galeri' ");
  $data = mysqli_fetch_assoc($sql);

  $delete = mysqli_query($koneksi, "DELETE FROM galeri WHERE id_galeri='$id_galeri'");

  if ($delete) {
    echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus,</div>';
    header("location:gambar.php");
    echo $row[galeri];
    unlink("../img/galeri/".$data[galeri]."");
  } else {
    echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus,</div>';
    header("location:gambar.php");
  }
}
?>

  <div id="page-wrapper">
    <div class="col-lg-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Galeri</h3>
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
                <th>ID <i class="fa fa-sort"></i></th>
                <th>Judul <i class="fa fa-sort"></i></th>
                <th>Galeri <i class="fa fa-sort"></i></th>
                <th>Aksi <i class="fa fa-sort"></i></th>
              </tr>
            <?php
            while($row = mysqli_fetch_assoc($query)){
                   $id_galeri = $row['id_galeri'];
                   ?>
                  <tr>
                    <td><?php echo  $row["id_galeri"]; ?></td>
                    <td><?php echo  $row["judul"]; ?></td>
                    <td><?php echo  $row["galeri"]; ?></td>
                    <td>
                      <a class="btn btn-sm btn-primary" href="edit_gambar.php?id_galeri=<?= $id_galeri; ?>"><i class="fa fa-edit"></i> Edit</a>
                      <a class="btn btn-sm btn-danger" href="gambar.php?aksi=delete&id_galeri=<?php echo $id_galeri; ?>" onclick="return confirm('Anda yakin?')" class="btn btn-danger"><i class="fa fa-wrench"></i> Hapus</a></td>
                  </tr>
<?php
}
 ?>
              </tbody>
            </table>
          </div><br>
            <div class="text-right">
            <a href="inputgambar.php" class="btn btn-sm btn-warning">Tambah galeri <i class="fa fa-arrow-circle-right"></i></a>
          </div>

        </div>
      </div>
    </div>
  </div><!-- /.row -->
  </div><!-- /#page-wrapper -->