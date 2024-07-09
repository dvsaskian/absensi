<?php
include 'connection.php';

if (isset($_POST['simpan'])) {
    $devi_nama = $_POST['nama'];
    $devi_jenis_karyawan = $_POST['jabatan'];
    $devi_foto_karyawan = $_POST['foto'];
    $devi_tempat_lahir = $_POST['tmp_lhr'];
    $devi_tanggal_lahir = $_POST['tgl_lhr'];
    $devi_jk = $_POST['jk'];
    $devi_email_karyawan = $_POST['email'];
    $devi_no_hp = $_POST['no_hp'];
    $devi_alamat_karyawan = $_POST['alamat'];

    $sql = "INSERT INTO karyawan (nama, id_jabatan, foto, tmp_lhr, tgl_lhr, jk, email, no_hp, alamat) 
            VALUES ('$devi_nama', '$devi_jenis_karyawan', '$devi_foto_karyawan', '$devi_tempat_lahir', '$devi_tanggal_lahir', '$devi_jk', '$devi_email_karyawan', '$devi_no_hp', '$devi_alamat_karyawan')";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        echo "
            <script> 
            alert ('Data karyawan Berhasil di Tambah');
            window.location.href='master-karyawan.php';
            </script>
        ";
    } else {
        echo "
            <script> 
            alert ('Data karyawan Gagal di Tambah');
            window.location.href='tambah-karyawan.php';
            </script>
        ";
    }
} else if(isset($_POST['ubah'])) {
	$id_karyawan = $_POST['id_kyn'];
    $devi_nama = $_POST['nama'];
    $devi_jenis_karyawan = $_POST['jabatan'];
    $devi_foto_karyawan = $_POST['foto'];
    $devi_tempat_lahir = $_POST['tmp_lhr'];
    $devi_tanggal_lahir = $_POST['tgl_lhr'];
    $devi_jk = $_POST['jk'];
    $devi_email_karyawan = $_POST['email'];
    $devi_no_hp = $_POST['no_hp'];
    $devi_alamat_karyawan = $_POST['alamat'];

    $sql = "UPDATE karyawan 
            SET nama = '$devi_nama', 
                id_jabatan = '$devi_jenis_karyawan', 
                foto = '$devi_foto_karyawan', 
                tmp_lhr = '$devi_tempat_lahir', 
                tgl_lhr = '$devi_tanggal_lahir', 
                jk = '$devi_jk', 
                email = '$devi_email_karyawan', 
                no_hp = '$devi_no_hp', 
                alamat = '$devi_alamat_karyawan' 
            WHERE id_kyn = $id_karyawan";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        echo "
            <script>
            alert('Data karyawan Berhasil Di Ubah');
            window.location.href='master-karyawan.php';
            </script>
        ";
    } else {
        echo "
            <script>
            alert('Data karyawan Gagal Di Ubah');
            window.location.href='ubah-karyawan.php';
            </script>
        ";
    }
}
?>
