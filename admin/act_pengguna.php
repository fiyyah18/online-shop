<?php
include "../koneksi/koneksi.php";
include "header.php";

//Pemanggilan Edit Pengguna Menggunakan Method POST Dan Get untuk Pemanggilan ID
if(isset($_POST['edit'])){
		$nama			=$_POST["nama"];
		$username	=$_POST["username"];
		$password	=md5($_POST["password"]);
		$email			=$_POST["email"];
		$no_telp		=$_POST["no_telp"];
		$level			=$_POST["level"];
		$kode			=$_GET['id'];
//echo $id;

//Query edit atau update pengguna
		$update = mysqli_query($koneksi,"update user set nama='$nama',username='$username',password='$password',email='$email',no_telp='$no_telp',level='$level' where id='$kode' ");
		if($update){
					echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data Berhasil di Update.</div> ';
					header("location:pengguna.php");
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data Berhasil di Update.</div> ';
					header("location:pengguna.php");
				}
}
?>