<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="style_sidebarrr.css">
	<link rel="stylesheet" href="./bootstrap-5.3.0-dist/css/bootstrap.min.css">
</head>
<body >
    <?php
    include "sidebar.php";
    ?>

<!-- Page content -->
<div style="margin-top: 5%; margin-left:30%;margin-right: 20%; padding:1px 16px;height:1000px;">
	<form action="proses-jabatan.php" method="post">
		
		<h1>Tambah Jabatan </h1>
		<div class="mb-3">
			<label for="form-nama" class="form-label">Nama Jabatan</label>
			<input type="text" class="form-control" id="form-nama" name="nama_jabatan" placeholder="Masukkan Nama Jabatan">
			<br>
        <div class="d-grid gap-2">
          <button class="btn btn-primary" type="submit" name="simpan" value="Simpan">Tambah</button>
        </div>


		</div>
	</form>

	</div>




</body>
</html>