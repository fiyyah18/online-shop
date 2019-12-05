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
		$id					=$_POST["id"];
		$judul_iklan				=$_POST["judul_iklan"];
		$iklan					=$_FILES["iklan"]["name"];
		if(strlen($iklan)>0){
  if(is_uploaded_file($_FILES['iklan']['tmp_name'])){
  move_uploaded_file($_FILES['iklan']
  ['tmp_name'],"../img/iklan/".$iklan);
    } }

//menginput pengguna
		$sql = mysqli_query($koneksi,"insert into iklan values('$id','$judul_iklan','$iklan')");

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
					<div class="panel-heading">Form Input Iklan</div>
					<div class="panel-body">
				<form method="post" enctype="multipart/form-data" data-toggle="validator" role="form">

					<div class="form-group">
						<label class="control-label" for="inputid">Id </label>
						<input class="form-control" name="id" data-error="Please enter nama field." id="inputid" placeholder="id" type="text" required />
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputjudul_iklan">judul_iklan</label>
						<input class="form-control" name="judul_iklan" data-error="Please enter nama field." id="inputjudul_iklan" placeholder="judul_iklan" type="text" required />
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputiklan">Iklan</label>
						<input class="form-control" name="iklan" data-error="Please enter nama field." id="inputiklan" placeholder="iklan" type="file" required />
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group">
						<input type="submit" value="Simpan Data" name="btnsimpan" class="btn btn-sm btn-ptimary" />

						<button class="btn btn-warning" type="Reset"> Reset </button>
					</div>
					<div class="text-left">
						<a href="iklan.php" data-toggle="tooltip" class="tip-bottom" data-original-tittle="Tooltip Dibawah"> View all data iklan<i class="fa fa-arrow-circle-left"></i></a>
					</div>

				</form>
					</div>
				</div>
			</div>
</body>
</html>