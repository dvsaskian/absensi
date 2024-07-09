<?php

		include 'connection.php';

		if (isset($_POST['simpan'])) {
			$nama = $_POST['nama_jabatan'];


			$sql = "INSERT INTO jabatan VALUES (NULL, '$nama')";
			$query = mysqli_query($conn, $sql);


			if ($query) {
					echo "
							<script> 
							alert ('Data Jabatan Berhasil di Simpan');
							window.location.href='master-jabatan.php';
							</script>
						";
				} else {
					echo "
							<script> 
							alert ('Data Jabatan Gagal di Simpan');
							window.location.href='tambah-jabatan.php';
							</script>
							";

				}
		} else if (isset($_POST['ubah'])) {
			$id_jabatan = $_POST['id_jabatan'];
			$nama = $_POST['nama_jabatan'];

			$result = mysqli_query($conn, "UPDATE jabatan 
											SET nama_jabatan='$nama' 
											WHERE id_jabatan=$id_jabatan");



			if ($result) {
					echo "
							<script> 
							alert ('Data Jabatan Berhasil di Ubah');
							window.location.href='master-jabatan.php';
							</script>
						";
				} else {
					echo "
							<script> 
							alert ('Data Jabatan Gagal di Ubah');
							window.location.href='master-jabatan.php';
							</script>
							";

		}
		}







?>