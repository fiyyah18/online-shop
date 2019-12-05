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
$query = mysqli_query($koneksi, "SELECT * FROM iklan ORDER BY id DESC");
?>

<?php
//memanggil fungsi delete
if(isset($_GET['aksi']) == 'delete') {
  $kode = $_GET['id'];
  
  $sql = mysqli_query($koneksi,"select*from iklan where id = '$kode' ");
  $data = mysqli_fetch_assoc($sql);

  $delete = mysqli_query($koneksi, "DELETE FROM iklan WHERE id='$kode'");

  if ($delete) {
    echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus,</div>';
    header("location:iklan.php");
    echo $row[iklan];
    unlink("../img/iklan/".$data[iklan]."");
  } else {
    echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus,</div>';
    header("location:iklan.php");
  }
}
?>

  <div id="page-wrapper">
    <div class="col-lg-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Iklan</h3>
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
                <th>Iklan <i class="fa fa-sort"></i></th>
                <th>Aksi <i class="fa fa-sort"></i></th>
              </tr>
            <?php
            while($row = mysqli_fetch_assoc($query)){
                   $kode = $row['id'];
                   ?>
                  <tr>
                    <td><?php echo  $row["id"]; ?></td>
                    <td><?php echo  $row["judul_iklan"]; ?></td>
                    <td><?php echo  $row["iklan"]; ?></td>
                    <td>
                      <a class="btn btn-sm btn-primary" href="edit_iklan.php?id=<?= $kode; ?>"><i class="fa fa-edit"></i> Edit</a>
                      <a class="btn btn-sm btn-danger" href="iklan.php?aksi=delete&id=<?php echo $kode; ?>" onclick="return confirm('Anda yakin?')" class="btn btn-danger"><i class="fa fa-wrench"></i> Hapus</a></td>
                  </tr>
<?php
}
 ?>
              </tbody>
            </table>
          </div><br>
            <div class="text-right">
            <a href="inputiklan.php" class="btn btn-sm btn-warning">Tambah iklan <i class="fa fa-arrow-circle-right"></i></a>
          </div>

        </div>
      </div>
    </div>
  </div><!-- /.row -->
  </div><!-- /#page-wrapper -->