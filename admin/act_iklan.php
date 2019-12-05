<?php
include "../koneksi/koneksi.php";
include "header.php";

//Pemanggilan Edit Pengguna Menggunakan Method POST Dan Get untuk Pemanggilan ID
if(isset($_POST['edit'])){
		$id			=$_GET['kode'];
		$judul_iklan		=$_POST["judul_iklan"];
		$iklan			=$_FILES["iklan"]["name"];
		
		if(strlen($iklan)>0){
 		if(is_uploaded_file($_FILES['iklan']['tmp_name'])){
 		move_uploaded_file($_FILES['iklan']
 		['tmp_name'],"../img/iklan/".$iklan);
	    } }
//echo $id;

//Query edit atau update agenda
		$update = mysqli_query($koneksi,"update iklan set judul_iklan='$judul_iklan',iklan='$iklan' where id='$kode' ");
		if($update){
					echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data Berhasil di Update.</div> ';
					header("location:iklan.php");
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data Berhasil di Update.</div> ';
					header("location:iklan.php");
				}
}
?>