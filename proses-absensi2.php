<?php

include 'connection.php';

if (isset($_POST['simpan'])) {
    $devi_karyawan = $_POST['id_nama'];
    $devi_jabatan  = $_POST['jabatan'];
    $devi_keterangan = $_POST['keterangan'];
    $devi_waktu_datang = $_POST['waktu_masuk'];
    $devi_tanggal_absen = $_POST['tanggal'];

    $sql = "INSERT INTO `absensi`  
            VALUES ( NULL, '$devi_karyawan', '$devi_jabatan', '$devi_keterangan', '$devi_waktu_datang', '$devi_tanggal_absen')";
     $query = mysqli_query($conn, $sql);
    



    if ($query) {
        echo "
            <script> 
            alert ('Terima kasih Telah Mengisi Absen');
            window.location.href='master-absensi.php';
            </script>
        ";
    } else {
        echo "
            <script> 
            alert ('Data Absen Gagal di Tambah');
            window.location.href='master-absensi.php';
            </script>
        ";
    }
 }

        // Close connection
        mysqli_close($conn);
        ?>