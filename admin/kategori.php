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
$query = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY ID_Kategori DESC");
?>

<?php
//memanggil fungsi delete
if(isset($_GET['aksi']) == 'delete') {
  $kode = $_GET['kode'];
  $delete = mysqli_query($koneksi, "DELETE FROM kategori WHERE ID_Kategori='$kode'");
  if ($delete) {
    echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus,</div>';
    header("location:kategori.php");
  } else {
    echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus,</div>';
    header("location:kategori.php");
  }
}
?>

  <div id="page-wrapper">
    <div class="col-lg-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Kategori</h3>
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
                <th>Kode <i class="fa fa-sort"></i></th>
                <th>Nama Kategori <i class="fa fa-sort"></i></th>
                <th>Aksi <i class="fa fa-sort"></i></th>
              </tr>
              <?php
            while($row = mysqli_fetch_assoc($query)){
                   $kode = $row['ID_Kategori'];
                   ?>
                  <tr>
                    <td><?php echo  $row["ID_Kategori"]; ?></td>
                    <td><?php echo  $row["Nama_Kategori"]; ?></td>
                    <td>
                      <a class="btn btn-sm btn-primary" href="edit_kategori.php?ID_Kategori=<?= $kode; ?>"><i class="fa fa-edit"></i> Edit</a>
                      <a class="btn btn-sm btn-danger" href="kategori.php?aksi=delete&kode=<?php echo $kode; ?>" onclick="return confirm('Anda yakin?')" class="btn btn-danger"><i class="fa fa-wrench"></i> Hapus</a></td>
                  </tr>
<?php
}
 ?>
              </tbody>
            </table>
          </div><br>
    
          <div class="text-right">
            <a href="inputkategori.php" class="btn btn-sm btn-warning">Tambah Kategori <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div><!-- /.row -->
  </div><!-- /#page-wrapper -->