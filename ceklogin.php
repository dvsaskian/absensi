<?php
	
	session_start();

	include "connection.php";

	if (isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = md5($_POST['password']);

		$query = mysqli_query($conn, "SELECT * FROM `users` 
										WHERE username='$username' 
										and password='$password'");

		$count = mysqli_num_rows($query);

		if ($count > 0) {
			$login = mysqli_fetch_array($query);

			$_SESSION['id_user'] 	= $login['id_user'];
			$_SESSION['username']	= $login['username'];
			$_SESSION['id_role']	= $login['id_role'];
			$_SESSION['nama_user']	= $login['nama_user'];
			$_SESSION['status'] 	= 'login';


			if ($login['id_role'] == 1) {
				header("location:home2.php");
			} 
			elseif ($login['id_role'] == 2) {
				header("location:absensi.php");
			}
			

		} else {
			header("location:index.php?pesan=gagal");

		}


	}


?>
