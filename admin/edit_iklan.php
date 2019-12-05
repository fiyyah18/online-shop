<?php
error_reporting(0);
include "../koneksi/koneksi.php";
include "header.php";
?>
<?php
$kode =$_GET['id'];
$sql =mysqli_query($koneksi,"SELECT*FROM iklan WHERE id ='$kode'") or die(mysqli_error ($koneksi));
while($data =mysqli_fetch_array($sql)){
?>

	<br>
			<div class="container">
				<div class="panel panel-primary" style="width: 750px;margin:0px auto">
					<div class="panel-heading">Edit Iklan</div>
					<div class="panel-body">
				<form method="POST" enctype="multipart/form-data" data-toggle="validator" role="form" action="act_iklan.php?id=<?= $kode ?>">
					
					<div class="form-group">
						<label class="control-label" for="inputid">ID </label>
						<input class="form-control" name="id" data-error="Please enter id field." id="inputid" placeholder="id" type="text" required value="<?= $data['id'] ?>" />
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputjudul_iklan">Judul Iklan</label>
						<input class="form-control" name="judul_iklan" data-error="Please enter nama field." id="inputjudul_iklan" placeholder="judul_iklan" type="text" required value="<?= $data['judul_iklan'] ?>"/>
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputiklan">iklan</label>
						<input class="form-control" name="iklan" data-error="Please enter iklan field." id="inputiklan" placeholder="iklan" type="file" required value="<?= $data['iklan'] ?>"/>
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<input type="submit" value="Simpan Data" name="edit" class="btn btn-sm btn-ptimary" />

						<button class="btn btn-warning" type="Reset"> Reset </button>
					</div>
					<div class="text-left">
						<a href="iklan.php" data-toggle="tooltip" class="tip-bottom" data-original-tittle="Tooltip Dibawah"> View all data iklan <i class="fa fa-arrow-circle-left"></i></a>
					</div>

				</form>
					</div>
				</div>
			</div>
<?php } ?>
</body>