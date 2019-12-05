<?php
include "../koneksi/koneksi.php";
include "header.php";

//Pemanggilan Edit Pengguna Menggunakan Method POST Dan Get untuk Pemanggilan ID
if(isset($_POST['edit'])){
		$Nama_Kategori		=$_POST["Nama_Kategori"];
		$kode				=$_GET['ID_Kategori'];
//echo $ID_Kategori;

//Query edit atau update kategori
		$update = mysqli_query($koneksi,"update kategori set Nama_Kategori='$Nama_Kategori' where ID_Kategori='$kode' ");
		if($update){
					echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data Berhasil di Update.</div> ';
					header("location:kategori.php");
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data Berhasil di Update.</div> ';
					header("location:kategori.php");
				}
}
?>