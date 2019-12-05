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
$query = mysqli_query($koneksi, "SELECT * FROM banner ORDER BY id_banner DESC");
?>

<?php
//memanggil fungsi delete
if(isset($_GET['aksi']) == 'delete') {
  $kode = $_GET['id_banner'];
  
  $sql = mysqli_query($koneksi,"select*from banner where id_banner = '$kode' ");
  $data = mysqli_fetch_assoc($sql);

  $delete = mysqli_query($koneksi, "DELETE FROM banner WHERE id_banner='$kode'");

  if ($delete) {
    echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus,</div>';
    header("location:banner.php");
    echo $row[foto_banner];
    unlink("../img/banner/".$data[foto_banner]."");
  } else {
    echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus,</div>';
    header("location:banner.php");
  }
}
?>

  <div id="page-wrapper">
    <div class="col-lg-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Banner</h3>
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
                <th>Id Banner<i class="fa fa-sort"></i></th>
                <th>Judul Banner<i class="fa fa-sort"></i></th>
                <th>Foto Banner <i class="fa fa-sort"></i></th>
                <th>Aksi <i class="fa fa-sort"></i></th>
              </tr>
            <?php
            while($row = mysqli_fetch_assoc($query)){
                   $kode = $row['id_banner'];
                   ?>
                  <tr>
                    <td><?php echo  $row["id_banner"]; ?></td>
                    <td><?php echo  $row["judul_banner"]; ?></td>
                    <td><?php echo  $row["foto_banner"]; ?></td>
                    <td>
                      <a class="btn btn-sm btn-primary" href="edit_banner.php?id_banner=<?= $kode; ?>"><i class="fa fa-edit"></i> Edit</a>
                      <a class="btn btn-sm btn-danger" href="banner.php?aksi=delete&id_banner=<?php echo $kode; ?>" onclick="return confirm('Anda yakin?')" class="btn btn-danger"><i class="fa fa-wrench"></i> Hapus</a></td>
                  </tr>
<?php
}
 ?>
              </tbody>
            </table>
          </div><br>
            <div class="text-right">
            <a href="inputbanner.php" class="btn btn-sm btn-warning">Tambah banner <i class="fa fa-arrow-circle-right"></i></a>
          </div>

        </div>
      </div>
    </div>
  </div><!-- /.row -->
  </div><!-- /#page-wrapper -->