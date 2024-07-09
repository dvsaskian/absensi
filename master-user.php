<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>USER DV'ABSENSI</title>
	<link rel="stylesheet" type="text/css" href="style_sidebarrr.css">
	<link rel="stylesheet" href="./bootstrap-5.3.0-dist/css/bootstrap.min.css">
</head>
<body>

<!-- Page content -->
<div class="main" style="margin-top: 5%; margin-left:30%; padding:1px 16px;height:1000px;">
	

	<?php
	
	include "sidebar.php";
	include "connection.php";

	$sql = "SELECT * FROM users JOIN role ON users.id_role=role.id_role;";
	if (isset($_POST['cari'])) {
		$search = $_POST['search'];  
		$id_user = $_POST['role'];

		
		if ($id_user != "") {
			$sql = "SELECT *
						FROM users JOIN role ON users.id_role=role.id_role 
						WHERE users.nama_user LIKE '%$search%'
						AND users.id_role=$id_user;";
			} else {
			$sql = "SELECT *
						FROM users JOIN role ON users.id_role=role.id_role  
						WHERE users.nama_user LIKE '%$search%';";
			}

		
		} else {
			$sql = "SELECT *
						FROM users JOIN role ON users.id_role=role.id_role ;";
		}

		$users = mysqli_query($conn, $sql);


	?> 

	<br>

	<h2>Data User</h2>
		<a href="tambah-user.php">
        <button type="button" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
        <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z"/>
        </svg> Tambah Data User</button>
    </a> <br>
    <br>

	<nav class="navbar bg-body-light" style="width: 800px; ">
	<div class="container-fluid">
		<a class="navbar-brand"></a>
		<form class="d-flex" role="search" method="post">
		<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">

		<select name = "role"  class="form-control" id="form-role">
		<option value="">ALL</option>
				
				<?php
                include "connection.php";
                $devi_sql = "SELECT id_role, nama_role FROM role";
                $devi_roles = mysqli_query($conn, $devi_sql);
                ?>

				
                <?php
                foreach ($devi_roles as $devi_role) {
                    echo "<option value= ' ". $devi_role['id_role']." ' >" . $devi_role['nama_role']. 
                          "</option>";
                    }
        ?> 
            </select>

		<button class="btn btn-outline-success" type="submit"  name="cari">Search</button>
		<button class="btn btn-outline-danger" type="submit" name="reset">Reset</button>
		</form>
	</div>
	</nav>
	<table class=" table table-bordered table-striped table-hover" style="margin-left:0%; padding:1px 16px; width: 800px; ">
		
		<thead align="center">
		<tr>
			<th style="background-color: #2293df; color: #111;">ID User</th>
			<th style="background-color: #2293df; color: #111;">Nama User</th>
			<th style="background-color: #2293df; color: #111;">Username</th>
			<th style="background-color: #2293df; color: #111;">Role</th>
			<th style="background-color: #2293df; color: #111;">Aksi</th>
		</tr>
		</thead>

		<tbody>
		
		<?php foreach ($users as $row) : ?>
			<tr>
			<td align="center"><?php echo $row['id_user']; ?></td>
			<td align="center"><?= $row['nama_user']?></td>
			<td align="center"><?= $row['username']?></td>
			<td align="center"><?= $row['nama_role']?></td>
			<td align="center">
				<a href="ubah-user.php?id=<?=$row['id_user']?>" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
				  <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
				</svg> Edit</a> 
				<a href="hapus-user.php?id=<?=$row['id_user']?>"  class="btn btn-danger">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
				  <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
				</svg>Hapus</a>
			</td>
		</tr>
		<?php endforeach; ?>
		</tbody>
		
	</table>
	
	<br><br>


</div>
</body>
</html>

