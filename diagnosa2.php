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
    <div class="container">
      <form class="form-container" method="post" action="diagnosa.php">
        <h1 class="textJudul text-center text-light mt-2">Diagnosa</h1>

        <!-- Tabel jenis diagnosa -->
        <div class="section section-features">
          <div class="container">
            <h4 class="header-text text-light text-center">Pilih Gejala</h4>
            <div class="row">
              <form action="diagnosa2.php" method="POST">
                <div class="boxes text-light">
                  <table>
                    <?php foreach ($data_gejala as $gejala) : ?>
                      <tr>
                        <td>
                          <input type="checkbox" id="<?= $gejala['idgejala']; ?>" name="idgejala[]" value="<?= $gejala['idgejala']; ?>">
                        </td>
                        <td colspan="2">
                          <?= $gejala['kode_gejala']; ?> | Apakah <?= $gejala['nama_gejala']; ?> ?
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </table>
                </div>
                <div class="mt-5">
                  <div class="row">
                    <div class="col-md-6 d-grid">
                      <button name="bsimpan" type="submit" class="btn btn-outline-primary"><a href="hasildiagnosa.php"></a> Simpan</button>
                    </div>
                    <div class="col-md-6 d-grid">
                      <button name="breset" type="button" class="btn btn-outline-danger" onclick="clearCheckboxes()">Kosongkan Data</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </form>
    </div>

    <!-- Tambahkan skrip JavaScript -->
    <script>
      // Fungsi untuk membersihkan semua checkbox
      function clearCheckboxes() {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(function(checkbox) {
          checkbox.checked = false;
        });
      }
    </script>


    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
  </body>
</html>
