<?php
include "../koneksi/koneksi.php";
include "header.php";

//Pemanggilan Edit Pengguna Menggunakan Method POST Dan Get untuk Pemanggilan ID
if(isset($_POST['edit'])){
		$judul					=$_POST["judul"];
		$Nama_Kategori			=$_POST["Nama_Kategori"];
		$nama_user				=$_POST["nama_user"];
		$status					=$_POST["status"];
		$tanggal				=$_POST["tanggal"];
		$kode					=$_GET['kode'];
//echo $id;

//Query edit atau update artikel
		$update = mysqli_query($koneksi,"update artikel set judul='$judul',Nama_Kategori='$Nama_Kategori',nama_user='$nama_user',status='$status',tanggal='$tanggal' where kode='$kode' ");
		if($update){
					echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data Berhasil di Update.</div> ';
					header("location:artikel.php");
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data Berhasil di Update.</div> ';
					header("location:artikel.php");
				}
}
?>