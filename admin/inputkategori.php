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
		include "../koneksi/koneksi.php";

		$ID_Kategori					=$_POST["ID_Kategori"];
		$Nama_Kategori					=$_POST["Nama_Kategori"];

//menginput kategori
		$sql = mysqli_query($koneksi,"insert into kategori values('$ID_Kategori','$Nama_Kategori')");

			if (!$sql) {
				die('Query Gagal : '.mysqli_errno($koneksi).
				' - ' .mysqli_erroe($koneksi));
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
					<div class="panel-heading">Form Input Kategori</div>
					<div class="panel-body">
				<form method="post" enctype="multipart/form-data" data-toggle="validator" role="form">
					
					<div class="form-group">
						<label class="control-label" for="inputID_Kategori">ID Kategori</label>
						<input class="form-control" name="ID_Kategori" data-error="Please enter id field." id="inputID_Kategori" placeholder="ID_Kategori" type="text" required />
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputNama_Kategori">Nama Kategori</label>
						<input class="form-control" name="Nama_Kategori" data-error="Please enter nama field." id="inputNama_Kategori" placeholder="Nama_Kategori" type="text" required />
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<input type="submit" value="Simpan Data" name="btnsimpan" class="btn btn-sm btn-ptimary" />

						<button class="btn btn-warning" type="Reset"> Reset </button>
					</div>
					<div class="text-left">
						<a href="kategori.php" data-toggle="tooltip" class="tip-bottom" data-original-tittle="Tooltip Dibawah"> View all data kategori <i class="fa fa-arrow-circle-left"></i></a>
					</div>

				</form>
					</div>
				</div>
			</div>
</body>
</html>