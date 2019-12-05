<?php
include "../koneksi/koneksi.php";
include "header.php";

//Pemanggilan Edit Pengguna Menggunakan Method POST Dan Get untuk Pemanggilan ID
if(isset($_POST['edit'])){
		$nama_agenda			=$_POST["nama_agenda"];
		$pengirim				=$_POST["pengirim"];
		$tempat					=$_POST["tempat"];
		$waktu					=$_POST["waktu"];
		$tanggal_mulai			=$_POST["tanggal_mulai"];
		$tanggal_selesai		=$_POST["tanggal_selesai"];
		$kode					=$_GET['id_agenda'];
//echo $id;

//Query edit atau update agenda
		$update = mysqli_query($koneksi,"update agenda set nama_agenda='$nama_agenda',pengirim='$pengirim',tempat='$tempat',waktu='$waktu',tanggal_mulai='$tanggal_mulai',tanggal_selesai='$tanggal_selesai' where id_agenda='$kode' ");
		if($update){
					echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data Berhasil di Update.</div> ';
					header("location:agenda.php");
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data Berhasil di Update.</div> ';
					header("location:agenda.php");
				}
}
?>