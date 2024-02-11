<?php
// menyambungkan ke file process
require 'process.php';  


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/styles1.css" />
    <link rel="stylesheet" href="fontawesome/css/all.min.css" />

    <title>Sistem Pakar Kerusakan Laptop</title>
  </head>
  <body>
    <img src="assets/img/bglaptop.png" width="100%">
    <div class="container">
      <form class="form-container" method="post">
        <h3 class="textJudul mb-5 mt-2">Masuk</h3>
        <div class="mb-3">
          <label for="exampleInputText1" class="form-label textForm">Username</label>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
            <input type="text" class="form-control" name="username" id="exampleInputText1" aria-describedby="" placeholder="Masukan Username" />
          </div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label textForm">Password</label>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-unlock-alt"></i></span>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Masukan Password" />
          </div>
        </div>
        <div class="d-grid mt-5">
          <button class="btn btn-outline-primary" name="login" role="submit">Masuk</button>
        </div>
        <div class="mt-1">
          <span class="textForm">Belum Punya Akun? <a href="register.php" class="textForm text-hover">Daftar</a> </span>
        </div>
      </form>
    </div>

    <!-- Bootstrap js dan popper -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/popper.min.js"></script>
  </body>
</html>