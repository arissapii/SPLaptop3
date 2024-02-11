<?php
require 'process.php'; 

// Fungsi READ
$query = "SELECT * FROM tbl_gejala";
$result = $conn->query($query);

$data_gejala = array();
while ($row = $result->fetch_assoc()) {
    $data_gejala[] = $row;
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

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/stylediagnosa.css" />
    <link rel="stylesheet" href="fontawesome/css/all.min.css" />
  </head>
  <body>
  <img src="assets/img/bglaptop.png" width="100%">
    <div class="container">
      <form class="form-container" method="post" action="">
        <h1 class="textJudul text-center mt-2">Diagnosa</h1>

        <!-- Tabel jenis diagnosa -->
        <div class="d-flex align-items-start">
          <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <button class="nav-link active" id="v-pills-keyboard-tab" data-bs-toggle="pill" data-bs-target="#v-pills-keyboard" type="button" role="tab" aria-controls="v-pills-keyboard" aria-selected="true">Keyboard</button>
            <button class="nav-link" id="v-pills-hardisk-tab" data-bs-toggle="pill" data-bs-target="#v-pills-harddisk" type="button" role="tab" aria-controls="v-pills-hardisk" aria-selected="false">Hardisk</button>
            <button class="nav-link" id="v-pills-chip-tab" data-bs-toggle="pill" data-bs-target="#v-pills-chip" type="button" role="tab" aria-controls="v-pills-chip" aria-selected="false">Chip</button>
            <button class="nav-link" id="v-pills-port-tab" data-bs-toggle="pill" data-bs-target="#v-pills-port" type="button" role="tab" aria-controls="v-pills-port" aria-selected="false">Port</button>
            <button class="nav-link" id="v-pills-motherboard-tab" data-bs-toggle="pill" data-bs-target="#v-pills-motherboard" type="button" role="tab" aria-controls="v-pills-motherboard" aria-selected="false">Motherboard</button>
            <button class="nav-link" id="v-pills-baterai-tab" data-bs-toggle="pill" data-bs-target="#v-pills-baterai" type="button" role="tab" aria-controls="v-pills-baterai" aria-selected="false">Baterai</button>
            <button class="nav-link" id="v-pills-driver-tab" data-bs-toggle="pill" data-bs-target="#v-pills-driver" type="button" role="tab" aria-controls="v-pills-driver" aria-selected="false">Driver CD/DVD</button>
          </div>

          <?php
                        $no = 1;
                        foreach ($data_gejala as $gejala) {
                  ?>
          <!-- Isi Tabel kerusakan keyboard -->
          <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-keyboard" role="tabpanel" aria-labelledby="v-pills-keyboard-tab"><?php echo $gejala['nama_gejala']; ?></div>

            <!-- Isi Tabel Kerusakan Hardisk -->
            <div class="tab-pane fade show" id="v-pills-harddisk" role="tabpanel" aria-labelledby="v-pills-hardisk-tab">2</div>

            <!-- Isi Tabel Kerusakan Chip -->
            <div class="tab-pane fade" id="v-pills-chip" role="tabpanel" aria-labelledby="v-pills-chip-tab">3</div>

            <!-- Isi Tabel Kerusakan Port -->
            <div class="tab-pane fade" id="v-pills-port" role="tabpanel" aria-labelledby="v-pills-port-tab">4</div>

            <!-- Isi Tabel Motherboard -->
            <div class="tab-pane fade" id="v-pills-motherboard" role="tabpanel" aria-labelledby="v-pills-motherboard-tab">5</div>

            <!-- Isi Tabel Baterai -->
            <div class="tab-pane fade" id="v-pills-baterai" role="tabpanel" aria-labelledby="v-pills-baterai-tab">6</div>

            <!-- Isi Tabel Driver CD/DVD -->
            <div class="tab-pane fade" id="v-pills-driver" role="tabpanel" aria-labelledby="v-pills-driver-tab">7</div>
          </div>
          <?php
                      }
                    ?>
        </div>

        <div class="mt-5">
          <div class="row">
            <div class="col-md-6 d-grid">
              <button name="bsimpan" type="submit" class="btn btn-outline-primary"><a href="hasildiagnosa.php"></a> Simpan</button>
            </div>
            <div class="col-md-6 d-grid">
              <button name="breset" type="reset" class="btn btn-outline-danger">Kosongkan Data</button>
            </div>
          </div>
        </div>
      </form>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
  </body>
</html>
