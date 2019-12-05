<?php
error_reporting(0);
include "../koneksi/koneksi.php";
include "header.php";
?>
<?php
$kode =$_GET['id_agenda'];
$sql =mysqli_query($koneksi,"SELECT*FROM agenda WHERE id_agenda ='$kode'") or die(mysqli_error ($koneksi));
while($data =mysqli_fetch_array($sql)){
?>

	<br>
			<div class="container">
				<div class="panel panel-primary" style="width: 750px;margin:0px auto">
					<div class="panel-heading">Edit Agenda</div>
					<div class="panel-body">
				<form method="POST" enctype="multipart/form-data" data-toggle="validator" role="form" action="act_agenda.php?id_agenda=<?= $kode ?>">
					
					<div class="form-group">
						<label class="control-label" for="inputid_agenda">ID Agenda</label>
						<input class="form-control" name="id_agenda" data-error="Please enter id field." id="inputid_agenda" placeholder="id_agenda" type="text" required value="<?= $data['id_agenda'] ?>" />
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputnama_agenda">Nama Agenda</label>
						<input class="form-control" name="nama_agenda" data-error="Please enter nama field." id="inputnama_agenda" placeholder="nama_agenda" type="text" required value="<?= $data['nama_agenda'] ?>"/>
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputpengirim">Pengirim</label>
						<input class="form-control" name="pengirim" data-error="Please enter pengirim field." id="inputpengirim" placeholder="pengirim" type="text" required value="<?= $data['pengirim'] ?>"/>
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputtempat">Tempat</label>
						<input class="form-control" name="tempat" data-error="Please enter tempat field." id="inputtempat" placeholder="tempat" type="text" required value="<?= $data['tempat'] ?>"/>
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputwaktu">Waktu</label>
						<input class="form-control" name="waktu" data-error="Please enter waktu field." id="inputwaktu" placeholder="waktu" type="text" required value="<?= $data['waktu'] ?>"/>
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputtanggal_mulai">Tanggal Mulai</label>
						<input class="form-control" name="tanggal_mulai" data-error="Please enter tanggal_mulai field." id="inputtanggal_mulai" placeholder="tanggal_mulai" type="text" required value="<?= $data['tanggal_mulai'] ?>"/>
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputtanggal_selesai">Tanggal Selesai</label>
						<input class="form-control" name="tanggal_selesai" data-error="Please enter tanggal_selesai field." id="inputtanggal_selesai" placeholder="tanggal_selesai" type="text" required value="<?= $data['tanggal_selesai'] ?>"/>
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<input type="submit" value="Simpan Data" name="edit" class="btn btn-sm btn-ptimary" />

						<button class="btn btn-warning" type="Reset"> Reset </button>
					</div>
					<div class="text-left">
						<a href="agenda.php" data-toggle="tooltip" class="tip-bottom" data-original-tittle="Tooltip Dibawah"> View all data agenda <i class="fa fa-arrow-circle-left"></i></a>
					</div>

				</form>
					</div>
				</div>
			</div>
<?php } ?>
</body>