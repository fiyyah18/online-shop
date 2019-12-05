<?php
error_reporting(0);
include "../koneksi/koneksi.php";
include "header.php";
?>
<?php
$id_barang =$_GET['id_barang'];
$sql =mysqli_query($koneksi,"SELECT*FROM barang WHERE id_barang ='$id_barang'") or die(mysqli_error ($koneksi));
while($data =mysqli_fetch_array($sql)){
?>

	<br>
			<div class="container">
				<div class="panel panel-primary" style="width: 750px;margin:0px auto">
					<div class="panel-heading">Edit Galeri</div>
					<div class="panel-body">
				<form method="POST" enctype="multipart/form-data" data-toggle="validator" role="form" action="act_barang.php?id_barang=<?= $id_barang ?>">
					
					<div class="form-group">
						<label class="control-label" for="inputid_barang">ID Galeri</label>
						<input class="form-control" name="id_barang" data-error="Please enter id field." id="inputid_barang" placeholder="id_barang" type="text" required value="<?= $data['id_barang'] ?>" />
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputnama_barang">Nama Barang</label>
						<input class="form-control" name="nama_barang" data-error="Please enter nama field." id="inputnama_barang" placeholder="nama_barang" type="text" required value="<?= $data['nama_barang'] ?>"/>
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputjumlah_barang">Jumlah Barang</label>
						<input class="form-control" name="jumlah_barang" data-error="Please enter nama field." id="inputjumlah_barang" placeholder="jumlah_barang" type="text" required value="<?= $data['jumlah_barang'] ?>"/>
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputharga_barang">Harga Barang</label>
						<input class="form-control" name="harga_barang" data-error="Please enter nama field." id="inputharga_barang" placeholder="harga_barang" type="text" required value="<?= $data['harga_barang'] ?>"/>
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputfoto">Foto</label>
						<input class="form-control" name="foto" data-error="Please enter foto field." id="inputfoto" placeholder="foto" type="file" required value="<?= $data['foto'] ?>"/>
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<input type="submit" value="Simpan Data" name="edit" class="btn btn-sm btn-ptimary" />

						<button class="btn btn-warning" type="Reset"> Reset </button>
					</div>
					<div class="text-left">
						<a href="barang.php" data-toggle="tooltip" class="tip-bottom" data-original-tittle="Tooltip Dibawah"> View all data barang <i class="fa fa-arrow-circle-left"></i></a>
					</div>

				</form>
					</div>
				</div>
			</div>
<?php } ?>
</body>