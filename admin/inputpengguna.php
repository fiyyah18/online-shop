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

		$id 				=$_POST["id"];
		$nama			=$_POST["nama"];
		$username	=$_POST["username"];
		$password	=md5($_POST["password"]);
		$email			=$_POST["email"];
		$no_telp		=$_POST["no_telp"];
		$level			=$_POST["level"];

//menginput pengguna
		$sql = mysqli_query($koneksi,"insert into user values('$id','$nama','$username','$password','$email','$no_telp','$level')");

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
					<div class="panel-heading">Form Input Pengguna</div>
					<div class="panel-body">
				<form method="post" enctype="multipart/form-data" data-toggle="validator" role="form">
					
					<div class="form-group">
						<label class="control-label" for="inputid">ID</label>
						<input class="form-control" name="id" data-error="Please enter id field." id="inputid" placeholder="Id" type="text" required />
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputnama">Nama</label>
						<input class="form-control" name="nama" data-error="Please enter nama field." id="inputnama" placeholder="nama" type="text" required />
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputusername">Username</label>
						<input class="form-control" name="username" data-error="Please enter username field." id="inputusername" placeholder="username" type="text" required />
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputpassword">Password</label>
						<input class="form-control" name="password" data-error="Please enter password field." id="inputpassword" placeholder="password" type="text" required />
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputemail">Email</label>
						<input class="form-control" name="email" data-error="Please enter email field." id="inputemail" placeholder="email" type="text" required />
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputno_telp">No_telp</label>
						<input class="form-control" name="no_telp" data-error="Please enter no_telp field." id="inputno_telp" placeholder="no_telp" type="text" required />
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputlevel">Level</label>
						 <select name="level" class="form-control">
  						 <option value="admin">Admin</option>
						 <option value="penulis">Penulis</option>
    				 	 <option value="pengguna">Pengguna</option>
 						 </select>
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<input type="submit" value="Simpan Data" name="btnsimpan" class="btn btn-sm btn-ptimary" />

						<button class="btn btn-warning" type="Reset"> Reset </button>
					</div>
					<div class="text-left">
						<a href="pengguna.php" data-toggle="tooltip" class="tip-bottom" data-original-tittle="Tooltip Dibawah"> View all data pengguna <i class="fa fa-arrow-circle-left"></i></a>
					</div>

				</form>
					</div>
				</div>
			</div>
</body>
</html>