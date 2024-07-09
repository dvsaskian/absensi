<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ABSEN DV'ABSENSI</title>
	<link rel="stylesheet" type="text/css" href="style_sidebar.css">
	<link rel="stylesheet" href="./bootstrap-5.3.0-dist/css/bootstrap.min.css">
</head>
<body>


<?php
	
	include "sidebar.php";
	include "connection.php";


		if(isset($_POST['cari'])){
			$cari_menu=$_POST['tcari'];
			$sql= "SELECT * FROM `absensi` 
					JOIN `jabatan` ON `absensi`.id_jabatan=`jabatan`.id_jabatan 
					JOIN karyawan ON `absensi`.id_kyn=karyawan.id_kyn 
					where id_absensi like '%$cari_menu%'
					or nama like '%$cari_menu%' 
					or nama_jabatan like '%$cari_menu%' 
					or waktu_masuk like '%$cari_menu%' 
					or tanggal like '%$cari_menu%'  
					or nama like '%$cari_menu%'   
					or keterangan like '%$cari_menu%'  order by absensi.id_absensi asc"; 
		 }else{
			$sql= "SELECT * FROM `absensi` 
					JOIN `jabatan` ON `absensi`.id_jabatan=`jabatan`.id_jabatan 
					JOIN karyawan ON `absensi`.id_kyn=karyawan.id_kyn order by id_absensi asc"; 
			
		 }

	$jadwalQuery = "SELECT * FROM jadwal";
	$jadwal = mysqli_query($conn, $jadwalQuery);
	$jadwal = mysqli_fetch_assoc($jadwal);
 
	$absensi = mysqli_query($conn, $sql);

	$deviBg= array("hadir"=>"primary", "izin"=>"secondary", "sakit"=>"warning" );

	?> 

	<br>

	<br>

<!-- Page content -->
<div style="margin-top: 4%; margin-left:25%;margin-right: 20%; padding:1px 16px;height:1000px;">

	<h2>Data Absensi</h2>
		<a href="absensi.php">
        <button type="button" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-plus-fill" viewBox="0 0 16 16">
		<path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5V8z"/>
		</svg> Form Absensi</button>
    </a> <br>
    <br>

	<nav class="navbar bg-body-light" style="width: 900px; ">
	<div class="container-fluid">
	
		<a class="navbar-brand"></a>
		<form class="d-flex" role="search" method="post">
		<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="tcari">
		<button class="btn btn-outline-success" type="submit"  name="cari">Search</button>
		<button class="btn btn-outline-danger" type="submit" name="reset">Reset</button>
		</form>
	</div>
	</nav>
	<table class=" table table-bordered table-striped table-hover" style="margin-left:0%; padding:1px 16px; width: 950px; ">
		
		<thead align="center">
		<tr>
			<th  style="background-color: #111; color : #2293df; ">No Absen</th>
			<th  style="background-color: #111; color : #2293df; ">ID Karyawan</th>
			<th  style="background-color: #111; color : #2293df; ">Jabatan</th>
			<th  style="background-color: #111; color : #2293df; ">Waktu Datang</th>
			<th  style="background-color: #111; color : #2293df; ">Tanggal</th>
            <th  style="background-color: #111; color : #2293df; ">Keterangan</th>
			<th  style="background-color: #111; color : #2293df; ">Info</th>
		</tr>
		</thead>

		<tbody>

		<?php
		 foreach ($absensi as $row) :
		if ($row['waktu_masuk'] >= $jadwal['jd_masuk_awal'] && $row['waktu_masuk'] <=$jadwal['jd_masuk_akhir'] && $row['keterangan'] === "hadir" ) {
			$info = "<div class='badge text-bg-success'> Anda tepat waktu  </div>";
		} 
		else {
			$info = "<div class='badge text-bg-danger'> Anda terlambat </div>";
		}

		if($row['keterangan'] === 'izin' || $row['keterangan'] === 'sakit') {
			$info = "<div class='badge text-bg-info'>".$row['keterangan']."</div>";	
			$row['waktu_masuk'] = "-";
		}
		 ?>
			<tr>
			<td align="center"><?= $row['id_absensi']; ?></td>
			<td align="center"><?= $row['nama']?></td>
			<td align="center"><?= $row['nama_jabatan']?></td>
			<td align="center"><?= $row['waktu_masuk']?></td>
			<td align="center"><?= $row['tanggal']?></td>
			<td align="center"><?= $row['keterangan']?></div></td>
			<td align="center"><?= $info?></td>
			
		</tr>
		<?php endforeach; ?>
		</tbody>
		
	</table>
	
	<br><br>
	


</div>
</body>
</html>

