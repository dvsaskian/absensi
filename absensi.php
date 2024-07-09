<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Absen DV'ABSENSI</title>
    <link rel="stylesheet" type="text/css" href="style_sidebarrr.css">
    <link rel="stylesheet" href="./bootstrap-5.3.0-dist/css/bootstrap.min.css">
</head>
<body >
    
    <?php
    include 'sidebar.php';
    include 'connection.php';
    ?>


<!-- Page content -->
<div style="margin-top: 5%; margin-left:30%;margin-right: 20%; padding:1px 16px;height:1000px;">
    <form action="proses-absensi2.php" method="post">
        <br>
        <h1>Absensi </h1>
        <div class="mb-3">
            <label for="form-nama" class="form-label">Nama karyawan</label>
            <?php
            include 'connection.php';
                $devi_sql = "SELECT * FROM karyawan";
                $devi_js = mysqli_query($conn, $devi_sql);
                ?>
                
                <select class="form-control" id="form-nama" name="id_nama" required>
                    <option value="">Masukkan Nama Anda</option>
                    <?php
                    foreach ($devi_js as $dvalue) {
                        echo "<option value= ' ". $dvalue['id_kyn']." ' >" . $dvalue['nama']. 
                            "</option>";
                        }
            ?> 
            </select>
            

            <label for="select-jabatan" class="select-label">Jabatan Karyawan</label>
         
            <?php
            include 'connection.php';
                $devi_sql = "SELECT * FROM jabatan";
                $devi_js = mysqli_query($conn, $devi_sql);
                ?>
                
                <select class="form-control" id="form-category" name="jabatan" required >
                    <option value="">Masukkan Jabatan Anda</option>
                    <?php
                    foreach ($devi_js as $dvalue) {
                        echo "<option value= ' ". $dvalue['id_jabatan']." ' >" . $dvalue['nama_jabatan']. 
                            "</option>";
                        }
            ?> 
            </select>


            <label for="select-keterangan" class="select-label">Keterangan</label>

            <select class="form-control" id="form-keterangan" name="keterangan" onChange="myFunction(this.options[this.selectedIndex].value)" required>
                <option value="hadir">Hadir</option>
                <option value="izin">Izin</option>
                <option value="sakit">Sakit</option>
            </select>

            <!-- <div id="alasan">
                <label for="form-alasan" class="form-label">Alasan</label>
                <input type="text" class="form-control" id="form-alasan" name="alasan" placeholder="Dikarenakan (silahkan tulis alasannya) ">
            </div> -->

            <div id="form-waktu">
                <label for="waktu_masuk">Waktu Datang</label>
                <input type="time" class="form-control" id="waktu_masuk" name="waktu_masuk" required>

                <label for="form-tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="form-tanggal" name="tanggal" placeholder="Masukkan Tanggal" required>
            </div>
            <br>

        <div class="d-grid gap-2">
          <button class="btn btn-primary" type="submit" name="simpan" value="Simpan">Tambah</button>
        </div>

        
        </div>
    </form>

    </div>

    <script>
    // Ambil elemen input tanggal
    var inputTanggal = document.getElementById('form-tanggal');

    // Buat objek tanggal saat ini
    var tanggalSekarang = new Date();

    // Format tanggal untuk input HTML: YYYY-MM-DD
    var tahun = tanggalSekarang.getFullYear();
    var bulan = String(tanggalSekarang.getMonth() + 1).padStart(2, '0'); // +1 karena bulan dimulai dari 0
    var tanggal = String(tanggalSekarang.getDate()).padStart(2, '0');
    var tanggalHTML = tahun + '-' + bulan + '-' + tanggal;

    // Set nilai input tanggal
    inputTanggal.value = tanggalHTML;

    function myFunction(chosen) {
        console.log(chosen);
        var element = document.getElementById('form-waktu')
        var waktu_masuk = document.getElementById('waktu_masuk')
        var form_tanggal = document.getElementById('form-tanggal')
        var form_alasan = document.getElementById('form-alasan')
        console.log(element);

        if (chosen === 'izin' || chosen === 'sakit') {
            element.classList.add("d-none");
            waktu_masuk.removeAttribute('required')
            form_tanggal.removeAttribute('required')
            form_alasan.setAttribute('required', 'required')

        } else {
            element.classList.remove("d-none");
            form_alasan.removeAttribute('required')
            waktu_masuk.setAttribute('required', 'required')
            form_tanggal.setAttribute('required', 'required')
        }
    }


    // function myFunction(chosen) {
    //     var element = document.getElementById('alasan');
    //     var formAlasan = document.getElementById('form-alasan');

    //     if (chosen === 'izin' || chosen === 'sakit') {
    //         element.classList.remove('d-none'); // Tampilkan kolom alasan
    //         formAlasan.setAttribute('required', 'required'); // Tambahkan atribut required pada alasan
    //     } else {
    //         element.classList.add('d-none'); // Sembunyikan kolom alasan
    //         formAlasan.removeAttribute('required'); // Hapus atribut required dari alasan
    //     }
    // }


    
</script>



</body>
</html>