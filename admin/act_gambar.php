<?php
include "../koneksi/koneksi.php";
include "header.php";

//Pemanggilan Edit Pengguna Menggunakan Method POST Dan Get untuk Pemanggilan ID
if(isset($_POST['edit'])){
		$id_galeri		=$_GET['id_galeri'];
		$judul			=$_POST["judul"];
		$galeri			=$_FILES["galeri"]["name"];
		
		if(strlen($galeri)>0){
 		if(is_uploaded_file($_FILES['galeri']['tmp_name'])){
 		move_uploaded_file($_FILES['galeri']
 		['tmp_name'],"../img/galeri/".$galeri);
	    } }
//echo $id;

//Query edit atau update agenda
		$update = mysqli_query($koneksi,"update galeri set judul='$judul',galeri='$galeri' where id_galeri='$id_galeri' ");
		if($update){
					echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data Berhasil di Update.</div> ';
					header("location:gambar.php");
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data Berhasil di Update.</div> ';
					header("location:gambar.php");
				}
}
?>