<?php
require 'process.php'; 

// Fungsi READ
$query = "SELECT * FROM tbl_gejala";
$result = $conn->query($query);

$data_gejala = array();
while ($row = $result->fetch_assoc()) {
    $data_gejala[] = $row;
}

// Fungsi untuk menghitung nilai CF berdasarkan kategori
function hitungCF($kategori) {
  switch ($kategori) {
      case 'tidak tahu':
          return 0.4;
      case 'mungkin':
          return 0.5; // Ubah sesuai kebutuhan
      case 'kemungkinan besar':
          return 0.7; // Ubah sesuai kebutuhan
      case 'hampir pasti':
          return 0.9; // Ubah sesuai kebutuhan
      case 'pasti':
          return 1;
      default:
          return 0; // Kategori tidak valid
  }
}

// Proses formulir jika disubmit
if (isset($_POST['bsimpan'])) {
  // Ambil nilai dari formulir
  $selected_gejala = isset($_POST['idgejala']) ? $_POST['idgejala'] : [];
  $kategori = isset($_POST['kategori']) ? $_POST['kategori'] : 'tidak tahu';

  // Hitung nilai CF berdasarkan kategori
  $nilai_cf = hitungCF($kategori);

  // Simpan hasil diagnosa ke database
  $query = "INSERT INTO tbl_hasil (hasil_probabilitas, nama_kerusakan, nama, solusi, tanggal)
            VALUES ('$nilai_cf', 'Nama Kerusakan', 'Nama Anda', 'Solusi', NOW())";
  $result = $conn->query($query);

  // Periksa apakah penyimpanan berhasil
  if ($result) {
      echo "Diagnosa berhasil disimpan ke database.";
  } else {
      echo "Error: " . $query . "<br>" . $conn->error;
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

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/stylediagnosa.css" />
    <link rel="stylesheet" href="fontawesome/css/all.min.css" />
  </head>
  <body>
  <img src="assets/img/img2.jpg" width="100%">
    <div class="container">
      <form class="form-container2 mt-5" method="post" action="">
        <h1 class="textJudul text-center text-light mt-5">Diagnosa</h1>

        <!-- Tabel jenis diagnosa -->

        <div class="section section-features">
          <div class="container">
            <h4 class="header-text text-light text-start">Pilih Gejala</h4>
            <div class="row">
              <form action="diagnosa.php" method="POST">
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
