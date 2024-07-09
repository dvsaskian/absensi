<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>UBAH USER DV'ABSENSI</title>
	<link rel="stylesheet" type="text/css" href="style_sidebarrr.css">
	<link rel="stylesheet" href="./bootstrap-5.3.0-dist/css/bootstrap.min.css">
</head>
<body>
    <?php
    include "sidebar.php";
    ?>


		<?php 

		include 'connection.php';

			$id = $_GET['id'];

			$result = mysqli_query($conn, "SELECT * FROM users WHERE id_user=$id");

			while ($user_data = mysqli_fetch_array($result)){

		        $id_user         = $user_data['id_user'];
		        $devi_nama       = $user_data['nama_user'];
		        $devi_usn        = $user_data['username'];
		        $devi_password   = $user_data['password'];
                

		}
		?>

		<!-- Page content -->
		<div class="Admin">
		<div style="margin-top: 5%; margin-left:30%; margin-right: 20%; padding:1px 16px;height:1000px;">


		<h1>Ubah User </h1>

            <br>

            <form action="proses-user.php" method="POST">
            <input type="hidden" name="userid" value="<?=$id_user?>">
                <label for="nama_user">Nama User</label><br>
                <input type="text" class="form-control" id="form-nama" name="nama_user"  placeholder=" Masukkan Nama User" value="<?=$devi_nama?>"><br>

                <label for="username">Username</label><br>
                <input type="text" class="form-control" id="form-username" name="username" placeholder=" Masukkan Username" value="<?=$devi_usn?>"><br>

                <label for="password">Password</label><br>
                <input type="password" class="form-control" id="form-pass" name="password" placeholder="Masukkan Password" value="<?=$devi_password?>"><br>

                <label for="role">Role</label><br>
                <select name = "role"  class="form-control" id="form-role" value="<?=$devi_password?>" required>
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
            </select><br><br>

                <div class="d-grid gap-2">
          		<button class="btn btn-warning"  type="submit" name="ubah" value="Ubah">Ubah</button>
        		</div>
            </form>
        </div>
    </div>




<script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>