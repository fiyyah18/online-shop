<?php
error_reporting(0);
include "../koneksi/koneksi.php";
include "header.php";
?>
<?php
$kode =$_GET['id'];
$sql =mysqli_query($koneksi,"SELECT*FROM user WHERE id ='$kode'") or die(mysqli_error ($koneksi));
while($data =mysqli_fetch_array($sql)){
?>

	<br>
			<div class="container">
				<div class="panel panel-primary" style="width: 750px;margin:0px auto">
					<div class="panel-heading">Edit Pengguna</div>
					<div class="panel-body">
				<form method="POST" enctype="multipart/form-data" data-toggle="validator" role="form" action="act_pengguna.php?id=<?= $kode ?>">
					
					<div class="form-group">
						<label class="control-label" for="inputid">ID</label>
						<input class="form-control" name="id" data-error="Please enter id field." id="inputid" placeholder="Id" type="text" required value="<?= $data['id'] ?>" />
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputnama">Nama</label>
						<input class="form-control" name="nama" data-error="Please enter nama field." id="inputnama" placeholder="nama" type="text" required value="<?= $data['nama'] ?>"/>
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputusername">Username</label>
						<input class="form-control" name="username" data-error="Please enter username field." id="inputusername" placeholder="username" type="text" required value="<?= $data['username'] ?>"/>
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputpassword">Password</label>
						<input class="form-control" name="password" data-error="Please enter password field." id="inputpassword" placeholder="password" type="text" required value="<?= md5($data['password']) ?>"/>
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputemail">Email</label>
						<input class="form-control" name="email" data-error="Please enter email field." id="inputemail" placeholder="email" type="text" required value="<?= $data['email'] ?>"/>
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputno_telp">No_telp</label>
						<input class="form-control" name="no_telp" data-error="Please enter no_telp field." id="inputno_telp" placeholder="no_telp" type="text" required value="<?= $data['no_telp'] ?>"/>
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<label class="control-label" for="inputlevel">Level</label>
						 <select name="level" value="<?= $data['level'] ?>" class="form-control">
  						 <option value="admin">Admin</option>
						 <option value="penulis">Penulis</option>
    				 	 <option value="pengguna">Pengguna</option>
 						 </select>
						<div class="help-block with-errors"></div>
					</div>

					<div class="form-group">
						<input type="submit" value="Simpan Data" name="edit" class="btn btn-sm btn-ptimary" />

						<button class="btn btn-warning" type="Reset"> Reset </button>
					</div>
					<div class="text-left">
						<a href="pengguna.php" data-toggle="tooltip" class="tip-bottom" data-original-tittle="Tooltip Dibawah"> View all data pengguna <i class="fa fa-arrow-circle-left"></i></a>
					</div>

				</form>
					</div>
				</div>
			</div>
<?php } ?>
</body>