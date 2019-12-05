<?php
error_reporting(0);
include "../koneksi/koneksi.php";
include "header.php";
?>
<?php
$kode =$_GET['ID_Kategori'];
$sql =mysqli_query($koneksi,"SELECT*FROM kategori WHERE ID_Kategori ='$kode'") or die(mysqli_error ($koneksi));
while($data =mysqli_fetch_array($sql)){
?>

	<br>
			<div class="container">
				<div class="panel panel-primary" style="width: 750px;margin:0px auto">
					<div class="panel-heading">Edit Kategori</div>
					<div class="panel-body">
				<form method="POST" enctype="multipart/form-data" data-toggle="validator" role="form" action="act_kategori.php?ID_Kategori=<?= $kode ?>">
					
					<div class="form-group">
						<label class="control-label" for="inputID_Kategori">ID Kategori</label>
						<input class="form-control" name="ID_Kategori" data-error="Please enter id field." id="inputID_Kategori" placeholder="ID_Kategori" type="text" required value="<?= $data['ID_Kategori'] ?>" disabled/>
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="Nama_Kategori">Nama Kategori</label>
						<input class="form-control" name="Nama_Kategori" data-error="Please enter nama field." id="Nama_Kategori" placeholder="Nama_Kategori" type="text" required value="<?= $data['Nama_Kategori'] ?>"/>
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<input type="submit" value="Simpan Data" name="edit" class="btn btn-sm btn-ptimary" />

						<button class="btn btn-warning" type="Reset"> Reset </button>
					</div>
					<div class="text-left">
						<a href="kategori.php" data-toggle="tooltip" class="tip-bottom" data-original-tittle="Tooltip Dibawah"> View all data kategori <i class="fa fa-arrow-circle-left"></i></a>
					</div>

				</form>
					</div>
				</div>
			</div>
<?php } ?>
</body>