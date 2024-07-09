<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="style_sidebarrr.css">
    <link rel="stylesheet" href="./bootstrap-5.3.0-dist/css/bootstrap.min.css">
    <title>Login</title>
</head>
<body class="bg-dark d-flex align-items-center justify-content-center" style="height: 100vh; background-color: #2293df;">
  
<?php
    session_start();

    include 'connection.php';

    if (isset($_SESSION['status']) && $_SESSION['status'] =="login") {
		echo "<script>window.location.href='index.php'</script>";
	}
?>

  <div class="login">
  <h4 class="text-center">
      Please Sign In </h4>
  <h1><center><svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" fill="currentColor" class="bi bi-person-badge-fill" viewBox="0 0 16 16">
  <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zm4.5 0a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zM8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6m5 2.755C12.146 12.825 10.623 12 8 12s-4.146.826-5 1.755V14a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1z"/>
</svg></center></h1>
    
    </h1>

    <div class="ket">
    <?php
      if (isset($_GET['pesan'])) {
       if ($_GET['pesan'] == "gagal") {
        echo '<div class="alert alert-danger" role="alert">
              Login gagal, Username atau Password salah!
              </div>';
       } elseif ($_GET['pesan'] == "logout"){
        echo '<div class="alert alert-info" role="alert">
              Anda telah berhasil logout
              </div>';
       }
        else {
        echo '<div class="alert alert-info" role="alert">
              Anda harus login untuk mengakses halaman tersebut
              </div>';
       }
       
      }
    ?>
    </div>

    <form action = "ceklogin.php" method = "post">
      <div class="form-group was-validated">
        <label class="form-label" for="username">Username</label>
        <input class="form-control" type="text" name = "username" required>
      </div>
      <div class="form-group was-validated" style="margin-bottom: 10px">
        <label class="form-label" for="password">Password</label>
        <input class="form-control" type="password" name = "password" required>
      </div>
        <input type='submit' class="btn btn-dark w-100" name="login" value="Login">
      </a>
    </form>


  </div>
</body>
</html>