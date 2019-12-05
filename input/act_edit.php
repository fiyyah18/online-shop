<?php
include "koneksi/koneksi.php";

if (isset($_POST['edit'])) {
  $kode           = $_GET['nis'];
  $nama           = $_POST['nama'];
  $tempat         = $_POST['tempat'];
  $tanggal        = $_POST['tanggal'];
  $jenis          = $_POST['jenis'];
  $telpon         = $_POST["telpon"];
  $alamat         = $_POST["alamat"];

  $update = mysqli_query($koneksi, "update siswa set nis='$kode',nama='$nama',tempat='$tempat',tanggal='$tanggal',jenis='$jenis',telpon='$telpon',alamat='$alamat' where 
	nis='$kode'");
  if ($update) {
    echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil di update.</div>';
    header("location: dashboard.php");
  } else {
    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal diupdate.</div>';
    header("location: dashboard.php");
  }
}
