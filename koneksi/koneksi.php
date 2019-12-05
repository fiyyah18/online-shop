<?php
//nama host server kita
$db_host = "localhost";
//nama user di database kita
$db_user = "root";
// password database
$db_pass = "";
// nama database
$db_name = "artikel";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if(mysqli_connect_errno()){
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}
?>