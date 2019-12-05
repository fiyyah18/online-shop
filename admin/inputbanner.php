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
		$id_banner					=$_POST["id_banner"];
		$judul_banner				=$_POST["judul_banner"];
		$foto_banner					=$_FILES["foto_banner"]["name"];
		if(strlen($foto_banner)>0){
  if(is_uploaded_file($_FILES['foto_banner']['tmp_name'])){
  move_uploaded_file($_FILES['foto_banner']
  ['tmp_name'],"../img/banner/".$foto_banner);
    } }

//menginput pengguna
		$sql = mysqli_query($koneksi,"insert into banner values('$id_banner','$judul_banner','$foto_banner')");

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
					<div class="panel-heading">Form Input Banner</div>
					<div class="panel-body">
				<form method="post" enctype="multipart/form-data" data-toggle="validator" role="form">

					<div class="form-group">
						<label class="control-label" for="inputid_banner">Id Banner</label>
						<input class="form-control" name="id_banner" data-error="Please enter nama field." id="inputid_banner" placeholder="id_banner" type="text" required />
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputjudul_banner">Judul Banner</label>
						<input class="form-control" name="judul_banner" data-error="Please enter nama field." id="inputjudul_banner" placeholder="judul_banner" type="text" required />
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputfoto_banner">Foto Banner</label>
						<input class="form-control" name="foto_banner" data-error="Please enter nama field." id="inputfoto_banner" placeholder="foto_banner" type="file" required />
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group">
						<input type="submit" value="Simpan Data" name="btnsimpan" class="btn btn-sm btn-ptimary" />

						<button class="btn btn-warning" type="Reset"> Reset </button>
					</div>
					<div class="text-left">
						<a href="banner.php" data-toggle="tooltip" class="tip-bottom" data-original-tittle="Tooltip Dibawah"> View all data banner<i class="fa fa-arrow-circle-left"></i></a>
					</div>

				</form>
					</div>
				</div>
			</div>
</body>
</html>