<?php
error_reporting(0);
include "../koneksi/koneksi.php";
include "header.php";
?>
<?php
$id_galeri =$_GET['id_galeri'];
$sql =mysqli_query($koneksi,"SELECT*FROM galeri WHERE id_galeri ='$id_galeri'") or die(mysqli_error ($koneksi));
while($data =mysqli_fetch_array($sql)){
?>

	<br>
			<div class="container">
				<div class="panel panel-primary" style="width: 750px;margin:0px auto">
					<div class="panel-heading">Edit Galeri</div>
					<div class="panel-body">
				<form method="POST" enctype="multipart/form-data" data-toggle="validator" role="form" action="act_gambar.php?id_galeri=<?= $id_galeri ?>">
					
					<div class="form-group">
						<label class="control-label" for="inputid_galeri">ID Galeri</label>
						<input class="form-control" name="id_galeri" data-error="Please enter id field." id="inputid_galeri" placeholder="id_galeri" type="text" required value="<?= $data['id_galeri'] ?>" />
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputjudul">Judul</label>
						<input class="form-control" name="judul" data-error="Please enter nama field." id="inputjudul" placeholder="judul" type="text" required value="<?= $data['judul'] ?>"/>
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputgaleri">Galeri</label>

        <img src="img/galeri/<?php echo $data['galeri']; ?>" width="150" height="150"?>
 
						<input class="form-control" name="galeri" data-error="Please enter pengirim field." id="inputgaleri"placeholder="galeri" type="file" value="<?= $data['galeri'] ?>"/>
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<input type="submit" value="Simpan Data" name="edit" class="btn btn-sm btn-ptimary" />

						<button class="btn btn-warning" type="Reset"> Reset </button>
					</div>
					<div class="text-left">
						<a href="gambar.php" data-toggle="tooltip" class="tip-bottom" data-original-tittle="Tooltip Dibawah"> View all data galeri <i class="fa fa-arrow-circle-left"></i></a>
					</div>

				</form>
					</div>
				</div>
			</div>
<?php } ?>
</body>