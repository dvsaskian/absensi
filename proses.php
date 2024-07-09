<?php
include 'connection.php';

if (isset($_POST['simpan'])) {
    $devi_karyawan = $_POST['id_nama'];
    $devi_jabatan  = $_POST['jabatan'];
    $devi_keterangan = $_POST['keterangan'];
    $devi_waktu_datang = $_POST['waktu_masuk'];
    $devi_tanggal_absen = $_POST['tanggal'];

    // Ambil j_masuk dari tabel lain (misalnya tabel `jadwal_kerja`)
    $query_jadwal = "SELECT jd_masuk FROM jadwal WHERE id_nama = '$devi_karyawan' AND jabatan = '$devi_jabatan'";
    $result_jadwal = mysqli_query($conn, $query_jadwal);

    if ($result_jadwal && mysqli_num_rows($result_jadwal) > 0) {
        $row_jadwal = mysqli_fetch_assoc($result_jadwal);
        $j_masuk = $row_jadwal['jd_masuk'];

        // Bandingkan waktu_masuk dengan j_masuk
        if ($devi_waktu_datang > $j_masuk) {
            $keterangan_terlambat = "Anda Terlambat";
        } else {
            $keterangan_terlambat = "";
        }

        // Insert data ke tabel absensi
        $sql = "INSERT INTO `absensi`  
                VALUES ( NULL, '$devi_karyawan', '$devi_jabatan', '$devi_keterangan', '$devi_waktu_datang', '$devi_tanggal_absen')";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            echo "
                <script> 
                alert ('Data Absen Berhasil di Tambah. $keterangan_terlambat');
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
    } else {
        echo "
            <script> 
            alert ('Data Jadwal Kerja tidak ditemukan');
            window.location.href='master-absensi.php';
            </script>
        ";
    }

    // Close connection
    mysqli_close($conn);
}
?>
