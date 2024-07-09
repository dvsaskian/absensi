<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TAMBAH USER DV'ABSENSI</title>
    <link rel="stylesheet" type="text/css" href="style_sidebarrr.css">
    <link rel="stylesheet" href="./bootstrap-5.3.0-dist/css/bootstrap.min.css">
</head>
<body >
    <?php
    include "sidebar.php";
    ?>


<!-- Page content -->
<div style="margin-top: 5%; margin-left:30%;margin-right: 20%; padding:1px 16px;height:1000px;">
    <form action="proses-user.php" method="post">
        
        <h1>Tambah User </h1>
        <div class="mb-3">
            <label for="form-nama" class="form-label">Nama User</label>
            <input type="text" class="form-control" id="form-nama" name="nama_user" placeholder="Masukkan Nama User">
            <label for="form-username" class="form-label">Username</label>
            <input type="text" class="form-control" id="form-username" name="username" placeholder="Masukkan Username">
            <label for="form-password" class="form-label">Password</label>
            <input type="password" class="form-control" id="form-pass" name="password" placeholder="Masukkan Password">
           

            <label for="select-role" class="select-label">Role</label>
         
            <select name = "role"  class="form-control" id="form-role" required>
                <option value="">Pilih Role Anda</option>
                <?php
                include "connection.php";
                $devi_sql = "SELECT id_role, nama_role FROM role";
                $result = mysqli_query($conn, $devi_sql);
                ?>
                <?php
                while ($row = mysqli_fetch_array($result)) {
                    echo "<option value='{$row['id_role']}'>{$row['nama_role']} </option>";
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