<?php

include 'connection.php';

$id = $_GET['id'];
$sql = "DELETE FROM karyawan WHERE id_kyn=$id";
$hapus = mysqli_query($conn, $sql);

if ($hapus) {
			echo "
					<script> 
					alert ('Data Karyawan Berhasil di Hapus');
					window.location.href='master-karyawan.php';
					</script>
				";
		} else {
			echo "
					<script> 
					alert ('Data Karyawan Gagal di Hapus');
					window.location.href='master-jkaryawan.php';
					</script>
					";

		}




?>