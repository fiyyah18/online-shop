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
		$id_barang					=$_POST["id_barang"];
		$nama_barang				=$_POST["nama_barang"];
		$jumlah_barang				=$_POST["jumlah_barang"];
		$harga_barang				=$_POST["harga_barang"];
		$foto 						=$_FILES["foto"]["name"];
		if(strlen($foto)>0){
  if(is_uploaded_file($_FILES['foto']['tmp_name'])){
  move_uploaded_file($_FILES['foto']
  ['tmp_name'],"../img/barang/".$foto);
    } }

//menginput pengguna
		$sql = mysqli_query($koneksi,"insert into barang values('$id_barang','$nama_barang','$jumlah_barang','$harga_barang','$foto')");

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
					<div class="panel-heading">Form Input Barang</div>
					<div class="panel-body">
				<form method="post" enctype="multipart/form-data" data-toggle="validator" role="form">

					<div class="form-group">
						<label class="control-label" for="inputid_barang">Id Barang</label>
						<input class="form-control" name="id_barang" data-error="Please enter nama field." id="inputid_barang" placeholder="id_barang" type="text" required />
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputnama_barang">Nama Barang</label>
						<input class="form-control" name="nama_barang" data-error="Please enter nama field." id="inputnama_barang" placeholder="nama_barang" type="text" required />
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputjumlah_barang">Jumlah Barang</label>
						<input class="form-control" name="jumlah_barang" data-error="Please enter nama field." id="inputjumlah_barang" placeholder="jumlah_barang" type="text" required />
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputharga_barang">Harga Barang</label>
						<input class="form-control" name="harga_barang" data-error="Please enter nama field." id="inputharga_barang" placeholder="harga_barang" type="text" required />
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputfoto">Foto</label>
						<input class="form-control" name="foto" data-error="Please enter nama field." id="inputgfoto" placeholder="foto" type="file" required />
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group">
						<input type="submit" value="Simpan Data" name="btnsimpan" class="btn btn-sm btn-ptimary" />

						<button class="btn btn-warning" type="Reset"> Reset </button>
					</div>
					<div class="text-left">
						<a href="barang.php" data-toggle="tooltip" class="tip-bottom" data-original-tittle="Tooltip Dibawah"> View all data barang<i class="fa fa-arrow-circle-left"></i></a>
					</div>

				</form>
					</div>
				</div>
			</div>
</body>
</html>