<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TAMBAH karyawan DV'ABSENSI</title>
    <link rel="stylesheet" type="text/css" href="style_sidebarrr.css">
    <link rel="stylesheet" href="./bootstrap-5.3.0-dist/css/bootstrap.min.css">
</head>
<body>
    <?php
    include "sidebar.php";
    include 'connection.php';
    ?>


<!-- Page content -->
<div style="margin-top: 5%; margin-left:30%;margin-right: 20%; padding:1px 16px;height:1000px;">
    <form action="proses-karyawan.php" method="post">
        
        <h1>Tambah karyawan </h1>
        <div class="mb-3">
            <label for="form-nama" class="form-label">Nama karyawan</label>
            <input type="text" class="form-control" id="form-nama" name="nama" placeholder="Masukkan Nama karyawan" required>
            <label for="select-jk" class="select-label">Jenis Kelamin</label>
            <select name = "jk"  class="form-control" id="form-jk" required>
                <option value = "Laki-laki"> Laki-laki </option>
                <option value = "Perempuan"> Perempuan </option>
            </select>

            <label for="form-ttl" class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control" id="form-ttl" name="tmp_lhr" placeholder="Masukkan Tempat Lahir karyawan" required>
            <label for="form-ttl" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="form-ttl" name="tgl_lhr" placeholder="Masukkan Tanggal Lahir karyawan" required>

            <label for="form-foto" class="form-label">Foto Karyawan</label>
            <input type="file" class="form-control" id="form-foto" name="foto" placeholder="Masukkan foto">
            <label for="form-harga_menu" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="form-alamat" name="alamat" placeholder="Masukkan Alamat karyawan" required>
            <label for="form-harga_menu" class="form-label">Email</label>
            <input type="text" class="form-control" id="form-email" name="email" placeholder="Masukkan Email karyawan" required>
            
            <label for="form-harga_menu" class="form-label">No Telepon</label>
            <input type="number" class="form-control" id="form-harga_menu" name="no_hp" placeholder="Masukkan No Telepon karyawan" required>
            
            
            <label for="select-jabatan" class="select-label">Jabatan Karyawan</label>
         
            <?php
            include 'connection.php';
                $devi_sql = "SELECT * FROM jabatan";
                $devi_js = mysqli_query($conn, $devi_sql);
                ?>
                
                <select class="form-control" id="form-jabatan" name="jabatan" required >
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
          <button class="btn btn-primary" type="submit" name="simpan" value="Simpan">Tambah</button>
        </div>

        
        </div>
    </form>

    </div>




</body>
</html>