<?php
include "../koneksi/koneksi.php";
include "header.php";

//Pemanggilan Edit Pengguna Menggunakan Method POST Dan Get untuk Pemanggilan ID
if(isset($_POST['edit'])){
		$id_barang		=$_GET['id_barang'];
		$nama_barang	=$_POST["nama_barang"];
		$jumlah_barang	=$_POST["jumlah_barang"];
		$harga_barang	=$_POST["harga_barang"];
		$foto			=$_FILES["foto"]["name"];
		
		if(strlen($foto)>0){
 		if(is_uploaded_file($_FILES['foto']['tmp_name'])){
 		move_uploaded_file($_FILES['foto']
 		['tmp_name'],"../img/barang/".$foto);
	    } }
//echo $id;

//Query edit atau update agenda
		$update = mysqli_query($koneksi,"update barang set nama_barang='$nama_barang',jumlah_barang='$jumlah_barang',harga_barang='$harga_barang',foto='$foto' where id_barang='$id_barang' ");
		if($update){
					echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data Berhasil di Update.</div> ';
					header("location:barang.php");
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data Berhasil di Update.</div> ';
					header("location:barang.php");
				}
}
?>