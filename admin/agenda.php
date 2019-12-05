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
$query = mysqli_query($koneksi, "SELECT * FROM agenda ORDER BY id_agenda DESC");
?>

<?php
//memanggil fungsi delete
if(isset($_GET['aksi']) == 'delete') {
  $kode = $_GET['kode'];
  $delete = mysqli_query($koneksi, "DELETE FROM agenda WHERE id_agenda='$kode'");
  if ($delete) {
    echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus,</div>';
    header("location:agenda.php");
  } else {
    echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus,</div>';
    header("location:agenda.php");
  }
}
?>
<script type="text/javascript" src="assets/DataTables/media/js/jquery.js"></script>
<script type="text/javascript" src="assets/DataTables/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="assets/DataTables/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="assets/DataTables/media/css/dataTables.bootstrap.css">

  <div id="page-wrapper">
    <div class="col-lg-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Agenda</h3>
         
          </div>
        </div>
        <div class="panel-body">
               <form class="form-inline" method="GET">
          <div class="form-group">
            <?php $jml = (isset($_GET['jml']) ? strtolower($_GET['jml']) : NULL); ?>
            Cari
            <input name="nama_agenda" class="form-control">
            <input name="cari" class="form-control" type="submit" value="cari" onchange="form.submit()">
            <?php $cari = (isset($_GET['nama_agenda']) ? strtolower($_GET['nama_agenda']) : NULL); ?>
            </div>
            </form>
        </div>
        <br>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="example" class="display nowrap">

            <!-- data yang akan ditampilkan -->
              <tr>
                <th>Kode <i class="fa fa-sort"></i></th>
                <th>Nama Agenda <i class="fa fa-sort"></i></th>
                <th>Pengirim <i class="fa fa-sort"></i></th>
                <th>Tempat <i class="fa fa-sort"></i></th>
                <th>Waktu <i class="fa fa-sort"></i></th>
                <th>Tanggal Mulai <i class="fa fa-sort"></i></th>
                <th>Tanggal Selesai <i class="fa fa-sort"></i></th>
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
              $sql = mysqli_query($koneksi, "SELECT*FROM agenda WHERE nama_agenda like '%$cari%' or id_agenda like '%$cari%' ");
            } else{
              $sql = mysqli_query($koneksi, "SELECT*FROM agenda ORDER BY id_agenda ASC limit $posisi,$batas");
            }

            //validasi data kalau kosong
            if(mysqli_num_rows($sql) == 0){
              echo "data kosong";
            }else{
            //kalau ada data di tampilkan
              while($row = mysqli_fetch_assoc($sql)){
                $id = $row['id_agenda'];
              ?>
                  <tr>
                    <td><?php echo  $row["id_agenda"]; ?></td>
                    <td><?php echo  $row["nama_agenda"]; ?></td>
                    <td><?php echo  $row["pengirim"]; ?></td>
                    <td><?php echo  $row["tempat"]; ?></td>
                    <td><?php echo  $row["waktu"]; ?></td>
                    <td><?php echo  $row["tanggal_mulai"]; ?></td>
                    <td><?php echo  $row["tanggal_selesai"]; ?></td>
                    <td>
                      <a class="btn btn-sm btn-primary" href="edit_agenda.php?id_agenda=<?= $kode; ?>"><i class="fa fa-edit"></i> Edit</a>
                      <a class="btn btn-sm btn-danger" href="agenda.php?aksi=delete&id_agenda=<?php echo $kode; ?>" onclick="return confirm('Anda yakin?')" class="btn btn-danger"><i class="fa fa-wrench"></i> Hapus</a></td>
                  </tr>
<?php
}
 ?>
              </tbody>
            </table>
            <?php
            $aku = mysqli_query($koneksi, "SELECT*FROM agenda");
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
            <a href="inputagenda.php" class="btn btn-sm btn-warning">Tambah Agenda <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div><!-- /.row -->
  </div><!-- /#page-wrapper -->