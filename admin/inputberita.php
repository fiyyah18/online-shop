<?php
error_reporting(0);
include "../koneksi/koneksi.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Input</title>
<?php include 'header.php'; ?>
	<script type="text/javascript" src="tinymce/tinymce.min.js">	</script>
	<script type="text/javascript">
		tinymce.init({selector:"#berita"});
</script>
</head>
<body>
	<?php
//Saat tombol simpan ditekan maka query akan di laksanakan
	If(Isset($_POST["btnsimpan"])){
		$id_berita				=$_POST["id_berita"];
		$judul					=$_POST["judul"];
		$ID_Kategori			=$_POST["ID_Kategori"];
		$isi_berita				=$_POST["isi_berita"];
		 $gambar         = $_FILES['gambar']['name'];
  		if(strlen($gambar)>0){
 		 if(is_uploaded_file($_FILES['gambar']['tmp_name'])){
  		move_uploaded_file($_FILES['gambar']
 		 ['tmp_name'],"img/berita/".$gambar);
		    } }
		$username				=$_SESSION["username"];
		$status					=$_POST["status"];
		$tanggal_publish		= date("Y-m-d h:i:sa");

//menginput pengguna
		$sql = mysqli_query($koneksi,"insert into berita values('','$judul','$ID_Kategori','$isi_berita','$gambar','$_SESSION[username]','$status','$tanggal_publish')");

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
					<div class="panel-heading">Form Input Berita</div>
					<div class="panel-body">
				<form method="post" enctype="multipart/form-data" data-toggle="validator" role="form">

					<div class="form-group">
						<label class="control-label" for="inputjudul">Judul</label>
						<input class="form-control" name="judul" data-error="Please enter nama field." id="inputjudul" placeholder="judul" type="text" required />
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label for="inputhari">Kategori</label>
						<select name="ID_Kategori" class="form-control">
						<?php
							include "koneksi/koneksi.php";
							$x="select * from kategori" ;
							$y=mysqli_query($koneksi,$x);
							while ($z=mysqli_fetch_array($y)) {
						?>
							<option value="<?php echo $z['ID_Kategori']; ?>"><?php echo $z['Nama_Kategori']; ?></option>
						<?php } ?>
						</select>
					<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputisi_berita">Isi Berita</label>
						<textarea name="isi_berita" rows="10" cols="30" class="form-control" id="berita"></textarea>
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputisi_berita">Gambar</label>
						<input class="form-control" name="gambar" data-error="Please enter nama field." id="inputisi_berita" placeholder="isi_berita" type="file" required />
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputlevel">Status</label>
						 <select name="status" class="form-control">
  						 <option value="Y">Ya</option>
						 <option value="N">No</option>
 						 </select>
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<input type="submit" value="Simpan Data" name="btnsimpan" class="btn btn-sm btn-ptimary" />

						<button class="btn btn-warning" type="Reset"> Reset </button>
					</div>
					<div class="text-left">
						<a href="berita.php" data-toggle="tooltip" class="tip-bottom" data-original-tittle="Tooltip Dibawah"> View all data berita <i class="fa fa-arrow-circle-left"></i></a>
					</div>

				</form>
					</div>
				</div>
			</div>
</body>
</html>