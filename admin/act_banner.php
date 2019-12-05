<?php
include "../koneksi/koneksi.php";
include "header.php";

//Pemanggilan Edit Pengguna Menggunakan Method POST Dan Get untuk Pemanggilan ID
if(isset($_POST['edit'])){
		$id_banner			=$_GET['kode'];
		$judul_banner		=$_POST["judul_banner"];
		$foto_banner		=$_FILES["foto_banner"]["name"];
		
		if(strlen($foto_banner)>0){
 		if(is_uploaded_file($_FILES['foto_banner']['tmp_name'])){
 		move_uploaded_file($_FILES['foto_banner']
 		['tmp_name'],"../img/banner/".$foto_banner);
	    } }
//echo $id;

//Query edit atau update agenda
		$update = mysqli_query($koneksi,"update banner set judul_banner='$judul_banner',foto_banner='$foto_banner' where id_banner='$kode' ");
		if($update){
					echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data Berhasil di Update.</div> ';
					header("location:banner.php");
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data Berhasil di Update.</div> ';
					header("location:banner.php");
				}
}
?>