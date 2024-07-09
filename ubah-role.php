<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>UBAH ROLE DV'ABSENSI</title>
	<link rel="stylesheet" type="text/css" href="style_sidebarrr.css">
	<link rel="stylesheet" href="./bootstrap-5.3.0-dist/css/bootstrap.min.css">
</head>
<body>
    <?php
    include "sidebar.php";
    ?>

<!-- Page content -->
<div style="margin-top: 5%; margin-left:30%; margin-right: 20%; padding:1px 16px;height:1000px;">
		
		<h1>Ubah Role </h1>
		<?php 

		include 'connection.php';

			$id = $_GET['id'];

			$result = mysqli_query($conn, "SELECT * FROM role WHERE id_role=$id");

			while ($role_data = mysqli_fetch_array($result)){
			$nama_role = $role_data['nama_role'];
			$id_role = $role_data['id_role'];
		}
		?>

		<form action="proses-role.php" method="post">
		<input type="hidden" name="id_role" value="<?=$id_role?>">
		<div class="mb-3">
			<label for="form-nama" class="form-label">Nama Role</label>
			<input type="text" class="form-control" id="form-nama" name="nama_role" placeholder="Masukkan Nama Role" value="<?=$nama_role?>">
			<br>
		</div>
		<div class="d-grid gap-2">
          	<button class="btn btn-warning"  type="submit" name="ubah" value="Ubah">Ubah</button>
        </div>
	</form>
		

	</div>




</body>
</html>