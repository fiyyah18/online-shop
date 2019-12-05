<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Input Form</title>
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
</head>
<?php 


// saat tombol simpan ditekan makan query akan di laksankan
if(isset($_POST["btnSimpan"])){
	include "koneksi/koneksi.php";

  $nis      = $_POST["nis"];
  $nama     = $_POST["nama"];
  $tempat   = $_POST["tempat"];
  $tanggal  = $_POST["tanggal"];
  $jenis    = $_POST["jenis"];
  $telpon   = $_POST["telpon"]; 
  $alamat   = $_POST["alamat"]; 


 //menginput pengguna
  $sql = mysqli_query($koneksi,"insert into siswa values('$nis','$nama','$tempat','$tanggal','$jenis','$telpon'
  ,'$alamat')");

      if (!$sql) {
       die('Query Gagal : '.mysqli_errno($koneksi). 
       ' - '.mysqli_error($koneksi));
      }else{
        ?>
        <div class="alert alert-info fade in">
        <button data-dismiss="alert" class="close" type="button">&times;</button>
        <center><strong>Sukses !</strong> Data berhasil disimpan.</center>
        </div>
        <?php
        
      }
}
?>
<body>
  <?php include "header.php"; ?>
	<br>
        <div class="container">
            <div class="panel panel-primary" style="width:750px;margin:0px auto">
              <div class="panel-heading">Form Input Siswa</div>
              <div class="panel-body">
			  <form method="post" enctype="multipart/form-data" data-toggle="validator" role="form">

                  <div class="form-group">
                      <label class="control-label" for="inputnis">NIS</label>
                      <input class="form-control" name="nis" data-error="Please enter nis field." id="inputnis" placeholder="Nis"  type="text" required />
                      <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                      <label class="control-label" for="inputnama">Nama</label>
                      <input class="form-control" data-error="Please enter nama field." id="inputnama" placeholder="Nama" name="nama" type="text" required />
                      <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                      <label class="control-label" for="inputlahir">Tempat Lahir</label>
                      <input class="form-control" name="tempat" data-error="Please enter lahir field." id="inputlahir" placeholder="Tempat Lahir" type="text"  required />
                       <input class="form-control" data-error="Please enter tanggal field." id="inputtanggal" placeholder="tanggal"  type="date" name="tanggal" required />
                      <div class="help-block with-errors"></div>
                  </div>
			
				  <div class="form-group">
					<label for="jenis">Jenis Kelamin</label></td>
		            <select name="jenis" class="form-control"> 
		             <option value="#">-- Jenis Kelamin --</option> 
		             <option value="laki-laki">Laki-Laki</option>  
		             <option value="perempuan">Perempuan</option>  
		             </select>
		             <div class="help-block with-errors"></div>
		                  </div>

                  <div class="form-group">
                    <label for="inputtelpon" class="control-label">Telpon</label>
                    <input type="tel" name="telpon" class="form-control" id="inputtelpon" placeholder="Telpon" required>
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                      <label class="control-label" for="inputAlamat">Alamat</label>
                      <textarea class="form-control" data-error="Please enter Alamat field." id="inputAlamat" placeholder="Alamat" name="alamat" required=""></textarea>
                      <div class="help-block with-errors"></div>
                  </div>


                  <div class="form-group">
                     <input type="submit" value="Simpan Data" name="btnSimpan"  class="btn btn-sm btn-primary"/>

                       <button class="btn btn-warning" type="Reset">
                          Reset
                      </button>
                  </div>
                 <div class="text-left">
                  <a href="dashboard.php"  data-toggle="tooltip" class="tip-bottom" data-original-title="Tooltip Dibawah">View All Data Siswa <i class="fa fa-arrow-circle-left"></i></a>
                </div>
                </form>
              </div>
            </div>
        </div>
</body>
</html>