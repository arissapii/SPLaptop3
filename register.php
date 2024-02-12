<?php
require 'process.php';
session_start();

if (isset($_SESSION['is_login'])) {
  if (isset($_SESSION['admin'])) {
      header("Location: dashboard.php");
  } else {
      header("Location: homepage.php");
  }
  exit;
}

if(isset($_POST["register"])){
    $nama     = $_POST['tnama'];
    $password = $_POST['tpassword'];
    $email    = $_POST['temail'];
    $username = $_POST['tusername'];
    $hash_password = hash('md5', $password);
    
    // default level akun baru bernilai USER
    $defaultLevel = 'user';

    $sql = "INSERT INTO user (nama, password, email, username, level) 
            VALUES ('$nama','$hash_password','$email','$username','$defaultLevel')";

    //membuat ketika ada username yg sama maka registrasi gagal
    try {
        if($conn->query($sql)){
            echo "
            <script>
                alert('Registrasi Berhasil, Silahkan Login');
                windows.location='index.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Username Sama, Silahkan ganti Username lain!');
                windows.location='register.php';
            </script>
            ";
        }
    } catch(exception $e) {
        echo "Terjadi kesalahan: " . $e->getMessage();
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/styleRegister.css" />
    <link rel="stylesheet" href="fontawesome/css/all.min.css" />

    <title>Warung Bikar</title>
  </head>
  <body>
  <img src="assets/img/bglaptop.png" width="100%">
    <div class="container">
      <form class="form-container" method="post" action="register.php">
        <h1 class="text-judul mt-5">Daftar</h1>
        <div class="row mt-5">
          <!-- Box Nama -->
          <div class="col-md-7">
            <div class="mb-4">
              <label for="exampleInputEmail1" class="form-label">Nama</label>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-edit"></i></span>
                <input name="tnama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Lengkap" required />
              </div>
            </div>
          </div>
          <!-- box password -->
          <div class="col-md-5">
            <div class="mb-4">
              <label for="exampleInputEmail1" class="form-label">Password</label>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                <input name="tpassword" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Password" required />
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- box email -->
          <div class="col-md-7">
            <div class="mb-4">
              <label for="exampleInputEmail1" class="form-label">Email</label>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                <input name="temail" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" required />
              </div>
            </div>
          </div>
          <!-- box ulangi password -->
          <div class="col-md-5">
            <div class="mb-4">
              <label for="exampleInputEmail1" class="form-label">Ulangi Password</label>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-unlock-alt"></i></span>
                <input name="trepassword" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ulangi Password" required />
              </div>
            </div>
          </div>
        </div>
        <!-- box username -->
        <div class="row">
          <div class="col-md-4">
            <div class="mb-4">
              <label for="exampleInputEmail1" class="form-label">Username</label>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-edit"></i></span>
                <input name="tusername" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username" />
              </div>
            </div>
          </div>
        </div>

        <div class="mt-5">
          <div class="row">
            <div class="col-md-6 d-grid">
              <button name="register" type="submit" class="btn btn-outline-primary">Daftar</button>
            </div>
            <div class="col-md-6 d-grid">
              <button name="breset" type="reset" class="btn btn-outline-danger">Kosongkan Data</button>
            </div>
          </div>
        </div>

        <div class="mt-3">
          <label for="#">Sudah Punya Akun ? <a href="index.php" class="textForm2 text-hover">Login Disini</a></label>
        </div>
      </form>
    </div>

    <!-- Bootstrap js dan popper -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/popper.min.js"></script>
  </body>
</html>
