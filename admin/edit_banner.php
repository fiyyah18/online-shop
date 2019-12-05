<?php
error_reporting(0);
include "../koneksi/koneksi.php";
include "header.php";
?>
<?php
$kode =$_GET['id_banner'];
$sql =mysqli_query($koneksi,"SELECT*FROM banner WHERE id_banner ='$kode'") or die(mysqli_error ($koneksi));
while($data =mysqli_fetch_array($sql)){
?>

	<br>
			<div class="container">
				<div class="panel panel-primary" style="width: 750px;margin:0px auto">
					<div class="panel-heading">Edit Banner</div>
					<div class="panel-body">
				<form method="POST" enctype="multipart/form-data" data-toggle="validator" role="form" action="act_banner.php?id_banner=<?= $kode ?>">
					
					<div class="form-group">
						<label class="control-label" for="inputid_banner">Id Banner </label>
						<input class="form-control" name="id_banner" data-error="Please enter id_banner field." id="inputid_banner" placeholder="id_banner" type="text" required value="<?= $data['id_banner'] ?>" />
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputjudul_banner">Judul Banner</label>
						<input class="form-control" name="judul_banner" data-error="Please enter nama field." id="inputjudul_banner" placeholder="judul_banner" type="text" required value="<?= $data['judul_banner'] ?>"/>
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputfoto_banner">Foto Banner</label>
						<input class="form-control" name="foto_banner" data-error="Please enter foto_banner field." id="inputfoto_banner" placeholder="foto_banner" type="file" required value="<?= $data['foto_banner'] ?>"/>
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<input type="submit" value="Simpan Data" name="edit" class="btn btn-sm btn-ptimary" />

						<button class="btn btn-warning" type="Reset"> Reset </button>
					</div>
					<div class="text-left">
						<a href="banner.php" data-toggle="tooltip" class="tip-bottom" data-original-tittle="Tooltip Dibawah"> View all data banner <i class="fa fa-arrow-circle-left"></i></a>
					</div>

				</form>
					</div>
				</div>
			</div>
<?php } ?>
</body>