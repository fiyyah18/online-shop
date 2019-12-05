<?php
error_reporting(0);
include "../koneksi/koneksi.php";
include "header.php";
?>
<?php
$kode =$_GET['kode'];
$sql =mysqli_query($koneksi,"SELECT*FROM artikel WHERE kode ='$kode'") or die(mysqli_error ($koneksi));
while($data =mysqli_fetch_array($sql)){
?>

	<br>
			<div class="container">
				<div class="panel panel-primary" style="width: 750px;margin:0px auto">
					<div class="panel-heading">Edit Artikel</div>
					<div class="panel-body">
				<form method="POST" enctype="multipart/form-data" data-toggle="validator" role="form" action="act_artikel.php?kode=<?= $kode ?>">
					
					<div class="form-group">
						<label class="control-label" for="inputkode">Kode</label>
						<input class="form-control" name="kode" data-error="Please enter kode field." id="inputkode" placeholder="kode" type="text" required value="<?= $data['kode'] ?>" />
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputnjudul">Judul</label>
						<input class="form-control" name="njudul" data-error="Please enter nama field." id="inputjudul" placeholder="judul" type="text" required value="<?= $data['judul'] ?>"/>
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputNama_Kategori">Nama Kategori</label>
						<input class="form-control" name="Nama_Kategori" data-error="Please enter Nama_Kategori field." id="inputNama_Kategori" placeholder="Nama_Kategori" type="text" required value="<?= $data['Nama_Kategori'] ?>"/>
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputnama_user">Nama User</label>
						<input class="form-control" name="nama_user" data-error="Please enter tenama_user field." id="inputnama_user" placeholder="nama_user" type="text" required value="<?= $data['nama_user'] ?>"/>
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputstatus">Status</label>
						<input class="form-control" name="status" data-error="Please enter status field." id="inputstatus" placeholder="status" type="text" required value="<?= $data['status'] ?>"/>
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputtanggal">Tanggal </label>
						<input class="form-control" name="tanggal" data-error="Please enter tanggal field." id="inputtanggal" placeholder="tanggal" type="text" required value="<?= $data['tanggal'] ?>"/>
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<input type="submit" value="Simpan Data" name="edit" class="btn btn-sm btn-ptimary" />

						<button class="btn btn-warning" type="Reset"> Reset </button>
					</div>
					<div class="text-left">
						<a href="artikel.php" data-toggle="tooltip" class="tip-bottom" data-original-tittle="Tooltip Dibawah"> View all data artikel <i class="fa fa-arrow-circle-left"></i></a>
					</div>

				</form>
					</div>
				</div>
			</div>
<?php } ?>
</body>