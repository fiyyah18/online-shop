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
$query = mysqli_query($koneksi, "SELECT * FROM barang ORDER BY id_barang DESC");
?>

<?php
//memanggil fungsi delete
if(isset($_GET['aksi']) == 'delete') {
  $id_barang = $_GET['id_barang'];
  
  $sql = mysqli_query($koneksi,"select*from barang where id_barang = '$id_barang' ");
  $data = mysqli_fetch_assoc($sql);

  $delete = mysqli_query($koneksi, "DELETE FROM barang WHERE id_barang='$id_barang'");

  if ($delete) {
    echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus,</div>';
    header("location:barang.php");
    echo $row[foto];
    unlink("../img/barang/".$data[foto]."");
  } else {
    echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus,</div>';
    header("location:barang.php");
  }
}
?>

  <div id="page-wrapper">
    <div class="col-lg-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Barang</h3>
         
          </div>
        </div>
        <div class="panel-body">
               <form class="form-inline" method="GET">
          <div class="form-group">
            <?php $jml = (isset($_GET['jml']) ? strtolower($_GET['jml']) : NULL); ?>
            Cari
            <input name="nama_barang" class="form-control">
            <input name="cari" class="form-control" type="submit" value="cari" onchange="form.submit()">
            <?php $cari = (isset($_GET['nama_barang']) ? strtolower($_GET['nama_barang']) : NULL); ?>
            </div>
            </form>
        </div>
        <br>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="example" class="display nowrap">

            <!-- data yang akan ditampilkan -->
              <tr>
                <th>ID <i class="fa fa-sort"></i></th>
                <th>Nama Barang<i class="fa fa-sort"></i></th>
                <th>Jumlah Barang<i class="fa fa-sort"></i></th>
                <th>Harga Barang<i class="fa fa-sort"></i></th>
                <th>Foto <i class="fa fa-sort"></i></th>
                <th>Aksi <i class="fa fa-sort"></i></th>
              </tr>
            <?php
            //membuat pagging data
            if($jml){
              $batas = $jml;
            }else{
              $batas=5;
            }
            $pg = isset($_GET['pg'] ) ? $_GET['pg'] : "";
            if ( empty( $pg )) {
              $posisi = 0;
              $pg = 1;
            } else {
              $posisi = ( $pg - 1 ) * $batas;
            }

            //cek query saat di klik 
            if($cari){
              $sql = mysqli_query($koneksi, "SELECT*FROM barang WHERE judul like '%$cari%' or id_barang like '%$cari%' ");
            } else{
              $sql = mysqli_query($koneksi, "SELECT*FROM barang ORDER BY id_barang ASC limit $posisi,$batas");
            }

            //validasi data kalau kosong
            if(mysqli_num_rows($sql) == 0){
              echo "data kosong";
            }else{
            //kalau ada data di tampilkan
              while($row = mysqli_fetch_assoc($sql)){
                $id_barang = $row['id_barang'];
              ?>
                  <tr>
                    <td><?php echo  $row["id_barang"]; ?></td>
                    <td><?php echo  $row["nama_barang"]; ?></td>
                    <td><?php echo  $row["jumlah_barang"]; ?></td>
                    <td><?php echo  $row["harga_barang"]; ?></td>
                    <td><?php echo  $row["foto"]; ?></td>
                    <td>
                      <a class="btn btn-sm btn-primary" href="edit_barang.php?id_barang=<?= $id_barang; ?>"><i class="fa fa-edit"></i> Edit</a>
                      <a class="btn btn-sm btn-danger" href="barang.php?aksi=delete&id_barang=<?php echo $id_barang; ?>" onclick="return confirm('Anda yakin?')" class="btn btn-danger"><i class="fa fa-wrench"></i> Hapus</a></td>
                  </tr>
<?php
}
 ?>
              </tbody>
            </table>
            <?php
            $aku = mysqli_query($koneksi, "SELECT*FROM barang");
            $jml_data = mysqli_num_rows($aku);
            echo "Jumlah Data : $jml_data";

        $jmlhalaman = ceil($jml_data/$batas);
        $nmr = '';
        for ($i = 1; $i<= $jmlhalaman; $i++){
          if ($i == $pg){
          $nmr .= $i. " ";
        } else {
          $nmr .= "<a href ='?pg=$i'>&nbsp$i&nbsp</a>";
        }
      }

      //navigasi ke sebelumnya
      if($pg > 1){
        $link = $pg-1;
        $prev = "<a href='?pg=$link'>&nbsp;<span class='glyphicon glyphicon-backward' aria-hidden=true></span></a>";
      }else{
        $prev = "&nbsp;<span class='glyphicon glyphicon-backward' aria-hidden=true></span>";
      }
      //navigasi selanjutnya
      if($pg < $jmlhalaman){
        $link = $pg + 1;
        $prev = "<b><a href='?pg=$link'>&nbsp;<span class='glyphicon glyphicon-backward' aria-hidden=true></span></a>";
      }else{
        $prev = "&nbsp;<span class='glyphicon glyphicon-backward' aria-hidden=true></span>";
      }

      echo $prev.$nmr.$next;
      echo "<br>";
    }
    ?>
          </div><br>
            <div class="text-right">
            <a href="inputbarang.php" class="btn btn-sm btn-warning">Tambah Barang <i class="fa fa-arrow-circle-right"></i></a>
          </div>

        </div>
      </div>
    </div>
  </div><!-- /.row -->
  </div><!-- /#page-wrapper -->