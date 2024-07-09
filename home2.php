<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="style_sidebarrr.css">
	<link rel="stylesheet" href="./bootstrap-5.3.0-dist/css/bootstrap.min.css">
</head>
<body class="bg-dark text-light">


<?php

    include 'connection.php';
    include "sidebar.php";
 
?>

    <div style="margin-left:20%; margin-top: 250px; padding:1px 16px;height:1000px;">
        <h1 align="center"><strong>Selamat Datang <?=$_SESSION['nama_user']?></strong></h1>
        <h1 align="center"><strong>Di Web D'ABSEN<strong></h1>

    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>

