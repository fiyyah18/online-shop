<?php
error_reporting(0);
include "koneksi/koneksi.php";
// membuka sessi login
session_start();
$na = $_SESSION['jeniskelamin'];
if ($na == "") {
  ?>
  <script language="JavaScript">
    alert('Anda tidak boleh mengakses halaman ini, Silahkan login dahulu');
    document.location = ('index.php')
  </script>
<?php
}
?>

<?php
//memanggil fungsi delete
if (isset($_GET['aksi']) == 'delete') {
  $kode = $_GET['nis'];
  $delete = mysqli_query($koneksi, "DELETE FROM siswa WHERE nis='$kode'");
  if ($delete) {
    echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>';
    header("location:dashboard.php");
  } else {
    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
    header("location:dashboard.php");
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
  <script>
    $(document).ready(function() {
      $('#table_id').DataTable();
    });
  </script>
</head>

<?php
$query = mysqli_query($koneksi, "SELECT * FROM siswa ORDER BY nis DESC");
?>

<body>
  <?php include "header.php" ?>
  <br><br>
  <div id="page-wrapper">
    <div class="col-lg-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Data Siswa</h3>
        </div>
        <div class="panel-body">
                 <form class="form-inline" method="get">
                <div class="form-group">
    
                <?php $jml = (isset($_GET['jml']) ? strtolower($_GET['jml']) : NULL);  ?>
                Cari 
                <input name="nama" class="form-control"/>
                <input name="cari" class="form-control" type="submit" value="Cari" onchange="form.submit()"/>
                <?php $cari = (isset($_GET['nama']) ? strtolower($_GET['nama']) : NULL);?>
        </div>
        </form><br>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="example" class="display nowrap">

              <tr>
                <th>NIS <i class="fa fa-sort"></i></th>
                <th>Nama <i class="fa fa-sort"></i></th>
                <th>Tempat Tanggal Lahir <i class="fa fa-sort"></i></th>
                <th>Jenis Kelamin<i class="fa fa-sort"></i></th>
                <th>Telpon <i class="fa fa-sort"></i></th>
                <th>Alamat <i class="fa fa-sort"></i></th>
                <th>Aksi <i class="fa fa-sort"></i></th>
              </tr>

                  <?php
                 // MEMBUAT PAGGING DATA
                 if($jml){
                $batas = $jml;
               }else{
                $batas=4;
          }
             $pg = isset($_GET['pg'] ) ? $_GET['pg'] : "";
             if ( empty( $pg )) {
             $posisi = 0;
             $pg = 1;
             } else {
            $posisi = ( $pg - 1 ) * $batas;
           }

        // CEK QUERY SAAT DI KLIK JURUSAN,STATUS, JUMLAH
        if($cari){
            $sql = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nama like '%$cari%' or nis like '%$cari%' ");
        }else{
          $sql = mysqli_query($koneksi, "SELECT * FROM siswa ORDER BY nis ASC limit $posisi,$batas");
          
        }
  //validasi data kalo kosong
  if(mysqli_num_rows($sql) == 0){
    echo "data kosong";
  }else{
                   while($row = mysqli_fetch_assoc($sql)){
                   $kode = $row['nis'];
                   ?>

                  <tr>
                    <td><?php echo  $row["nis"]; ?></td>
                    <td><?php echo  $row["nama"]; ?></td>
                    <td class="center"><?php echo  $row["tempat"] . ", " . $row["tanggal"]; ?></td>
                    <td><?php echo  $row["jenis"]; ?></td>
                    <td><?php echo  $row["telpon"]; ?></td>
                    <td><?php echo  $row["alamat"]; ?></td>
                    <td>
                      <a class="btn btn-sm btn-primary" href="edit_siswa.php?nis=<?= $kode; ?>"><i class="fa fa-edit"></i> Edit</a>
                      <a class="btn btn-sm btn-danger" href="dashboard.php?aksi=delete&nis=<?php echo $kode; ?>" onclick="return confirm('Anda yakin?')" class="btn btn-danger"><i class="fa fa-wrench"></i> Hapus</a></td>
                  </tr>
              <?php }  ?>
              </tbody>
            </table>
          </div><br>
      <?php

            $aku = mysqli_query($koneksi,"select * from siswa");
            $jml_data  = mysqli_num_rows($aku);
            
      $JmlHalaman = ceil($jml_data/$batas);
      $nmr = '';
      for ($i = 1; $i<= $JmlHalaman; $i++){
        if ($i == $pg) {
          $nmr .= $i. " ";
        } else {
          $nmr .= "<a href ='?pg=$i'>&nbsp$i&nbsp</a>";
        }
      }
          
      //Navigasi ke sebelumnya
      if ( $pg > 1 ) {
      $link = $pg-1;
      $prev = "<a href='?pg=$link'>&nbsp;<span class='page-link' aria-hidden=true></span></a>";
      } else {
        $prev = "&nbsp;<span class='page-link' aria-hidden=true></span>";
      }
      //Navigasi ke selanjutnya
      if ( $pg < $JmlHalaman ) {
      $link = $pg + 1;
      $next = "<b><a href='?pg=$link'>&nbsp;<span class='page-link' aria-hidden=true></span></a>";
      } else {
      $next = "&nbsp;<span class='page-link' aria-hidden=true></span>&nbsp;";
      }
      
      echo $prev.$nmr.$next;
      echo "<br>";
    }
  ?>
  <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-end">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Jumlah Data : <?= $jml_data; ?></a>
    </li>
    <li class="page-item ">
      <a class="page-link">Previous<?= $prev ?></a>
    </li>
    <li class="page-item"><a class="page-link" href="#"><?= $nmr ?></a></li>
    <li class="page-item ">
      <a class="page-link">Next<?= $next ?></a>
    </li>
</nav>
          <div class="text-right">
            <a href="tbsiswa.php" class="btn btn-sm btn-warning">Tambah Data Siswa <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div><!-- /.row -->
  </div><!-- /#page-wrapper -->

  </div><!-- /#wrapper -->
</body>

</html>