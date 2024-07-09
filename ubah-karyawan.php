<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>UBAH karyawan DV'ABSENSI</title>
	<link rel="stylesheet" type="text/css" href="style_sidebarrr.css">
	<link rel="stylesheet" href="./bootstrap-5.3.0-dist/css/bootstrap.min.css">
</head>
<body>
    <?php
    include "sidebar.php";
    ?>


		<?php 
        	include "connection.php";
            
            $id = $_GET['id'];
            
            $devi_result = mysqli_query($conn, "SELECT * FROM karyawan WHERE id_kyn=$id");

        
            while($karyawan_data  = mysqli_fetch_array($devi_result)){
                $id_karyawan            = $karyawan_data['id_kyn'];
                $devi_nama_karyawan     = $karyawan_data['nama'];
                $devi_jabatan_karyawan  = $karyawan_data['id_jabatan'];
                $devi_email_karyawan    = $karyawan_data['email'];
                $devi_alamat_karyawan   = $karyawan_data['alamat'];
                $devi_no_tlp            = $karyawan_data['no_hp'];
                $devi_jk                = $karyawan_data['jk'];
                $devi_tempat_lahir      = $karyawan_data['tmp_lhr'];
                $devi_tanggal_lahir     = $karyawan_data['tgl_lhr'];
        
            }


		?>

    <!-- Page content -->
    <div style="margin-top: 5%; margin-left:30%;margin-right: 20%; padding:1px 16px;height:1000px;">
    <form action="proses-karyawan.php" method="post">
        
        <h1>Ubah karyawan </h1>
        <div class="mb-3">
            <input type="hidden" name="id_kyn" value="<?=$id_karyawan?>">
            <label for="form-nama" class="form-label">Nama karyawan</label>
            <input type="text" class="form-control" id="form-nama" name="nama" placeholder="Masukkan Nama karyawan" value="<?=$devi_nama_karyawan?>">
            <label for="form-harga_menu" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="form-alamat" name="alamat" placeholder="Masukkan Alamat karyawan" value="<?=$devi_alamat_karyawan?>">
            <label for="form-harga_menu" class="form-label">Email</label>
            <input type="text" class="form-control" id="form-email" name="email" placeholder="Masukkan Email karyawan" value="<?=$devi_email_karyawan?>" required>
            <label for="form-harga_menu" class="form-label">No Telepon</label>
            <input type="number" class="form-control" id="form-harga_menu" name="no_hp" placeholder="Masukkan No Telepon karyawan" value="<?=$devi_no_tlp?>">
            
            <label for="select-jk" class="select-label">Jenis Kelamin</label>
            <select name = "jk"  class="form-control" id="form-jk" value="<?=$devi_jk?> " required>
                <option value = ""> </option>
                <option value = "Laki-laki"> Laki-laki </option>
                <option value = "Perempuan"> Perempuan </option>
            </select>

            <label for="form-foto" class="form-label">Foto Karyawan</label>
            <input type="file" class="form-control" id="form-foto" name="foto" placeholder="Masukkan foto" value="<?=$devi_foto_karyawan?>" required>
            <label for="form-ttl" class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control" id="form-ttl" name="tmp_lhr" placeholder="Masukkan Tempat Lahir karyawan" value="<?=$devi_tempat_lahir?>">
            <label for="form-ttl" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="form-ttl" name="tgl_lhr" placeholder="Masukkan Tanggal Lahir karyawan" value="<?=$devi_tanggal_lahir?>">

            <label for="select-jenis" class="select-label">Jabatan karyawan</label>
            <option value = ""> </option>
            <?php
            include 'connection.php';
                $devi_sql = "SELECT * FROM jabatan";
                $devi_js = mysqli_query($conn, $devi_sql);
                ?>
                
                <select class="form-control" id="form-category" name="jabatan" value="<?=$devi_jabatan_karyawan?>" required >
                <option value="">Pilih Jabatan Anda</option>
                    <?php
                    foreach ($devi_js as $dvalue) {
                        echo "<option value= ' ". $dvalue['id_jabatan']." ' >" . $dvalue['nama_jabatan']. 
                            "</option>";
                        }
            ?> 
            </select>

            <br>

        <div class="d-grid gap-2">
          	<button class="btn btn-warning"  type="submit" name="ubah" value="Ubah">Ubah</button>
        </div>

        
        </div>
    </form>

    </div>