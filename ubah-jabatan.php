<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>UBAH Jabatan DV'CAFE</title>
	<link rel="stylesheet" type="text/css" href="style_sidebarrr.css">
	<link rel="stylesheet" href="./bootstrap-5.3.0-dist/css/bootstrap.min.css">
</head>
<body>
    <?php
    include "sidebar.php";
    ?>

<!-- Page content -->
<div style="margin-top: 5%; margin-left:30%; margin-right: 20%; padding:1px 16px;height:1000px;">
		
		<h1>Ubah Jabatan </h1>
		<?php 

		include 'connection.php';

			$id = $_GET['id'];

			$result = mysqli_query($conn, "SELECT * FROM jabatan WHERE id_jabatan=$id");

			while($Jabatan_data = mysqli_fetch_array($result)){
		    $nama_Jabatan = $Jabatan_data['nama_jabatan'];
		    $id_Jabatan = $Jabatan_data['id_jabatan'];
		}
		?>

		<form action="proses-category.php" method="post">
		<input type="hidden" name="id_Jabatan" value="<?=$id_Jabatan?>">
		<div class="mb-3">
			<label for="form-nama" class="form-label">Nama Jabatan</label>
			<input type="text" class="form-control" id="form-nama" name="nama_jabatan" placeholder="Masukkan Nama Jabatan" value="<?=$nama_Jabatan?>">
			<br>
		</div>
		<div class="d-grid gap-2">
          	<button class="btn btn-warning"  type="submit" name="ubah" value="Ubah">Ubah</button>
        </div>
	</form>
		

	</div>




</body>
</html>