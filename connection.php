<?php 
	
	$host = "localhost";
	$username = "root";
	$password = "";
	$database = "devi_absen2";

	$conn = mysqli_connect($host, $username, $password, $database);

	if ($conn->connect_error) {
		echo "Gagal koneksi ke database";
	} else {
		// echo "Koneksi Berhasil";
	}

 ?>