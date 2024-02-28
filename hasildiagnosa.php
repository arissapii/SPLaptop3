<?php
require_once('process.php');

if (isset($_POST['bsimpan'])) {
    $selectedGejala = array();

    foreach ($_POST as $key => $value) {
        if (strpos($key, 'gejala_') !== false && $value != "Pilih Kondisi") {
            $selectedGejala[] = array(
                'kode' => substr($key, 7),
                'value' => $value
            );
        }
    }

    $hasilDiagnosa = forwardChaining($selectedGejala, $conn);

    if ($hasilDiagnosa) {
        echo "Hasil Diagnosa: $hasilDiagnosa <br>";

        foreach ($selectedGejala as $gejala) {
            $certaintyFactor = calculateCertaintyFactor($gejala['kode'], $hasilDiagnosa, $conn);
            echo "Gejala {$gejala['kode']} memiliki Certainty Factor: $certaintyFactor <br>";
        }
    } else {
        echo "Tidak ada hasil diagnosa yang sesuai aturan.";
    }
}
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
        <a class="navbar-brand" href="homepage.php">SISTEM PAKAR KERUSAKAN LAPTOP</a>
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
            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="homepage.php">Home</a></li>
            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="index.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Masthead-->

    <header class="masthead bg-primary text-white text-center">
        <section id="resume-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg">
                        <div class="page three">
                            <h2 class="heading">Hasil Diagnosa</h2>
                            <div class="row progress-circle mb-5 mt-5">
                                <?php foreach ($diagnosa as $diag) : ?>
                                    <!-- ... Bagian yang menampilkan nilai probabilitas ... -->
                                <?php endforeach; ?>
                            </div>
                            <div class="row">
                                <h4>Berdasarkan Gejala-Gejala yang telah dipilih, maka laptop anda mengalami:</h4>
                                <br>
                                <?php foreach ($tertinggi as $tinggi) : ?>
                                    <div class="col-md-5 animate-box">
                                        <center>
                                            <h2><b><?= $tinggi['nama_kerusakan']; ?></b></h2>
                                        </center>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <br>
                            <?php foreach ($detail as $det) : ?>
                                <div class="row d-flex center">
                                    <div class="col-md-8 d-flex ftco-animate">
                                        <div class="blog-entry justify-content-end">
                                            <a href="#" class="block-20">
                                            </a>
                                            <div class="text mt-1 float-right d-block">
                                                <h4>Solusi :</h4>
                                                <p><?= $det['solusi']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </header>

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
