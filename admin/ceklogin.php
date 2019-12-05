<?php
$error='';

include "../koneksi/koneksi.php";
if(isset($_POST['submit']))
{
	$username	= $_POST['username'];
	$password	= md5($_POST['password']);

	$query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
	//jika tidak ada data yang diisi
	if(mysqli_num_rows($query) == 0)
	{
		$error = "username or password is invalid";
	}
	else
	{
		//query yang dapat dijalankan jika data diisi
		$row = mysqli_fetch_assoc($query);
		$_SESSION['username']=$row['username'];
		$_SESSION['password']=$row['password'];
		$_SESSION['level']=$row['level'];

		header('Location: dashboard.php');
	}
}

?>