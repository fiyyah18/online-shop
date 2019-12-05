<?php

$error=''; 

include "koneksi/koneksi.php";
if(isset($_POST['submit']))
{               
    $username   = $_POST['username'];
    $password   = $_POST['password']; 
                    
    $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
    if(mysqli_num_rows($query) == 0)
    {
        $error = "Username or Password is invalid";
    }
    else
    {
        $row = mysqli_fetch_assoc($query);
        $_SESSION['username']=$row['username'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['jeniskelamin'] = $row['jeniskelamin'];
        
        header('Location: dashboard.php');
    }
}
            
?>