<?php
error_reporting(0);
include "../koneksi/koneksi.php";

//perintah agar tidak dapat diinjeksi
session_start();
$level = $_SESSION['level'];
if ($level == "") {
	?>
	<script language="JavaScript">
		alert('Anda Tidak Dapat Mengakses Halaman Ini, Silahkan Login dahulu');
		document.location = ('index.php');
	</script>
<?php } ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Input</title>
<?php include 'header.php'; ?>
</head>
<body>
	<?php
//Saat tombol simpan ditekan maka query akan di laksanakan
	If(Isset($_POST["btnsimpan"])){
		include "koneksi/koneksi.php";
		$id_agenda					=$_POST["id_agenda"];
		$nama_agenda			=$_POST["nama_agenda"];
		$pengirim						=$_SESSION["username"];
		$tempat						=$_POST["tempat"];
		$waktu							=$_POST["waktu"];
		$tanggal_mulai			=$_POST["tanggal_mulai"];
		$tanggal_selesai			=$_POST["tanggal_selesai"];

//menginput pengguna
		$sql = mysqli_query($koneksi,"insert into agenda values('$id_agenda','$nama_agenda','$_SESSION[username]','$tempat','$waktu','$tanggal_mulai','$tanggal_selesai')");

			if (!$sql) {
				die('Query Gagal : '.mysqli_errno($koneksi).
				' - ' .mysqli_error($koneksi));
			} else {
				?>
				<div class="alert alert-info fade in">
				<button data-dismiss="alert" class="close" type="button">&times;
				</button>
				<center><strong>Sukses !</strong> Data Berhasil Disimpan.</center>
				</div>
				<?php
			}
	}
	?>
	<br>
			<div class="container">
				<div class="panel panel-primary" style="width: 750px;margin:0px auto">
					<div class="panel-heading">Form Input Agenda</div>
					<div class="panel-body">
				<form method="post" enctype="multipart/form-data" data-toggle="validator" role="form">
					<div class="form-group">
						<label class="control-label" for="inputnid_agenda">Id Agenda</label>
						<input class="form-control" name="id_agenda" data-error="Please enter id field." id="inputid_agenda" placeholder="id_agenda" type="text" required />
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputnama_agenda">Nama Agenda</label>
						<input class="form-control" name="nama_agenda" data-error="Please enter nama field." id="inputnama_agenda" placeholder="nama_agenda" type="text" required />
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputtempat">Tempat</label>
						<input class="form-control" name="tempat" data-error="Please enter nama field." id="inputtempat" placeholder="tempat" type="text" required />
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputwaktu">Waktu</label>
						<input class="form-control" name="waktu" data-error="Please enter nama field." id="inputwaktu" placeholder="waktu" type="time" required />
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputtanggal_mulai">Tanggal Mulai</label>
						<input class="form-control" name="tanggal_mulai" data-error="Please enter nama field." id="inputtanggal_mulai" placeholder="tanggal_mulai" type="text" required />
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputtanggal_selesai">Tanggal Selesai</label>
						<input class="form-control" name="tanggal_selesai" data-error="Please enter nama field." id="inputtanggal_selesai" placeholder="tanggal_selesai" type="text" required />
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<input type="submit" value="Simpan Data" name="btnsimpan" class="btn btn-sm btn-ptimary" />

						<button class="btn btn-warning" type="Reset"> Reset </button>
					</div>
					<div class="text-left">
						<a href="agenda.php" data-toggle="tooltip" class="tip-bottom" data-original-tittle="Tooltip Dibawah"> View all data agenda <i class="fa fa-arrow-circle-left"></i></a>
					</div>

				</form>
					</div>
				</div>
			</div>
</body>
</html>