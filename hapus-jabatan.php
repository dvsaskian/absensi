<?php

include 'connection.php';

$id = $_GET['id'];
$sql = "DELETE FROM jabatan WHERE id_jabatan=$id";
$hapus = mysqli_query($conn, $sql);

if ($hapus) {
			echo "
					<script> 
					alert ('Bagian Jabatan Berhasil di Hapus');
					window.location.href='master-jabatan.php';
					</script>
				";
		} else {
			echo "
					<script> 
					alert ('Bagian Jabatan Gagal di Hapus');
					window.location.href='master-jabatan.php';
					</script>
					";

		}




?>