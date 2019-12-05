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
		$kode				=$_POST["kode"];
		$judul				=$_POST["judul"];
		$Nama_Kategori		=$_POST["Nama_Kategori"];
		$nama_user			=$_POST["nama_user"];
		$status				=$_POST["status"];
		$tanggal 			=$_POST["tanggal"];

//menginput artikel
		$sql = mysqli_query($koneksi,"insert into agenda values('$kode','$judul','$Nama_Kategori','$nama_user','$statuus','$tanggal)");

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
					<div class="panel-heading">Form Input Artikel</div>
					<div class="panel-body">
				<form method="post" enctype="multipart/form-data" data-toggle="validator" role="form">
					<div class="form-group">
						<label class="control-label" for="inputnkode">Kode</label>
						<input class="form-control" name="kode" data-error="Please enter kode field." id="inputkode" placeholder="kode" type="text" required />
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputjudul">Judul</label>
						<input class="form-control" name="judul" data-error="Please enter judul field." id="inputjudul" placeholder="judul" type="text" required />
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputNama_Kategori">Nama Kategori</label>
						<input class="form-control" name="Nama_Kategori" data-error="Please enter Nama_Kategori field." id="inputNama_Kategori" placeholder="Nama_Kategori" type="text" required />
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputnama_user">Nama User</label>
						<input class="form-control" name="nama_user" data-error="Please enter nama_user field." id="inputnama_user" placeholder="nama_user" type="text" required />
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputtanggal">Tanggal</label>
						<input class="form-control" name="tanggal" data-error="Please enter tanggal field." id="inputtanggal" placeholder="tanggal" type="text" required />
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<input type="submit" value="Simpan Data" name="btnsimpan" class="btn btn-sm btn-ptimary" />

						<button class="btn btn-warning" type="Reset"> Reset </button>
					</div>
					<div class="text-left">
						<a href="artikel.php" data-toggle="tooltip" class="tip-bottom" data-original-tittle="Tooltip Dibawah"> View all data artikel <i class="fa fa-arrow-circle-left"></i></a>
					</div>

				</form>
					</div>
				</div>
			</div>
</body>
</html>