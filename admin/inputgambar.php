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
		$id_galeri					=$_POST["id_galeri"];
		$judul						=$_POST["judul"];
		$galeri						=$_FILES["galeri"]["name"];
		if(strlen($galeri)>0){
  if(is_uploaded_file($_FILES['galeri']['tmp_name'])){
  move_uploaded_file($_FILES['galeri']
  ['tmp_name'],"../img/galeri/".$galeri);
    } }

//menginput pengguna
		$sql = mysqli_query($koneksi,"insert into galeri values('$id_galeri','$judul','$galeri')");

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
					<div class="panel-heading">Form Input Galeri</div>
					<div class="panel-body">
				<form method="post" enctype="multipart/form-data" data-toggle="validator" role="form">
					
					<div class="form-group">
						<label class="control-label" for="inputid_galeri">Id Galeri</label>
						<input class="form-control" name="id_galeri" data-error="Please enter nama field." id="inputid_galeri" placeholder="id_galeri" type="text" required />
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputjudul">Judul</label>
						<input class="form-control" name="judul" data-error="Please enter nama field." id="inputjudul" placeholder="judul" type="text" required />
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputgaleri">Galeri</label>
						<input class="form-control" name="galeri" data-error="Please enter nama field." id="inputgaleri" placeholder="galeri" type="file" required />
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group">
						<input type="submit" value="Simpan Data" name="btnsimpan" class="btn btn-sm btn-ptimary" />

						<button class="btn btn-warning" type="Reset"> Reset </button>
					</div>
					<div class="text-left">
						<a href="gambar.php" data-toggle="tooltip" class="tip-bottom" data-original-tittle="Tooltip Dibawah"> View all data galeri<i class="fa fa-arrow-circle-left"></i></a>
					</div>

				</form>
					</div>
				</div>
			</div>
</body>
</html>