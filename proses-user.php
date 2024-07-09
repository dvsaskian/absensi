<?php

		include 'connection.php';

		if (isset($_POST['simpan'])) {
			$devi_id_role = $_POST['role'];
			$devi_nama_user = $_POST['nama_user'];
			$devi_username= $_POST['username'];
			$pass_devi = $_POST['password'];
			$devi_password = md5($_POST['password']);


			$sql = "INSERT INTO users VALUES (NULL, '$devi_id_role', '$devi_username', '$devi_password', '$devi_nama_user')";
			$query = mysqli_query($conn, $sql);


			if ($query) {
					echo "
							<script> 
							alert ('Data User Berhasil di Tambah');
							window.location.href='master-user.php';
							</script>
						";
				} else {
					echo "
							<script> 
							alert ('Data User Gagal di Tambah');
							window.location.href='tambah-user.php';
							</script>
							";

				}
		} else if (isset($_POST['ubah'])) {
				$devi_id         = $_POST['userid'];
			    $devi_nama       = $_POST['nama_user'];
			    $devi_username   = $_POST['username'];
			    $devi_password = md5($_POST['password']);
			    $devi_role       = $_POST['role'];


			    $devi_result     = mysqli_query($conn, "UPDATE `users` 
			    									SET `nama_user` = '$devi_nama' , 
			    									`username` = '$devi_username' , 
			    									`password` = '$devi_password' , 
			    									`id_role` = '$devi_role'
			    									 WHERE `id_user` = $devi_id;");



			if ($devi_result) {
					echo "
							<script> 
							alert ('Data User Berhasil di Ubah');
							window.location.href='master-user.php';
							</script>
						";
				} else {
					echo "
							<script> 
							alert ('Data User Gagal di Ubah');
							window.location.href='ubah-user.php';
							</script>
							";

				}

		}


?>