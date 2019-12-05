<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>  
    <div class="container" style="background-color: aqua; width: 100%;">
    	<div id="header">
  <h1 align="center">Bina Mandiri</h1>  
  </div></div>
<nav class="navbar navbar-inverse">  
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="dashboard.php">Bina Mandiri</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="dashboard.php">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Siswa <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Guru</a></li>
          <li><a href="#">Matapelajaran</a></li>
          <li><a href="#">Admin</a></li>
        </ul>
      </li>
      <li><a href="#">Matapelajaran</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php" onclick="return confirm('Apakah anda akan keluar?');"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
 </div> 
</body>
</html>
