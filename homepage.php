<?php

// menyambungkan ke file process.php
require 'process.php'; 

validasi();


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sistem Pakar Kerusakan Laptop</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
  </head>
  <body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg text-uppercase fixed-top" style="background-color: #00162b" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="#page-top">SISTEM PAKAR KERUSAKAN LAPTOP</a>
        <button
          class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarResponsive"
          aria-controls="navbarResponsive"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#page-top">Home</a></li>
            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#tips">Tips</a></li>
            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#about">About</a></li>          
            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead bg-primary text-white text-center">
      <div class="container d-flex align-items-center flex-column">
        
        <!-- Masthead Avatar Image-->
        <img class="masthead-avatar mb-5" src="assets/img/laptop.png" alt="..." />
        <!-- Masthead Heading-->
        <p class="fs-1 text-uppercase font-weight-light mb-5">Selamat Datang <strong><?= $_SESSION['username'] ?></strong></p>
        <h1 class="masthead-heading text-uppercase mb-3 text">mulai diagnosa </h1>
        <p class="fs-1 text-uppercase font-weight-light mb-5">Laptop Anda ?</p>
        <!-- section button-->
        <div class="text-center mt-4">
          <a class="btn btn-xl btn-outline-light text-uppercase" href="diagnosa.php"> Mulai </a>
        </div>
      </div>
    </header>
    <!-- tips-->
    <section class="page-section custom-gradient text-light mb-0" id="tips">
      <div class="container">
        <!-- About Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-light">Tips Perawatan</h2>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
          <div class="divider-custom-line"></div>
          <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
          <div class="divider-custom-line"></div>
        </div>
        <!-- About Section Content-->
        <div class="row">
          <div class="me-auto">
            <p class="lead text-center">
              Perawatan laptop adalah serangkaian tindakan yang dilakukan untuk menjaga kinerja optimal, daya tahan, dan masa pakai laptop. Dengan melakukan perawatan yang baik, Anda dapat memastikan bahwa laptop tetap berfungsi dengan baik
              dan mencegah kemungkinan masalah teknis.
            </p>
            <div class="text-center mt-4 mb-4">
              <a class="btn btn-xl btn-outline-light text-uppercase" href="perawatan.php"> Cek Tips lainnya </a>
            </div>
            <div class="text-center mt-3">
              <img src="assets/img/perawatan.jpg" class="img-fluid img-thumbnail rounded" alt="..." />
            </div>

            <br /><br /><br />
          </div>
        </div>
      </div>
    </section>
    <!-- About Section-->
    <section class="page-section bg-white text-black mb-0" id="about">
      <div class="container">
        <!-- About Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-black">Tentang</h2>
        <!-- Icon Divider-->
        <div class="divider-custom divider-black">
          <div class="divider-custom-line"></div>
          <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
          <div class="divider-custom-line"></div>
        </div>
        <!-- About Section Content-->
        <div class="row">
          <div class="col-lg-4 ms-auto">
            <p class="lead">
              Ketika laptop mengalami masalah maka akan mengganggu aktivitas pemiliknya, dan untuk mengatasinya harus memanggil teknisi atau membawa ke tempat reparasi komputer. Hal ini membutuhkan waktu yang lama dan biaya yang relatif
              mahal.
            </p>
          </div>
          <div class="col-lg-4 me-auto"><p class="lead">Oleh karena itu, diperlukan sebuah sistem pakar yang dapat menjadi alternatif dalam mengatasi permasalahan tersebut.</p></div>
          <div class="text-center"><p>--- Heri Mulyono, Regina Ade Darman, Dan Gefli Ramadhan 2020 ---</p></div>
        </div>
      </div>
    </section>
    <!-- Footer-->
    <footer class="footer text-center">
      <div class="container">
        <div class="row">
          <!-- Footer Location-->
          <div class="col-lg-4 mb-5 mb-lg-0">
            <h4 class="text-uppercase mb-4">Lokasi</h4>
            <p class="lead mb-0">
              5JCC+8QR, Cipeujeuh Wetan, Lemahabang,
              <br />
              Cirebon, Jawa Barat 45183
            </p>
          </div>
          <!-- Footer Social Icons-->
          <div class="col-lg-4 mb-5 mb-lg-0">
            <h4 class="text-uppercase mb-4">Kunjungi Kami</h4>
            <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-facebook-f"></i></a>
            <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
            <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-linkedin-in"></i></a>
            <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-dribbble"></i></a>
          </div>
          <!-- Footer About Text-->
          <div class="col-lg-4">
            <h4 class="text-uppercase mb-4">Tentang Web</h4>
            <p class="lead mb-0">Dibuat Untuk Memenuhi dan Melengkapi Salah Satu Syarat Dalam Menempuh Ujian Sarjana Teknik Program Studi Teknik Informatika Pada Fakultas Teknik Universitas Muhammadiyah Cirebon.</p>
          </div>
        </div>
      </div>
    </footer>
    <!-- Copyright Section-->
    <div class="copyright py-4 text-center text-white">
      <div class="container"><small>Copyright &copy; Aris Sapii 2023</small></div>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
  </body>
</html>
